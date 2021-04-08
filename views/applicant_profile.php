<?php
/*
 * Created on Fri Apr 02 2021
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
                <?php
                require_once('../partials/_applicant_sidenav.php');
                $id = $_SESSION['id'];
                $ret = "SELECT * FROM  iBursary_applicants  WHERE id = '$id' ";
                $stmt = $mysqli->prepare($ret);
                $stmt->execute(); //ok
                $res = $stmt->get_result();
                while ($applicant = $res->fetch_object()) {

                ?>
                    <!-- Sidebar -->
                    <div class="card mb-3">
                        <div class="card-header position-relative min-vh-25 mb-7">
                            <div class="bg-holder rounded-soft rounded-bottom-0" style="background-image:url(../public/img/generic/4.jpg);"></div>
                            <!--/.bg-holder-->
                            <div class='avatar avatar-5xl avatar-profile'><img class='rounded-circle img-thumbnail shadow-sm' src='../public/uploads/user_images/no-profile.png' width='200' /></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="mb-1"><?php echo $applicant->name; ?> <small class="fas fa-check-circle text-primary ml-1" data-toggle="tooltip" data-placement="right" title="Verified" data-fa-transform="shrink-4 down-2"></small></h4>
                                    <h5 class="fs-0 font-weight-normal">Gender: <?php echo $applicant->sex; ?></h5>
                                    <h5 class="fs-0 font-weight-normal">DOB: <?php echo $applicant->dob; ?></h5>
                                    <h5 class="fs-0 font-weight-normal">Contacts: <?php echo $applicant->phone; ?></h5>
                                    <h5 class="fs-0 font-weight-normal">Email: <?php echo $applicant->email; ?></h5>
                                    <h5 class="fs-0 font-weight-normal">National ID NO: <?php echo $applicant->idno; ?></h5>
                                    <hr class="border-dashed my-4 d-lg-none" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-lg-12 pr-lg-2">
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Residential Details </h5>
                                </div>
                                <div class="card-body text-justify">
                                    <table id="" class="table table-sm table-dashboard data-table no-wrap mb-0 fs--1 w-100">
                                        <thead class="bg-200">
                                            <tr>
                                                <th class="sort">County</th>
                                                <th class="sort">Sub County</th>
                                                <th class="sort">Ward</th>
                                                <th class="sort">Sub Location</th>
                                                <th class="sort">Village</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white">
                                            <tr>
                                                <td><?php echo $applicant->county; ?></td>
                                                <td><?php echo $applicant->sub_county; ?></td>
                                                <td><?php echo $applicant->ward; ?></td>
                                                <td><?php echo $applicant->sub_location; ?></td>
                                                <td><?php echo $applicant->village; ?></td>
                                            </tr>

                                        </tbody>
                                    </table>
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