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
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col d-flex align-items-center">
                                <button class="btn btn-falcon-default btn-sm ml-sm-1" type="button" onclick="location.reload()"><span class="fas fa-redo"></span></button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body fs--1 border-top border-200 p-0" id="emails">
                        <h5 class="fs-0 px-3 pt-3 pb-2 mb-0 border-bottom border-200">All Mails From Administrators</h5>
                        <?php
                        /* Load All Mails For Logged In User */
                        $mail_user = $_SESSION['id'];
                        $ret = "SELECT * FROM  iBursary_mails  WHERE receiver_id = '$mail_user' ORDER BY  send_on ASC ";
                        $stmt = $mysqli->prepare($ret);
                        $stmt->execute(); //ok
                        $res = $stmt->get_result();
                        while ($mail = $res->fetch_object()) {
                        ?>
                            <div class="row border-bottom border-200 hover-actions-trigger hover-shadow py-2 px-1 mx-0" data-href="mail_details.php?mail=<?php echo $mail->id; ?>">
                                <div class="col col-md-9 col-xxl-10">
                                    <div class="row">
                                        <div class="col-md-4 col-xl-3 col-xxl-2 pl-md-0 mb-1 mb-md-0">
                                            <div class="media position-relative">
                                                <div class="media-body ml-2"><a class="font-weight-bold stretched-link inbox-link" href=""><?php echo $mail->sender_name; ?></a></div>
                                            </div>
                                        </div>
                                        <div class="col"><a class="d-block inbox-link" href=""><span class="font-weight-bold"><?php echo $mail->subject; ?></span><span class="mx-1"><br></span><span><?php echo $mail->details; ?></span></a></div>
                                    </div>
                                </div>
                                <div class="col-auto ml-auto d-flex flex-column justify-content-between"><span class="font-weight-bold"><?php echo date('d M Y g:ia', strtotime($mail->send_on)); ?></span><span class="fas text-warning fa-star ml-auto mb-2 d-sm-none" data-fa-transform="down-7"></span></div>
                            </div>
                        <?php
                        } ?>
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