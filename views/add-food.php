<?php
    session_start();
    include_once('C:\xampp\htdocs\admin_balo\model\AddFoodModel.php');
    include_once('C:\xampp\htdocs\admin_balo\model\EditFoodModel.php');
    $model = new AddFoodModel;
    $model1=new EditFoodModel;
    $types=$model1->getType();
    $distributor=$model->getDistributor();
    $url="location:http://localhost:8888/admin_balo/views/add-food.php";
    if(isset($_POST['submit'])){
        $id_type=$_POST['type'];
        $product_code=trim($_POST['code']);
        $name=trim($_POST['name']);
        $detail=trim($_POST['detail']);
        $value=$_POST['price'];
        $img=trim($_POST['image']);
        $id_distributor=$_POST['distributor'];
        $quanlity_exist=$_POST['quanlity'];
        $date=date('Y-m-d');
        if(isset($name) === true && $name === ''){
            // print_r('aab');
            // die;
            $_SESSION['loi']='Tên không hợp lệ';
            header($url);
            return;
        }
        elseif(isset($product_code) === true &&  $product_code === ''){
            // print_r('aaa');
            // die;
            $_SESSION['loi']='Mã SP không hợp lệ';
            header($url);
            return;
        }elseif(isset($detail) === true && $detail === ''){
            $_SESSION['loi']='Mô tả không hợp lệ';
            header($url);
            return;
        }elseif(isset($img) === true && $img === ''){
            $_SESSION['loi']='Ảnh không hợp lệ';
            header($url);
            return;
        }
        strtoupper($product_code);
        $check1= $model->insertProduct($id_type,$product_code,$name,$detail,$value,$img,$id_distributor,$quanlity_exist,$date);
        if($check1==false){
           $_SESSION['message']="Cập Nhật Thất Bại";
       }else{
            $_SESSION['message']="Cập Nhật Thành Công";
            header("Refresh:0");
       }
    }
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:42:50 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.ht  ml">

    <title>Thêm Sản Phẩm</title>
    <base href="http://localhost:8888/admin_balo/">

    <!-- Bootstrap core CSS -->
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="stylesheet" href="admin/css/owl.carousel.css" type="text/css">

    <!--right slidebar-->
    <link href="admin/css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="admin/css/style.css" rel="stylesheet">
    <link href="admin/css/style-responsive.css" rel="stylesheet" />
    <script src="admin/ckeditor/ckeditor.js"></script>
    <script src="admin/ckfinder/ckfinder.js"></script>
    <script src="admin/js/jquery.js"></script>
</head>
<body>
    <section id="container">
    <?php 
        if(!isset($_SESSION['nameAdmin'])){
            header("Location: http://localhost:8888/admin_balo/views/login.php");
            die();
        }
        include_once('header.php');
        include_once('menu.php');
    ?>

        <!--sidebar start-->
       
        <!--sidebar end-->

        <!--main content start-->
        <section id="main-content">
        <div>
<section class="wrapper">
    <div class="panel panel-body">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Thêm món ăn mới</b>
                </div>
                <div class="panel-body">
                <?php if(isset($_SESSION['message'])):?>
                    <div class="alert alert-danger"><?php echo $_SESSION['message']?></div>
                    <?php endif?>
                    <?php unset($_SESSION['message'])?>
                    <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-2">Chọn loại:</label>
                            <div class="col-sm-10">
                                <select name="type" class="form-control">
                                   <?php foreach($types as $t):?>
                                    <option value="<?= $t->id?>"><?= $t->name?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Mã sản phẩm:</label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" name="code" required maxlength="8" minlength="4">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Tên sản phẩm:</label>
                            <div class="col-sm-10">
                            <input type="text"  class="form-control" name="name" required maxlength="20" minlength="4">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Mô tả:</label>
                            <div class="col-sm-10">
                                <textarea name="detail" class="form-control" id="desc" required maxlength="50" minlength="4"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Đơn giá:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="price" placeholder="Nhập giá sản phẩm" required max="10000" min="10">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Số Lượng Tồn:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="quanlity" placeholder="Nhập số lượng tồn" required max="200" min="1">
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-2">Ảnh:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="image" placeholder="Nhập đường dẫn ảnh" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Chọn Nhà Phân Phối:</label>
                            <div class="col-sm-10">
                                <select name="distributor" class="form-control">
                                   <?php foreach($distributor as $d):?>
                                    <option value="<?= $d->id?>"><?= $d->name?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary" name="submit">Thêm</button>
                            </div>
                        </div>

                    </form>
                    <?php if(isset($_SESSION['loi'])){
		                                echo "<div style='color:red;' class='input-tb'>".$_SESSION['loi']."</div>";
	                        }
                    ?>	
                </div>
            </div>
        </section>
    </div>
</section>
        </div>
      

        </section>
        <!--main content end-->
        <!--footer start-->
        <footer class="site-footer">
            <div class="text-center">
                2018 &copy; Old Friend.
                <a href="#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
        <!--footer end-->
    </section>
    <?php
    if(isset($_SESSION['loi'])){
      unset($_SESSION['loi']);
    }
  ?>
    <!-- js placed at the end of the document so the pages load faster -->
    
    <script src="admin/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="admin/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="admin/js/jquery.scrollTo.min.js"></script>
    <script src="admin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="admin/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="admin/js/owl.carousel.js"></script>
    <script src="admin/js/jquery.customSelect.min.js"></script>
    <script src="admin/js/respond.min.js"></script>

    <!--right slidebar-->
    <script src="admin/js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="admin/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="admin/js/sparkline-chart.js"></script>
    <script src="admin/js/easy-pie-chart.js"></script>
    <script src="admin/js/count.js"></script>

    <script>

        //owl carousel

        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true,
                autoPlay: true

            });
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>

</body>

<!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:43:32 GMT -->

</html>