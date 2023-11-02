@extends('layouts.appbreaks')
@section('content')
<main class="container">
<section>
    <form method="post" action="{{route ('breaks.store') }}" enctype="multipart/form-data">
        @csrf
            <div class="titlebar">
                <h1>Add Breaks</h1>
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
                    <input type="text" name="name">
                    <label>Description (optional)</label>
                    <textarea cols="10" rows="5" name="description" ></textarea>
                    <label>Add Image</label>
                    <img src="animal-6842125_1280.jpg" alt="image" class="img-product" id="file-preview" />
                    <input type="file" name="image" accept="image/*" onchange="showFile(event)">
                </div>
               <div>
                    <label>voorzieningen</label>
                    <select  name="voorzieningen">
                        @foreach (json_decode('{"Restaurant": "Restaurant", "Speeltuin": "Speeltuin", "Snackbar": "Snackbar" }',true) as $optionKey => $optionValue ) 
                        <option value="{{$optionKey}}" >{{$optionValue}}</option>
                        @endforeach
                    </select>
                    <hr>
                    <label>cooördinaten</label>
                    <input type="text" name="cooördinaten" >
                    <hr>
                    <label>adres</label>
                    <input type="text" name="adres" >
               </div>
            </div>
            <div class="titlebar">
                <h1></h1>
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