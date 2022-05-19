@extends('backend.master')
@section('style')
  
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
  <style>
    .tfoot{
      height: 42px !important;
    }
    .tfoot th {
        border-top: 1px solid #dee2e6 !important;

    }
  </style>
@endsection


@section('content')

      @include('backend.report.header', ['page' => 'Statement Of Account'])



      <div class="br-pagebody">
        <div class="br-section-wrapper">

          {{-- if no value in request then take date range else show data --}}
          @if ( !(Request::filled('vendor_type') && Request::filled('vendor')) )
          {{-- @if ( 0 ) --}}
            <div class="">
              <form action="{{ url('admin/report/soa') }}">

                <div class="row">
                  <div class="col-md-12">                    
                    <div class="form-group">
                      <label for="">Select Vendor Type</label>
                      <select name="vendor_type" id="vendor_type" class="form-control" onchange="fetchVendor(this.value)">
                        <option value="supplier">Supplier</option>
                        <option value="installer">Installer</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">                    
                    <div class="form-group">
                      <label for="">Select Vendor</label>
                      <select name="vendor" id="vendor" class="form-control">
                        @foreach(App\Models\Supplier::all() as $supplier)
                          <option value="{{ $supplier->id }}">{{ $supplier->company_name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12 mt-4">                    
                    <div class="form-group text-center">
                      <button class="btn btn-teal">Submit</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          @else

            <div class="table-wrapper table-responsive pb-5">

                @php
                  // vars
                  $cum_balance = 0;
                  // get the lpos based on selected vendor
                  $vendor_type = Request::get('vendor_type'); 
                  $vendor_id = Request::get('vendor'); 

                  if ($vendor_type == "supplier") {
                    $vendor = App\Models\Supplier::find($vendor_id);
                    $lpos = App\Models\SupplierLpo::where('supplier_id',$vendor_id)->get();
                    $credit_days = $vendor ? $vendor->credit_days: 0;
                  }else{
                    $vendor = App\Models\Installer::find($vendor_id);
                    $lpos = App\Models\InstallerLpo::with('order')->whereHas('order', function($order) use($vendor_id){
                              $order->where('installer_id', $vendor_id);
                            })->get();
                    $credit_days = $vendor ? $vendor->credit_days: 0;
                  }

                @endphp

                <form action="{{ url('admin/report/soa/pdf') }}" method="POST">
                  @csrf

                  <div class="row">
                    <div class="col-md-6">    
                      <p><strong>Vendor:</strong> {{ $vendor? $vendor->company_name: '' }}</p>
                      <p><strong>Credit Days:</strong> {{ $credit_days }} Days</p>
                      <p class="mb-5"><strong>Credit Limit:</strong> {{ $vendor? $vendor->credit_limit: '' }}</p>
                    </div>

                    <div class="col-md-6 pdf-parent text-right" style="position: relative;">

                      {{-- submit button --}}
                      <button class="btn btn-primary" style="position: absolute; bottom: 26px; right: 35px;">Generate Pdf</button>
                      
                    </div>
                  </div>


                  {{-- inputs and tables --}}
                  <input type="hidden" name="vendor_type" value="{{ Request::get('vendor_type') }}">
                  <input type="hidden" name="vendor" value="{{ $vendor }}">
                  <input type="hidden" name="credit_days" value="{{ $credit_days }}">
                  <table id="datatable_report_sales" class="table display nowrap">
                    <thead class="thead-light">
                      <tr>
                        <th style="text-transform: capitalize;">#</th>
                        <th style="text-transform: capitalize;">Date</th>
                        <th style="text-transform: capitalize;">Lpo Number</th>
                        <th style="text-transform: capitalize;">Sales Order <br>Number</th>
                        <th style="text-transform: capitalize;">Purchase Return <br>Number</th>
                        <th style="text-transform: capitalize;">Vendor Invoice <br>Number</th>
                        <th style="text-transform: capitalize;">Vendor Invoice <br>Amount</th>
                        <th style="text-transform: capitalize;">Paid Amount</th>
                        <th style="text-transform: capitalize;">Balance Amount</th>
                        <th style="text-transform: capitalize;">Cum. Balance</th>
                        <th style="text-transform: capitalize;">Due Date</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ($lpos as $lpo)

                      <tr>
                        <td>{{ $loop->index + 1 }} <input type="hidden" name="lpos[]" value="{{ $lpo }}"></td>
                        <td>{{ $lpo->created_at->format('d-m-Y') }}</td>
                        <td>{{ $lpo->lpo_no }}</td>
                        <td>
                          @if ($lpo->order)
                            <a href="{{ url('admin/order/show', $lpo->order->id) }}">{{ $lpo->order->invoice_no }}</a>
                          @endif
                        </td>
                        <td></td>
                        <td>{{ $lpo->invoice }}</td>
                        <td>{{ $lpo->total }}</td>
                        <td>{{ $lpo->paid }}</td>
                        <td>{{ $lpo->total - $lpo->paid }}</td>
                        @php
                          $cum_balance += $lpo->total - $lpo->paid;
                        @endphp
                        <td>{{ $cum_balance }}</td>
                        <td>{{ $lpo->created_at->addDays($credit_days)->format('d-m-Y') }}</td>
                      </tr>

                      @if ($lpo->return_no != null)

                        <tr>
                          <td>{{ $loop->index + 1 }} <input type="hidden" name="lpos[]" value="{{ $lpo }}"></td>
                          <td>{{ date('d-m-Y',strtotime($lpo->return_date)) }}</td>
                          <td>{{ $lpo->lpo_no }}</td>
                          <td>
                            @if ($lpo->order)
                              <a href="{{ url('admin/order/show', $lpo->order->id) }}">{{ $lpo->order->invoice_no }}</a>
                            @endif
                          </td>
                          <td>{{ $lpo->return_no }}</td>
                          <td>{{ $lpo->invoice }}</td>
                          <td></td>
                          <td>-{{ $lpo->return_amount }}</td>
                          <td>{{ $lpo->total - $lpo->paid - $lpo->return_amount }}</td>
                          @php
                            $cum_balance += $lpo->total - $lpo->paid - $lpo->return_amount;
                          @endphp
                          <td>{{ $cum_balance }}</td>
                          <td>{{ $lpo->created_at->addDays($credit_days)->format('d-m-Y') }}</td>
                        </tr>

                      @endif


                      @endforeach 

                    </tbody>
                    <tfoot class="thead-light tfoot">
                      <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Total Outstanding</th>
                        <th>{{ $cum_balance }}</th>
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                  
                </form>
            </div><!-- table-wrapper -->

            <div class="text-center mt-3">
              <a href="{{ url('admin/report/soa') }}" class="btn btn-danger">Go Back</a>
            </div>

          @endif

        </div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->


@endsection

@section('script')


  <script src="{{ asset('admin/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('admin/js/jszip.min.js') }}"></script>
  <script src="{{ asset('admin/js/pdfmake.min.js') }}"></script>
  <script src="{{ asset('admin/js/vfs_fonts.js') }}"></script>
  <script src="{{ asset('admin/js/buttons.html5.min.js') }}"></script>
  <script>    
    @php
    	$title = 'Statement Of Account Report'
    @endphp
    $('#datatable_report_sales').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',    
            {
               extend: 'excel',
               text: 'Excel',
               title : '{{ $title }}',
            },   
            {
               extend: 'csv',
               text: 'Csv',
               title : '{{ $title }}',
            },  
            // {
            //    extend: 'pdf',
            //    text: 'Pdf',
            //    title : '{{ $title }}',
            // },
        ],

    });
  </script>

  {{-- vendor select and fetch data --}}
  
  

  <script type="text/javascript">
    let suppliers = {!! $suppliers !!};
    let installers = {!! $installers !!};
    function fetchVendor(vendor_type){
      let options = '';

      // get all the suppleir 
      if (vendor_type == 'supplier') {
        suppliers.forEach(function(item,index){
          options += `<option value="${item.id}">${item.company_name}</option>`;
        });
      } 

      // get all the suppleir 
      if (vendor_type == 'installer') {
        installers.forEach(function(item,index){
          options += `<option value="${item.id}">${item.company_name}</option>`;
        });
      } 

      document.querySelector('#vendor').innerHTML = options;
    }
  </script>
@endsection



