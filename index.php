<?php  //include from root php's style
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/herb_internship/head.php";
include_once($path);

?>

<head>
    <title>หน้าหลัก</title>
    <style>
        table tbody tr:hover {
            color: green !important;
        }

        table tbody button:active,
        .add-to-cart:active {
            color: greenyellow;
            background-color: #35cc57 !important;
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
        $listProduct = getListProduct($pdo,"index"); //call function
        ?>
        <!-- print -->


        <div class="my-3">
            <!-- <div class="row">
                <div class="col-2"><input type="text" class="code_filter form-control" id="code_filter" placeholder="รหัสสินค้า"></div>
                <div class="col-3"><input type="text" class="name_filter form-control" id="name_filter" placeholder="ชื่อสินค้า"></div>
            </div> -->
            <table class="table table-light table-striped table-responsive table-bordered table-hover" id="product" data-page-length='25'>

                <thead class="thead-dark">
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
                        <th class="align-middle text-center no-sort"><a class="btn refresh-table text-white" href="#"><i class="fas fa-sync" id="refresh-a"></i></a></th>
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
                        <a href="#" class="add-to-cart btn btn-success text-white" title="เพิ่มลงตะกร้า">
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
        }, 30000);
    }

    // function filterCode() {
    //     $('#product').DataTable().column(0).search(
    //         $('#code_filter').val(),
    //     ).draw();
    // }

    // function filterName() {
    //     $('#product').DataTable().column(1).search(
    //         $('#name_filter').val(),
    //     ).draw();
    // }


    $(document).ready(function() {

        var window_height = Number($.cookie("window-height"));
        if ($.cookie("window-height") !== undefined) {
            // console.log("window-height is not undefined : " + $.cookie("window-height"));
            var table = $('#product').DataTable({
                // scrollY: 500,
                scrollY: window_height,
                scrollX: false,
                scrollCollapse: true,
                paging: false,
                info: false,
                "deferRender": true,
                // "searching": false,

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
        } else if ($.cookie("window-height") == undefined) {
            // console.log("window-height is undefined");
            var table = $('#product').DataTable({
                scrollY: 500,
                // scrollY: window_height,
                scrollX: false,
                scrollCollapse: true,
                paging: false,
                info: false,
                "deferRender": true,
                // "searching": false,

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
            $.cookie("window-height", height);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("tbodyData").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "./model/model_product_getListProductTable.php", true);
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
            xmlhttp.open("GET", "./model/model_product_getListProductTable.php", true);
            xmlhttp.send();
        })



        // $(this).on("keypress", function(event) {
        //     if (event.keyCode == 32) {
        //         displayCart();
        //         $('#cart').modal('show');
        //     }

        // });

        // $('input.code_filter').on('keyup', function() {
        //     filterCode();
        // });
        // $('input.name_filter').on('keyup', function() {
        //     filterName();
        // });

        // document.getElementsByClassName("form-control form-control-sm").placeholder = "ค้นหารหัส หรือ ชื่อสินค้า";
        // document.getElementByClass("product_filter").placeholder = "ค้นหารหัส หรือ ชื่อสินค้า";
    });

    $('.clear-cart').click(function() {
        shoppingCart.clearCart();
        displayCart();
    });
</script>