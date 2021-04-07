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

/*1 . Bursary Applicants */
$query = "SELECT COUNT(*)  FROM `iBursary_applicants` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($applicants);
$stmt->fetch();
$stmt->close();


/* 2. Bursary Applications */
$query = "SELECT COUNT(*)  FROM `iBursary_application` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($applications);
$stmt->fetch();
$stmt->close();

/* 3. Total Funds Disbursed */
$query = "SELECT SUM(funds_disbursed)  FROM `iBursary_application` WHERE approval_status ='Approved' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($funds);
$stmt->fetch();
$stmt->close();
/* Handle Currency Conversions */
$kes = numfmt_create( 'Ksh', NumberFormatter::CURRENCY );


/* 4. Allocated Bursary Funds */
$query = "SELECT SUM(allocated_funds)  FROM `iBursary_bursaries`  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($allocated_funds);
$stmt->fetch();
$stmt->close();



/* 5. Posted Bursaries */
$query = "SELECT COUNT(*)  FROM `iBursary_bursaries` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($bursaries);
$stmt->fetch();
$stmt->close();
