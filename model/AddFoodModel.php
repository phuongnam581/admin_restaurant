<?php
    include_once('C:\xampp\htdocs\admin_balo\model\BaseModel.php');
    class AddFoodModel extends BaseModel{
        function insertProduct($id_type,$product_code,$name,$detail,$value,$img,$id_distributor,$quanlity_exist,$date){
            $sql="INSERT INTO products (id_categories,name,detail,value,image,new,created_at,quanlity_exist,id_distributor,product_code)
            VALUES ('$id_type','$name','$detail','$value','$img','1','$date','$quanlity_exist','$id_distributor','$product_code')";
            return $this->executeQuery($sql);
        }

        function insertType($name){
            $sql= "INSERT INTO categories (id,name)
                   VALUES ('','$name')";
                   return $this->executeQuery($sql);
        }

        function getDistributor(){
            $sql="SELECT * FROM distributor";
            return $this->loadMoreRows($sql);
        }
    }
   

?>