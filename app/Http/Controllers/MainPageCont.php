<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainPageCont extends Controller
{
    public function index(){
        return view('mainPage');
    }
    public function addEmployee(){
        return view('addEmployee');
    }
    public function employees(){
        return view('employees');
    }

}
