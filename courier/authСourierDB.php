<?php
session_start();
include("../connect.php");
$cur_query = "select * from employees where id_role = 3";
$cur_result = mysqli_query($con, $cur_query);
?>
<?php
if (!empty($_POST)) {
$login = $_POST['login'];
$password = $_POST['password'];
while($cur = mysqli_fetch_array($cur_result)){
if ($login == $cur['login'] && $password == $cur['password']) {
    $_SESSION['id_cur'] = $cur['id_employee'];
    echo "<script>alert('Авторизация прошла успешно!!');location.href='orders_check.php';</script>";
}
else{
  	 echo "<script>alert('Данные введены неверно!!');location.href='index.php';</script>";
}
}
}

?>