@extends('layouts.main')

@section('content')
    <div class="row my-5">
        <h2 class="mb-4">{{ $title }}</h2>
        @foreach ($users as $user)
            <ul class="list-group col-lg-6">
                <li class="list-group-item"><h3 class="text-center"><a class="text-decoration-none" href="/authors/{{ $user->username }}">{{ $user->name }}</a></h3>
                </li>
            </ul>
        @endforeach
    </div>
@endsection


