@extends('layouts.appbreaks')
@section('content')
<main class="container">
<section>
    <form method="post" action="{{ route('breaks.update', $breaks -> id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="titlebar">
                <h1>Edit Breaks</h1>
                <button>Save</button>
            </div>
            @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach

                </ul>
            </div>
        @endif
            <!--het formulier dat je kan invullen -->
            <div class="card">
               <div>
                    <label>Naam</label>
                    <input type="text" name="name" value="{{$breaks->name}}">
                    <label>Description (optional)</label>
                    <textarea cols="10" rows="5" name="description" value="{{$breaks->description}}" >{{$breaks->description}}</textarea>
                    <label>Add Image</label>
                    <img src="{{asset('image/'. $breaks->image)}}" alt="" class="img-product" id="file-preview" />
                    <input type="hidden" name="hidden_breaks_image" value={{ $breaks->image}}/>
                    <input type="file" name="image" accept="image/*" onchange="showFile(event)">
                </div>
               <div>
                    <label>Naam</label>
                    <select  name="naam">
                        @foreach (json_decode('{"Restaurant": "Restaurant", "Speeltuin": "Speeltuin", "Snackbar": "Snackbar" }',true) as $optionKey => $optionValue ) 
                        <option value="{{$optionKey}}" {{(isset($breaks->category) && $breaks->category == $$optionKey) ? 'selected' : ''}} >{{$optionValue}}</option>
                        @endforeach
                    </select>
                    <hr>
                    <label>cooördinaten</label>
                    <input type="text" name="cooördinaten" value="{{$breaks->cooördinaten}}" >
                    <hr>
                    <label>Voorzieningen</label>
                    <input type="text" name="voorzieningen" value="{{$breaks->voorzieningen}}" >
               </div>
            </div>
            <div class="titlebar">
                <h1></h1>
                <input type="hidden" name="hidden_id" value="{{$breaks->id}}">
                <button>Save</button>
            </div>
</form>
        </section>
</main>
<script>
    //
    function showFile(event){
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var dataURL = reader.result;
            var output = document.getElementById('file-preview');
            output.src = dataURL;
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>
@endsection