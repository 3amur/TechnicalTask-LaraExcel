@extends('welcome')
@section('title')
    Import Users
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <!-- Import User -->
            <div class="mb-3 text-center">
                @if (session()->has('success'))
                    <h3 class="text-success bg-success">{{ session()->get('success') }}</h3>
                @endif
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Import User</h3>
                </div>
                <form action="{{ route('excel.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <label for="formFileMultiple" class="form-label">Choose Your Excele File</label>
                        <br>
                        <input class="form-control" type="file" name="fileexcel" multiple><br>
                        @error('fileexcel')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
