<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Booking verbinden/erven met Model
class Booking extends Model
{
    //attributen vulbaar
    protected $fillable = ['status', 'user_id', 'beginDate', 'endDate', 'price', 'paymentStatus']; // Vul dit aan met de werkelijke velden in je boekingstabel

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //use HasFactory;
}
?>

