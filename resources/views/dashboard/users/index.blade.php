@extends('welcome')
@section('title')
    All Users
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="mb-3 text-center">
                @if (session()->has('success'))
                    <h3 class="text-success bg-success">{{ session()->get('success') }}</h3>
                @endif
            </div>
            <div class="mb-1">
                <a href="{{ route('excel.export') }}" class="btn btn-primary"><i class="fas fa-file-download">&nbsp; Export Excel </i></a>
                <a href="{{ route('excel.importview') }}" class="btn btn-primary"><i class="fas fa-file-upload">&nbsp; Import Excel </i></a>
            </div>
            @if(count($records))
            <div class="table-responsive">
                <!-- Users -->
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $record->full_name }}</td>
                            <td>{{ $record->phone_number }}</td>
                            <td>{{ $record->email }}</td>
                            <td><a href="{{ route('dashboard.admin.edit', $record->id) }}" class="btn btn-success"><i class="fa fa-edit">Edit</i></a></td>
                            <td>
                                <form action="{{ route('dashboard.admin.destroy', $record->id) }}" method="POST"
                                    onsubmit="return confirm('Are You Sure You Want To Delete User !')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="text" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <h1 class="text-center">No Data Found</h1>
            @endif
            <!-- Render pagination links -->
                {{ $records->links() }}
            </div>
        </div>
        @endsection
