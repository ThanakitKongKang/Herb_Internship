<?php
include "connect.php";
date_default_timezone_set('Asia/Bangkok');
$timezone = date_default_timezone_get();
echo "The current server timezone is: " . $timezone;
$date = date('Y/m/d H:i:s', time());
echo "<br>The current time is: " . $date;
$status = 'uncancelled';

$make_order = $pdo->prepare("INSERT INTO order_history VALUES ( NULL, ?, ?, ?, ?) ");
$make_order->bindParam(1, $date);
$make_order->bindParam(2, $_POST['book_id']);
$make_order->bindParam(3, $_POST['iv_id']);
$make_order->bindParam(4, $status);
$make_order->execute();

echo '<pre>' . $_POST['book_id'] . '</pre>';
echo '<pre>' . $_POST['iv_id'] . '</pre>';
