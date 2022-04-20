@extends('backend.master')

@section('content')

<div class="br-pagetitle">
<i class="icon ion-ios-home-outline"></i>
<div>
  <h4><span style="text-transform: capitalize;">{{ Session::get('admin_name') }}</span> Dashboard</h4>
  <p class="mg-b-0">Welcome Admin, You can manage all the tasks from dashboard.</p>
</div>
</div>
{{-- @dd(Session::all()) --}}
<div class="br-pagebody">
<div class="row row-sm">
  <div class="col-sm-6 col-xl-3">
    <div class="bg-info rounded overflow-hidden" style="cursor: pointer;" onclick="location.href='{{ url('admin/user/index') }}'">
      <div class="pd-x-20 pd-t-20 d-flex align-items-center">
        <i class="icon ion-person-stalker  tx-60 lh-0 tx-white op-7"></i>
        <div class="mg-l-20">
          <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Users</p>
          <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
            {{ App\Models\User::count() }}
          </p>
        </div>
      </div>
      <div id="ch1" class="ht-50 tr-y-1"></div>
    </div>
  </div><!-- col-3 -->
  <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
    <div class="bg-purple rounded overflow-hidden" style="cursor: pointer;" onclick="location.href='{{ url('admin/brand/index') }}'">
      <div class="pd-x-20 pd-t-20 d-flex align-items-center">
        <i class="ion ion-android-people  tx-60 lh-0 tx-white op-7"></i>
        <div class="mg-l-20">
          <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Brands</p>
          <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">            
            {{ App\Models\Brand::count() }}
          </p>
        </div>
      </div>
      <div id="ch3" class="ht-50 tr-y-1"></div>
    </div>
  </div><!-- col-3 -->
  <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
    <div class="bg-teal rounded overflow-hidden" style="cursor: pointer;" onclick="location.href='{{ url('admin/product/index') }}'">
      <div class="pd-x-20 pd-t-20 d-flex align-items-center">
        <i class="ion ion-android-people  tx-60 lh-0 tx-white op-7"></i>
        <div class="mg-l-20">
          <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Products</p>
          <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">            
            {{ App\Models\Product::count() }}
          </p>
        </div>
      </div>
      <div id="ch2" class="ht-50 tr-y-1"></div>
    </div>
  </div><!-- col-3 -->
  <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
    <div class="bg-primary rounded overflow-hidden" style="cursor: pointer;" onclick="location.href='{{ url('admin/order/index') }}'">
      <div class="pd-x-20 pd-t-20 d-flex align-items-center">
        <i class="ion ion-android-list tx-60 lh-0 tx-white op-7"></i>
        <div class="mg-l-20">
          <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Orders</p>
          <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">            
            {{ App\Models\Order::count() }}
          </p>
        </div>
      </div>
      <div id="ch4" class="ht-50 tr-y-1"></div>
    </div>
  </div><!-- col-3 -->
</div><!-- row -->

</div><!-- br-pagebody -->

@endsection
