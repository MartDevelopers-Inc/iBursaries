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
if (isset($_POST['add_application'])) {
    //Error Handling and prevention of posting double entries
    $error = 0;

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = mysqli_real_escape_string($mysqli, trim($_POST['id']));
    } else {
        $error = 1;
        $err = "ID Cannot Be Empty";
    }

    if (isset($_POST['applicant_id']) && !empty($_POST['applicant_id'])) {
        $applicant_id = mysqli_real_escape_string($mysqli, trim($_POST['applicant_id']));
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

    if (isset($_POST['sex']) && !empty($_POST['sex'])) {
        $sex = mysqli_real_escape_string($mysqli, trim($_POST['sex']));
    } else {
        $error = 1;
        $err = "Applicant Gender  Cannot Be Empty";
    }

    if (isset($_POST['dob']) && !empty($_POST['dob'])) {
        $dob = mysqli_real_escape_string($mysqli, trim($_POST['dob']));
    } else {
        $error = 1;
        $err = "Applicant DOB  Cannot Be Empty";
    }

    /* Post Files */
    $id_attachment = $_FILES['id_attachment']['name'];
    move_uploaded_file($_FILES["id_attachment"]["tmp_name"], "../public/uploads/user_data/" . $_FILES["id_attachment"]["name"]);

    if (isset($_POST['disability']) && !empty($_POST['disability'])) {
        $disability = mysqli_real_escape_string($mysqli, trim($_POST['disability']));
    } else {
        $error = 1;
        $err = "Applicant Disability  Cannot Be Empty";
    }


    if (isset($_POST['parent_name']) && !empty($_POST['parent_name'])) {
        $parent_name = mysqli_real_escape_string($mysqli, trim($_POST['parent_name']));
    } else {
        $error = 1;
        $err = "Father Name  Cannot Be Empty";
    }

    if (isset($_POST['father_idno']) && !empty($_POST['father_idno'])) {
        $father_idno = mysqli_real_escape_string($mysqli, trim($_POST['father_idno']));
    } else {
        $error = 1;
        $err = "Applicant Father ID NO Cannot Be Empty";
    }

    if (isset($_POST['father_mobile']) && !empty($_POST['father_mobile'])) {
        $father_mobile = mysqli_real_escape_string($mysqli, trim($_POST['father_mobile']));
    } else {
        $error = 1;
        $err = "Applicant Father Mobile No. Cannot Be Empty";
    }

    if (isset($_POST['mother_name']) && !empty($_POST['mother_name'])) {
        $mother_name = mysqli_real_escape_string($mysqli, trim($_POST['mother_name']));
    } else {
        $error = 1;
        $err = "Applicant Mother Name Cannot Be Empty";
    }

    if (isset($_POST['mother_idno']) && !empty($_POST['mother_idno'])) {
        $mother_idno = mysqli_real_escape_string($mysqli, trim($_POST['mother_idno']));
    } else {
        $error = 1;
        $err = "Applicant Mother ID NO Cannot Be Empty";
    }

    if (isset($_POST['mother_phone']) && !empty($_POST['mother_phone'])) {
        $mother_phone = mysqli_real_escape_string($mysqli, trim($_POST['mother_phone']));
    } else {
        $error = 1;
        $err = "Applicant Mother Mobile No. Cannot Be Empty";
    }

    if (isset($_POST['gurdian_name']) && !empty($_POST['gurdian_name'])) {
        $gurdian_name = mysqli_real_escape_string($mysqli, trim($_POST['gurdian_name']));
    } else {
        $error = 1;
        $err = "Applicant Gurdian Name Cannot Be Empty";
    }

    if (isset($_POST['gurdian_idno']) && !empty($_POST['gurdian_idno'])) {
        $gurdian_idno = mysqli_real_escape_string($mysqli, trim($_POST['gurdian_idno']));
    } else {
        $error = 1;
        $err = "Applicant Gurdian ID NO Cannot Be Empty";
    }

    if (isset($_POST['gurdian_phone']) && !empty($_POST['gurdian_phone'])) {
        $gurdian_phone = mysqli_real_escape_string($mysqli, trim($_POST['gurdian_phone']));
    } else {
        $error = 1;
        $err = "Applicant Gurdian Mobile No. Cannot Be Empty";
    }

    if (isset($_POST['who_pays_fees']) && !empty($_POST['who_pays_fees'])) {
        $who_pays_fees = mysqli_real_escape_string($mysqli, trim($_POST['who_pays_fees']));
    } else {
        $error = 1;
        $err = "Who Pays Fees Cannot Be Empty";
    }

    if (isset($_POST['school_name']) && !empty($_POST['school_name'])) {
        $school_name  = mysqli_real_escape_string($mysqli, trim($_POST['school_name']));
    } else {
        $error = 1;
        $err = "Applicant School Name Cannot Be Empty";
    }

    if (isset($_POST['po_box']) && !empty($_POST['po_box'])) {
        $po_box  = mysqli_real_escape_string($mysqli, trim($_POST['po_box']));
    } else {
        $error = 1;
        $err = "AApplicant School  P.O Box Cannot Be Empty";
    }

    if (isset($_POST['tel']) && !empty($_POST['tel'])) {
        $tel  = mysqli_real_escape_string($mysqli, trim($_POST['tel']));
    } else {
        $error = 1;
        $err = "Applicant School  Telephone No Cannot Be Empty";
    }

    if (isset($_POST['sch_email']) && !empty($_POST['sch_email'])) {
        $sch_email  = mysqli_real_escape_string($mysqli, trim($_POST['sch_email']));
    } else {
        $error = 1;
        $err = "Applicant School  Email Address  Cannot Be Empty";
    }

    if (isset($_POST['year_of_admno']) && !empty($_POST['year_of_admno'])) {
        $year_of_admno  = mysqli_real_escape_string($mysqli, trim($_POST['year_of_admno']));
    } else {
        $error = 1;
        $err = "Applicant Admission Year  Cannot Be Empty";
    }

    if (isset($_POST['adm_no']) && !empty($_POST['adm_no'])) {
        $adm_no  = mysqli_real_escape_string($mysqli, trim($_POST['adm_no']));
    } else {
        $error = 1;
        $err = "Applicant Admission Number  Cannot Be Empty";
    }

    if (isset($_POST['year_of_study']) && !empty($_POST['year_of_study'])) {
        $year_of_study  = mysqli_real_escape_string($mysqli, trim($_POST['year_of_study']));
    } else {
        $error = 1;
        $err = "Applicant Year Of Study Cannot Be Empty";
    }

    /* Post Files */
    $school_id_attachment = $_FILES['school_id_attachment']['name'];
    move_uploaded_file($_FILES["school_id_attachment"]["tmp_name"], "../public/uploads/user_data/" . $_FILES["school_id_attachment"]["name"]);

    if (isset($_POST['school_category']) && !empty($_POST['school_category'])) {
        $school_category  = mysqli_real_escape_string($mysqli, trim($_POST['school_category']));
    } else {
        $error = 1;
        $err = "Applicant School Category Cannot Be Empty";
    }

    if (isset($_POST['fee_payable']) && !empty($_POST['fee_payable'])) {
        $fee_payable  = mysqli_real_escape_string($mysqli, trim($_POST['fee_payable']));
    } else {
        $error = 1;
        $err = "Applicant Fee Payable Cannot Be Empty";
    }

    if (isset($_POST['fee_paid']) && !empty($_POST['fee_paid'])) {
        $fee_paid  = mysqli_real_escape_string($mysqli, trim($_POST['fee_paid']));
    } else {
        $error = 1;
        $err = "Applicant Fee Paid Cannot Be Empty";
    }

    if (isset($_POST['helb_loans']) && !empty($_POST['helb_loans'])) {
        $helb_loans  = mysqli_real_escape_string($mysqli, trim($_POST['helb_loans']));
    } else {
        $error = 1;
        $err = "Any Helb Loans Cannot Be Empty";
    }

    /* Post Files */
    $helb_loans_attachment = $_FILES['helb_loans_attachment']['name'];
    move_uploaded_file($_FILES["helb_loans_attachment"]["tmp_name"], "../public/uploads/user_data/" . $_FILES["helb_loans_attachment"]["name"]);

    if (isset($_POST['family_status']) && !empty($_POST['family_status'])) {
        $family_status  = mysqli_real_escape_string($mysqli, trim($_POST['family_status']));
    } else {
        $error = 1;
        $err = "Applicant Family Status Cannot Be Empty";
    }

    /* Post Files */
    $family_status_attachments = $_FILES['family_status_attachments']['name'];
    move_uploaded_file($_FILES["family_status_attachments"]["tmp_name"], "../public/uploads/user_data/" . $_FILES["family_status_attachments"]["name"]);


    if (isset($_POST['main_income_source']) && !empty($_POST['main_income_source'])) {
        $main_income_source  = mysqli_real_escape_string($mysqli, trim($_POST['main_income_source']));
    } else {
        $error = 1;
        $err = "Main Income Source  Cannot Be Empty";
    }

    if (isset($_POST['income_per_month']) && !empty($_POST['income_per_month'])) {
        $income_per_month  = mysqli_real_escape_string($mysqli, trim($_POST['income_per_month']));
    } else {
        $error = 1;
        $err = "Income Per Month  Cannot Be Empty";
    }

    if (isset($_POST['bank_name']) && !empty($_POST['bank_name'])) {
        $bank_name  = mysqli_real_escape_string($mysqli, trim($_POST['bank_name']));
    } else {
        $error = 1;
        $err = "School Bank Name Cannot Be Empty";
    }

    if (isset($_POST['branch']) && !empty($_POST['branch'])) {
        $branch  = mysqli_real_escape_string($mysqli, trim($_POST['branch']));
    } else {
        $error = 1;
        $err = "School Bank Branch Name Cannot Be Empty";
    }

    if (isset($_POST['account_no']) && !empty($_POST['account_no'])) {
        $account_no  = mysqli_real_escape_string($mysqli, trim($_POST['account_no']));
    } else {
        $error = 1;
        $err = "School Bank Account No Cannot Be Empty";
    }

    /*
     if (isset($_POST['recommendation']) && !empty($_POST['recommendation'])) {
        $recommendation  = mysqli_real_escape_string($mysqli, trim($_POST['recommendation']));
    } else {
        $error = 1;
        $err = "Recomendation  Cannot Be Empty";
    }

    if (isset($_POST['chairman_name']) && !empty($_POST['chairman_name'])) {
        $chairman_name  = mysqli_real_escape_string($mysqli, trim($_POST['chairman_name']));
    } else {
        $error = 1;
        $err = "Chairman Name  Cannot Be Empty";
    }

    if (isset($_POST['secretary_name']) && !empty($_POST['secretary_name'])) {
        $secretary_name  = mysqli_real_escape_string($mysqli, trim($_POST['secretary_name']));
    } else {
        $error = 1;
        $err = "Secretary Name  Cannot Be Empty";
    }

    if (isset($_POST['date_approved']) && !empty($_POST['date_approved'])) {
        $date_approved  = mysqli_real_escape_string($mysqli, trim($_POST['date_approved']));
    } else {
        $error = 1;
        $err = "Date Approved  Cannot Be Empty";
    }

    if (isset($_POST['approval_status']) && !empty($_POST['approval_status'])) {
        $approval_status  = mysqli_real_escape_string($mysqli, trim($_POST['approval_status']));
    } else {
        $error = 1;
        $err = "Approval Status  Cannot Be Empty";
    }

    if (isset($_POST['funds_disbursed']) && !empty($_POST['funds_disbursed'])) {
        $funds_disbursed  = mysqli_real_escape_string($mysqli, trim($_POST['funds_disbursed']));
    } else {
        $error = 1;
        $err = "Funds Disbursed Cannot Be Empty";
    } */

    if (isset($_POST['bursary_code']) && !empty($_POST['bursary_code'])) {
        $bursary_code  = mysqli_real_escape_string($mysqli, trim($_POST['bursary_code']));
    } else {
        $error = 1;
        $err = "Bursary Code Cannot Be Empty";
    }


    if (!$error) {
        /* Prevent Double Entries */
        $sql = "SELECT * FROM  iBursary_application WHERE   bursary_code = '$bursary_code'  ";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($bursary_code == $row['bursary_code']) {
                $err =  "A Bursary With This Code $bursary_code  Already Exists";
            }
        } else {
            /* No Error Or Duplicate */
            $query = "INSERT INTO iBursary_application  (id, applicant_id, name, sex, dob, id_attachment, disability, parent_name, father_idno, father_mobile, mother_name, mother_idno, mother_phone, gurdian_name, gurdian_idno, gurdian_phone, who_pays_fees, school_name, po_box, tel, sch_email, year_of_admno, adm_no, year_of_study, school_id_attachment, school_category, fee_payable, fee_paid, helb_loans, helb_loans_attachment, family_status, family_status_attachments, main_income_source, income_per_month, bank_name, branch, account_no,  bursary_code) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc = $stmt->bind_param(
                'ssssssssssssssssssssssssssssssssssssss',
                $id,
                $applicant_id,
                $name,
                $sex,
                $dob,
                $id_attachment,
                $disability,
                $parent_name,
                $father_idno,
                $father_mobile,
                $mother_name,
                $mother_idno,
                $mother_phone,
                $gurdian_name,
                $gurdian_idno,
                $gurdian_phone,
                $who_pays_fees,
                $school_name,
                $po_box,
                $tel,
                $sch_email,
                $year_of_admno,
                $adm_no,
                $year_of_study,
                $school_id_attachment,
                $school_category,
                $fee_payable,
                $fee_paid,
                $helb_loans,
                $helb_loans_attachment,
                $family_status,
                $family_status_attachments,
                $main_income_source,
                $income_per_month,
                $bank_name,
                $branch,
                $account_no,
                $bursary_code
            );
            $stmt->execute();
            if ($stmt) {
                $success = "Bursary Application Record Added" && header("refresh:1; url=bursary_applications.php");
            } else {
                $info = "Please Try Again Or Try Later";
            }
        }
    }
}


/* Delete Application */
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
                                                <div class="modal-dialog  modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Award <?php echo $applicantions->name . " - " . $applicantions->bursary_code;?> Funds  </h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Add Course Form -->
                                                            <form method="post" enctype="multipart/form-data" role="form">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="">CDF Chairman Name</label>
                                                                            <input type="text" required name="chairman_name"   class="form-control">
                                                                            <input type="hidden" required name="id" value="<?php echo $applicantions->id; ?>" class="form-control">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="">CDF Secretary Name</label>
                                                                            <input type="text" required name="secretary_name"  class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-md-4">
                                                                            <label for="">Awarded Funds</label>
                                                                            <input type="text" required name="funds_disbursed"  class="form-control">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label for="">Approval Status</label>
                                                                            <select class="form-control" name="approval_status ">
                                                                                <option>Approved</option>
                                                                                <option>Pending</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label for="">Date Approved</label>
                                                                            <input type="date" required name="date_approved"  class="form-control">
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