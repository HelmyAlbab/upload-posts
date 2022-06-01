@extends('dashboard.layouts.main')

@section('content')
    <div class="container my-5">
        <div class="container">
            <h3 class="mb-3">Create new category </h3>
            <div class="col-lg-8">
                <form action="/dashboard/categories" method="post" class="mb-5" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required autofocus value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger p-0 lh-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" required value="{{ old('slug') }}">
                        @error('slug')
                            <div class="alert alert-danger p-0 lh-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create category</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/categories/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection