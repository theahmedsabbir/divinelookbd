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

      @include('backend.report.header', ['page' => 'Sales By Product'])



      <div class="br-pagebody">
        <div class="br-section-wrapper">

          {{-- if no value in request then take date range else show data --}}
          @if ( 0 )
          {{-- @if ( !(Request::filled('from') && Request::filled('to')) ) --}}
            <div class="">
              <form action="{{ url('admin/report/sales-by-size') }}">

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
          @else

            <div class="table-wrapper table-responsive pb-5">
              <table id="datatable3" class="table display nowrap">
                <thead class="thead-light">
                  <tr>
                    <th class="">#</th>
                    <th class="">Product</th>
                    <th class="">Quantity</th>
                    <th class="">Amount</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $grand_quantity = 0;
                    $grand_total = 0;
                  @endphp

                  {{-- @dd(App\Models\OrderDetail::all()->groupBy('product_id')); --}}
                  @foreach (App\Models\OrderDetail::all()->groupBy('product_id') as $product_id => $orderDetails)   
                        @php
                          $product = App\Models\Product::find($product_id);

                          if ($product == null) {
                            continue;
                          }

                          // count total quantity
                          $total_quantity = 0;
                          $total_price = 0;

                          foreach ($orderDetails as $orderDetail) {
                            $total_quantity += $orderDetail->qty;
                            $total_price += $orderDetail->price;
                          }

                          // add to grand total and price
                          $grand_quantity += $total_quantity;
                          $grand_total += $total_price;
                        @endphp
                        <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td>{{ $product->name }}</td>
                          <td>{{ $total_quantity }}</td>
                          <td>{{ $total_price }}</td>
                        </tr>
                   @endforeach 


                </tbody>
                <tfoot class="thead-light tfoot">
                  <tr>
                    <th></th>
                    <th>Total</th>
                    <th>{{ $grand_quantity }}</th>
                    <th>{{ $grand_total }}</th>
                  </tr>
                </tfoot>
              </table>
            </div><!-- table-wrapper -->

            <div class="text-center mt-3">
              <a href="{{ url('admin/report/sales-by-product') }}" class="btn btn-danger">Go Back</a>
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
      $title = 'Sales By Size Report'
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
            {
               extend: 'pdf',
               text: 'Pdf',
               title : '{{ $title }}',
            },
        ],

    });
  </script>
@endsection



