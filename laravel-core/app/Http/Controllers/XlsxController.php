<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use \PhpOffice\PhpSpreadsheet\Cell\DataType;

class XlsxController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // Read uploaded xl file
    public static function readxlfile( $file, $sheet='sizes' )
    {
        //dd($file);
        $inputFileType = 'Xlsx';
        $inputFileName = $file;
        $sheetname = $sheet;
        $reader = IOFactory::createReader($inputFileType);
        /**  Advise the Reader of which WorkSheets we want to load  **/
        $reader->setLoadSheetsOnly($sheetname);
        /**  Advise the Reader to load all Worksheets  **/
        //$reader->setLoadAllSheets();
        /**  Advise the Reader that we only want to load cell data  **/
        $reader->setReadDataOnly(true);
        /**  Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = $reader->load($inputFileName);
        $worksheet = $spreadsheet->getActiveSheet();
        // Get the highest row and column numbers referenced in the worksheet
        $highestRow = $worksheet->getHighestRow(); // e.g. 10
        $highestColumn = $worksheet->getHighestColumn();//$worksheet->getHighestColumn(); // 'I';e.g 'F'


        $highestColumnIndex = Coordinate::columnIndexFromString($highestColumn); // e.g. 5
        

        $headingsArray = $worksheet->rangeToArray('A1:' . $highestColumn . '1', null, false, false, false);

        $headingsArray = $headingsArray[0];
        foreach ($headingsArray as $key => $value) {
            if ($value==null) {
                unset($headingsArray[$key]);
            }
        }
        $atoz=range('A', 'Z');
        $highestColumn=$atoz[count($headingsArray)-1];
        $namedDataArray = array();
        $sizes=array();
        for ($row = 2; $row <= $highestRow; ++$row) {
            $rowa=$worksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, false, false, false);
            $rowa=$rowa[0];
            if ($rowa[0]!==null || $rowa[1]!==null) {
                foreach ($headingsArray as $columnKey => $columnHeading) {
                    if ($columnHeading=='sn') {
                        continue;
                    }
                    $namedDataArray[$columnHeading] = $rowa[$columnKey];
                }
                $sizes[]=$namedDataArray;
            }
        }
        return $sizes;
    }
    //Create file to download
    public static  function createfile( $data , $headerkeys=null, $filename, $sheetname='sizes', $path='./storage/xlsx/')
	{        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle($sheetname);
        $startrow=1;        
        if ($headerkeys!=null) {
            $startrow=2;
            //array_unshift($headerkeys,'sn');
            $sheet->getStyle('A1:Z1')->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()->setARGB('ffff00');
            
            $a2z=array_combine(range(0, 25), range('A', 'Z'));
            $a2keys=array();
            foreach ($headerkeys as $key => $value) {
                $row=1;
                $a2keys[$a2z[$key]]=$value;
                $sheet->setCellValue($a2z[$key].$row, $value);
            }
        }
        foreach($data as $key => $domain) {
          $row = (int)$key+$startrow;
          foreach ($a2keys as $key => $value) {
            if(isset($domain[$value])){
                $cellval = $domain[$value]  ;
            }else{
                $cellval='- ';
            }
            if($a2keys[$key]==='sn'){
                $cellval=$row-1;
            }            
            $sheet->setCellValueExplicit($key.$row,$cellval,DataType::TYPE_STRING);
          } 
        }
        $writer = new Xlsx($spreadsheet);
        $filename = $filename.'.xlsx';
        $writer->save($path.$filename);
        return $filename;
	}
}
