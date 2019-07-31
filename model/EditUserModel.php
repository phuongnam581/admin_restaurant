<?php
    include_once('C:\xampp\htdocs\admin_nhahang\model\BaseModel.php');
    class EditUserModel extends BaseModel{
        function getUser($username){
            $sql="SELECT * FROM users WHERE username='$username'";
            return $this->loadOneRow($sql);
        }

        function updateUser($username,$pass,$phone){
            $sql="UPDATE users
            SET password ='$pass',phone='$phone'
            WHERE username='$username'";
            return $this->executeQuery($sql);
        }
    }
?>