<?php
    include_once('C:\xampp\htdocs\admin_nhahang\model\BaseModel.php');
    class ListUserModel extends BaseModel{
        function getUser($status){
            $sql="SELECT * FROM users
                 WHERE status='$status'";
            return $this->loadMoreRows($sql);
        }

        function deleteUser($idUser){
            $sql = "DELETE FROM users WHERE id='$idUser'";
            return  $this->executeQuery($sql);
        }
    }
?>