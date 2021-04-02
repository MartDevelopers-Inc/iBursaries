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
                $id = $_SESSION['id'];
                $ret = "SELECT * FROM  iBursary_admin  WHERE id = '$id'";
                $stmt = $mysqli->prepare($ret);
                $stmt->execute(); //ok
                $res = $stmt->get_result();
                while ($loggedIn = $res->fetch_object()) {
                    if ($loggedIn->profile == '') {
                        $profile =
                            "
                            <div class='avatar avatar-5xl avatar-profile'><img class='rounded-circle img-thumbnail shadow-sm' src='../public/uploads/user_images/no-profile.png' width='200'  />
                            <span><a href='#edit-profile-pic' class='fas fa-pen text-primary' data-toggle='modal'></a></span>

                            </div>
                        ";
                    } else {
                        $profile =
                            "
                            <div class='avatar avatar-5xl avatar-profile'><img class='rounded-circle img-thumbnail shadow-sm' src='../public/uploads/user_images/$loggedIn->profile' width='200'  />
                            <span><a href='#edit-profile-pic' class='fas fa-pen text-primary' data-toggle='modal'></a></span>

                            </div>
                        ";
                    }
                ?>
                    <!-- Sidebar -->
                    <div class="card mb-3">
                        <div class="card-header position-relative min-vh-25 mb-7">
                            <div class="bg-holder rounded-soft rounded-bottom-0" style="background-image:url(../public/img/generic/4.jpg);"></div>
                            <!--/.bg-holder-->
                            <?php echo $profile; ?>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="mb-1">
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Edit Profile Picture Modal -->
                    <div class="modal fade" id="edit-profile-pic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title " id="exampleModalLabel">Update <?php echo $admin->name; ?> Profile Picture</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method='post' enctype="multipart/form-data" class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Profile Picture</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="profile_pic" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-right row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" name="update_picture" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                    <div class="row no-gutters">
                        <div class="col-lg-8 pr-lg-2">
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Update Profile </h5>
                                </div>
                                <div class="card-body text-justify">
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group"><label for="first-name">Name</label><input class="form-control" name="name" type="text" value="<?php echo $loggedIn->name; ?>"></div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group"><label for="last-name">Email Address</label><input class="form-control" name="email" type="email" value="<?php echo $loggedIn->email; ?>"></div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group"><label for="">National ID Number</label><input class="form-control" name="idno" type="text" value="<?php echo $loggedIn->idno; ?>"></div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group"><label for="phone">Phone</label><input class="form-control" name="phone" type="text" value="<?php echo $loggedIn->phone; ?>"></div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group"><label for="heading">Address</label><input class="form-control" name="adr" type="text" value="<?php echo $loggedIn->adr; ?>"></div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group"><label for="intro">Intro | Bio| About </label><textarea class="form-control" name="bio" cols="30" rows="13"><?php echo $loggedIn->bio; ?></textarea></div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end"><button class="btn btn-primary" name="update_profile" type="submit">Update </button></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 pr-lg-2">
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Change Password </h5>
                                </div>
                                <div class="card-body text-justify">
                                    <form>
                                        <div class="form-group"><label for="old-password">Old Password</label><input class="form-control" id="old-password" name="old_password" type="password"></div>
                                        <div class="form-group"><label for="new-password">New Password</label><input class="form-control" id="new-password" name="new_password" type="password"></div>
                                        <div class="form-group"><label for="confirm-password">Confirm Password</label><input class="form-control" name="confirm_password" id="confirm-password" type="password"></div><button class="btn btn-primary btn-block" name="change_password" type="submit">Update Password</button>
                                    </form>
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