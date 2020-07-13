<?php
define ('PDF_HEADER_LOGO', 'http://developer.marketingplatform.ca/dentalapp/forgreatteeth/admin/images/login_logo.png');
//============================================================+
// File name   : example_061.php
// Begin       : 2010-05-24
// Last Update : 2014-01-25
//
// Description : Example 061 for TCPDF class
//               XHTML + CSS
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: XHTML + CSS
 * @author Nicola Asuni
 * @since 2010-05-25
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
include("../../config.php");
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Micronix');
$pdf->SetTitle('Dental History Form');
$pdf->SetSubject('Dental History Form');
$pdf->SetKeywords('Dental History Form, PDF, Dental History Form, Dental History Form, Dental History Form');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 061', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page

$pdf->AddPage();
$query_device = "select * from `dental1_history_form` where appointment_id=:appointment_id";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("appointment_id"=>$_REQUEST['id']));
    $result = $statement_device->fetch();


$html = '<style>
@import url("https://fonts.googleapis.com/css?family=Montserrat:100,300,400,500,600,700&display=swap");
@import url("https://fonts.googleapis.com/css?family=Raleway:300, 400, 500,700&display=swap");




.montserrat{font-family: "Montserrat", sans-serif;}
.raleway{font-family: "Raleway", sans-serif;}





/*---------------------global css------------------------*/

html { scroll-behavior: smooth; }
body {font-family: "Open Sans", sans-serif;font-weight: normal;padding: 0;margin: 0;font-size: 16px; background: #fff; scroll-behavior: smooth; color: #0c0c0c; }


a {transition: All .6s; color: #272626;}
a:hover {text-decoration: none;transition: All .6s;  color: #272626;}
a:focus, button:focus, input:focus,textarea:focus  {outline: none !important; box-shadow: none !important;}



.wrapper{width: 810px; margin: 0 auto;}


.formSectionPdf{width: 100%;}
.formSectionPdf label{margin-bottom: 0; font-weight: 400; display: inline-block;}
.formSectionPdf h2{font-size: 30px; font-weight: 600; margin-bottom: 30px;}
.formSectionPdf p{margin: 15px 0;}

.formSectionPdf .formRow{width: 100%; margin-bottom: 15px;}
.formSectionPdf .formRow label{display: inline-block; font-weight: 400; width: 120px; vertical-align: bottom; margin-bottom: 0;}
.formSectionPdf .formRow .formCol{display: inline-block; width: 660px; vertical-align: bottom;}
.formSectionPdf .formRow .formCol .customForm{width: 100%; border: none; border-bottom: 1px solid #0c0c0c;}


.customForm{border: none; border-bottom: 1px solid #0c0c0c;}

.formSectionPdf .formRow2{width: 100%; margin-bottom: 15px;}
.formSectionPdf .formRow2 .formCol2{display: inline-block; width: 49%;}
.formSectionPdf .formRow2 .formCol2-2{display: inline-block; width: 49%; margin-left: 1%;}
.formSectionPdf .formRow2 label{width: 120px;}
.formSectionPdf .formRow2 .formCol{display: inline-block; width: 260px;}
.formSectionPdf .formRow2 .formCol .customForm{width: 100%;}

.formSectionPdf .formRow3{width: 100%; margin-bottom: 15px;}
.formSectionPdf .formRow3 .formCol3{display: inline-block;}
.formSectionPdf .formRow3 .customSect1{border-bottom: 1px solid #0c0c0c; display: inline-block; width: 60px; margin-left: 6px;}
.formSectionPdf .formRow3 .lastChild{width: 140px;}

.formSectionPdf .tableSec{width: 100%; margin-bottom: 25px;}
.formSectionPdf .tableSec tr th{padding: 8px 10px;}
.formSectionPdf .tableSec tr th.customTh{background: #000; color: #fff; width: 110px; font-weight: 500;}
.formSectionPdf .tableSec tr td{border: 1px solid #505050; padding: 8px 10px;}
.formSectionPdf .tableSec .csfild{display: inline-block; vertical-align: middle; width: 46%;}
.formSectionPdf .tableSec p{margin: 0;}
.formSectionPdf .tableInrForm{display: inline-block; width: 100%; margin-top: 20px;}
.formSectionPdf .tableInrForm .tableText{display: inline-block; font-size: 13px;}
.formSectionPdf .tableInrForm .customSect1{border-bottom: 1px solid #0c0c0c; display: inline-block; width: 60px; margin-left: 6px; font-size: 13px;}

.formSectionPdf .footerText{width: 100%;}
.formSectionPdf .footerText ul li{margin-bottom: 5px;}
.formSectionPdf .footerText ul li ul{margin: 10px 0;}





@media only screen and (min-width:768px) and (max-width:1023px){
    
    
    
    
    
}
@media only screen and (min-width:300px) and (max-width:767px){
    
    
    
    
    
}
    body{font-size: 15px;}
    .formSectionPdf{width: 100%;}
    .formSectionPdf label{margin-bottom: 0; font-weight: 400; display: inline-block;}
    .formSectionPdf h2{font-size: 30px; font-weight: 600; margin-bottom: 30px;}
    .formSectionPdf p{margin: 15px 0;}

    .formSectionPdf .formRow{width: 100%; margin-bottom: 15px;}
    .formSectionPdf .formRow label{display: inline-block; font-weight: 400; width: 110px; vertical-align: bottom; margin-bottom: 0;}
    .formSectionPdf .formRow .formCol{display: inline-block; vertical-align: bottom;}
    .formSectionPdf .formRow .formCol .customForm{width: 100%; border: none; border-bottom: 1px solid #0c0c0c; display: inline-block;}
    .formSectionPdf .formRow .formcolf{display: inline-block; width: 260px;}
    .formSectionPdf .formRow .formcolf .mrsec{display: inline-block; margin-right: 5px;}
    .formSectionPdf .formRow .formcolf .mrsec .mrcheck{border: 1px solid #0c0c0c; display: inline-block; width: 12px; height: 12px;}
    .mrcheck{border: 1px solid #0c0c0c; display: inline-block; width: 12px; height: 12px;}
    
    .formSectionPdf .formRow .formcolf2{display: inline-block; width: 316px;}
    .formSectionPdf .formRow .formcolf2 .formCol{width: 195px;}
    .formSectionPdf .formRow .formcolf3{display: inline-block; width: 205px;}
    .formSectionPdf .formRow .formcolf3 .formCol{width: 90px;}
    
    
    

    .customForm{border: none; border-bottom: 1px solid #0c0c0c;}

    .formSectionPdf .formRow2{width: 100%; margin-bottom: 15px;}
    .formSectionPdf .formRow2 .formCol2{display: inline-block; width: 285px;}
    .formSectionPdf .formRow2 .formCol2-2{display: inline-block; width: 250px; margin-left: 5px;}
    .formSectionPdf .formRow2 .formCol2-2 label{width: 110px;}
    .formSectionPdf .formRow2 .formCol{display: inline-block;}
    .formSectionPdf .formRow2 .formCol .customForm{width: 100%; display: inline-block;}
    .formSectionPdf .formRow2 .formCol2 label{width: 75px;}
    .formSectionPdf .formRow2 .formCol2 .formCol{ width: 200px;}
    .formSectionPdf .formRow2 .formCol2-2 .formCol{ width: 130px;}
    
    .formSectionPdf .formRow2 .formCol2-3{display: inline-block; width: 236px; margin-left: 5px;}
    .formSectionPdf .formRow2 .formCol2-3 label{width: 134px;}
    .formSectionPdf .formRow2 .formCol2-3 .formCol{ width: 97px;}
    
    .formRowaddress{width: 100%; margin-bottom: 15px;}
    .formRowaddress .formCol3{display: inline-block;}
    .formRowaddress .formCol3 span{font-size: 12px;}
    .formRowaddress .customSect1{border-bottom: 1px solid #0c0c0c; display: inline-block; width: 100px; margin-left: 6px;}
    .formRowaddress .lastChild{width: 80px;}
    .formRowaddress .firstChild{width: 208px;}
    
    
    
    .formRowPhone{width: 100%; margin-bottom: 15px;}
    .formRowPhone .formCol3{display: inline-block;}
    .formRowPhone .formCol3 span{font-size: 12px;}
    .formRowPhone .customSect1{display: inline-block; }
    .formRowPhone .customSect1 span{border-bottom: 1px solid #0c0c0c; display: inline-block; width: 40px; margin-left: 6px;}
    /*.formRowPhone .lastChild{width: 140px;}*/
    /*.formRowPhone .firstChild{width: 208px;}*/
    .formRowPhone .lastChild{}
    .formRowPhone .lastChild .mrsec{display: inline-block; margin-right: 5px;}
    .formRowPhone .lastChild .mrsec .mrcheck{border: 1px solid #0c0c0c; display: inline-block; width: 12px; height: 12px;}
    
    
    
    .formSectionPdf .formRow3{width: 100%; margin-bottom: 15px;}
    .formSectionPdf .formRow3 .formCol3{display: inline-block; width: 500px;}
    .formSectionPdf .formRow3 .customSect1{border-bottom: 1px solid #0c0c0c; display: inline-block; width: 340px; margin-left: 6px;}
    .formSectionPdf .formRow3 .formCol3.lastChild{width: 284px;}
    .formSectionPdf .formRow3 .formCol3.lastChild .customSect1{width: 186px;}
    
    .formSectionPdf .formRow4{width: 100%; margin-bottom: 15px;}
    .formSectionPdf .formRow4 .formCol3{display: inline-block; width: 49%;}
    .formSectionPdf .formRow4 .customSect1{border-bottom: 1px solid #0c0c0c; display: inline-block; width: 260px; margin-left: 6px;}
    /*.formSectionPdf .formRow4 .formCol3.lastChild{width: 284px;}
    .formSectionPdf .formRow4 .formCol3.lastChild .customSect1{width: 186px;}*/
    
    .formSectionPdf .formRow5{width: 100%; margin-bottom: 15px;}
    .formSectionPdf .formRow5 .customSect1{border-bottom: 1px solid #0c0c0c; display: inline-block; width: 425px; margin-left: 6px;}
    
    
    .formSectionPdf .formRow6{width: 100%; margin-bottom: 15px;}
    .formSectionPdf .formRow6 .formCol3{width:550px; display: inline-block;}
    .formSectionPdf .formRow6 .customSect1{display: inline-block; margin-left: 6px;}
    .formSectionPdf .formRow6 .customSect1 span{border-bottom: 1px solid #0c0c0c; display: inline-block; margin-left: 4px; width: 400px;}
    .formSectionPdf .formRow6 .formCol3.lastSec {width: 235px; display: inline-block;}
    .formSectionPdf .formRow6 .formCol3.lastSec .customSect1 span{border-bottom: 1px solid #0c0c0c; display: inline-block; margin-left: 4px; width: 50px;}
    
    .formSectionPdf .formRow7{width: 100%; margin-bottom: 15px;}
    .formSectionPdf .formRow7 .formCol3{width:350px; display: inline-block;}
    .formSectionPdf .formRow7 .customSect1{display: inline-block; margin-left: 6px;}
    .formSectionPdf .formRow7 .customSect1 span{border-bottom: 1px solid #0c0c0c; display: inline-block; margin-left: 4px; width: 128px;}
    .formSectionPdf .formRow7 .formCol3.setSec {width: 196px; display: inline-block;}
    .formSectionPdf .formRow7 .formCol3.setSec .customSect1 span{width: 114px;}
    .formSectionPdf .formRow7 .formCol3.lastSec {width: 235px; display: inline-block;}
    .formSectionPdf .formRow7 .formCol3.lastSec .customSect1 span{border-bottom: 1px solid #0c0c0c; display: inline-block; margin-left: 4px; width: 50px;}
    
    .formRowPhone .cln{border-bottom: 1px solid #0c0c0c; display: inline-block; margin-left: 4px; width: 155px;}
    
    .formSectionPdf .nameSec .customSect1{width: 430px;}
    
    .tabRow {width: 100%; margin-bottom: 5px;}
    .tabRow .formCol3{width:210px; display: inline-block;}
    .tabRow .formCol3 .customSect1{border-bottom: 1px solid #0c0c0c; display: inline-block; margin-left: 4px; width: 115px;}
    .tabRow .formCol3.lastSec{width: 160px;}
    .tabRow .formCol3.lastSec .customSect1{width: 57px;}
    
    .tableSec .formRowPhone{margin-bottom: 5px;}
    .tableSec .formRowPhone .cln{width: 94px;}
    .tabRow.tabRow2 .formCol3{width: 236px;}
    .tabRow.tabRow2 .formCol3.lastSec{width: 132px;}
    .tabRow.tabRow2 .formCol3 .customSect1{width: 115px;}
    .tabRow.tabRow2 .formCol3.lastSec .customSect1{width: 98px;}
    
    .tabRow3 {width: 100%; margin-bottom: 5px;}
    .tabRow3 .formCol3{width:372px; display: inline-block;}
    .tabRow3 .formCol3 .customSect1{border-bottom: 1px solid #0c0c0c; display: inline-block; margin-left: 4px; width: 266px;}
    
    .tabRow4 {width: 100%; margin-bottom: 5px;}
    .tabRow4 .formCol3{width:186px; display: inline-block;}
    .tabRow4 .formCol3 .customSect1{border-bottom: 1px solid #0c0c0c; display: inline-block; margin-left: 4px; width: 66px;}
    
    
    .payment.formRowPhone .cln{width: 120px;}
    .payment.formRowPhone .cln.number{width: 100px;}
    .payment.formRowPhone .cln.exp{width: 42px;}
    
    
    .newRowSec{display: flex; width: 100%; margin-bottom: 6px;}
    .newRowSec .newCol1{order: 1; width:710px;}
    .newRowSec .newCol1 .numberct{display: inline-block; width: 30px; vertical-align: top;}
    .newRowSec .newCol1 .textbox{display: inline-block; width: 670px; vertical-align: top;}
    .newRowSec .newCol1 .textbox .intBox{width: 100%; position: relative;}
    .newRowSec .newCol1 .textbox .intBox:before{border-bottom: 1px dashed #3e3932; position: absolute; content: ""; height: 1px; width: 100%; left: 0; top: 48%;}
    .newRowSec .newCol1 .textbox .intBox span{background: #fff; position: relative; z-index: 2; padding-right: 10px;}
    .newRowSec .newCol1 .textbox .iintbox2{width: 100%;}
    .newRowSec .newCol1 .textbox .iintbox2 .colmn2{border-bottom: 1px solid #0c0c0c; display: inline-block; margin-left: 4px; width: 500px;}
    
    
    .newRowSec .newCol2{order: 2; width: 100px; padding-left: 6px;}
    .newRowSec .newCol2 .newcolin1, .newRowSec .newCol2 .newcolin2{display: inline-block; width: 46%;}
    .newRowSec .newCol2 .clbox{    border: 1px solid #0c0c0c;  display: inline-block; width: 12px; height: 12px;}
    
    
    .newRowSectl{display: inline-block; width: 100%; margin-bottom: 10px;}
    .newRowSectl .newCol-4{display: inline-block; width: 24%; vertical-align: top; font-size: 13px;}
    .newRowSectl .newCol-4:nth-child(1){width: 32%;}
    .newRowSectl .newCol-4:nth-child(2){width: 24%;}
    .newRowSectl .newCol-4:nth-child(3){width: 20%;}
    .newRowSectl .newCol-4:nth-child(4){width: 20%;}
    .newRowSectl .newCol-4 .mrcheck{  border: 1px solid #0c0c0c;  display: inline-block; width: 12px; height: 12px;}
    .newRowSectl .newCol-4 .colsLine{    border-bottom: 1px solid #0c0c0c; display: inline-block; margin-left: 4px; width: 95px;}
    
    
    .historySec .hcl1{display: inline-block; background: #fff; position: relative; z-index: 2;}
    .historySec .colmn2{width: 190px !important;}
    .historySec .colmn3{width: 550px !important; border-bottom: 1px solid #0c0c0c; display: inline-block; margin-left: 4px;}
    .historySec .colmn4{width: 160px !important;}
    .historySec .colmn5{width: 450px !important; border-bottom: 1px solid #0c0c0c; display: inline-block; margin-left: 4px;}
    .historySec .colmn6{width: 380px !important; border-bottom: 1px solid #0c0c0c; display: inline-block; margin-left: 4px;}
    .historySec .colmn8{width: 80px !important; border-bottom: 1px solid #0c0c0c; display: inline-block; margin-left: 4px;}
    .historySec .colmn9{width: 300px !important; border-bottom: 1px solid #0c0c0c; display: inline-block; margin-left: 4px;}
    
    
    .signSec{display: inline-block; width: 100%;}
    .signSec .signLeft{display: inline-block; width: 48%; vertical-align: top;}
    .signSec .signLeft .signBox{border: 1px solid #0c0c0c; display: inline-block; width: 100%; height: 40px; line-height: 40px; padding:0 6px;}
    .signSec .signLeft .SignDtl{width: 100%;}
    .signSec .signLeft .SignDtl div{display: inline-block;}
    
    

    .formSectionPdf .tableSec{width: 100%; margin-bottom: 25px;}
    .formSectionPdf .tableSec tr th{padding: 8px 10px; width: 50%;}
    .formSectionPdf .tableSec tr th.customTh{background: #000; color: #fff; width: 110px; font-weight: 500;}
    .formSectionPdf .tableSec tr td{border: 1px solid #505050; padding: 8px 10px;}
    .formSectionPdf .tableSec .csfild{display: inline-block; vertical-align: middle; width: 46%;}
    .formSectionPdf .tableSec p{margin: 0;}
    .formSectionPdf .tableInrForm{display: inline-block; width: 100%; margin-top: 20px;}
    .formSectionPdf .tableInrForm .tableText{display: inline-block; font-size: 13px;}
    .formSectionPdf .tableInrForm .customSect1{border-bottom: 1px solid #0c0c0c; display: inline-block; width: 60px; margin-left: 6px; font-size: 13px;}

    .formSectionPdf .footerText{width: 100%;}
    .formSectionPdf .footerText ul li{margin-bottom: 5px;}
    .formSectionPdf .footerText ul li ul{margin: 10px 0;}

</style><div class="wrapper">
    <div class="formSectionPdf">
        
            <p>The personal information provided below will be protected and kept private by our office. All information will be used and disclosed responsibly according to the Privacy Act standards set up and monitored by our office.</p>
            <div class="formRow">
                <div class="formcolf">
                    <div class="mrsec">Mr. <span class="mrcheck"></span></div>
                    <div class="mrsec">Mrs. <span class="mrcheck"></span></div>
                    <div class="mrsec">Miss. <span class="mrcheck"></span></div>
                    <div class="mrsec">Ms. <span class="mrcheck"></span></div>
                    <div class="mrsec">Dr. <span class="mrcheck"></span></div>
                </div>
                <div class="formcolf2">
                    <label>Given Name:</label>
                    <div class="formCol"><span class="customForm"></span></div>
                </div>
                <div class="formcolf3">
                    <label>Marital Status:</label>
                    <div class="formCol"><span class="customForm"></span></div>
                </div>
            </div>
            <div class="formRow2">
                <div class="formCol2">
                    <label>Surname:</label>
                    <div class="formCol"><span class="customForm"></span></div>
                </div>
                <div class="formCol2-2">
                    <label>Pronunciation:</label>
                    <div class="formCol"><span class="customForm"></span></div>
                </div>
                <div class="formCol2-3">
                    <label>Prafer to be called:</label>
                    <div class="formCol"><span class="customForm"></span></div>
                </div>
            </div>
            <div class="formRowaddress">
                <div class="formCol3">
                    <label>Address:</label>
                    <span>(Street)</span>
                    <div class="customSect1 firstChild"></div>
                </div>
                <div class="formCol3">
                    <span>(Apt.N.)</span>
                    <div class="customSect1"></div>
                </div>
                <div class="formCol3">
                    <span>(City)</span>
                    <div class="customSect1"></div>
                </div>
                <div class="formCol3">
                    <span>(Postal Code)</span>
                    <div class="customSect1 lastChild"></div>
                </div>
            </div>
            <div class="formRowPhone">
                <div class="formCol3">
                    <label>Home Phone:</label>
                    <div class="customSect1"><span></span><span></span><span></span></div>
                </div>
                <div class="formCol3">
                    <label>Work Phone:</label>
                    <div class="customSect1"><span></span><span></span><span></span></div>
                </div>
                <div class="formCol3">
                    <label>X</label>
                    <div class="customSect1"><span></span></div>
                </div>
                <div class="formCol3">
                    <label>Date of Birth:</label>
                    <div class="customSect1"><span></span>/<span></span>/<span></span></div>
                </div>
            </div>
            <div class="formRowPhone">
                <div class="formCol3">
                    <label>Fax:</label>
                    <div class="customSect1"><span></span><span></span><span></span></div>
                </div>
                <div class="formCol3">
                    <label>Other:</label>
                    <div class="customSect1"><span></span><span></span><span></span></div>
                </div>
                <div class="formCol3">
                    <label>X</label>
                    <div class="customSect1"><span></span></div>
                </div>
                <div class="formCol3 lastChild">
                    <div class="mrsec"><span class="mrcheck"></span> Male</div>
                    <div class="mrsec"><span class="mrcheck"></span> Female</div>
                    <div class="mrsec"><span class="mrcheck"></span> Adult</div>
                    <div class="mrsec"><span class="mrcheck"></span> Child</div>
                </div>
            </div>
            
            <div class="formRow3">
                <div class="formCol3">
                    <label>Employer / School:</label>
                    <div class="customSect1"></div>
                </div>
                <div class="formCol3 lastChild">
                    <label>Occupation:</label>
                    <div class="customSect1"></div>
                </div>
            </div>
            
            <div class="formRow4">
                <div class="formCol3">
                    <label>eMail Address:</label>
                    <div class="customSect1"></div>
                </div>
                <div class="formCol3 lastChild">
                    <label>Contact Method:</label>
                    <div class="customSect1"></div>
                </div>
            </div>
            
            <div class="formRow5">
                <div class="formCol3">
                    <label>Who may we thank for referring you to this office?</label>
                    <div class="customSect1"></div>
                </div>
            </div>
            
            <div class="formRowPhone">
                <div class="formCol3">
                    <label>Are you likely to be available on short notice for future appointments?</label>
                </div>
                <div class="formCol3 lastChild" style="margin-left: 15px;">
                    <div class="mrsec"><span class="mrcheck"></span> Yes</div>
                    <div class="mrsec"><span class="mrcheck"></span> No</div>
                </div>
            </div>
            
            <div class="formRow6">
                <div class="formCol3">
                    <label>Family Physician:</label>
                    <div class="customSect1"><span></span></div>
                </div>
                <div class="formCol3 lastSec">
                    <label>Phone:</label>
                    <div class="customSect1"><span></span><span></span><span></span></div>
                </div>
            </div>
            
            <div class="formRow7">
                <div class="formCol3">
                    <label>In Case of Emergency Notify:</label>
                    <div class="customSect1"><span></span></div>
                </div>
                <div class="formCol3 setSec">
                    <label>Relation:</label>
                    <div class="customSect1"><span></span></div>
                </div>
                <div class="formCol3 lastSec">
                    <label>Phone:</label>
                    <div class="customSect1"><span></span><span></span><span></span></div>
                </div>
            </div>
            
            
            <div class="formRowPhone">
                <div class="formCol3">
                    <label>Person responsible for this accout:</label>
                </div>
                <div class="formCol3 lastChild" style="margin-left: 15px;">
                    <div class="mrsec"><span class="mrcheck"></span> Self</div>
                    <div class="mrsec"><span class="mrcheck"></span> Spouse</div>
                    <div class="mrsec"><span class="mrcheck"></span> Parent</div>
                    <div class="mrsec"><span class="mrcheck"></span> Guardian</div>
                    <div class="mrsec"><span class="mrcheck"></span> Other: <span class="cln"></span></div>
                </div>
            </div>
            
            <div class="formRow3 nameSec">
                <div class="formCol3">
                    <label>Name:</label>
                    <div class="customSect1"></div>
                </div>
                <div class="formCol3 lastChild">
                    <label>Relation:</label>
                    <div class="customSect1"></div>
                </div>
            </div>
            
            <div class="formRowaddress">
                <div class="formCol3">
                    <label>Address:</label>
                    <span>(Street)</span>
                    <div class="customSect1 firstChild"></div>
                </div>
                <div class="formCol3">
                    <span>(Apt.N.)</span>
                    <div class="customSect1"></div>
                </div>
                <div class="formCol3">
                    <span>(City)</span>
                    <div class="customSect1"></div>
                </div>
                <div class="formCol3">
                    <span>(Postal Code)</span>
                    <div class="customSect1 lastChild"></div>
                </div>
            </div>
            <div class="formRowPhone">
                <div class="formCol3">
                    <label>Home Phone:</label>
                    <div class="customSect1"><span></span><span></span><span></span></div>
                </div>
                <div class="formCol3">
                    <label>Work Phone:</label>
                    <div class="customSect1"><span></span><span></span><span></span></div>
                </div>
                <div class="formCol3">
                    <label>X</label>
                    <div class="customSect1"><span></span></div>
                </div>
            </div>
            

            <table class="tableSec" width="100%" border="0">
                <tr>
                    <th>Primary Insurance</th>
                    <th>Secondary Insurance</th>
                </tr>
                <tr>
                    <td>
                        <div class="tabRow">
                            <div class="formCol3">
                                <label>Subscriber:</label>
                                <div class="customSect1"></div>
                            </div>
                            <div class="formCol3 lastSec">
                                <label>Date of Birth:</label>
                                <div class="customSect1"></div>
                            </div>
                        </div>
                        <div class="formRowPhone">
                            <div class="formCol3">
                                <label>Relation:</label>
                            </div>
                            <div class="formCol3 lastChild" style="margin-left: 15px;">
                                <div class="mrsec"><span class="mrcheck"></span> Self</div>
                                <div class="mrsec"><span class="mrcheck"></span> Spouse</div>
                                <div class="mrsec"><span class="mrcheck"></span> Other: <span class="cln"></span></div>
                            </div>
                        </div>
                        <div class="tabRow tabRow2">
                            <div class="formCol3">
                                <label>Subscriber I.D.</label>
                                <div class="customSect1"></div>
                            </div>
                            <div class="formCol3 lastSec">
                                <label>SIN</label>
                                <div class="customSect1"></div>
                            </div>
                        </div>
                        <div class="tabRow3">
                            <div class="formCol3">
                                <label>Insurance Co:</label>
                                <div class="customSect1"></div>
                            </div>
                        </div>
                        <div class="tabRow4">
                            <div class="formCol3">
                                <label>Policy/Plan #:</label>
                                <div class="customSect1"></div>
                            </div>
                            <div class="formCol3">
                                <label>Division/Sect. #:</label>
                                <div class="customSect1"></div>
                            </div>
                        </div>
                        <div class="formRowPhone">
                            <div class="formCol3">
                                <label><strong><em>Are You Familiar with Your Plan Details?</em></strong></label>
                            </div>
                            <div class="formCol3 lastChild" style="margin-left: 5px;">
                                <div class="mrsec"><span class="mrcheck"></span> Yes</div>
                                <div class="mrsec"><span class="mrcheck"></span> No</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="tabRow">
                            <div class="formCol3">
                                <label>Subscriber:</label>
                                <div class="customSect1"></div>
                            </div>
                            <div class="formCol3 lastSec">
                                <label>Date of Birth:</label>
                                <div class="customSect1"></div>
                            </div>
                        </div>
                        <div class="formRowPhone">
                            <div class="formCol3">
                                <label>Relation:</label>
                            </div>
                            <div class="formCol3 lastChild" style="margin-left: 15px;">
                                <div class="mrsec"><span class="mrcheck"></span> Self</div>
                                <div class="mrsec"><span class="mrcheck"></span> Spouse</div>
                                <div class="mrsec"><span class="mrcheck"></span> Other: <span class="cln"></span></div>
                            </div>
                        </div>
                        <div class="tabRow tabRow2">
                            <div class="formCol3">
                                <label>Subscriber I.D.</label>
                                <div class="customSect1"></div>
                            </div>
                            <div class="formCol3 lastSec">
                                <label>SIN</label>
                                <div class="customSect1"></div>
                            </div>
                        </div>
                        <div class="tabRow3">
                            <div class="formCol3">
                                <label>Insurance Co:</label>
                                <div class="customSect1"></div>
                            </div>
                        </div>
                        <div class="tabRow4">
                            <div class="formCol3">
                                <label>Policy/Plan #:</label>
                                <div class="customSect1"></div>
                            </div>
                            <div class="formCol3">
                                <label>Division/Sect. #:</label>
                                <div class="customSect1"></div>
                            </div>
                        </div>
                        <div class="formRowPhone">
                            <div class="formCol3">
                                <label><strong><em>Are You Familiar with Your Plan Details?</em></strong></label>
                            </div>
                            <div class="formCol3 lastChild" style="margin-left: 5px;">
                                <div class="mrsec"><span class="mrcheck"></span> Yes</div>
                                <div class="mrsec"><span class="mrcheck"></span> No</div>
                            </div>
                        </div>
                    </td>
                </tr>
                
            </table>
            
            <div class="formRowPhone payment">
                <div class="formCol3">
                    <label><strong>Method of Payment:</strong></label>
                </div>
                <div class="formCol3 lastChild" style="margin-left: 15px;">
                    <div class="mrsec"><span class="mrcheck"></span> Cash</div>
                    <div class="mrsec"><span class="mrcheck"></span> Cheque</div>
                    <div class="mrsec"><span class="mrcheck"></span> Credit Card: <span class="cln"></span></div>
                    <div class="mrsec">Number: <span class="cln number"></span></div>
                    <div class="mrsec">Exp: <span class="cln exp"></span></div>
                </div>
            </div>
            
            
            <div class="newRowSec">
                <div class="newCol1">The following information is required by the dentist to assist in proper diagnosis and treatment.</div>
                <div class="newCol2">
                    <div class="newcolin1">Yes</div>
                    <div class="newcolin2">Yes</div>
                </div>
            </div>
            <div class="newRowSec">
                <div class="newCol1">
                    <div class="numberct">1</div>
                    <div class="textbox">
                        <div class="intBox"><span>Have you ever had a serious illness requiring hospitalization or extensive medical care?</span></div>
                        <div class="iintbox2">
                            <label>Please specify:</label>
                            <div class="colmn2"></div>
                        </div>
                    </div>
                </div>
                <div class="newCol2">
                    <div class="newcolin1"><span class="clbox"></span></div>
                    <div class="newcolin2"><span class="clbox"></span></div>
                </div>
            </div>
            
            <div class="newRowSec">
                <div class="newCol1">
                    <div class="numberct">2</div>
                    <div class="textbox">
                        <div class="intBox"><span> Are you presently under the care of a physician?</span></div>
                        <div class="iintbox2">
                            <label>If so, please explain:</label>
                            <div class="colmn2"></div>
                        </div>
                    </div>
                </div>
                <div class="newCol2">
                    <div class="newcolin1"><span class="clbox"></span></div>
                    <div class="newcolin2"><span class="clbox"></span></div>
                </div>
            </div>
            
            <div class="newRowSec">
                <div class="newCol1">
                    <div class="numberct">3</div>
                    <div class="textbox">
                        <div class="intBox"><span> Have you had a medical examination in the last year?</span></div>
                    </div>
                </div>
                <div class="newCol2">
                    <div class="newcolin1"><span class="clbox"></span></div>
                    <div class="newcolin2"><span class="clbox"></span></div>
                </div>
            </div>
            
            <div class="newRowSec">
                <div class="newCol1">
                    <div class="numberct">4</div>
                    <div class="textbox">
                        <div class="intBox"><span>Do you use any prescription or non-prescription drugs regularly?</span></div>
                        <div class="iintbox2">
                            <label>Please specify:</label>
                            <div class="colmn2"></div>
                        </div>
                    </div>
                </div>
                <div class="newCol2">
                    <div class="newcolin1"><span class="clbox"></span></div>
                    <div class="newcolin2"><span class="clbox"></span></div>
                </div>
            </div>
            
            <div class="newRowSec">
                <div class="newCol1">
                    <div class="numberct">5</div>
                    <div class="textbox">
                        <div class="intBox"><span> Do you have any allergic conditions: e.g. hay fever, skin rash, food allergies, metal, latex?</span></div>
                    </div>
                </div>
                <div class="newCol2">
                    <div class="newcolin1"><span class="clbox"></span></div>
                    <div class="newcolin2"><span class="clbox"></span></div>
                </div>
            </div>
            
            <div class="newRowSec">
                <div class="newCol1">
                    <div class="numberct">6</div>
                    <div class="textbox">
                        <div class="intBox"><span>Do any allergic reactions result in headaches, shortness of breath, chest constriction, nausea?</span></div>
                        <div class="iintbox2">
                            <label>Please specify:</label>
                            <div class="colmn2"></div>
                        </div>
                    </div>
                </div>
                <div class="newCol2">
                    <div class="newcolin1"><span class="clbox"></span></div>
                    <div class="newcolin2"><span class="clbox"></span></div>
                </div>
            </div>
            
            <div class="newRowSec">
                <div class="newCol1">
                    <div class="numberct">7</div>
                    <div class="textbox">
                        <div class="intBox"><span>Have you been hospitalized in the last 5 years?</span></div>
                        <div class="iintbox2">
                            <label>Please specify:</label>
                            <div class="colmn2"></div>
                        </div>
                    </div>
                </div>
                <div class="newCol2">
                    <div class="newcolin1"><span class="clbox"></span></div>
                    <div class="newcolin2"><span class="clbox"></span></div>
                </div>
            </div>
            
            <div class="newRowSec">
                <div class="newCol1">
                    <div class="numberct">8</div>
                    <div class="textbox">
                        <div class="intBox"><span>Have you ever experienced any unusual reaction to any of the following? (Please circle)</span></div>
                        <div class="iintbox2">
                            <label>local anaesthesia (freezing), aspirin, penicillin, codeine, sulpha drugs, barbiturates (sleeping pills), or any other medicine? If so please explain</label>
                            <div class="colmn2"></div>
                        </div>
                    </div>
                </div>
                <div class="newCol2">
                    <div class="newcolin1"><span class="clbox"></span></div>
                    <div class="newcolin2"><span class="clbox"></span></div>
                </div>
            </div>
            
            <div class="newRowSec">
                <div class="newCol1">
                    <div class="numberct">9</div>
                    <div class="textbox">
                        <div class="intBox"><span> Have you been warned against taking any drug or medication?</span></div>
                    </div>
                </div>
                <div class="newCol2">
                    <div class="newcolin1"><span class="clbox"></span></div>
                    <div class="newcolin2"><span class="clbox"></span></div>
                </div>
            </div>
            
            <div class="newRowSec">
                <div class="newCol1">
                    <div class="numberct">10</div>
                    <div class="textbox">
                        <div class="intBox"><span>Do you bruise easily or bleed abnormally? </span></div>
                    </div>
                </div>
                <div class="newCol2">
                    <div class="newcolin1"><span class="clbox"></span></div>
                    <div class="newcolin2"><span class="clbox"></span></div>
                </div>
            </div>
            <div class="newRowSec">
                <div class="newCol1">
                    <div class="numberct">11</div>
                    <div class="textbox">
                        <div class="intBox"><span> Do ou ref wire ore-medication for dental treatment </span></div>
                    </div>
                </div>
                <div class="newCol2">
                    <div class="newcolin1"><span class="clbox"></span></div>
                    <div class="newcolin2"><span class="clbox"></span></div>
                </div>
            </div>
            <div class="newRowSec">
                <div class="newCol1">
                    <div class="numberct">12</div>
                    <div class="textbox">
                        <div class="intBox"><span> Have you ecer had any organ implants or medical implants?</span></div>
                    </div>
                </div>
                <div class="newCol2">
                    <div class="newcolin1"><span class="clbox"></span></div>
                    <div class="newcolin2"><span class="clbox"></span></div>
                </div>
            </div>
            <div class="newRowSec">
                <div class="newCol1">
                    <div class="numberct">13</div>
                    <div class="textbox">
                        <div class="intBox"><span>Have you ever fainted?</span></div>
                    </div>
                </div>
                <div class="newCol2">
                    <div class="newcolin1"><span class="clbox"></span></div>
                    <div class="newcolin2"><span class="clbox"></span></div>
                </div>
            </div>
            <div class="newRowSec">
                <div class="newCol1">
                    <div class="numberct">14</div>
                    <div class="textbox">
                        <div class="intBox"><span>Do your ankles swell?</span></div>
                    </div>
                </div>
                <div class="newCol2">
                    <div class="newcolin1"><span class="clbox"></span></div>
                    <div class="newcolin2"><span class="clbox"></span></div>
                </div>
            </div>
            <div class="newRowSec">
                <div class="newCol1">
                    <div class="numberct">15</div>
                    <div class="textbox">
                        <div class="intBox"><span>Do you experience shortness of breath or chest pain when taking a walk or climbing stairs?</span></div>
                    </div>
                </div>
                <div class="newCol2">
                    <div class="newcolin1"><span class="clbox"></span></div>
                    <div class="newcolin2"><span class="clbox"></span></div>
                </div>
            </div>
            <div class="newRowSec">
                <div class="newCol1">
                    <div class="numberct">16</div>
                    <div class="textbox">
                        <div class="intBox"><span>Do you have frequent headaches?</span></div>
                    </div>
                </div>
                <div class="newCol2">
                    <div class="newcolin1"><span class="clbox"></span></div>
                    <div class="newcolin2"><span class="clbox"></span></div>
                </div>
            </div>
            <div class="newRowSec">
                <div class="newCol1">
                    <div class="numberct">17</div>
                    <div class="textbox">
                        <div class="intBox"><span>Do you have A.I.D.S. or have you ever tested positive for H.I.V.?</span></div>
                    </div>
                </div>
                <div class="newCol2">
                    <div class="newcolin1"><span class="clbox"></span></div>
                    <div class="newcolin2"><span class="clbox"></span></div>
                </div>
            </div>
            <div class="newRowSec">
                <div class="newCol1">
                    <div class="numberct">18</div>
                    <div class="textbox">
                        <div class="intBox"><span>Do you have any of the following? Please check any that apply</span></div>
                    </div>
                </div>
                <div class="newCol2">
                    <div class="newcolin1"><span class="clbox"></span></div>
                    <div class="newcolin2"><span class="clbox"></span></div>
                </div>
            </div>
        <div class="newRowSectl">
            <div class="newCol-4">
                <div class="col4-1"><span class="mrcheck"></span> Heart Murmur or Mitral Valve Prolapse</div>
                <div class="col4-1"><span class="mrcheck"></span> Stomach / Intestinal Problems / Ulcers</div>
                <div class="col4-1"><span class="mrcheck"></span> Joint Replacement (hip, knee, etc.)</div>
                <div class="col4-1"><span class="mrcheck"></span> Mental or Nervous Disorder</div>
                <div class="col4-1"><span class="mrcheck"></span> High Blood Pressure</div>
                <div class="col4-1"><span class="mrcheck"></span> Low Blood Pressure</div>
                <div class="col4-1"><span class="mrcheck"></span> Hyper (hypo) Glycemia</div>
                <div class="col4-1"><span class="mrcheck"></span> Cortisone/Steroid Therapy</div>
            </div>
            <div class="newCol-4">
                <div class="col4-1"><span class="mrcheck"></span> Malignant Hyperthermia</div>
                <div class="col4-1"><span class="mrcheck"></span> Drug / Alcohol Dependency</div>
                <div class="col4-1"><span class="mrcheck"></span> Venereal Disease </div>
                <div class="col4-1"><span class="mrcheck"></span> Lung Disease (i.e. Asthma)</div>
                <div class="col4-1"><span class="mrcheck"></span> Thyroid Disease</div>
                <div class="col4-1"><span class="mrcheck"></span> Arthritis or Rheumatism</div>
                <div class="col4-1"><span class="mrcheck"></span> Scarlet or Rheumatic Fever</div>
                <div class="col4-1"><span class="mrcheck"></span> Cancer / Chemotherapy</div>
            </div>
            <div class="newCol-4">
                <div class="col4-1"><span class="mrcheck"></span> Epilepsy or Seizures</div>
                <div class="col4-1"><span class="mrcheck"></span> Liver Disease</div>
                <div class="col4-1"><span class="mrcheck"></span> Heart Attack</div>
                <div class="col4-1"><span class="mrcheck"></span> Cold Sores</div>
                <div class="col4-1"><span class="mrcheck"></span> Jaundice</div>
                <div class="col4-1"><span class="mrcheck"></span> Tuberculosis </div>
                <div class="col4-1"><span class="mrcheck"></span> Hepatitis A,B,C</div>
                <div class="col4-1"><span class="mrcheck"></span> Other <span class="colsLine"></span></div>
            </div>
            <div class="newCol-4">
                <div class="col4-1"><span class="mrcheck"></span> Herpes</div>
                <div class="col4-1"><span class="mrcheck"></span> Sinus Trouble</div>
                <div class="col4-1"><span class="mrcheck"></span> Stroke</div>
                <div class="col4-1"><span class="mrcheck"></span> Kidney Problems</div>
                <div class="col4-1"><span class="mrcheck"></span> Emphysema</div>
                <div class="col4-1"><span class="mrcheck"></span> Glaucoma</div>
                <div class="col4-1"><span class="mrcheck"></span> Diabetes</div>
            </div>
        </div>
        <div class="newRowSec">
            <div class="newCol1">
                <div class="numberct">19</div>
                <div class="textbox">
                    <div class="intBox"><span>Have you had any injury, surgery or x-ray therapy to your face or jaws?</span></div>
                </div>
            </div>
            <div class="newCol2">
                <div class="newcolin1"><span class="clbox"></span></div>
                <div class="newcolin2"><span class="clbox"></span></div>
            </div>
        </div>
        <div class="newRowSec">
            <div class="newCol1">
                <div class="numberct">20</div>
                <div class="textbox">
                    <div class="intBox"><span>Do you have any disease, condition, or problem that you think the doctor should know about?</span></div>
                </div>
            </div>
            <div class="newCol2">
                <div class="newcolin1"><span class="clbox"></span></div>
                <div class="newcolin2"><span class="clbox"></span></div>
            </div>
        </div>
        <div class="newRowSec">
            <div class="newCol1">
                <div class="numberct">21</div>
                <div class="textbox">
                    <div class="intBox"><span>WOMEN ONLY- Are you pregnant or suspect you might be? If so, what month are you in?</span></div>
                </div>
            </div>
            <div class="newCol2">
                <div class="newcolin1"><span class="clbox"></span></div>
                <div class="newcolin2"><span class="clbox"></span></div>
            </div>
        </div>
            <div class="newRowSec">
            <div class="newCol1">
                <div class="numberct"></div>
                <div class="textbox">
                    <div class="intBox"><span>Are you taking birth control pills?</span></div>
                </div>
            </div>
            <div class="newCol2">
                <div class="newcolin1"><span class="clbox"></span></div>
                <div class="newcolin2"><span class="clbox"></span></div>
            </div>
        </div>
        <div class="newRowSec">
            <div class="newCol1">
                <div class="numberct"></div>
                <div class="textbox">
                    <div class="intBox"><span>Are you nursing?</span></div>
                </div>
            </div>
            <div class="newCol2">
                <div class="newcolin1"><span class="clbox"></span></div>
                <div class="newcolin2"><span class="clbox"></span></div>
            </div>
        </div>
        
        
        <h2>Dental History</h2>
        <div class="newRowSec">
            <div class="newCol1">&nbsp;</div>
            <div class="newCol2">
                <div class="newcolin1">Yes</div>
                <div class="newcolin2">Yes</div>
            </div>
        </div>
        <div class="newRowSec historySec">
            <div class="newCol1">
                <div class="numberct">1</div>
                <div class="textbox">
                    <div class="iintbox2">
                        <label>Reason for todays visit:</label>
                        <div class="hcl1"><span class="mrcheck"></span> Exam</div>
                        <div class="hcl1"><span class="mrcheck"></span> Cleaning</div>
                        <div class="hcl1"><span class="mrcheck"></span> Emergency</div>
                        <div class="hcl1"><span class="mrcheck"></span> Other</div>
                        <div class="colmn2"></div>
                    </div>

                </div>
            </div>
            <div class="newCol2">
                &nbsp;
            </div>
        </div>
        <div class="newRowSec historySec">
            <div class="newCol1">
                <div class="numberct">&nbsp;</div>
                <div class="textbox">
                    <div class="intBox"><span>Are you presently having dental pain?</span></div>
                </div>
            </div>
            <div class="newCol2">
                <div class="newcolin1"><span class="clbox"></span></div>
                <div class="newcolin2"><span class="clbox"></span></div>
            </div>
        </div>
        <div class="newRowSec historySec">
            <div class="newCol1">
                <div class="numberct">&nbsp;</div>
                <div class="textbox">
                    <div class="intBox"><span>Is there a dental problem you would like to take care of as soon as possible?</span></div>
                    <div class="iintbox2">
                        <label>Please specify:</label>
                        <div class="colmn3"></div>
                    </div>
                </div>
            </div>
            <div class="newCol2">
                <div class="newcolin1"><span class="clbox"></span></div>
                <div class="newcolin2"><span class="clbox"></span></div>
            </div>
        </div>
        <div class="newRowSec historySec">
            <div class="newCol1">
                <div class="numberct">2</div>
                <div class="textbox">
                    <div class="iintbox2">
                        <label>How frequently do you see your dentist?</label>
                        <div class="hcl1"><span class="mrcheck"></span> 6 months</div>
                        <div class="hcl1"><span class="mrcheck"></span> Yearly</div>
                        <div class="hcl1"><span class="mrcheck"></span> Other</div>
                        <div class="colmn2 colmn4"></div>
                    </div>
                    <div class="iintbox2">
                        <label>Last dental visit: </label>
                        <div class="colmn5"></div>
                    </div>
                    <div class="iintbox2">
                        <label>Last cleaning:</label>
                        <div class="colmn3"></div>
                    </div>
                    <div class="iintbox2">
                        <label>Full mouth series of x-rays:</label>
                        <div class="colmn5"></div>
                    </div>
                </div>
            </div>
            <div class="newCol2">
                &nbsp;
            </div>
        </div>
        <div class="newRowSec historySec">
            <div class="newCol1">
                <div class="numberct">3</div>
                <div class="textbox">
                    
                    <div class="iintbox2">
                        <label>How often do you brush your teeth?</label>
                        <div class="colmn6"></div>
                    </div>
                    <div class="iintbox2">
                        <label>Floss?</label>
                        <div class="colmn3"></div>
                    </div>
                    
                </div>
            </div>
            <div class="newCol2">
                &nbsp;
            </div>
        </div>
        
        <div class="newRowSec historySec">
            <div class="newCol1">
                <div class="numberct">4</div>
                <div class="textbox">
                    
                    <div class="textbox">
                    <div class="intBox"><span>Do your gums bleed easily?</span></div>
                </div>
                </div>
            </div>
            <div class="newCol2">
                <div class="newcolin1"><span class="clbox"></span></div>
                <div class="newcolin2"><span class="clbox"></span></div>
            </div>
        </div>
        
        <div class="newRowSec historySec">
            <div class="newCol1">
                <div class="numberct">5</div>
                <div class="textbox">
                    
                    <div class="textbox">
                    <div class="intBox"><span>Are your teeth sensitive to:</span> 
                        <div class="hcl1"><span class="mrcheck"></span> Hot</div> 
                        <div class="hcl1"><span class="mrcheck"></span> Cold</div>
                        <div class="hcl1"><span class="mrcheck"></span> Biting</div>
                        <div class="hcl1"><span class="mrcheck"></span> Sweets?</div>
                    </div>
                </div>
                </div>
            </div>
            <div class="newCol2">
                <div class="newcolin1"><span class="clbox"></span></div>
                <div class="newcolin2"><span class="clbox"></span></div>
            </div>
        </div>
        <div class="newRowSec historySec">
            <div class="newCol1">
                <div class="numberct">6</div>
                <div class="textbox">
                    
                    <div class="textbox">
                    <div class="intBox"><span>Do you feel you have bad breath at times?</span></div>
                </div>
                </div>
            </div>
            <div class="newCol2">
                <div class="newcolin1"><span class="clbox"></span></div>
                <div class="newcolin2"><span class="clbox"></span></div>
            </div>
        </div>
        <div class="newRowSec historySec">
            <div class="newCol1">
                <div class="numberct">7</div>
                <div class="textbox">
                    
                    <div class="textbox">
                    <div class="intBox"><span>Have you ever had jaw joint surgery?</span></div>
                </div>
                </div>
            </div>
            <div class="newCol2">
                <div class="newcolin1"><span class="clbox"></span></div>
                <div class="newcolin2"><span class="clbox"></span></div>
            </div>
        </div>
        <div class="newRowSec historySec">
            <div class="newCol1">
                <div class="numberct">8</div>
                <div class="textbox">
                    
                    <div class="textbox">
                    <div class="intBox"><span>Do you have pain in your jaw joints or suffer from migraine headaches?</span></div>
                </div>
                </div>
            </div>
            <div class="newCol2">
                <div class="newcolin1"><span class="clbox"></span></div>
                <div class="newcolin2"><span class="clbox"></span></div>
            </div>
        </div>
        <div class="newRowSec historySec">
            <div class="newCol1">
                <div class="numberct">9</div>
                <div class="textbox">
                    
                    <div class="textbox">
                    <div class="intBox"><span>Does any part of your mouth hurt when clenched?</span></div>
                </div>
                </div>
            </div>
            <div class="newCol2">
                <div class="newcolin1"><span class="clbox"></span></div>
                <div class="newcolin2"><span class="clbox"></span></div>
            </div>
        </div>
        <div class="newRowSec historySec">
            <div class="newCol1">
                <div class="numberct">10</div>
                <div class="textbox">
                    
                    <div class="textbox">
                    <div class="intBox"><span>Does your jaw crack or pop when opened widely?</span></div>
                </div>
                </div>
            </div>
            <div class="newCol2">
                <div class="newcolin1"><span class="clbox"></span></div>
                <div class="newcolin2"><span class="clbox"></span></div>
            </div>
        </div>
        <div class="newRowSec historySec">
            <div class="newCol1">
                <div class="numberct">11</div>
                <div class="textbox">
                    
                    <div class="textbox">
                    <div class="intBox"><span>Have you had:</span> 
                        <div class="hcl1"><span class="mrcheck"></span>  Braces</div> 
                        <div class="hcl1"><span class="mrcheck"></span> Oral surgery</div>
                        <div class="hcl1"><span class="mrcheck"></span> Gum treatment</div>
                        <div class="hcl1"><span class="mrcheck"></span> Root canal</div>
                    </div>
                </div>
                </div>
            </div>
            <div class="newCol2">
                <div class="newcolin1"><span class="clbox"></span></div>
                <div class="newcolin2"><span class="clbox"></span></div>
            </div>
        </div>
        <div class="newRowSec historySec">
            <div class="newCol1">
                <div class="numberct">12</div>
                <div class="textbox">
                    
                    <div class="textbox">
                    <div class="intBox"><span>Do you grind or clench your teeth during the day or night?</span></div>
                </div>
                </div>
            </div>
            <div class="newCol2">
                <div class="newcolin1"><span class="clbox"></span></div>
                <div class="newcolin2"><span class="clbox"></span></div>
            </div>
        </div>
        <div class="newRowSec historySec">
            <div class="newCol1">
                <div class="numberct">13</div>
                <div class="textbox">
                    
                    <div class="textbox">
                    <div class="intBox"><span>Do you smoke?Number per day:</span></div>
                </div>
                </div>
            </div>
            <div class="newCol2">
                <div class="newcolin1"><span class="clbox"></span></div>
                <div class="newcolin2"><span class="clbox"></span></div>
            </div>
        </div>
        <div class="newRowSec historySec">
            <div class="newCol1">
                <div class="numberct">14</div>
                <div class="textbox">
                    
                    <div class="textbox">
                    <div class="intBox"><span>Do you or does any family member have a problem with snoring?</span></div>
                </div>
                </div>
            </div>
            <div class="newCol2">
                <div class="newcolin1"><span class="clbox"></span></div>
                <div class="newcolin2"><span class="clbox"></span></div>
            </div>
        </div>
        
        <div class="newRowSec historySec">
            <div class="newCol1">
                <div class="numberct">15</div>
                <div class="textbox">
                    
                    <div class="iintbox2">
                        <label>Have you ever experienced any growths or sore spots in your mouth? If so, where?</label>
                        <div class="colmn8"></div>
                    </div>
                    
                </div>
            </div>
            <div class="newCol2">
                <div class="newcolin1"><span class="clbox"></span></div>
                <div class="newcolin2"><span class="clbox"></span></div>
            </div>
        </div>
        <div class="newRowSec historySec">
            <div class="newCol1">
                <div class="numberct">16</div>
                <div class="textbox">
                    
                    <div class="iintbox2">
                        <label>Previous problems with dental treatment? Specify:</label>
                        <div class="colmn9"></div>
                    </div>
                    
                </div>
            </div>
            <div class="newCol2">
                <div class="newcolin1"><span class="clbox"></span></div>
                <div class="newcolin2"><span class="clbox"></span></div>
            </div>
        </div>
        
        <div class="newRowSec">
                <div class="newCol1">
                    <div class="numberct">17</div>
                    <div class="textbox">
                        <div class="intBox"><span>Are you satisfied with the appearance of your teeth?</span></div>
                        <div class="iintbox2">
                            <label>Please specify:</label>
                            <div class="colmn2"></div>
                        </div>
                    </div>
                </div>
                <div class="newCol2">
                    <div class="newcolin1"><span class="clbox"></span></div>
                    <div class="newcolin2"><span class="clbox"></span></div>
                </div>
            </div>
        <div class="newRowSec historySec">
            <div class="newCol1">
                <div class="numberct">18</div>
                <div class="textbox">
                    
                    <div class="iintbox2">
                        <label>Other Dental Concerns: </label>
                        <div class="colmn9"></div>
                    </div>
                    
                </div>
            </div>
            <div class="newCol2">
                <div class="newcolin1"><span class="clbox"></span></div>
                <div class="newcolin2"><span class="clbox"></span></div>
            </div>
        </div>
        
        
        <div class="textFildSec">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
        </div>
        
        <div class="signSec">
            <div class="signLeft">
                <div class="signBox"></div>
                <div class="SignDtl">
                    <div>Signature</div>
                    <div class="hcl1"><span class="mrcheck"></span> Patient</div>
                    <div class="hcl1"><span class="mrcheck"></span> Parent</div>
                    <div class="hcl1"><span class="mrcheck"></span> Guardian</div>
                </div>
            </div>
            <div class="signLeft signRight">
                <div class="signBox">Date:</div>
                <div class="SignDtl">
                    <div>Reviewing Dentist</div>
                </div>
            </div>
        </div>
            
    </div>
</div>';


	


// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_061.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
