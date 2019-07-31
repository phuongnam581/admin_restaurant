<?php
    session_start();
    include_once('C:\xampp\htdocs\admin_nhahang\controller\MenuController.php');
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
                    <?php if($_SESSION['status']==1):?>
                    <li><a  href="views/manage-bill.php?status=0">DS Đơn Hàng Chưa Xác Nhận</a></li>
                    <li><a  href="views/manage-bill.php?status=1">DS Đơn Hàng Đã Xác Nhận</a></li>
                    <li><a  href="views/manage-bill.php?status=3">DS Đơn Hàng Bị Hủy</a></li>
                    <?php endif?> 
                    <?php if($_SESSION['status']==2):?>
                    <li><a  href="views/manage-bill.php?status=2">DS Đơn Hàng Hoàn Tất</a></li>
                    <?php endif?>           
                </ul>
            </li>
            <?php if($_SESSION['status']==2):?>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class=" fa fa-envelope"></i>
                    <span>Quản Lí Người Dùng</span>
                </a>
                <ul class="sub">
                    <li><a  href="views/delete-user.php?status=0">Khách Hàng</a></li>
                    <li><a  href="views/delete-user.php?status=1">Nhân Viên Bán Hàng</a></li>
                    <li><a  href="views/delete-user.php?status=2">Quản Trị Hệ Thống</a></li>
                </ul>
            </li>    
            <li>
                <a href="views/add-user.php" >
                    <i class="fa fa-plus"></i>
                    <span>Thêm người dùng</span>
                </a>
            </li>
            <li>
                <a href="views/list-comment.php" >
                    <i class="fa fa-plus"></i>
                    <span>Trả Lời Bình Luận</span>
                </a>
            </li>
            <?php endif?>
            <?php if($_SESSION['status']==1):?>
            <li>
                <a href="views/add-type.php" >
                    <i class="fa fa-plus"></i>
                    <span>Thêm loại sản phẩm</span>
                </a>
            </li>
            <li>
                <a href="views/add-food.php" >
                    <i class="fa fa-plus"></i>
                    <span>Thêm sản phẩm</span>
                </a>
            </li>
            <li>
                <a href="views/list-type.php" >
                    <i class="fa fa-bars"></i>
                    <span>Danh sách loại SP</span>
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
            <?php endif?>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>