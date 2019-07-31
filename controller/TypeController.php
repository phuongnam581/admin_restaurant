<?php
    include_once('C:\xampp\htdocs\admin_nhahang\model\TypeModel.php');
    include_once('C:\xampp\htdocs\admin_nhahang\controller\Controller.php');
    class TypeController extends Controller{
        function getFoods(){
            $model = new TypeModel;
            $id=$_GET['type'];
            $data=$model->getFoodsByType($id);
            return $data;
        }
    }
?>