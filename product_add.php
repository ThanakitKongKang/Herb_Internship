<?php  //include from root php's style
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/herb_internship/head.php";
include_once($path);

?>

<head></head>

<body>
    <div class="container mt-5">
        <h2 class="text-center my-4">เพิ่มสินค้า</h2>

        <form id="form_product_add" method="post">
            <!-- ชื่อ -->
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">ชื่อผลิตภัณฑ์</label>
                <div class="col-sm-6">
                    <input type="text" required class="form-control" name="product_name" id="product_name" placeholder="ชื่อผลิตภัณฑ์">
                </div>
            </div>
            <!-- ประเภทสินค้า -->
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">ประเภทสินค้า</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input required class="form-check-input" type="radio" name="product_type" id="product_type1" value="ED" checked>
                            <label class="form-check-label" for="product_type1">
                                ED
                            </label>
                        </div>
                        <div class="form-check">
                            <input required class="form-check-input" type="radio" name="product_type" id="product_type2" value="NED">
                            <label class="form-check-label" for="product_type">
                                NED
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>

            <!-- ขนาดบรรจุ ความแรง -->
            <div class="form-group row">
                <label for="potent" class="col-sm-2 col-form-label">ความแรงยา/ขนาดบรรจุ</label>
                <div class="col-sm-3">
                    <input type="text" required class="form-control" name="product_potent" id="product_potent" placeholder="ความแรง">
                </div>
                <div class="col-sm-3">
                    <input type="text" required class="form-control" name="product_amount" id="product_amount" placeholder="ขนาดบรรจุ">
                </div>

            </div>

            <!-- ทุน ราคา-->
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">ราคา</label>
                <div class="col-sm-3">
                    <input type="number" required step=0.01 class="form-control" name="product_price" id="product_price" placeholder="ราคาขายปลึก">
                </div>
                <div class="col-sm-3">
                    <input type="number" required step=0.01 class="form-control" name="product_price_discount" id="product_price_discount" placeholder="ราคาขาย(ยอด 5,000 ขึ้น)">
                </div>
                <div class="col-sm-3">
                    <input type="number" required step=0.01 class="form-control" name="product_cost" id="product_cost" placeholder="ราคาทุน/หน่วย">
                </div>
            </div>

            <!-- สต็อก -->
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">จำนวนในสต็อก</label>
                <div class="col-sm-3">
                    <input type="number" required class="form-control" name="product_stock" id="product_stock" placeholder="จำนวนในสต็อก">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" required class="btn btn-primary">เพิ่ม</button>
                </div>
            </div>
        </form>


    </div>
</body>

<script>
    // send.js
    $(document).ready(function() {
        $('#form_product_add').submit(function(e) {
            e.preventDefault();
            var formData = {
                'product_name': $('input[name=product_name]').val(),
                'product_type': $('input[name=product_type]').val(),
                'product_potent': $('input[name=product_potent]').val(),
                'product_amount': $('input[name=product_amount]').val(),
                'product_price': $('input[name=product_price]').val(),
                'product_price_discount': $('input[name=product_price_discount]').val(),
                'product_cost': $('input[name=product_cost]').val(),
                'product_stock': $('input[name=product_stock]').val()
            };
            $.ajax({
                    type: 'POST',
                    url: './model/model_product_add.php', // the url where we want to POST
                    data: formData, // our data object
                })

                .done(function(data) {
                    alert('เพิ่มสินค้าสำเร็จ');
                    console.log(data);
                })
                .fail(function(data) {
                    alert('ผิดพลาด เพิ่มสินค้าไม่สำเร็จ');
                });
            
            $(':input', '#form_product_add')
                .not(':button, :submit, :reset, :hidden')
                .val('')
                .prop('checked', false)
                .prop('selected', false);


        });

    });
</script>