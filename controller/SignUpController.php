<?php
session_start();
include_once('C:\xampp\htdocs\admin_balo\model\SignUpModel.php');
include_once('C:\xampp\htdocs\admin_balo\helper\mail.php');
include_once('C:\xampp\htdocs\admin_balo\controller\CheckController.php');
class SignUpController{
    function dangkiTK($fullname,$address,$gender,$phone,$password,$email){
       $userModel = new SignUpModel();
             $checkMailHopLe=maill('aa',$email,'aa','aa');
                            if($checkMailHopLe){
                                $check=$userModel->selectUser($email);
                                if($check==false){
                                     try{
                                        $result= $userModel->insertUser($fullname,$address,$gender,$phone,$password,$email); 
                                        $_SESSION['name']=$email; 
                                        header('location:manage-bill.php?status=0');    
                                    }catch(Excetion $e){
                                        echo $e;
                                        return;
                                 }     
                               }else{
                                 $_SESSION['errormail']='Email đã tồn tại';                            
                                }
                            }else{
                                $_SESSION['errormail']='Email không có thực';     
                            }
                       }
            
    

    function dangnhapTk($email,$password){
        $userModel = new SignUpModel();
        $check=$userModel->selectLogin($email,$password);
        if($check==false){
            $_SESSION['error']='Sai username hoặc password';
        }else{
            $_SESSION['nameAdmin']=$email;   
            if(isset($_SESSION['error'])){
                unset($_SESSION['error']);
            }                  
            header('location:manage-bill.php?status=0'); 
           
        }
    }

    function selectUse($email){
        $userModel = new SignUpModel();
        $check=$userModel->selectUser($email);
        return $check;
    }

    function dangXuatTk(){
       unset($_SESSION['nameAdmin']);
        header('location:views/login.php'); 
    }

}
?>