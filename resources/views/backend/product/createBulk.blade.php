@extends('backend.master')
@push('style')
@endpush

@section('content')
<div class="br-pagetitle">
    <i class="icon ion-ios-list-outline"></i>
    <div>
        <h4>Product Upload From Excel</h4>
        <p class="mg-b-0">
            <a href="{{ url('admin/dashboard') }}">Dashboard</a>
            / <a href="{{ url('admin/product/index') }}">Manage Product</a> / Excel Upload /
        </p>
    </div>
</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">
      
      <div class="row">
        <div class="col-md-12">
          <form action="{{ url('admin/product/store/bulk') }}" method="POST" enctype="multipart/form-data">
            @csrf  

            <div class="row">
              <div class="col-md-6">
                {{-- <div class="form-group"> --}}
                  <label for="">Upload excel file</label>
                  <div class="custom-file">
                    <input type="file" name="bulk_file" class="custom-file-input" id="customFile"  accept=".xlsx, .xls, .csv" required>
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>

                  @if (session()->has('file_type_error'))
                    <div class="text-danger">{{ session()->get('file_type_error') }}</div>
                  @endif

                  @if($errors->any())
  
                    @foreach ($errors->all() as $key => $error)  
                      <div class="text-danger">
                      @php
                        $errorMsgWords = explode(' ',$error);
                        $sentence = '';
                        // dd($errorMsgWords[1]);
                        if ($errorMsgWords[1] != "selected") {
                          $secondWordArray = explode('.', $errorMsgWords[1]);
                          
                          $row = $secondWordArray[0] + 2;
                          $field = $secondWordArray[1];

                          $sentence .= 'Error at row ' . $row . ' - ';
                          foreach ($errorMsgWords as $key => $errorMsgWord) {
                            if($key == 1){
                              $sentence .= $field . ' ';
                              continue;
                            }
                            $sentence .= $errorMsgWord;
                            $sentence .= ' ';
                          }
                        }else{
                          $secondWordArray = explode('.', $errorMsgWords[2]);
                          
                          $row = $secondWordArray[0] + 2;
                          $field = $secondWordArray[1];

                          $sentence .= 'Error at row ' . $row . ' -';
                          foreach ($errorMsgWords as $key => $errorMsgWord) {
                            if($key == 2){
                              // dd($errorMsgWord);
                              $sentence .= $field;
                              $sentence .= ' ';
                              continue;
                            }
                            $sentence .= $errorMsgWord;
                            $sentence .= ' ';
                          }

                        }
                        echo $sentence;
                      @endphp
                      </div>
                    @endforeach
                  @endif

                {{-- </div>                 --}}
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Download sample file</label>
                  <a href="{{ url('admin/product/create/bulk/sample-file?v=4') }}" class="btn d-block text-left " style="
                    border: 1px solid #ced4da;
                    color: #868ba1;
                    position: relative;
                  ">Download <i class="fa fa-download text-right d-inline-block" style="
                    position: absolute;
                    background: #e9ecef;
                    right: 0;
                    display: block;
                    top: 0;
                    padding: 14px 28px;
                    border-left: 1px solid #ced4da;
                  "></i>

                  </a>
                </div>                
              </div>
            </div>


  			<div class="form-group mt-4">
  				<pre class="text-danger">
1. Every field except DISCOUNT PRICE is required
2. NAME should be unique
3. Copy "CATEGORY SLUG" and "BRAND SLUG" from category and brand module 
4. Price and quantity should be numeric and minimum is 0
5. Download the sample file and insert data similarly 
  				</pre>
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



{{-- @dd($errors->all()) --}}

@endsection
@push('script')
    



@endpush