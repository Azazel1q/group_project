<?php
session_start();
include("connect.php");
?>
<?php
if (!empty($_POST)) {
$name = $_POST['name'];
$surname = $_POST['surname'];
$patronymic = $_POST['patronymic'];
$phone = $_POST['phone'];
$login = $_POST['login'];
$adres_city = $_POST['adres_city'];
$adres_street = $_POST['adres_street'];
$adres_home = $_POST['adres_home'];
$adres_ent = $_POST['adres_ent'];
$adres_apart = $_POST['adres_apart'];
$password = $_POST['password'];
$reg_query = "INSERT INTO `clients`(`id_client`, `id_role`, `phone`, `surname`, `name`, `patronymic`, `city`, `street`, `house`, `entrance`, `apartment`, `login`, `password`) VALUES (null,'4','$phone','$surname','$name','$patronymic','$adres_city','$adres_street','$adres_home','$adres_ent','$adres_apart','$login','$password')";
$ref_result = mysqli_query($con, $reg_query);
if($ref_result){
    $client_res = mysqli_query($con, "SELECT * 
FROM clients
ORDER BY id_client DESC
LIMIT 1");
    $clients = mysqli_fetch_array($client_res);
    $_SESSION['id_client'] = $clients['id_client'];
    echo "<script>alert('Регистрация прошла успешно!!');location.href='/LK.php';</script>";
}
else{
    echo "<script>alert('Что то пошло не так!!');location.href='/auth-reg.php';</script>";
}
}

?>