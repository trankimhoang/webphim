@extends('layout.master_admin')
@section('content')
    <form action="{{ route('admin.countries.update', $country->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title">Title @include('admin.include.required_icon')</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $country->title) }}">
            @error('title')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description @include('admin.include.required_icon')</label>
            <textarea name="description" class="form-control">{{ old('description', $country->description) }}</textarea>
            @error('description')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-group p-lg-2" name="status">
                <option value="1" @if($country->status == 1) selected @endif>On</option>
                <option value="0" @if($country->status == 0) selected @endif>Off</option>
            </select>
        </div>


        <div class="form-group pt-3">
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </form>
@endsection
