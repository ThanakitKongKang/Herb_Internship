<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>print <?=$title_credit?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel="icon" href="_etc/herb.ico">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="./css/bootstrap.min.css"> -->
    <script type="text/javascript" src="./js/jquery-3.4.1.slim.min.js"></script>
    <script type="text/javascript" src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/tether.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="./css/all.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

    <style>
        #content{
            position:absolute;
            /* top:5rem; */
            left:10%;
        }
        h1{
            font-size:1.5em;
        }
        h3{
            font-size:1em;
        }
        td{
            text-align: center;
        }
        table{
            font-size:0.85em;
            position:relative;
            left:25%;
        }
    </style>
</head>

<body onload="loadContent()">
    <div class="container">
        <div id="content">

        </div>

    </div>


    <script>
        function loadContent() {
            var item = localStorage.getItem("content");
            $('#content').html(item);
            // console.log(item);
            window.print();
            window.onfocus=function(){ window.close();}
        }
    </script>
</body>

</html>