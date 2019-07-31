<?php
    include_once('C:\xampp\htdocs\admin_nhahang\controller\DeleteUserController.php');
    $c= new DeleteUserController;
    $idUser= $_GET['id'];
    $c->deleteUser($idUser);
?>