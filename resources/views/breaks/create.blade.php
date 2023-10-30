@extends('layouts.appbreaks')
@section('content')
<main class="container">
<section>
    <form method="post" action="{{route ('breaks.store')}}" enctype="multipart/form-data">
        @csrf
            <div class="titlebar">
                <h1>Add Breaks</h1>
                <button>Save</button>
            </div>
            <!--het formulier dat je kan invullen -->
            <div class="card">
               <div>
                    <label>Naam</label>
                    <input type="text" name="name">
                    <label>Description (optional)</label>
                    <textarea cols="10" rows="5" name="description" ></textarea>
                    <label>Add Image</label>
                    <img src="" alt="" class="img-product" id="file-preview" />
                    <input type="file" name="image" accept="image/*" onchange="showFile(event)">
                </div>
               <div>
                    <label>Naam</label>
                    <select  name="naam">
                        @foreach (json_decode('{"Restaurant": "Restaurant", "Speeltuin": "Speeltuin", "Snackbar": "Snackbar" }',true) as $optionKey => $optionValue ) 
                        <option value="{{$optionKey}}" >{{$optionValue}}</option>
                        @endforeach
                    </select>
                    <hr>
                    <label>cooördinaten</label>
                    <input type="text" name="cooördinaten" >
                    <hr>
                    <label>Voorzieningen</label>
                    <input type="text" name="voorzieningen" >
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