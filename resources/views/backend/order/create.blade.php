@extends('backend.master')

@section('content')

<div class="br-pagetitle">
	<i class="icon ion-ios-download-outline"></i>
	<div>
	  <h4>Place Offline Order</h4>
	  <p class="mg-b-0">
	  	<a href="{{ url('admin/dashboard') }}">Dashboard</a> 
	  	/ Offline Order / 
		Add
	  </p>
	</div>
</div>


    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <form action="{{ url('/admin/order/store') }}" method="post" enctype="multipart/form-data">
                @csrf


                <div class="form-group" id="products_inputs">
                    <div class="row">
                        <div class="col-5">                       	
                	
		                    <label>Select Product</label>
		                    <select class="form-control" name="product_ids[]" required>
		                        <option selected disabled value="">Select Product</option>
		                        @foreach(App\Models\Product::orderBy('name', 'asc')->get() as $product)
		                            <option value="{{ $product->id }}">{{ $product->name }}</option>
		                        @endforeach
		                    </select>
                        </div>
                        <div class="col-5">
                        	<label>Enter Quantity</label>
                        	<input type="number" name="qty[]" min="0" class="form-control" required>
                        </div>
                        <div class="col-2">
                        	<label class="d-block">&nbsp;</label>
                        	<button type="button" class="btn btn-success d-inline-block" onclick="addOrRemoveInputRow('add_row', this)">Add</button>
                        	{{-- <button type="button" class="btn btn-danger d-inline-block">Remove</button> --}}
                        </div>
                    </div>
{{-- 
                    @if ($errors->has('product_ids'))
                        <p class="text-danger">{{ $errors->first('product_ids') }}</p>
                    @endif --}}
                </div>

                {{-- add or remove product inputs --}}
                <script>
                	let addOrRemoveInputRow = (todo, current_input) => {

                		// make html for the row
                		let productInputRowHtml = `


		                    <div class="row mt-3">
		                        <div class="col-5">                       	
		                	
				                    <label>Select Product</label>
				                    <select class="form-control" name="product_ids[]" required>
				                        <option selected disabled value="">Select Product</option>
				                        @foreach(App\Models\Product::orderBy('name', 'asc')->get() as $product)
				                            <option value="{{ $product->id }}">{{ $product->name }}</option>
				                        @endforeach
				                    </select>
		                        </div>
		                        <div class="col-5">
		                        	<label>Enter Quantity</label>
		                        	<input type="number" name="qty[]" min="0" class="form-control" required>
		                        </div>
		                        <div class="col-2">
		                        	<label class="d-block">&nbsp;</label>
		                        	<button 
		                        		type="button" class="btn btn-success d-inline-block"  
		                        		onclick="addOrRemoveInputRow('add_row', this)"
	                        		>Add</button>
		                        	<button 
		                        		type="button" class="btn btn-danger d-inline-block"
		                        		onclick="addOrRemoveInputRow('remove_row', this)"
		                        		>Remove</button>
		                        </div>
		                    </div>

                		`;
                		// console.log(todo);

                		// for adding row append it 
            			let products_inputs = document.querySelector('#products_inputs');
                		if(todo == 'add_row'){

                			current_input.parentElement.parentElement.insertAdjacentHTML('afterend', productInputRowHtml);
                			console.log(current_input.parentElement.parentElement);
                			// products_inputs.innerHTML += productInputRowHtml;
                		}
                		// else remote it 
                		if(todo == 'remove_row'){
                			console.log(current_input.parentElement.parentElement.remove());
                		}


                		console.log('hi');
                	}
                </script>

                <div class="form-group">
                	
                    <label for="user_id">Select User</label>
                    <select class="form-control" name="user_id" id="user_id" required>
                        <option selected disabled value="">Select A User</option>
                        @foreach(App\Models\User::orderBy('name', 'asc')->get() as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <a style="margin-top: 5px; display: block" href="{{ url('admin/user/create') }}">Add New User</a>

                    @if ($errors->has('user_id'))
                        <p class="text-danger">{{ $errors->first('user_id') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="sku">Transaction ID</label>
                            <input type="text" name="transaction_id" id="transaction_id" class="form-control" placeholder="Order transaction_id">
                        </div>
                    </div>
                </div>


                <input type="hidden" name="payment_type" value="Cash on delivery">

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