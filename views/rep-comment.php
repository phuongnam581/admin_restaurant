<?php
    session_start();
    include_once('C:\xampp\htdocs\admin_nhahang\model\CommentModel.php');
    $model= new CommentModel;
    $idCmt=$_GET['id'];
    $comment=$model->getCmtById($idCmt);
    if(isset($_POST['submit'])){
        $rep=$_POST['rep'];
        $check=$model->addRepComment($rep,$idCmt);
        if(!$check){
            $_SESSION['message']="Trả Lời Thất Bại";
        }else{
            $_SESSION['message']="Trả Lời Thành Công";
            $check1=$model->updateComment($idCmt);
            if(!$check1){
                $_SESSION['message']="Cập Nhật Thất Bại";
            }
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

    <title>Sửa Loại Sản Phẩm</title>
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
                    <b>Trả Lời Comment</b>
                </div>
                <div class="panel-body">
                   <?php if(isset($_SESSION['message'])):?>
                    <div class="alert alert-danger"><?php echo $_SESSION['message']?></div>
                    <?php endif?>
                    <?php unset($_SESSION['message'])?>
                    <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                            <label class="col-sm-2">Tên Người Dùng:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="username"  value="<?= $comment->username?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Bình Luận Người Dùng:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name"  value="<?= $comment->message?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Trả Lời:</label>
                            <div class="col-sm-10">
                                <textarea name="rep" class="form-control" id="desc" required></textarea>
                                <script>
                                    CKEDITOR.replace('desc')
                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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