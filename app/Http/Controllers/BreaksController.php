<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Breaks;

class BreaksController extends Controller
{
    //function index aanmaken
    public function index(){
        $breaks = Breaks::orderby('created_at')->get();
        return view('breaks.index', ['breaks' => $breaks]);
    }
    //function create aanmaken
    public function create()
    {
       return view('breaks.create');
    }

    //function store aanmaken
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2028'
        ]);

        $break = new Breaks;

        
       $fill_name = time() . '.' . request()->image->getClientOriginalExtension();
       request()->image->move(public_path('images'), $file_name);


        $break->naam = $request->naam;
        $break->adres = $request->adres;
        $break->cooördinaten = $request->cooördinaten;
        $break->voorzieningen = $request->voorzieningen;

        $break->save();
        return redirect()->route('breaks.index')->with('success', 'break added successfully');
    }
}
