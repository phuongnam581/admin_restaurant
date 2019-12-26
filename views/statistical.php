<?php
session_start();
include_once 'C:\xampp\htdocs\admin_balo\model\StatisticalModel.php';
$model=new StatisticalModel;
$dateStart=date('d-m-y');
$dateEnd=date('d-m-y');
if(isset($_POST['submit'])){
$dateStart=$_POST['start'];
$newStart = date("d-m-Y", strtotime($dateStart));
$dateEnd=$_POST['end'];
$newEnd = date("d-m-Y", strtotime($dateEnd));
}
$data=$model->getStatis($dateStart,$dateEnd);
// print_r($data);
// die;
?>
<!DOCTYPE html>
<html lang="en">
  <!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:42:50 GMT -->

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="Mosaddek" />
    <meta
      name="keyword"
      content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina"
    />
    <link rel="shortcut icon" href="img/favicon.ht  ml" />

    <title>Thống Kê</title>
    <base href="http://localhost:8888/admin_balo/" />

    <!-- Bootstrap core CSS -->
    <link href="admin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="admin/css/bootstrap-reset.css" rel="stylesheet" />
    <!--external css-->
    <link
      href="admin/assets/font-awesome/css/font-awesome.css"
      rel="stylesheet"
    />
    <link
      href="admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css"
      rel="stylesheet"
      type="text/css"
      media="screen"
    />
    <link rel="stylesheet" href="admin/css/owl.carousel.css" type="text/css" />

    <!--right slidebar-->
    <link href="admin/css/slidebars.css" rel="stylesheet" />

    <!-- Custom styles for this template -->

    <link href="admin/css/style.css" rel="stylesheet" />
    <link href="admin/css/style-responsive.css" rel="stylesheet" />
    <script src="admin/ckeditor/ckeditor.js"></script>
    <script src="admin/ckfinder/ckfinder.js"></script>
    <script src="admin/js/jquery.js"></script>
  </head>
  <body>
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
          <div class="panel panel-body" style="height:auto;">
          <form action="" method="POST" style="margin:8% 29%;">      
              <span>Từ Ngày</span>
              <input type="date" id="start" name="start"/>
              <input style="display:none;" value="a" id="put"/>
              <span>Đến Ngày</span>
              <input type="date" id="end" name="end"/>
              <button type="submit" name="submit" class="btn btn-warning btn-sm" id="in">IN</button>
          </form>      
            <div class="container" id="contain">
              <h3 style="margin-top: 0%;padding-left:8%;">THỐNG KÊ SỐ LƯỢNG SẢN PHẨM BÁN RA TỪ NGÀY <?php if(isset($newStart)) echo($newStart)?> ĐẾN NGÀY <?php if(isset($newEnd)) echo($newEnd)?></h3>
              <table class="table table-bordered" style="width:80%;margin:0 auto;">
                <thead>
                  <tr>
                    <th class="col-sm-1" style="width:1%;">STT</th>
                    <th class="col-sm-2" style="width:3%;">Mã Sản Phẩm</th>
                    <th class="col-sm-2">Tên Sản Phẩm</th>
                    <th class="col-sm-2" style="width:2%;">Số Lượng</th>
                  </tr>
                </thead>             
                <tbody>                
                  <?php                    
                      $stt=0;
                      foreach($data as $t):
                  ?>
                  <tr>
                    <td><?=++$stt?></td>
                    <td><?= $t->id_product?></td>
                    <td><?=$t->name?></td>
                    <td><?=$t->sum?></td>                
                  </tr>
                  
                      <?php endforeach?>            
                </tbody>
               
              </table>
            </div>
          </div>
        </section>
      </section>
      <!--main content end-->
      <!--footer start-->

      <!--footer end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->

    <script src="admin/js/bootstrap.min.js"></script>
    <script
      class="include"
      type="text/javascript"
      src="admin/js/jquery.dcjqaccordion.2.7.js"
    ></script>
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

      $(document).ready(function() {
        $("#owl-demo").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true,
          autoPlay: true
        });
  //       if($('#put').val()==="a"){
  //  //     $('#contain').css("display","none");
  //       $('#put').val("b");
  //       }
  //       if($('#put').val()==="b"){
  //         $('#contain').css("display","block");
  //       }
        $("#in").click(function(){
          $('#contain').css("display","block");
          $('#put').val("a");
          var dateStart=$('#start').val();
          var dateEnd=$('#end').val();
          if(dateStart==="" || dateEnd===""){
            alert('Vui Lòng Chon Ngày');
            return;
          }
          $('#contain').css("display","block");
        })
     //   $('#contain').css("display","block");
      });
     
      //custom select box

      $(function() {
        $("select.styled").customSelect();
      });
    </script>
  </body>

  <!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:43:32 GMT -->
</html>
