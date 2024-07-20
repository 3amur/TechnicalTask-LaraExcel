@extends('welcome')
@section('title')
    Edit User
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <!-- Edit User -->
            <div class="mb-3 text-center">
                @if (session()->has('success'))
                    <h3 class="text-success bg-success">{{ session()->get('success') }}</h3>
                @endif
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit User</h3>
                </div>
                <form action="{{ route('dashboard.admin.update', $record->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-label">
                            <label>Full Name</label>
                            <div>
                                <input type="text" name="full_name" value="{{ $record->full_name }}"
                                    placeholder="Enter User Name" class="form-control">
                            </div>
                            @error('full_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-label">
                            <label>Phone Number</label>
                            <div>
                                <input type="text" name="phone_number" value="{{ $record->phone_number }}"
                                    placeholder="Enter User Phone Number" class="form-control">
                            </div>
                            @error('phone_number')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-label">
                            <label>Email</label>
                            <div>
                                <input type="text" name="email" value="{{ $record->email }}"
                                    placeholder="Enter User Email" class="form-control">
                            </div>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
