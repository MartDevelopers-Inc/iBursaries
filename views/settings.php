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
                            <div class='avatar avatar-5xl avatar-profile'><img class='rounded-circle img-thumbnail shadow-sm' src='../public/uploads/user_images/no-profile.png' width='200'  /></div>
                        ";
                    } else {
                        $profile =
                            "
                            <div class='avatar avatar-5xl avatar-profile'><img class='rounded-circle img-thumbnail shadow-sm' src='../public/uploads/user_images/$loggedIn->profile' width='200'  /></div>
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
                    <div class="row no-gutters">
                        <div class="col-lg-8 pr-lg-2">
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Update Profile </h5>
                                </div>
                                <div class="card-body text-justify">
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group"><label for="first-name">First Name</label><input class="form-control" id="first-name" type="text" value="Anthony"></div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group"><label for="last-name">Last Name</label><input class="form-control" id="last-name" type="text" value="Hopkins"></div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group"><label for="email1">Email</label><input class="form-control" id="email1" type="text" value="anthony@gmail.com"></div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group"><label for="phone">Phone</label><input class="form-control" id="phone" type="text" value="+44098098304"></div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group"><label for="heading">Heading</label><input class="form-control" id="heading" type="text" value="Software Engineer"></div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group"><label for="intro">Intro</label><textarea class="form-control" id="intro" name="intro" cols="30" rows="13">Dedicated, passionate, and accomplished Full Stack Developer with 9+ years of progressive experience working as an Independent Contractor for Google and developing and growing my educational social network that helps others learn programming, web design, game development, networking. I’ve acquired a wide depth of knowledge and expertise in using my technical skills in programming, computer science, software development, and mobile app development to developing solutions to help organizations increase productivity, and accelerate business performance. It’s great that we live in an age where we can share so much with technology but I’m but I’m ready for the next phase of my career, with a healthy balance between the virtual world and a workplace where I help others face-to-face. There’s always something new to learn, especially in IT-related fields. People like working with me because I can explain technology to everyone, from staff to executives who need me to tie together the details and the big picture. I can also implement the technologies that successful projects need.</textarea></div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end"><button class="btn btn-primary" type="submit">Update </button></div>
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
                                        <div class="form-group"><label for="old-password">Old Password</label><input class="form-control" id="old-password" type="password"></div>
                                        <div class="form-group"><label for="new-password">New Password</label><input class="form-control" id="new-password" type="password"></div>
                                        <div class="form-group"><label for="confirm-password">Confirm Password</label><input class="form-control" id="confirm-password" type="password"></div><button class="btn btn-primary btn-block" type="submit">Update Password</button>
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