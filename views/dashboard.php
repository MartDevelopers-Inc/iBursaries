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
admin();
require_once('../partials/_analytics.php');
require_once('../partials/_head.php');

/* Mark Bursary As Incomplete */
if (isset($_GET['incomplete'])) {
    $incomplete = $_GET['incomplete'];
    $adn = "UPDATE  iBursary_application SET approval_status = 'Incomplete' WHERE id=?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $incomplete);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Application Marked As Incomplete" && header("refresh:1; url=dashboard.php");
    } else {
        $info = "Please Try Again Or Try Later";
    }
}

/* Delete Bursary Application */
if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $adn = "DELETE FROM iBursary_application WHERE id=?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $delete);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Application Record Deleted" && header("refresh:1; url=dashboard.php");
    } else {
        $info = "Please Try Again Or Try Later";
    }
}
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
                <div class="card-deck">
                    <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card" style="background-image:url(../public/img/illustrations/corner-1.png);"></div>
                        <!--/.bg-holder-->
                        <div class="card-body position-relative">
                            <h6>Applicants</h6>
                            <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif text-warning"><?php echo $applicants; ?></div><a class="font-weight-semi-bold fs--1 text-nowrap" href="applicants.php">See all<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>
                    <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card" style="background-image:url(../public/img/illustrations/corner-2.png);"></div>
                        <!--/.bg-holder-->
                        <div class="card-body position-relative">
                            <h6>Bursary Applications</h6>
                            <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif text-info"><?php echo $applications; ?></div><a class="font-weight-semi-bold fs--1 text-nowrap" href="bursary_applications.php">See all<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>

                    <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card" style="background-image:url(../public/img/illustrations/corner-3.png);"></div>
                        <!--/.bg-holder-->
                        <div class="card-body position-relative">
                            <h6>Funds Disbursed</h6>
                            <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif" data-countup='{"count":<?php echo $funds_disbursed; ?>,"format":"comma","prefix":"Ksh"}'>Ksh <?php echo $funds_disbursed; ?></div><a class="font-weight-semi-bold fs--1 text-nowrap" href="funds_disbursed.php">See all<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>

                </div>

                <div class="card-deck">

                    <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card" style="background-image:url(../public/img/illustrations/corner-2.png);"></div>
                        <!--/.bg-holder-->
                        <div class="card-body position-relative">
                            <h6>Posted Bursaries</h6>
                            <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif text-info"><?php echo $bursaries; ?></div><a class="font-weight-semi-bold fs--1 text-nowrap" href="reports_bursaries.php">See all<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>

                    <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card" style="background-image:url(../public/img/illustrations/corner-3.png);"></div>
                        <!--/.bg-holder-->
                        <div class="card-body position-relative">
                            <h6>Allocated Bursary Funds</h6>
                            <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif" data-countup='{"count":<?php echo $allocated_bursary_fund; ?>,"format":"comma","prefix":"Ksh"}'>Ksh <?php echo $allocated_bursary_fund; ?></div><a class="font-weight-semi-bold fs--1 text-nowrap" href="reports_bursaries.php">See all<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>

                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
                                <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Recent Bursary Applications</h5>
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
                                        <th class="sort pr-1 align-middle text-center">Income P.M</th>
                                        <th class="sort pr-1 align-middle text-right">Bursary Status</th>
                                        <th class="no-sort pr-1 align-middle data-table-row-action"></th>
                                    </tr>
                                </thead>
                                <tbody id="purchases">
                                    <?php
                                    $ret = "SELECT * FROM `iBursary_application`  ";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute(); //ok
                                    $res = $stmt->get_result();
                                    while ($application = $res->fetch_object()) {
                                    ?>
                                        <tr class="btn-reveal-trigger">
                                            <th class="align-middle">
                                                <a href="applicant.php?view=<?php echo $application->applicant_id; ?>">
                                                    <?php echo "Name" . $application->name . " <br> Sex: " . $application->sex . "<br> DOB: " . $application->dob; ?>
                                                </a>
                                            </th>
                                            <td class="align-middle"><?php echo $application->family_status; ?></td>
                                            <td class="align-middle">
                                                <?php echo "Sch Name: " . $application->school_name . "<br> Adm No :" . $application->adm_no . "<br> Year Of Study:" . $application->year_of_study; ?>
                                            </td>
                                            <td class="align-middle text-right"><?php echo $application->income_per_month; ?></td>
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
                                                            <a class="dropdown-item" href="view_bursary.php?view=<?php echo $application->id; ?>">View</a>
                                                            <div class="dropdown-divider"></div>
                                                            <?php
                                                            /* Only Mark As Incomplete When No Funds Have Been Alloacated */
                                                            if ($application->approval_status == 'Approved') {
                                                                echo "";
                                                            } else {
                                                                echo
                                                                "
                                                                    <a class='dropdown-item text-warning' data-toggle='modal' href='#incomplete-$application->id'>Mark Incomplete</a>

                                                                    ";
                                                            }
                                                            ?>

                                                            <a class="dropdown-item text-danger" data-toggle="modal" href="#del-<?php echo $application->id; ?>">Delete</a>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Confirm Delete Modal -->
                                                <div class="modal fade" id="del-<?php echo $application->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">CONFIRM DELETE</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-center text-danger">
                                                                <h4>Delete This Application Details ?</h4>
                                                                <br>
                                                                <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                                                                <a href="dashboard.php?delete=<?php echo $application->id; ?>" class="text-center btn btn-danger"> Delete </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Mark Incomplete Via Modal -->
                                                <div class="modal fade" id="incomplete-<?php echo $application->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">CONFIRM </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-center text-danger">
                                                                <h4>Mark This Application As Incomplete?</h4>
                                                                <br>
                                                                <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                                                                <a href="dashboard.php?incomplete=<?php echo $application->id; ?>" class="text-center btn btn-danger"> Mark Incomplete </a>
                                                            </div>
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