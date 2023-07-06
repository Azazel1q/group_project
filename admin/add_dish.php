<div class="menu_adm">
    <?php 
        include("header.php");
        include("../connect.php");
        $id_adm = $_SESSION['id_admin'];
        $categ_query = mysqli_query($con,"select * from categories");
    ?>
    <div class="container">
        <h1>Добавление товара</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <p style="margin: 10px 0px">Введите наименование</p>
            <input type="text" value="<?=$dish_inf_res['id_dish'];?>" style = "display: none;" name ="id_dish">
            <input type="text" value="<?=$dish_inf_res['name_dish'];?>" name ="name_dish">
            <p style="margin: 10px 0px">Выберите фото</p>
            <input type="file" name="photo_dish">
            <p style="margin: 10px 0px">Выберите категорию</p>
            <select name="categ_dish">
                <?php while($categ = mysqli_fetch_array($categ_query)){
                ?>
                <option value="<?=$categ['id_categ'];?>"><?=$categ['name_categ'];?></option>
                <?php
            }
                ?>
            </select>
            <p style="margin: 10px 0px">Введите цену</p>
            <input type="text" value="<?=$dish_inf_res['cost'];?>" name = "cost_dish">
            <button style="margin: 10px 0px">Сохранить</button>
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
<?php
if (!empty($_POST)){
    if (!empty($_FILES["photo_dish"]["tmp_name"] ) ) {
      $name = "image/" .$_FILES["photo_dish"] ["name"];
   $tmp_name = $_FILES["photo_dish"] ["tmp_name"];
   move_uploaded_file($tmp_name,$name);
}
    $id_dish_post = $_POST['id_dish'];
    $name_dish_post = $_POST['name_dish'];
    $cost_dish_post = $_POST['cost_dish'];
    $categ_dish = $_POST['categ_dish'];
    $photo_dish = $_FILES["photo_dish"]["name"];
    $edit_dish_query = mysqli_query($con, "insert into dishes(id_dish, id_categ, photo, name_dish, cost) values(null, '$categ_dish', '$photo_dish', '$name_dish_post', '$cost_dish_post')");
    if ($edit_dish_query) {
        echo "<script>alert('Запись изменена!!');location.href='edit_dish.php';</script>";
    }
    else{
         echo "<script>alert('Запись не изменена!!');location.href='edit_dish.php';</script>";
    }
}
?>