<?php
    include_once('C:\xampp\htdocs\admin_nhahang\model\DeleteFoodModel.php');
    include_once('C:\xampp\htdocs\admin_nhahang\controller\Controller.php');
    class DeleteTypeController extends Controller{
        function deleteType($id){
            $model = new DeleteFoodModel;
            $check=$model->deleteType($id);
            if($check){
                echo "success";
            }else{
                echo "error";
            }
        }
    }
?>