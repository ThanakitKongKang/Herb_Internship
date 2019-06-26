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

                        <div class='col-4 p-2'>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                                </div>
                                <input type='text' id="customer-name" class='customer-name form-control' placeholder="ชื่อผู้ซื้อ">
                            </div>
                        </div>

                        <div class="col-4 p-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-coins"></i></div>
                                </div>
                                <input type='number' required min="1" step="0.25" id="total-receive" class='total-receive form-control' placeholder="จำนวนเงินที่รับ">
                            </div>
                        </div>

                        <div class="px-0 pt-2">บาท</div>
                    </div>

                    <div class="row justify-content-end pr-5" id="total-change" style="visibility:hidden">เงินที่ต้องทอน : <span class="total-change-span px-1 text-primary" id="total-change-span"></span> บาท</div>
                    <div class="row justify-content-center pr-5" id="not-enough-receive" style="visibility:hidden">จำนวนเงินที่รับมาไม่พอ! ขาดอีก <span class="still-not-enough-span px-1 text-danger" id="still-not-enough"></span> บาท</div>

                </div>
            </div>
            <div class="cart-button modal-footer">
                <button type="button" onclick="" id="footer-submit" class="calculate-cart btn btn-primary" data-dismiss="modal" style="visibility:hidden">ยืนยันการขายและพิมพ์ใบเสร็จ</button>
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