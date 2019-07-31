<?php
session_start();
include_once('C:\xampp\htdocs\admin_nhahang\model\SignUpModel.php');
class SignUpController{
    function dangkiTK($username, $password,$phone){
       $userModel = new SignUpModel();
       $check=$this->selectUse($username);
        if($check==false){
           $result= $userModel->insertUser($username,$password,$phone,$status=0);
            $_SESSION['success']='Đăng Kí Thành Công';          
            if(isset($_SESSION['error'])){
                unset($_SESSION['error']);
            }           
            header('location:layout.php');         
          
        }else{
            $_SESSION['error']='Đăng Kí Không Thành Công';
            // if(isset($_SESSION['error'])){
            //     unset($_SESSION['error']);
            // }  
            header('location:register.php'); 
        }
    }

    function dangnhapTk($username,$password){
        $userModel = new SignUpModel();
        $result=$userModel->selectStatus($username);
        $array=get_object_vars($result);
        $_SESSION['status']=$array['status'];
        if($array['status']==1||$array['status']==2){
        $check=$userModel->selectLogin($username,$password);
        if($check==false){
            $_SESSION['error']='Sai username hoặc password';
            header('location:login.php'); 
        }else{
            $_SESSION['name']=$username;   
            if(isset($_SESSION['error'])){
                unset($_SESSION['error']);
            }                  
            header('location:layout.php'); 
           
        }
    }else{
        $_SESSION['error']='Tài Khoản Không Được Phép Đăng Nhập';
        header('location:login.php'); 
    }
    }

    function selectUse($username){
        $userModel = new SignUpModel();
        $check=$userModel->selectUser($username);
        return $check;
    }

    function dangXuatTk(){
       unset($_SESSION['name']);
        header('location:views/login.php'); 
    }

}
?>