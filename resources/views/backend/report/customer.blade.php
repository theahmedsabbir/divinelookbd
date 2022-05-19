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

      @include('backend.report.header', ['page' => 'Customer'])



      <div class="br-pagebody">
        <div class="br-section-wrapper">

          {{-- if no value in request then take date range else show data --}}

          @if ( !(Request::filled('from') && Request::filled('to')) )
            <div class="">
              <form action="{{ url('admin/report/customer') }}">


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

              <table id="datatable_report_sales" class="table display nowrap">
                <thead class="thead-light">

                  <tr>
                    <th class="">#</th>
                    <th class="">Customer Name</th>
                    <th class="">Customer Email</th>
                    <th class="">Contact Number</th>
                    <th class="">Total Amount</th>
                  </tr>
                </thead>
                <tbody>
					@php
            $i = 1;
						$grand_total = 0;
						$from = Request::get('from') . ' 00:00:00'; 
						$to = Request::get('to') . ' 23:59:59'; 

            // dd(App\Models\Order::orderBy('id', 'asc')->where('created_at', '>=', $from)->where('created_at', '<=', $to)->get()->groupBy('user_id'));
					@endphp
					@foreach (App\Models\Order::orderBy('id', 'asc')->where('created_at', '>=', $from)->where('created_at', '<=', $to)->get()->groupBy('user_id') as $user_id => $user_orders)



              {{-- jodi user id thake  --}}
              @if ($user_id != null && $user_id != "")

                @php
                  $user = App\Models\User::find($user_id); //ei user nie asha
                  if(!$user){continue;}
                  $this_user_total = 0; //ei user er total koto 
                @endphp

                @foreach ($user_orders as $key => $order)
                  {{-- ei user er sob total add koro  --}}
                  {{-- ar return thakle return ta add koro --}}
                  @php
                    $this_user_total += $order->total_price;
                  @endphp
                @endforeach

                @php   
                    // ei total grand total e add koro
                    $grand_total += $this_user_total;
                @endphp

                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->phone }}</td>
                  <td>{{ $this_user_total }}</td>
                </tr>
                @php
                  $i++;
                @endphp

              @endif




						@php
							// $grand_total += $this_user_total;
						@endphp
					@endforeach 
                </tbody>
                <tfoot class="thead-light tfoot">
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Total</th>
                    <th>{{ $grand_total }}</th>
                  </tr>
                </tfoot>
              </table>
            </div><!-- table-wrapper -->

            <div class="text-center mt-3">
              <a href="{{ url('admin/report/customer') }}" class="btn btn-danger">Go Back</a>
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
      $title = 'Customer Report'
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
  </script>
@endsection




