<?php
/*
 * Created on Wed Mar 31 2021
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
require_once('../partials/_head.php');
?>

<body>

    <main class="main" id="top">

        <div class="container" data-layout="container">
            <div class="row flex-center min-vh-100 py-6">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4"><a class="d-flex flex-center mb-4" href=""><img class="mr-2" src="../public/img/illustrations/falcon.png" alt="" width="58" /><span class="text-sans-serif font-weight-extra-bold fs-5 d-inline-block">iBursary MIS</span></a>
                    <div class="card">
                        <div class="card-body p-4 p-sm-5">
                            <div class="text-center"><img class="d-block mx-auto mb-4" src="../public/img/illustrations/rocket.png" alt="shield" width="70" />
                                <h4>See you again!</h4>
                                <p>Thanks for using iBursary MIS. You are <br />successfully signed out.</p><a class="btn btn-primary btn-sm mt-3" href="login.php"><span class="fas fa-chevron-left mr-1" data-fa-transform="shrink-4 down-1"></span>Return to Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require_once('../partials/_scripts.php'); ?>

</body>

</html>