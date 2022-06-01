@extends('dashboard.layouts.main')

@section('content')
    <div class="container my-5">
        <div class="container">
            <div class="row mx-3 col-lg-12">
                <div class="col-lg-8">
                    <h2 class="mb-3 text-dark">{{ $post->title }}</h2>
                    <a href="/dashboard/posts" class="btn text-white mb-3" style="background: #37beb0;">Back to my all posts</a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn text-white btn-warning mb-3">Edit</a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline mb-3">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger mb-3" onclick="return confirm('are you sure?')">Delete</button>
                    </form>

                    @if ($post->image)
                        <div style="max-height: 350px; overflow:hidden;">
                            <img class="img-fluid" src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->category->name ?? 'None' }}">
                        </div>
                    @else
                        <img class="img-fluid" src="https://source.unsplash.com/900x400/?{{ $post->category->name ?? 'None' }}" alt="{{ $post->category->name ?? 'None' }}">
                    @endif
                    <article class="my-3 fs-5 text-dark">
                        {!! $post->body !!}
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection