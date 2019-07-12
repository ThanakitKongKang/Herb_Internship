<?php
require('pdf_js.php');

class PDF_AutoPrint extends PDF_JavaScript
{
    function AutoPrint($printer = '')
    {
        // Open the print dialog
        if ($printer) {
            $printer = str_replace('\\', '\\\\', $printer);
            $script = "var pp = getPrintParams();";
            $script .= "pp.interactive = pp.constants.interactionLevel.full;";
            $script .= "pp.printerName = '$printer'";
            $script .= "print(pp);";
        } else
            $script = 'print(true);';
        $this->IncludeJS($script);
    }
}

function bahtText(float $amount): string
{
    [$integer, $fraction] = explode('.', number_format(abs($amount), 2, '.', ''));

    $baht = convert($integer);
    $satang = convert($fraction);

    $output = $amount < 0 ? 'ลบ' : '';
    $output .= $baht ? $baht . 'บาท' : '';
    $output .= $satang ? $satang . 'สตางค์' : 'ถ้วน';

    return $baht . $satang === '' ? 'ศูนย์บาทถ้วน' : $output;
}

function convert(string $number): string
{
    $values = ['', 'หนึ่ง', 'สอง', 'สาม', 'สี่', 'ห้า', 'หก', 'เจ็ด', 'แปด', 'เก้า'];
    $places = ['', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน'];
    $exceptions = ['หนึ่งสิบ' => 'สิบ', 'สองสิบ' => 'ยี่สิบ', 'สิบหนึ่ง' => 'สิบเอ็ด'];

    $output = '';

    foreach (str_split(strrev($number)) as $place => $value) {
        if ($place % 6 === 0 && $place > 0) {
            $output = $places[6] . $output;
        }

        if ($value !== '0') {
            $output = $values[$value] . $places[$place % 6] . $output;
        }
    }

    foreach ($exceptions as $search => $replace) {
        $output = str_replace($search, $replace, $output);
    }

    return $output;
}
function addSpaces($string = '', $valid_string_length = 0)
{
    if (strlen($string) < $valid_string_length) {
        $spaces = $valid_string_length - strlen($string);
        for ($index1 = 1; $index1 <= $spaces; $index1++) {
            $string = $string . ' ';
        }
    }

    return $string;
}

// Instanciation of inherited class
$pdf = new PDF_AutoPrint('P', 'mm', array(139.7, 177.8));

// $pdf->AliasNbPages();
$pdf->AddPage();
$pdf->AddFont('THSarabunNew', 'b', 'THSarabunNew Bold.php'); //bold
$pdf->SetFont('THSarabunNew', 'b', 14);
$pdf->AddFont('THSarabunNew reg', '', 'THSarabunNew.php'); //bold

date_default_timezone_set('Asia/Bangkok');
$timezone = date_default_timezone_get();
$day = date('d', time());

if (strlen($day) == 1) {
    $dy = '0' . $day;
}
$yearDisplay = date('Y', time());
$yearDisplay += 543;
$monthDisplay = date('m', time());
$time = date("H:i:s", time());
switch ($monthDisplay) {
    case "01":
        $monthDisplay = "มกราคม";
        break;
    case "02":
        $monthDisplay = "กุมภาพันธ์";
        break;
    case "03":
        $monthDisplay = "มีนาคม";
        break;
    case "04":
        $monthDisplay = "เมษายน";
        break;
    case "05":
        $monthDisplay = "พฤษภาคม";
        break;
    case "06":
        $monthDisplay = "มิถุนายน";
        break;
    case "07":
        $monthDisplay = "กรกฎาคม";
        break;
    case "08":
        $monthDisplay = "สิงหาคม";
        break;
    case "09":
        $monthDisplay = "กันยายน";
        break;
    case "10":
        $monthDisplay = "ตุลาคม";
        break;
    case "11":
        $monthDisplay = "พฤศจิกายน";
        break;
    case "12":
        $monthDisplay = "ธันวาคม";
        break;
}
$pdf->Ln(22);
$pdf->SetMargins(3, 0);
$pdf->Cell(20, 0, iconv('UTF-8', 'TIS-620', "      " . $day), 0, 0);
$pdf->Cell(35, 0, iconv('UTF-8', 'TIS-620', "   " . $monthDisplay), 0, 0);
$pdf->Cell(35, 0, iconv('UTF-8', 'TIS-620', $yearDisplay), 0, 0);
$pdf->Cell(30, 0, iconv('UTF-8', 'TIS-620', $time), 0, 1);

// $customer_name = substr($_POST['customer_name'], 1, -1);
$customer_name = $_POST['customer_name'];

$pdf->Cell(65, 15, iconv('UTF-8', 'TIS-620', ''), 0, 0);
$pdf->Cell(30, 10, iconv('UTF-8', 'TIS-620', $customer_name), 0, 1);
$pdf->Ln(10);
$pdf->Cell(70, 5, iconv('UTF-8', 'TIS-620', ''), 0, 0);
$pdf->SetFont('THSarabunNew', 'b', 12);
$pdf->Cell(10, 5, iconv('UTF-8', 'TIS-620', "จำนวน"), 0, 0);
$pdf->Cell(10, 5, iconv('UTF-8', 'TIS-620', "ราคา"), 0, 1);
$pdf->SetFont('THSarabunNew', 'b', 14);
$pdf->Ln(4);

$cartArray = array();
$cartArray = $_POST["cartArray"];

// $cartArray = json_decode($_POST['cartArray'], true);
// print("<pre>" . print_r($cartArray, true) . "</pre>");
// product print

foreach ($cartArray as $cart) {

    $name_lines = str_split($cart['product_name'], 70);
    foreach ($name_lines as $k => $l) {
        $l = trim($l);
        $name_lines[$k] = addSpaces($l, 20);
    }

    $qtyx_price = str_split($cart['count'] . "      " . number_format((float) $cart['product_price'], 2, '.', ''), 15);
    foreach ($qtyx_price as $k => $l) {
        $l = trim($l);
        $qtyx_price[$k] = addSpaces($l, 20);
    }

    $total_price = str_split($cart['total'], 8);
    foreach ($total_price as $k => $l) {
        $l = trim($l);
        $total_price[$k] = addSpaces($l, 8);
    }

    $counter = 0;
    $temp = [];
    $temp[] = count($name_lines);
    $temp[] = count($qtyx_price);
    $temp[] = count($total_price);
    $counter = max($temp);

    for ($i = 0; $i < $counter; $i++) {
        $localname = '';
        $localqtp = '';
        $localtt = '';

        $pdf->Cell(10, 5, iconv('UTF-8', 'TIS-620', ""), 0, 0);
        if (isset($name_lines[$i])) {
            $localname .= ($name_lines[$i]);
        }
        if (isset($qtyx_price[$i])) {
            $localqtp .= ($qtyx_price[$i]);
        }
        if (isset($total_price[$i])) {
            $localtt .= ($total_price[$i]);
        }
        $pdf->SetFont('THSarabunNew reg', '', 12);
        $pdf->Cell(63.5, 4, iconv('UTF-8', 'TIS-620', $localname), 0, 0);
        $pdf->Cell(20, 4, iconv('UTF-8', 'TIS-620', $localqtp), 0, 0);
        $pdf->Cell(10, 4, iconv('UTF-8', 'TIS-620', $localtt), 0, 1);
    }
}


$pdf->SetY(-55);
$pdf->SetFont('THSarabunNew', 'b', 16);
$pdf->Cell(92, 5, iconv('UTF-8', 'TIS-620', ""), 0, 0);
$total_number = number_format($_POST['total'], 2);
$pdf->Cell(10, 10, iconv('UTF-8', 'TIS-620', $total_number), 0, 1);
$pdf->Cell(60, 5, iconv('UTF-8', 'TIS-620', ""), 0, 0);
$pdf->Cell(10, 10, iconv('UTF-8', 'TIS-620', "=" . bahtText($_POST['total'])) . "=", 0, 1);

$pdf->setAutoPageBreak(false);
$pdf->SetFont('THSarabunNew', 'b', 12);
$pdf->SetY(-20);
$pdf->Cell(90, 0, iconv('UTF-8', 'TIS-620', ""), 0, 0);

// $user = substr($_POST['user'], 1, -1);
$user = $_POST['user'];

$pdf->Cell(10, 0, iconv('UTF-8', 'TIS-620', "(" . $user . ")"), 0, 1);

$pdf->AutoPrint();
// $last_order_id = substr($_POST['last_order_id'], 1, -1);
$last_order_id = $_POST['last_order_id'];

// $path = $_SERVER['DOCUMENT_ROOT'] . "/invoice_files/invoice_id_" . $last_order_id . ".pdf";
// $pdf->Output('F', $path, true);

$pdf->Output('F', '../../../../invoice_files/invoice_id_' . $last_order_id . '.pdf', true);