<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class BreaksController extends Controller
{
    public function index(){
        $breaks = "breaks list form in BreaksController";
        return view('breaks.index', ['breaks' => $breaks]);
    }

    public function create()
    {
       return view('breaks.create');
    }
}
