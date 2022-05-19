
    <script src="{{ asset('backend/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/lib/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script src="{{ asset('backend/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    {{-- <script src="{{ asset('backend/lib/datatables.net/js/jquery.dataTables.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/lib/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/lib/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/js/jquery.dataTables.min.js') }}"></script> --}}

    <script src="http://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>

    <script src="{{ asset('backend/lib/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('backend/lib/medium-editor/js/medium-editor.min.js') }}"></script>

    <script src="{{ asset('backend/lib/moment/min/moment.min.js') }}"></script>
    {{-- <script src="{{ asset('backend/lib/peity/jquery.peity.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/lib/rickshaw/vendor/d3.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/lib/rickshaw/vendor/d3.layout.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/lib/rickshaw/rickshaw.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/lib/jquery.flot/jquery.flot.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/lib/jquery.flot/jquery.flot.resize.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/lib/flot-spline/js/jquery.flot.spline.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/lib/jquery-sparkline/jquery.sparkline.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/lib/echarts/echarts.min.js') }}"></script> --}}
    <script src="{{ asset('backend/lib/select2/js/select2.full.min.js') }}"></script>
    {{-- <script src="http://maps.google.com/maps/api/js?key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg"></script> --}}
    {{-- <script src="{{ asset('backend/lib/gmaps/gmaps.min.js') }}"></script> --}}

    <script src="{{ asset('backend/js/bracket.js') }}"></script>
    <script src="{{ asset('backend/js/tooltip-colored.js') }}"></script>
    <script src="{{ asset('backend/js/popover-colored.js') }}"></script>
    {{-- <script src="{{ asset('backend/js/map.shiftworker.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/js/ResizeSensor.js') }}"></script> --}}
    <script src="{{ asset('backend/js/dashboard.js') }}"></script>
    <script src="{{ asset('backend/js/toastr.min.js') }}"></script>


    <script>
      $(function(){
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
          minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
          if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });
    </script>

    {{-- summernote --}}
    <script>
      $(function(){
        'use strict';

        // Inline editor
        var editor = new MediumEditor('.editable');

        // Summernote editor
        $('.summernote').summernote({
          height: 150,
          tooltip: false
        })
      });
    </script>

    {{-- datatables --}}
     <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });


        // this one is used mostly
        // $('#datatable3').DataTable({

        //     buttons: [

        //         {
        //            extend: 'excel',
        //            text: 'Excel',
        //            title : 'Report',
        //            // className: 'btn btn-default',
        //            exportOptions: {
        //               columns: ':not(.notexport)'
        //            }
        //         },

        //         {
        //           extend: 'pdf',
        //           text: 'Pdf',
        //           title : 'Report',
        //           // className: 'btn btn-default',
        //           exportOptions: {
        //             columns: ':not(.notexport)',
        //           },              
        //           customize: function (doc) {
        //             doc.content[1].table.widths = 
        //                   Array(doc.content[1].table.body[0].length + 1).join('*').split('');
        //             doc.defaultStyle.alignment = 'center';
        //             doc.styles.tableHeader.alignment = 'center';
        //           }
        //         },
        //       // 'pdf'
        //     ]
        // });
        $('#datatable3_without_export').DataTable(
        );
        $('#datatable3').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',    
                {
                   extend: 'excel',
                   text: 'Excel',
                   title : 'Report',
                   exportOptions: {
                      columns: ':not(.notexport)',
                   }
                },   
                {
                   extend: 'csv',
                   text: 'Csv',
                   title : 'Report',
                   exportOptions: {
                      columns: ':not(.notexport)',
                   }
                },  
                {
                   extend: 'pdf',
                   text: 'Pdf',
                   title : 'Report',
                   exportOptions: {
                      columns: ':not(.notexport)',
                   },              
                  customize: function (doc) {
                    // doc.content[1].table.widths = 
                    // Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                    doc.defaultStyle.alignment = 'center';
                    doc.styles.tableHeader.alignment = 'center';
                  }
                },
            ],
        });


        $('#datatableNoLabel').DataTable({
          "bPaginate": false,
          "bLengthChange": false,
          "bFilter": true,
          "bInfo": false,
          "bAutoWidth": false,
          "searching": false,
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // $('#datatable3').DataTable();

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>

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

    <script type="text/javascript">
      $(function() {
    $( "#datepicker" ).datepicker({dateFormat: 'yy'});
});
    </script>


    {{-- select2 --}}
    <script>     

      // Select2 Initialize
      // Select2 without the search
      if($().select2) {
        $('.select2').select2({
          minimumResultsForSearch: Infinity,
          placeholder: 'Choose one'
        });

        // Select2 by showing the search
        $('.select2-show-search').select2({
          minimumResultsForSearch: ''
        });

        // Select2 with tagging support
        $('.select2-tag').select2({
          tags: true,
          tokenSeparators: [',', ' ']
        });
      }
  </script>
