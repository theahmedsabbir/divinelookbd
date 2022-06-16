@extends('backend.master')

@section('content')
    <div class="br-pagetitle">
        <i class="icon ion-star"></i>
        <div>
            <h4>Manage Brand</h4>
            <p class="mg-b-0">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                / <a href="{{ url('admin/brand/create') }}">Add Brand</a> / Categories /
            </p>
        </div>
    </div>
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="table-wrapper table-responsive">
                <table id="datatable3" class="table display nowrap">
                    <thead>
                    <tr>
                        <th class="">#</th>
                        <th class="">Image</th>
                        <th class="">Name</th>
                        <th class="">Slug</th>
                        <th class="notexport">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brands as $brand)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>
                                @if($brand->image)
                                    <img src="{{ asset('/brand/'.$brand->image) }}" height="50" width="50" />
                                @else
                                    <span>No image found</span>
                                @endif
                            </td>
                            <td>{{ $brand->name ?? 'No  name found' }}</td>
                            <td>{{ $brand->slug ?? 'No  slug found' }}</td>
                            <td>
                                <a href="{{ url('/admin/brand/edit/'.$brand->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ url('/admin/brand/delete/'.$brand->slug) }}" onclick="return confirm('Are you sure permanently this brand ?')" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->

        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->
@endsection
