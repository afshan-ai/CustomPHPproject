<?php

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
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING);

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

table{ border:none; }
 th{ width:150px; border-bottom:1px solid #000;}
 h4{ font-weight:normal;}
 td{margin-bottom: 6px;}
</style>
<div class="wrapper">
    <div class="formSectionPdf">
        
            <p>The personal information provided below will be protected and kept private by our office. All information will be used and disclosed responsibly according to the Privacy Act standards set up and monitored by our office.</p>
            <table width="100%">
            <tr>
                <td width="250px">
                    <table width="100%">
                        <tr>';
                        if($result->salutation=='Mr.')
                        {
                        $html .='
                            <td width="40px">
                                <label>Mr.</label>
                                <table width="100%">
                                    <tr><th style="width:10px; border:1px solid #000;" bgcolor= "#868686"></th></tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                           $html .='
                            <td width="40px">
                                <label>Mr.</label>
                                <table width="100%">
                                    <tr><th style="width:10px; border:1px solid #000;"></th></tr>
                                </table>
                            </td>'; 
                        }
                        if($result->salutation=='Mrs.')
                        {
                        $html .='
                            <td>
                                <label>Mrs.</label>
                                <table width="100%">
                                    <tr><th style="width:10px; border:1px solid #000;" bgcolor= "#868686"></th></tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                           $html .='
                            <td>
                                <label>Mrs.</label>
                                <table width="100%">
                                    <tr><th style="width:10px; border:1px solid #000;"></th></tr>
                                </table>
                            </td>'; 
                        }
                            if($result->salutation=='Miss.')
                        {
                        $html .='
                            <td>
                                <label>Miss.</label>
                                <table width="100%">
                                    <tr><th style="width:10px; border:1px solid #000;" bgcolor= "#868686"></th></tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                           $html .='
                            <td>
                                <label>Miss.</label>
                                <table width="100%">
                                    <tr><th style="width:10px; border:1px solid #000;"></th></tr>
                                </table>
                            </td>'; 
                        }
                        if($result->salutation=='Ms.')
                        {
                        $html .='
                            <td>
                                <label>Ms.</label>
                                <table width="100%">
                                    <tr><th style="width:10px; border:1px solid #000;" bgcolor= "#868686"></th></tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                           $html .='
                            <td>
                                <label>Ms.</label>
                                <table width="100%">
                                    <tr><th style="width:10px; border:1px solid #000;"></th></tr>
                                </table>
                            </td>'; 
                        }
                        if($result->salutation=='Dr.')
                        {
                        $html .='
                            <td>
                                <label>Dr.</label>
                                <table width="100%">
                                    <tr><th style="width:10px; border:1px solid #000;" bgcolor= "#868686"></th></tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                           $html .='
                            <td>
                                <label>Dr.</label>
                                <table width="100%">
                                    <tr><th style="width:10px; border:1px solid #000;"></th></tr>
                                </table>
                            </td>'; 
                        }
                           $html .='
                           
                        </tr>
                    </table>
                </td>
                <td>
                    <label>Given Name:</label>
                    <table width="100%">
                    <tr><th style="width:110px;">'.$result->fname.'</th></tr>
                    </table>
                </td>
                <td width="150px">
                    <label>Marital Status:</label>
                    <table width="100%">
                    <tr><th style="width:80px;"></th></tr>
                    </table>
                </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                <td>
                    <label>Surname:</label>
                    <table width="100%">
                    <tr><th style="width:130px;">'.$result->lname.'</th></tr>
                    </table>
                </td>
                <td>
                    <label>Pronunciation:</label>
                    <table width="100%">
                    <tr><th style="width:120px;"></th></tr>
                    </table>
                </td>
                <td>
                    <label>Preffer to be called:</label>
                    <table width="100%">
                    <tr><th style="width:100px;"></th></tr>
                    </table>
                </td>
                </tr>
            </table>
            
            <table width="100%">
            <tr>
                <td>
                    <label>Address:</label>
                    <table width="100%">
                    <tr><th style="width:580px;"></th></tr>
                    </table>
                </td>
                </tr>
            </table>
            
            <table width="100%">
                <tr>
                <td>
                    <label>Home Phone:</label>
                    <table width="100%">
                    <tr><th style="width:120px;">'.$result->home_phone.'</th></tr>
                    </table>
                </td>
                <td>
                    <label>Work Phone:</label>
                    <table width="100%">
                    <tr><th style="width:120px;">'.$result->work_phone.'</th></tr>
                    </table>
                </td>
                <td>
                    <label>Date of Birth:</label>
                    <table width="100%">
                    <tr><th style="width:130px;">'.$result->dob.'</th></tr>
                    </table>
                </td>
                </tr>
            </table>
            <table width="100%">
                <tr width="170px">
                <td>
                    <label>Fax:</label>
                    <table width="100%">
                    <tr><th style="width:120px;"></th></tr>
                    </table>
                </td>
                <td width="170px">
                    <label>Other:</label>
                    <table width="100%">
                    <tr><th style="width:120px;"></th></tr>
                    </table>
                </td>
                <td width="260px">
                    <table width="100%">
                        <tr>';
                        if($result->gender=='Male')
                        {
                        $html .='
                            <td width="60px">
                                <label>Male</label>
                                <table width="100%">
                                    <tr><th style="width:10px; border:1px solid #000;" bgcolor= "#868686"></th></tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td width="60px">
                                <label>Male</label>
                                <table width="100%">
                                    <tr><th style="width:10px; border:1px solid #000;"></th></tr>
                                </table>
                            </td>';
                        }
                        if($result->gender=='Female')
                        {
                        $html .='
                            <td>
                                <label>Female</label>
                                <table width="100%">
                                    <tr><th style="width:10px; border:1px solid #000;" bgcolor= "#868686"></th></tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td>
                                <label>Female</label>
                                <table width="100%">
                                    <tr><th style="width:10px; border:1px solid #000;"></th></tr>
                                </table>
                            </td>';
                        }
                        if($result->gender=='Adult')
                        {
                        $html .='
                            <td>
                                <label>Adult</label>
                                <table width="100%">
                                    <tr><th style="width:10px; border:1px solid #000;" bgcolor= "#868686"></th></tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td>
                                <label>Male</label>
                                <table width="100%">
                                    <tr><th style="width:10px; border:1px solid #000;"></th></tr>
                                </table>
                            </td>';
                        }
                        if($result->gender=='Child')
                        {
                        $html .='
                            <td>
                                <label>Child</label>
                                <table width="100%">
                                    <tr><th style="width:10px; border:1px solid #000;" bgcolor= "#868686"></th></tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td width="60px">
                                <label>Male</label>
                                <table width="100%">
                                    <tr><th style="width:10px; border:1px solid #000;"></th></tr>
                                </table>
                            </td>';
                        }
                            $html .='
                        </tr>
                    </table>
                </td>
                
                </tr>
            </table>
            
            <table width="100%">
                <tr>
                <td>
                    <label>Employer / School:</label>
                    <table width="100%">
                    <tr><th style="width:200px;"></th></tr>
                    </table>
                </td>
                <td>
                    <label>Occupation:</label>
                    <table width="100%">
                    <tr><th style="width:250px;"></th></tr>
                    </table>
                </td>
                
                </tr>
            </table>
            
            <table width="100%">
                <tr>
                <td>
                    <label>eMail Address:</label>
                    <table width="100%">
                    <tr><th style="width:210px;">'.$result->email.'</th></tr>
                    </table>
                </td>
                <td>
                    <label>Contact Method:</label>
                    <table width="100%">
                    <tr><th style="width:220px;"></th></tr>
                    </table>
                </td>
                
                </tr>
            </table>
            
            <table width="100%">
                <tr>
                <td>
                    <label>Who may we thank for referring you to this office?</label>
                    <table width="100%">
                    <tr><th style="width:360px;"></th></tr>
                    </table>
                </td>
                
                </tr>
            </table>
            
            <table width="100%">
                <tr>
                <td>
                    <label>Are you likely to be available on short notice for future appointments?</label>
                    <table width="100%">
                    <tr>
                    <td>
                        <label>Yes</label>
                        <table width="100%">
                            <tr><th style="width:10px; border:1px solid #000; background: #868686;"> </th></tr>
                            </table> 
                        </td> 
                        <td> 
                            <label>No</label>
                            <table width="100%">
                            <tr><th style="width:10px; border:1px solid #000;"></th></tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                </td>
                
                </tr>
            </table>
            
            <table width="100%">
                <tr>
                <td>
                    <label>Family Physician:</label>
                    <table width="100%">
                    <tr><th style="width:210px;"></th></tr>
                    </table>
                </td>
                <td>
                    <label>Phone:</label>
                    <table width="100%">
                    <tr><th style="width:280px;"></th></tr>
                    </table>
                </td>
                </tr>
            </table>
            
            <table width="100%">
                <tr>
                <td>
                    <label>In Case of Emergency Notify:</label>
                    <table width="100%">
                    <tr><th style="width:40px;"></th></tr>
                    </table>
                </td>
                <td>
                    <label>Relation:</label>
                    <table width="100%">
                    <tr><th style="width:120px;">'.$result->notify_relation.'</th></tr>
                    </table>
                </td>
                <td>
                    <label>Phone:</label>
                    <table width="100%">
                    <tr><th style="width:160px;">'.$result->notify_phone.'</th></tr>
                    </table>
                </td>
                </tr>
            </table>
            
            <table width="100%">
                <tr>
                <td width="500px">
                    <label>Person responsible for this accout:</label>
                    <table width="100%">
                    <tr>
                    <td><label>Self </label>
                        <table width="100%">
                            <tr><th style="width:10px; border:1px solid #000;"></th></tr>
                        </table>
                    </td> 
                    <td><label>Spouse</label>
                    <table width="100%">
                            <tr><th style="width:10px; border:1px solid #000;"></th></tr>
                        </table>
                    </td>
                    <td><label>Parent</label>
                    <table width="100%">
                            <tr><th style="width:10px; border:1px solid #000;"></th></tr>
                        </table>
                    </td> 
                    <td><label>Guardian</label>
                    <table width="100%">
                            <tr><th style="width:10px; border:1px solid #000;"></th></tr>
                        </table>
                    </td>
                    </tr>
                    </table>
                </td>
                <td width="160px">
                    <label>Other:</label>
                    <table width="100%">
                    <tr><th style="width:100px;"></th></tr>
                    </table>
                </td>
                </tr>
            </table>
            
            <table width="100%">
                <tr>
                <td>
                    <label>Name:</label>
                    <table width="100%">
                    <tr><th style="width:260px;">'.$result->notify_name.'</th></tr>
                    </table>
                </td>
                <td>
                    <label>Relation:</label>
                    <table width="100%">
                    <tr><th style="width:260px;"></th></tr>
                    </table>
                </td>
                </tr>
            </table>
            
            <table width="100%">
            <tr>
                <td>
                    <label>Address:</label>
                    <table width="100%">
                    <tr><th style="width:580px;"></th></tr>
                    </table>
                </td>
                </tr>
            </table>
            
            <table width="100%">
                <tr>
                <td>
                    <label>Home Phone:</label>
                    <table width="100%">
                    <tr><th style="width:120px;"></th></tr>
                    </table>
                </td>
                <td>
                    <label>Work Phone:</label>
                    <table width="100%">
                    <tr><th style="width:120px;"></th></tr>
                    </table>
                </td>
                <td>
                    <label>X</label>
                    <table width="100%">
                    <tr><th style="width:130px;"></th></tr>
                    </table>
                </td>
                </tr>
            </table>
            
            
            
            

            <table class="tableSec" width="100%" border="0">
                <tr>
                    <th style="border:1px solid #000;">Primary Insurance</th>
                    <th style="border:1px solid #000;">Secondary Insurance</th>
                </tr>
                <tr>
                    <td>
                    <table width="100%">
                        <tr>
                        <td>
                            <label>Subscriber:</label>
                            <table width="100%">
                            <tr><th style="width:60px;">'.$result->primary_name.'</th></tr>
                            </table>
                        </td>
                        <td>
                            <label>Date of Birth:</label>
                            <table width="100%">
                            <tr><th style="width:60px;">'.$result->primary_dob.'</th></tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                    <table width="100%">
                        <tr>
                        <td>
                            <label>Relation:</label>
                            <table width="100%">
                            <tr>
                            ';
                            if($result->primary_realtion=='self')
                        {
                        $html .='
                            <td>
                                <label>Self</label>
                                <table width="100%">
                                <tr><th style="width:10px; border:1px solid #000;" bgcolor= "#868686"></th></tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                           <td>
                                <label>Self</label>
                                <table width="100%">
                                <tr><th style="width:10px; border:1px solid #000;"></th></tr>
                                </table>
                            </td>';
                        }
                        if($result->primary_realtion=='spouse')
                        {
                        $html .='
                            <td>
                                <label>Spouse</label>
                                <table width="100%">
                                <tr><th style="width:10px; border:1px solid #000;" bgcolor= "#868686"></th></tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                           <td>
                                <label>Spouse</label>
                                <table width="100%">
                                <tr><th style="width:10px; border:1px solid #000;"></th></tr>
                                </table>
                            </td>';
                        }
                        if($result->primary_realtion=='other')
                        {
                        $html .='
                            <td>
                                <label>Other</label>
                                <table width="100%">
                                <tr><th style="width:10px; border:1px solid #000;" bgcolor= "#868686"></th></tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                           <td>
                                <label>Other</label>
                                <table width="100%">
                                <tr><th style="width:10px; border:1px solid #000;"></th></tr>
                                </table>
                            </td>';
                        }
                            $html .='
                            
                            </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                        
                    <table width="100%">
                        <tr>
                        <td>
                            <label>Subscriber I.D.</label>
                            <table width="100%">
                            <tr><th style="width:60px;">'.$result->primary_id.'</th></tr>
                            </table>
                        </td>
                        <td>
                            <label>SIN</label>
                            <table width="100%">
                            <tr><th style="width:60px;"></th></tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                    <table width="100%">
                        <tr>
                        <td>
                            <label>Insurance Co:</label>
                            <table width="100%">
                            <tr><th style="width:160px;">'.$result->primary_company.'</th></tr>
                            </table>
                        </td>
                        
                        </tr>
                    </table>
                    
                    <table width="100%">
                        <tr>
                        <td>
                            <label>Policy/Plan #:</label>
                            <table width="100%">
                            <tr><th style="width:60px;">'.$result->primary_policy.'</th></tr>
                            </table>
                        </td>
                        <td>
                            <label>Division/Sect. #:</label>
                            <table width="100%">
                            <tr><th style="width:50px;">'.$result->primary_sector.'</th></tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                        
                    <table width="100%">
                        <tr>
                        <td>
                            <label>Are You Familiar with Your Plan Details?</label>
                            <table width="100%">
                            <tr>
                            ';
                            if($result->primary_familiar=='yes')
                            {
                                $html .='<td><u>Yes</u></td>';
                            }
                            else
                            {
                                $html .='<td>Yes</td>';
                            }
                            if($result->primary_familiar=='no')
                            {
                                $html .='<td><u>No</u></td>';
                            }
                            else
                            {
                                $html .='<td>No</td>';
                            }
                            $html .='
                            </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                        
                        
                    </td>
                    <td>
                        <table width="100%">
                        <tr>
                        <td>
                            <label>Subscriber:</label>
                            <table width="100%">
                            <tr><th style="width:60px;">'.$result->secondary_name.'</th></tr>
                            </table>
                        </td>
                        <td>
                            <label>Date of Birth:</label>
                            <table width="100%">
                            <tr><th style="width:60px;">'.$result->secondary_dob.'</th></tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                    <table width="100%">
                        <tr>
                        <td>
                            <label>Relation:</label>
                            <table width="100%">
                            <tr>
                             ';
                            if($result->secondary_realtion=='self')
                        {
                        $html .='
                            <td>
                                <label>Self</label>
                                <table width="100%">
                                <tr><th style="width:10px; border:1px solid #000;" bgcolor= "#868686"></th></tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                           <td>
                                <label>Self</label>
                                <table width="100%">
                                <tr><th style="width:10px; border:1px solid #000;"></th></tr>
                                </table>
                            </td>';
                        }
                        if($result->secondary_realtion=='spouse')
                        {
                        $html .='
                            <td>
                                <label>Spouse</label>
                                <table width="100%">
                                <tr><th style="width:10px; border:1px solid #000;" bgcolor= "#868686"></th></tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                           <td>
                                <label>Spouse</label>
                                <table width="100%">
                                <tr><th style="width:10px; border:1px solid #000;"></th></tr>
                                </table>
                            </td>';
                        }
                        if($result->secondary_realtion=='other')
                        {
                        $html .='
                            <td>
                                <label>Other</label>
                                <table width="100%">
                                <tr><th style="width:10px; border:1px solid #000;" bgcolor= "#868686"></th></tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                           <td>
                                <label>Other</label>
                                <table width="100%">
                                <tr><th style="width:10px; border:1px solid #000;"></th></tr>
                                </table>
                            </td>';
                        }
                            $html .='
                            </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                        
                    <table width="100%">
                        <tr>
                        <td>
                            <label>Subscriber I.D.</label>
                            <table width="100%">
                            <tr><th style="width:60px;">'.$result->secondary_id.'</th></tr>
                            </table>
                        </td>
                        <td>
                            <label>SIN</label>
                            <table width="100%">
                            <tr><th style="width:60px;"></th></tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                    <table width="100%">
                        <tr>
                        <td>
                            <label>Insurance Co:</label>
                            <table width="100%">
                            <tr><th style="width:160px;">'.$result->secondary_company.'</th></tr>
                            </table>
                        </td>
                        
                        </tr>
                    </table>
                    
                    <table width="100%">
                        <tr>
                        <td>
                            <label>Policy/Plan #:</label>
                            <table width="100%">
                            <tr><th style="width:60px;">'.$result->secondary_policy.'</th></tr>
                            </table>
                        </td>
                        <td>
                            <label>Division/Sect. #:</label>
                            <table width="100%">
                            <tr><th style="width:50px;">'.$result->secondary_sector.'</th></tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                        
                    <table width="100%">
                        <tr>
                        <td>
                            <label>Are You Familiar with Your Plan Details?</label>
                            <table width="100%">
                            <tr>';
                            if($result->secondary_familiar=='yes')
                            {
                                $html .='<td><u>Yes</u></td>';
                            }
                            else
                            {
                                $html .='<td>Yes</td>';
                            }
                            if($result->secondary_familiar=='no')
                            {
                                $html .='<td><u>No</u></td>';
                            }
                            else
                            {
                                $html .='<td>No</td>';
                            }
                            $html .='
                            </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                    </td>
                </tr>
                
            </table>
            
            <div class="formRowPhone payment">
                <div class="formCol3">
                    <label><strong>Method of Payment:</strong></label>
                    <br>
                    <table class="formCol3 lastChild" width="100%">
                        <tr>
                            <td class="mrsec" width="90px">
                                <table width="100%">
                                <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    <td>Cash</td>
                                </tr>
                                </table>
                            </td>
                            <td class="mrsec" width="120px">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    <td>Cheque</td>
                                </tr>
                                </table>
                            </td>
                            <td class="mrsec" width="200px">
                             Credit Card: 
                                <table width="100%">
                                <tr><th style="width:100px;"></th></tr>
                                </table>
                            </td>
                            <td class="mrsec">Number: 
                                <table width="100%">
                                <tr><th style="width:50px;"></th></tr>
                                </table>
                            </td>
                            <td class="mrsec">Exp: 
                                <table width="100%">
                                <tr><th style="width:50px;"></th></tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
                
            </div>
            
            <div>
                <h3>Medical History</h3>
                <h4>All Information is Confidential</h4>
            </div>
            
            <table class="newRowSec"  width="100%">
                <tr>
                    <td class="newCol1" width="550px">The following information is required by the dentist to assist in proper diagnosis and treatment.</td>
                    <td class="newCol2" width="100px">
                        <table width="100%">
                            <tr>
                            <td class="newcolin1">Yes</td>
                            <td class="newcolin2">No</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="newCol1" width="550px">
                        1 Have you ever had a serious illness requiring hospitalization or extensive medical care?
                        <div class="iintbox2">
                            <label>Please specify:</label>
                            <table width="100%">
                            <tr><th style="width:400px;"></th></tr>
                            </table>
                        </div>
                    </td>
                    <td class="newCol2" width="100px">
                        <table width="100%">
                            <tr>';
                            if($result->question1=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->question1=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                            
                            
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="newCol1" width="550px">
                        2 Are you presently under the care of a physician?
                        <div class="iintbox2">
                            <label>If so, please explain:</label>
                            <table width="100%">
                            <tr><th style="width:380px;"></th></tr>
                            </table>
                        </div>
                    </td>
                    <td class="newCol2" width="100px">
                        <table width="100%">
                            <tr>
                            ';
                            if($result->question2=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->question2=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="newCol1" width="550px">
                        3 Have you had a medical examination in the last year?
                        <br>
                    </td>
                    <td class="newCol2" width="100px">
                        <table width="100%">
                            <tr>
                            ';
                            if($result->question3=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->question3=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="newCol1" width="550px">
                        4 Do you use any prescription or non-prescription drugs regularly?
                        <div class="iintbox2">
                            <label>Please specify:</label>
                            <table width="100%">
                            <tr><th style="width:400px;"></th></tr>
                            </table>
                        </div>
                    </td>
                    <td class="newCol2" width="100px">
                        <table width="100%">
                            <tr>
                            ';
                            if($result->question4=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->question4=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="newCol1" width="550px">
                        5 Do you have any allergic conditions: e.g. hay fever, skin rash, food allergies, metal, latex?
                        <br>
                    </td>
                    <td class="newCol2" width="100px">
                        <table width="100%">
                            <tr>
                            ';
                            if($result->question5=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->question5=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="newCol1" width="550px">
                        6 Do any allergic reactions result in headaches, shortness of breath, chest constriction, nausea?
                        <div class="iintbox2">
                            <label>Please specify:</label>
                            <table width="100%">
                            <tr><th style="width:400px;"></th></tr>
                            </table>
                        </div>
                    </td>
                    <td class="newCol2" width="100px">
                        <table width="100%">
                            <tr>
                           ';
                            if($result->question6=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->question6=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="newCol1" width="550px">
                        7 Have you been hospitalized in the last 5 years?
                        <div class="iintbox2">
                            <label>Please specify:</label>
                            <table width="100%">
                            <tr><th style="width:400px;"></th></tr>
                            </table>
                        </div>
                    </td>
                    <td class="newCol2" width="100px">
                        <table width="100%">
                            <tr>
                            ';
                            if($result->question7=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->question7=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="newCol1" width="550px">
                        8 Have you ever experienced any unusual reaction to any of the following? (Please circle)<br>
                        local anaesthesia (freezing), aspirin, penicillin, codeine, sulpha drugs, barbiturates (sleeping pills), or any other medicine?
                        <div class="iintbox2">
                            <label> If so please explain</label>
                            <table width="100%">
                            <tr><th style="width:400px;"></th></tr>
                            </table>
                        </div>
                    </td>
                    <td class="newCol2" width="100px">
                        <table width="100%">
                            <tr>
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="newCol1" width="550px">
                        9 Have you been warned against taking any drug or medication?
                        <br>
                    </td>
                    <td class="newCol2" width="100px">
                        <table width="100%">
                            <tr>
                            ';
                            if($result->question8=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->question8=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="newCol1" width="550px">
                        10 Do you bruise easily or bleed abnormally?
                        <br>
                    </td>
                    <td class="newCol2" width="100px">
                        <table width="100%">
                            <tr>
                            ';
                            if($result->question9=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->question9=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="newCol1" width="550px">
                        11 Do you require pre-medication for dental treatment
                        <br>
                    </td>
                    <td class="newCol2" width="100px">
                        <table width="100%">
                            <tr>
                            ';
                            if($result->question10=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->question10=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="newCol1" width="550px">
                        12 Have you ever had any organ implants or medical implants?
                        <br>
                    </td>
                    <td class="newCol2" width="100px">
                        <table width="100%">
                            <tr>
                            ';
                            if($result->question11=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->question11=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="newCol1" width="550px">
                        13 Have you ever fainted?
                        <br>
                    </td>
                    <td class="newCol2" width="100px">
                        <table width="100%">
                            <tr>
                            ';
                            if($result->question12=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->question12=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="newCol1" width="550px">
                        14 Do your ankles swell?
                        <br>
                    </td>
                    <td class="newCol2" width="100px">
                        <table width="100%">
                            <tr>
                            ';
                            if($result->question13=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->question13=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="newCol1" width="550px">
                        15 Do you experience shortness of breath or chest pain when taking a walk or climbing stairs?
                        <br>
                    </td>
                    <td class="newCol2" width="100px">
                        <table width="100%">
                            <tr>
                            ';
                            if($result->question14=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->question14=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="newCol1" width="550px">
                        16 Do you have frequent headaches?
                        <br>
                    </td>
                    <td class="newCol2" width="100px">
                        <table width="100%">
                            <tr>
                           ';
                            if($result->question15=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->question15=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="newCol1" width="550px">
                        17 Do you have A.I.D.S. or have you ever tested positive for H.I.V.?
                        <br>
                    </td>
                    <td class="newCol2" width="100px">
                        <table width="100%">
                            <tr>
                            ';
                            if($result->question16=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->question16=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="newCol1" width="550px">
                        18 Do you have any of the following? Please check any that apply
                        <br>
                    </td>
                    <td class="newCol2" width="100px">
                        <table width="100%">
                            <tr>
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
            </table>

            
        <table class="newRowSectl" width="100%">
        <tr>
            <td width="300px">
            <table class="newRowSectl" width="100%">
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Heart Murmur or Mitral Valve Prolapse<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Stomach / Intestinal Problems / Ulcers<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Joint Replacement (hip, knee, etc.)<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Mental or Nervous Disorder<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">High Blood Pressure<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Low Blood Pressure<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Hyper (hypo) Glycemia<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Cortisone/Steroid Therapy<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Malignant Hyperthermia<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Drug / Alcohol Dependency<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Venereal Disease<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Lung Disease (i.e. Asthma)<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Thyroid Disease<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Arthritis or Rheumatism<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Scarlet or Rheumatic Fever<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Cancer / Chemotherapy<br></td>
                </tr>
            </table>
            </td>
            
            <td width="300px">
            <table class="newRowSectl" width="100%">
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Epilepsy or Seizures<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Liver Disease<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Heart Attack<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Cold Sores<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Jaundice<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Tuberculosis<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Hepatitis A,B,C<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Herpes<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Sinus Trouble<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Stroke<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Kidney Problems<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Emphysema<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Glaucoma<br></td>
                </tr>
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Diabetes<br></td>
                </tr>
                
                <tr>
                    <td width="30px">
                        <table width="100%">
                            <tr>
                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                            </tr>
                        </table>
                    </td>
                    <td width="240px">Other<br></td>
                </tr>
            </table>
            </td>
            </tr>
        </table>
        
        <table width="100%">
            <tr>
                <td class="newCol1" width="550px">
                    19 Have you had any injury, surgery or x-ray therapy to your face or jaws?
                    <br>
                </td>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                        <td class="newcolin1">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        <td class="newcolin2">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="550px">
                    20 Do you have any disease, condition, or problem that you think the doctor should know about?
                    <br>
                </td>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                        <td class="newcolin1">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        <td class="newcolin2">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="550px">
                    21 WOMEN ONLY- 
                    <div class="iintbox2">
                        <label> Are you pregnant or suspect you might be? If so, what month are you in?</label>
                        <table width="100%">
                        <tr><th style="width:100px;"></th></tr>
                        </table>
                    </div>
                </td>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                        <td class="newcolin1">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        <td class="newcolin2">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="550px">
                    Are you taking birth control pills?
                    <br>
                </td>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                        <td class="newcolin1">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        <td class="newcolin2">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="550px">
                    Are you nursing?
                    <br>
                </td>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                        <td class="newcolin1">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        <td class="newcolin2">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        
        
        
        
        
        <h3>Dental History</h3>
        
        <table class="newRowSec"  width="100%">
            <tr>
                <td class="newCol1" width="550px"></td>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                        <td class="newcolin1">Yes</td>
                        <td class="newcolin2">No</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <label>1 Reason for todays visit:</label><br>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                        <td class="newcolin1" width="30px">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        <td width="70px">Exam</td>
                        </tr>
                    </table>
                </td>
                <td class="newCol2" width="120px">
                    <table width="100%">
                        <tr>
                        <td class="newcolin1" width="30px">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        <td width="90px">Cleaning</td>
                        </tr>
                    </table>
                </td>
                <td class="newCol2" width="130px">
                    <table width="100%">
                        <tr>
                        <td class="newcolin1" width="30px">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        <td width="100px">Emergency</td>
                        </tr>
                    </table>
                </td>
                <td class="newCol2" width="180px">
                    <table width="100%">
                        <tr>
                        <td class="newcolin1" width="30px">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        <td>Other</td>
                        <td class="newcolin1">
                            <table width="100%">
                                <tr>
                                <th style="width:90px;"></th>
                                </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="550px">
                    Are you presently having dental pain?
                    <br>
                </td>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                       ';
                            if($result->questiond1=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->questiond1=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="550px">
                    Is there a dental problem you would like to take care of as soon as possible?
                </td>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                       ';
                            if($result->questiond2=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->questiond2=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="550px">
                    <div class="iintbox2">
                        <label> Please specify:</label>
                        <table width="100%">
                        <tr><th style="width:450px;"></th></tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <label>2 How frequently do you see your dentist?</label><br>
                <td class="newCol2" width="120px">
                    <table width="100%">
                        <tr>
                        <td class="newcolin1" width="30px">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        <td width="90px">6 months</td>
                        </tr>
                    </table>
                </td>
                <td class="newCol2" width="120px">
                    <table width="100%">
                        <tr>
                        <td class="newcolin1" width="30px">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        <td width="90px">Yearly</td>
                        </tr>
                    </table>
                </td>
                
                <td class="newCol2" width="180px">
                    <table width="100%">
                        <tr>
                        
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="550px">
                    <div class="iintbox2">
                        <label>Last dental visit:</label>
                        <table width="100%">
                        <tr><th style="width:450px;"></th></tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="300px">
                    <div class="iintbox2">
                        <label>Last cleaning:</label>
                        <table width="100%">
                        <tr><th style="width:200px;"></th></tr>
                        </table>
                    </div>
                </td>
                <td class="newCol1" width="300px">
                    <div class="iintbox2">
                        <label>Full mouth series of x-rays:</label>
                        <table width="100%">
                        <tr><th style="width:160px;"></th></tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="400px">
                    <div class="iintbox2">
                        <label>3 How often do you brush your teeth?</label>
                        <table width="100%">
                        <tr><th style="width:150px;"></th></tr>
                        </table>
                    </div>
                </td>
                <td class="newCol1" width="300px">
                    <div class="iintbox2">
                        <label>Floss?</label>
                        <table width="100%">
                        <tr><th style="width:160px;"></th></tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="550px">
                    4 Do your gums bleed easily?
                </td>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                        ';
                            if($result->questiond3=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->questiond3=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <label>5 Are your teeth sensitive to:</label><br>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                        <td class="newcolin1" width="30px">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        <td width="70px">Hot</td>
                        </tr>
                    </table>
                </td>
                <td class="newCol2" width="120px">
                    <table width="100%">
                        <tr>
                        <td class="newcolin1" width="30px">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        <td width="90px">Cold</td>
                        </tr>
                    </table>
                </td>
                <td class="newCol2" width="130px">
                    <table width="100%">
                        <tr>
                        <td class="newcolin1" width="30px">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        <td width="100px">Biting</td>
                        </tr>
                    </table>
                </td>
                <td class="newCol2" width="200px">
                    <table width="100%">
                        <tr>
                        <td class="newcolin1" width="30px">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        <td>Sweets?</td>
                        </tr>
                    </table>
                </td>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                        ';
                            if($result->questiond4=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->questiond4=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="550px">
                    6 Do you feel you have bad breath at times?
                    <br>
                </td>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                        ';
                            if($result->questiond5=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->questiond5=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="550px">
                    7 Have you ever had jaw joint surgery?
                    <br>
                </td>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                        ';
                            if($result->questiond6=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->questiond6=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="550px">
                    8 Do you have pain in your jaw joints or suffer from migraine headaches?
                    <br>
                </td>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                       ';
                            if($result->questiond7=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->questiond7=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="550px">
                    9 Does any part of your mouth hurt when clenched?
                    <br>
                </td>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                        ';
                            if($result->questiond8=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->questiond8=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="550px">
                    10 Does your jaw crack or pop when opened widely?
                    <br>
                </td>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                        ';
                            if($result->questiond9=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->questiond9=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <label>11 Have you had:</label><br>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                        <td class="newcolin1" width="30px">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        <td width="70px">Braces</td>
                        </tr>
                    </table>
                </td>
                <td class="newCol2" width="130px">
                    <table width="100%">
                        <tr>
                        <td class="newcolin1" width="30px">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        <td width="100px">Oral surgery</td>
                        </tr>
                    </table>
                </td>
                <td class="newCol2" width="130px">
                    <table width="100%">
                        <tr>
                        <td class="newcolin1" width="30px">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        <td width="100px">Gum treatment</td>
                        </tr>
                    </table>
                </td>
                
                <td class="newCol2" width="190px">
                    <table width="100%">
                        <tr>
                        <td class="newcolin1" width="30px">
                            <table width="100%">
                                <tr>
                                <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                </tr>
                            </table>
                        </td>
                        <td>Root canal</td>
                        </tr>
                    </table>
                </td>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                       ';
                            if($result->questiond10=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->questiond10=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                        </tr>
                    </table>
                    <br>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="550px">
                    12 Do you grind or clench your teeth during the day or night?
                    <br>
                </td>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                        ';
                            if($result->questiond11=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->questiond11=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="350px">
                    13 Do you smoke? Number per day:
                    <br>
                </td>
                <td width="200px">
                    <table width="100%">
                        <tr><th style="width:150px;"></th></tr>
                    </table>
                </td>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                        ';
                            if($result->questiond12=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->questiond12=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="550px">
                    14 Do you or does any family member have a problem with snoring?
                    <br>
                </td>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                        ';
                            if($result->questiond13=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->questiond13=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="500px">
                    15 Have you ever experienced any growths or sore spots in your mouth? If so, where?
                    <br>
                </td>
                <td width="50px">
                    <table width="100%">
                        <tr><th style="width:50px;"></th></tr>
                    </table>
                </td>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                       ';
                            if($result->questiond14=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->questiond14=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="400px">
                    16 Previous problems with dental treatment? Specify:
                    <br>
                </td>
                <td width="150px">
                    <table width="100%">
                        <tr><th style="width:150px;"></th></tr>
                    </table>
                </td>
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                        ';
                            if($result->questiond15=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->questiond15=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="550px">
                    17 Are you satisfied with the appearance of your teeth?
                    <div class="iintbox2">
                        <label>Please specify:</label>
                        <table width="100%">
                        <tr><th style="width:400px;"></th></tr>
                        </table>
                    </div>
                </td>
                
                <td class="newCol2" width="100px">
                    <table width="100%">
                        <tr>
                        ';
                            if($result->questiond16=='yes')
                        {
                        $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin1">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        if($result->questiond16=='no')
                        {
                        $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;" bgcolor= "#868686"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                        else
                        {
                            $html .='
                            <td class="newcolin2">
                                <table width="100%">
                                    <tr>
                                    <th style="width:10px; height:10px; border: 1px solid #cbcbcb;"></th>
                                    </tr>
                                </table>
                            </td>';
                        }
                            $html .='
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="newCol1" width="550px">
                    
                        <label>18 Other Dental Concerns:</label>
                        <table width="100%">
                        <tr><th style="width:400px;"></th></tr>
                        </table>
                </td>
                
            </tr>
        </table>
        
        

        
        <div class="textFildSec">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
        </div>
        
        <table class="newRowSec"  width="100%">
            <tr>
                <td>
                    <table width="100%">
                        <tr><th style="width:300px; border: 1px solid #505050;"></th></tr>
                        <br>
                    </table>
                    <table width="100%">
                        <tr>
                        <td width="65px">Signature</td>
                            <td>
                            <table width="100%">
                                <tr>
                                    <td class="newcolin1" width="25px">
                                        <table width="100%">
                                            <tr>
                                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                            </tr>
                                        </table>
                                    </td>
                                    <td width="90px">Patient</td>
                                </tr>
                                </table>
                            </td>
                            <td>
                            <table width="100%">
                                <tr>
                                    <td class="newcolin1" width="25px">
                                        <table width="100%">
                                            <tr>
                                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                            </tr>
                                        </table>
                                    </td>
                                    <td width="90px">Parent</td>
                                </tr>
                                </table>
                            </td>
                            <td>
                            <table width="100%">
                                <tr>
                                    <td class="newcolin1" width="25px">
                                        <table width="100%">
                                            <tr>
                                            <th style="width:10px; height:6px; border: 1px solid #cbcbcb;"></th>
                                            </tr>
                                        </table>
                                    </td>
                                    <td width="90px">Guardian</td>
                                </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table width="100%">
                        <tr>
                        <th style="width:120px; border: 1px solid #505050;"></th>
                        <th style="width:170px; border: 1px solid #505050;"></th>
                        </tr>
                        <br>
                    </table>
                    <table width="100%">
                        <tr>
                            <td>
                            Date
                            </td>
                            <td>
                            Reviewing Dentist
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        
        
            
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
