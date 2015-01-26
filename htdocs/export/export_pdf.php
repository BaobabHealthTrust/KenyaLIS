<?php
include("../includes/db_lib.php");
putUILog('export_pdf', 'X', basename($_SERVER['REQUEST_URI'], ".php"), 'X', 'X', 'X');
//getting new instance 
$pdfFile = PDF_new(); 

$PDFFilePath = "blisreport".$date.".pdf";
if (!PDF_open_file($pdfFile, $PDFFilePath)){
	die('Error: '.PDF_get_errmsg($pdfFile));
    /*print error;
    exit;*/
};
//document info 
PDF_set_info($pdfFile, "Auther", "Ahmed Elbshry"); 
PDF_set_info($pdfFile, "Creator", "Ahmed Elbshry"); 
PDF_set_info($pdfFile, "Title", "PDFlib"); 
PDF_set_info($pdfFile, "Subject", "Using PDFlib"); 

//starting our page and define the width and highet of the document 
PDF_begin_page($pdfFile, 595, 842); 

//check if Arial font is found, or exit 
$fontdir = "C:\\WINDOWS\\Fonts"; 
PDF_set_parameter($pdfFile, "FontOutline", "DefArial=$fontdir\\arial.ttf");
if($font = PDF_findfont($pdfFile, "DefArial", "winansi", 1)) { 
    PDF_setfont($pdfFile, $font, 12); 
} else { 
    echo ("Font Not Found!"); 
    PDF_end_page($pdfFile); 
    PDF_close($pdfFile); 
    //PDF_delete($pdfFile); 
    exit(); 
} 

//start writing from the point 50,780 
PDF_show_xy($pdfFile, "This Text In Arial Font", 50, 780); 
PDF_end_page($pdfFile);
PDF_close($pdfFile); 
var_dump($pdfFile); die;

//store the pdf document in $pdf 
if (!PDF_get_buffer($pdfFile)) die(PDF_get_errmsg);
$pdf = PDF_get_buffer($pdfFile); 
//get  the len to tell the browser about it 
$pdflen = strlen($pdf); 
die('Stopped here '.$pdflen);

//telling the browser about the pdf document 
header("Content-type: application/pdf"); 
header("Content-length: $pdflen"); 
//header("Content-Disposition: inline; filename=phpMade.pdf"); 
header("Content-Disposition: inline; filename=".$PDFFilePath); 
//output the document 
print($pdf); 
//delete the object 
PDF_close($pdfFile);
?>