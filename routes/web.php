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
<<<<<<< HEAD
/*
=======
>>>>>>> parent of d6fecb8 (inlog en aanmelden)
    $users = DB::table('tests')
            ->select('subject', 'email as user_email')
            ->get();
            
            dd($users);
<<<<<<< HEAD
*/
return view('test'); 
});


=======
    return view('test');
});

//routes/web.php

use App\Http\Controllers\BookingController;

Route::get('/active-bookings', [BookingController::class, 'showActiveBookings'])->name('bookings.active');
>>>>>>> parent of d6fecb8 (inlog en aanmelden)

