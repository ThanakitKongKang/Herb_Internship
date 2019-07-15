<?php
include "connect.php";
$cancel = $pdo->prepare("UPDATE order_history SET status = 'cancelled' WHERE order_id = ?");
$cancel->bindParam(1, $_POST['ord']);
$cancel->execute();
