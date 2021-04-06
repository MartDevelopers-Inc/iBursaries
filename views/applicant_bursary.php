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

/* Delete Applicant Bursary */
if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $adn = "DELETE FROM iBursary_application WHERE id=?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $delete);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Application Record Deleted" && header("refresh:1; url=bursary_applications.php");
    } else {
        $info = "Please Try Again Or Try Later";
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
                <?php
                require_once('../partials/_sidenav.php');
                $view = $_GET['view'];
                $ret = "SELECT * FROM `iBursary_applicants`  ";
                $stmt = $mysqli->prepare($ret);
                $stmt->execute(); //ok
                $res = $stmt->get_result();
                while ($applicant = $res->fetch_object()) {
                ?>
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
                                    <h3 class="mb-0"><?php echo $applicant->name; ?> Bursary Applications</h3>
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
                                            $ret = "SELECT * FROM `iBursary_application` WHERE applicant_id = '$applicant->id'  ";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            while ($applicantions = $res->fetch_object()) {
                                            ?>
                                                <tr>
                                                    <th class="align-middle">
                                                        <a href="applicant.php?view=<?php echo $applicant->id;?>">
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
                                                                    <a class="dropdown-item text-danger" data-toggle="modal" href="#delete-<?php echo $applicantions->id; ?>">Delete</a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Confirm Delete Modal -->
                                                        <div class="modal fade" id="delete-<?php echo $applicantions->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">CONFIRM DELETE</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-center text-danger">
                                                                        <h4>Delete <?php echo $applicantions->name; ?> Bursary Details ?</h4>
                                                                        <br>
                                                                        <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                                                                        <a href="bursary_applications.php?delete=<?php echo $applicantions->id; ?>" class="text-center btn btn-danger"> Delete </a>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Confirmation -->

                                                    </td>
                                                </tr>
                                            <?php
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer -->
                <?php
                }
                require_once('../partials/_footer.php'); ?>
            </div>
        </div>
    </main>
    <?php require_once('../partials/_scripts.php');
    ?>
</body>

</html>