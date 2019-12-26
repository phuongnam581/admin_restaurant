<?php
    include_once('C:\xampp\htdocs\admin_balo\model\BaseModel.php');
    class EditFoodModel extends BaseModel{
        function getProductsById($id){
            $sql = "SELECT * FROM products WHERE product_code='$id'";
           return  $this->loadOneRow($sql);
        }

        function getType(){
            $sql="SELECT * FROM categories WHERE deleted='0'";
            return $this->loadMoreRows($sql);
        }

        function updateProduct($product_code,$id_categories,$name,$detail,$price,$image,$new,$quantityExist,$date){
            $sql="UPDATE products
            SET id_categories ='$id_categories',name ='$name',detail='$detail',value='$price',image='$image',new='$new',update_at='$date',quanlity_exist='$quantityExist'
            WHERE product_code='$product_code'";
            return $this->executeQuery($sql);
        }

        function getTypeById($id){
            $sql="SELECT * FROM categories WHERE id='$id'";
            return $this->loadOneRow($sql);
        }

        function updateType($id,$name){
            $sql="UPDATE categories
            SET name='$name'
            WHERE id='$id'";
            return $this->executeQuery($sql);
        }
    }
   

?>