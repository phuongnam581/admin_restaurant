<?php
    include_once('C:\xampp\htdocs\admin_balo\model\BaseModel.php');
    class MenuModel extends BaseModel{
        function getAllType(){
            $sql = "SELECT *
            FROM categories c
            WHERE c.deleted = '0'
            AND c.id IN( SELECT p.id_categories FROM products p)";
           return  $this->loadMoreRows($sql);
        }
    }
   

?>