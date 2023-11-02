<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;

class BookingController extends Controller
{
    public function indexyes(){
        $bookings = booking::all();
        return view('bookings.indexyes', ['bookings' => $bookings]);
       
    }

    public function created(){
        return view('bookings.created');
    }

    public function store(Request $request){
       $data = $request->validate([
        'name' => 'required',
        'phonenumber' => 'required',
        'status' => 'required',
        'beginDate' => 'required',
        'endDate' => 'required',
        'price' => 'required|decimal:0,2',
       ]);

       $newBooking = Booking::create($data);

       return redirect(route('booking.indexyes'));
    }

    public function edit(Booking $booking){
       return view('bookings.editNu', ['booking' => $booking]);
    }

    public function update(Booking $booking, request $request ){
        $data = $request->validate([
            'name' => 'required',
            'phonenumber' => 'required',
            'status' => 'required',
            'beginDate' => 'required',
            'endDate' => 'required',
            'price' => 'required|decimal:0,2',
           ]);

           $booking->update($data);

           return redirect (route('booking.indexyes'))->with('success', 'Booking updated successfuly');
    }

    public function destroy(Booking $booking){
        $booking->delete();
        return redirect (route('booking.indexyes'))->with('success', 'Booking updated successfuly');
    }
}
