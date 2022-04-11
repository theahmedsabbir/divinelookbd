@extends('backend.master')
@push('style')
@endpush

@section('content')
    <div class="br-pagetitle">
        <i class="icon ion-android-list"></i>
        <div>
            <h4>Add Product</h4>
            <p class="mg-b-0">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                / <a href="{{ url('admin/product/index') }}">Manage Product</a> / Add Product /
            </p>
        </div>
    </div>
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <form action="{{ url('/admin/product/store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Product name">
                    </div>
                    <div class="col">
                        <label for="sku">SKU</label>
                        <input type="text" name="sku" id="sku" class="form-control" placeholder="Product sku name">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="cat_id">Category Name</label>
                        <select class="form-control" name="cat_id" id="cat_id">
                            <option selected disabled>Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="brand_id">Brand Name</label>
                        <select class="form-control" name="brand_id" id="brand_id">
                            <option selected disabled>Select a brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Enter product price" />
                    </div>
                    <div class="col">
                        <label for="discount_price">Discount Price ( <small class="text-danger">Optional</small> )</label>
                        <input type="number" class="form-control" name="discount_price" id="discount_price" placeholder="Enter discount price" />
                    </div>
                    <div class="col">
                        <label for="qty">Qty</label>
                        <input type="number" class="form-control" name="qty" id="qty" placeholder="Enter product qty" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="short_description">Short description</label>
                        <textarea class="form-control" rows="5" name="short_description" id="short_description" placeholder="Enter product short description"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="long_description">Long description</label>
                        <textarea class="form-control summernote" rows="5" name="long_description" id="long_description" placeholder="Enter product long description"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="information">Information</label>
                        <textarea class="form-control summernote" rows="5" name="information" id="information" placeholder="Enter product information"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="type">Type</label>
                        <select class="form-control" name="type" id="type">
                            <option selected disabled>Select product type</option>
                            <option value="feature">Feature product</option>
                            <option value="hot">Hot product</option>
                            <option value="discount">Discount product</option>
                            <option value="new">New arrival product</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="features">Feature</label>
                        <input type="text" class="form-control" name="features" id="features" placeholder="Enter product feature" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control" placeholder="Product image">
                    </div>
                    <div class="col">
                        <label for="images">Multiple images</label>
                        <input type="file" name="images" id="images" class="form-control" multiple placeholder="Product images">
                    </div>
                </div>
                <button type="submit" name="btn" class="btn btn-md btn-success mt-3">Submit</button>
            </form>
        </div>
    </div><!-- br-pagebody -->
@endsection

@push('script')
@endpush
<script>
    import Buttonbar from "../../../../public/backend/lib/jquery-ui/demos/datepicker/buttonbar.html";
    export default {
        components: {Buttonbar}
    }
</script>
