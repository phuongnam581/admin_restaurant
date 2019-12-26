<?php
    include_once('C:\xampp\htdocs\admin_balo\controller\SignUpController.php');
    $userController = new SignUpController();
    if(isset($_POST['error'])){
      unset($_SESSION['error']);
    }
    if(isset($_POST['login'])){
        $email=$_POST['inputEmail'];
        $password=$_POST['inputPassword'];
        $check=$userController->dangnhapTk($email,$password);
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
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Đăng Nhập</title>
    <base href="http://localhost:8888/admin_balo/">

    <!-- Bootstrap core CSS -->
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">

    <link href="admin/css/style-responsive.css" rel="stylesheet" />
    <link href="admin/css/login-form.css" rel="stylesheet">



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body>
  
	
  
    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="post" action="">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" name="inputEmail" class="form-control" placeholder="Email" required autofocus>
                <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
                
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login">Sign in</button>
            </form><!-- /form -->
            <a href="views/register.php" class="forgot-password">
               Đăng Kí
            </a>
            <?php if(isset($_SESSION['error'])){
                echo "<div class='text-danger' size='3'>".$_SESSION['error']."</div>";
            }
            unset($_SESSION['error']);
	          ?>	
        </div><!-- /card-container -->
    </div><!-- /container -->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="admin/js/jquery.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
    
  </body>

<!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:43:32 GMT -->
</html>
