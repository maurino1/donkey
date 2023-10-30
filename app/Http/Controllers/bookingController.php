<?php
// app/Http/Controllers/BookingController.php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function showActiveBookings()
    {
        //haal alle actieve boekingen op    
        $activeBookings = Booking::where('status', 'active')->get();

        return view('bookings.activebookings', compact('activeBookings'));
    }
}
?>

