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

      @include('backend.report.header', ['page' => 'Vendor'])



      <div class="br-pagebody">
        <div class="br-section-wrapper">

          {{-- if no value in request then take date range else show data --}}
          @if ( !(Request::filled('from') && Request::filled('to')) )
            <div class="">
              <form action="{{ url('admin/report/vendor') }}">

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
                    <th class="" style="text-transform: capitalize;">#</th>
                    <th class="" style="text-transform: capitalize;">Vendor name</th>
                    <th class="" style="text-transform: capitalize;">Type</th>
                    <th class="" style="text-transform: capitalize;">Contact number</th>
                    <th class="" style="text-transform: capitalize;">Email</th>
                    <th class="" style="text-transform: capitalize;">Location </th>
                    <th class="" style="text-transform: capitalize;">Owner name</th>
                    <th class="" style="text-transform: capitalize;">Owner Mobile</th>
                    <th class="" style="text-transform: capitalize;">Total order amount</th>
                    <th class="" style="text-transform: capitalize;">Total order quantity</th>
                    <th class="" style="text-transform: capitalize;">Total amount payable</th>
                    <th class="" style="text-transform: capitalize;">Total amount paid</th>
                    <th class="" style="text-transform: capitalize;">Total amount pending</th>
                  </tr>
                </thead>
                <tbody>

                  @php
                    $final_vendor_total = 0;
                    $final_vendor_quantity = 0;
                    $final_vendor_total_amount = 0;
                    $final_vendor_paid_amount = 0;
                    $from = Request::get('from') . ' 00:00:00'; 
                    $to = Request::get('to') . ' 23:59:59'; 

                    // supplier ar installer ekta variable e nie nea 
                    // sei supplier gula jader lpo dhore order gular date ei range e porse 
                    // $suppliers = App\Models\Supplier::orderBy('id', 'asc')
                    //               ->whereHas('supplierLpos', function($supplierLpos) use($from, $to){
                    //                 $supplierLpos->whereHas('order', function($order) use($from, $to){
                    //                   $order->where('created_at', '>=', $from)->where('created_at', '<=', $to);
                    //                 });
                    //               })->get();

                    // sei installer gula jader order gular date ei date range e porse 
                    // $installers = App\Models\Installer::orderBy('id', 'asc')
                    //               ->whereHas('orders', function($orders) use($from, $to){
                    //                 $orders->where('created_at', '>=', $from)->where('created_at', '<=', $to);
                    //               })->get();


                    $suppliers = App\Models\Supplier::orderBy('id', 'asc')->get();
                    $installers = App\Models\Installer::orderBy('id', 'asc')->get();



                    // $installers = App\Models\Installer::orderBy('id', 'asc')->where('created_at', '>=', $from)->where('created_at', '<=', $to)->get();
                    $all_vendors = $suppliers->toBase()->merge($installers);
                  @endphp

                  {{-- @foreach (App\Models\Order::orderBy('id', 'asc')->get() as $supplier) --}}
                  @foreach ($all_vendors as $vendor)
                    {{-- @dd(get_class($vendor) == "App\Models\Supplier") --}}

                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $vendor->company_name }}</td>
                    @php
                      if ( get_class($vendor) == "App\Models\Supplier" ) {
                        $type = "Supplier";
                      }else{
                        $type = "Installer";
                      }
                    @endphp
                    <td>{{ $type }}</td>
                    <td>{{ $type == "Supplier" ? $vendor->phone : $vendor->mobile }}</td>
                    <td>{{ $vendor->email }}</td>
                    <td>{{ $vendor->address }}</td>
                    <td>{{ $vendor->name }}</td>
                    <td>{{ $vendor->owner_number }}</td>
                    @php
                    	$vendor_total = 0;
                    	$vendor_quantity = 0;
                    	$vendor_total_amount = 0;
                      $vendor_paid_amount = 0;

                      // jodi supplier hoi calculate from supplierLpo
                      if ($type == "Supplier") {
                        // calculating supplier lpo totals
                        // order from ebong to date range e hote hobe
                        foreach ($vendor->supplierLpos->where('created_at', '>=', $from)->where('created_at', '<=', $to) as $supplierLpo) {
                          if ($supplierLpo->order) {

                            // jodi return thake tahole return er total count hobe
                            if ($supplierLpo->order->salesReturn) {
                              $vendor_total += $supplierLpo->order->salesReturn->new_total;
                            }else{
                              $vendor_total += $supplierLpo->order->total;
                            }


                            // add this quantity to total quantity
                            if ($supplierLpo->order->orderProducts->count() > 0) {
                              foreach ($supplierLpo->order->orderProducts as $orderProduct) {
                                

                                // jodi salesReturn thake tahole ei product er ei amount gula minus hobe
                                if ($supplierLpo->order->salesReturn && $supplierLpo->order->salesReturn->salesReturnProducts) {
                                  // product id die search/match hobe
                                  $salesReturnProducts = $supplierLpo->order->salesReturn->salesReturnProducts;
                                  $salesReturnProduct = $salesReturnProducts->where('product_id', $orderProduct->product_id);
                                  $salesReturnProduct = count($salesReturnProduct) > 0 ? $salesReturnProduct->first() : null;

                                  $vendor_quantity += $orderProduct->quantity - $salesReturnProduct->quantity;


                                }else{
                                  $vendor_quantity += $orderProduct->quantity;
                                }

                              }
                            }
                          }

                          //add paid amount here
                          if ($supplierLpo->total != null) {
                            $vendor_total_amount += $supplierLpo->total ? $supplierLpo->total : 0;

                            // jodi lpo return amount thake tahole eta minus hobe
                            if ($supplierLpo->return_amount != null) {
                              $vendor_total_amount -= $supplierLpo->return_amount;
                            }

                            $vendor_paid_amount += $supplierLpo->paid ? $supplierLpo->paid : 0;
                          }                          
                        }
                      }else{
                        //find all installerLpos of this installer

                        // jodi installer hoi calculate from installerLpo //order==installerLpo
                        // dd($vendor->orders);
                        foreach ($vendor->orders as $order) {

                          // order er jodi installerLpo thake tahole total and quantity add koro
                          if ($order->installerLpo && $order->installerLpo->created_at >= $from && $order->installerLpo->created_at <= $to) {


                            // jodi return thake tahole return er total count hobe
                            if ($order->salesReturn) {
                              $vendor_total += $order->salesReturn->new_total;
                            }else{
                              $vendor_total += $order->total;
                            }


                            // add this quantity to total quantity
                            if ($order->orderProducts->count() > 0) {
                              foreach ($order->orderProducts as $orderProduct) {
                                

                                // jodi salesReturn thake tahole ei product er ei amount gula minus hobe
                                if ($order->salesReturn && $order->salesReturn->salesReturnProducts) {
                                  // product id die search/match hobe
                                  $salesReturnProducts = $order->salesReturn->salesReturnProducts;
                                  $salesReturnProduct = $salesReturnProducts->where('product_id', $orderProduct->product_id);
                                  $salesReturnProduct = count($salesReturnProduct) > 0 ? $salesReturnProduct->first() : null;

                                  $vendor_quantity += $orderProduct->quantity - $salesReturnProduct->quantity;


                                }else{
                                  $vendor_quantity += $orderProduct->quantity;
                                }
                              }
                            } 

                            //add paid amount here
                            $vendor_total_amount += $order->installerLpo->total ? $order->installerLpo->total : 0 ;

                            // jodi lpo return amount thake tahole eta minus hobe
                            if ($order->installerLpo->return_amount != null) {
                              $vendor_total_amount -= $order->installerLpo->return_amount;
                            }

                            $vendor_paid_amount += $order->installerLpo->paid ? $order->installerLpo->paid : 0 ;
                          }  

                        }
                      }

                    	// add values for final totals                    	
	                    $final_vendor_total += $vendor_total;
	                    $final_vendor_quantity += $vendor_quantity;
                      $final_vendor_total_amount += $vendor_total_amount;
                      $final_vendor_paid_amount += $vendor_paid_amount;
                    @endphp
                    <td>{{ $vendor_total }}</td>
                    <td>{{ $vendor_quantity }}</td>
                    <td>{{ $vendor_total_amount }}</td>
                    <td>{{ $vendor_paid_amount }}</td>
                    <td>{{ $vendor_total_amount - $vendor_paid_amount }}</td>
                  </tr>
                  @endforeach 
                </tbody>
                <tfoot class="thead-light tfoot">
                  <tr>
                    <th></th>
                    <th>Total</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>{{$final_vendor_total}}</th>
                    <th>{{$final_vendor_quantity}}</th>
                    <th>{{$final_vendor_total_amount}}</th>
                    <th>{{$final_vendor_paid_amount}}</th>
                    <th>{{$final_vendor_total_amount - $final_vendor_paid_amount}}</th>
                  </tr>
                </tfoot>
              </table>
            </div><!-- table-wrapper -->

            <div class="text-center mt-3">
              <a href="{{ url('admin/report/vendor') }}" class="btn btn-danger">Go Back</a>
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
      $title = 'Vendor Report'
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



