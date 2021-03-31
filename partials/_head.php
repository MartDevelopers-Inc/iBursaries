<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iBursary MIS - Instilling Tech Innovation In County Bursary Records Management. </title>
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="../public/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../public/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../public/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../public/img/favicons/favicon.ico">
    <link rel="manifest" href="../public/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../public/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <!--Vertical Nav Js  -->
    <script src="../public/js/config.navbar-vertical.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <!-- Perfect Scroll Bar css -->
    <link href="../public/lib/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet">
    <!-- App Theme Css -->
    <link href="../public/css/theme.min.css" rel="stylesheet">
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

</head>