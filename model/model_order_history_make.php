<?php
include "connect.php";
date_default_timezone_set('Asia/Bangkok');
$timezone = date_default_timezone_get();
echo "The current server timezone is: " . $timezone;
$date = date('Y/m/d h:i:s', time());
echo "<br>The current time is: " . $date;

$make_order = $pdo->prepare("INSERT INTO order_history VALUES ( NULL, ?) ");
$make_order->bindParam(1, $date);
$make_order->execute();
