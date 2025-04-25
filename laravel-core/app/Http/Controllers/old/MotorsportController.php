<?php

namespace App\Http\Controllers;

use App\Models\Motorsport;
use App\Models\RaceWins;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MotorsportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $races=[];
        $all=Motorsport::get(['name', 'location','start', 'end'])->sortBy('end');
        $irritated=$all->each(function ($value, $key) {
            $value['formateddate']=$this->formatdate($value['start'], $value['end']);
        });
        $races['upcoming']=$irritated->filter(function ($value, $key) {
            return strtotime($value['end']) > time();
        });
        $races['previous']=$irritated->filter(function ($value, $key) {
            return strtotime($value['end']) < time();
        });

        $wins=RaceWins::get(['position', 'name','driver','date'])
              ->sortBy('date')
              ->groupBy(function ($item, $key) {
                  return substr($item['date'], 0, 4);
                })
              ->sortKeysDesc()
              ->toArray();

        //dd($wins);


        return Inertia::render('Others/ProgramMotorsport',['races'=>$races,'wins'=>$wins]);
    }


    public function formatdate($start_date, $end_date)
    {
        $start_time=strtotime($start_date);
        $end_time=strtotime($end_date);
        $date='';
        $date.=date('M j',$start_time);
        $date.='<sup>'.date('S',$start_time).'</sup>';
        $date.=' - ';
        if (date('M',$start_time)===date('M',$end_time)) {
            $date.=date('j',$end_time);
        }else{
            $date.=date('M j',$end_time);
        }
        $date.='<sup>'.date('S',$end_time).'</sup>';
        return $date;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Motorsport  $motorsport
     * @return \Illuminate\Http\Response
     */
    public function show(Motorsport $motorsport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Motorsport  $motorsport
     * @return \Illuminate\Http\Response
     */
    public function edit(Motorsport $motorsport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Motorsport  $motorsport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Motorsport $motorsport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Motorsport  $motorsport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Motorsport $motorsport)
    {
        //
    }
}
