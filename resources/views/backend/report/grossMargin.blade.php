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

      @include('backend.report.header', ['page' => 'Gross Margin'])



      <div class="br-pagebody">
        <div class="br-section-wrapper">

          {{-- if no value in request then take date range else show data --}}
          @if ( !(Request::filled('from') && Request::filled('to')) )
            <div class="">
              <form action="{{ url('admin/report/gross-margin') }}">

                <div class="row">
                  <div class="col-md-6">                    
                    <div class="form-group">
                      <label for="">Date From</label>
                      <input type="date" name="from" required class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">                    
                    <div class="form-group">
                      <label for="">Date From</label>
                      <input type="date" name="to" required class="form-control">
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

            {{-- sales person filter --}}
            <p>
            Sellers: 
              <select id="table-filter">
                <option value="">All</option>
                @foreach (App\Models\Order::where('updated_by', '!=', null)->orderBy('updated_by', 'asc')->get()->groupBy('updated_by') as $key => $order)
                  <option>{{json_decode($key)->admin_name}}</option>

                @endforeach
              </select>
            </p>


              <table id="datatable_report_sales" class="table display nowrap">
                <thead class="thead-light">
                  <tr>
                    <th class="">#</th>
                    <th class="">Date</th>
                    <th class="">Customer</th>
                    <th class="">Sales Person</th>
                    <th class="">Order Number</th>
                    <th class="">Sales Return No</th>
                    <th class="">Supplier Lpo</th>
                    <th class="">Installer Lpo</th>
                    <th class="">Total Amount</th>
                    <th class="">Supplier's Amount</th>
                    <th class="">Installer's Amount</th>
                    <th class="">Profit</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $i = 1;
                    $total = 0;
                    $profit = 0;
                    $gross_margin = 0;
                    $from = Request::get('from') . ' 00:00:00'; 
                    $to = Request::get('to') . ' 23:59:59'; 
                  @endphp

                  @foreach (App\Models\Order::orderBy('id', 'asc')->where('created_at', '>=', $from)->where('created_at', '<=', $to)->get() as $key => $order)

                  <tr>                    
                    <td>{{ $i }}</td>
                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                    <td>{{ $order->name }}</td>
                    @php
                      // finding seller information 
                      $admin_name = '';
                      if ($order->updated_by) {
                        $admin_name = json_decode($order->updated_by)->admin_name;
                      }
                    @endphp
                    <td>{{ $admin_name }}</td>
                    <td> <a href="{{ url('admin/order/show', $order->id) }}">{{ $order->invoice_no }}</a></td>
                    <td></td>
                    <td>
                      @if ($order->supplierLpo)
                      <a href="{{ asset('admin/order/supplierLpo/'. $order->supplierLpo->file) }}" target="_blank">
                        {{ $order->supplierLpo->lpo_no }}
                      </a>
                      @endif
                    </td>
                    <td>
                      @if ($order->installerLpo)
                      <a href="{{ asset('admin/order/installerLpo/'. $order->installerLpo->file) }}" target="_blank">
                        {{ $order->installerLpo->lpo_no }}
                      </a>
                      @endif
                    </td>
                    <td>{{ $order->total }}</td>
                    @php
                    	$seller_amount = 0;
                    	if($order->supplierLpo && $order->supplierLpo->total != null){
                    		$seller_amount = (double)$order->supplierLpo->total;
                    	}
                    @endphp
                    <td>{{ $seller_amount }}</td>
                    @php
                    	$installer_amount = 0;
                    	if($order->installerLpo && $order->installerLpo->total != null){
                    		$installer_amount = (double)$order->installerLpo->total;
                    	}
                    @endphp
                    <td>{{ $installer_amount }}</td>
                    @php
                      $profit = 0;
                    	$profit = (double)$order->total - $seller_amount - $installer_amount;
                    	if ($order->salesReturn == null) {
                        $gross_margin += $profit;
                      }
                    @endphp
                    <td>{{ $profit }}</td>

                  </tr>

                  @if ($order->salesReturn)
                    @php
                      $i++;
                    @endphp

                    <tr>                    
                      <td>{{ $i }}</td>
                      <td>{{ $order->salesReturn->created_at->format('d-m-Y') }}</td>
                      <td>{{ $order->name }}</td>
                      @php
                        // finding seller information 
                        $admin_name = '';
                        if ($order->updated_by) {
                          $admin_name = json_decode($order->updated_by)->admin_name;
                        }
                      @endphp
                      <td>{{ $admin_name }}</td>
                      <td> <a href="{{ url('admin/order/show', $order->id) }}">{{ $order->invoice_no }}</a></td>
                      <td><a href="{{ url('admin/order/show', $order->id) }}">{{ $order->salesReturn->sales_return_no }}</a></td>
                      <td>
                        @if ($order->supplierLpo)
                        <a href="{{ asset('admin/order/supplierLpo/'. $order->supplierLpo->file) }}" target="_blank">
                          {{ $order->supplierLpo->lpo_no }}
                        </a>
                        @endif
                      </td>
                      <td>
                        @if ($order->installerLpo)
                        <a href="{{ asset('admin/order/installerLpo/'. $order->installerLpo->file) }}" target="_blank">
                          {{ $order->installerLpo->lpo_no }}
                        </a>
                        @endif
                      </td>
                      <td>{{ $order->salesReturn->new_total }}</td>
                      @php
                        $seller_amount = 0;
                        if($order->supplierLpo && $order->supplierLpo->total != null){
                          $seller_amount = (double)$order->supplierLpo->total;

                          

                          // jodi return thake to minus hobe
                          $seller_amount -= $order->supplierLpo->return_amount != null ? $order->supplierLpo->return_amount : 0;

                        }
                      @endphp
                      <td>{{ $seller_amount }}</td>
                      @php
                        $installer_amount = 0;
                        if($order->installerLpo && $order->installerLpo->total != null){
                          $installer_amount = (double)$order->installerLpo->total;
                          // jodi return thake to minus hobe
                          $installer_amount -= $order->installerLpo && $order->installerLpo->return_amount != null ? $order->installerLpo->return_amount : 0 ;
                        }
                      @endphp
                      <td>{{ $installer_amount }}</td>
                      @php
                        $return_profit = 0;
                        $return_profit = (double)$order->salesReturn->new_total - $seller_amount - $installer_amount;
                        // dd((double)$order->salesReturn->total);
                        $gross_margin += $return_profit;
                      @endphp
                      <td>{{ $return_profit }}</td>

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
                    <th></th>
                    <th></th>
                    <th>Gross Margin</th>
                    <th>{{ $gross_margin }}</th>
                  </tr>
                </tfoot>
              </table>
            </div><!-- table-wrapper -->

            <div class="text-center mt-3">
              <a href="{{ url('admin/report/gross-margin') }}" class="btn btn-danger">Go Back</a>
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
    	$title = 'Gross Margin Report'
    @endphp
    var table = $('#datatable_report_sales').DataTable({
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
            {
               extend: 'pdf',
               text: 'Pdf',
               title : '{{ $title }}',
            },
        ],

    });
    
    //redraw based on search
      $('#table-filter').on('change', function(){
         table.search(this.value).draw();   
      });
  </script>
@endsection



