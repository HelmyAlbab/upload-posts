@extends('layouts.main')

@section('content')
    <div class="row my-5">
        <h2 class="mb-4 text-center text-white">{{ $title }}</h2>

        <div class="row justify-content-center mb-4">
            <div class="col-md-6">
                <form action="/posts">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                        <button class="btn fw-bold" type="submit" style="background: #37beb0;color: #fff">Search</button>
                    </div>
                </form>
            </div>
        </div>

        @if ($posts->count())
            <div class="card cardd mb-3 p-4">
                @if ($posts[0]->image)
                    <div style="max-height: 350px; overflow:hidden;" class="m-auto">
                        <img class="img-fluid" src="{{ asset('storage/'.$posts[0]->image) }}" alt="{{ $posts[0]->category->name }}">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
                @endif
                <div class="card-body text-center">
                    <h2 class="card-title"><a class="text-decoration-none" style="color: #A4E5E0" href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a></h2>
                    <p>
                        <small class="text-white">
                        By: <a style="color: #A4E5E0" class="text-decoration-none" href="/posts?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }} </a> 
                        in <a style="color: #A4E5E0" class="text-decoration-none" href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
                        </small>
                    </p>
                    <p class="card-text text-white">{{ $posts[0]->excerpt }}</p>
                    <a style="background: #37beb0;color: #fff" class="text-decoration-none btn" href="/posts/{{ $posts[0]->slug }}">Read More</a>
                </div>
            </div>        
        
            <div class="container m-0 p-0">
                <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-4">
                        <div class="card cards h-100 p-4 round">
                            <div class="position-absolute top-0 end-0 px-3 py-2 m-4 category" style="background:rgba(0, 0, 0, 0.5)"><a class="text-decoration-none text-white" href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></div>
                            @if ($post->image)
                            <div style="max-height: 258px; overflow:hidden;">
                                <img class="img-fluid" src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->category->name }}">
                            </div>
                            @else
                                <img class="img-fluid" src="https://source.unsplash.com/500x400/?{{ $post->category->name }}" alt="{{ $post->category->name }}">
                            @endif
                            <div class="card-body text-white">
                                <h3 class="card-title"><a style="color: #A4E5E0" class="text-decoration-none" href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h3>
                                <p class="cardAuthor">
                                    <small>
                                    By: <a style="color: #A4E5E0" class="text-decoration-none" href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p class="card-text">{{ $post->excerpt}}</p>
                            </div>
                            <div class="card-footer bg-transparent border-top-0 d-flex justify-content-center ">
                                <a style="color: #fff;background:#37beb0" href="/posts/{{ $post->slug }}" class="btn button">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>

        @else
            <p class="text-center fs-4">Post not found.</p>
        @endif
        <div class="d-flex justify-content-center">
            {{-- {{ $posts->links() }} --}}
            {{ $posts->links('layouts.my-paginate') }}
        </div>
    </div>
@endsection


