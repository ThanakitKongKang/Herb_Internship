<?php  //include from root php's style
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/herb_internship/head.php";
include_once($path);

?>

<head>
    <title>ประวัติการนำสินค้าเข้าสต็อก</title>
</head>

<body>
    <div class="container">
        <?php
        include($_SERVER['DOCUMENT_ROOT'] . "/herb_internship/model/model_product_add_stock_history_select.php");
        ?>
        <div class="my-3">
                <table style="position:relative;left:20%" class="table table-responsive table-hover" id="history_order" data-page-length='10'>

                    <thead class="thead-dark">
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
                        while ($rowStock = $listStockHistory->fetch()) {
                            echo '<tr>
                    <td class="text-center">' . $rowStock['stock_date'] . '</td>
                    <td class="text-center">' . $rowStock['product_id'] . '</td>
                    <td>' . $rowStock['product_name'] . '</td>
                    <td class="text-right">' . $rowStock['stock'] . ' ชิ้น</td>
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
        table = $('#history_order').DataTable({
            scrollX: false,
            scrollCollapse: true,
            paging: true,
            info: false,
            "order": [0, 'DESC'],
            "deferRender": true,

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
    });
</script>