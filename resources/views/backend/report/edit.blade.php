@extends('backend.master')

@section('content')

@include('backend.supplier.header', ['page' => 'Edit'])


<div class="br-pagebody">
    <div class="br-section-wrapper">
    	
      <div class="row">
      	<div class="col-md-12">
      		<form action="{{ url('admin/supplier/update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
      			@csrf  


      			<div class="form-group">
      				<label for="">Name</label>
      				<input type="text" name="name" value="{{ $supplier->name }}" class="form-control">

		  				@if ($errors->has('name'))
		  					<div class="text-danger">{{ $errors->first('name') }}</div>
		  				@endif
      			</div>

      			
      			<div class="form-group">
      				<label for="">email</label>
      				<input type="email" name="email" value="{{ $supplier->email }}" class="form-control" required>

		  				@if ($errors->has('email'))
		  					<div class="text-danger">{{ $errors->first('email') }}</div>
		  				@endif
      			</div>

      			
      			<div class="form-group">
      				<label for="">phone</label>
      				<input type="text" name="phone" value="{{ $supplier->phone }}" class="form-control" required="">

		  				@if ($errors->has('phone'))
		  					<div class="text-danger">{{ $errors->first('phone') }}</div>
		  				@endif
      			</div>

      			
      			<div class="form-group">
      				<label for="">company name</label>
      				<input type="text" name="company_name" value="{{ $supplier->company_name }}" class="form-control">

		  				@if ($errors->has('company_name'))
		  					<div class="text-danger">{{ $errors->first('company_name') }}</div>
		  				@endif
      			</div>


            <div class="form-group">
              <label for="">address</label>
              <input type="text" name="address" value="{{ $supplier->address }}" id="address" class="form-control" required="">

              @if ($errors->has('address'))
                <div class="text-danger">{{ $errors->first('address') }}</div>
              @endif
            </div>


            <div class="form-group" id="lat_area">
              <label for="">latitude</label>
              <input type="text" name="latitude" id="latitude" value="{{ $supplier->latitude }}" class="form-control">

              @if ($errors->has('latitude'))
                <div class="text-danger">{{ $errors->first('latitude') }}</div>
              @endif
            </div>


            <div class="form-group" id="long_area">
              <label for="">longitude</label>
              <input type="text" name="longitude" id="longitude" value="{{ $supplier->longitude }}" class="form-control">

              @if ($errors->has('longitude'))
                <div class="text-danger">{{ $errors->first('longitude') }}</div>
              @endif
            </div>


      			<div class="form-group">
      				<button type="submit" class="btn btn-teal mt-3">Submit</button>
      			</div>
      		</form>
      	</div>
      </div>
	</div>
    <!-- br-section-wrapper -->
</div>


<script type="text/javascript">
	function previewImage(event){
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
		console.log(output.src);
	}
	function previewImage1(event){
		html = '';
		
		for (var i = 0; i < event.target.files.length; i++) {
			src = URL.createObjectURL(event.target.files[i]);
			html += '<img src="'+src+'" width="50px;" class="mr-1 mb-1">';
		}
		document.getElementById('tyre_images_preview').innerHTML = html;
		console.log(html);
	}
</script>


@endsection
@section('script')

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyBWONYJglFPciyAY5_VZyTqRKjqYkmWhE8"></script>



<script>
   $(document).ready(function() {
        $("#lat_area").addClass("d-none");
        $("#long_area").addClass("d-none");
   });
</script>
<script>
   google.maps.event.addDomListener(window, 'load', initialize);

   function initialize() {
       var input = document.getElementById('address');
       var address = new google.maps.places.Autocomplete(input);
       address.addListener('place_changed', function() {
           var place = address.getPlace();
           console.log(place);
           $('#latitude').val(place.geometry['location'].lat());
           $('#longitude').val(place.geometry['location'].lng());
           $("#lat_area").removeClass("d-none");
           $("#long_area").removeClass("d-none");
       });
   }
</script>


@endsection