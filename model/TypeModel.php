<?php
    include_once('C:\xampp\htdocs\admin_balo\model\BaseModel.php');
    class TypeModel extends BaseModel{
        function getProductsByType($id){
            $sql = "SELECT * FROM products WHERE id_categories='$id' AND deleted='0'";
           return  $this->loadMoreRows($sql);
        }
    }
   

?>