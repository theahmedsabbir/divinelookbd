@extends('backend.master')

@section('content')
    <div class="br-pagetitle">
        <i class="icon ion-android-list"></i>
        <div>
            <h4>Add Category</h4>
            <p class="mg-b-0">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                / <a href="{{ url('admin/categories') }}">Manage Category</a> / Add Category /
            </p>
        </div>
    </div>
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url('admin/category/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" value="" class="form-control" placeholder="Category name" required>
                            @if ($errors->has('name'))
                                <div class="text-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" value="" class="form-control">
                            @if ($errors->has('image'))
                                <div class="text-danger">{{ $errors->first('image') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-teal mt-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- br-pagebody -->
@endsection
