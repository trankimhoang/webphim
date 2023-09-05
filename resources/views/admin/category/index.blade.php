@extends('layout.master_admin')
@section('content')
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-2">Thêm danh mục</a>
    <table class="table table-bordered border border-primary" style="text-align: center">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Hành động</th>
        </tr>
        @foreach($listCategory as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    {{ mapStatusCategory($category->status) }}
                </td>
                <td>
                    <ul class="list-inline m-0">
                        <li class="list-inline-item">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-success btn-sm rounded-0"><i class="fas fa-edit"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm rounded-0 btn-delete-index" data-id="{{ $category->id }}"><i class="fas fa-trash"></i></button>
                            </form>
                        </li>
                    </ul>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
