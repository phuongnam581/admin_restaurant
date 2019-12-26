<?php
    session_start();
    include_once('C:\xampp\htdocs\admin_balo\controller\MenuController.php');
    $c= new MenuController;
    $result = $c->getType();
?>
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="active" href="views/layout.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class=" fa fa-envelope"></i>
                    <span>Quản Lí Đơn Hàng</span>
                </a>
                <ul class="sub">
                    <li><a  href="views/manage-bill.php?status=0">DS Đơn Hàng Chưa Duyệt</a></li>
                    <li><a  href="views/manage-bill.php?status=1">DS Đơn Hàng Đang Giao</a></li>
                    <li><a  href="views/manage-bill.php?status=2">DS Đơn Hàng Hoàn Tất</a></li>
                    <li><a  href="views/manage-bill.php?status=3">DS Đơn Hàng Bị Hủy</a></li>    
                </ul>
            </li>
            <li>
                <a href="views/add-type.php" >
                    <i class="fa fa-plus"></i>
                    <span>Thêm loại sản phẩm</span>
                </a>
            </li>
            <li>
                <a href="views/list-type.php" >
                    <i class="fa fa-bars"></i>
                    <span>Danh sách loại SP</span>
                </a>
            </li>       
            <li>
                <a href="views/add-food.php" >
                    <i class="fa fa-plus"></i>
                    <span>Thêm sản phẩm</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-bars"></i>
                    <span>Danh sách SP theo loại</span>
                </a>
                <ul class="sub">
                    <?php foreach($result as $t):?>
                    <li><a  href="views/list-products.php?type=<?= $t->id?>"><?= $t->name?></a></li>
                    <?php endforeach?>
                </ul>
            </li>
            <li>
                <a href="views/statistical.php" >
                    <i class="fa fa-plus"></i>
                    <span>Thống Kê</span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>