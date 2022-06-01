@extends('layouts.main')

@section('content')
<section>
    <div class="box">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show lh-sm" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show lh-sm" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="form">
            <h3>Please Login</h3>
            <form action="/login" method="post">
                @csrf
                <div class="inputBx">
                    <input type="text" name="username" id="username" placeholder="Username" required value="{{ old('username') }}" autofocus>
                    <ion-icon name="person"></ion-icon>
                    @error('username')
                        <div class="alert alert-danger p-0 lh-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="inputBx">
                    <input type="password" name="password" name="password" placeholder="Password" required>
                    <ion-icon name="lock-closed"></ion-icon>
                    @error('password')
                        <div class="alert alert-danger p-0 lh-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="inputBx">
                    <input type="submit" value="Login">
                </div>
            </form>
            <p>Not a member? Please <a href="/register">register</a></p>
        </div>
    </div>
</section>
@endsection