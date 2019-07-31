<?php
    include_once('C:\xampp\htdocs\admin_nhahang\model\DeleteFoodModel.php');
    include_once('C:\xampp\htdocs\admin_nhahang\controller\Controller.php');
    class DeleteFoodController extends Controller{
        function deleteFood($id){
            $model = new DeleteFoodModel;
            $check=$model->deleteFood($id);
            if($check){
                echo "success";
            }else{
                echo "existfood";
            }
        }
    }
?>