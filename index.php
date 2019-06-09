<?php  //include from root php's style
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/herb_internship/head.php";
include_once($path);

?>
<html>

<head>
    <title>Herb retail</title>
</head>

<body>
    <div class="container">
        <?php
        include($_SERVER['DOCUMENT_ROOT'] . "/herb_internship/model/model_product.php");
        $listProduct = getListProduct($pdo); //call function
        ?>
        <!-- print -->

        <div class="my-3">
           
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
                </thead><tbody class="datatableBody">';
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
    $(document).ready(function() {
        var table = $('#product').DataTable({
            scrollY: 800,
            scrollCollapse: true,
            paging: false,
            info: false
        });


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