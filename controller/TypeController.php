<?php
    include_once('C:\xampp\htdocs\admin_balo\model\TypeModel.php');
    include_once('C:\xampp\htdocs\admin_balo\controller\Controller.php');
    class TypeController extends Controller{
        function getFoods(){
            $model = new TypeModel;
            $id=$_GET['type'];
            $data=$model->getFoodsByType($id);
            return $data;
        }
    }
?>