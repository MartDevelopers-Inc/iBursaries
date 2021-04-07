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
/* Bulk Import On Bursaries */

use MartDevelopersInc\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once('../config/DataSource.php');
$db = new DataSource();
$conn = $db->getConnection();
require_once('../vendor/autoload.php');

if (isset($_POST["upload"])) {

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    /* Where Magic Happens */

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = '../public/uploads/sys_data/bursaries/' . $_FILES['file']['name'];
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

            $code = "";
            if (isset($spreadSheetAry[$i][1])) {
                $code = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
            }

            $year = "";
            if (isset($spreadSheetAry[$i][2])) {
                $year = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
            }

            $allocated_funds = "";
            if (isset($spreadSheetAry[$i][3])) {
                $allocated_funds = mysqli_real_escape_string($conn, $spreadSheetAry[$i][3]);
            }

            $status = "";
            if (isset($spreadSheetAry[$i][4])) {
                $status = mysqli_real_escape_string($conn, $spreadSheetAry[$i][4]);
            }



            if (!empty($id) || !empty($code) || !empty($year) || !empty($allocated_funds) || !empty($status)) {
                $query = "INSERT INTO iBursary_bursaries  (id, code, year, allocated_funds, status) VALUES (?,?,?,?,?)";
                $paramType = "sssss";
                $paramArray = array(
                    $id,
                    $code,
                    $year,
                    $allocated_funds,
                    $status
                );
                $insertId = $db->insert($query, $paramType, $paramArray);
                if (!empty($insertId)) {
                    $err = "Error Occured While Importing Data";
                } else {
                    $success = "Data Imported" && header("refresh:1; url=bursaries.php");
                }
            }
        }
    } else {
        $info = "Invalid File Type. Upload Excel File.";
    }
}

/* Add Bursary */
if (isset($_POST['add_bursary'])) {
    //Error Handling and prevention of posting double entries
    $error = 0;

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = mysqli_real_escape_string($mysqli, trim($_POST['id']));
    } else {
        $error = 1;
        $err = "Bursary ID Cannot Be Empty";
    }

    if (isset($_POST['code']) && !empty($_POST['code'])) {
        $code = mysqli_real_escape_string($mysqli, trim($_POST['code']));
    } else {
        $error = 1;
        $err = "Bursary Code Cannot Be Empty";
    }

    if (isset($_POST['year']) && !empty($_POST['year'])) {
        $year = mysqli_real_escape_string($mysqli, trim($_POST['year']));
    } else {
        $error = 1;
        $err = "Bursary Allocated Year Cannot Be Empty";
    }

    if (isset($_POST['allocated_funds']) && !empty($_POST['allocated_funds'])) {
        $allocated_funds = mysqli_real_escape_string($mysqli, trim($_POST['allocated_funds']));
    } else {
        $error = 1;
        $err = "Bursary Allocated Funds Cannot Be Empty";
    }

    if (isset($_POST['status']) && !empty($_POST['status'])) {
        $status = mysqli_real_escape_string($mysqli, trim($_POST['status']));
    } else {
        $error = 1;
        $err = "Bursary Status Funds Cannot Be Empty";
    }

    if (!$error) {
        /* Prevent Double Entries */
        $sql = "SELECT * FROM  iBursary_bursaries WHERE  code = '$code' && year = '$year'  ";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($code == $row['code'] && $year == $row['year']) {
                $err =  "A Bursary With This Code : $code Already Created For Year : $year ";
            }
        } else {
            /* No Error Or Duplicate */
            $query = "INSERT INTO iBursary_bursaries  (id, code, year, allocated_funds, status) VALUES (?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc = $stmt->bind_param('sssss', $id, $code, $year, $allocated_funds, $status);
            $stmt->execute();
            if ($stmt) {
                $success = "Bursary Record Deleted" && header("refresh:1; url=bursaries.php");
            } else {
                $info = "Please Try Again Or Try Later";
            }
        }
    }
}

/* Update Bursary */
if (isset($_POST['update_bursary'])) {
    //Error Handling and prevention of posting double entries
    $error = 0;

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = mysqli_real_escape_string($mysqli, trim($_POST['id']));
    } else {
        $error = 1;
        $err = "Bursary ID Cannot Be Empty";
    }

    if (isset($_POST['code']) && !empty($_POST['code'])) {
        $code = mysqli_real_escape_string($mysqli, trim($_POST['code']));
    } else {
        $error = 1;
        $err = "Bursary Code Cannot Be Empty";
    }

    if (isset($_POST['year']) && !empty($_POST['year'])) {
        $year = mysqli_real_escape_string($mysqli, trim($_POST['year']));
    } else {
        $error = 1;
        $err = "Bursary Allocated Year Cannot Be Empty";
    }

    if (isset($_POST['allocated_funds']) && !empty($_POST['allocated_funds'])) {
        $allocated_funds = mysqli_real_escape_string($mysqli, trim($_POST['allocated_funds']));
    } else {
        $error = 1;
        $err = "Bursary Allocated Funds Cannot Be Empty";
    }

    if (isset($_POST['status']) && !empty($_POST['status'])) {
        $status = mysqli_real_escape_string($mysqli, trim($_POST['status']));
    } else {
        $error = 1;
        $err = "Bursary Status Funds Cannot Be Empty";
    }

    if (!$error) {
        /* No Error Or Duplicate */
        $query = "UPDATE iBursary_bursaries  SET year =?, allocated_funds =?, status =? WHERE id =?";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('ssss', $year, $allocated_funds, $status, $id);
        $stmt->execute();
        if ($stmt) {
            $success = "Bursary Record Updated" && header("refresh:1; url=bursaries.php");
        } else {
            $info = "Please Try Again Or Try Later";
        }
    }
}


/* Delete Bursary */
if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $adn = "DELETE FROM iBursary_bursaries WHERE id=?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $delete);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Bursary Record Deleted" && header("refresh:1; url=bursaries.php");
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
                                <h3 class="mb-0">Bursaries</h3>
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
                                        Bulk Import Bursaries
                                    </button>
                                    <button data-toggle="modal" data-target="#add_modal" class="btn btn-primary mr-1 mb-1" type="button">
                                        Create Bursary
                                    </button>
                                </div>
                                <hr>
                                <table id="data_table" class="table table-sm table-dashboard data-table no-wrap mb-0 fs--1 w-100">
                                    <thead class="bg-200">
                                        <tr>
                                            <th class="sort">Code / Number</th>
                                            <th class="sort">Bursary Year</th>
                                            <th class="sort">Total Allocated Funds</th>
                                            <th class="sort">Bursary Status</th>
                                            <th class="sort">Total Applications</th>
                                            <th class="sort">Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        <?php
                                        $ret = "SELECT * FROM `iBursary_bursaries`  ";
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->execute(); //ok
                                        $res = $stmt->get_result();
                                        while ($bursary = $res->fetch_object()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $bursary->code; ?></td>
                                                <td><?php echo $bursary->year; ?></td>
                                                <td>Ksh <?php
                                                        /* Add Coma After 3 Digits */
                                                        $price_text = (string)$bursary->allocated_funds;
                                                        $arr = str_split($price_text, "3");
                                                        $allocated_bursary_fund = implode(",", $arr);
                                                        echo $allocated_bursary_fund ;
                                                        ?>
                                                </td>
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
                                                <td>
                                                    <?php
                                                    /* Number Of Applications */
                                                    $bursarycode = $bursary->code;
                                                    $query = "SELECT COUNT(*)  FROM `iBursary_application` WHERE bursary_code = '$bursarycode'  ";
                                                    $stmt = $mysqli->prepare($query);
                                                    $stmt->execute();
                                                    $stmt->bind_result($applications);
                                                    $stmt->fetch();
                                                    $stmt->close();
                                                    echo $applications;
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="dropdown text-sans-serif"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal mr-3" type="button" id="dropdown0" data-toggle="dropdown" data-boundary="html" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="dropdown0">
                                                            <div class="bg-white py-2">
                                                                <a class="dropdown-item" href="bursary_applications.php?view=<?php echo $bursary->code; ?>">View Applications</a>
                                                                <a class="dropdown-item" data-toggle="modal" href="#update-<?php echo $bursary->id; ?>">Update</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item text-danger" data-toggle="modal" href="#delete-<?php echo $bursary->id; ?>">Delete</a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Confirm Delete Modal -->
                                                    <div class="modal fade" id="delete-<?php echo $bursary->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">CONFIRM DELETE</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-center text-danger">
                                                                    <h4>Delete <?php echo $bursary->code; ?> Details ?</h4>
                                                                    <br>
                                                                    <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                                                                    <a href="bursaries.php?delete=<?php echo $bursary->id; ?>" class="text-center btn btn-danger"> Delete </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Confirmation -->

                                                    <!-- Update Modal -->
                                                    <div class="modal fade" id="update-<?php echo $bursary->id; ?>">
                                                        <div class="modal-dialog  modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Update Bursary </h4>
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
                                                                                    <label for="">Bursary Code</label>
                                                                                    <input type="text" required name="code" readonly value="<?php echo $bursary->code; ?>" class="form-control">
                                                                                    <input type="hidden" required name="id" value="<?php echo $bursary->id; ?>" class="form-control">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="">Bursary Allocation Year</label>
                                                                                    <input type="text" required name="year" value="<?php echo $bursary->year; ?>" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="">Estimated Bursary Allocated Funds</label>
                                                                                    <input type="text" required name="allocated_funds" value="<?php echo $bursary->allocated_funds; ?>" class="form-control">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="">Bursary Status</label>
                                                                                    <select class="form-control" name="status">
                                                                                        <option><?php echo $bursary->status; ?></option>
                                                                                        <option>Open</option>
                                                                                        <option>Closed</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-footer text-right">
                                                                            <button type="submit" name="update_bursary" class="btn btn-primary">Update Bursary</button>
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

                <!-- Add Bursary Modal -->
                <div class="modal fade" id="add_modal">
                    <div class="modal-dialog  modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Create New Bursary </h4>
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
                                                <label for="">Bursary Code</label>
                                                <input type="text" required name="code" value="<?php echo $a . " " . $b; ?>" class="form-control">
                                                <input type="hidden" required name="id" value="<?php echo $ID; ?>" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Bursary Allocation Year</label>
                                                <input type="text" required name="year" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="">Estimated Bursary Allocated Funds</label>
                                                <input type="text" required name="allocated_funds" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Bursary Status</label>
                                                <select class="form-control" name="status">
                                                    <option>Open</option>
                                                    <option>Closed</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" name="add_bursary" class="btn btn-primary">Add Bursary</button>
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

                <!-- Bulk Import Modal -->
                <div class="modal fade" id="import_modal">
                    <div class="modal-dialog  modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Bulk Import Bursaries </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" enctype="multipart/form-data" role="form">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group text-center col-md-12">
                                                <label for="exampleInputFile">Allowed File Types: XLS, XLSX. Please, <a href="../public/uploads/sys_data/templates/Bursaries_Template.xlsx">Download</a> Template File. </label>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="exampleInputFile">Select File</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input required name="file" accept=".xls,.xlsx" type="file" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" name="upload" class="btn btn-primary">Upload File</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Bulk Import -->

                <!-- Footer -->
                <?php require_once('../partials/_footer.php'); ?>
            </div>
        </div>
    </main>
    <?php require_once('../partials/_scripts.php'); ?>
</body>

</html>