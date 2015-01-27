<?php

ini_set('memory_limit', '256M');
$_REQUEST['data'] = str_replace('class="print_entry_border draggable"', 'class="print_entry_border draggable" border="1"', $_REQUEST['data']);
$_REQUEST['data'] = str_replace('class="print_entry_border"', 'class="print_entry_border" border="1"', $_REQUEST['data']);
//echo($_REQUEST['data']); die;

require_once("../mpdf/mpdf.php");

$mpdf = new mPDF('','', 0, '', 10, 15, 16, 16, 9, 9, 'L');

$mpdf->WriteHTML($_REQUEST['data']);
$mpdf->Output();

?>