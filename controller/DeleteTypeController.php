<?php
    include_once('C:\xampp\htdocs\admin_balo\model\DeleteFoodModel.php');
    include_once('C:\xampp\htdocs\admin_balo\controller\Controller.php');
    class DeleteTypeController extends Controller{
        function deleteType($id){
            $model = new DeleteFoodModel;
            $check=$model->deleteType($id);
            if($check){
                $model->updateProductAuto($id);
                echo "success";
            }else{
                echo "error";
            }
        }
    }
?>