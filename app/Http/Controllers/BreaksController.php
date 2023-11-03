<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Breaks;

class BreaksController extends Controller
{
    //function index aanmaken
    public function index(Request $request){
        $keyword = $request->get('search');
        $perPage = 5;

        if(!empty($keywoord)){
            $breaks = Breaks::where('naam', 'LIKE', "%$keyword%")
            ->orWhere('voorziening', 'LIKE', "%$keyword%")
            ->latest() ->paginate($perPage);
        }else{
            $breaks = Breaks::latest()->paginate($perPage);
        }
        return view('breaks.index', ['breaks' => $breaks])->with('i',(request()->input('page, 1') -1) *5);
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

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);
      

        

        if ($break === null) {
            // Handle the case where the Breaks model is not found (null)
            return redirect()->back()->with('error', 'Break not found');
        }

        $break->naam = $request->naam;
        $break->adres = $request->adres;
        $break->cooördinaten = $request->cooördinaten;
        $break->voorzieningen = $request->voorzieningen;

        $break->save();
        return redirect()->route('breaks.index')->with('success', 'break added successfully');
    }

    public function edit($id){
        $breaks = Breaks::findOrFail($id);
        return view('breaks.edit', ['breaks'=>$breaks]);
    }

    public function update(Request $request, Breaks $breaks){
        $request->validate([
            'name' => 'required'
        ]);

        $file_name = $request->hidden_breaks_image;

        if($request->image != ''){
            $file_name = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $file_name);
        }

        $break = Breaks::find($request->hidden_id);

        $break->naam = $request->naam;
        $break->adres = $request->adres;
        $break->cooördinaten = $request->cooördinaten;
        $break->voorzieningen = $request->voorzieningen;

        $break->save();

        return redirect()->route('breaks.index')->with('success', 'Breaks has been updated successfully');
    }

    public function destroy($id){
        $breaks = Breaks::findOrFail($id);
        $image_path = public_path()."/images/";
        $image = $image_path. $breaks->image;
        if(file_exists($image)){
            @unlink($image);
        }
        $breaks->delete();
        return redirect('breaks')->with('success', 'Breaks deleted!');
    }
}
