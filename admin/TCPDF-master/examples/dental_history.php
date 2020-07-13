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
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 061');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

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
$query_device = "select * from `dental_history_form` where appointment_id=:appointment_id";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("appointment_id"=>$_REQUEST['id']));
    $result = $statement_device->fetch();


$html = '
<h1>Patient Dental History Form</h1>';

$html .="<p>How would you rate the condition of your mouth? Excellent, Good, Fair,Poor?</p>";
$html .= '--'.$result->question1;
$html .="<p>Date of most recent dentalexam?</p>";
$html .= '--'.$result->question2;
$html .="<p>  Date of most recentx-rays?</p>";
$html .= '--'.$result->question3;
$html .="<p>Date of most recent treatment (other thancleaning)?</p>";
$html .= '--'.$result->question4;
$html .="<p>  I routinely see my dentist every: 3mos, 4mos, 6mos, 9mos,12mos,not routinely?</p>";
$html .= '--'.$result->question5;
$html .="<p>What is your immediateconcern?</p>";
$html .= '--'.$result->question6;
$html .="<p>Are you fearful of dentaltreatment?</p>";
$html .= '--'.$result->question7;
$html .="<p>Has there been any changes in your health, such as illness, hospitalizations or new allergies ? if yes, please specify</p>";
$html .= '--'.$result->question8;
$html .="<p>  Are you taking any new medications* If yes, please specify.</p>";
$html .= '--'.$result->question9;
$html .="<p> Current medications</p>";
$html .= '--'.$result->question10;
$html .="<p>  Have youhadaheartmurmurdiagnosedorhadanychangeinanexistingcardiacprobIemormurmur?Ifyes, pleasespecify.</p>";
$html .= '--'.$result->question11;
$html .="<p> For WOMEN only:Are you breast-feeding or pregnant? Ifpregnant,what is the expected date</p>";
$html .= '--'.$result->question12;
$html .="<p>    Are there any medical conditions that we should be aware of?</p>";
$html .= '--'.$result->question13;
$html .="<p> Have you ever experienced gum recession?</p>";
$html .= '--'.$result->question14;
$html .="<p>Have you experienceda burning sensation in your mouth?</p>";
$html .= '--'.$result->question15;
$html .="<p>Does the amount of saliva in your mouth seem too Little or do you have difficulty swallowing any food?</p>";
$html .= '--'.$result->question16;
$html .="<p>Are any teeth sensitive to hot,cold,biting,sweets,or avoid brushing any part of your mouth?</p>";
$html .= '--'.$result->question17;
$html .="<p>Have you ever broken teeth,chippedteeth,orhada tooth acheor cracked filling?</p>";
$html .= '--'.$result->question18;
$html .="<p>  Do you have problems with your jaw joint?(pain,sounds,limitedopening, ocking, ppping)?</p>";
$html .= '--'.$result->question19;
$html .="<p>Do you avoid or have difficulty chewing gum,carrots,nuts,bagels,baguettes,proteinbars,orotherhard, dryfoods?</p>";
$html .= '--'.$result->question20;


	


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
