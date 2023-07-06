<?php
include("connect.php");
session_start();
$id_dish = $_GET['prod'];
$id_client = $_SESSION['id_client'];
$current_dish_query = "select * from curt inner join dishes where curt.id_dish = dishes.id_dish and curt.id_dish = $id_dish";
$current_dish_result = mysqli_query($con, $current_dish_query);
$current_dish = mysqli_fetch_array($current_dish_result);
$num_rows = mysqli_num_rows($current_dish_result);

$dish_query = "select * from dishes where id_dish = $id_dish";
$dish_result = mysqli_query($con, $dish_query);
$dish = mysqli_fetch_array($dish_result);



$count = $_POST['count'];
$price = $count * $dish['cost'];
if($num_rows){
echo "<script>alert('Товар уже добавлен в корзину!!');location.href='/curt.php';</script>";
}
else{
$add_curt_query = "insert into curt(id_curt, id_client, id_dish, count, price) values(null, '$id_client', '$id_dish', '$count', '$price')";
$add_curt_result = mysqli_query($con, $add_curt_query);
if($add_curt_result){
echo "<script>alert('Товар добавлен в корзину!!');location.href='/curt.php';</script>";
}
else{
echo "<script>alert('Товар не был добавлен в корзину!!');location.href='/tovar.php';</script>";
}	
}








?>