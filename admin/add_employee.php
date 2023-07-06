<div class="menu_adm">
    <?php 
        include("header.php");
        include("../connect.php");
        $id_adm = $_SESSION['id_admin'];
        $role_query = mysqli_query($con,"select * from role where id_role != 4");
    ?>
    <div class="container">
        <h1>Добавление сотрудника</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <p style="margin: 10px 0px">Введите имя</p>
            <input type="text" value="" name ="name">
            <p style="margin: 10px 0px">Введите фамилию</p>
            <input type="text" value="" name ="surname">
            <p style="margin: 10px 0px">Введите отчество</p>
            <input type="text" value="" name ="patronymic">
            <p style="margin: 10px 0px">Введите телефон</p>
            <input type="text" value="" name ="phone">
            <p style="margin: 10px 0px">Введите логин</p>
            <input type="text" value="" name ="login">
            <p style="margin: 10px 0px">Введите пароль</p>
            <input type="text" value="" name ="password">
            <p style="margin: 10px 0px">Выберите роль</p>
            <select name="role">
                <?php while($role = mysqli_fetch_array($role_query)){
                ?>
                <option value="<?=$role['id_role'];?>"><?=$role['name_role'];?></option>
                <?php
            }
                ?>
            </select>
            <button style="margin: 10px 0px">Добавить</button>
        </form>
    </div>
</div>  
<?php
if (!empty($_POST)){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $patronymic = $_POST['patronymic'];
    $phone = $_POST['phone'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $role_post = $_POST['role'];
    $add_user_query = mysqli_query($con, "insert into employees(id_employee, id_role, phone, surname, name, patronymic, login, password, status_empl) values(null, '$role_post', '$phone', '$surname', '$name', '$patronymic', '$login', '$password', '1')");
    if ($add_user_query) {
        echo "<script>alert('Пользователь добавлен!!');location.href='edit_employees.php';</script>";
    }
    else{
         echo "<script>alert('Пользователь не добавлен!!');location.href='edit_employees.php';</script>";
    }
}
?>
