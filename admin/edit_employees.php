<div class="menu_adm">
    <?php 
        include("header.php");
        include("../connect.php");
        $id_adm = $_SESSION['id_admin'];
        $user_query = "select * from employees inner join role where employees.id_role = role.id_role and employees.id_role != 2";

        $user_result = mysqli_query($con, $user_query);
        $id_user = $_GET['edit'];

        
    ?>
    <div class="container">
        <h1>Сотрудники</h1>

        <div style="display: flex; justify-content: space-evenly;">
        
        <table class="table">
            <thead>
           <tr>
               <th>ID<a href="add_employee.php" style="margin-left: 20px;"><button>Добавить пользователя</button></a></th>
               <th>Роль</th>
               <th>Имя</th>
               <th>Фамилия</th>
               <th>Отчество</th>
               <th>Телефон</th>
               <th>Логин</th>
               <th>Пароль</th>
           </tr>
           </thead>
           <tbody>
           <?php while($user = mysqli_fetch_array($user_result)){
                ?>

           <tr>
               <td><?=$user['id_client'];?></td>
               <td><?=$user['name_role'];?></td>
               <td><?=$user['name'];?></td>
               <td><?=$user['surname'];?></td>
               <td><?=$user['patronymic'];?></td>
               <td><?=$user['phone'];?></td>
               <td><?=$user['login'];?></td>
               <td><?=$user['password'];?></td>
               <td><a href="?del=<?=$user['id_employee'];?>"><button>Удалить</button></a></td>
           </tr>
           
            <?php
            }
            ?>
             </tbody>
        </table>
        </div>
    </div>
</div>  
<?php
if ($_GET['del']) {
    $del = $_GET['del'];
    $del_query = "delete from employees where id_employee = $del";
    $del_result = mysqli_query($con, $del_query);
    if ($del_result) {
        echo "<script>alert('Пользователь удален!!');location.href='edit_employees.php';</script>";
    }
    else{
         echo "<script>alert('Ошибка!!');location.href='edit_employees.php';</script>";
    }
}
?>

