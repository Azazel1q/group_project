<?php
include("connect.php");
session_start();
$id_client = $_GET['client'];
$curt_query = "select * from curt inner join clients, dishes where curt.id_client = clients.id_client and curt.id_dish = dishes.id_dish and curt.id_client = $id_client";
$curt_result = mysqli_query($con, $curt_query);
$numb_order = rand(1234, 5678);
//$dish_query = "select name_dish from curt inner join dishes where curt.id_dish = dishes.id_dish and //curt.id_client = $id_client";
//$dish_result = mysqli_query($con, $dish_query);
while ($dish = mysqli_fetch_array($curt_result)) {
		$name_dishes = $dish['name_dish'];
		$price = $dish['price'];
		$count = $dish['count'];
		$date = date("Y-m-d H:i:s"); 
		$order_add_query = "INSERT INTO `orders`(`id_order`, `numb_order`,`id_client`, `name_dish`, `count`, `price`, `employee`, `date`, `comment`,`status`) VALUES (null, '$numb_order', '$id_client','$name_dishes', '$count','$price',null, '$date', '', '1')";
		$order_add_result = mysqli_query($con, $order_add_query);
		if ($order_add_result) {
			$delete_curt = "delete from curt where id_client = $id_client";
			mysqli_query($con, $delete_curt);
			echo "<script>alert('Заказ оформлен!!');location.href='orders.php';</script>";
		}
		else{
			echo "<script>alert('Заказ не оформлен!!');location.href='orders.php';</script>";
		}
}
?>