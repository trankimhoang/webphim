@extends('layout.master_admin')
@section('content')
    <a href="{{ route('admin.genres.create') }}" class="btn btn-primary mb-2">Thêm thể loại</a>
    <table class="table table-bordered border border-primary" style="text-align: center">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Hành động</th>
        </tr>
        @foreach($listGenre as $genre)
            <tr>
                <td>{{ $genre->id }}</td>
                <td>{{ $genre->title }}</td>
                <td>{{ $genre->description }}</td>
                <td>
                    {{ mapStatusGenre($genre->status) }}
                </td>
                <td>
                    <ul class="list-inline m-0">
                        <li class="list-inline-item">
                            <a href="{{ route('admin.genres.edit', $genre->id) }}" class="btn btn-success btn-sm rounded-0"><i class="fas fa-edit"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <form action="{{ route('admin.genres.destroy', $genre->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm rounded-0 btn-delete-index" data-id="{{ $genre->id }}"><i class="fas fa-trash"></i></button>
                            </form>
                        </li>
                    </ul>
                </td>
            </tr>
        @endforeach
    </table>
    <div>{{ $listGenre->links() }}</div>
@endsection
