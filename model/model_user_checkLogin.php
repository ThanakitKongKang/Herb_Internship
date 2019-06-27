<?php
include "connect.php";

$checkUsername = $pdo->prepare("SELECT * FROM user_info WHERE user = ?");
$checkUsername->bindParam(1, $_POST["username"]);
$checkUsername->execute();
$rowUsername = $checkUsername->fetch();
//เช็คว่ามีบัญชีไหม
if ($checkUsername->rowCount() > 0) {
    $login = $pdo->prepare("SELECT * FROM user_info WHERE user = ? AND  user_password = ?");
    $login->bindParam(1, $_POST["username"]);
    $login->bindParam(2, $_POST["password"]);
    $login->execute();
    $rowUser = $login->fetch();
    // หาก username และ password ตรงกัน จะมีข้อมูลในตัวแปร $row

    if (!empty($rowUser[0])) {
        // นำข้อมูลผู้ใช้จากฐานข้อมูลเขียนลง session 2 ค่า
        $_SESSION["user"] = $rowUser["user"];
        $_SESSION["user_name"] = $rowUser["user_name"];
        echo "3";
    }
    else{
        echo "2";
    }
} else {
    echo "1";
}
