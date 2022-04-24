<script src="{{ asset('/frontend/') }}/assets/js/jquery-1.12.4.min.js"></script>
<script src="{{ asset('/frontend/') }}/assets/js/jquery.plugin-countdown.min.js"></script>
<script src="{{ asset('/frontend/') }}/assets/js/jquery-countdown.min.js"></script>
<script src="{{ asset('/frontend/') }}/assets/js/bootstrap.min.js"></script>
<script src="{{ asset('/frontend/') }}/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('/frontend/') }}/assets/js/magnific-popup.min.js"></script>
<script src="{{ asset('/frontend/') }}/assets/js/isotope.min.js"></script>
<script src="{{ asset('/frontend/') }}/assets/js/jquery.scrollbar.min.js"></script>
<script src="{{ asset('/frontend/') }}/assets/js/jquery-ui.min.js"></script>
<script src="{{ asset('/frontend/') }}/assets/js/mobile-menu.js"></script>
<script src="{{ asset('/frontend/') }}/assets/js/chosen.min.js"></script>
<script src="{{ asset('/frontend/') }}/assets/js/slick.js"></script>
<script src="{{ asset('/frontend/') }}/assets/js/jquery.elevateZoom.min.js"></script>
<script src="{{ asset('/frontend/') }}/assets/js/jquery.actual.min.js"></script>
<script src="{{ asset('/frontend/') }}/assets/js/fancybox/source/jquery.fancybox.js"></script>
<script src="{{ asset('/frontend/') }}/assets/js/lightbox.min.js"></script>
<script src="{{ asset('/frontend/') }}/assets/js/owl.thumbs.min.js"></script>
<script src="{{ asset('/frontend/') }}/assets/js/jquery.scrollbar.min.js"></script>
<script src="{{ asset('/frontend/') }}/assets/js/frontend-plugin.js"></script>

{{-- toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- toastr --}}
    {{-- toastr --}}
    <script type="text/javascript">
    @if (Session::has('success'))
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
       toastr.success('{{Session::get('success')}}');
    @endif
    @if (Session::has('error'))
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
       toastr.error('{{Session::get('error')}}');
    @endif
    </script>


{{-- modal --}}
<script>
    @if (
      Session::get('modal-visibility') == 'off'
    )

    @else

      $(window).on('load',function(){
          $('#myModal').modal('show');
      });
    @endif

    $('#myModal').on('hidden.bs.modal', function () {
      // set show_popup false in session


      fetch('{{ url('/modal/set-visibility/off') }}',
          {
              method: 'GET',
          })
          .then(data => data.json())
          .then(response => console.log(response))
          .catch(error => console.log('Request failed: ' + error.message));
    });

</script>

