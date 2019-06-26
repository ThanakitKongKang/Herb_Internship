<?php
declare (strict_types = 1);
/* Change to the correct path if you copy this example! */
require __DIR__ . '/../../autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

/**
 * Install the printer using USB printing support, and the "Generic / Text Only" driver,
 * then share it (you can use a firewall so that it can only be seen locally).
 *
 * Use a WindowsPrintConnector with the share name to print.
 *
 * Troubleshooting: Fire up a command prompt, and ensure that (if your printer is shared as
 * "Receipt Printer), the following commands work:
 *
 *  echo "Hello World" > testfile
 *  copy testfile "\\%COMPUTERNAME%\Receipt Printer"
 *  del testfile
 */
try {
    //header here
    echo "<h3 style='text-align:center;'>CP ALL,สาขา ปตท. อรรณนพพรเมืองพล(13192)</h3>";
    echo "<h4 style='text-align:center;'>ใบเสร็จรับเงิน/ใบกำกับภาษีอย่างย่อ</h4>";

    echo "<table style='width:100%'><tbody>";
    //how array printed in php
    $i=0;
    foreach ($_POST['cartArray'] as $cart) {
        echo "<tr>";
        echo "<td style='text-align:left;'>" . $cart['count'] . "</td>";
        echo "<td style='text-align:left;'>" . $cart['product_name'] . "</td>";
        echo "<td style='text-align:right'>" . $cart['product_price'] . "</td>";
        // echo $cart['product_id'], '<br>';
        // echo $cart['product_name'], '<br>';
        // echo $cart['product_type'], '<br>';
        // echo $cart['product_potent'], '<br>';
        // echo $cart['product_amount'], '<br>';
        // echo $cart['product_price'], '<br>';
        // echo $cart['count'], '<br>';
        // echo $cart['total'], '<br>';
        echo "</tr>";
        $i+=$cart['count'];
    }
    echo "</tbody></table>";

    echo "<h4>ยอดสุทธิ ".$i." ชิ้น</h4>";

    //test get post data
    // print("<pre>".print_r($_POST['cartArray'],true)."</pre>");
    echo "<table style='width:30%'>";
    echo "<tr><td>ยอดรวม</td><td>" . $_POST['total'] . "</td><td>บาท<td></tr>";
    echo "<tr><td>รับมา</td><td>" . $_POST['total_receive'] . "</td><td>บาท<td></tr>";
    echo "<tr><td>เงินทอน</td><td>" . $_POST['change'] . "</td><td>บาท<td></tr>";
    echo "</table>";


    // Enter the share name for your USB printer here
    // $connector = null;
    // $connector = new WindowsPrintConnector("Kyocera ECOSYS P2040dn");

    /* Print a "Hello world" receipt" */
    // $printer = new Printer($connector);
    // $printer -> text("Hello World!\n");
    // $printer -> cut();

    /* Close printer */
    // $printer -> close();
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e->getMessage() . "\n";
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

// echo "<pre>".bahtText(0)."</pre>";
// echo "<pre>".bahtText(11)."</pre>";
// echo "<pre>".bahtText(0.5)."</pre>";
// echo "<pre>".bahtText(1270851.375291)."</pre>";
// echo "<pre>".bahtText(-185409.12)."</pre>";





// require './vendor/autoload.php';

// use Mike42\Escpos;
// use Mike42\Escpos\Printer;
// use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
// use Mike42\Escpos\PrintConnectors\FilePrintConnector;
// use Mike42\Escpos\PrintBuffers\ImagePrintBuffer;
// use Mike42\Escpos\CapabilityProfiles\DefaultCapabilityProfile;
// use Mike42\Escpos\CapabilityProfiles\SimpleCapabilityProfile;

// function addSpaces($string = '', $valid_string_length = 0) {
//     if (strlen($string) < $valid_string_length) {
//         $spaces = $valid_string_length - strlen($string);
//         for ($index1 = 1; $index1 <= $spaces; $index1++) {
//             $string = $string . ' ';
//         }
//     }

//     return $string;
// }

// $connector = new WindowsPrintConnector("CITIZEN CT-D150");
// $printer = new Printer($connector);


// $printer->feed();
// $printer->setPrintLeftMargin(0);
// $printer->setJustification(Printer::JUSTIFY_LEFT);
// $printer->setEmphasis(true);
// $printer->text(addSpaces('Item', 20) . addSpaces('QtyxPrice', 20) . addSpaces('Tot(f)', 8) . "\n");
// $printer->setEmphasis(false);
// $items = [];
// $items[] = [
//     'name' => 'The name of the product 1 goes here',
//     'qtyx_price' => '100.00',
//     'total_price' => '100.00',
//     'igst' => '14.00',
//     'cgst' => '14.00',
//     'mrp' => '14.00',
//     'upr' => '14.00',
// ];
// $items[] = [
//     'name' => 'The name of the product 2 goes here',
//     'qtyx_price' => '200.00',
//     'total_price' => '200.00',
//     'igst' => '14.00',
//     'cgst' => '14.00',
//     'mrp' => '14.00',
//     'upr' => '14.00',
// ];

// foreach ($items as $item) {

//     //Current item ROW 1
//     $name_lines = str_split($item['name'], 15);
//     foreach ($name_lines as $k => $l) {
//         $l = trim($l);
//         $name_lines[$k] = addSpaces($l, 20);
//     }

//     $qtyx_price = str_split($item['qtyx_price'], 15);
//     foreach ($qtyx_price as $k => $l) {
//         $l = trim($l);
//         $qtyx_price[$k] = addSpaces($l, 20);
//     }

//     $total_price = str_split($item['total_price'], 8);
//     foreach ($total_price as $k => $l) {
//         $l = trim($l);
//         $total_price[$k] = addSpaces($l, 8);
//     }

//     $counter = 0;
//     $temp = [];
//     $temp[] = count($name_lines);
//     $temp[] = count($qtyx_price);
//     $temp[] = count($total_price);
//     $counter = max($temp);

//     for ($i = 0; $i < $counter; $i++) {
//         $line = '';
//         if (isset($name_lines[$i])) {
//             $line .= ($name_lines[$i]);
//         }
//         if (isset($qtyx_price[$i])) {
//             $line .= ($qtyx_price[$i]);
//         }
//         if (isset($total_price[$i])) {
//             $line .= ($total_price[$i]);
//         }
//         $printer->text($line . "\n");
//     }

//     //Current item ROW 2
//     $igst_lines = str_split($item['igst'], 15);
//     foreach ($igst_lines as $k => $l) {
//         $l = trim($l);
//         $igst_lines[$k] = addSpaces($l, 20);
//     }

//     $cgst_price = str_split($item['cgst'], 28);
//     foreach ($cgst_price as $k => $l) {
//         $l = trim($l);
//         $cgst_price[$k] = addSpaces($l, 28);
//     }


//     $counter = 0;
//     $temp = [];
//     $temp[] = count($igst_lines);
//     $temp[] = count($cgst_price);
//     $counter = max($temp);

//     for ($i = 0; $i < $counter; $i++) {
//         $line = '';
//         if (isset($igst_lines[$i])) {
//             $line .= ($igst_lines[$i]);
//         }
//         if (isset($cgst_price[$i])) {
//             $line .= ($cgst_price[$i]);
//         }

//         $printer->text($line . "\n");
//     }

//     //Current item ROW 3
//     $mrp_lines = str_split($item['mrp'], 15);
//     foreach ($mrp_lines as $k => $l) {
//         $l = trim($l);
//         $mrp_lines[$k] = addSpaces($l, 20);
//     }

//     $upr_price = str_split($item['upr'], 28);
//     foreach ($upr_price as $k => $l) {
//         $l = trim($l);
//         $upr_price[$k] = addSpaces($l, 28);
//     }


//     $counter = 0;
//     $temp = [];
//     $temp[] = count($mrp_lines);
//     $temp[] = count($upr_price);

//     $counter = max($temp);

//     for ($i = 0; $i < $counter; $i++) {

//         $line = '';

//         if (isset($mrp_lines[$i])) {
//             $line .= ($mrp_lines[$i]);
//         }

//         if (isset($upr_price[$i])) {
//             $line .= ($upr_price[$i]);
//         }

//         $printer->text($line . "\n");
//     }
//     $printer->feed();
// }





// $printer->cut();
// $printer->pulse();
// $printer->close();
// `