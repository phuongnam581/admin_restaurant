<?php
    include_once('C:\xampp\htdocs\admin_nhahang\model\ListUserModel.php');
    class DeleteUserController {
        function deleteUser($idUser){
            $model = new ListUserModel;
            $check= $model->deleteUser($idUser);
            if($check){
                echo "success";
            }else{
                echo "existUser";
            }
        }
    }
?>