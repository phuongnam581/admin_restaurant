<?php
include_once('C:\xampp\htdocs\admin_balo\model\BaseModel.php');

class SignUpModel extends BaseModel{
   
    function selectUser($email){
        $sql = "SELECT email FROM employ WHERE email='$email'";
       return  $this->loadOneRow($sql);
    }
    function insertUser($fullname,$address,$gender,$phone,$password,$email){
       
        $sql = "INSERT INTO employ( id,fullname,address,gender,deleted,role,phone,password,email) VALUES ( '','$fullname', '$address', '$gender','0','1','$phone','$password','$email')";
        return $this->executeQuery($sql);
    }

    function selectStatus($username){
        $sql = "SELECT status FROM employ WHERE username='$username'";
        return  $this->loadOneRow($sql);
    }
    function selectLogin($email,$password){
        $sql = "SELECT email,password FROM employ WHERE email='$email'AND password='$password'";
       return  $this->loadOneRow($sql);
    }

}
?>