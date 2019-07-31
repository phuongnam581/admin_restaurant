<?php
    include_once('C:\xampp\htdocs\admin_nhahang\model\MenuModel.php');
    include_once('C:\xampp\htdocs\admin_nhahang\controller\Controller.php');
    class MenuController extends Controller{
        function getType(){
            $model = new MenuModel;
            $data=$model->getAllType();
            return $data;
        }
    }
?>