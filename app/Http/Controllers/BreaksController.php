<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Breaks;

class BreaksController extends Controller
{
    //function index aanmaken
    public function index(){
        $breaks = "breaks list form in BreaksController";
        return view('breaks.index', ['breaks' => $breaks]);
    }
    //function create aanmaken
    public function create()
    {
       return view('breaks.create');
    }

    //function store aanmaken
    public function store(Request $request){

        $break = new Breaks;
        $break->naam = $request->naam;
        $break->adres = $request->adres;
        $break->cooördinaten = $request->cooördinaten;
        $break->voorzieningen = $request->voorzieningen;

        $break->save();
        return redirect()->route('breaks.index')->with('success', 'break added successfully');
    }
}
