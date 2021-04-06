<?php
/*
 * Created on Thu Apr 01 2021
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
                $ret = "SELECT * FROM `iBursary_application` WHERE id = '$view'  ";
                $stmt = $mysqli->prepare($ret);
                $stmt->execute(); //ok
                $res = $stmt->get_result();
                while ($applicantions = $res->fetch_object()) {
                ?>
                    <!-- Sidebar -->


                    <div class="card mb-3">
                        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../public/img/illustrations/corner-4.png);"></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="mb-0"><?php echo $applicantions->bursary_code . " " . $applicantions->name; ?> Details</h3>
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
                                <div class="col-5 col-sm-3">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab">Bursary Details</a>
                                        <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab">Applicant Details</a>
                                        <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab">Applicant School Details</a>
                                        <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab">Administrative Details</a>
                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                            <table class="table table-sm table-dashboard data-table no-wrap mb-0 fs--1 w-100">
                                                <thead class="bg-200">
                                                    <tr>
                                                        <th class="sort">Bursary Code</th>
                                                        <th class="sort">Bursary Year</th>
                                                        <th class="sort">Bursary Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white">
                                                    <?php
                                                    $ret = "SELECT * FROM `iBursary_bursaries` WHERE  code = '$applicantions->bursary_code'  ";
                                                    $stmt = $mysqli->prepare($ret);
                                                    $stmt->execute(); //ok
                                                    $res = $stmt->get_result();
                                                    while ($bursary = $res->fetch_object()) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $bursary->code; ?></td>
                                                            <td><?php echo $bursary->year; ?></td>
                                                            <td>
                                                                <?php
                                                                if ($bursary->status == 'Open') {
                                                                    echo
                                                                    "
                                                                        <span class='badge badge rounded-capsule badge-soft-success'> Open <span class='ml-1 fas fa-check' data-fa-transform='shrink-2'></span></span>
                                                                    ";
                                                                } else {
                                                                    echo
                                                                    "
                                                                        <span class='badge badge rounded-capsule badge-soft-danger'> Closed <span class='ml-1 fas fa-times' data-fa-transform='shrink-2'></span></span>
                                                                    ";
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                                            <table id="data_table" class="table table-sm table-dashboard data-table no-wrap mb-0 fs--1 w-100">
                                                <thead class="bg-200">
                                                    <tr>
                                                        <th class="sort">Applicant Details</th>
                                                        <th class="sort">Family Details</th>
                                                        <th class="sort">Family Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white">

                                                    <tr>
                                                        <th class="align-middle">
                                                            <a href="applicant.php?view=<?php echo $applicantions->applicant_id; ?>">
                                                                <?php echo "Name:" .  $applicantions->name . " <br> Sex: " . $applicantions->sex . "<br> DOB:" . $applicantions->dob; ?>
                                                            </a>
                                                        </th>
                                                        <td class="align-middle">
                                                            <?php echo   "Father Name: " . $applicantions->parent_name . " <br> " . "Father IDNO: " . $applicantions->father_idno . " <br> " . "Father Contacts:  " . $applicantions->father_phone; ?>
                                                            <hr>
                                                            <?php echo   "Mother Name: " . $applicantions->mother_name . " <br> " . "Mother IDNO: " . $applicantions->mother_idno . " <br> " . "Mother Contacts:  " . $applicantions->mother_phone; ?>
                                                            <hr>
                                                            <?php echo   "Gurdian Name: " . $applicantions->gurdian_idno . " <br> " . "Gurdian IDNO: " . $applicantions->gurdian_idno . " <br> " . "Gurdian Contacts:  " . $applicantions->gurdian_phone; ?>
                                                        </td>
                                                        <td class="align-middle"><?php echo   "Family Status: " . $applicantions->family_status . " <br> " . "Main Income: " . $applicantions->main_income_source . " <br> " . "Income P.M:  " . $applicantions->income_per_month; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">

                                        </div>
                                    </div>
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
    <?php require_once('../partials/_scripts.php'); ?>
</body>

</html>