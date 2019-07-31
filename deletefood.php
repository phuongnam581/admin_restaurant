<?php
include_once 'C:\xampp\htdocs\admin_nhahang\controller\DeleteFoodController.php';

$c = new DeleteFoodController;
$id=$_GET['id'];
 $c->deleteFood($id);

?>