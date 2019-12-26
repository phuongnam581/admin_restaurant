<?php
include_once 'C:\xampp\htdocs\admin_balo\controller\DeleteFoodController.php';

$c = new DeleteFoodController;
$id=$_GET['id'];
 $c->deleteFood($id);

?>