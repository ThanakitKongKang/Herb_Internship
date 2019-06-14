<head>
    <style>
        .show-cart li {
            display: flex;
        }

        .card {
            margin-bottom: 20px;
        }

        .card-img-top {
            width: 200px;
            height: 200px;
            align-self: center;
        }
    </style>
</head>
<?php
$list_product_count = $pdo->prepare("SELECT COUNT(product_id) AS listProductCount FROM product");
$list_product_count->execute();
$rowListProductCount = $list_product_count->fetch();
// echo "whatttt ".$rowListProductCount['listProductCount'];

?>
<!-- Modal -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">สินค้าที่นำเข้าสต็อก</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="show-cart table">

                </table>


            </div>
            <div class="cart-button modal-footer">
                <button type="button" onclick="" id="footer-submit" class="calculate-cart btn btn-primary" data-dismiss="modal" data-list_product_count="<?= $rowListProductCount['listProductCount'] ?>">ดำเนินการต่อ</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>


            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#total-receive').on("keyup", function(event) {
            calculate_change();
        });

    //     if (document.hasFocus()) {
    //     setInterval(function() {
    //         calculate_change();
    //     }, 1000);
    // }

    });
</script>