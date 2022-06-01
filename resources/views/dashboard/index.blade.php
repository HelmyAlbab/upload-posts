@extends('dashboard.layouts.main')

@section('content')
    <div class="container m-3">
        <h1 class="ms-4">Welcome back, {{ Auth::user()->name }}</h1>
        <div class="cardBox">
            <a href="/posts">
                <div class="card">
                    <div>
                        <div class="numbers">Posts</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="mail-unread-outline"></ion-icon>
                    </div>
                </div>
            </a>
            <a href="/dashboard/posts">
                <div class="card">
                    <div>
                        <div class="numbers">Upload Posts</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="cloud-upload-outline"></ion-icon>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="card">
                    <div>
                        <div class="numbers">User Account</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="accessibility-outline"></ion-icon>
                    </div>
                </div>
            </a>
            @can('admin')    
                <a href="/dashboard/categories">
                    <div class="card">
                        <div>
                            <div class="numbers">Categories</div>
                        </div>
                        <div class="iconBox">
                            <ion-icon name="copy-outline"></ion-icon>
                        </div>
                    </div>
                </a>
            @endcan
        </div>
    </div>
@endsection