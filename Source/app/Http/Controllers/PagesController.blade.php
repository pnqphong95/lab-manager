<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phong;
use DB;
use App\BoMon;

class PagesController extends Controller
{

    function timkiem(Request $request)
    {
    	$tukhoa = $request->tukhoa;
    	$phong = Phong::where('CPU', 'like', "%tukhoa%")->orWhere('GPU', 'like', "%tukhoa%")->take(20)->paginate(5);
    	return view('pages.timkiem', ['phong'=>$phong, 'tukhoa'=>$tukhoa]);
    }
}
