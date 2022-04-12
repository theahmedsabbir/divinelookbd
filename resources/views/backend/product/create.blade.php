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

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Product name" required>
                        </div>
                        <div class="col">
                            <label for="sku">SKU</label>
                            <input type="text" name="sku" id="sku" class="form-control" placeholder="Product sku name" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="cat_id">Category Name</label>
                            <select class="form-control" name="cat_id" id="cat_id" required>
                                <option selected disabled>Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('cat_id'))
                                <p class="text-danger">{{ $errors->first('cat_id') }}</p>
                            @endif
                        </div>
                        <div class="col">
                            <label for="brand_id">Brand Name</label>
                            <select class="form-control" name="brand_id" id="brand_id" required>
                                <option selected disabled>Select a brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('brand_id'))
                                <p class="text-danger">{{ $errors->first('brand_id') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" id="price" placeholder="Enter product price" required />
                        </div>
                        <div class="col">
                            <label for="discount_price">Discount Price ( <small class="text-danger">Optional</small> )</label>
                            <input type="number" min="0" step="0.01" class="form-control" name="discount_price" id="discount_price" placeholder="Enter discount price" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="qty">Qty</label>
                            <input type="number" class="form-control" name="qty" id="qty" placeholder="Enter product qty" />
                        </div>
                        <div class="col">
                            <label for="colors">Color Family</label>
                            <select class="form-control select2" name="colors[]" id="colors" multiple>
                                <option selected disabled>Select a color family</option>
                                @foreach(App\Models\Color::all() as $color)
                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('colors'))
                                <p class="text-danger">{{ $errors->first('colors') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="short_description">Short description</label>
                            <textarea class="form-control" rows="5" name="short_description" id="short_description" placeholder="Enter product short description" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="long_description">Long description</label>
                            <textarea class="form-control summernote" rows="5" name="long_description" id="long_description" placeholder="Enter product long description"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="information">Information</label>
                            <textarea class="form-control summernote" rows="5" name="information" id="information" placeholder="Enter product information"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="type">Type</label>
                            <select class="form-control" name="type" id="type">
                                <option selected disabled>Select product type</option>
                                <option value="hot">Hot</option>
                                <option value="discount">Discount</option>
                                <option value="new">New</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="features">Feature</label>
                            <select class="form-control" name="features" id="features">
                                <option selected disabled>Enter product feature</option>
                                <option value="featured">Featured Products</option>
                                <option value="best_seller">Best Seller</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control" placeholder="Product image" required>

                            @if ($errors->has('image'))
                                <p class="text-danger">{{ $errors->first('image') }}</p>
                            @endif
                        </div>
                        <div class="col">
                            <label for="images">Multiple images</label>
                            <input type="file" name="images[]" id="images" class="form-control" multiple placeholder="Product images" required>

                            @if ($errors->has('images.*'))
                                <p class="text-danger">{{ $errors->first('images.*') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

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
{{-- <script>
    import Buttonbar from "../../../../public/backend/lib/jquery-ui/demos/datepicker/buttonbar.html";
    export default {
        components: {Buttonbar}
    }
</script> --}}
