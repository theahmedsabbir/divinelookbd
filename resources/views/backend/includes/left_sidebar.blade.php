
    <div class="br-logo"><a href="{{ url('admin/dashboard') }}">
      <img src="{{ asset('/frontend/') }}/assets/images/logo-side.png" alt="img" style="">
      {{-- <span>[</span><i>DivineLook</i><span>]</span>BD</a> --}}
    </div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="{{ url('admin/dashboard') }}" class="br-menu-link {{ Request::is('admin/dashboard') ? 'active' : ''}}">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Manage Users</label>

        {{-- user --}}
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub {{ Request::is('admin/user*') ? 'show-sub' : ''}}">
            <i class="menu-item-icon icon ion-person-stalker tx-24"></i>
            {{-- <i class="menu-item-icon fa fa-star tx-16"></i> --}}
            <span class="menu-item-label">Users</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub" style="{{ Request::is('admin/user*') ? 'display: block;' : 'display: none;'}}">

            <li class="sub-item">
              <a href="{{ url('admin/user/index') }}" class="sub-link {{ Request::is('admin/user/index') ? 'active' : ''}}">Manage</a>
            </li>
          </ul>
        </li>


        <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Manage Products</label>

          {{-- category --}}
          <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ Request::is('admin/category*') ? 'show-sub' : ''}}">
              <i class="menu-item-icon icon ion-pound tx-24"></i>
              {{-- <i class="menu-item-icon fa fa-star tx-16"></i> --}}
              <span class="menu-item-label">Category</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub" style="{{ Request::is('admin/category*') ? 'display: block;' : 'display: none;'}}">

              <li class="sub-item">
                <a href="{{ url('admin/category/index') }}" class="sub-link {{ Request::is('admin/category/index') ? 'active' : ''}}">Manage</a>
              </li>
              <li class="sub-item">
                <a href="{{ url('admin/category/create') }}" class="sub-link {{ Request::is('admin/category/create') ? 'active' : ''}}">Add</a>
              </li>
            </ul>
          </li>

          {{-- brand --}}
          <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ Request::is('admin/brand*') ? 'show-sub' : ''}}">
              <i class="menu-item-icon icon ion-star tx-24"></i>
              {{-- <i class="menu-item-icon fa fa-star tx-16"></i> --}}
              <span class="menu-item-label">Brand</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub" style="{{ Request::is('admin/brand*') ? 'display: block;' : 'display: none;'}}">

              <li class="sub-item">
                <a href="{{ url('admin/brand/index') }}" class="sub-link {{ Request::is('admin/brand/index') ? 'active' : ''}}">Manage</a>
              </li>
              <li class="sub-item">
                <a href="{{ url('admin/brand/create') }}" class="sub-link {{ Request::is('admin/brand/create') ? 'active' : ''}}">Add</a>
              </li>
            </ul>
          </li>

          <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ Request::is('admin/product*') ? 'show-sub' : ''}}">
              <i class="menu-item-icon icon ion-tshirt-outline tx-24"></i>
              {{-- <i class="menu-item-icon fa fa-star tx-16"></i> --}}
              <span class="menu-item-label">Product</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub" style="{{ Request::is('admin/product*') ? 'display: block;' : 'display: none;'}}">

              <li class="sub-item">
                <a href="{{ url('admin/product/index') }}" class="sub-link {{ Request::is('admin/product/index') ? 'active' : ''}}">Manage</a>
              </li>
              <li class="sub-item">
                <a href="{{ url('admin/product/create') }}" class="sub-link {{ Request::is('admin/product/create') ? 'active' : ''}}">Add</a>
              </li>
            </ul>
          </li>



          <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Manage Orders</label>

          <li class="br-menu-item">
              <a href="#" class="br-menu-link with-sub {{ Request::is('admin/order*') ? 'show-sub' : ''}}">
                  <i class="menu-item-icon icon ion-ios-cart-outline tx-24"></i>
                  {{-- <i class="menu-item-icon fa fa-star tx-16"></i> --}}
                  <span class="menu-item-label">Order</span>
              </a><!-- br-menu-link -->
              <ul class="br-menu-sub" style="{{ Request::is('admin/order*') ? 'display: block;' : 'display: none;'}}">

                  <li class="sub-item">
                      <a href="{{ url('admin/order/index') }}" class="sub-link {{ Request::is('admin/order/index') ? 'active' : ''}}">Manage</a>
                  </li>
              </ul>
          </li>

          <li class="br-menu-item">
              <a href="#" class="br-menu-link with-sub {{ Request::is('admin/stock*') ? 'show-sub' : ''}}">
                  <i class="menu-item-icon icon ion-ios-cart-outline tx-24"></i>
                  {{-- <i class="menu-item-icon fa fa-star tx-16"></i> --}}
                  <span class="menu-item-label">Stock</span>
              </a><!-- br-menu-link -->
              <ul class="br-menu-sub" style="{{ Request::is('admin/order*') ? 'display: block;' : 'display: none;'}}">

                  <li class="sub-item">
                      <a href="{{ url('admin/stock/index') }}" class="sub-link {{ Request::is('admin/stock/index') ? 'active' : ''}}">Manage</a>
                  </li>
              </ul>
          </li>

          <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Settings</label>

          {{-- banner/slider --}}
          <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ Request::is('admin/banner/slider*') ? 'show-sub' : ''}}">
              <i class="menu-item-icon icon ion-navicon-round tx-24"></i>
              {{-- <i class="menu-item-icon fa fa-star tx-16"></i> --}}
              <span class="menu-item-label">Sliders</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub" style="{{ Request::is('admin/banner/slider*') ? 'display: block;' : 'display: none;'}}">

              <li class="sub-item">
                <a href="{{ url('admin/banner/slider/index') }}" class="sub-link {{ Request::is('admin/banner/slider/index') ? 'active' : ''}}">Manage</a>
              </li>
              <li class="sub-item">
                <a href="{{ url('admin/banner/slider/create') }}" class="sub-link {{ Request::is('admin/banner/slider/create') ? 'active' : ''}}">Add</a>
              </li>
            </ul>
          </li>

          {{-- banner/side-banner --}}
          <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ Request::is('admin/banner/side-banner*') ? 'show-sub' : ''}}">
              <i class="menu-item-icon icon ion-arrow-right-c tx-24"></i>
              {{-- <i class="menu-item-icon fa fa-star tx-16"></i> --}}
              <span class="menu-item-label">Side Banners</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub" style="{{ Request::is('admin/banner/side-banner*') ? 'display: block;' : 'display: none;'}}">

              <li class="sub-item">
                <a href="{{ url('admin/banner/side-banner/index') }}" class="sub-link {{ Request::is('admin/banner/side-banner/index') ? 'active' : ''}}">Manage</a>
              </li>
              <li class="sub-item">
                <a href="{{ url('admin/banner/side-banner/create') }}" class="sub-link {{ Request::is('admin/banner/side-banner/create') ? 'active' : ''}}">Add</a>
              </li>
            </ul>
          </li>

          {{-- banner/mid-banner --}}
          <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ Request::is('admin/banner/mid-banner*') ? 'show-sub' : ''}}">
              <i class="menu-item-icon icon ion-arrow-down-c tx-24"></i>
              {{-- <i class="menu-item-icon fa fa-star tx-16"></i> --}}
              <span class="menu-item-label">Mid Banners</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub" style="{{ Request::is('admin/banner/mid-banner*') ? 'display: block;' : 'display: none;'}}">

              <li class="sub-item">
                <a href="{{ url('admin/banner/mid-banner/index') }}" class="sub-link {{ Request::is('admin/banner/mid-banner/index') ? 'active' : ''}}">Manage</a>
              </li>
              <li class="sub-item">
                <a href="{{ url('admin/banner/mid-banner/create') }}" class="sub-link {{ Request::is('admin/banner/mid-banner/create') ? 'active' : ''}}">Add</a>
              </li>
            </ul>
          </li>

          {{-- banner/full-banner --}}
          <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ Request::is('admin/banner/full-banner*') ? 'show-sub' : ''}}">
              <i class="menu-item-icon icon ion-arrow-swap tx-24"></i>
              {{-- <i class="menu-item-icon fa fa-star tx-16"></i> --}}
              <span class="menu-item-label">Full Banners</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub" style="{{ Request::is('admin/banner/full-banner*') ? 'display: block;' : 'display: none;'}}">

              <li class="sub-item">
                <a href="{{ url('admin/banner/full-banner/index') }}" class="sub-link {{ Request::is('admin/banner/full-banner/index') ? 'active' : ''}}">Manage</a>
              </li>
              <li class="sub-item">
                <a href="{{ url('admin/banner/full-banner/create') }}" class="sub-link {{ Request::is('admin/banner/full-banner/create') ? 'active' : ''}}">Add</a>
              </li>
            </ul>
          </li>

          {{-- banner/popup --}}
          <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ Request::is('admin/banner/popup*') ? 'show-sub' : ''}}">
              <i class="menu-item-icon icon ion-arrow-expand tx-24"></i>
              {{-- <i class="menu-item-icon fa fa-star tx-16"></i> --}}
              <span class="menu-item-label">Popups</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub" style="{{ Request::is('admin/banner/popup*') ? 'display: block;' : 'display: none;'}}">

              <li class="sub-item">
                <a href="{{ url('admin/banner/popup/index') }}" class="sub-link {{ Request::is('admin/banner/popup/index') ? 'active' : ''}}">Manage</a>
              </li>
              <li class="sub-item">
                <a href="{{ url('admin/banner/popup/create') }}" class="sub-link {{ Request::is('admin/banner/popup/create') ? 'active' : ''}}">Add</a>
              </li>
            </ul>
          </li>

          {{-- banner/gallery --}}
          <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ Request::is('admin/banner/gallery*') ? 'show-sub' : ''}}">
              <i class="menu-item-icon icon ion-images tx-24"></i>
              {{-- <i class="menu-item-icon fa fa-star tx-16"></i> --}}
              <span class="menu-item-label">Gallery</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub" style="{{ Request::is('admin/banner/gallery*') ? 'display: block;' : 'display: none;'}}">

              <li class="sub-item">
                <a href="{{ url('admin/banner/gallery/index') }}" class="sub-link {{ Request::is('admin/banner/gallery/index') ? 'active' : ''}}">Manage</a>
              </li>
              <li class="sub-item">
                <a href="{{ url('admin/banner/gallery/create') }}" class="sub-link {{ Request::is('admin/banner/gallery/create') ? 'active' : ''}}">Add</a>
              </li>
            </ul>
          </li>

      </ul><!-- br-sideleft-menu -->
      <br>
    </div><!-- br-sideleft -->
