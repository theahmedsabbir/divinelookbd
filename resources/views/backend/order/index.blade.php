@extends('backend.master')

@section('content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-cart-outline"></i>
        <div>
            <h4>Manage Order</h4>
            <p class="mg-b-0">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                 / Orders /
            </p>
        </div>
    </div>
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="table-wrapper table-responsive">
                <table id="datatable3" class="table display nowrap">
                    <thead>
                    <tr>
                        <th class="">#</th>
                        <th class="">Customer Name</th>
                        <th class="">Image</th>
                        <th class="">Product Name</th>
                        <th class="">Total Qty</th>
                        <th class="">Total Price</th>
                        <th class="notexport">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $order[0]->user->name ?? 'No user name found' }}</td>
                            <td>
                                @foreach($order[0]->orderDetails as $orderDetails)
                                    @if ($orderDetails->product && $orderDetails->product->image)                                        
                                        <img src="{{ asset('/product/'.$orderDetails->product->image) }}" height="50" width="50" />
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($order[0]->orderDetails as $orderDetails)
                                    {{ $orderDetails->product->name ?? 'No  name found' }} <br/>
                                @endforeach
                            </td>
                            <td>{{ $order[0]->total_qty ?? '00' }}</td>
                            <td>৳ {{ number_format($order[0]->total_price,2) ?? '00' }}</td>
                            <td>
                                <a href="{{ url('/admin/order/view/'.$order[0]->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ url('/admin/order/delete/'.$order[0]->id) }}" onclick="return confirm('Are you sure permanently this order ?')" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->

        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->
@endsection
