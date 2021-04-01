<?php
/*
 * Created on Wed Mar 31 2021
 *
 * The MIT License (MIT)
 * Copyright (c) 2021 MartDevelopers Inc
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software
 * and associated documentation files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial
 * portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED
 * TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
 * TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
session_start();
include('../config/codeGen.php');
include('../config/config.php');

if (isset($_POST['Reset_Password'])) {
    $error = 0;
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
    } else {
        $error = 1;
        $err = "Enter Your Email Address";
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $err = 'Invalid Email';
    }
    $checkEmail = mysqli_query($mysqli, "SELECT `email` FROM `iBursary_admin` WHERE `email` = '" . $_POST['email'] . "'") or exit(mysqli_error($mysqli));
    if (mysqli_num_rows($checkEmail) > 0) {

        $new_password = $checksum; /* Load  A Bunch Of Mumble Jumble To Represent New Password */
        $query = "UPDATE iBursary_admin SET  password=? WHERE email =?";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('ss', $new_password, $email);
        $stmt->execute();
        /* Alert */
        if ($stmt) {
            $_SESSION['email'] = $email;
            $success = "Confim Your Password" && header("refresh:1; url=confirm_password.php");
        } else {
            $err = "Password Reset Failed";
        }
    } else {/* Ghost User */
        $err = "Email Does Not Exist";
    }
}

require_once('../partials/_head.php');
?>

<body>

    <main class="main" id="top">

        <div class="container" data-layout="container">
            <div class="row flex-center min-vh-100 py-6 text-center">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4"><a class="d-flex flex-center mb-4" href=""><img class="mr-2" src="../public/img/illustrations/falcon.png" alt="" width="58" /><span class="text-sans-serif font-weight-extra-bold fs-5 d-inline-block">iBursary MIS</span></a>
                    <div class="card">
                        <div class="card-body p-4 p-sm-5">
                            <h5 class="mb-0">Forgot your password?</h5><small>Enter your email and we'll send you a reset link.</small>
                            <?php if (isset($success)) { ?>
                                <!--This code for injecting success alert-->
                                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                    <strong>Success! </strong> <br> Proceed To Reset Password
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="font-weight-light" aria-hidden="true">×</span></button>
                                </div>
                            <?php }
                            if (isset($err)) { ?>
                                <!--This code for injecting error alert-->
                                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                    <strong>Error! </strong> <br> <?php echo $err; ?>
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="font-weight-light" aria-hidden="true">×</span></button>
                                </div>
                            <?php }
                            if (isset($info)) { ?>
                                <!--This code for injecting info alert-->
                                <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                                    <strong>Warning! </strong> <br> <?php echo $info; ?>
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="font-weight-light" aria-hidden="true">×</span></button>
                                </div>
                            <?php } ?>
                            <form class="mt-4" method="POST">
                                <div class="form-group"><input class="form-control" name="email" type="email" placeholder="Email address" /></div>
                                <div class="form-group"><button class="btn btn-primary btn-block mt-3" type="submit" name="Reset_Password">Reset Password</button></div>
                            </form>
                            <a class="fs--1 text-600" href="login.php">Remembered Password<span class="d-inline-block ml-1">&rarr;</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require_once('../partials/_scripts.php'); ?>

</body>

</html>