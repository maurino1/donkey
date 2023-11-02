<!-- resources/views/bookings/active_bookings.blade.php -->

@extends('layouts.appbookings')

@section('content')
    <h1>Actieve Boekingen</h1>

    @if($activeBookings->isEmpty())
        <p>Geen actieve boekingen gevonden.</p>
    @else
        <ul>
            @foreach($activeBookings as $booking)
                <li>{{ $booking->id }} - {{ $booking->status }} - {{$booking->beginDate}} - {{$booking->endDate}} - {{$booking->price}} - {{$booking->paymentStatus}} - Gebruiker: {{ $booking->user->name ?? 'none' }}</li>
            @endforeach
        </ul>
        <form method="post" action="{{ route('bookings.destroy', $booking->id) }}">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Verwijder</button>
        </form>
        <li><a href="{{ asset('dashboard') }}">Back</a></li>
        @endif
        @endsection
