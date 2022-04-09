@extends('backend.master')

@section('content')
    <div class="br-pagetitle">
        <i class="icon ion-android-list"></i>
        <div>
            <h4>Manage Category</h4>
            <p class="mg-b-0">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                / <a href="{{ url('admin/category/create') }}">Add Category</a> / Categories /
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
                        <th class="">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div><!-- table-wrapper -->

        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->
@endsection
