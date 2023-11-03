<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Booking</h1>
    <li><a href="{{ asset('booking/created') }}">Create a booking</a></li>
    <div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>

        @endif
    </div>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phonenumber</th>
                <th>Status</th>
                <th>BeginDate</th>
                <th>EndDate</th>
                <th>Price</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($bookings as $booking)
            <tr>
                <td>{{$booking->id}}</td>
                <td>{{$booking->name}}</td>
                <td>{{$booking->phonenumber}}</td>
                <td>{{$booking->status}}</td>
                <td>{{$booking->beginDate}}</td>
                <td>{{$booking->endDate}}</td>
                <td>{{$booking->price}}</td>
                <td>
                    <a href="{{route('booking.edit', ['booking' => $booking])}}">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{route('booking.destroy', ['booking' => $booking])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete"/>
                    </form>
                </td>
            </tr>
        
            @endforeach
        </table>
    </div>
    <li><a href="{{ asset('dashboard') }}">Back</a></li>
</body>
</html>