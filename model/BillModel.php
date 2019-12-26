<?php
    include_once('C:\xampp\htdocs\admin_balo\model\BaseModel.php');
    class BillModel extends BaseModel{
        function getOrder($status){
            $sql = "SELECT * FROM order_cus o
            WHERE o.status='$status'";
           return  $this->loadMoreRows($sql);
        }

        function countOrder($status){
            $sql="SELECT COUNT(id)  
            FROM order_cus 
            WHERE status='$status'";
            return $this->loadOneRow($sql);
        }

        function getProductDetail($status,$idOder){
            $sql="SELECT p.name 
            FROM products p
            INNER JOIN
            (SELECT id_product FROM order_detail od
            INNER JOIN order_cus o
            ON o.id=od.id_order
            WHERE o.status='$status' AND od.id_order='$idOder') c 
            ON p.product_code=c.id_product";
            return $this->loadMoreRows($sql);
        }

        function updateOrder($idOrder,$idEmploy,$idShiper){
            $sql="UPDATE order_cus
            SET status='1',id_employ='$idEmploy',id_shipper='$idShiper'
            WHERE id='$idOrder'";
            return $this->executeQuery($sql);
        }

        function updateFinishOrder($idOrder){
            $sql="UPDATE order_cus
            SET status='2'
            WHERE id='$idOrder'";
            return $this->executeQuery($sql);
        }

        function getShipper(){
            $sql="SELECT  e.id,e.fullname,COUNT(*) AS count  
            FROM order_cus o  
            INNER JOIN employ e 
            ON o.id_shipper=e.id 
            WHERE o.status='1' 
            GROUP BY e.fullname 
            ORDER BY COUNT(*)";
            return $this->loadMoreRows($sql);
        }

        function getIdEmploy($email){
            $sql="SELECT *
            FROM employ 
            WHERE email='$email'";
            return $this->loadOneRow($sql);
        }

        function getEmailCus($idCus){
            $sql="SELECT *
            FROM customers 
            WHERE id='$idCus'";
            return $this->loadOneRow($sql);
        }

        function getOrderDetail($idOrder){
            $sql="SELECT *  
            FROM order_detail
            WHERE id_order='$idOrder'";
            return $this->loadMoreRows($sql);
        }
        function updateQuantiProduct($quanti,$idProduct){
            $sql = "UPDATE products SET quanlity_exist='$quanti' WHERE product_code='$idProduct'";
            return $this->executeQuery($sql);
        }
        function getProduct($idProduct){
            $sql="SELECT *  
            FROM products
            WHERE product_code='$idProduct'";
            return $this->loadOneRow($sql);
        }
        function updateCancelOrder($idOrder){
            $sql="UPDATE order_cus
            SET status='3'
            WHERE id='$idOrder'";
            return $this->executeQuery($sql);
        }
    }
   

?>