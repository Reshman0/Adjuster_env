<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
class MainPageCont extends Controller
{
    public function index(){
        return view('mainPage');
    }
    public function addEmployee(){
        $organizations = Organization::all();
        //dd("test");
        return view('addEmployee', compact('organizations'));
    }
    public function employees(){
        return view('employees');
    }

}
