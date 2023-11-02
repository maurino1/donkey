@extends('layouts.appbreaks')
@section('content')
<main class="container">
        <section>
            <div class="titlebar">
                <h1>Breaks</h1>
                <a href="{{ route('breaks.create')}}" class='btn-link'>add break</a>
            </div>
            @if ($message = Session::get('success'))
            
            <script type="text/javascript">
                const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
     })
            Toast.fire({
            icon: 'success',
            title: '{{ $message }}'
     })

            </script>
            @endif
            <div class="table">
                <div class="table-filter">
                    <div>
                        <ul class="table-filter-list">
                            <li>
                                <p class="table-filter-link link-active">All</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <form method="GET" action="{{route('breaks.index') }}" accept-charset="UTF-8" role="search">
                <div class="table-search">   
                    <div>
                        <button class="search-select">
                           Search Breaks
                        </button>
                        <span class="search-select-arrow">
                            <i class="fas fa-caret-down"></i>
                        </span>
                    </div>
                    <div class="relative">
                        <input class="search-input" type="text" name="search" placeholder="Search product..." name="search"  value="{{ request('search') }}">
                    </div>
                </div>
            </form>
                <div class="table-product-head">
                    <p>Image</p>
                    <p>Naam</p>
                    <p>Adres</p>
                    <p>cooördinaten</p>
                    <p>voorzieningen</p>
                </div>
                <div class="table-product-body">
                    @if (count($breaks) > 0)
                    @foreach ($breaks as $breaks)
                    <img src="{{ asset('images/ezel-2645138_1280.jpg') . $breaks->image }}"/>
                    <p>{{$breaks->naam}}</p>
                    <p>{{$breaks->cooördinaten}}</p>
                    <p>{{$breaks->voorzieningen}}</p>
                    <div style="display: flex">    

                        <a href="{{ route('breaks.edit', $breaks->id) }}" class="btn btn-success" style="padding-top: 4px;padding-bottom:4px" >
                            <i class="fas fa-pencil-alt" ></i> 
                        </a>

                        <form method="post" action="{{route('breaks.destroy', $breaks->id)}}">
                        @method('delete')

                        @csrf
                        </form>
                        
                        <button class="btn btn-danger" onclick="deleteConfirm(event)" >
                            <i class="far fa-trash-alt"></i>
                        </button>

                    </div>
                    @endforeach
                    @else
                    <p>Breaks not Found</p>
                    @endif
                   
                </div>
                <div class="table-paginate">
                <li><a href="{{ asset('dashboard') }}">Back</a></li>
           
                </div>
            </div>
        </section>
</main>

<script>
    window.deleteConfirm = function (e) 
    {
        e.preventDefault();
        var form = e.target.form;
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) { form.submit(); }
        })
    }
</script>
@endsection