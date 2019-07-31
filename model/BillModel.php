<?php
    include_once('C:\xampp\htdocs\admin_nhahang\model\BaseModel.php');
    class BillModel extends BaseModel{
        function getBill($status){
            $sql = "SELECT b.id,b.date_order,b.total,b.note,c.name,c.email,c.address,c.phone FROM bills b 
            INNER JOIN customers c 
            on b.id_customer=c.id
            WHERE b.status='$status'";
           return  $this->loadMoreRows($sql);
        }

        function countBill($status){
            $sql="SELECT COUNT(id)  
            FROM bills 
            WHERE status='$status'";
            return $this->loadOneRow($sql);
        }

        function getFoods($status,$idBill){
            $sql="SELECT f.name 
            FROM foods f
            INNER JOIN
            (SELECT id_food FROM bill_detail bd
            INNER JOIN bills b
            ON b.id=bd.id_bill
            WHERE b.status='$status' AND bd.id_bill='$idBill') c 
            ON f.id=c.id_food";
            return $this->loadMoreRows($sql);
        }

        function updateBill($idBill,$status){
            $sql="UPDATE bills
            SET status='$status'
            WHERE id='$idBill'";
            return $this->executeQuery($sql);
        }


    }
   

?>