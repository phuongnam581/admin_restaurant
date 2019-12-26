<?php
    include_once('C:\xampp\htdocs\admin_balo\model\BaseModel.php');
    class DeleteFoodModel extends BaseModel{
        function deleteFood($product_code){
            $sql = "UPDATE products
            SET deleted='1'
            WHERE product_code='$product_code'";
           return  $this->executeQuery($sql);
        }

        function deleteType($id){
            $sql = "UPDATE categories 
                    SET deleted='1'
                    WHERE id='$id'";
            return  $this->executeQuery($sql);
        }

        function updateProductAuto($id){
            $sql = "UPDATE products 
                    SET id_categories='5'
                    WHERE id_categories='$id'";
            return  $this->executeQuery($sql);
        }
    }
   

?>