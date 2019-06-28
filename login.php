<?php  //include from root php's style
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/herb_internship/head.php";
include_once($path);

?>


<head>
    <title>เข้าสู่ระบบ</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>

    <?php if (isset($_SESSION["user_name"])) {
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        die();
    } ?>

    <form>
        <input type="text" placeholder="ชื่อผู้ใช้" name="username" id="username">
        <input type="password" placeholder="รหัสผ่าน" name="password" id="password">

        <button type="button" id="login-button">เข้าสู่ระบบ</button>
        <div id="message" class="text-center"></div>
    </form>

</body>

<script>
    $(document).ready(function() {
        $('#login-button').click(function() {
            username = document.getElementById("username").value;
            password = document.getElementById("password").value;
            // console.log(username);
            // console.log(password);

            var params = 'username=' + username + '&password=' + password;

            var xmlhttp = new XMLHttpRequest();
            var response = 0;
            xmlhttp.open("POST", "./model/model_user_checkLogin.php", true);
            xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    response = this.responseText;
                    if (response == 1) {
                        document.getElementById("message").innerHTML = "ไม่พบผู้ใช้ " + username + " โปรดลองใหม่อีกครั้ง";
                        document.getElementById("message").style.color = "red";
                    } else if (response == 2) {
                        document.getElementById("message").innerHTML = "รหัสผ่านผิด โปรดลองใหม่อีกครั้ง";
                        document.getElementById("message").style.color = "red";
                    } else if (response == 3) {
                        window.location = "index.php";
                    }
                }
            };

            xmlhttp.send(params);

        });
    });
</script>