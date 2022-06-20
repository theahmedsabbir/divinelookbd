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

      @include('backend.report.header', ['page' => 'Sales'])



      <div class="br-pagebody">
        <div class="br-section-wrapper">

          {{-- if no value in request then take date range else show data --}}

          @if ( Request::filled('from') && Request::filled('to') )


            <div class="table-wrapper table-responsive pb-5">

              <table id="datatable3" class="table display nowrap">
                <thead class="thead-light">

                  <tr>
                    <th class="">#</th>
                    <th class="">Customer Name</th>
                    <th class="">Total Amount</th>
                    <th class="">Sales Order Number</th>
                    <th class="">Date</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $i = 1;
                    $total = 0;
                    $from = Request::get('from') . ' 00:00:00'; 
                    $to = Request::get('to') . ' 23:59:59'; 
                    // dd($to);
                  @endphp

                  @foreach (App\Models\Order::orderBy('id', 'asc')->where('created_at', '>=', $from)->where('created_at', '<=', $to)->get() as $order)


                  <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $order->user->name ?? '' }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td> <a href="{{ url('admin/order/view', $order->id) }}">#{{ $order->id }}</a></td>
                    <td>{{ $order->created_at->format('d-m-Y') }}</td>

                  </tr>
                  @php
                    $i++;
                    $total += $order->total_price;
                  @endphp
                  @endforeach 
                </tbody>
                <tfoot class="thead-light tfoot">
                  <tr>
                    <th></th>
                    <th>Total</th>
                    <th>{{ $total }}</th>
                    <th></th>
                    <th></th>
                  </tr>
                </tfoot>
              </table>
            </div><!-- table-wrapper -->

            <div class="text-center mt-3">
              <a href="{{ url('admin/report/sales') }}" class="btn btn-danger">Go Back</a>
            </div>


          @elseif ( Request::filled('user_id') )


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
                    <th class="">Customer Name</th>
                    <th class="">Sales Person</th>
                    <th class="">Total Amount</th>
                    <th class="">Fixing Location</th>
                    <th class="">Sales Order Number</th>
                    <th class="">Supplier Lpo</th>
                    <th class="">Installer Lpo</th>
                    <th class="">Date</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $total = 0;
                  @endphp
                  {{-- @foreach (App\Models\Order::orderBy('id', 'asc')->get() as $order) --}}
                  @foreach (App\Models\Order::orderBy('id', 'asc')->where('user_id', Request::get('user_id'))->get() as $order)
                  @php
                    // if ($order->installerLpo) {
                    //   $total += $order->total;
                    // }
                      $total += $order->total;
                  @endphp


                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $order->name }}</td>
                    @php
                      // finding seller information 
                      $admin_name = '';
                      if ($order->updated_by) {
                        $admin_name = json_decode($order->updated_by)->admin_name;
                      }
                    @endphp
                    <td>{{ $admin_name }}</td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->installer ? $order->installer->address : $order->address }}</td>
                    <td> <a href="{{ url('admin/order/show', $order->id) }}">{{ $order->invoice_no }}</a></td>
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
                    <td>{{ $order->created_at->format('d-m-Y') }}</td>

                  </tr>
                  @endforeach 
                </tbody>
                <tfoot class="thead-light tfoot">
                  <tr>
                    <th></th>
                    <th></th>
                    <th>Total</th>
                    <th>{{ $total }}</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                </tfoot>
              </table>
            </div><!-- table-wrapper -->

            <div class="text-center mt-3">
              <a href="{{ url('admin/report/sales') }}" class="btn btn-danger">Go Back</a>
            </div>

          @else

            <div class="">
              <form action="{{ url('admin/report/sales') }}">


                <div class="row">
                  <div class="col-md-6">                    
                    <div class="form-group">
                      <label for="">Date From</label>
                      <input type="date" name="from" required class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">                    
                    <div class="form-group">
                      <label for="">Date To</label>
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
      $title = 'Sales Report'
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




