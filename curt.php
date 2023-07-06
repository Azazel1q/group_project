<div class="menu">

    <?php 
        include("header.php");
        include("connect.php");
        $id_client = $_SESSION['id_client'];
        $curt_query = "select * from curt inner join clients, dishes, categories where curt.id_client = clients.id_client and curt.id_dish = dishes.id_dish and dishes.id_categ = categories.id_categ and curt.id_client = $id_client";
        $curt_result = mysqli_query($con, $curt_query);
    ?>
    <div class="container">
        <div class="menu_content">
            <h1>Корзина</h1>
            <form action="orderAdd.php?client=<?=$id_client;?>" method = "POST">
            <?php while($curt = mysqli_fetch_array($curt_result)){
                ?>
            <div class="card tovar_card">
                <div class="card_img tovar_img">
                    <img src="/img/menu_img/<?=$curt['photo'];?>" alt="<?=$curt['name_dish'];?>">
                </div>
                <div class="card_text tovar_text">
                    <h1><?=$curt['name_dish'];?></h1>
                    <li>Количество: </li><p><?=$curt['count'];?></p>
                    <li>Цена: </li><p><?=$curt['price'];?> ₽</p>
                    <li>Категория: </li><p><?=$curt['name_categ'];?></p>
                    <a href="?del=<?=$curt['id_curt'];?>">Удалить с корзины</a>
                    
                </div>
            </div>

            <?php
            }
            ?>
            <a href=""><button type="submit" class="button">Заказать</button></a>
            </form>
        </div>
    </div>
</div>  
<?php
if ($_GET['del']) {
    $del_query = "delete from curt where id_curt = {$_GET['del']}";
    $del_result = mysqli_query($con, $del_query);
    if ($del_result) {
        echo "<script>alert('Товар удален из корзины!!');location.href='/curt.php';</script>";
    }
    else{
         echo "<script>alert('Товар не удален из корзины!!');location.href='/curt.php';</script>";
    }
}
?>

