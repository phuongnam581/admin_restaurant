<?php
    include_once('C:\xampp\htdocs\admin_nhahang\model\BaseModel.php');
    class TypeModel extends BaseModel{
        function getFoodsByType($id){
            $sql = "SELECT * FROM foods WHERE id_type=$id";
           return  $this->loadMoreRows($sql);
        }
    }
   

?>