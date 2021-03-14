<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlertController extends Controller
{
	public function AlertShow() {
	   return view('alert');
    }
}
