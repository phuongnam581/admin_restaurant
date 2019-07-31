<?php
    session_start();
    include_once('C:\xampp\htdocs\admin_nhahang\model\BillModel.php');
    include_once('C:\xampp\htdocs\admin_nhahang\model\EditFoodModel.php');
    $status=$_GET['status'];
    $model= new BillModel;
    $model1= new EditFoodModel;
    $bills=$model->getBill($status);
    $result=$model->countBill($status);
    $array = get_object_vars($result);
    $count=$array["COUNT(id)"];

   
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
                    <b>
                    Danh sách ĐH 
                   <?php if($status==0){?>
                    chưa xác nhận
                   <?php }elseif($status==1){?>
                    đã xác nhận
                   <?php }elseif($status==2){?>
                    hoàn tất
                   <?php }else{?>
                    bị huỷ
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
                            <th>Ghi chú</th>
                            <?php if($status==0||$status==1):?>
                            <th>Tuỳ chọn</th>
                           <?php endif?>
                        </thead>
                        <tbody>
                          <?php foreach($bills as $bill):?>
                            <tr id="bill-<?= $bill->id?>}">
                            <?php $idBill= $bill->id;
                                  $food=$model->getFoods($status,$idBill);
                            ?>
                                <td>HD-<?= $bill->id?></td>
                                <td><?= date('d-m-Y H:i:s',strtotime($bill->date_order))?></td>
                                <td>
                                    <p><?= $bill->name?></p>
                                    <p><?= $bill->phone?></p>
                                   
                                </td>
                                <td><p><?= $bill->address?></p></td>   
                                <td>
                                   <?php foreach($food as $f):?>
                                    <div>
                                        <p><?= $f->name?></p>
                                        <hr>
                                    </div>
                                    <?php endforeach?>
                                </td>
                                <td> <p><?= $bill->total?></p></td>

                                <td> <p><?= $bill->note?></p></td>
                               <?php if($status==0||$status==1):?>
                                <td>
                                <button onclick="myFunction() style="width:100%" class="btn btn-sm btn-danger btn-cancel" data-id="<?= $bill->id?>" data-status="">Huỷ đơn hàng</button>

                                    <br>
                                   <?php if($status==1):?>
                                    <button style="width:100%" class="btn btn-sm btn-success" data-id="<?= $bill->id?>" data-status="">Hoàn tất</button>
                                   <?php endif?>
                                </td>
                               <?php endif?>
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Huỷ</button>
                <button type="button" class="btn btn-primary" id="btn-continue" data-id="null">Tiếp tục</button>
            </div>
        </div>
    </div>
</div>
      
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title1">
                    
                </h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Huỷ</button>
                <button type="button" class="btn btn-primary" id="btn-go" data-id="null">Tiếp tục</button>
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
            $('.btn-cancel').click(function(){
        var idBill = $(this).attr('data-id')
        $('.modal-title').text('ĐH HD-'+idBill+' sẽ chuyển sang trạng thái huỷ!')
        $('#myModal').modal('show')
        $('#btn-continue').attr('data-id',idBill)
    })
    $('.btn-success').click(function(){
        var idBill = $(this).attr('data-id')
        $('.modal-title1').text('ĐH HD-'+idBill+' sẽ chuyển sang trạng thái hoàn tất!')
        $('#myModal1').modal('show')
        $('#btn-go').attr('data-id',idBill)
    })
    $('#btn-continue').click(function(){
        var idBill = $(this).attr('data-id')
        $.ajax({
            url:"editbill.php",
            type:'POST',
            data:{
                id_bill:idBill,
                status:3
            },
            success:function(res){
                // console.log(res)
                if($.trim(res)=='ok'){
                    $('#bill-'+idBill).remove()
                    $('#myModal').modal('hide')
                    alert('Cập nhật thành công')
                }
                else 
                    alert('Vui lòng thử lại')
            },
            error:function(){
                console.log('errr')
            }
        })
    })

    $('#btn-go').click(function(){
        var idBill = $(this).attr('data-id')
        $.ajax({
            url:"editbill.php",
            type:'POST',
            data:{
                id_bill:idBill,
                status:2
            },
            success:function(res){
                // console.log(res)
                if($.trim(res)=='ok'){
                    $('#bill-'+idBill).remove()
                    $('#myModal1').modal('hide')
                    alert('Cập nhật thành công')
                }
                else 
                    alert('Vui lòng thử lại')
            },
            error:function(){
                console.log('errr')
            }
        })
    })
        });

        //custom select box

        $(function () {
            $('select.styled').customSelect();
        });

    </script>

</body>

<!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:43:32 GMT -->

</html>