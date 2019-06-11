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
                <h5 class="modal-title" id="exampleModalLabel">ตะกร้าสินค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="show-cart table">

                </table>

                <div style="font-size:1.25em">
                    <div class="row justify-content-end pr-5">ยอดรวม : <span id="total-cart" class="total-cart px-1 border-1 text-primary"></span> บาท</div>
                    <div class="row pr-5 justify-content-end">
                        <div class="col-4 p-2">
                            <input type='number' required min="1" step="0.25" id="total-receive" class='total-receive form-control' placeholder="จำนวนเงินที่รับ">
                        </div>
                        <div class="px-0 pt-2">บาท</div>
                    </div>

                    <div class="row justify-content-end pr-5" id="total-change" style="visibility:hidden">เงินที่ต้องทอน : <span class="total-change-span px-1 text-primary" id="total-change-span"></span> บาท</div>
                    <div class="row justify-content-end pr-5" id="not-enough-receive" style="visibility:hidden">จำนวนเงินที่รับมาไม่พอ! ขาดอีก <span class="still-not-enough-span px-1 text-danger" id="still-not-enough"></span> บาท</div>

                </div>
            </div>
            <div class="cart-button modal-footer">
                <button type="button" onclick="" id="footer-submit" class="calculate-cart btn btn-primary" data-dismiss="modal" data-list_product_count="<?= $rowListProductCount['listProductCount'] ?>" style="visibility:hidden">ยืนยันการขายและพิมพ์ใบเสร็จ</button>
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

        if (document.hasFocus()) {
        setInterval(function() {
            calculate_change();
        }, 1000);
    }

        // $(this).on("keypress", function(event) {
        //     if (event.keyCode == 32) {
        //         displayCart();
        //         $('#cart').modal('hide');
        //     }
        // });
    });
</script>