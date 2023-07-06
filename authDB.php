<?php
session_start();
include("connect.php");
$clients_query = "select * from clients";
$clients_result = mysqli_query($con, $clients_query);

?>
<?php
if (!empty($_POST)) {
$login = $_POST['login'];
$password = $_POST['password'];
while($clients = mysqli_fetch_array($clients_result)){
if ($login == $clients['login'] && $password == $clients['password']) {
    $_SESSION['id_client'] = $clients['id_client'];
    echo "<script>alert('Авторизация прошла успешно!!');location.href='/LK.php';</script>";
}
else{
  	 echo "<script>alert('Данные введены неверно!!');location.href='/auth-reg.php';</script>";
}
}
}

?>