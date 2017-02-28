<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lich;

class LichController extends Controller
{
    public function getDanhSach()
    {
    	$lich = Lich::all();
    	return view('admin.lich.danhsach', ['lich'=>$lich]);
    }
}
