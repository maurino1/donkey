<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html>
<link href="{{ asset('../resources/cc/app.css') }}" rel="stylesheet"> 
<head>
    <title></title>
</head>
<body>
    <!-- Voeg hier verdere HTML-inhoud toe -->
</body>
</html>



<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul>
                        <li><a href="{{ asset('profile') }}">Profile</a></li>
                        <li><a href="{{ asset('booking') }}">Actieve Bookings</a></li>
                        <li><a href="{{ asset('breaks') }}">Breaks for sight seeing</a></li>
                        <li><a href="{{ asset('restingspot/create') }}">restingspot</a></li>
                        <a href="{{ asset('/') }}">Back</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
