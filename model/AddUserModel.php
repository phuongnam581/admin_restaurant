<?php
    include_once('C:\xampp\htdocs\admin_nhahang\model\BaseModel.php');
    class AddUserModel extends BaseModel{
        function insertUser($username,$pass,$phone,$status){
            $sql="INSERT INTO users (id,username,password,phone,status)
            VALUES ('','$username','$pass','$phone','$status')";
             return $this->executeQuery($sql);
        }
    }
?>