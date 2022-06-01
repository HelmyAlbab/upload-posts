@extends('layouts.main')

@section('content')
<section class="my-5">
    <div class="box">
        <div class="form">
            <h3>Please Registration</h3>
            <form action="/register" method="post">
                @csrf
                <div class="inputBx">
                    <input type="text" name="username" placeholder="Username" required value="{{ old('username') }}" autofocus>
                    <ion-icon name="person"></ion-icon>
                    @error('username')
                        <div class="alert alert-danger p-0 lh-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="inputBx">
                    <input type="text" name="name" placeholder="Nama" required value="{{ old('name') }}">
                    <ion-icon name="person-circle"></ion-icon>
                    @error('name')
                        <div class="alert alert-danger p-0 lh-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="inputBx">
                    <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                    <ion-icon name="mail"></ion-icon>
                    @error('email')
                        <div class="alert alert-danger p-0 lh-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="inputBx">
                    <input type="phone" name="phone" placeholder="Phone" required value="{{ old('phone') }}">
                    <ion-icon name="call-outline"></ion-icon>
                    @error('phone')
                        <div class="alert alert-danger p-0 lh-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="inputBx">
                    <input type="password" name="password" placeholder="Password" required>
                    <ion-icon name="lock-closed"></ion-icon>
                    @error('password')
                        <div class="alert alert-danger p-0 lh-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="inputBx">
                    <input type="submit" value="Register">
                </div>
            </form>
            <p>Already have account? Please <a href="/login">login</a></p>
        </div>
    </div>
</section>
@endsection