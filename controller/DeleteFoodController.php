<?php
    include_once('C:\xampp\htdocs\admin_balo\model\DeleteFoodModel.php');
    include_once('C:\xampp\htdocs\admin_balo\controller\Controller.php');
    class DeleteFoodController extends Controller{
        function deleteFood($id){
            $model = new DeleteFoodModel;
            $check=$model->deleteFood($id);
            if($check){
                echo"success";
            }else{
                echo "error";
            }
        }
    }
?>