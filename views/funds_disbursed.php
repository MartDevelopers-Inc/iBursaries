<?php
/*
 * Created on Tue Apr 06 2021
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

/* Add Application */
if (isset($_POST['award_bursary_fund'])) {
    //Error Handling and prevention of posting double entries
    $error = 0;

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = mysqli_real_escape_string($mysqli, trim($_POST['id']));
    } else {
        $error = 1;
        $err = "ID Cannot Be Empty";
    }

    if (isset($_POST['recommendation']) && !empty($_POST['recommendation'])) {
        $recommendation = mysqli_real_escape_string($mysqli, trim($_POST['recommendation']));
    } else {
        $error = 1;
        $err = "Recommendation Cannot Be Empty";
    }

    if (isset($_POST['chairman_name']) && !empty($_POST['chairman_name'])) {
        $chairman_name = mysqli_real_escape_string($mysqli, trim($_POST['chairman_name']));
    } else {
        $error = 1;
        $err = "Chairman Name Cannot Be Empty";
    }

    if (isset($_POST['secretary_name']) && !empty($_POST['secretary_name'])) {
        $secretary_name = mysqli_real_escape_string($mysqli, trim($_POST['secretary_name']));
    } else {
        $error = 1;
        $err = "Secretary Name Cannot Be Empty";
    }

    if (isset($_POST['date_approved']) && !empty($_POST['date_approved'])) {
        $date_approved = mysqli_real_escape_string($mysqli, trim($_POST['date_approved']));
    } else {
        $error = 1;
        $err = "Date Approved Cannot Be Empty";
    }

    if (isset($_POST['funds_disbursed']) && !empty($_POST['funds_disbursed'])) {
        $funds_disbursed = mysqli_real_escape_string($mysqli, trim($_POST['funds_disbursed']));
    } else {
        $error = 1;
        $err = "Funds Disbursed  Cannot Be Empty";
    }

    if (isset($_POST['approval_status']) && !empty($_POST['approval_status'])) {
        $approval_status = mysqli_real_escape_string($mysqli, trim($_POST['approval_status']));
    } else {
        $error = 1;
        $err = "Approval Status  Cannot Be Empty";
    }


    if (!$error) {

        /* No Error Or Duplicate */
        $query = "UPDATE iBursary_application  SET recommendation =?, chairman_name = ?, secretary_name =?, date_approved =?, approval_status =?, funds_disbursed=? WHERE id = ?   ";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param(
            'sssssss',
            $recommendation,
            $chairman_name,
            $secretary_name,
            $date_approved,
            $approval_status,
            $funds_disbursed,
            $id
        );
        $stmt->execute();
        if ($stmt) {
            $success = "Bursary Awarded Funds" && header("refresh:1; url=funds_disbursed.php");
        } else {
            $info = "Please Try Again Or Try Later";
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

                <!-- 
                    Use This For Notices
                <div class="card bg-light mb-3">
                    <div class="card-body p-3">
                        <p class="fs--1 mb-0"><a href="#!"><span class="fas fa-exchange-alt mr-2" data-fa-transform="rotate-90"></span>A payout for <strong>$921.42 </strong>was deposited 13 days ago</a>. Your next deposit is expected on <strong>Tuesday, March 13.</strong></p>
                    </div>
                </div>
                 -->

                <div class="card mb-3">
                    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../public/img/illustrations/corner-4.png);"></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="mb-0">Disburse Funds On Applied Bursaries</h3>
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
                                <hr>
                                <table id="data_table" class="table table-sm table-dashboard data-table no-wrap mb-0 fs--1 w-100">
                                    <thead class="bg-200">
                                        <tr>
                                            <th class="sort">Applicant Details</th>
                                            <th class="sort">Applicant Family Status</th>
                                            <th class="sort">Applicant School Details</th>
                                            <th class="sort">Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        <?php
                                        /* Gets All Bursaries Which Has No Funds Disbursed */
                                        $ret = "SELECT * FROM `iBursary_application` WHERE funds_disbursed = '' && approval_status = '' ";
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->execute(); //ok
                                        $res = $stmt->get_result();
                                        while ($applicantions = $res->fetch_object()) {
                                        ?>
                                            <tr>
                                                <th class="align-middle">
                                                    <a href="applicant.php?view=<?php echo $applicantions->applicant_id; ?>">
                                                        <?php echo "Name:" .  $applicantions->name . " <br> Sex: " . $applicantions->sex . "<br> DOB:" . $applicantions->dob; ?>
                                                    </a>
                                                </th>
                                                <td class="align-middle"><?php echo   "Status: " . $applicantions->family_status . " <br> " . "Main Income: " . $applicantions->main_income_source . " <br> " . "Income P.M:  " . $applicantions->income_per_month; ?></td>
                                                <td class="align-middle"><?php echo   "Sch Name: " . $applicantions->school_name . " <br> Category: " . $applicantions->school_category . " <br> Bank Acc No  " . $applicantions->account_no; ?></td>

                                                <td>
                                                    <div class="dropdown text-sans-serif"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal mr-3" type="button" id="dropdown0" data-toggle="dropdown" data-boundary="html" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="dropdown0">
                                                            <div class="bg-white py-2">
                                                                <a class="dropdown-item" href="view_bursary.php?view=<?php echo $applicantions->id; ?>">View Bursary Details</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item text-success" data-toggle="modal" href="#award-<?php echo $applicantions->id; ?>">Award Funds</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Award Bursary Fund Modal -->
                                            <div class="modal fade" id="award-<?php echo $applicantions->id; ?>">
                                                <div class="modal-dialog  modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Award <?php echo $applicantions->name . " - " . $applicantions->bursary_code; ?> Funds </h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" enctype="multipart/form-data" role="form">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="">CDF Chairman Name</label>
                                                                            <input type="text" required name="chairman_name" class="form-control">
                                                                            <input type="hidden" required name="id" value="<?php echo $applicantions->id; ?>" class="form-control">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="">CDF Secretary Name</label>
                                                                            <input type="text" required name="secretary_name" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-md-4">
                                                                            <label for="">Awarded Funds</label>
                                                                            <input type="text" required name="funds_disbursed" class="form-control">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label for="">Approval Status</label>
                                                                            <select class="form-control" name="approval_status">
                                                                                <option>Approved</option>
                                                                                <option>Pending</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label for="">Date Approved</label>
                                                                            <input type="date" required name="date_approved" class="form-control">
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label for="">Reccomendation And Further Information</label>
                                                                            <textarea type="text" rows="6" required name="recommendation" class="form-control"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="card-footer text-right">
                                                                    <button type="submit" name="award_bursary_fund" class="btn btn-primary">Award Bursary Funds</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Award Bursary Fund Modal -->
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