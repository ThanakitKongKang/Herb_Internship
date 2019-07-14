<?php  //include from root php's style
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/herb_internship/head.php";
include_once($path);

?>

<head>
    <title>ประวัติการขาย <?= $title_credit ?></title>
    <style>
        td,th {
            white-space: nowrap !important;
            word-wrap: break-word;
        }

        table {
            table-layout: fixed;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include($_SERVER['DOCUMENT_ROOT'] . "/herb_internship/model/model_order_history_select.php");
        ?>
        <div class="my-3">
            <table style='position:relative;left:10%;' class="table table-responsive table-hover" id="history_order" data-page-length='10'>

                <thead class="thead-dark">
                    <tr>
                        <th class="align-middle text-center">เวลาที่ขาย</th>
                        <th class="align-middle text-center">รหัสออร์เดอร์</th>
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
                    while ($rowOrder = $listOrderHistory->fetch()) {
                        $sum = $rowOrder['order_price'] * $rowOrder['order_count'];
                        echo '<tr>
                    <td class="text-center">' . $rowOrder['order_date'] . '</td>
                    <td  class="text-center">ord' . $rowOrder['order_id'] . '</td>
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
            </table>

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


    });
</script>