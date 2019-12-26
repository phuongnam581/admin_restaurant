<?php
    session_start();
    include_once('C:\xampp\htdocs\admin_balo\model\BillModel.php');
    $status=$_GET['status'];
    $model= new BillModel;
    $order=$model->getOrder($status);
    $result=$model->countOrder($status);
    $array = get_object_vars($result);
    $count=$array["COUNT(id)"];
    $shiper=$model->getShipper();
    $result1=$model->getIdEmploy($_SESSION['nameAdmin']);
    $array1 = get_object_vars($result1);
    $idEmploy=$array1["id"];
    $idName=$array1["fullname"];
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

    <title>Quản Lí Hóa Đơn</title>
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
       
        <section id="main-content">
    <section class="wrapper">
      <div class="panel panel-body">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>
                    Danh sách ĐH 
                   <?php if($status==0){?>
                    chưa duyệt
                   <?php }elseif($status==1){?>
                    đang giao
                   <?php }elseif($status==2){?>
                    hoàn tất
                   <?php }elseif($status==3){?>
                    hủy
                   <?php }?>
                    </b>
                </div>
                <div class="panel-body">
                   <?php if($count>0){?>
                    <table class="table">
                        <thead>
                            <th>Mã hoá đơn</th>
                            <th>Ngày đặt</th>
                            <th>Khách hàng</th>
                            <th>Địa chỉ giao hàng</th>
                            <th>Sản phẩm</th>
                            <th>Tổng tiền</th>
                            <?php if($status==0):?>
                            <th>Nhân Viên Giao</th>
                            <?php endif?>
                            <?php if($status==0||$status==1):?>
                            <th>Tuỳ chọn</th>
                           <?php endif?>
                        </thead>
                        <tbody>
                         <span style="display:none;" id="id_employ"><?= $idEmploy?></span>
                         <span style="display:none;" id="id_name"><?= $idName?></span>
                         
                          <?php foreach($order as $o):?>
                            <tr id="Order-<?= $o->id?>}">
                            <?php $idOrder= $o->id;
                                  $food=$model->getProductDetail($status,$idOrder);
                            ?>
                                <td>HD-<?= $o->id?></td>
                                <td><?= date('d-m-Y',strtotime($o->created_at))?></td>
                                <td>
                                    <p><?= $o->username?></p>
                                </td>
                                <td><p><?= $o->address?></p></td>   
                                <td>
                                   <?php foreach($food as $f):?>
                                    <div>
                                        <p><?= $f->name?></p>
                                        <br>
                                    </div>
                                    <?php endforeach?>
                                </td>
                                <td> <p><?=number_format($o->total)?></p></td>
                                <?php if($status==0):?>
                                <td>    
                                    <select style="height: 28px" id="categoryEmploy">
                                    <?php foreach($shiper as $s):?>
							            <option value="<?=$s->id?>" id="<?=$s->id?>"><?=$s->fullname?> (<?=$s->count?>)</option>
                                    <?php endforeach?>
						            </select>
                                </td>
                                <?php endif?>
                               <?php if($status==0){?>
                                <td>
                                <button style="width:100%" id="btnDuyet" class="btn btn-sm btn-success btnDuyet" data-id="<?= $o->id?>" data-status="<?= $o->status?>" data-cus="<?= $o->id_customer?>">Duyệt</button>
                                </td>
                                <td>
                                <button style="width:100%" id="btnHuy" class="btn btn-sm btn-danger btnHuy" data-id="<?= $o->id?>"  data-cus="<?= $o->id_customer?>" data-status="3">Hủy</button>
                                </td>
                               <?php }else if($status==1){?>
                                <td>
                                <button style="width:100%" id="btnHoanTat" class="btn btn-sm btn-success btnHoanTat" data-id="<?= $o->id?>" data-status="<?= $o->status?>" data-cus="<?= $o->id_customer?>">Hoàn Tất</button>
                                </td>
                               <?php }?>
                            </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                   <?php }else{?>
                    Chưa có đơn hàng
                   <?php }?>
                </div>
            </div>
        </section>
      </div>
    </section>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    
                </h4>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCancel">Close</button>
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
        
        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true,
                autoPlay: true

            });
           
     
    $('.btnDuyet').click(function(){
        var idOrder = $(this).attr('data-id');
        var idStatus= $(this).attr('data-status');
        var idCus=$(this).attr('data-cus');
        var idEmploy= $('#id_employ').text();   
        var idName= $('#id_name').text();
        var idShiper=$('#categoryEmploy').val();
        $.ajax({
            url:"/admin_balo/editbill.php",
            type:'POST',
            data:{
                idOrder:idOrder,
                idStatus:idStatus,
                idEmploy:idEmploy,
                idShiper:idShiper,
                idName:idName,
                idCus:idCus
            },
            success:function(res){
                 console.log(res)
                if($.trim(res)=='Cập Nhật Thất Bại'){
                    $('.modal-title').text('Cập Nhật Thất Bại');
                    $('#myModal').modal('show');
                }
                else if($.trim(res)=='Gửi Email Thất Bại'){
                    $('.modal-title').text('Gửi Email Thất Bại');
                    $('#myModal').modal('show');
                }else if($.trim(res)=='ok'){
                    $('.modal-title').text('ĐH HD-'+idOrder+'đã được chuyển qua trạng thái giao!');
                    $('#myModal').modal('show');
                    
                }
            },
            error:function(err){
                console.log(err);
            }
        })
      
    })
    $('.btnHoanTat').click(function(){
        var idOrder = $(this).attr('data-id');
        var idStatus= $(this).attr('data-status');
        var idCus=$(this).attr('data-cus');
        var idName= $('#id_name').text();
        $.ajax({
            url:"/admin_balo/editbill.php",
            type:'POST',
            data:{
                idOrder:idOrder,
                idStatus:idStatus,
                idName:idName,
                idCus:idCus
            },
            success:function(res){
                 console.log(res)
                if($.trim(res)=='Cập Nhật Thất Bại'){
                    $('.modal-title').text('Cập Nhật Thất Bại');
                    $('#myModal').modal('show');
                }
                else if($.trim(res)=='Gửi Email Thất Bại'){
                    $('.modal-title').text('Gửi Email Thất Bại');
                    $('#myModal').modal('show');
                }else if($.trim(res)=='ok'){
                    $('.modal-title').text('ĐH HD-'+idOrder+'đã được chuyển qua trạng thái hoàn tất!');
                    $('#myModal').modal('show');
                    
                }
            },
            error:function(err){
                console.log(err);
            }
        })
      
    })
    $('.btnHuy').click(function(){
        var idOrder = $(this).attr('data-id');
        var idStatus= $(this).attr('data-status');
        var idCus=$(this).attr('data-cus');
        var idName= $('#id_name').text();
        $.ajax({
            url:"/admin_balo/editbill.php",
            type:'POST',
            data:{
                idOrder:idOrder,
                idStatus:idStatus,
                idName:idName,
                idCus:idCus
            },
            success:function(res){
                 console.log(res)
                if($.trim(res)=='Cập Nhật Thất Bại'){
                    $('.modal-title').text('Cập Nhật Thất Bại');
                    $('#myModal').modal('show');
                }
                else if($.trim(res)=='Gửi Email Thất Bại'){
                    $('.modal-title').text('Gửi Email Thất Bại');
                    $('#myModal').modal('show');
                }else if($.trim(res)=='ok'){
                    $('.modal-title').text('ĐH HD-'+idOrder+'đã được chuyển qua trạng thái hủy!');
                    $('#myModal').modal('show');
                    
                }
            },
            error:function(err){
                console.log(err);
            }
        })
    })
    $('#btnCancel').click(function () { 
        location.reload();
        
     });
})
    </script>

</body>

<!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:43:32 GMT -->

</html>