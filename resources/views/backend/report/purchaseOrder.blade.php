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

      @include('backend.report.header', ['page' => 'Purchase Order By Vendor'])



      <div class="br-pagebody">
        <div class="br-section-wrapper">

          {{-- if no value in request then take date range else show data --}}
          @if ( !(Request::filled('from') && Request::filled('to')) )
            <div class="">
              <form action="{{ url('admin/report/purchase-order') }}">

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
                    <th class="" style="text-transform: capitalize;">vendor account number</th>
                    <th class="" style="text-transform: capitalize;">vendor invoice number</th>
                    <th class="" style="text-transform: capitalize;">Supplier Lpo No </th>
                    <th class="" style="text-transform: capitalize;">Order Invoice No </th>
                    <th class="" style="text-transform: capitalize;">vendor return no</th>
                    <th class="" style="text-transform: capitalize;">Details</th>
                    <th class="" style="text-transform: capitalize;">Invoice Total</th>
                    <th class="" style="text-transform: capitalize;">Return Amount</th>
                    <th class="" style="text-transform: capitalize;">Total</th>
                  </tr>
                </thead>
                <tbody>

                  @php
                  	$final_order_total = 0;
                    $from = Request::get('from') . ' 00:00:00'; 
                    $to = Request::get('to') . ' 23:59:59'; 
                  @endphp

                  @foreach (App\Models\SupplierLpo::orderBy('id', 'asc')->where('created_at', '>=', $from)->where('created_at', '<=', $to)->get() as $supplierLpo)

                  		@if ($supplierLpo->supplier)
          							<tr>
          								<td>{{ $loop->index + 1 }}</td>
          								<td>{{ $supplierLpo->supplier->company_name }}</td>
          								<td>000{{ $supplierLpo->supplier->id }}</td>
          								<td>{{ $supplierLpo->invoice }}</td>
          								<td>								
          									<a href="{{ asset('admin/order/supplierLpo/'. $supplierLpo->file) }}" target="_blank">
          										{{ $supplierLpo->lpo_no }}
          									</a>
          								</td>
          								<td>
          									@if ($supplierLpo->order)				
          										<a href="{{ asset('admin/order/show/'. $supplierLpo->order->id) }}" target="_blank">
          											{{ $supplierLpo->order->invoice_no }}
          										</a>									
          									@endif	
          								</td>
                          <td></td>
          								<td>
          									<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{ $supplierLpo->id }}">Check Details</button>
          								</td>
          								<td>{{ $supplierLpo->total }}</td>
                          <td></td>
                          <td>{{ $supplierLpo->total }}</td>
          							</tr>


                        {{-- jodi return thake tahole extra row hobe --}}
                        @if ($supplierLpo->return_amount)
                          
                        <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td>{{ $supplierLpo->supplier->company_name }}</td>
                          <td>000{{ $supplierLpo->supplier->id }}</td>
                          <td>{{ $supplierLpo->invoice }}</td>
                          <td>                
                            <a href="{{ asset('admin/order/supplierLpo/'. $supplierLpo->file) }}" target="_blank">
                              {{ $supplierLpo->lpo_no }}
                            </a>
                          </td>
                          <td>
                            @if ($supplierLpo->order)       
                              <a href="{{ asset('admin/order/show/'. $supplierLpo->order->id) }}" target="_blank">
                                {{ $supplierLpo->order->invoice_no }}
                              </a>                  
                            @endif  
                          </td>
                          <td>{{ $supplierLpo->return_no }}</td>
                          <td>
                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{ $supplierLpo->id }}">Check Details</button>
                          </td>
                          <td></td>
                          <td>-{{ $supplierLpo->return_amount }}</td>
                          <td>{{ $supplierLpo->total - $supplierLpo->return_amount  }}</td>
                        </tr>
                        @endif

          						@else	 
          							{{-- supplier information some how na thakle --}}
          							<tr>
          								<td>{{ $loop->index + 1 }}</td>
          								<td></td>
          								<td></td>
          								<td>{{ $supplierLpo->invoice }}</td>
          								<td>								
          									<a href="{{ asset('admin/order/supplierLpo/'. $supplierLpo->file) }}" target="_blank">
          										{{ $supplierLpo->lpo_no }}
          									</a>
          								</td>
          								<td>
          									@if ($supplierLpo->order)				
          										<a href="{{ asset('admin/order/show/'. $supplierLpo->order->id) }}" target="_blank">
          											{{ $supplierLpo->order->invoice_no }}
          										</a>									
          									@endif	
          								</td>	
                          <td></td>							
          								<td>
          									<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{ $supplierLpo->id }}">Check Details</button>
          								</td>
          								<td>{{ $supplierLpo->order ? $supplierLpo->order->total : '' }}</td>
                          <td></td>
                          <td></td>
          							</tr>                	
                  		@endif

                  		@php
                  			$final_order_total += $supplierLpo->total;
                        if ($supplierLpo->return_no) {
                          $final_order_total -= $supplierLpo->return_amount;
                        }
                  		@endphp


          						<!-- Modal -->
          						<div class="modal fade" id="exampleModalCenter{{ $supplierLpo->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          						  <div class="modal-dialog modal-dialog-centered" role="document">
          						    <div class="modal-content">
          						      <div class="modal-header">
          						        <h5 class="modal-title" id="exampleModalCenterTitle">Order Details</h5>
          						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          						          <span aria-hidden="true">&times;</span>
          						        </button>
          						      </div>
          						      <div class="modal-body text-center">
          						      	<div class="row py-3">
          						      		<div class="col-md-3"><strong>Tyre Name</strong></div>
          						      		<div class="col-md-3"><strong>Quantity</strong></div>
          						      		<div class="col-md-3"><strong>Tyre size</strong></div>
          						      		<div class="col-md-3"><strong>Tyre brand</strong></div>
          						      	</div>
          						      	@if ($supplierLpo->order && $supplierLpo->order->orderProducts)
          							      	@foreach ($supplierLpo->order->orderProducts as $orderProduct)
          								      	<div class="row py-3">
          								      		<div class="col-md-3">{{ $orderProduct->product ? $orderProduct->product->name : '' }}</div>
          								      		<div class="col-md-3">{{ $orderProduct->quantity }}</div>
          								      		<div class="col-md-3">{{ $orderProduct->product ? $orderProduct->product->width . $orderProduct->product->length . $orderProduct->product->rim_category . $orderProduct->product->rim_size : '' }}</div>
          								      		<div class="col-md-3">{{ $orderProduct->product && $orderProduct->product->pattern &&  $orderProduct->product->pattern->brand ? $orderProduct->product->pattern->brand->name : '' }}</div>
          								      	</div>
          							      	@endforeach
          						      	@endif
          						      </div>
          						      <div class="modal-footer">
          						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          						      </div>
          						    </div>
          						  </div>
          						</div>

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
                    <th>Total</th>
                    <th>{{ $final_order_total }}</th>
                  </tr>
                </tfoot>
              </table>
            </div><!-- table-wrapper -->

            <div class="text-center mt-3">
              <a href="{{ url('admin/report/purchase-order') }}" class="btn btn-danger">Go Back</a>
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
      $title = 'Purchase Order By Vendor Report'
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



