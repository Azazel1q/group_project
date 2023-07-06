<div class="menu_adm">
    <?php 
        include("header.php");
        include("../connect.php");
        $id_adm = $_SESSION['id_admin'];
        $categ_query = "select * from categories";
        $categ_result = mysqli_query($con, $categ_query);
        $id_categ = $_GET['edit'];
        if ($id_categ) {
            $categ_inf = mysqli_query($con, "select * from categories where id_categ = $id_categ");
        $categ_inf_res = mysqli_fetch_array($categ_inf);
        }
        
    ?>
    <div class="container">
        <h1>Категории</h1>
        <table class="table">
            <thead>
           <tr>
               <th>ID</th>
               <th>Наименование<a href="add_categ.php" style="margin-left: 20px;"><button>Добавить категорию</button></a></th>
           </tr>
           </thead>
           <tbody>
           <?php while($categ = mysqli_fetch_array($categ_result)){
                ?>

           <tr>
               <td><?=$categ['id_categ'];?></td>
               <td><?=$categ['name_categ'];?></td>
               <td><a href="?edit=<?=$categ['id_categ'];?>"><button>Редактировать</button></a></td>
               <td><a href="?del=<?=$categ['id_categ'];?>"><button>Удалить</button></a></td>
           </tr>
           
            <?php
            }
            ?>
             </tbody>
        </table>
        <form action="" method="POST">
            <p style="margin: 10px 0px">Введите наименование</p>
            <input type="text" value="<?=$categ_inf_res['id_categ'];?>" style = "display: none;" name ="id_categ">
            <input type="text" value="<?=$categ_inf_res['name_categ'];?>" name ="name_categ">
            <button>Сохранить</button>
        </form>
    </div>
</div>  
<?php
if ($_GET['del']) {
    $del = $_GET['del'];
    $del_query = "delete from categories where id_categ = $del";
    $del_result = mysqli_query($con, $del_query);
    if ($del_result) {
        echo "<script>alert('Запись удалена!!');location.href='edit_categ.php';</script>";
    }
    else{
         echo "<script>alert('Запись не удалена!!');location.href='edit_categ.php';</script>";
    }
}
?>

<?php
if (!empty($_POST)){
    $id_categ_post = $_POST['id_categ'];
    $name_categ_post = $_POST['name_categ'];
    $edit_categ_query = mysqli_query($con, "update categories set name_categ = '$name_categ_post' where id_categ = $id_categ_post");
    if ($edit_categ_query) {
        echo "<script>alert('Запись изменена!!');location.href='edit_categ.php';</script>";
    }
    else{
         echo "<script>alert('Запись не изменена!!');location.href='edit_categ.php';</script>";
    }
}
?>
