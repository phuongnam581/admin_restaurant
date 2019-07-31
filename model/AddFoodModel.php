<?php
    include_once('C:\xampp\htdocs\admin_nhahang\model\BaseModel.php');
    class AddFoodModel extends BaseModel{
        function insertFood($id_type,$id_url,$name,$summary,$detail,$price,$promotion_price,$promotion,$image,$unit,$today){
            $sql="INSERT INTO foods (id,id_type,id_url,name,summary,detail,price,promotion_price,promotion,image,unit,today)
            VALUES ('','$id_type','$id_url','$name','$summary','$detail','$price','$promotion_price','$promotion','$image','$unit','$today')";
            return $this->executeQuery($sql);
        }

        function insertUrl($url){
            $sql="INSERT INTO page_url (id,url)
            VALUES ('','$url')";
             return $this->executeQuery($sql);
        }

        function selectIdUrl($url){
            $sql="SELECT id FROM page_url WHERE url='$url'";
            return $this->loadOneRow($sql);
        }

        function insertType($name,$description){
            $sql= "INSERT INTO food_type (id,name,description)
                   VALUES ('','$name','$description')";
                   return $this->executeQuery($sql);
        }
    }
   

?>