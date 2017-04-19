<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HopThuController extends Controller
{
    public function getThuIndex ()
    {
    	return view('user.hopthu.index', 
                    [
                        
                    ]);
    }

    public function getSoanThu ()
    {
    	return view('user.hopthu.soanthu', 
                    [
                        
                    ]);
    }
}
