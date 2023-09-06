@extends('layout.master_admin')
@section('content')
    <a href="{{ route('admin.countries.create') }}" class="btn btn-primary mb-2">Thêm quốc gia</a>
    <table class="table table-bordered border border-primary" style="text-align: center">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Hành động</th>
        </tr>
        @foreach($listCountry as $country)
            <tr>
                <td>{{ $country->id }}</td>
                <td>{{ $country->title }}</td>
                <td>{{ $country->description }}</td>
                <td>
                    {{ mapStatusCountry($country->status) }}
                </td>
                <td>
                    <ul class="list-inline m-0">
                        <li class="list-inline-item">
                            <a href="{{ route('admin.countries.edit', $country->id) }}" class="btn btn-success btn-sm rounded-0"><i class="fas fa-edit"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <form action="{{ route('admin.countries.destroy', $country->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm rounded-0 btn-delete-index" data-id="{{ $country->id }}"><i class="fas fa-trash"></i></button>
                            </form>
                        </li>
                    </ul>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
