<div class="menu_adm">
    <?php 
        include("header.php");
        include("../connect.php");
        $id_adm = $_SESSION['id_admin'];
        $dish_query = "select * from dishes inner join categories where dishes.id_categ = categories.id_categ";
         $categ_query = mysqli_query($con,"select * from categories");
        if ($_POST['search']) {
            $name_dish_search = $_POST['search'];
            $dish_query = "select * from dishes where name_dish = '$name_dish_search'";
            $dish_result = mysqli_query($con, $dish_query);
        }
        else{
           $dish_result = mysqli_query($con, $dish_query); 
        }
        $dish_result = mysqli_query($con, $dish_query);
        $id_dish = $_GET['edit'];
        if ($id_dish) {
            $dish_inf = mysqli_query($con, "select * from dishes where id_dish = $id_dish");
        $dish_inf_res = mysqli_fetch_array($dish_inf);
        }
        
    ?>
    <div class="container">
        <h1>Товары</h1>
        <form action="" method="POST">
        <p style="margin: 10px 0px">Поиск товара</p>
        <input type="text" name="search"><button style="margin-left: 10px;" >Поиск</button>
        </form>
        <div style="display: flex; justify-content: space-evenly;">
        
        <table class="table">
            <thead>
           <tr>
               <th>ID</th>
               <th>Фото</th>
               <th>Наименование<a href="add_dish.php" style="margin-left: 20px;"><button>Добавить товар</button></a></th>
               <th>Категория</th>
               <th>Цена</th>
           </tr>
           </thead>
           <tbody>
           <?php while($dish = mysqli_fetch_array($dish_result)){
                ?>

           <tr>
               <td><?=$dish['id_dish'];?></td>
               <td><img src="../img/menu_img/<?=$dish['photo'];?>" alt="<?=$dish['name_dish'];?>" width = "200px"></td>
               <td><?=$dish['name_dish'];?></td>
               <td><?=$dish['name_categ'];?></td>
               <td><?=$dish['cost'];?></td>
               <td><a href="?edit=<?=$dish['id_dish'];?>"><button>Редактировать</button></a></td>
               <td><a href="?del=<?=$dish['id_dish'];?>"><button>Удалить</button></a></td>
           </tr>
           
            <?php
            }
            ?>
             </tbody>
        </table>
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
</div>  
<?php
if ($_GET['del']) {
    $del = $_GET['del'];
    $del_query = "delete from dishes where id_dish = $del";
    $del_result = mysqli_query($con, $del_query);
    if ($del_result) {
        echo "<script>alert('Запись удалена!!');location.href='edit_dish.php';</script>";
    }
    else{
         echo "<script>alert('Запись не удалена!!');location.href='edit_dish.php';</script>";
    }
}
?>

<?php
if ($_POST['cost_dish']){
    if (!empty($_FILES["photo_dish"]["tmp_name"] ) ) {
      $name = "image/" .$_FILES["photo_dish"] ["name"];
   $tmp_name = $_FILES["photo_dish"] ["tmp_name"];
   move_uploaded_file($tmp_name,$name);
}
    $id_dish_post = $_POST['id_dish'];
    $name_dish_post = $_POST['name_dish'];
    $cost_dish_post = $_POST['cost_dish'];
    $photo_dish = $_FILES["photo_dish"]["name"];
    $categ_dish = $_POST['categ_dish'];
    $edit_dish_query = mysqli_query($con, "update dishes set name_dish = '$name_dish_post', cost = '$cost_dish_post', photo = '$photo_dish', id_categ = '$categ_dish' where id_dish = $id_dish_post");
    if ($edit_dish_query) {
        echo "<script>alert('Запись изменена!!');location.href='edit_dish.php';</script>";
    }
    else{
         echo "<script>alert('Запись не изменена!!');location.href='edit_dish.php';</script>";
    }
}
?>
