<?php
    include_once('C:\xampp\htdocs\admin_nhahang\model\BaseModel.php');
    class MenuModel extends BaseModel{
        function getAllType(){
            $sql = "SELECT * FROM food_type";
           return  $this->loadMoreRows($sql);
        }
    }
   

?>