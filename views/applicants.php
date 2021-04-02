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

/* Bulk Import Applicants From XLS Files */

/* Bulk Import On Students */

use MartDevelopersInc\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once('../config/DataSource.php');
$db = new DataSource();
$conn = $db->getConnection();
require_once('vendor/autoload.php');

if (isset($_POST["upload"])) {

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    /* Where Magic Happens */

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'public/uploads/EzanaLMSData/XLSFiles/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        for ($i = 1; $i <= $sheetCount; $i++) {

            $id = "";
            if (isset($spreadSheetAry[$i][0])) {
                $id = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            }

            $name = "";
            if (isset($spreadSheetAry[$i][1])) {
                $name = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
            }

            $phone = "";
            if (isset($spreadSheetAry[$i][2])) {
                $phone = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
            }

            $dob = "";
            if (isset($spreadSheetAry[$i][3])) {
                $dob = mysqli_real_escape_string($conn, $spreadSheetAry[$i][3]);
            }

            $idno = "";
            if (isset($spreadSheetAry[$i][4])) {
                $idno = mysqli_real_escape_string($conn, $spreadSheetAry[$i][4]);
            }

            $email = "";
            if (isset($spreadSheetAry[$i][5])) {
                $email = mysqli_real_escape_string($conn, $spreadSheetAry[$i][5]);
            }

            $sex = "";
            if (isset($spreadSheetAry[$i][6])) {
                $sex = mysqli_real_escape_string($conn, $spreadSheetAry[$i][6]);
            }

            $county = "";
            if (isset($spreadSheetAry[$i][7])) {
                $county = mysqli_real_escape_string($conn, $spreadSheetAry[$i][7]);
            }

            $sub_county = "";
            if (isset($spreadSheetAry[$i][8])) {
                $sub_county = mysqli_real_escape_string($conn, $spreadSheetAry[$i][8]);
            }

            $ward = "";
            if (isset($spreadSheetAry[$i][9])) {
                $ward = mysqli_real_escape_string($conn, $spreadSheetAry[$i][9]);
            }

            $sub_location = "";
            if (isset($spreadSheetAry[$i][10])) {
                $sub_location = mysqli_real_escape_string($conn, $spreadSheetAry[$i][10]);
            }

            $village = "";
            if (isset($spreadSheetAry[$i][11])) {
                $village = mysqli_real_escape_string($conn, $spreadSheetAry[$i][11]);
            }


            /* Default Applicant Account Password */
            $password = sha1(md5("Applicant"));


            if (!empty($name) || !empty($idno) || !empty($email) || !empty($phone) || !empty($sex)) {
                $query = "INSERT INTO iBursary_applicants  (id, name, phone, dob, idno, email, password, sex, county, sub_county, ward, sub_location, village) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $paramType = "sssssssssssssssssss";
                $paramArray = array(
                    $id,
                    $name,
                    $phone,
                    $dob,
                    $idno,
                    $email,
                    $password,
                    $sex,
                    $county,
                    $sub_county,
                    $ward,
                    $sub_location,
                    $village

                );
                $insertId = $db->insert($query, $paramType, $paramArray);
                if (!empty($insertId)) {
                    $err = "Error Occured While Importing Data";
                } else {
                    $success = "Data Imported" && header("refresh:1; url=applicants.php");
                }
            }
        }
    } else {
        $info = "Invalid File Type. Upload Excel File.";
    }
}
/* Add Applicant */
if (isset($_POST['add_applicant'])) {
    //Error Handling and prevention of posting double entries
    $error = 0;

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = mysqli_real_escape_string($mysqli, trim($_POST['id']));
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

    if (isset($_POST['phone']) && !empty($_POST['phone'])) {
        $phone = mysqli_real_escape_string($mysqli, trim($_POST['phone']));
    } else {
        $error = 1;
        $err = "Applicant Phone Cannot Be Empty";
    }

    if (isset($_POST['dob']) && !empty($_POST['dob'])) {
        $dob = mysqli_real_escape_string($mysqli, trim($_POST['dob']));
    } else {
        $error = 1;
        $err = "Applicant DOB  Cannot Be Empty";
    }

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
    } else {
        $error = 1;
        $err = "Applicant Email  Cannot Be Empty";
    }

    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['password']))));
    } else {
        $error = 1;
        $err = "Applicant Password  Cannot Be Empty";
    }

    if (isset($_POST['sex']) && !empty($_POST['sex'])) {
        $sex = mysqli_real_escape_string($mysqli, trim($_POST['sex']));
    } else {
        $error = 1;
        $err = "Applicant Gender  Cannot Be Empty";
    }

    if (isset($_POST['county']) && !empty($_POST['county'])) {
        $county = mysqli_real_escape_string($mysqli, trim($_POST['county']));
    } else {
        $error = 1;
        $err = "Applicant County  Cannot Be Empty";
    }

    if (isset($_POST['sub_county']) && !empty($_POST['sub_county'])) {
        $sub_county = mysqli_real_escape_string($mysqli, trim($_POST['sub_county']));
    } else {
        $error = 1;
        $err = "Applicant Sub County  Cannot Be Empty";
    }

    if (isset($_POST['ward']) && !empty($_POST['ward'])) {
        $ward = mysqli_real_escape_string($mysqli, trim($_POST['ward']));
    } else {
        $error = 1;
        $err = "Applicant Ward Cannot Be Empty";
    }

    if (isset($_POST['sub_location']) && !empty($_POST['sub_location'])) {
        $sub_location = mysqli_real_escape_string($mysqli, trim($_POST['sub_location']));
    } else {
        $error = 1;
        $err = "Applicant Sub Location Cannot Be Empty";
    }

    if (isset($_POST['village']) && !empty($_POST['village'])) {
        $village  = mysqli_real_escape_string($mysqli, trim($_POST['village']));
    } else {
        $error = 1;
        $err = "Applicant Village Cannot Be Empty";
    }

    if (isset($_POST['idno']) && !empty($_POST['idno'])) {
        $idno  = mysqli_real_escape_string($mysqli, trim($_POST['idno']));
    } else {
        $error = 1;
        $err = "Applicant National ID Number Cannot Be Empty";
    }

    if (!$error) {
        /* Prevent Double Entries */
        $sql = "SELECT * FROM  iBursary_applicants WHERE  email = '$email' && idno = '$idno'  ";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($email == $row['email'] || $idno == $row['idno']) {
                $err =  "An Applicant With This Email : $email And This ID No : $idno Already Exists";
            }
        } else {
            /* No Error Or Duplicate */
            $query = "INSERT INTO iBursary_applicants  (id, name, phone, dob, idno, email, password, sex, county, sub_county, ward, sub_location, village)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc = $stmt->bind_param('sssssssssssss', $id, $name, $phone, $dob, $idno, $email, $password, $sex, $county, $sub_county, $ward, $sub_location, $village);
            $stmt->execute();
            if ($stmt) {
                $success = "Applicant Record Added" && header("refresh:1; url=applicants.php");
            } else {
                $info = "Please Try Again Or Try Later";
            }
        }
    }
}

/* Update Applicant */
if (isset($_POST['update_applicant'])) {
    //Error Handling and prevention of posting double entries
    $error = 0;

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = mysqli_real_escape_string($mysqli, trim($_POST['id']));
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

    if (isset($_POST['phone']) && !empty($_POST['phone'])) {
        $phone = mysqli_real_escape_string($mysqli, trim($_POST['phone']));
    } else {
        $error = 1;
        $err = "Applicant Phone Cannot Be Empty";
    }

    if (isset($_POST['dob']) && !empty($_POST['dob'])) {
        $dob = mysqli_real_escape_string($mysqli, trim($_POST['dob']));
    } else {
        $error = 1;
        $err = "Applicant DOB  Cannot Be Empty";
    }

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
    } else {
        $error = 1;
        $err = "Applicant Email  Cannot Be Empty";
    }

    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['password']))));
    } else {
        $error = 1;
        $err = "Applicant Password  Cannot Be Empty";
    }

    if (isset($_POST['sex']) && !empty($_POST['sex'])) {
        $sex = mysqli_real_escape_string($mysqli, trim($_POST['sex']));
    } else {
        $error = 1;
        $err = "Applicant Gender  Cannot Be Empty";
    }

    if (isset($_POST['county']) && !empty($_POST['county'])) {
        $county = mysqli_real_escape_string($mysqli, trim($_POST['county']));
    } else {
        $error = 1;
        $err = "Applicant County  Cannot Be Empty";
    }

    if (isset($_POST['sub_county']) && !empty($_POST['sub_county'])) {
        $sub_county = mysqli_real_escape_string($mysqli, trim($_POST['sub_county']));
    } else {
        $error = 1;
        $err = "Applicant Sub County  Cannot Be Empty";
    }

    if (isset($_POST['ward']) && !empty($_POST['ward'])) {
        $ward = mysqli_real_escape_string($mysqli, trim($_POST['ward']));
    } else {
        $error = 1;
        $err = "Applicant Ward Cannot Be Empty";
    }

    if (isset($_POST['sub_location']) && !empty($_POST['sub_location'])) {
        $sub_location = mysqli_real_escape_string($mysqli, trim($_POST['sub_location']));
    } else {
        $error = 1;
        $err = "Applicant Sub Location Cannot Be Empty";
    }

    if (isset($_POST['village']) && !empty($_POST['village'])) {
        $village  = mysqli_real_escape_string($mysqli, trim($_POST['village']));
    } else {
        $error = 1;
        $err = "Applicant Village Cannot Be Empty";
    }

    if (isset($_POST['idno']) && !empty($_POST['idno'])) {
        $idno  = mysqli_real_escape_string($mysqli, trim($_POST['idno']));
    } else {
        $error = 1;
        $err = "Applicant National ID Number Cannot Be Empty";
    }

    if (!$error) {
        /* No Error Or Duplicate */
        $query = "UPDATE iBursary_applicants SET name =?, phone =?, dob =?, idno =?, email =?, password =?, sex =?, county =?, sub_county =?, ward =?, sub_location =?, village =?
           WHERE id = ?";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('sssssssssssss', $name, $phone, $dob, $idno, $email, $password, $sex, $county, $sub_county, $ward, $sub_location, $village, $id);
        $stmt->execute();
        if ($stmt) {
            $success = "Applicant Record Updated" && header("refresh:1; url=applicants.php");
        } else {
            $info = "Please Try Again Or Try Later";
        }
    }
}


/* Delete Applicant */
if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $adn = "DELETE FROM iBursary_applicants WHERE id=?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $delete);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Applicant Record Deleted" && header("refresh:1; url=applicants.php");
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
                                <h3 class="mb-0">Applicants</h3>
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
                                <div class="text-right">
                                    <button data-toggle="modal" data-target="#import_modal" class="btn btn-primary mr-1 mb-1" type="button">
                                        Bulk Import Applicants
                                    </button>
                                    <button data-toggle="modal" data-target="#add_modal" class="btn btn-primary mr-1 mb-1" type="button">
                                        Add Applicant
                                    </button>
                                </div>
                                <hr>
                                <table id="data_table" class="table table-sm table-dashboard data-table no-wrap mb-0 fs--1 w-100">
                                    <thead class="bg-200">
                                        <tr>
                                            <th class="sort">Name</th>
                                            <th class="sort">Contacts</th>
                                            <th class="sort">Gender</th>
                                            <th class="sort">IDNO</th>
                                            <th class="sort">Sub County</th>
                                            <th class="sort">Ward</th>
                                            <th class="sort">Sub Location</th>
                                            <th class="sort">Village</th>
                                            <th class="sort">Manage</th>
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
                                                <td><?php echo $applicant->sex; ?></td>
                                                <td><?php echo $applicant->idno; ?></td>
                                                <td><?php echo $applicant->sub_county; ?></td>
                                                <td><?php echo $applicant->ward; ?></td>
                                                <td><?php echo $applicant->sub_location; ?></td>
                                                <td><?php echo $applicant->village; ?></td>
                                                <td>
                                                    <div class="dropdown text-sans-serif"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal mr-3" type="button" id="dropdown0" data-toggle="dropdown" data-boundary="html" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="dropdown0">
                                                            <div class="bg-white py-2">
                                                                <a class="dropdown-item" href="applicant_bursary.php?view=<?php echo $applicant->id; ?>">View Bursary Applications</a>
                                                                <a class="dropdown-item" data-toggle="modal" href="#update-<?php echo $applicant->id; ?>">Update</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item text-danger" data-toggle="modal" href="#delete-<?php echo $applicant->id; ?>">Delete</a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Confirm Delete Modal -->
                                                    <div class="modal fade" id="delete-<?php echo $applicant->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">CONFIRM DELETE</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-center text-danger">
                                                                    <h4>Delete <?php echo $applicant->name; ?> Details ?</h4>
                                                                    <br>
                                                                    <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                                                                    <a href="applicants.php?delete=<?php echo $applicant->id; ?>" class="text-center btn btn-danger"> Delete </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Confirmation -->

                                                    <!-- Update Modal -->
                                                    <div class="modal fade" id="update-<?php echo $applicant->id; ?>">
                                                        <div class="modal-dialog  modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Update <?php echo $applicant->name; ?> Details </h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="post" enctype="multipart/form-data" role="form">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="form-group col-md-12">
                                                                                    <label for="">Full Name</label>
                                                                                    <input type="text" required name="name" value="<?php echo $applicant->name; ?>" class="form-control">
                                                                                    <input type="hidden" required name="id" value="<?php echo $applicant->id; ?>" class="form-control">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="">National ID Number</label>
                                                                                    <input type="text" required name="idno" value="<?php echo $applicant->idno; ?>" class="form-control">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="">Date Of Birth</label>
                                                                                    <input type="text" required name="dob" value="<?php echo $applicant->dob; ?>" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="">Contacts | Phone Number</label>
                                                                                    <input type="text" required name="phone" value="<?php echo $applicant->phone; ?>" class="form-control">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="">Email Address</label>
                                                                                    <input type="text" required name="email" value="<?php echo $applicant->email; ?>" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="">Gender</label>
                                                                                    <select type="text" required name="sex" class="form-control">
                                                                                        <option><?php echo $applicant->sex; ?></option>
                                                                                        <option>Male</option>
                                                                                        <option>Female</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="">Password</label>
                                                                                    <input type="text" required name="password" value="Applicant" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="">County</label>
                                                                                    <input type="text" required name="county" value="<?php echo $applicant->county; ?>" class="form-control">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="">Sub County</label>
                                                                                    <input type="text" required name="sub_county" value="<?php echo $applicant->sub_county; ?>" class="form-control">
                                                                                </div>
                                                                                <div class="form-group col-md-4">
                                                                                    <label for="">Ward</label>
                                                                                    <input type="text" required name="ward" value="<?php echo $applicant->ward; ?>" class="form-control">
                                                                                </div>
                                                                                <div class="form-group col-md-4">
                                                                                    <label for="">Sub Location</label>
                                                                                    <input type="text" required name="sub_location" value="<?php echo $applicant->sub_location; ?>" class="form-control">
                                                                                </div>
                                                                                <div class="form-group col-md-4">
                                                                                    <label for="">Village</label>
                                                                                    <input type="text" required name="village" value="<?php echo $applicant->village; ?>" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer text-right">
                                                                            <button type="submit" name="update_applicant" class="btn btn-primary">Update Applicant</button>
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

                <!-- Add Applicant Modal -->
                <div class="modal fade" id="add_modal">
                    <div class="modal-dialog  modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Applicant Details </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" enctype="multipart/form-data" role="form">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="">Full Name</label>
                                                <input type="text" required name="name" class="form-control">
                                                <input type="hidden" required name="id" value="<?php echo $ID; ?>" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">National ID Number</label>
                                                <input type="text" required name="idno" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Date Of Birth</label>
                                                <input type="text" required name="dob" placeholder="DD-MM-YYY" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="">Contacts | Phone Number</label>
                                                <input type="text" required name="phone" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Email Address</label>
                                                <input type="text" required name="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="">Gender</label>
                                                <select type="text" required name="sex" class="form-control">
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Password</label>
                                                <input type="text" required name="password" value="Applicant" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="">County</label>
                                                <input type="text" required name="county" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Sub County</label>
                                                <input type="text" required name="sub_county" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Ward</label>
                                                <input type="text" required name="ward" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Sub Location</label>
                                                <input type="text" required name="sub_location" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Village</label>
                                                <input type="text" required name="village" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" name="add_applicant" class="btn btn-primary">Add Applicant</button>
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