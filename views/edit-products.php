<?php
    session_start();
    include_once('C:\xampp\htdocs\admin_nhahang\model\EditFoodModel.php');
    $model=new EditFoodModel;
    $id=$_GET['id'];
    $food=$model->getFoodsById($id);
    $types=$model->getType();
    if(isset($_POST['submit'])){
        $id_type=$_POST['type'];
        $name=$_POST['name'];
        $summary=$_POST['summary'];
        $detail=$_POST['detail'];
        $price=$_POST['price'];
        $promotion_price=$_POST['promotion_price'];
        $promotion=$_POST['promotion'];
        $unit=$_POST['unit'];
        if(isset($_POST['today'])){
            $today=$_POST['today'];
        }else{
            $today=0;
        }         
        $image=$_POST['image']; 
        $check= $model->updateFood($id,$id_type,$name,$summary,$detail,$price,$promotion_price,$promotion,$image,$unit,$today);
        
        if($check==false){
           $_SESSION['message']="Cập Nhật Thất Bại";
       }else{
            $_SESSION['message']="Cập Nhật Thành Công";
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

    <title>Sửa Món Ăn</title>
    <base href="http://localhost:8888/admin_nhahang/">

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
        
        <?php include_once('header.php')?>

        <!--sidebar start-->
        <?php 
        if(isset($_SESSION['name'])):
        include_once('menu.php');
        endif?>
        <!--sidebar end-->

        <!--main content start-->
        <section id="main-content">
        <section class="wrapper">
    <div class="panel panel-body">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Cập nhật món ăn <span style="color:blue"><?= $food->name?></span></b>
                </div>
                <div class="panel-body">
                    <?php if(isset($_SESSION['message'])):?>
                    <div class="alert alert-danger"><?php echo $_SESSION['message']?></div>
                    <?php endif?>
                    <?php unset($_SESSION['message'])?>
                    <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-2">Tên:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên món ăn" value="<?= $food->name?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Chọn loại:</label>
                            <div class="col-sm-10">
                                <select name="type" class="form-control">
                                    <?php foreach($types as $t):?>
                                    <option value="<?= $t->id?>" <?php if($food->id_type==$t->id):?> selected <?php endif?>><?= $t->name?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Nguyên liệu:</label>
                            <div class="col-sm-10">
                                <textarea rows="5" class="form-control" name="summary" required><?= $food->summary?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Mô tả:</label>
                            <div class="col-sm-10">
                                <textarea name="detail" class="form-control" id="desc" required><?=$food->detail?></textarea>
                                <script>
                                    CKEDITOR.replace('desc')
                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Đơn giá:</label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $food->price?>" class="form-control" name="price" placeholder="Nhập giá món ăn" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Đơn giá khuyến mãi:</label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $food->promotion_price?>" class="form-control" name="promotion_price" placeholder="Nhập giá khuyến mãi" value="0" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Khuyến mãi kèm theo:</label>
                            <div class="col-sm-10">
                                <select name="promotion" class="form-control">
                                    <option value="khăn lạnh">Khăn lạnh</option>
                                    <option value="nước ngọt">Nước ngọt</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Đơn vị tính:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="unit" placeholder="Nhập đơn vị tính" value="<?= $food->unit?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Trong ngày:</label>
                            <div class="col-sm-10">
                                <input type="checkbox" name="today" value='1'  <?php if($food->today==1):?> checked <?php endif?> >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Hình Ảnh:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="image" placeholder="Nhập tên ảnh" value="<?= $food->image?>" required>
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary" name="submit">Update</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </section>
    </div>
</section>
      

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