<!-- Jquery -->
<script src="../public/js/jquery.min.js"></script>
<!-- Popper -->
<script src="../public/js/popper.min.js"></script>
<!-- Bootstrap -->
<script src="../public/js/bootstrap.min.js"></script>
<!-- Font Awesome -->
<script src="../public/lib/%40fortawesome/all.min.js"></script>
<!-- Sticky Fill -->
<script src="../public/lib/stickyfilljs/stickyfill.min.js"></script>
<!-- Stickyfill Kit -->
<script src="../public/lib/sticky-kit/sticky-kit.min.js"></script>
<!-- Is -->
<script src="../public/lib/is_js/is.min.js"></script>
<!-- Loadash Min -->
<script src="../public/lib/lodash/lodash.min.js"></script>
<!-- Perfect Scrollbar -->
<script src="../public/lib/perfect-scrollbar/perfect-scrollbar.js"></script>
<!-- Facnybox -->
<script src="../public/lib/fancybox/jquery.fancybox.min.js"></script>
<!-- Font -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
<!-- App Js -->
<script src="../public/js/theme.min.js"></script>
<!-- Data Tables -->
<script src="../public/lib/datatables/js/jquery.dataTables.min.js"></script>
<script src="../public/lib/datatables-bs4/dataTables.bootstrap4.min.js"></script>
<script src="../public/lib/datatables.net-responsive/dataTables.responsive.js"></script>
<script src="../public/lib/datatables.net-responsive-bs4/responsive.bootstrap4.js"></script>
<!-- Initialize Data Table -->
<script>
    $(function() {
        $("#data_table").DataTable();
    });
</script>
<!-- Data Tables V2.01 With Export Functionalities -->
<!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
<script src="../public/lib/datatable/button-ext/dataTables.buttons.min.js"></script>
<script src="../public/lib/datatable/button-ext/jszip.min.js"></script>
<script src="../public/lib/datatable/button-ext/buttons.html5.min.js"></script>
<script src="../public/lib/datatable/button-ext/buttons.print.min.js"></script>
<script>
    $('#export').DataTable({
        dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
        buttons: {
            buttons: [{
                    extend: 'copy',
                    className: 'btn'
                },
                {
                    extend: 'csv',
                    className: 'btn'
                },
                {
                    extend: 'excel',
                    className: 'btn'
                },
                {
                    extend: 'print',
                    className: 'btn'
                }
            ]
        },
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7
    });
</script>
<!-- Is Fluid ?-->
<script>
    var isFluid = JSON.parse(localStorage.getItem('isFluid'));
    if (isFluid) {
        var container = document.querySelector('[data-layout]');
        container.classList.remove('container');
        container.classList.add('container-fluid');
    }
</script>
<!-- Select2 Bootstrap Plug In -->
<script src="../public/lib/select2/select2.min.js"></script>
<script>
    var ss = $(".basic").select2({
        tags: true,
    });
</script>

<!-- File Uploads  -->
<script src="../public/lib/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>