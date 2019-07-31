<?php
    include_once('C:\xampp\htdocs\admin_nhahang\controller\EditBillController.php');
    $c= new EditBillController;
    $idBill=$_POST['id_bill'];
    $status=$_POST['status'];
    $c->updateBill($idBill,$status);
?>