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