@extends('backend.master')

@push('style')

<style>
table,th,  tr, td {
    border: 1px solid #E9ECEF !important;
    border-collapse: collapse !important;
}
</style>

@endpush

@section('content')
    <div class="br-pagetitle">
        <i class="icon ion-android-list"></i>
        <div>
            <h4>View Products</h4>
            <p class="mg-b-0">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                / <a href="{{ url('admin/product/index') }}">Manage Product</a> / View /
            </p>
        </div>
    </div>
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="table-wrapper table-responsive">
                <table id="" class="table display nowrap" style="width: 99%;">
                    <thead class="thead-colored thead-info">
                    <tr>
                        <th>Product Data</th>
                        <th>Details</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><strong>category</strong></th>
                            <td>{{ $product->category->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th><strong>brand</strong></th>
                            <td>{{ $product->brand->name }}</td>
                        </tr>
                        <tr>
                            <th><strong>image</strong></th>
                            <td><img src="{{ asset('product/' . $product->image) }}" width="50" alt=""></td>
                        </tr>
                        <tr>
                            <th><strong>name</strong></th>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th><strong>slug</strong></th>
                            <td>{{ $product->slug }}</td>
                        </tr>
                        <tr>
                            <th><strong>sku</strong></th>
                            <td>{{ $product->sku }}</td>
                        </tr>
                        <tr>
                            <th><strong>discount price</strong></th>
                            <td>{{ $product->discount_price }}</td>
                        </tr>
                        <tr>
                            <th><strong>price</strong></th>
                            <td>{{ $product->price }}</td>
                        </tr>
                        <tr>
                            <th><strong>qty</strong></th>
                            <td>{{ $product->qty }}</td>
                        </tr>
                        <tr>
                            <th><strong>short description</strong></th>
                            <td>{{ $product->short_description }}</td>
                        </tr>
                        <tr>
                            <th><strong>long description</strong></th>
                            <td>{{ $product->long_description }}</td>
                        </tr>
                        <tr>
                            <th><strong>information</strong></th>
                            <td>{{ $product->information }}</td>
                        </tr>
                        <tr>
                            <th><strong>type</strong></th>
                            <td>{{ $product->type }}</td>
                        </tr>
                        <tr>
                            <th><strong>features</strong></th>
                            <td>{{ $product->features }}</td>
                        </tr>
                        <tr>
                            <th><strong>avg rating</strong></th>
                            <td>{{ $product->avg_rating }}</td>
                        </tr>
                    </tbody>
                </table>
            </div><!-- table-wrapper -->

        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->
@endsection
