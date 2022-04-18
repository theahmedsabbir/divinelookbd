@extends('backend.master')

@section('content')
    <div class="br-pagetitle">
        <i class="icon ion-android-list"></i>
        <div>
            <h4 class="text-capitalize">Manage {{ $bannerType }}s</h4>
            <p class="mg-b-0">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                / <a href="{{ url('admin/banner/'. $bannerType . '/index') }}">{{ $bannerType }}</a>
            </p>
        </div>
    </div>
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="table-wrapper table-responsive">
                <table id="datatable3" class="table display nowrap">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>image</th>

                        @if ($bannerType != 'side-banner')
                        <th>info</th>
                        @endif
                        <th>title</th>
                        <th>sub title</th>
                        <th>button text</th>
                        <th>link</th>
                        <th>priority</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $banner)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>
                                <img src="{{ asset('banner/' . $banner->image) }}" width="30" alt="">
                            </td>
                            @if ($bannerType != 'side-banner')
                            <td>{{ $banner->info }}</td>
                            @endif
                            <td>{{ $banner->title }}</td>
                            <td>{{ $banner->sub_title }}</td>
                            <td>{{ $banner->button_text }}</td>
                            <td>{{ $banner->link }}</td>
                            <td>{{ $banner->priority }}</td>
                            <td>
{{--                                 <a href="{{ url('/admin/banner/'. $bannerType .'/view/'. encrypt($banner->id)) }}" class="btn btn-sm btn-success">View</a> --}}
                                <a href="{{ url('/admin/banner/'. $bannerType .'/edit/'.encrypt($banner->id)) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ url('/admin/banner/'. $bannerType .'/delete/'.encrypt($banner->id)) }}" onclick="return confirm('Are you sure permanently this data?')" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->

        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->
@endsection
