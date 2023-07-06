<?php
session_start();
include("../connect.php");
$log_query = "select * from employees where id_role = 2";
$log_result = mysqli_query($con, $log_query);
?>
<?php
if (!empty($_POST)) {
$login = $_POST['login'];
$password = $_POST['password'];
while($log = mysqli_fetch_array($log_result)){
if ($login == $log['login'] && $password == $log['password']) {
    $_SESSION['id_admin'] = $log['id_employee'];
    echo "<script>alert('Авторизация прошла успешно!!');location.href='edit_categ.php';</script>";
}
else{
  	 echo "<script>alert('Данные введены неверно!!');location.href='index.php';</script>";
}
}
}

?>