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
require_once('../config/config.php');
require_once('../config/codeGen.php');
/* Add Applicant */
if (isset($_POST['add_applicant'])) {
    //Error Handling and prevention of posting double entries
    $error = 0;

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = mysqli_real_escape_string($mysqli, trim($_POST['id']));
    } else {
        $error = 1;
        $err = "Applicant ID Cannot Be Empty";
    }

    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $name = mysqli_real_escape_string($mysqli, trim($_POST['name']));
    } else {
        $error = 1;
        $err = "Applicant Name Cannot Be Empty";
    }

    if (isset($_POST['phone']) && !empty($_POST['phone'])) {
        $phone = mysqli_real_escape_string($mysqli, trim($_POST['phone']));
    } else {
        $error = 1;
        $err = "Applicant Phone Cannot Be Empty";
    }

    if (isset($_POST['dob']) && !empty($_POST['dob'])) {
        $dob = mysqli_real_escape_string($mysqli, trim($_POST['dob']));
    } else {
        $error = 1;
        $err = "Applicant DOB  Cannot Be Empty";
    }

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
    } else {
        $error = 1;
        $err = "Applicant Email  Cannot Be Empty";
    }

    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['password']))));
    } else {
        $error = 1;
        $err = "Applicant Password  Cannot Be Empty";
    }

    if (isset($_POST['sex']) && !empty($_POST['sex'])) {
        $sex = mysqli_real_escape_string($mysqli, trim($_POST['sex']));
    } else {
        $error = 1;
        $err = "Applicant Gender  Cannot Be Empty";
    }

    if (isset($_POST['county']) && !empty($_POST['county'])) {
        $county = mysqli_real_escape_string($mysqli, trim($_POST['county']));
    } else {
        $error = 1;
        $err = "Applicant County  Cannot Be Empty";
    }

    if (isset($_POST['sub_county']) && !empty($_POST['sub_county'])) {
        $sub_county = mysqli_real_escape_string($mysqli, trim($_POST['sub_county']));
    } else {
        $error = 1;
        $err = "Applicant Sub County  Cannot Be Empty";
    }

    if (isset($_POST['ward']) && !empty($_POST['ward'])) {
        $ward = mysqli_real_escape_string($mysqli, trim($_POST['ward']));
    } else {
        $error = 1;
        $err = "Applicant Ward Cannot Be Empty";
    }

    if (isset($_POST['sub_location']) && !empty($_POST['sub_location'])) {
        $sub_location = mysqli_real_escape_string($mysqli, trim($_POST['sub_location']));
    } else {
        $error = 1;
        $err = "Applicant Sub Location Cannot Be Empty";
    }

    if (isset($_POST['village']) && !empty($_POST['village'])) {
        $village  = mysqli_real_escape_string($mysqli, trim($_POST['village']));
    } else {
        $error = 1;
        $err = "Applicant Village Cannot Be Empty";
    }

    if (isset($_POST['idno']) && !empty($_POST['idno'])) {
        $idno  = mysqli_real_escape_string($mysqli, trim($_POST['idno']));
    } else {
        $error = 1;
        $err = "Applicant National ID Number Cannot Be Empty";
    }

    if (!$error) {
        /* Prevent Double Entries */
        $sql = "SELECT * FROM  iBursary_applicants WHERE  email = '$email' && idno = '$idno'  ";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($email == $row['email'] || $idno == $row['idno']) {
                $err =  "An Applicant With This Email : $email And This ID No : $idno Already Exists";
            }
        } else {
            /* No Error Or Duplicate */
            $query = "INSERT INTO iBursary_applicants  (id, name, phone, dob, idno, email, password, sex, county, sub_county, ward, sub_location, village)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc = $stmt->bind_param('sssssssssssss', $id, $name, $phone, $dob, $idno, $email, $password, $sex, $county, $sub_county, $ward, $sub_location, $village);
            $stmt->execute();
            if ($stmt) {
                $success = "$name Account Created, Proceed To Login";
            } else {
                $info = "Please Try Again Or Try Later";
            }
        }
    }
}
require_once('../partials/_head.php');
?>

<body>

    <main class="main" id="top">

        <div class="container" data-layout="container">

            <div class="row flex-center min-vh-100 py-6">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12"><a class="d-flex flex-center mb-4" href=""><img class="mr-2" src="../public/img/illustrations/falcon.png" alt="" width="58" /><span class="text-sans-serif font-weight-extra-bold fs-5 d-inline-block">iBursary MIS</span></a>
                    <div class="card">
                        <div class="card-body p-6 p-sm-5">
                            <div class="row text-left justify-content-between align-items-center mb-2">
                                <div class="col-auto">
                                    <h5>Applicant Sign Up</h5>
                                </div>
                                <div class="col-auto">
                                    <p class="fs--1 text-600 mb-0"> Or <a href="applicant_register.php"> Sign In</a></p>
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
                            <form method="post" enctype="multipart/form-data" role="form">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">Full Name</label>
                                        <input type="text" required name="name" class="form-control">
                                        <input type="hidden" required name="id" value="<?php echo $ID; ?>" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">National ID Number</label>
                                        <input type="text" required name="idno" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Date Of Birth</label>
                                        <input type="text" required name="dob" placeholder="DD-MM-YYY" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Contacts | Phone Number</label>
                                        <input type="text" required name="phone" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Email Address</label>
                                        <input type="text" required name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Gender</label>
                                        <select type="text" required name="sex" class="form-control">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Password</label>
                                        <input type="text" required name="password" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">County</label>
                                        <input type="text" required name="county" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Sub County</label>
                                        <input type="text" required name="sub_county" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Ward</label>
                                        <input type="text" required name="ward" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Sub Location</label>
                                        <input type="text" required name="sub_location" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Village</label>
                                        <input type="text" required name="village" class="form-control">
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" name="add_applicant" class="btn btn-primary">Sign In</button>
                                </div>
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