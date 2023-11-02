<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit a Booking</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>

        @endif
    </div>
    <form method="put" action="{{route('booking.update', ['booking' => $booking])}}">
        @csrf
        @method('get')
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="name" value="{{$booking->name}}"/> 
        </div>

        <div>
            <label>Phonenumber</label>
            <input type="text" name="phonenumber" placeholder="phonenumber" value="{{$booking->phonenumber}}"/> 
        </div>

        <div>
            <label>Status</label>
            <input type="text" name="status" placeholder="status" value="{{$booking->status}}"/> 
        </div>

        <div>
            <label>BeginDate</label>
            <input type="text" name="beginDate" placeholder="beginDate" value="{{$booking->beginDate}}"/> 
        </div>

        <div>
            <label>EndDate</label>
            <input type="text" name="endDate" placeholder="endDate" value="{{$booking->endDate}}"/> 
        </div>

        <div>
            <label>Price</label>
            <input type="text" name="price" placeholder="price" value="{{$booking->price}}"/> 
        </div>
        <div>
            <input type="submit" value="update"/>
        </div>
    </form>
</body>
</html>