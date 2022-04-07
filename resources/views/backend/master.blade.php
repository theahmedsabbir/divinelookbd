<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('backend.includes.header')

    <!-- vendor css -->
    @include('backend.includes.css')

    @stack('style')
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    @include('backend.includes.left_sidebar')
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include('backend.includes.nav')
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
		@yield('content')

    	@include('backend.includes.footer')
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


    @include('backend.includes.scripts')

    @stack('script')
  </body>
</html>
