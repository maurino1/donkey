<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create a Booking</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>

        @endif
    </div>
    <form method="post" action="{{route('booking.store')}}">
        @csrf
        @method('post')
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="name"/> 
        </div>

        <div>
            <label>Phonenumber</label>
            <input type="text" name="phonenumber" placeholder="phonenumber"/> 
        </div>

        <div>
            <label>Status</label>
            <input type="text" name="status" placeholder="status"/> 
        </div>

        <div>
            <label>BeginDate</label>
            <input type="text" name="beginDate" placeholder="beginDate"/> 
        </div>

        <div>
            <label>EndDate</label>
            <input type="text" name="endDate" placeholder="endDate"/> 
        </div>

        <div>
            <label>Price</label>
            <input type="text" name="price" placeholder="price"/> 
        </div>
        <div>
            <input type="submit" value="Save a New Booking"/>
        </div>
    </form>
</body>
</html>