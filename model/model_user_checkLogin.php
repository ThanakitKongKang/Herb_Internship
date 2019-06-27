<?php
include "connectHOS.php";
$checkUsername = $pdo->prepare("SELECT * FROM user_info WHERE username = ?");
$checkUsername->bindParam(1, $_POST["username"]);
$checkUsername->execute();
$rowUsername = $checkUsername->fetch();
//เช็คว่ามีบัญชีไหม
if ($checkUsername->rowCount() > 0) {
    $login = $pdo->prepare("SELECT * FROM user_info LEFT JOIN user_role ON user_info.UID = user_role.UID WHERE username = ? AND password = ?");
    $login->bindParam(1, $_POST["username"]);
    $login->bindParam(2, $_POST["password"]);
    $login->execute();
    $rowUser = $login->fetch();
    // หาก username และ password ตรงกัน จะมีข้อมูลในตัวแปร $row

    if (!empty($rowUser[0])) {
        // นำข้อมูลผู้ใช้จากฐานข้อมูลเขียนลง session 2 ค่า
        $_SESSION["UID"] = $rowUser["UID"];
        $_SESSION["username"] = $rowUser["username"];
        $_SESSION["firstName"] = $rowUser["firstName"];
        $_SESSION["lastName"] = $rowUser["lastName"];
        $_SESSION["stdId"] = $rowUser["stdId"];
        $_SESSION["email"] = $rowUser["email"];
        $_SESSION["role"] = $rowUser["role"];
        echo "3";
    }
    else{
        echo "2";
    }
} else {
    echo "1";
}
