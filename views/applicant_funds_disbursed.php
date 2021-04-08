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
bursaryApplicant();
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
                <?php require_once('../partials/_applicant_sidenav.php'); ?>
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
                                <h3 class="mb-0">Awarded Funds On My Applied Bursaries</h3>
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
                                            <th class="sort">Bursary Code</th>
                                            <th class="sort">Chairman </th>
                                            <th class="sort">Secretary</th>
                                            <th class="sort">Approval Status</th>
                                            <th class="sort">Date Approved</th>
                                            <th class="sort">Funds Awarded</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        <?php
                                        /* Gets All Bursaries Which Belongs To Logged In User And Has Funds Awarded */
                                        $applicant_id = $_SESSION['id'];
                                        $ret = "SELECT * FROM `iBursary_application` WHERE applicant_id = '$applicant_id' AND approval_status !='' ";
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->execute(); //ok
                                        $res = $stmt->get_result();
                                        while ($applicantions = $res->fetch_object()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $applicantions->bursary_code; ?></td>
                                                <td><?php echo $applicantions->approval_status; ?></td>
                                                <td><?php echo $applicantions->chairman_name; ?></td>
                                                <td><?php echo $applicantions->secretary_name; ?></td>
                                                <td>
                                                    <?php
                                                    if ($applicantions->approval_status == 'Approved') {
                                                        echo
                                                        "
                                                    <span class='badge badge rounded-capsule badge-soft-success'> Approved <span class='ml-1 fas fa-check' data-fa-transform='shrink-2'></span></span>
                                                ";
                                                    } else if ($applicantions->approval_status == 'Incomplete') {
                                                        echo
                                                        "
                                                    <span class='badge badge rounded-capsule badge-soft-warning'> Incomplete <span class='ml-1 fas fa-warning' data-fa-transform='shrink-2'></span></span>
                                                ";
                                                    } else {
                                                        echo
                                                        "
                                                    <span class='badge badge rounded-capsule badge-soft-danger'> Pending <span class='ml-1 fas fa-times' data-fa-transform='shrink-2'></span></span>
                                                ";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo numfmt_format_currency($kes, $applicantions->funds_disbursed, "Ksh"); ?></td>
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