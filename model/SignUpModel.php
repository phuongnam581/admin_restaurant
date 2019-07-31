<?php
include_once('C:\xampp\htdocs\admin_nhahang\model\BaseModel.php');

class SignUpModel extends BaseModel{
   
    function selectUser($username){
        $sql = "SELECT username FROM users WHERE username='$username'";
       return  $this->loadOneRow($sql);
    }
    function insertUser($username, $password,$phone,$status){
       
        $sql = "INSERT INTO users( id,username,password,phone,status) VALUES ( '','$username', '$password', '$phone','$status')";
        return $this->executeQuery($sql);
    }

    function selectStatus($username){
        $sql = "SELECT status FROM users WHERE username='$username'";
        return  $this->loadOneRow($sql);
    }
    function selectLogin($username,$password){
        $sql = "SELECT username,password FROM users WHERE username='$username'AND password='$password'";
       return  $this->loadOneRow($sql);
    }

}
?>