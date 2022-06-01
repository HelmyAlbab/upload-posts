@extends("layouts.main")

@section('content')
    <div class="row my-5">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="mb-3 text-white">{{ $post->title }}</h2>
                    <p class="text-white">
                        By: <a style="color: #37beb0" class="text-decoration-none" href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> in <a style="color: #37beb0" class="text-decoration-none" href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                    </p>

                    @if ($post->image)
                        <div style="max-height: 350px; overflow:hidden;">
                            <img class="img-fluid" src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->category->name }}">
                        </div>
                    @else
                        <img class="img-fluid" src="https://source.unsplash.com/900x400/?{{ $post->category->name }}" alt="{{ $post->category->name }}">
                    @endif

                    <article class="my-3 fs-5 text-white">
                        {!! $post->body !!}
                    </article>
                    <a style="background: #37beb0;color: #fff" class="btn mt-4" href="/posts">Kembali ke Posts</a>
                </div>
            </div>
        </div>
    </div>
@endsection
