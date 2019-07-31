<?php
     include_once('C:\xampp\htdocs\admin_nhahang\model\BillModel.php');
     class EditBillController{
         function updateBill($idBill,$status){
             $model=new BillModel;
             $check=$model->updateBill($idBill,$status);
             if($check){
                 echo "ok";
             }
         }
     }
?>