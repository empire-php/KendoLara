<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Kendocontroller extends Controller
{
    public function index(){
        return view("welcome");
    }

    public function datepicker(){
        return view("welcome",compact('datepicker'));
    }
}
