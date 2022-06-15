@extends('backend.master')

@push('css')
<style type="text/css">
    th,label{
        text-transform: capitalize;
    }
</style>
@endpush

@section('content')
    <div class="br-pagetitle">
        <i class="icon ion-person-stalker"></i>
        <div>
            <h4>Manage User</h4>
            <p class="mg-b-0">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                / <a href="">Users</a> 
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
                        <th class="">avatar</th>
                        <th class="">name</th>
                        <th class="">email</th>
                        <th class="">phone</th>
                        <th class="">address</th>
                        <th class="">status</th>
                        <th class="notexport">action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>
                                @if($user->avatar)
                                    <img src="{{ asset('/users/'.$user->avatar) }}" height="50" width="50" />
                                @else
                                    <span>No image found</span>
                                @endif
                            </td>
                            <td>{{ $user->name ?? '' }}</td>
                            <td>{{ $user->email ?? '' }}</td>
                            <td>{{ $user->phone ?? '' }}</td>
                            <td>{{ $user->address ?? '' }}</td>
                            <td>
                                {!! $user->status==0 ? 
                                    '<span class="badge badge-danger">Pending</span>' :
                                    '<span class="badge badge-success">Accepted</span>'  
                                !!}
                            </td>
                            <td>
                                {{-- <a href="{{ url('/admin/user/view/'. encrypt($user->id)) }}" class="btn btn-sm btn-success">View</a> --}}
                                <a href="{{ url('/admin/user/status/edit/'.encrypt($user->id). '/' . $user->status) }}" class="btn btn-sm btn-info">
                                    {!! $user->status==0 ? 
                                    'Activate' :
                                    'Deactivate'  
                                    !!}
                                </a>
                                <a href="{{ url('/admin/user/delete/'.encrypt($user->id)) }}" onclick="return confirm('Are you sure permanently this user ?')" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->

        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->
@endsection
