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
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขสินค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="show-editModal table">

                </table>


            </div>
            <div class="edit-footer modal-footer">
                <button type="button" onclick="" id="footer-submit"  class="edit-button btn btn-primary text-white" data-dismiss="modal" data-list_product_count="<?= $rowListProductCount['listProductCount'] ?>">ยืนยันการทำรายการ</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>


            </div>
        </div>
    </div>
</div>