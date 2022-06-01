@extends('layouts.main')

@section('content')
    <div class="row my-5">
        <div class="container">
            <div class="row">
                @foreach ( $categories as $category )
                <div class="col-md-4 mb-3">
                    <a href="/posts?category={{ $category->slug }}">
                        <div class="card bg-dark text-white border-0">
                            <img src="https://source.unsplash.com/500x400?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h3 class="card-title text-center flex-fill p-4" style="color: rgb(255, 255, 255);background:rgba(0,0,0,0.5)">{{ $category->name }}</h3>
                            </div>
                        </div>
                    </a>
                </div>       
                @endforeach
            </div>
        </div>
    </div>
@endsection


