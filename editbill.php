<?php
    include_once('C:\xampp\htdocs\admin_balo\controller\EditBillController.php');
    include_once('C:\xampp\htdocs\admin_balo\helper\mail.php');

    $c= new EditBillController;
    $idOrder=$_POST['idOrder'];
    $idStatus=$_POST['idStatus'];
    $idName=$_POST['idName'];
    $idCus=$_POST['idCus'];
    if($idStatus==0){
        $idEmploy=$_POST['idEmploy'];
        $idShiper=$_POST['idShiper'];
        $c->updateBill($idOrder,$idName,$idEmploy,$idShiper,$idCus);
    }else if($idStatus==1){
        $c->updateBillFininsh($idOrder,$idName,$idCus);
    }else if($idStatus==3){
        $c->updateBillCancel($idOrder,$idName,$idCus);
    }
   
   
    
?>