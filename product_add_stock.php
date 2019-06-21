<?php  //include from root php's style
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/herb_internship/head.php";
include_once($path);

?>

<head>
    <title>เพิ่มสินค้าลงสต็อก</title>
    <style>
        table tbody tr:hover {
            color: #008397 !important;
        }

        table tbody button:active,
        .add-to-cart:active {
            color: #008397;
            background-color: #86cfda !important;
        }

        table tbody tr th {
            width: 1%;
            white-space: nowrap;
        }

        table td {
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include($_SERVER['DOCUMENT_ROOT'] . "/herb_internship/model/model_product.php");
        $listProduct = getListProduct($pdo,"product_add_stock"); //call function
        ?>
        <!-- print -->
        <div class="my-3">
            <table class="table table-light table-striped table-responsive table-bordered table-hover" id="product" data-page-length='25'>

                <thead class="table-info">
                    <tr>

                        <th class="align-middle text-center">รหัสสินค้า</th>
                        <th class="align-middle text-center">ชื่อ</th>
                        <th class="align-middle text-center">ประเภท</th>
                        <th class="align-middle text-center">ความแรง</th>
                        <th class="align-middle text-center">ขนาดบรรจุ</th>
                        <th class="align-middle text-center">ราคา<br>
                            <!-- <span class="text-light" style="font-size:0.75em;">(บาท)<span> -->
                        </th>
                        <th class="align-middle text-center">สต็อก</th>
                        <th class="align-middle text-center no-sort"><a class="btn refresh-table" href="#"><i class="fas fa-sync" id="refresh-a"></i></a></th>
                    </tr>
                </thead>

                <tbody id="tbodyData">
                    <?php
                    while ($rowListProduct = $listProduct->fetch()) {
                        echo '<tr>
                    <td class="text-center">' . $rowListProduct['product_id'] . '</td>
                    <td>' . $rowListProduct['product_name'] . '</td>
                    <td class="text-center">' . $rowListProduct['product_type'] . '</td>
                    <td>' . $rowListProduct['product_potent'] . '</td>
                    <td>' . $rowListProduct['product_amount'] . '</td>
                    <td class="text-center">' . $rowListProduct['product_price'] . '</td>
                    <td>' . $rowListProduct['product_stock'] . '</td>
                    <th data-product_id="' . $rowListProduct['product_id'] . '"
                    data-product_name="' . $rowListProduct['product_name'] . '"
                    data-product_type="' . $rowListProduct['product_type'] . '"
                    data-product_potent="' . $rowListProduct['product_potent'] . '"
                    data-product_amount="' . $rowListProduct['product_amount'] . '"
                    data-product_cost="' . $rowListProduct['product_cost'] . '"
                    data-product_price="' . $rowListProduct['product_price'] . '"
                    data-product_price_discount="' . $rowListProduct['product_price_discount'] . '"
                    data-product_stock="' . $rowListProduct['product_stock'] . '">
                        <a href="#" class="add-to-cart btn btn-info text-white" title="เลือกสินค้าชิ้นนี้">
                        <i class="fas fa-plus"></i></a></th>
                    </tr>';
                    }
                    ?>
                </tbody>
            </table>

            <!-- ตะกร้า -->
            <div class="row mt-1">
                <div class="col">
                    <span class="cart-clickable"></span>
                    <span class="clear-cart cart-clear-clickable"></span>

                </div>
            </div>
        </div>
    </div>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/herb_internship/modalbox/addstock_cart_modal.php"); ?>
    <script src="./js/addstock_cart.js"></script>


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
            xmlhttp.open("GET", "./model/model_product_getListProductTable.php?page=product_add_stock", true);
            xmlhttp.send();
        }, 30000);
    }

    $(document).ready(function() {

        var window_height = Number($.cookie("window-height-addstock"));
        if ($.cookie("window-height-addstock") !== undefined) {
    
            var table = $('#product').DataTable({
  
                scrollY: window_height,
                scrollX: false,
                scrollCollapse: true,
                paging: false,
                info: false,
                "deferRender": true,

                "columnDefs": [{
                        "targets": 'no-sort',
                        "orderable": false,
                    },
                    {
                        "targets": [2, 3, 4, 5, 6],
                        "searchable": false,
                    }
                ],

                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "ค้นหารหัส หรือ ชื่อสินค้า"
                }


            });
        } else if ($.cookie("window-height-addstock") == undefined) {

            var table = $('#product').DataTable({
                scrollY: 500,
                scrollX: false,
                scrollCollapse: true,
                paging: false,
                info: false,
                "deferRender": true,
           

                "columnDefs": [{
                        "targets": 'no-sort',
                        "orderable": false,
                    },
                    {
                        "targets": [2, 3, 4, 5, 6],
                        "searchable": false,
                    }
                ],

                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "ค้นหารหัส หรือ ชื่อสินค้า"
                }


            });
        }

        $('.table-height-change').on("click", function(event) {
            table.destroy();
            var height = Number($(this).data('height'));
            table = $('#product').DataTable({
                scrollY: height,
                scrollX: false,
                scrollCollapse: true,
                paging: false,
                info: false,
                "deferRender": true,

                "columnDefs": [{
                        "targets": 'no-sort',
                        "orderable": false,
                    },
                    {
                        "targets": [2, 3, 4, 5, 6],
                        "searchable": false,
                    }
                ],

                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "ค้นหารหัส หรือ ชื่อสินค้า"
                }

            });
            $.cookie("window-height-addstock", height);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("tbodyData").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "./model/model_product_getListProductTable.php?page=product_add_stock", true);
            xmlhttp.send();
        })

        $('.refresh-table').on("click", function(event) {
            document.getElementById("refresh-a").className = "fas fa-spinner";
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("tbodyData").innerHTML = this.responseText;
                    document.getElementById("refresh-a").className = "fas fa-sync";


                }
            };
            xmlhttp.open("GET", "./model/model_product_getListProductTable.php?page=product_add_stock", true);
            xmlhttp.send();
        })
    });

    $('.clear-cart').click(function() {
        shoppingCart2.clearCart();
        displayCart();
    });
</script>