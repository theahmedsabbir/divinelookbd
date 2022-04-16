@extends('frontend.master')

@push('style')
<style>
.filter-choice.select-form:last-child {
    text-align: right !important;
}

input.from {
    display: inline-block;
    font-size: 15px;
    color: #0a0a0a;
    border: 1px solid #eeeeee;
    padding: 4px 10px;
    font-weight: 600;
    border-radius: 0;
    -moz-appearance: textfield;  
    width:47%
}

input.from::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

input.from:focus{
    border-color: #e6e6e6 !important;
}

label{
    text-transform: capitalize;
}
a.wishlist-remove:before {
	content: "\f014" !important;
}
</style>
@endpush


@section('content')

<!----Product list page---->

<div class="main-content main-content-product left-sidebar">

    <form action="{{ url('product/wishlist') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-trail breadcrumbs">
                        <ul class="trail-items breadcrumb">
                            <li class="trail-item trail-begin">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="trail-item trail-end active">
                                My Wishlist
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content-area shop-grid-content no-banner col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="site-main">
                        <h3 class="custom_blog_title">
                            My Wishlist
                        </h3>
                        <div class="shop-top-control">
                            <div class="select-item select-form">
                                <span class="title">Sort</span>
                                <select name="per_page" title="sort" data-placeholder="12 Products/Page" class="chosen-select">
                                    <option value="12" 
                                        @if (Request::get('per_page') == 12) 
                                            selected
                                        @endif
                                    >12 Products/Page</option>
                                    <option value="9" 
                                        @if (Request::get('per_page') == 9) 
                                            selected
                                        @endif
                                    >9 Products/Page</option>
                                    <option value="10" 
                                        @if (Request::get('per_page') == 10) 
                                            selected
                                        @endif
                                    >10 Products/Page</option>
                                    <option value="8" 
                                        @if (Request::get('per_page') == 8) 
                                            selected
                                        @endif
                                    >8 Products/Page</option>
                                    <option value="6" 
                                        @if (Request::get('per_page') == 6) 
                                            selected
                                        @endif
                                    >6 Products/Page</option>
                                    <option value="1" 
                                        @if (Request::get('per_page') == 1) 
                                            selected
                                        @endif
                                    >1 Products/Page</option>
                                    <option value="2" 
                                        @if (Request::get('per_page') == 2) 
                                            selected
                                        @endif
                                    >2 Products/Page</option>
                                </select>
                            </div>
                            <div class="filter-choice select-form">
                                <span class="title">Sort by</span>
                                <select name="order_by" title="sort-by" data-placeholder="Price: Low to High" class="chosen-select">
                                    <option value="default" 
                                        @if (Request::get('order_by') == 'default')
                                            selected
                                        @endif
                                    >Default</option>
                                    <option value="price_asc" 
                                        @if (Request::get('order_by') == 'price_asc')
                                            selected
                                        @endif
                                    >Price: Low to High</option>
                                    <option value="price_desc" 
                                        @if (Request::get('order_by') == 'price_desc')
                                            selected
                                        @endif
                                    >price: High to Low</option>
                                    <option value="id_asc" 
                                        @if (Request::get('order_by') == 'id_asc')
                                            selected
                                        @endif
                                    >New Products</option>
                                    <option value="id_desc" 
                                        @if (Request::get('order_by') == 'id_desc')
                                            selected
                                        @endif
                                    >Old Products</option>
                                </select>
                            </div>
                            <div class="filter-choice select-form">
                            	<button style="background-color: #EE1C47" 
                            		type="submit" 
                            	>Go</button>
                                {{-- <span class="title">Filter</span> --}}
                            </div>
                            {{-- grid mode --}}
    {{--                         <div class="grid-view-mode">
                                <div class="inner">
                                    <a href="listproducts.html" class="modes-mode mode-list">
                                        <span></span>
                                        <span></span>
                                    </a>
                                    <a href="gridproducts.html" class="modes-mode mode-grid  active">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </a>
                                </div>
                            </div> --}}
                        </div>
                        <ul class="row list-products auto-clear equal-container product-grid">
                        	@foreach ($products as $product)
                        		<li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                        			@include('frontend.product.includes.product-card', ['product' => $product])
                        		</li>
                        	@endforeach
                        </ul>
                        {{ $products->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                {{-- @include('frontend.product.includes.filter', ['products' => $products]) --}}
            </div>
        </div>
    </form>
</div>


@endsection



@push('script')
<script>
	
    //---------------------------Price filter----------------------
    // load initially
    $('.slider-range-price').each(function () {
        var min = $(this).data('min'); //min 
        var max = $(this).data('max'); //max
        // var unit = $(this).data('unit'); 
        var value_min = $(this).data('value-min'); //slider min
        var value_max = $(this).data('value-max'); //slider max
        var label_result = $(this).data('label-result');
        var t = $(this);
        $(this).slider({
            range: true,
            min: min,
            max: max,
            values: [value_min, value_max], 
            slide: function (event, ui) {
                var result = `
                	<input type="number" name="min_price" value="${ui.values[0]}" oninput="update_slider()" min="${min}" max="${max}" class="from" id="from" placeholder="min">
                	<input type="number" name="max_price" value="${ui.values[1]}" oninput="update_slider()" min="${min}" max="${max}" class="from" id="to" placeholder="max">
                `;
                t.closest('.price-slider-wrapper').find('.price-slider-amount').html(result);
            }
        });
    });

    // update slider based on input
    let update_slider = () => {

    	//load again
	    $('.slider-range-price').each(function () {

        	var min = $(this).data('min'); //min 
        	var max = $(this).data('max'); //max

	    	let from = $('#from').val();
	    	let to = $('#to').val();

	        var value_min = from != '' ? parseInt($('#from').val()) : 0; //slider min
	        var value_max = to != '' ? parseInt($('#to').val()) : 0; //slider max

	        // validations
	        if(value_min > value_max) return; //stop if min is grater than max
	        if(value_min < 0 || value_max < 0) return; 
	        if(value_min < 0 || value_max < 0) return; 
	        if(value_min > max || value_max > max) return; 

	        var t = $(this);
	        $(this).slider({
	            range: true,
	            values: [value_min, value_max], 
	            slide: function (event, ui) {
	                var result = `
	                	<input type="number" name="min_price" value="${ui.values[0]}" oninput="update_slider()" min="${min}" max="${max}" class="from" id="from" placeholder="min">
	                	<input type="number" name="max_price" value="${ui.values[1]}" oninput="update_slider()" min="${min}" max="${max}" class="from" id="to" placeholder="max">
	                `;
	                t.closest('.price-slider-wrapper').find('.price-slider-amount').html(result);
	            }
	        });

	    });
    }
</script>
@endpush