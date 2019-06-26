<?php


require './vendor/autoload.php';

use Mike42\Escpos;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintBuffers\ImagePrintBuffer;
use Mike42\Escpos\CapabilityProfiles\DefaultCapabilityProfile;
use Mike42\Escpos\CapabilityProfiles\SimpleCapabilityProfile;

function addSpaces($string = '', $valid_string_length = 0) {
    if (strlen($string) < $valid_string_length) {
        $spaces = $valid_string_length - strlen($string);
        for ($index1 = 1; $index1 <= $spaces; $index1++) {
            $string = $string . ' ';
        }
    }

    return $string;
}

$connector = new WindowsPrintConnector("CITIZEN CT-D150");
$printer = new Printer($connector);


$printer->feed();
$printer->setPrintLeftMargin(0);
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer->setEmphasis(true);
$printer->text(addSpaces('Item', 20) . addSpaces('QtyxPrice', 20) . addSpaces('Tot(f)', 8) . "\n");
$printer->setEmphasis(false);
$items = [];
$items[] = [
    'name' => 'The name of the product 1 goes here',
    'qtyx_price' => '100.00',
    'total_price' => '100.00',
    'igst' => '14.00',
    'cgst' => '14.00',
    'mrp' => '14.00',
    'upr' => '14.00',
];
$items[] = [
    'name' => 'The name of the product 2 goes here',
    'qtyx_price' => '200.00',
    'total_price' => '200.00',
    'igst' => '14.00',
    'cgst' => '14.00',
    'mrp' => '14.00',
    'upr' => '14.00',
];

foreach ($items as $item) {

    //Current item ROW 1
    $name_lines = str_split($item['name'], 15);
    foreach ($name_lines as $k => $l) {
        $l = trim($l);
        $name_lines[$k] = addSpaces($l, 20);
    }

    $qtyx_price = str_split($item['qtyx_price'], 15);
    foreach ($qtyx_price as $k => $l) {
        $l = trim($l);
        $qtyx_price[$k] = addSpaces($l, 20);
    }

    $total_price = str_split($item['total_price'], 8);
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
        $line = '';
        if (isset($name_lines[$i])) {
            $line .= ($name_lines[$i]);
        }
        if (isset($qtyx_price[$i])) {
            $line .= ($qtyx_price[$i]);
        }
        if (isset($total_price[$i])) {
            $line .= ($total_price[$i]);
        }
        $printer->text($line . "\n");
    }

    //Current item ROW 2
    $igst_lines = str_split($item['igst'], 15);
    foreach ($igst_lines as $k => $l) {
        $l = trim($l);
        $igst_lines[$k] = addSpaces($l, 20);
    }

    $cgst_price = str_split($item['cgst'], 28);
    foreach ($cgst_price as $k => $l) {
        $l = trim($l);
        $cgst_price[$k] = addSpaces($l, 28);
    }


    $counter = 0;
    $temp = [];
    $temp[] = count($igst_lines);
    $temp[] = count($cgst_price);
    $counter = max($temp);

    for ($i = 0; $i < $counter; $i++) {
        $line = '';
        if (isset($igst_lines[$i])) {
            $line .= ($igst_lines[$i]);
        }
        if (isset($cgst_price[$i])) {
            $line .= ($cgst_price[$i]);
        }

        $printer->text($line . "\n");
    }

    //Current item ROW 3
    $mrp_lines = str_split($item['mrp'], 15);
    foreach ($mrp_lines as $k => $l) {
        $l = trim($l);
        $mrp_lines[$k] = addSpaces($l, 20);
    }

    $upr_price = str_split($item['upr'], 28);
    foreach ($upr_price as $k => $l) {
        $l = trim($l);
        $upr_price[$k] = addSpaces($l, 28);
    }


    $counter = 0;
    $temp = [];
    $temp[] = count($mrp_lines);
    $temp[] = count($upr_price);

    $counter = max($temp);

    for ($i = 0; $i < $counter; $i++) {

        $line = '';

        if (isset($mrp_lines[$i])) {
            $line .= ($mrp_lines[$i]);
        }

        if (isset($upr_price[$i])) {
            $line .= ($upr_price[$i]);
        }

        $printer->text($line . "\n");
    }
    $printer->feed();
}





$printer->cut();
$printer->pulse();
$printer->close();