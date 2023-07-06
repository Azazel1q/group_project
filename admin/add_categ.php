<div class="menu_adm">
    <?php 
        include("header.php");
        include("../connect.php");
        $id_adm = $_SESSION['id_admin'];
    ?>
    <div class="container">
        <h1>Добавление категории</h1>
        <form action="" method="POST">
            <p style="margin: 10px 0px">Введите наименование</p>
            <input type="text" value="" name ="name_categ">
            <button>Добавить</button>
        </form>
    </div>
</div>  
<?php
if (!empty($_POST)){
    $name_categ_post = $_POST['name_categ'];
    $add_categ_query = mysqli_query($con, "insert into categories(id_categ, name_categ) values(null, '$name_categ_post')");
    if ($add_categ_query) {
        echo "<script>alert('Запись добавлена!!');location.href='edit_categ.php';</script>";
    }
    else{
         echo "<script>alert('Запись не добавлена!!');location.href='edit_categ.php';</script>";
    }
}
?>
