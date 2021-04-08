<?php
/*
 * Created on Thu Apr 08 2021
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
require_once('../config/checklogin.php');
require_once('../config/codeGen.php');
bursaryApplicant();

/* Update Profile */
if (isset($_POST['update_applicant'])) {
    //Error Handling and prevention of posting double entries
    $error = 0;

    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        $id = mysqli_real_escape_string($mysqli, trim($_SESSION['id']));
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
        $query = "UPDATE iBursary_applicants SET name =?, phone =?, dob =?, idno =?, email =?, sex =?, county =?, sub_county =?, ward =?, sub_location =?, village =?
           WHERE id = ?";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('ssssssssssss', $name, $phone, $dob, $idno, $email, $sex, $county, $sub_county, $ward, $sub_location, $village, $id);
        $stmt->execute();
        if ($stmt) {
            $success = "$name Personal Details Updated";
        } else {
            $info = "Please Try Again Or Try Later";
        }
    }
}


/* Update Password */
if (isset($_POST['change_password'])) {
    $error = 0;

    if (isset($_POST['new_password']) && !empty($_POST['new_password'])) {
        $new_password = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['new_password']))));
    } else {
        $error = 1;
        $err = "New Password Cannot Be Empty";
    }
    if (isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])) {
        $confirm_password = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['confirm_password']))));
    } else {
        $error = 1;
        $err = "Confirmation Password Cannot Be Empty";
    }

    if (!$error) {
        if ($_POST['new_password'] != $_POST['confirm_password']) {
            $err = "Passwords Do Not Match";
        } else {
            $id = $_SESSION['id'];
            $new_password  = sha1(md5($_POST['new_password']));
            $query = "UPDATE iBursary_applicants SET  password =? WHERE id =?";
            $stmt = $mysqli->prepare($query);
            $rc = $stmt->bind_param('ss', $new_password, $id);
            $stmt->execute();
            if ($stmt) {
                $success = "Password Changed";
            } else {
                $err = "Please Try Again Or Try Later";
            }
        }
    }
}

require_once('../partials/_head.php');
?>


<body>

    <main class="main" id="top">

        <div class="container" data-layout="container">
            <!-- Vertical Nav -->
            <?php require_once('../partials/_applicant_vertical_nav.php'); ?>
            <!-- End Vertical Nav -->

            <!-- Sticky Navbar -->
            <?php require_once('../partials/_applicant_sticky_nav.php'); ?>
            <!-- End Sticky Nav -->
            <div class="content">
                <!-- Sidebar -->
                <?php
                require_once('../partials/_applicant_sidenav.php');
                $id = $_SESSION['id'];
                $ret = "SELECT * FROM  iBursary_applicants  WHERE id = '$id'";
                $stmt = $mysqli->prepare($ret);
                $stmt->execute(); //ok
                $res = $stmt->get_result();
                while ($loggedIn = $res->fetch_object()) {
                    if ($loggedIn->profile == '') {
                        $profile =
                            "
                            <div class='avatar avatar-5xl avatar-profile'><img class='rounded-circle img-thumbnail shadow-sm' src='../public/uploads/user_images/no-profile.png' width='200'  />
                            </div>
                        ";
                    } else {
                        $profile =
                            "
                            <div class='avatar avatar-5xl avatar-profile'><img class='rounded-circle img-thumbnail shadow-sm' src='../public/uploads/user_images/$loggedIn->profile' width='200'  />
                            </div>
                        ";
                    }
                ?>
                    <!-- Sidebar -->
                    <div class="card mb-3">
                        <div class="card-header position-relative min-vh-25 mb-7">
                            <div class="bg-holder rounded-soft rounded-bottom-0" style="background-image:url(../public/img/generic/4.jpg);"></div>
                            <!--/.bg-holder-->
                            <?php echo $profile; ?>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="mb-1">
                                        <!-- Alerts -->
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
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-lg-8 pr-lg-2">
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Update Profile </h5>
                                </div>
                                <div class="card-body text-justify">
                                    <form method="post">
                                        <form method="post" enctype="multipart/form-data" role="form">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="">Full Name</label>
                                                    <input type="text" required name="name" value="<?php echo $loggedIn->name; ?>" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">National ID Number</label>
                                                    <input type="text" required name="idno" value="<?php echo $loggedIn->idno; ?>" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Date Of Birth</label>
                                                    <input type="text" required name="dob" value="<?php echo $loggedIn->dob; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="">Contacts | Phone Number</label>
                                                    <input type="text" required name="phone" value="<?php echo $loggedIn->phone; ?>" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Email Address</label>
                                                    <input type="text" required name="email" value="<?php echo $loggedIn->email; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="">Gender</label>
                                                    <select type="text" required name="sex" class="form-control">
                                                        <option><?php echo $loggedIn->sex; ?></option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">County</label>
                                                    <input type="text" required name="county" value="<?php echo $loggedIn->county; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="form-group col-md-6">
                                                    <label for="">Sub County</label>
                                                    <input type="text" required name="sub_county" value="<?php echo $loggedIn->sub_county; ?>" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Ward</label>
                                                    <input type="text" required name="ward" value="<?php echo $loggedIn->ward; ?>" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Sub Location</label>
                                                    <input type="text" required name="sub_location" value="<?php echo $loggedIn->sub_location; ?>" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Village</label>
                                                    <input type="text" required name="village" value="<?php echo $loggedIn->village; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="card-footer text-right">
                                                <button type="submit" name="update_applicant" class="btn btn-primary">Update Applicant</button>
                                            </div>
                                        </form>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 pr-lg-2">
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Change Password </h5>
                                </div>
                                <div class="card-body text-justify">
                                    <form method="POST">
                                        <div class="form-group"><label for="old-password">Old Password</label><input class="form-control" id="old-password" name="old_password" type="password"></div>
                                        <div class="form-group"><label for="new-password">New Password</label><input class="form-control" id="new-password" name="new_password" type="password"></div>
                                        <div class="form-group"><label for="confirm-password">Confirm Password</label><input class="form-control" name="confirm_password" id="confirm-password" type="password"></div><button class="btn btn-primary btn-block" name="change_password" type="submit">Update Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php require_once('../partials/_footer.php');
                } ?>
            </div>
        </div>
    </main>
    <?php require_once('../partials/_scripts.php'); ?>
</body>

</html>