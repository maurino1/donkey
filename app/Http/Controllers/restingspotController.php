<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\restingspot;

class restingspotController extends Controller
{
    public function index(){
        return view('restingSpot.index');
    }

    public function create(){
        return view('restingSpot.create');
    }

    public function store(Request $request){   
             $data = $request->validate(['name' => 'required|string',]);  
            restingspot::create($data);    
            
            // Redirect naar de indexpagina na het maken van de restingspot   
             return redirect(route('restingspot.index')); 
            
    }
};