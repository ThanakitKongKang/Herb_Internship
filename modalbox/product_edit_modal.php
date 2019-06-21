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
            <button class="btn btn-danger" id="modal-delete" style="position:absolute;right:1rem;top:1.5rem"><i class="far fa-trash-alt"></i></button>
                <table class="show-editModal table">

                </table>


            </div>
            <div class="edit-footer modal-footer">
                <button type="button" onclick="" id="footer-submit"  class="edit-button btn btn-primary text-white" data-dismiss="modal">ยืนยันการทำรายการ</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>


            </div>
        </div>
    </div>
</div>