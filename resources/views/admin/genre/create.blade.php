@extends('layout.master_admin')
@section('content')
    <form action="{{ route('admin.genres.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group pt-3">
            <label for="name">Title @include('admin.include.required_icon')</label>
            <input type="text" name="title" class="form-control">
            @error('title')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group pt-3">
            <label for="name">Description @include('admin.include.required_icon')</label>
            <textarea name="description" class="form-control"></textarea>
            @error('description')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group pt-3">
            <label for="status">Status:</label>
            <select class="form-group p-lg-2" name="status">
                <option value="1">On</option>
                <option value="0">Off</option>
            </select>
        </div>

        <div class="form-group pt-3">
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </form>
@endsection
