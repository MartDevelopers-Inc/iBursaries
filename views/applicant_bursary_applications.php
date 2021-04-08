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
                                <h3 class="mb-0">My Bursary Applications</h3>
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
                                            <th class="sort">Applicant Details</th>
                                            <th class="sort">Applicant Family Status</th>
                                            <th class="sort">Applicant School Details</th>
                                            <th class="sort">Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        <?php
                                        $applicant_id = $_SESSION['id'];
                                        $ret = "SELECT * FROM `iBursary_application` WHERE applicant_id = '$applicant_id' ";
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->execute(); //ok
                                        $res = $stmt->get_result();
                                        while ($applicantions = $res->fetch_object()) {
                                        ?>
                                            <tr>
                                                <th class="align-middle">
                                                    <?php echo "Name:" .  $applicantions->name . " <br> Sex: " . $applicantions->sex . "<br> DOB:" . $applicantions->dob; ?>
                                                </th>
                                                <td class="align-middle"><?php echo   "Status: " . $applicantions->family_status . " <br> " . "Main Income: " . $applicantions->main_income_source . " <br> " . "Income P.M:  " . $applicantions->income_per_month; ?></td>
                                                <td class="align-middle"><?php echo   "Sch Name: " . $applicantions->school_name . " <br> Category: " . $applicantions->school_category . " <br> Bank Acc No  " . $applicantions->account_no; ?></td>

                                                <td>
                                                    <div class="dropdown text-sans-serif"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal mr-3" type="button" id="dropdown0" data-toggle="dropdown" data-boundary="html" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="dropdown0">
                                                            <div class="bg-white py-2">
                                                                <a class="dropdown-item" href="applicant_view_bursary.php?view=<?php echo $applicantions->id; ?>">View Bursary Details</a>
                                                            </div>
                                                        </div>
                                                    </div>
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

                <!-- Add Bursary Application Modal -->
                <div class="modal fade" id="add_modal">
                    <div class="modal-dialog  modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Bursary Application Form - Kindly Fill In All The Fields</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" enctype="multipart/form-data" role="form">
                                    <div class="card-head">
                                        <h4 class="text-center"> Bursary Details</h4>
                                    </div>
                                    <hr>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="">Bursary Code Number</label>
                                                <select class="form-control" name="bursary_code">
                                                    <option>Select Bursary Code Number</option>
                                                    <?php
                                                    $ret = "SELECT * FROM `iBursary_bursaries` WHERE status = 'Open'  ";
                                                    $stmt = $mysqli->prepare($ret);
                                                    $stmt->execute(); //ok
                                                    $res = $stmt->get_result();
                                                    while ($bursaries = $res->fetch_object()) {
                                                    ?>
                                                        <option><?php echo $bursaries->code; ?></option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-head">
                                        <h4 class="text-center"> Applicant Personal Information</h4>
                                    </div>
                                    <hr>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="">National ID Number</label>
                                                <select class="form-control" id="ApplicantIDNumber" onchange="GetApplicantDetails(this.value);">
                                                    <option>Select Applicant ID Number</option>
                                                    <?php
                                                    $ret = "SELECT * FROM `iBursary_applicants`  ";
                                                    $stmt = $mysqli->prepare($ret);
                                                    $stmt->execute(); //ok
                                                    $res = $stmt->get_result();
                                                    while ($applicant = $res->fetch_object()) {
                                                    ?>
                                                        <option><?php echo $applicant->idno; ?></option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Applicant Full Name</label>
                                                <input type="text" required name="name" id="ApplicantName" class="form-control">
                                                <input type="hidden" required name="applicant_id" id="ApplicantId" class="form-control">
                                                <input type="hidden" required name="id" value="<?php echo $ID; ?>" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Applicant Gender</label>
                                                <input type="text" required name="sex" id="ApplicantSex" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Applicant Date Of Birth</label>
                                                <input type="text" required name="dob" id="ApplicantDOB" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputFile">Scanned National ID Copy</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input required name="id_attachment" type="file" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="">Applicant Any Disabilities (If Yes Indicate If No Fill N/A)</label>
                                                <textarea type="text" rows="3" required name="disability" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-head">
                                        <h4 class="text-center"> Applicant Parents / Family Information</h4>
                                    </div>
                                    <hr>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="">Father Name</label>
                                                <input type="text" required name="parent_name" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Father IDNO</label>
                                                <input type="text" required name="father_idno" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Father Phone Number</label>
                                                <input type="text" required name="father_mobile" class="form-control">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Mother Name</label>
                                                <input type="text" required name="mother_name" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Mother IDNO</label>
                                                <input type="text" required name="mother_idno" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Mother Phone Number</label>
                                                <input type="text" required name="mother_phone" class="form-control">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Gurdian Name</label>
                                                <input type="text" required name="gurdian_name" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Gurdian IDNO</label>
                                                <input type="text" required name="gurdian_idno" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Gurdian Phone Number</label>
                                                <input type="text" required name="gurdian_phone" class="form-control">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Who Pays For School Fees</label>
                                                <select name="who_pays_fees" class="form-control">
                                                    <option>Father</option>
                                                    <option>Mother</option>
                                                    <option>Gurdian</option>
                                                    <option>Well Wisher</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Family Status</label>
                                                <select name="family_status" class="form-control">
                                                    <option>Poor Family</option>
                                                    <option>Single Parent</option>
                                                    <option>Orphan</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputFile">Family Status Documents ( If Any Death Certificates Etc)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input name="family_status_attachments" type="file" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">Family Main Source Of Income</label>
                                                <input type="text" required name="main_income_source" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Income Per Month</label>
                                                <input type="text" required name="income_per_month" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-head">
                                        <h4 class="text-center"> Applicant School Information</h4>
                                    </div>
                                    <hr>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="">School Name</label>
                                                <input type="text" required name="school_name" class="form-control">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">School P.O Box</label>
                                                <input type="text" required name="po_box" class="form-control">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">School Email</label>
                                                <input type="text" required name="sch_email" class="form-control">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">School Tel No.</label>
                                                <input type="text" required name="tel" class="form-control">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Admission Number</label>
                                                <input type="text" required name="adm_no" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Year Admitted / Enrolled</label>
                                                <input type="text" required name="year_of_admno" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Year Of Study</label>
                                                <input type="text" required name="year_of_study" class="form-control">
                                            </div>


                                            <div class="form-group col-md-4">
                                                <label for="">School Category</label>
                                                <select name="school_category" class="form-control">
                                                    <option>Primary School</option>
                                                    <option>Secondary School</option>
                                                    <option>College / University</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">School Fee Payable</label>
                                                <input type="text" required name="fee_payable" class="form-control">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">School Fee Paid</label>
                                                <input type="text" required name="fee_paid" class="form-control">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputFile">School ID Attachment </label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input required name="school_id_attachment" type="file" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">School Bank Name</label>
                                                <input type="text" required name="bank_name" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Bank Branch</label>
                                                <input type="text" required name="branch" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Bank Account Number</label>
                                                <input type="text" required name="account_no" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Any Helb Loan (If Yes Indicate The Amount Awarded)</label>
                                                <input type="text" required name="helb_loans" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputFile">Helb Loan Documents </label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input name="helb_loans_attachment" type="file" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer text-right">
                                        <button type="submit" name="add_application" class="btn btn-primary">Submit Bursary Application</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->

                <!-- Footer -->
                <?php require_once('../partials/_footer.php'); ?>
            </div>
        </div>
    </main>
    <?php require_once('../partials/_scripts.php'); ?>
</body>

</html>