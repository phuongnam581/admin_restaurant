<?php
include_once 'C:\xampp\htdocs\admin_nhahang\controller\DeleteTypeController.php';

$c = new DeleteTypeController;
$id=$_GET['id'];
 $c->deleteType($id);

?>