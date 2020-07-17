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
$pdf->SetTitle('Patient Acknowledgement Form');
$pdf->SetSubject('Patient Acknowledgement Form');
$pdf->SetKeywords('Patient Acknowledgement Form, PDF, Patient Acknowledgement Form, Patient Acknowledgement Form, Patient Acknowledgement Form');

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
$query_device = "select * from `dental1_patient_acknowledge_form` where user_id=:user_id";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("user_id"=>$_REQUEST['id']));
    $result = $statement_device->fetch();
$salt="9@4b2mkN$^)M*Hzc^i(@spjm";

$html = '
<style>
h2{ font-size:24px; display:block;}
 span{ color:red; display:table; text-decoration:underline; text-underline-position: under; min-width:250px;}
 table{ border:none; }
 th{ width:150px; border-bottom:1px solid #000;}
 h4{ font-weight:normal;}
</style>

<h2>Patient Acknowledgement<br>
COVID-19 Pandemic Emergency Dental Risk</h2>
<p></p>
<p>I understand the novel coronavirus causes the disease known as COVID-19 and that it is currently a pandemic. I understand the novel coronavirus virus has a long incubation period during which carriers of the virus may not show symptoms and still be contagious. For this reason, it is recommended to stay home and avoid close contact with other people when at all possible. <table><tr><th>'.str_replace($salt,'',base64_decode($result->question1)).'</th></tr></table></p>

<p>I understand the federal and provincial governments have asked individuals to maintain social distancing of a least 2 metres (6 feet) and I recognize it is not possible to maintain this distance while receiving dental treatment. <br><table><tr><th>'.str_replace($salt,'',base64_decode($result->question2)).'</th></tr></table></p>

<p>I understand that oral surgery/dental procedures can create water and/or blood spray, which is one important way that the novel coronavirus can spread. The ultra-fine nature of the spray can linger in the air for minutes to sometimes hours, which can transmit the novel coronavirus. <table><tr><th>'.str_replace($salt,'',base64_decode($result->question3)).'</th></tr></table></p>

<p>I understand that due to the visits of other patients, the characteristics of the novel coronavirus, and the characteristics of dental procedures, that I have an elevated risk of contracting AND SPREADING the novel coronavirus simply by being in the dental office. <table><tr><th>'.str_replace($salt,'',base64_decode($result->question4)).'</th></tr></table></p>

<p>I have been made aware that the Province/Territory of <table><tr><th>'.str_replace($salt,'',base64_decode($result->question5)).'</th></tr></table> <br>has, under the
current pandemic, mandated that only emergency dental care is allowed. Dental visits must be limited to only the essential treatment of ongoing bleeding, trauma, significant infection not responding to antibiotics and pain killers, or to alleviate severe pain that does not respond to antibiotics and pain killers. I confirm that I meet one of more of these criteria. <table><tr><th>'.str_replace($salt,'',base64_decode($result->question6)).'</th></tr></table></p>

<p>I confirm and accept that emergency treatment provided may not necessarily be representative of the care that would be expected or provided under normal circumstances and will be very limited to only simple emergency care. For example, a tooth would be removed rather than a root canal of filling done in this emergency situation. <br><table><tr><th>'.str_replace($salt,'',base64_decode($result->question7)).'</th></tr></table></p>

<p>I confirm that I do NOT have any TWO OR MORE or the following symptoms of COVID-19: fever, new or worsening cough, sore throat, runny nose or headache. <table><tr><th>'.str_replace($salt,'',base64_decode($result->question8)).'</th></tr></table></p>

<p>I confirm that I have not tested positive for COVID-19. <table><tr><th>'.str_replace($salt,'',base64_decode($result->question9)).'</th></tr></table></p>

<p>I confirm that I am not waiting for the results of a test for COVID-19. <table><tr><th>'.str_replace($salt,'',base64_decode($result->question10)).'</th></tr></table></p>

<p>I  confirm  that  this  is  not  currently  a  period  where  I  required  to  self-isolate  for  14  days. <table><tr><th>'.str_replace($salt,'',base64_decode($result->question11)).'</th></tr></table></p>

<p>I verify the information I have provided on this form is truthful and accurate. I knowingly and willingly consent to have emergency surgical/dental treatment completed during the COVID-19 pandemic.</p>

<p></p>


<h4 style=" margin-top:25px;">SIGNATURE OF PATIENT <table><tr><th></th></tr></table></h4>
<h4>Date <table><tr><th></th></tr></table></h4><br><br><br><br>

';




	


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
