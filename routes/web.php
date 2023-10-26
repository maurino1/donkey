<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});


//if you wanna make a db query put it in the route like this
Route::get('/test', function (){ 
/*
    $users = DB::table('tests')
            ->select('subject', 'email as user_email')
            ->get();
            
            dd($users);
*/
return view('test'); 
});



