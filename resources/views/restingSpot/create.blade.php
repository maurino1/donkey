<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>create a restingspot</h1>
    <form method='post' action="{{ route('restingspot.store')">
        @csrf
        @method('post')
        <div>
            <label>name</label>
            <input type='text' name='name'>
        </div>
        <div>
            <input type='submit' value='create a new restingspot'>
        </div>
    </form>
</body>
</html>