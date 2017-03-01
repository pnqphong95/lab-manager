<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function trangchu() {
    	return view('user.trangchu');
    }
}
