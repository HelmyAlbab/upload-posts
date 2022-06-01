@extends('dashboard.layouts.main')

@section('content')
    @if (session()->has('berhasil'))
        <div class="alert alert-success alert-dismissible fade show lh-sm mx-5 my-3" role="alert">
            {{ session('berhasil') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('update'))
        <div class="alert alert-warning alert-dismissible fade show lh-sm mx-5 my-3" role="alert">
            {{ session('update') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('hapus'))
        <div class="alert alert-danger alert-dismissible fade show lh-sm mx-5 my-3" role="alert">
            {{ session('hapus') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="mx-5 my-2 text-uppercase fs-2 fw-bold">Post Category</div>
    <div class="mx-5 my-4">
        <a href="/dashboard/categories/create" class="btn btn-success mb-3">Create new category</a>
        <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th width="20px">No</th>
                    <th width="400px">Category Name</th>
                    <th width="200px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="tabelIcons">
                            <a href="/dashboard/categories/{{ $category->id}}/edit" class="btn btn-warning"><ion-icon name="pencil-outline"></ion-icon></a>
                            <form action="/dashboard/categories/{{ $category->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger tombol" onclick="return confirm('are you sure?')"><ion-icon name="trash-outline"></ion-icon></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection