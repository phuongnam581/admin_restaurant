<?php
    include_once('C:\xampp\htdocs\admin_nhahang\model\BaseModel.php');
    class DeleteFoodModel extends BaseModel{
        function deleteFood($id){
            $sql = "DELETE FROM foods WHERE id='$id'";
           return  $this->executeQuery($sql);
        }

        function deleteType($id){
            $sql = "DELETE FROM food_type WHERE id='$id'";
            return  $this->executeQuery($sql);
        }
    }
   

?>