<?php  //include from root php's style
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/herb_internship/head.php";
include_once($path);

?>
<html>

<head>
    <title>Herb retail</title>
    <script>
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tbodyData").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "./model/model_product_getListProductTable.php", true);
        xmlhttp.send();
    </script>
    <style>
        table tbody tr:hover {
            color: green;
        }

        table tbody button:active,
        .add-to-cart:active {
            color: greenyellow;
            background-color: #35cc57 !important;
        }

        table tbody tr th:last-child {
            width: 1%;
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include($_SERVER['DOCUMENT_ROOT'] . "/herb_internship/model/model_product.php");
        $listProduct = getListProduct($pdo); //call function
        ?>
        <!-- print -->

        <div class="my-3">

            <table class="table table-striped table-bordered table-hover" id="product" data-page-length='25'>
                <thead class="thead-dark">
                    <tr>
                        <th class="align-middle text-center">รหัสสินค้า</th>
                        <th class="align-middle text-center">ชื่อ</th>
                        <th class="align-middle text-center">ประเภท</th>
                        <th class="align-middle text-center">ความแรง</th>
                        <th class="align-middle text-center">ขนาดบรรจุ</th>
                        <th class="align-middle text-center">ราคา<br><span class="text-light" style="font-size:0.75em;">(บาท)<span></th>
                        <th class="align-middle text-center">สต็อก</th>
                        <th class="align-middle text-center no-sort"><a class="btn refresh-table"><i class="fas fa-sync"></i></a></th>
                    </tr>
                </thead>

                <tbody id="tbodyData">

                </tbody>
            </table>

            <!-- ตะกร้า -->
            <div class="row mt-3">
                <div class="col">
                    <span class="cart-clickable"></span>
                    <span class="clear-cart cart-clear-clickable"></span>

                </div>
            </div>
        </div>


    </div>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/herb_internship/modalbox/cart_modal.php"); ?>
    <script src="./js/cart.js"></script>

</body>

<script>
    if (document.hasFocus()) {
        setInterval(function() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("tbodyData").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "./model/model_product_getListProductTable.php", true);
            xmlhttp.send();
        }, 5000);
    }



    $(document).ready(function() {
        var table = $('#product').DataTable({
            scrollY: 800,
            scrollCollapse: true,
            paging: false,
            info: false,
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }]

        });

        $('.refresh-table').on("click", function(event) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("tbodyData").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "./model/model_product_getListProductTable.php", true);
            xmlhttp.send();
        })

        // table.columns(1).search(this.value).draw();
        $(this).on("keypress", function(event) {
            if (event.keyCode == 32) {
                displayCart();
                $('#cart').modal('show');
            }

        });


    });



    $('.clear-cart').click(function() {
        shoppingCart.clearCart();
        displayCart();
    });
</script>