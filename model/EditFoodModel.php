<?php
    include_once('C:\xampp\htdocs\admin_nhahang\model\BaseModel.php');
    class EditFoodModel extends BaseModel{
        function getFoodsById($id){
            $sql = "SELECT * FROM foods WHERE id=$id";
           return  $this->loadOneRow($sql);
        }

        function getType(){
            $sql="SELECT * FROM food_type";
            return $this->loadMoreRows($sql);
        }

        function updateFood($id=null,$id_type=null,$name=null,$summary=null,$detail=null,$price=null,$promotion_price=null,$promotion=null,$image=null,$unit=null,$today=null){
            $sql="UPDATE foods
            SET id_type ='$id_type',name ='$name',summary='$summary',detail='$detail',price='$price',promotion_price='$promotion_price',promotion='$promotion',image='$image',unit='$unit',today='$today'
            WHERE id='$id'";
            return $this->executeQuery($sql);
        }

        function getTypeById($id){
            $sql="SELECT * FROM food_type WHERE id='$id'";
            return $this->loadOneRow($sql);
        }

        function updateType($id=null,$name=null,$description=null){
            $sql="UPDATE food_type
            SET name='$name',description='$description'
            WHERE id='$id'";
            return $this->executeQuery($sql);
        }
    }
   

?>