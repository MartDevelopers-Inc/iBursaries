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
bursaryApplicant();
require_once('../partials/_applicants_analytics.php');
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
                <div class="card-deck">
                    <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card" style="background-image:url(../public/img/illustrations/corner-2.png);"></div>
                        <!--/.bg-holder-->
                        <div class="card-body position-relative">
                            <h6>My Bursary Applications</h6>
                            <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif text-info"><?php echo $applications; ?></div><a class="font-weight-semi-bold fs--1 text-nowrap" href="applicant_bursary_applications.php">See all<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>

                    <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card" style="background-image:url(../public/img/illustrations/corner-3.png);"></div>
                        <!--/.bg-holder-->
                        <div class="card-body position-relative">
                            <h6>Funds Awarded</h6>
                            <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif"><?php echo  numfmt_format_currency($kes, $funds, "Ksh"); ?></div><a class="font-weight-semi-bold fs--1 text-nowrap" href="applicant_funds_disbursed.php">See all<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>

                    <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card" style="background-image:url(../public/img/illustrations/corner-2.png);"></div>
                        <!--/.bg-holder-->
                        <div class="card-body position-relative">
                            <h6>Open Bursaries</h6>
                            <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif text-info"><?php echo $bursaries; ?></div><a class="font-weight-semi-bold fs--1 text-nowrap" href="applicant_bursaries.php">See all<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>

                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
                                <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">My Recent Bursary Applications</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0">
                        <div class="dashboard-data-table">
                            <table class="table table-sm table-dashboard fs--1 data-table border-bottom">
                                <thead class="bg-200 text-900">
                                    <tr>
                                        <th class="sort pr-1 align-middle">Applicant Details</th>
                                        <th class="sort pr-1 align-middle">Applicant Family Status</th>
                                        <th class="sort pr-1 align-middle">School Details</th>
                                        <th class="sort pr-1 align-middle text-center">Date Applied</th>
                                        <th class="sort pr-1 align-middle text-right">Bursary Status</th>
                                        <th class="no-sort pr-1 align-middle data-table-row-action"></th>
                                    </tr>
                                </thead>
                                <tbody id="purchases">
                                    <?php
                                    $id = $_SESSION['id'];
                                    $ret = "SELECT * FROM `iBursary_application` WHERE applicant_id = '$id'  ";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute(); //ok
                                    $res = $stmt->get_result();
                                    while ($application = $res->fetch_object()) {
                                    ?>
                                        <tr class="btn-reveal-trigger">
                                            <th class="align-middle">
                                                <?php echo "Name" . $application->name . " <br> Sex: " . $application->sex . "<br> DOB: " . $application->dob; ?>
                                            </th>
                                            <td class="align-middle"><?php echo   "Status: " . $application->family_status . " <br> " . "Main Income: " . $application->main_income_source . " <br> " . "Income P.M:  " . $application->income_per_month; ?></td>
                                            <td class="align-middle">
                                                <?php echo "Sch Name: " . $application->school_name . "<br> Adm No :" . $application->adm_no . "<br> Year Of Study:" . $application->year_of_study; ?>
                                            </td>
                                            <td class="align-middle text-right"><?php echo  date('d M Y - g:ia', strtotime($application->created_at)); ?></td>
                                            <td class="align-middle text-center fs-0">
                                                <?php
                                                if ($application->approval_status == 'Approved') {
                                                    echo
                                                    "
                                                    <span class='badge badge rounded-capsule badge-soft-success'> Approved <span class='ml-1 fas fa-check' data-fa-transform='shrink-2'></span></span>
                                                ";
                                                } else if ($application->approval_status == 'Incomplete') {
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
                                            <td class="align-middle white-space-nowrap">
                                                <div class="dropdown text-sans-serif"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal mr-3" type="button" id="dropdown0" data-toggle="dropdown" data-boundary="html" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                    <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="dropdown0">
                                                        <div class="bg-white py-2">
                                                            <a class="dropdown-item" href="applicant_view_bursary.php?view=<?php echo $application->id; ?>">View</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
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