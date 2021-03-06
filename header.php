<?php if (isset($_SESSION["user_name"])) { ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Herb<img src="_etc/herb.ico" style="max-width:1.5rem" class="pb-2"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link 
                                            <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') {
                                                echo "active";
                                            } ?>" href="index.php"><i class="fas fa-home"></i> หน้าหลัก <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="<?php if (basename($_SERVER['PHP_SELF']) == 'product_add.php' || basename($_SERVER['PHP_SELF']) == 'product_add_stock.php' || basename($_SERVER['PHP_SELF']) == 'product_edit.php') {
                                            echo "text-dark";
                                        } ?>"><i class="fas fa-tasks"></i> จัดการสินค้า</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item <?php if (basename($_SERVER['PHP_SELF']) == 'product_add.php') {
                                                    echo "active";
                                                } ?> " href="product_add.php"><i class="fas fa-plus"></i> เพิ่มรายการสินค้าลงฐานข้อมูล</a>

                        <a class="dropdown-item <?php if (basename($_SERVER['PHP_SELF']) == 'product_add_stock.php') {
                                                    echo "active";
                                                } ?> " href="product_add_stock.php"><i class="fas fa-sync"></i> เพิ่มสินค้าลงสต็อก</a>

                        <a class="dropdown-item <?php if (basename($_SERVER['PHP_SELF']) == 'product_edit.php') {
                                                    echo "active";
                                                } ?> " href="product_edit.php"><i class="fas fa-edit"></i> แก้ไขข้อมูลสินค้า</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="<?php if (basename($_SERVER['PHP_SELF']) == 'history_order.php' || basename($_SERVER['PHP_SELF']) == 'history_product_add_stock.php') {
                                            echo "text-dark";
                                        } ?>"><i class="fas fa-history"></i> ประวัติ</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item <?php if (basename($_SERVER['PHP_SELF']) == 'history_order.php') {
                                                    echo "active";
                                                } ?> " href="history_order.php"><i class="fas fa-list-alt"></i> ประวัติการขายสินค้า</a>

                        <a class="dropdown-item <?php if (basename($_SERVER['PHP_SELF']) == 'history_product_add_stock.php') {
                                                    echo "active";
                                                } ?> " href="history_product_add_stock.php"><i class="far fa-list-alt"></i> ประวัติการนำสินค้าเข้าสต็อก</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="<?php if (basename($_SERVER['PHP_SELF']) == 'summaryED.php' || basename($_SERVER['PHP_SELF']) == 'summaryNED.php' || basename($_SERVER['PHP_SELF']) == 'report_product_add_stock.php') {
                                            echo "text-dark";
                                        } ?>"><i class="fas fa-file-download"></i> รายงาน</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item <?php if (basename($_SERVER['PHP_SELF']) == 'summaryED.php') {
                                                    echo "active";
                                                } ?> " href="summaryED.php"><i class="fas fa-chart-pie"></i> รายงานผลประกอบการ ED</a>
                        <a class="dropdown-item <?php if (basename($_SERVER['PHP_SELF']) == 'summaryNED.php') {
                                                    echo "active";
                                                } ?> " href="summaryNED.php"><i class="fas fa-chart-pie"></i> รายงานผลประกอบการ NED</a>

                        <a class="dropdown-item <?php if (basename($_SERVER['PHP_SELF']) == 'report_product_add_stock.php') {
                                                    echo "active";
                                                } ?> " href="report_product_add_stock.php"><i class="fas fa-cart-arrow-down"></i> รายงานการเพิ่มสินค้าเข้าสต็อก</a>
                    </div>
                </li>




            </ul>
            <?php if (basename($_SERVER['PHP_SELF']) == 'index.php' || basename($_SERVER['PHP_SELF']) == 'product_add_stock.php' || basename($_SERVER['PHP_SELF']) == 'product_edit.php') { ?>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a title="เปลี่ยนความสูงของตารางในหน้านี้" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="<?php if (basename($_SERVER['PHP_SELF']) == 'index.php' || basename($_SERVER['PHP_SELF']) == 'product_add_stock.php' || basename($_SERVER['PHP_SELF']) == 'product_edit.php') {
                                                echo "text-dark";
                                            } ?>"><i class="far fa-window-maximize"></i> เปลี่ยนความสูงตาราง</span>
                        </a>
                        <div class="dropdown-menu text-center" aria-labelledby="navbarDropdownMenuLink2">
                            <a class="dropdown-item table-height-change" href="#.php" data-height="200">200 px</a>
                            <a class="dropdown-item table-height-change" href="#.php" data-height="300">300 px</a>
                            <a class="dropdown-item table-height-change" href="#.php" data-height="400">400 px</a>
                            <a class="dropdown-item table-height-change" href="#.php" data-height="500">500 px</a>
                            <a class="dropdown-item table-height-change" href="#.php" data-height="600">600 px</a>
                            <a class="dropdown-item table-height-change" href="#.php" data-height="700">700 px</a>
                            <a class="dropdown-item table-height-change" href="#.php" data-height="800">800 px</a>
                            <a class="dropdown-item table-height-change" href="#.php" data-height="900">900 px</a>
                            <a class="dropdown-item table-height-change" href="#.php" data-height="1000">1000 px</a>

                        </div>
                    </li>

                </ul>
            <?php } ?>


            <?php
            // $_SESSION["username"] = "someone";
            if (isset($_SESSION["user_name"])) { ?>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown" style="float:right;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span><i class="fas fa-user-tie"></i> <?= $_SESSION["user_name"] ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" target="_blank" href="./_etc/manual.pdf" id=""><i class="fas fa-book"></i> คู่มือการใช้งาน</a>
                            <a class="dropdown-item text-danger" href="./model/model_user_logout.php" id="logout-button"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>

                        </div>
                    </li>
                </ul>
            <?php } ?>

            <!-- <form class="form-inline my-2 my-lg-0 mr-auto">
                                            <input class="form-control mr-sm-1" type="search" placeholder="Search" aria-label="Search">
                                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                                        </form> -->

        </div>
    </nav>

<?php } ?>