<?php
include_once 'C:\xampp\htdocs\admin_balo\controller\DeleteTypeController.php';

$c = new DeleteTypeController;
$id=$_GET['id'];
 $c->deleteType($id);

?>