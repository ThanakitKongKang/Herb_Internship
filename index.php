<?php  //include from root php's style
include_once($_SERVER['DOCUMENT_ROOT'] . "/herb_internship/head.php");
?>

<head>
    <title>หน้าหลัก</title>
</head>

<body>
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
                data-product_id="'.$rowListProduct['product_id'].'"
                data-product_name="'.$rowListProduct['product_name'].'"
                data-product_price="'.$rowListProduct['product_price'].'"
                data-product_price_discount="'.$rowListProduct['product_price_discount'].'"
                data-product_stock="'.$rowListProduct['product_stock'].'">
                <i class="fas fa-plus"></i></a></td>
            </tr>';
                    $i++;
                }

                ?>
                </tbody>
            </table>
        </div>


    </div>
</body>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/herb_internship/modalbox/cart_modal.php");?>
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