@extends('backend.master')

@section('content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-cart-outline"></i>
        <div>
            <h4>Order details</h4>
            <p class="mg-b-0">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                / <a href="{{ url('admin/order/index') }}">Orders</a> / Order details /
            </p>
        </div>
    </div>
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="table-wrapper table-responsive">
                <h2>Order</h2>
                <table id="" class="table display nowrap">
                    <thead>
                    <tr>
                        <th class="">#</th>
                        <th class="">Customer Name</th>
                        <th class="">Total Qty</th>
                        <th class="">Total Price</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{ $order->user->name ?? 'No user name found' }}</td>
                            <td>{{ $order->total_qty ?? '00' }} Pcs</td>
                            <td>৳ {{ number_format($order->total_price,2) ?? '00' }}</td>
                        </tr>
                    </tbody>
                </table>
                <hr/>
                <h2>Order details</h2>
                <table id="" class="table display nowrap">
                    <thead>
                    <tr>
                        <th class="">#</th>
                        <th class="">Image</th>
                        <th class="">Product Name</th>
                        <th class="">Qty</th>
                        <th class="">Price</th>
                        <th class="">Total Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->orderDetails as $orderDetail)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>
                                <img src="{{ asset('/product/'.$orderDetail->product->image) }}" height="50" width="50" />
                            </td>
                            <td>
                                {{ $orderDetail->product->name ?? 'No  name found' }}
                            </td>
                            <td>{{ $orderDetail->qty ?? '00' }} Pc</td>
                            <td>৳ {{ number_format($orderDetail->price,2) ?? '00' }}</td>
                            <td>৳ {{ number_format($orderDetail->qty*$orderDetail->price,2) ?? '00' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr/>
                <h2>Shipping Address</h2>
                <table id="" class="table display nowrap">
                    <thead>
                    <tr>
                        <th class="">#</th>
                        <th class="">Address</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{ $order->user->shipping[0]->address ?? 'No user name found' }}</td>
                    </tr>
                    </tbody>
                </table>
            </div><!-- table-wrapper -->

        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->
@endsection
