@extends('backend.master')
@push('style')
@endpush

@section('content')
    <div class="br-pagetitle">
        <i class="icon ion-android-list"></i>
        <div>
            <h4>Edit {{$bannerType}}</h4>
            <p class="mg-b-0">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                / <a href="{{ url('admin/banner/'. $bannerType .'/index') }}">Manage {{$bannerType}}</a> / Edit {{$bannerType}} /
            </p>
        </div>
    </div>
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <form action="{{ url('/admin/banner/'. $bannerType .'/update' , encrypt($banner->id) ) }}" method="post" enctype="multipart/form-data">
                @csrf



                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control" placeholder="{{$bannerType}} image">

                            @if ($errors->has('image'))
                                <p class="text-danger">{{ $errors->first('image') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                @if ($bannerType != 'side-banner')
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="info">info</label>
                            <input type="text" name="info" value="{{ $banner->info }}" id="info" class="form-control" placeholder="{{$bannerType}} info">

                            @if ($errors->has('info'))
                                <p class="text-danger">{{ $errors->first('info') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title">title</label>
                            <input type="text" name="title" value="{{ $banner->title }}" id="title" class="form-control" placeholder="{{$bannerType}} title" required>

                            @if ($errors->has('title'))
                                <p class="text-danger">{{ $errors->first('title') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="sub_title">sub title</label>
                            <input type="text" name="sub_title" value="{{ $banner->sub_title }}" id="sub_title" class="form-control" placeholder="{{$bannerType}} sub title">

                            @if ($errors->has('sub_title'))
                                <p class="text-danger">{{ $errors->first('sub_title') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="button_text">button text</label>
                            <input type="text" name="button_text" value="{{ $banner->button_text }}" id="button_text" class="form-control" placeholder="{{$bannerType}} button text">

                            @if ($errors->has('button_text'))
                                <p class="text-danger">{{ $errors->first('button_text') }}</p>
                            @endif
                        </div>
                        <div class="col-md-9">
                            <label for="link">link</label>
                            <input type="url" name="link" value="{{ $banner->link }}" id="link" class="form-control" placeholder="{{$bannerType}} link">

                            @if ($errors->has('link'))
                                <p class="text-danger">{{ $errors->first('link') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="priority">priority</label>
                            <input type="number" name="priority" value="{{ $banner->priority }}" min="1" id="priority" class="form-control" placeholder="{{$bannerType}} priority">

                            @if ($errors->has('priority'))
                                <p class="text-danger">{{ $errors->first('priority') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
{{--                 <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="long_description">Long description</label>
                            <textarea class="form-control summernote" rows="5" name="long_description" value="{{ $banner->long_description }}" id="long_description" placeholder="Enter product long description"></textarea>
                        </div>
                    </div>
                </div> --}}




                <div class="form-group">
                    <div class="row">
                        <div class="col-12">                            
                            <button type="submit" name="btn" class="btn btn-md btn-success mt-3">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- br-pagebody -->
@endsection

@push('script')
@endpush