<?php
// app/Http/Controllers/BookingController.php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

//BookingsController verbinden/erven met controller
class BookingController extends Controller
{

    public function showActiveBookings()
    {
        //haal alle actieve boekingen op    
        $activeBookings = Booking::where('status', 'active')->get();

        return view('bookings.activebookings', compact('activeBookings'));
    }
    
    
    public function destroy($id)
    {
        // Zoek de boeking in de database
        $booking = Booking::find($id);

        if ($booking) {
            // Verwijder de boeking
            $booking->delete();
            return redirect()->route('bookings.index')->with('success', 'Boeking is verwijderd.');
        }

        return redirect()->route('bookings.index')->with('error', 'Boeking niet gevonden.');
    }
}
?>

