{{-- @dd($products->groupBy('cat_id')) --}}
<div class="sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
    <div class="wrapper-sidebar shop-sidebar">
        <div class="widget woof_Widget">
            <div class="widget widget-categories">
                <h3 class="widgettitle">Categories</h3>
                <ul class="list-categories">
                	@foreach ($products->groupBy('cat_id') as $cat_id => $values)
                	@php
                		$category = App\Models\Category::find($cat_id);
                		if($category == null){
                			continue;
                		}
                	@endphp

                    <li>
                        <input type="checkbox" id="{{ 'category'.$category->id }}" name="cat_ids[]" value="{{ $category->id }}"

                        	@if (Request::get('cat_ids') && in_array($category->id, Request::get('cat_ids')))
                        		checked
                        	@endif

                        >
                        <label for="{{ 'category'.$category->id }}" class="label-text">
                            {{ $category->name }}
                        </label>
                    </li>
                	@endforeach
                </ul>
            </div>
            <div class="widget widget_filter_price">
                <h4 class="widgettitle">
                    Price
                </h4>

                @php
                	$max_price = App\Models\Product::max('price') ?? 0;
                	// $max_price = $products->max('price') ?? 0;
                	// $min_price = $products->min('price') ?? 0;
                @endphp

                <div class="price-slider-wrapper">
                    <div data-label-reasult="Range:" 
                    	data-min="0" data-max="{{ $max_price }}" data-unit="৳"
                        class="slider-range-price " 
                        data-value-min="{{Request::get('min_price') ?? 0}}" 
                        data-value-max="{{ Request::get('max_price') ?? $max_price }}"
                    >
                    </div>
                    <div class="price-slider-amount">
                    	<input type="number" 
                    		name="min_price" value="{{Request::get('min_price') ?? 0}}" 
                    		oninput="update_slider()" 
                    		min="0" max="{{ $max_price }}" 
                    		class="from" id="from" placeholder="min"
                		>
                    	<input type="number" 
                    		name="max_price" value="{{ Request::get('max_price') ?? $max_price }}" 
                    		oninput="update_slider()" 
                    		min="0" max="{{ $max_price }}" 
                    		class="from" id="to" placeholder="max"
                		>

                    </div>
                </div>
            </div>
            <div class="widget widget-categories">
                <h3 class="widgettitle">Brands</h3>
                <ul class="list-categories">
                	@foreach ($products->groupBy('brand_id') as $brand_id => $values)
                	@php
                		$brand = App\Models\Brand::find($brand_id);
                		if($brand == null){
                			continue;
                		}
                	@endphp

                    <li>
                        <input type="checkbox" id="{{ 'brand'.$brand->id }}" name="brand_ids[]" value="{{ $brand->id }}"                    	

                        	@if (Request::get('brand_ids') && in_array($brand->id, Request::get('brand_ids')))
                        		checked
                        	@endif

                        >
                        <label for="{{ 'brand'.$brand->id }}" class="label-text">
                            {{ $brand->name }}
                        </label>
                    </li>
                	@endforeach
                </ul>
            </div>
            <div class="widget widget-categories">
                <h3 class="widgettitle">Colors</h3>
                <ul class="list-categories">           	
                	@php
                		// collecting unique color ids first
                		$color_ids = [];
                		foreach ($products as $key => $product) {
                			if($product->colors == null) continue;	
                			foreach (json_decode($product->colors) as $color_id) {

                				// jodi array te na thake tahole in koro 
                				if(!in_array($color_id, $color_ids)){
                					array_push($color_ids, $color_id);
                				}
                			}
                		}
                	@endphp


                	{{-- show the colors by fetching in database --}}
                	@foreach ($color_ids as $color_id2)
                	@php
                		$color = App\Models\Color::find($color_id2);
                		if($color == null) continue;
                	@endphp
                    <li>
                        <input type="checkbox" id="{{ 'color'.$color->id }}" name="color_ids[]" value="{{ $color->id }}"


                        	@if (Request::get('color_ids') && in_array($color->id, Request::get('color_ids')))
                        		checked
                        	@endif

                        >
                        <label for="{{ 'color'.$color->id }}" class="label-text">
                            {{ $color->name }}
                        </label>
                    </li>
                	@endforeach
                </ul>
            </div>
            <div class="widget widget-categories">
                <h3 class="widgettitle">Types</h3>
                <ul class="list-categories">
                	{{-- show types without duplicates --}}
                	@php
                		$types = []; //take a array for keeping memory
                	@endphp
                	@foreach ($products->pluck('type') as $type)
                	@php
                		// jodi array te thake taile contine, else array te rakho and show koro 
                		if (!in_array($type, $types) && $type != null) {
                			array_push($types, $type);
                		}else{
                			continue;
                		}
                	@endphp

                    <li>
                        <input type="checkbox" id="{{ 'type'.$type }}" name="types[]" value="{{ $type }}"

                        	@if (Request::get('types') && in_array($type, Request::get('types')))
                        		checked
                        	@endif

                        >
                        <label for="{{ 'type'.$type }}" class="label-text">
                            {{ $type }}
                        </label>
                    </li>
                	@endforeach
                </ul>
            </div>
        </div>
        <div class="widget">
            <button type="submit" class="button submit-newsletter">Filter</button>
            <button type="button" 
            	class="button"style="background-color: #EE1C47"
            	onclick="location.href='{{ url('product/all') }}'" 
        	>Clear</button>
        </div>
        <div class="widget newsletter-widget">
            <div class="newsletter-form-wrap ">
                <h3 class="title">Subscribe to Our Newsletter</h3>
                <div class="subtitle">
                    More special Deals, Events & Promotions
                </div>
                <input type="email" class="email" placeholder="Your email letter">
                <button type="button" class="button submit-newsletter">Subscribe</button>
            </div>
        </div>
    </div>
</div>