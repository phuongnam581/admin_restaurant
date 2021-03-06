<?php
    session_start();
    include_once('C:\xampp\htdocs\admin_balo\controller\TypeController.php');
    include_once('C:\xampp\htdocs\admin_balo\model\TypeModel.php');
    $model = new TypeModel;
    $id=$_GET['type'];
    $data=$model->getProductsByType($id);
    
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
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Danh Sách Sản Phẩm</title>
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
        <!--sidebar end-->

        <!--main content start-->
        <section id="main-content">
        <section class="wrapper">
    <div class="panel panel-body">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Danh sách loại</b>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Mã hàng</th>
                                <th>Tên</th>
                                <th>Mô tả</th>
                                <th>Giá</th>
                                <th>Số Lượng Tồn</th>
                                <th>Trạng Thái (mới)</th>
                                <th>Tuỳ chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($data as $t):
                            ?>                          
                            <tr id="sanpham-<?= $t->product_code?>">
                                <td><?= $t->product_code?></td>
                                <td class="name-<?= $t->product_code?>"><?= $t->name?></td>
                                <td><?=$t->detail?></td>
                                <td><?=number_format($t->value)?></td>
                                <td><?=$t->quanlity_exist?></td>
                                <td>
                                <input type="checkbox" name="" value="" disabled="disabled" <?php if($t->new ==1){?>checked<?php }?>>
                                </td>
                                <td>
                                    <a style=" padding-bottom:10px" href="views/edit-products.php?id=<?= $t->product_code?>"><button class="btn btn-warning btn-sm" style="width:100%;">Sửa</button></a>
                                    <br><br>
                                    <button class="btn btn-primary btn-sm btn-call-modal" data-id="<?= $t->product_code?>">Xóa</button>
                                </td>
                            </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</section>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <p>Bạn có chắc chắn xoá <span class="nameObj">...</span> không?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btnAccept">Đồng Ý</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
      </div>
    </div>
  </div>
</div>
<div id="Message" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <p class="your-mess"></p>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Đồng Ý</button>
      </div>
    </div>
  </div>
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

        var id =''
        $('.btn-call-modal').click(function(){
            $('#myModal').modal('show')
            id = $(this).attr('data-id')
            var name = $('.name-'+id).text();
            $('.nameObj').html("<b>"+name+"</b>");
        })
        $('.btnAccept').click(function(){
            if(id!=''){
                $.ajax({
                    url:"deletefood.php",
                    data:{
                        id:id
                    },
                    type:"GET",
                    success:function(data){
                        var mess = "";
                        $('#myModal').modal('hide')
                        if($.trim(data)=='error'){
                            mess = "Không thể xoá"
                        }
                        else if($.trim(data)=='success'){
                            mess = "Xoá thành công";
                            location.reload();
                        }
                        else mess = "Thất bại, vui lòng thử lại"
                        $('.your-mess').html(mess)
                        $('#Message').modal('show') 
                         
                    }  
                })
            }
        })

    </script>

</body>

<!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:43:32 GMT -->

</html>