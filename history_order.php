<?php  //include from root php's style
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/herb_internship/head.php";
include_once($path);

?>

<head>
    <title>ประวัติการขาย <?= $title_credit ?></title>
    <script src="./js/history_page/jquery-2.0.3.min.js" data-semver="2.0.3" data-require="jquery"></script>
    <link rel="stylesheet" href="./css/history_page/main.css" />

    <link data-require="jqueryui@*" data-semver="1.10.0" rel="stylesheet" href="./js/history_page/jquery-ui-1.10.0.custom.min.css" />
    <script data-require="jqueryui@*" data-semver="1.10.0" src="./js/history_page/jquery-ui.js"></script>
    <script src="./js/history_page/jquery.dataTables.js" data-semver="1.9.4" data-require="datatables@*"></script>
</head>

<body>
    <div class="container">
        <?php
        include($_SERVER['DOCUMENT_ROOT'] . "/herb_internship/model/model_order_history_select.php");
        ?>
        <div class="my-3">
            <div class="row justify-content-end">
                <div class="mr-auto">
                    <button class="btn btn-danger" id="order_cancel"><i class="fas fa-ban"></i> ยกเลิกออร์เดอร์</button>
                </div>
                <p id="date_filter" class="text-white">
                    <span id="date-label-from" class="date-label">จากวันที่ : </span><input class="date_range_filter date form-control mx-0" type="text" id="datepicker_from" style="width:25%;display:inline" />
                    <span id="date-label-to" class="date-label">ถึงวันที่ : <input class="date_range_filter date form-control mx-0" type="text" id="datepicker_to" style="width:25%;display:inline" />
                </p>
            </div>
            <table style='position:relative;left:5%;' class="table table-responsive table-hover" id="history_order" data-page-length='100'>

                <thead class="thead-dark">
                    <tr id="footer" class="bg-dark text-white mb-2"></tr>
                    <tr>
                        <th class="align-middle text-center">เวลาที่ขาย</th>
                        <th class="align-middle text-center">รหัสออร์เดอร์</th>
                        <th class="align-middle text-center">เล่มที่/เลขที่</th>
                        <th class="align-middle text-center">รหัสสินค้า</th>
                        <th class="align-middle text-center">ชื่อสินค้า</th>
                        <th class="align-middle text-center">จำนวน</th>
                        <th class="align-middle text-center">ราคาต่อชิ้น</th>
                        <th class="align-middle text-center">รวม</th>
                        <th class="align-middle text-center">ชื่อผู้ขาย</th>

                    </tr>

                </thead>

                <tbody id="tbodyData" class='bg-light'>
                    <?php
                    // date_default_timezone_set('Asia/Bangkok');
                    // $timezone = date_default_timezone_get();
                    while ($rowOrder = $listHistory->fetch()) {
                        // $date = date_create($rowOrder['order_date']);
                        // $dayDisplay = $date->format('d');
                        // $yearDisplay = $date->format('Y');
                        // $yearDisplay += 543;
                        // $monthDisplay = $date->format('m');
                        // $time = $date->format('H:i');
                        // switch ($monthDisplay) {
                        //     case "01":
                        //         $monthDisplay = "มกราคม";
                        //         break;
                        //     case "02":
                        //         $monthDisplay = "กุมภาพันธ์";
                        //         break;
                        //     case "03":
                        //         $monthDisplay = "มีนาคม";
                        //         break;
                        //     case "04":
                        //         $monthDisplay = "เมษายน";
                        //         break;
                        //     case "05":
                        //         $monthDisplay = "พฤษภาคม";
                        //         break;
                        //     case "06":
                        //         $monthDisplay = "มิถุนายน";
                        //         break;
                        //     case "07":
                        //         $monthDisplay = "กรกฎาคม";
                        //         break;
                        //     case "08":
                        //         $monthDisplay = "สิงหาคม";
                        //         break;
                        //     case "09":
                        //         $monthDisplay = "กันยายน";
                        //         break;
                        //     case "10":
                        //         $monthDisplay = "ตุลาคม";
                        //         break;
                        //     case "11":
                        //         $monthDisplay = "พฤศจิกายน";
                        //         break;
                        //     case "12":
                        //         $monthDisplay = "ธันวาคม";
                        //         break;
                        // }
                        $sum = $rowOrder['order_price'] * $rowOrder['order_count'];
                        echo '<tr>
                    <td class="">' .$rowOrder['order_date']. ' </td>
                    <td  class="text-center">ord' . $rowOrder['order_id'] . '</td>
                    <td class="text-center">' . $rowOrder['book_id'] . '/' . $rowOrder['iv_id'] . '</td>
                    <td class="text-center">' . $rowOrder['product_id'] . '</td>
                    <td>' . $rowOrder['product_name'] . '</td>
                    <td class="text-right">' . $rowOrder['order_count'] . '</td>
                    <td class="text-right">' . $rowOrder['order_price'] . '</td>
                    <td class="text-right">' . $sum . '</td>
                    <td class="text-center">' . $rowOrder['user'] . '</td>
                    </tr>';
                    }
                    ?>
                </tbody>
                <!-- <tfoot id="footer" class="bg-light text-primary"></tfoot> -->
            </table>

        </div>
    </div>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/herb_internship/modalbox/order_cancel.php"); ?>
</body>

<script>
    $(document).ready(function() {
        table = $('#history_order').DataTable({
            scrollX: false,
            scrollCollapse: true,
            paging: true,
            info: false,
            aLengthMenu: [
                [10, 25, 50, 100, 200, -1],
                [10, 25, 50, 100, 200, "All"]
            ],
            "order": [0, 'DESC'],
            "deferRender": true,
            "sPaginationType": "full_numbers",
            "columnDefs": [{
                    "targets": [4, 5, 6],
                    "searchable": false,
                },
                {
                    "targets": [2, 3],
                    "orderable": false
                }

            ],
            language: {
                search: "_INPUT_",
                searchPlaceholder: "ค้นหา"
            }
        });
        sumThis();
        $("#datepicker_from").datepicker({
            showOn: "button",
            // buttonImage: "images/calendar.gif",
            buttonImageOnly: false,
            "onSelect": function(date) {
                minDateFilter = new Date(date).getTime();
                table.fnDraw();
                sumThis();
            }
        }).keyup(function() {
            minDateFilter = new Date(this.value).getTime();
            table.fnDraw();
        });

        $("#datepicker_to").datepicker({
            showOn: "button",
            // buttonImage: "_etc/herb.ico",
            buttonImageOnly: false,
            "onSelect": function(date) {
                maxDateFilter = new Date(date).getTime();
                table.fnDraw();
                sumThis();
            }
        }).keyup(function() {
            maxDateFilter = new Date(this.value).getTime();
            table.fnDraw();
        });


        function sumThis() {
            var input, table2, tr, td1, td2, i;
            var sum = 0,
                count = 0;
            table2 = document.getElementById("history_order");
            tr = table2.getElementsByTagName("tr");
            for (i = 1; i < tr.length; i++) {
                td1 = tr[i].getElementsByTagName("td")[5];
                if (td1 != undefined)
                    count = count + Number(td1.innerHTML);
                td2 = tr[i].getElementsByTagName("td")[7];
                if (td2 != undefined)
                    sum = sum + Number(td2.innerHTML);
            }

            // var page_length = $("#history_order_length").children("label").children("select").children("option:selected").val();

            // var sum2 = 0,
            //     count2 = 0;
            // for (i = 1; i < page_length; i++) {
            //     td1 = tr[i].getElementsByTagName("td")[5];
            //     if (td1 != undefined)
            //         count2 = count2 + Number(td1.innerHTML);
            //     td2 = tr[i].getElementsByTagName("td")[7];
            //     if (td2 != undefined)
            //         sum2 = sum2 + Number(td2.innerHTML);
            // }
            document.getElementById("footer").innerHTML = "<tr><td colspan='5'>รวมทั้งสิ้น</td><td class='text-right'>" + count + "</td><td></td><td class='text-right'>" + sum + "</td><td></td></tr>";

        }
        // Date range filter
        minDateFilter = "";
        maxDateFilter = "";

        $.fn.dataTableExt.afnFiltering.push(
            function(oSettings, aData, iDataIndex) {
                if (typeof aData._date == 'undefined') {
                    aData._date = new Date(aData[0]).getTime();
                }

                if (minDateFilter && !isNaN(minDateFilter)) {
                    if (aData._date < minDateFilter) {
                        return false;
                    }
                }

                if (maxDateFilter && !isNaN(maxDateFilter)) {
                    if (aData._date > maxDateFilter) {
                        return false;
                    }
                }

                return true;
            }
        );
        $("#history_order_length").children("label").children("select").on('change', function(event) {
            sumThis();
        });

        $(".paginate_button").on('click', function(event) {
            sumThis();
        });

        $("#history_order_paginate").children("span").on('click', function(event) {
            sumThis();
        });

        $('#order_cancel').on('click', function(event) {
            var current_input = document.getElementById("order_id_input").value;
            if (document.getElementById("order_id_input").value != "") {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("ord_info").innerHTML = this.responseText;
                        // $('#orderCancel').modal('show');
                    }
                };
                xmlhttp.open("GET", "./model/model_get_order_detail_by_order_id.php?ord=" + current_input, true);
                xmlhttp.send();
            }

            jQuery.noConflict();
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("order_id_input").max = this.responseText;
                    $('#orderCancel').modal('show');
                }
            };
            xmlhttp.open("GET", "./model/model_invoice_get_order_id.php", true);
            xmlhttp.send();
        });
        $('#order_id_input').on('keyup', function(event) {
            getOrder();
        });
        $('#order_id_input').on('change', function(event) {
            getOrder();
        });


        function getOrder() {
            var min = Number(document.getElementById("order_id_input").min);
            var max = Number(document.getElementById("order_id_input").max);
            var order_id_input = Number(document.getElementById("order_id_input").value);
            document.getElementById("footer-submit").style.display = "";
            if (max > 0) {
                if (order_id_input < min) {
                    Swal.fire({
                        type: 'error',
                        title: 'ผิดพลาด',
                        html: '<pre>เลขออร์เดอร์ต่ำสุดคือ <span class="text-primary">1</span> ไม่สามารถกรอก <span class="text-danger">' + order_id_input + '</span> ได้</pre>',
                    })
                    order_id_input = min;
                    document.getElementById("order_id_input").value = order_id_input;
                } else if (order_id_input > max) {
                    Swal.fire({
                        type: 'error',
                        title: 'ผิดพลาด',
                        html: '<pre>เลขออร์เดอร์สูงสุดคือ  <span class="text-primary">' + max + '</span> ไม่สามารถกรอก <span class="text-danger">' + order_id_input + '</span> ได้</pre>',
                    })
                    order_id_input = max;
                    document.getElementById("order_id_input").value = order_id_input;
                }

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("ord_info").innerHTML = this.responseText;
                        // $('#orderCancel').modal('show');
                    }
                };
                xmlhttp.open("GET", "./model/model_get_order_detail_by_order_id.php?ord=" + order_id_input, true);
                xmlhttp.send();
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'ผิดพลาด',
                    text: 'ขณะนี้ยังไม่มีรายการขาย'
                })
            }
        }

        $('.order-cancel-btn').on('click', function(event) {
            var order_id_input = Number(document.getElementById("order_id_input").value);
            var book_iv = document.getElementById("book_iv").innerHTML;
            Swal.fire({
                title: 'ยืนยันการยกเลิกออร์เดอร์?',
                html: "<div>ท่านต้องการจะยกเลิกออร์เดอร์ที่ <span class='text-danger'>" + order_id_input + " <span class='text-dark'>เล่ม</span> [" + book_iv + "]</span> ใช่หรือไม่?</div>",
                type: 'warning',
                showCancelButton: true,
                showCloseButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.value) {

                    var formData = {
                        'ord': order_id_input
                    };

                    $.ajax({
                        type: 'POST',
                        url: './model/model_order_cancel.php', // the url where we want to POST
                        data: formData, // our data object,

                        success: function(data) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });

                            Toast.fire({
                                title: 'สำเร็จ !',
                                text: 'ท่านได้ทำรายการยกเลิกออร์เดอร์ที่ ' + order_id_input,
                                type: 'success',
                                confirmButtonText: 'ตกลง',
                            })

                        }
                    });

                    $('#orderCancel').modal('hide');
                } else {
                    $('#orderCancel').modal('show');
                }
            })
        });
    });
</script>