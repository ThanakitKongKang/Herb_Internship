$('#product tbody').on("click", "th", function (event) {
    event.preventDefault();
    var product_id = ($(this).data('product_id'));
    var product_name = $(this).data('product_name');
    var product_type = $(this).data('product_type');
    var product_potent = $(this).data('product_potent');
    var product_amount = $(this).data('product_amount');
    var product_cost = Number($(this).data('product_cost'));
    product_cost = Math.floor(product_cost * 100) / 100;
    var product_price = Number($(this).data('product_price'));
    var product_price_discount = Number($(this).data('product_price_discount'));
    var product_stock = Number($(this).data('product_stock'));

    var output = "<form id='form_product_edit' method='post'>" +
        "<div class='p-2'>" +
        "<input type='hidden' name='product_id' id='product_id' value='" + product_id + "'>" +
        "<div class='form-group row'>" +
        "<label for='name' class=' col-sm-3 col-form-label'>ชื่อผลิตภัณฑ์</label>" +
        "<div class='col-sm-6'>" +
        "<input type='text' onblur='checkName(this.value);' required class='product_name form-control' name='product_name' id='product_name' placeholder='ชื่อผลิตภัณฑ์' pattern='[ก-๏\s]+' title='กรุณากรอกเป็นภาษาไทย' value='" + product_name + "'>" +
        "</div>" +
        "</div>" +
        "<fieldset class='form-group'>" +
        "<div class='row'>" +
        " <legend class='col-form-label col-sm-3 pt-0'>ประเภทสินค้า</legend>";
    if (product_type == "ED") {
        output += "<div class='col-sm-9'>" +
            "<div class='form-check'>" +
            "<input required class='form-check-input' type='radio' name='product_type' id='product_type1' value='ED' checked>" +
            "<label class='form-check-label' for='product_type1'>" +
            "ED" +
            "</label>" +
            "</div>" +
            "<div class='form-check'>" +
            "<input required class='form-check-input' type='radio' name='product_type' id='product_type2' value='NED'>" +
            "<label class='form-check-label' for='product_type'>" +
            "NED" +
            "</label>" +
            "</div>" +
            "</div>";
    } else if (product_type == "NED") {
        output += "<div class='col-sm-9'>" +
            "<div class='form-check'>" +
            "<input required class='form-check-input' type='radio' name='product_type' id='product_type1' value='ED'>" +
            "<label class='form-check-label' for='product_type1'>" +
            "ED" +
            "</label>" +
            "</div>" +
            "<div class='form-check'>" +
            "<input required class='form-check-input' type='radio' name='product_type' id='product_type2' value='NED' checked>" +
            "<label class='form-check-label' for='product_type'>" +
            "NED" +
            "</label>" +
            "</div>" +
            "</div>";
    }
    output += "</div>" +
        "</fieldset>" +
        "<div class='form-group row'>" +
        "<label for='potent' class=' col-sm-3 col-form-label'>ความแรงยา/ขนาดบรรจุ</label>" +
        "<div class='col-sm-3'>" +
        "<input type='text' required class='form-control' onblur='checkPotent(this.value);' name='product_potent' id='product_potent' title='ความแรง' value='" + product_potent + "' placeholder='ความแรง' pattern='^[0-9]+[\s][a-zA-Zก-๏]+$|ระบุไม่ได้' title='กรุณากรอกตามตัวอย่าง เช่น 250 mg หรือ 250 มิลลิกรัม'>" +
        "</div>" +
        "<div class='col-sm-3'>" +
        "<input type='text' required class='form-control' onblur='checkAmount(this.value);' name='product_amount' id='product_amount' title='ขนาดบรรจุ' value='" + product_amount + "' placeholder='ขนาดบรรจุ' pattern='^[0-9]+[\s][a-zA-Zก-๏]+$|ระบุไม่ได้' title='กรุณากรอกตามตัวอย่าง เช่น 250 mg หรือ 250 มิลลิกรัม'>" +
        "</div>" +
        "</div>" +


        "<div class='form-group row'>" +
        "<label for='price' class=' col-sm-3 col-form-label'>ราคา</label>" +
        "<div class='col-sm-3'>" +
        "<input type='number' required step=0.01 min='1' class='form-control' name='product_price' id='product_price' title='ราคาขายปลีก' value='" + product_price + "' placeholder='ราคาขายปลีก'>" +
        "</div>" +
        "<div class='col-sm-3'>" +
        "<input type='number' required step=0.01 min='1' class='form-control' name='product_price_discount' id='product_price_discount' value='" + product_price_discount + "' title='ราคาขาย(ยอด 5,000 ขึ้น)' placeholder='ราคาขาย(ยอด 5,000 ขึ้น)'>" +
        "</div>" +
        "<div class='col-sm-3'>" +
        "<input type='number' required step=0.01 min='1' class='form-control' name='product_cost' id='product_cost' title='ราคาทุน/หน่วย' value='" + product_cost + "' placeholder='ราคาทุน/หน่วย'>" +
        "</div>" +
        "</div>" +


        "<div class='form-group row'>" +
        "<label for='price' class=' col-sm-3 col-form-label'>จำนวนในสต็อก</label>" +
        "<div class='col-sm-3'>" +
        "<input type='number' min='1' required class='form-control' name='product_stock' id='product_stock' value='" + product_stock + "' placeholder='จำนวนในสต็อก'>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "</form>";


    $('.show-editModal').html(output);
    $('#editModal').modal('show');
});

// ยืนยันการแก้ไข
$('.edit-footer').on("click", ".edit-button", function (event) {
    event.preventDefault();
    Swal.fire({
        title: 'ยืนยันการแก้ไขสินค้า?',
        // text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยัน',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.value) {

            // get old data to show it to user here
            // 
            // 
            // 
            // 
            // 
            var product_id = $('#product_id').val();
            var product_name = $('#product_name').val();

            if (document.getElementById('product_type1').checked) {
                var product_type = $('#product_type1').val();
            } else if (document.getElementById('product_type2').checked) {
                var product_type = $('#product_type2').val();
            }
            var product_potent = $('#product_potent').val();
            var product_amount = $('#product_amount').val();
            var product_cost = Number($('#product_cost').val());
            var product_price = Number($('#product_price').val());
            var product_price_discount = Number($('#product_price_discount').val());
            var product_stock = Number($('#product_stock').val());

            var formData = {
                'product_id': product_id,
                'product_name': product_name,
                'product_type': product_type,
                'product_potent': product_potent,
                'product_amount': product_amount,
                'product_cost': product_cost,
                'product_price': product_price,
                'product_price_discount': product_price_discount,
                'product_stock': product_stock
            };

            $.ajax({
                type: 'POST',
                url: './model/model_product_edit.php', // the url where we want to POST
                data: formData, // our data object
            })


            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                title: 'สำเร็จ !',
                text: 'ท่านได้ทำรายการแก้ไขสินค้า ' + product_id,
                type: 'success',
                confirmButtonText: 'ตกลง',
            })
            getListProductTable();
        } else {
            $('#editModal').modal('show');
        }
    })

})

// ajax refresh product table function
function getListProductTable() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tbodyData").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "./model/model_product_getListProductTable.php?page=product_edit", true);
    xmlhttp.send();
}

function checkName(value) {
    var product_name = document.querySelector("#product_name");
    console.log(product_name.checkValidity());
    if (product_name.checkValidity()) {
        document.getElementById("product_name").style.backgroundColor = "green";
    }
    document.getElementById("product_name");
}

function checkPotent(value) {
    console.log("yeah2");
}

function checkAmount(value) {
    console.log("yeah3");
}