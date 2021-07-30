<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\For_;

class MyController extends Controller
{
    function index()
    {

        echo '<h1>Download Databeses</h1>';
       
        $hi= DB::select("select * from wp1of20_usermeta");
        
        echo '<br><br>';
     
        foreach ($hi as $key => $object) {

            $myfile = fopen("export_wp1of20_usermeta.txt", "w") or die("Unable to open file!");
 
            $arrhi[$key]=$object->meta_key;

        }    
    
        for ($i=0; $i <count($arrhi); $i++) { 

            $hiall[$i] = $arrhi[$i]."\n";
            fwrite($myfile, $hiall[$i]);

        }

        fclose($myfile);
        echo '<span><b>download TXT</b><br></span><a href="http://127.0.0.1:8000/export.txt" download>wp1of20_usermeta</a>';
        echo '<br><br>';

        
        $fp = fopen('export.csv', 'w');
        

        foreach ($hiall as $key) {
            fputcsv($fp, $arrhi);
          }
          fclose($fp);
        echo '<span><b>download CSV</b><br></span><a href="http://127.0.0.1:8000/export.csv" download>wp1of20_usermeta</a>';
        echo '<br><br>';
   







    }




}
