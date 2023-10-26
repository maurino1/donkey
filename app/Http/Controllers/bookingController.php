// app/Http/Controllers/BookingController.php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function activeBookings()
    {
        $activeBookings = Booking::where('status', 'active')->get();
        return view('bookings.active', compact('activeBookings'));
    }
}

