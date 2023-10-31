@extends('layouts.appbreaks')
@section('content')
<main class="container">
        <section>
            <div class="titlebar">
                <h1>Breaks</h1>
                <a href="{{ route('breaks.create')}}" class='btn-link'>add break</a>
            </div>
            @if ($massage = Session::get('success'))
            <div>
                <ul>
                    <li>{{$message}}</li>
                </ul>
            </div>
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
                        <input class="search-input" type="text" name="search" placeholder="Search product..." value="{{ request('search') }}">
                    </div>
                </div>
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
                    <img src="{{ asset('images/ezel-2645138_1280.jpg . $breaks->image')}}"/>
                    <p>$breaks->naam</p>
                    <p>$breaks->cooördinaten</p>
                    <p>$breaks->voorzieningen</p>
                    <div>     
                        <button class="btn btn-success" >
                            <i class="fas fa-pencil-alt" ></i> 
                        </button>
                        <button class="btn btn-danger" >
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </div>
                    @endforeach
                    @else
                    @endif
                   
                </div>
                <div class="table-paginate">
                    <div class="pagination">
                        <a href="#" disabled>&laquo;</a>
                        <a class="active-page">1</a>
                        <a>2</a>
                        <a>3</a>
                        <a href="#">&raquo;</a>
                    </div>
                </div>
            </div>
        </section>
</main>
@endsection