<div class="menu">
    <?php 
        include("header.php");
        include("connect.php");
        $id_client = $_SESSION['id_client'];
        $order_query = "select numb_order, sum(price), status, title_status, comment, date FROM orders inner join status where orders.status = status.id_status and orders.id_client = $id_client group by numb_order, status, title_status, comment, date";
        $order_result = mysqli_query($con, $order_query);
    ?>
    <div class="container">
        <div class="menu_content">
            <h1>Заказы</h1>
            <?php while($order = mysqli_fetch_array($order_result)){
                ?>
            <div class="card tovar_card">

                <div class="card_img tovar_img">
                  <h1 style="color: #ec4f33"><?=$order['numb_order'];?></h1>
                </div>
                <div class="card_text tovar_text">

                    <li>Цена: </li><p><?=$order['sum(price)'];?> ₽</p>
                    <li>Статус: </li><p><?=$order['title_status'];?></p>
                    <li>Дата заказа: </li><p><?=$order['date'];?></p>
                    <li>Комментарий: </li><p><?=$order['comment'];?></p>
                    <?php if ($order['title_status'] == "В ожидании" || $order['title_status'] == "Отклонен") {
                    ?>
                    <a href="?del=<?=$order['numb_order'];?>">Отменить заказ</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php
            }
            ?>
            
        </div>
    </div>
</div>  
<?php
if ($_GET['del']) {
    $del_query = "delete from orders where numb_order = {$_GET['del']}";
    $del_result = mysqli_query($con, $del_query);
    if ($del_result) {
        echo "<script>alert('Заказ отменен!!');location.href='/orders.php';</script>";
    }
    else{
         echo "<script>alert('Заказ не отменен!!');location.href='/orders.php';</script>";
    }
}
?>