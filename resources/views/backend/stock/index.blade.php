@extends('backend.master')

@section('content')
    <div class="br-pagetitle">
        <i class="icon ion-tshirt-outline"></i>
        <div>
            <h4>Manage Stock</h4>
            <p class="mg-b-0">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                / <a href="{{ url('admin/product/create') }}">Add Product</a> / Products /
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
                        <th>Image</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach (App\Models\Product::orderBy('id', 'desc')->get() as $product)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>
                                <img src="{{ asset('product/' . $product->image) }}" width="50" alt="">
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->qty ? : '' }}</td>
                            <td>{{ $product->price ?? '' }}</td>
                            <td>
                                <a href="{{ url('/admin/product/edit/'.encrypt($product->id)) }}" class="btn btn-sm btn-info">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->

        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->
@endsection
