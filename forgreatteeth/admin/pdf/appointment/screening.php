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
$pdf->SetTitle('Patient Screening Form');
$pdf->SetSubject('Patient Screening Form');
$pdf->SetKeywords('Patient Screening Form, PDF, Patient Screening Form, Patient Screening Form, Patient Screening Form');

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
$query_device = "select * from `dental1_patient_screening_form` where appointment_id=:appointment_id order by id desc limit 0,1";

        $statement_device = $pdo->prepare($query_device);

        $statement_device->execute(array("appointment_id"=>$_REQUEST['id']));
    $result = $statement_device->fetch();


$html = '<style>
    @import url("https://fonts.googleapis.com/css?family=Montserrat:100,300,400,500,600,700&display=swap");
    body {font-family: "Open Sans", sans-serif;font-weight: normal;padding: 0;margin: 0;font-size: 16px; background: #fff; scroll-behavior: smooth; color: #0c0c0c; }
    table {
  border-spacing: 0;
  border-collapse: collapse;
}
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
.formSectionPdf .tableSec tr th{padding: 8px 10px; text-align: left;}
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
h2{ font-size:24px; display:block;}
 span{ color:red; display:table; text-decoration:underline; text-underline-position: under; min-width:250px;}
 table{ border:none; }
 th{ width:150px; border-bottom:1px solid #000;}
 h4{ font-weight:normal;}

    </style><div class="formSectionPdf">
        <h2 style="text-align: right;">Patient Screening Form </h2>
        
       
            <p>Use this form to screen patients before their appointment and when they arrive for their appointment.</p>
                <p><label style="width:120px;">Staff screener: <table><tr><th style="width:550px;">'.$result->staff.'</th></tr></table></label></p>
                
            <table width="100%">
                <tr>
                    <td><label>Patient Name: <table><tr><th style="width:230px;">'.$result->name.'</th></tr></table></label></td>
                    <td><label>Patient age: <table><tr><th style="width:230px;">'.$result->age.'</th></tr></table></label></td>
                </tr>
            </table>
            
            <table width="100%">
                <tr>
                    <td><label>Who answered: <table><tr><th style="width:100px;">';
                 if($result->answered=='Patient')
                    {
                        $html .='</th></tr></table></label></td>
                    <td><label>Patient <table><tr><th style="width:100px;">';
                    }
                    else
                    {
                            $html .='</th></tr></table></label></td>
                    <td><label>Other (specify) <table><tr><th style="width:100px;">';
                    }
               
           $html .=' </th></tr></table></label></td>
                </tr>
            </table>
            
            <table width="100%">
                <tr>
                    <td>Contact Method:</td>
                    <td><label>Phone <table><tr><th style="width:100px;">'.$result->phone.'</th></tr></table></label></td>
                    <td><label>Email <table><tr><th style="width:100px;">'.$result->email.'</th></tr></table></label></td>
                    <td><label>Other <table><tr><th style="width:100px;">'.$result->other.'</th></tr></table></label></td>
                </tr>
            </table>
            
            
            
            <p>Identify yourself and explain the purpose of the call, which is to determine whether there are any special considerations for their dental appointment. Have the patient answer the following questions. </p>
            <table width="100%" class="tableSec" width="100%" border="0">
                <tr>
                    <th width="70%">Screening Questions</th>
                    <th width="15%">Pre-Screen</th>
                    <th width="15%">In-Office</th>
                </tr>
                <tr>
                    <td>
                        <p>Do you have a fever or have felt hot or feverish anytime in the last two weeks?</p>
                        <div class="tableInrForm">
                            <span class="tableText">Patient temperature at appointment:</span>
                            <span class="customSect1" style="width:100px; border-bottom:1px solid #000;"></span>
                            <span class="tableText">If elevated, provide mask to patient.</span>
                        </div>
                    </td>
                    <td>
                    <table width="100%">
                        <tr>
                    
                    ';
                    if($result->question1=='Yes')
                    {
                        $html .='<td class="csfild"><u>YES</u></td>
                        <td class="csfild">NO</td>';
                    }
                    else
                    {
                            $html .='<td class="csfild">YES</td>
                        <td class="csfild"><u>NO</u></td>';
                    }
                       
                   $html .=' 
                   </tr>
                   </table>
                   </td>
                    <td>
                    <table width="100%">
                        <tr>
                        <td class="csfild">YES</td>
                        <td class="csfild">NO</td>
                        </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><p>Do you have any of these symptoms: Dry cough? Shortness of breath? Difficulty breathing? Sore throat? Runny nose?</p></td>
                    <td>
                    <table width="100%">
                    <tr>
                       ';
                    if($result->question2=='Yes')
                    {
                        $html .='<td class="csfild"><u>YES</u></td>
                        <td class="csfild">NO</td>';
                    }
                    else
                    {
                            $html .='<td class="csfild">YES</td>
                        <td class="csfild"><u>NO</u></td>';
                    }
                       
                   $html .='
                   </tr>
                   </table>
                    </td>
                    <td>
                        <table width="100%">
                        <tr>
                        <td class="csfild">YES</td>
                        <td class="csfild">NO</td>
                        </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><p>Have you experienced a recent loss of smell or taste?</p></td>
                    <td>
                    <table width="100%">
                    <tr>
                       ';
                    if($result->question3=='Yes')
                    {
                        $html .='<td class="csfild"><u>YES</u></td>
                        <td class="csfild">NO</td>';
                    }
                    else
                    {
                            $html .='<td class="csfild">YES</td>
                        <td class="csfild"><u>NO</u></td>';
                    }
                       
                   $html .='
                   </tr>
                   </table>
                    </td>
                    <td>
                        <table width="100%">
                        <tr>
                        <td class="csfild">YES</td>
                        <td class="csfild">NO</td>
                        </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><p>Have you been in contact with any confirmed COVID-19 positive patients, or persons self-isolating because of a determined risk for COVID-19?</p></td>
                    <td>
                    <table width="100%">
                    <tr>
                        ';
                    if($result->question4=='Yes')
                    {
                        $html .='<td class="csfild"><u>YES</u></td>
                        <td class="csfild">NO</td>';
                    }
                    else
                    {
                            $html .='<td class="csfild">YES</td>
                        <td class="csfild"><u>NO</u></td>';
                    }
                       
                   $html .='
                   </tr>
                   </table>
                    </td>
                    <td>
                        <table width="100%">
                        <tr>
                        <td class="csfild">YES</td>
                        <td class="csfild">NO</td>
                        </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><p>Have you returned from travel outside of Canada in the last 14 days?</p></td>
                    <td>
                    <table width="100%">
                    <tr>
                        ';
                    if($result->question5=='Yes')
                    {
                        $html .='<td class="csfild"><u>YES</u></td>
                        <td class="csfild">NO</td>';
                    }
                    else
                    {
                            $html .='<td class="csfild">YES</td>
                        <td class="csfild"><u>NO</u></td>';
                    }
                       
                   $html .='
                   </tr>
                   </table>
                    </td>
                    <td>
                        <table width="100%">
                        <tr>
                        <td class="csfild">YES</td>
                        <td class="csfild">NO</td>
                        </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><p>Have you returned from travel within Canada from a location known affected with COVID-19?</p></td>
                    <td>
                    <table width="100%">
                    <tr>
                        ';
                    if($result->question6=='Yes')
                    {
                        $html .='<td class="csfild"><u>YES</u></td>
                        <td class="csfild">NO</td>';
                    }
                    else
                    {
                            $html .='<td class="csfild">YES</td>
                        <td class="csfild"><u>NO</u></td>';
                    }
                       
                   $html .='
                   </tr>
                   </table>
                    </td>
                    <td>
                        <table width="100%">
                        <tr>
                        <td class="csfild">YES</td>
                        <td class="csfild">NO</td>
                        </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><p>Are you over the age of 60?</p></td>
                    <td>
                    <table width="100%">
                    <tr>
                        ';
                    if($result->question7=='Yes')
                    {
                        $html .='<td class="csfild"><u>YES</u></td>
                        <td class="csfild">NO</td>';
                    }
                    else
                    {
                            $html .='<td class="csfild">YES</td>
                        <td class="csfild"><u>NO</u></td>';
                    }
                       
                   $html .='
                   </tr>
                   </table>
                    </td>
                    <td>
                        <table width="100%">
                        <tr>
                        <td class="csfild">YES</td>
                        <td class="csfild">NO</td>
                        </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><p>Do you have any of the following? Heart disease, lung disease, kidney disease, diabetes or any auto-immune disorder?</p></td>
                    <td>
                    <table width="100%">
                    <tr>
                       ';
                    if($result->question8=='Yes')
                    {
                        $html .='<td class="csfild"><u>YES</u></td>
                        <td class="csfild">NO</td>';
                    }
                    else
                    {
                            $html .='<td class="csfild">YES</td>
                        <td class="csfild"><u>NO</u></td>';
                    }
                       
                   $html .='
                   </tr>
                   </table>
                    </td>
                    <td>
                        <table width="100%">
                        <tr>
                        <td class="csfild">YES</td>
                        <td class="csfild">NO</td>
                        </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <div class="footerText">
                <ul>
                    <li>Any "yes" response must be discussed with the managing dentist immediately.</li>
                    <li>
                        Tell the patient when they arrive at the office, they will be asked to: 
                        <ul>
                            <li>Sanitize their hands.</li>
                            <li>Answer the questions again.</li>
                            <li>Have their temperature taken.</li>
                            <li>Complete a form acknowledging the risk of COVID-19.</li>
                        </ul>
                    </li>
                    <li>
                        Advise the patient:
                        <ul>
                            <li>Only patients are allowed to come to the office.</li>
                            <li>If possible, to wait in their car until their appointment, call the office when they arrive</li>
                        </ul>
                    </li>
                </ul>
            </div>
       
    </div>

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
