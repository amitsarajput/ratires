<?php

namespace ProductManager\Http\Controllers;

use ProductManager\Models\GolfTournament;
use ProductManager\Models\GolfHighlight;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;

class GolfTournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournaments=[];
        $all=GolfTournament::get(['name', 'location','start', 'end'])->sortBy('end');
        $irritated=$all->each(function ($value, $key) {
            $value['formateddate']=$this->formatdate($value['start'], $value['end']);
        });
        $tournaments['upcoming']=$irritated->filter(function ($value, $key) {
            return strtotime($value['end']) > time();
        });
        $tournaments['previous']=$irritated->filter(function ($value, $key) {
            return strtotime($value['end']) < time();
        });

        $highlights=GolfHighlight::get(['position', 'name','location','date'])->sortBy('date')->groupBy(function ($item, $key) {
                    return substr($item['date'], 0, 4);
                })->sortKeysDesc()->toArray();

        //dd($highlights);

        return Inertia::render('Others/ProgramGolf',['tournaments'=>$tournaments, 'highlights'=>$highlights]);
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
     * @param  \App\Models\GolfTournament  $golfTournament
     * @return \Illuminate\Http\Response
     */
    public function show(GolfTournament $golfTournament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GolfTournament  $golfTournament
     * @return \Illuminate\Http\Response
     */
    public function edit(GolfTournament $golfTournament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GolfTournament  $golfTournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GolfTournament $golfTournament)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GolfTournament  $golfTournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(GolfTournament $golfTournament)
    {
        //
    }
}
