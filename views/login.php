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
include('../config/config.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = sha1(md5($_POST['password'])); //double encrypt to increase security
    $stmt = $mysqli->prepare("SELECT email, password, id  FROM iBursary_admin  WHERE email =? AND password =?");
    $stmt->bind_param('ss', $email, $password); //bind fetched parameters
    $stmt->execute(); //execute bind 
    $stmt->bind_result($email, $password, $id); //bind result
    $rs = $stmt->fetch();
    $_SESSION['id'] = $id;
    if ($rs) {
        header("location:dashboard.php");
    } else {
        $err =  "Access Denied, Incorrect Email Or Password";
    }
}
require_once('../partials/_head.php');
?>

<body>

    <main class="main" id="top">

        <div class="container" data-layout="container">

            <div class="row flex-center min-vh-100 py-6">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4"><a class="d-flex flex-center mb-4" href=""><img class="mr-2" src="../public/img/illustrations/falcon.png" alt="" width="58" /><span class="text-sans-serif font-weight-extra-bold fs-5 d-inline-block">iBursary MIS</span></a>
                    <div class="card">
                        <div class="card-body p-4 p-sm-5">
                            <div class="row text-left justify-content-between align-items-center mb-2">
                                <div class="col-auto">
                                    <h5>Administrator Log in</h5>
                                </div>
                            </div>
                            <?php if (isset($success)) { ?>
                                <!--This code for injecting success alert-->
                                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                    <strong>Success! </strong> <br> <?php echo $success; ?>
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
                            <form method="POST">
                                <div class="form-group"><input class="form-control" name="email" type="email" placeholder="Email address" /></div>
                                <div class="form-group"><input class="form-control" name="password" type="password" placeholder="Password" /></div>
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="custom-control custom-checkbox"><input class="custom-control-input" type="checkbox" id="basic-checkbox" checked="checked" /><label class="custom-control-label" for="basic-checkbox">Remember me</label></div>
                                    </div>
                                    <div class="col-auto"><a class="fs--1" href="reset_password.php">Forgot Password?</a></div>
                                </div>
                                <div class="form-group"><button class="btn btn-primary btn-block mt-3" type="submit" name="login">Log in</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require_once('../partials/_scripts.php'); ?>

</body>

</html>