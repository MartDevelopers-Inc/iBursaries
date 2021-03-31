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
<!-- Swal Js -->
<script src="../public/js/swal.js"></script>
<!--Inject SWAL-->
<?php if (isset($success)) { ?>
    <!--This code for injecting success alert-->
    <script>
        setTimeout(function() {
                swal("Success", "<?php echo $success; ?>", "success");
            },
            100);
    </script>

<?php } ?>

<?php if (isset($err)) { ?>
    <!--This code for injecting error alert-->
    <script>
        setTimeout(function() {
                swal("Failed", "<?php echo $err; ?>", "error");
            },
            100);
    </script>

<?php } ?>
<?php if (isset($info)) { ?>
    <!--This code for injecting info alert-->
    <script>
        setTimeout(function() {
                swal("Success", "<?php echo $info; ?>", "warning");
            },
            100);
    </script>

<?php } ?>