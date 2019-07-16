<?php  //include from root php's style
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/herb_internship/head.php";
include_once($path);

?>

<head>
    <title>ประวัติการนำสินค้าเข้าสต็อก <?= $title_credit ?></title>
    <script src="./js/history_page/jquery-2.0.3.min.js" data-semver="2.0.3" data-require="jquery"></script>
    <link rel="stylesheet" href="./css/history_page/main.css" />
    <link data-require="jqueryui@*" data-semver="1.10.0" rel="stylesheet" href="./js/history_page/jquery-ui-1.10.0.custom.min.css" />
    <script data-require="jqueryui@*" data-semver="1.10.0" src="./js/history_page/jquery-ui.js"></script>
    <script src="./js/history_page/jquery.dataTables.js" data-semver="1.9.4" data-require="datatables@*"></script>
</head>

<body>
    <div class="container">
        <?php
        include($_SERVER['DOCUMENT_ROOT'] . "/herb_internship/model/model_product_add_stock_history_select.php");
        ?>
        <div class="my-3">
            <div class="row justify-content-end">
                <p id="date_filter" class="text-white">
                    <span id="date-label-from" class="date-label">จากวันที่: </span><input class="date_range_filter date form-control mx-0" type="text" id="datepicker_from" style="width:25%;display:inline" />
                    <span id="date-label-to" class="date-label">ถึงวันที่:<input class="date_range_filter date form-control mx-0" type="text" id="datepicker_to" style="width:25%;display:inline" />
                </p>
            </div>
            <table style="position:relative;left:17.5%" class="table table-responsive table-hover" id="history_order" data-page-length='10'>

                <thead class="thead-dark">
                    <tr id="footer" class="bg-dark text-white mb-2"></tr>
                    <tr>
                        <th class="align-middle text-center">วันที่เพิ่ม</th>
                        <th class="align-middle text-center">รหัสสินค้า</th>
                        <th class="align-middle text-center">ชื่อสินค้า</th>
                        <th class="align-middle text-center">จำนวนที่เพิ่ม</th>
                        <th class="align-middle text-center">ชื่อผู้ขาย</th>
                    </tr>
                </thead>

                <tbody id="tbodyData" class='bg-light'>
                    <?php
                    date_default_timezone_set('Asia/Bangkok');
                    $timezone = date_default_timezone_get();
                    while ($rowStock = $listHistory->fetch()) {

                        $date = date_create($rowStock['stock_date']);
                        $dayDisplay = $date->format('d');
                        $yearDisplay = $date->format('Y');
                        $yearDisplay += 543;
                        $monthDisplay = $date->format('m');
                        $time = $date->format('H:i');
                        switch ($monthDisplay) {
                            case "01":
                                $monthDisplay = "มกราคม";
                                break;
                            case "02":
                                $monthDisplay = "กุมภาพันธ์";
                                break;
                            case "03":
                                $monthDisplay = "มีนาคม";
                                break;
                            case "04":
                                $monthDisplay = "เมษายน";
                                break;
                            case "05":
                                $monthDisplay = "พฤษภาคม";
                                break;
                            case "06":
                                $monthDisplay = "มิถุนายน";
                                break;
                            case "07":
                                $monthDisplay = "กรกฎาคม";
                                break;
                            case "08":
                                $monthDisplay = "สิงหาคม";
                                break;
                            case "09":
                                $monthDisplay = "กันยายน";
                                break;
                            case "10":
                                $monthDisplay = "ตุลาคม";
                                break;
                            case "11":
                                $monthDisplay = "พฤศจิกายน";
                                break;
                            case "12":
                                $monthDisplay = "ธันวาคม";
                                break;
                        }
                        echo '<tr>
                        <td class="">' . $dayDisplay . ' ' . $monthDisplay . ' ' . $yearDisplay . ' ' . $time . ' น.</td>
                    <td class="text-center">' . $rowStock['product_id'] . '</td>
                    <td>' . $rowStock['product_name'] . '</td>
                    <td class="text-right">' . $rowStock['stock'] . '</td>
                    <td class="text-center">' . $rowStock['user'] . '</td>
                    </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {

        var table = $('#history_order').DataTable({

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
                    "targets": [3],
                    "searchable": false,
                },
                {
                    "targets": [2],
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
            var input, table2, tr, td, i;
            var count = 0;
            table2 = document.getElementById("history_order");
            tr = table2.getElementsByTagName("tr");


            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[3];
                if (td != undefined)
                    count = count + Number(td.innerHTML);
            }

            document.getElementById("footer").innerHTML = "<tr><td colspan='3'>รวมทั้งสิ้น</td><td class='text-right'>" + count + "</td><td></td></tr>";

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
    });
</script>