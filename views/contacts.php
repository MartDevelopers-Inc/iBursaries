<?php
/*
 * Created on Sat Apr 03 2021
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
admin();
/* Send Mail */
if (isset($_POST['send_email'])) {
    //Error Handling and prevention of posting double entries
    $error = 0;

    if (isset($_POST['sender_id']) && !empty($_POST['sender_id'])) {
        $sender_id = mysqli_real_escape_string($mysqli, trim($_POST['sender_id']));
    } else {
        $error = 1;
        $err = "Sender ID Cannot Be Empty";
    }

    if (isset($_POST['sender_email']) && !empty($_POST['sender_email'])) {
        $sender_email = mysqli_real_escape_string($mysqli, trim($_POST['sender_email']));
    } else {
        $error = 1;
        $err = "Sender Email Cannot Be Empty";
    }

    if (isset($_POST['sender_name']) && !empty($_POST['sender_name'])) {
        $sender_name = mysqli_real_escape_string($mysqli, trim($_POST['sender_name']));
    } else {
        $error = 1;
        $err = "Sender Name Cannot Be Empty";
    }

    if (isset($_POST['receiver_id']) && !empty($_POST['receiver_id'])) {
        $receiver_id = mysqli_real_escape_string($mysqli, trim($_POST['receiver_id']));
    } else {
        $error = 1;
        $err = "Receiver ID Cannot Be Empty";
    }

    if (isset($_POST['receiver_email']) && !empty($_POST['receiver_email'])) {
        $receiver_email = mysqli_real_escape_string($mysqli, trim($_POST['receiver_email']));
    } else {
        $error = 1;
        $err = "Receiver Email Cannot Be Empty";
    }

    if (isset($_POST['receiver_name']) && !empty($_POST['receiver_name'])) {
        $receiver_name = mysqli_real_escape_string($mysqli, trim($_POST['receiver_name']));
    } else {
        $error = 1;
        $err = "Receiver Name Cannot Be Empty";
    }

    if (isset($_POST['subject']) && !empty($_POST['subject'])) {
        $subject = mysqli_real_escape_string($mysqli, trim($_POST['subject']));
    } else {
        $error = 1;
        $err = "Subject  Cannot Be Empty";
    }

    if (isset($_POST['details']) && !empty($_POST['details'])) {
        $details = mysqli_real_escape_string($mysqli, trim($_POST['details']));
    } else {
        $error = 1;
        $err = "Details Cannot Be Empty";
    }

    if (!$error) {
        /* Persist Mail On Core Database Server */
        $query = "INSERT INTO iBursary_mails  (sender_id, sender_email, sender_name, receiver_id, receiver_email, receiver_name, subject, details) VALUES(?,?,?,?,?,?,?,?)";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('ssssssss', $sender_id, $sender_email, $sender_name, $receiver_id, $receiver_email, $receiver_name, $subject, $details);
        $stmt->execute();
        /* Send Mail Via Third Party Mail Box Like Gmail */
        $cc = $_POST['cc'];
        $bcc = $_POST['bcc'];
        /* Change Your From To Default System Admins Mail */
        $header = "From:martdevelopers254@gmail.com \r\n";
        $header .= "Cc:$cc \r\n";
        $header .= "Bcc:$bcc \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";

        $retval = mail($email, $title, $details, $header);

        if (($retval == true) && $stmt) {
            $success =  "Message sent successfully";
        } else {
            $err =  "Message could not be sent...";
        }
    }
}
require_once('../partials/_head.php');
?>


<body>

    <main class="main" id="top">

        <div class="container" data-layout="container">
            <!-- Vertical Nav -->
            <?php require_once('../partials/_vertical_nav.php'); ?>
            <!-- End Vertical Nav -->

            <!-- Sticky Navbar -->
            <?php require_once('../partials/_sticky_nav.php'); ?>
            <!-- End Sticky Nav -->
            <div class="content">

                <!-- Sidebar -->
                <?php require_once('../partials/_sidenav.php'); ?>
                <!-- Sidebar -->


                <div class="card mb-3">
                    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../public/img/illustrations/corner-4.png);"></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="mb-0">Applicants Contacts</h3>
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
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../public/img/illustrations/corner-4.png);"></div>
                    <!--/.bg-holder-->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table id="data_table" class="table table-sm table-dashboard data-table no-wrap mb-0 fs--1 w-100">
                                    <thead class="bg-200">
                                        <tr>
                                            <th class="sort">Name</th>
                                            <th class="sort">Contacts</th>
                                            <th class="sort">Email</th>
                                            <th class="sort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        <?php
                                        $ret = "SELECT * FROM `iBursary_applicants`  ";
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->execute(); //ok
                                        $res = $stmt->get_result();
                                        while ($applicant = $res->fetch_object()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $applicant->name; ?></td>
                                                <td><?php echo $applicant->phone; ?></td>
                                                <td><?php echo $applicant->email; ?></td>
                                                <td>
                                                    <div class="dropdown text-sans-serif"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal mr-3" type="button" id="dropdown0" data-toggle="dropdown" data-boundary="html" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="dropdown0">
                                                            <div class="bg-white py-2">
                                                                <a class="dropdown-item" data-toggle="modal" href="#email-<?php echo $applicant->id; ?>">Email Applicant</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Email Modal -->
                                                    <div class="modal fade" id="email-<?php echo $applicant->id; ?>">
                                                        <div class="modal-dialog  modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Send Email To <?php echo $applicant->name; ?> </h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="post" enctype="multipart/form-data" role="form">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="form-group col-md-12">
                                                                                    <label for="">Email Address</label>
                                                                                    <input type="text" required name="email" value="<?php echo $applicant->email; ?>" class="form-control">
                                                                                    <input type="hidden" required name="id" value="<?php echo $applicant->id; ?>" class="form-control">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="">CC</label>
                                                                                    <input type="text" name="cc" class="form-control">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="">BCC</label>
                                                                                    <input type="text" name="bcc" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="form-group col-md-12">
                                                                                    <label for="">Email Title</label>
                                                                                    <input type="text" required name="title" class="form-control">
                                                                                </div>
                                                                                <div class="form-group col-md-12">
                                                                                    <label for="">Email Details</label>
                                                                                    <textarea type="text" rows="5" required name="details" class="form-control"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer text-right">
                                                                            <button type="submit" name="send_email" class="btn btn-primary">Send Mail</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Email Modal -->
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <?php require_once('../partials/_footer.php'); ?>
            </div>
        </div>
    </main>
    <?php require_once('../partials/_scripts.php'); ?>
</body>

</html>