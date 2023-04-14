<?php
require_once __DIR__ . '/vendor/autoload.php';
 
use Mpdf;

$mpdf = new Mpdf();
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output();