<?php include "./model/connect.php";
session_start(); ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>หน้าหลัก</title>

    <!-- bootstrap -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" media="screen" href="./css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <!-- js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>    
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script> -->
    <script src="./js/bootstrap.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    
    <!-- datatables -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/fh-3.1.4/kt-2.5.0/r-2.2.2/sc-2.0.0/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" /> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />

    <!-- alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <style>
        body {
            font-family: 'Kanit', sans-serif;
        }
    </style>

</head>

<body>
    <?php include('header.php'); ?>
    <div class="container">
        <?php
        include($_SERVER['DOCUMENT_ROOT'] . "/herb_internship/model/model_product.php");
        $listProduct = getListProduct($pdo); //call function
        ?>
        <!-- print -->

        <div class="my-3">

            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart">Cart (<span class="total-count"></span>)</button>
                    <button class="clear-cart btn btn-danger">Clear Cart</button></div>
            </div>

            <table class="table table-striped table-bordered" id="product" data-page-length='25'>
                <?php
                $i = 0;
                while ($rowListProduct = $listProduct->fetch()) {
                    // echo ("<pre>" . print_r($rowListProduct, true) . "</pre>");
                    if ($i == 0) {
                        echo ' 
                <thead>
                <tr>
                <th class="align-middle text-center" rowspan="2">รหัสสินค้า</th>
                <th class="align-middle text-center" rowspan="2">ชื่อ</th>
                <th class="align-middle text-center" rowspan="2">ประเภท</th>
                <th class="align-middle text-center" rowspan="2">ความแรง</th>
                <th class="align-middle text-center" rowspan="2">ขนาดบรรจุ</th>
                <th class="align-middle text-center" colspan="3">ราคา</th>
                <th class="align-middle text-center" rowspan="2">สต็อก</th>
                <th class="align-middle text-center" rowspan="2"></th>
                
                </tr>
                <tr>
                    <th class="align-middle text-center" ><span class="text-secondary" style="font-size:0.75em;">ทุน<span></th>
                    <th class="align-middle text-center"><span class="text-secondary" style="font-size:0.75em;">ขายปลีก<span></th>
                    <th class="align-middle text-center" style="border-right:1px solid #dee2e6;"><span class="text-secondary" style="font-size:0.75em;">ยอด 5,000 ขึ้น<span></th>
                   
                </tr>
                </thead><tbody>';
                    }
                    echo '<tr>
            <td class="text-center">' . $rowListProduct['product_id'] . '</td>
            <td>' . $rowListProduct['product_name'] . '</td>
            <td class="text-center">' . $rowListProduct['product_type'] . '</td>
            <td>' . $rowListProduct['product_potent'] . '</td>
            <td>' . $rowListProduct['product_amount'] . '</td>
            <td class="text-center">' . $rowListProduct['product_cost'] . '</td>
            <td class="text-center">' . $rowListProduct['product_price'] . '</td>
            <td class="text-center">' . $rowListProduct['product_price_discount'] . '</td>
            <td>' . $rowListProduct['product_stock'] . '</td>
            <td>
                <a href="#" class="add-to-cart btn btn-success text-white" title="เพิ่มลงตะกร้า" 
                data-product_id="' . $rowListProduct['product_id'] . '"
                data-product_name="' . $rowListProduct['product_name'] . '"
                data-product_type="' . $rowListProduct['product_type'] . '"
                data-product_potent="' . $rowListProduct['product_potent'] . '"
                data-product_amount="' . $rowListProduct['product_amount'] . '"
                data-product_cost="' . $rowListProduct['product_cost'] . '"
                data-product_price="' . $rowListProduct['product_price'] . '"
                data-product_price_discount="' . $rowListProduct['product_price_discount'] . '"
                data-product_stock="' . $rowListProduct['product_stock'] . '">
                <i class="fas fa-plus"></i></a></td>
            </tr>';
                    $i++;
                }

                ?>
                </tbody>
            </table>
        </div>


    </div>

    <script src="./js/cart.js"></script>

</body>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/herb_internship/modalbox/cart_modal.php"); ?>
<script>
    $(document).ready(function() {
        var table = $('#product').DataTable({
            scrollY: 800,
            scrollCollapse: true,
            paging: false
        });
        $('#product tbody').on('click', 'tr', function() {
            // $(this).toggleClass('selected');
            // alert(table.rows('.selected').data());
        });
    });
</script>

</html>