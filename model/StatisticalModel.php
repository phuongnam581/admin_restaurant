<?php
    include_once('C:\xampp\htdocs\admin_balo\model\BaseModel.php');
    class StatisticalModel extends BaseModel{
        function getStatis($dateStart,$dateEnd){
            $sql="SELECT od.id_product, sum(od.quanlity_out)sum,p.name 
            FROM order_detail od, order_cus o, products p 
            WHERE od.id_order=o.id AND p.product_code = od.id_product AND o.created_at >= '$dateStart' AND o.created_at<= '$dateEnd' 
            GROUP BY od.id_product 
            ORDER BY od.id_product";
            return $this->loadMoreRows($sql);
        }
    }
   

?>