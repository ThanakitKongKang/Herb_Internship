<head>
    <style>
    </style>

</head>
<!-- Modal -->
<div class="modal fade" id="orderCancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ยกเลิกออร์เดอร์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <button class="btn btn-danger" id="modal-delete" style="position:absolute;right:1rem;top:1.5rem;display:none"><i class="far fa-trash-alt"></i></button>
                <div class="row justify-content-center text-center">
                  <input type="number" min="1" max="" id="order_id_input" class="form-control" style="width:17%" placeholder="รหัสออร์เดอร์..">
                </div>
                <div class="container" id="ord_info">


                </div>

            </div>
            <div class="cancel-footer modal-footer">
                <button type="button" onclick="" id="footer-submit" class="order-cancel-btn btn btn-danger text-white" data-dismiss="modal">ดำเนินการยกเลิกออร์เดอร์นี้</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>


            </div>
        </div>
    </div>
</div>