<div class="menu">
    <?php 
        include("header.php");
        include("../connect.php");
        $id_cur = $_SESSION['id_cur'];
        $order_query = "select numb_order, sum(price), status, title_status, comment, date, employee FROM orders inner join status where orders.status = status.id_status and status = 5 and employee = $id_cur group by numb_order, status, title_status, comment, date, employee";
        $order_result = mysqli_query($con, $order_query);
    ?>
    <div class="container">
        <div class="menu_content">
            <h1>Принятые заказы</h1>
            <?php while($order = mysqli_fetch_array($order_result)){
                ?>
            <div class="card tovar_card">

                <div class="card_img tovar_img">
                  <h1 style="color: #fce808"><?=$order['numb_order'];?></h1>
                </div>
                <div class="card_text tovar_text">

                    <li>Цена: </li><p><?=$order['sum(price)'];?> ₽</p>
                    <li>Статус: </li><p><?=$order['title_status'];?></p>
                    <li>Дата заказа: </li><p><?=$order['date'];?></p>
                    <?php if ($order['title_status'] == "Доставляется") {
                    ?>
                    <a href="?deliv=<?=$order['numb_order'];?>">Доставлен</a>
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
    $get_numb = $_GET['del'];
    $del_query = "update orders set status = 1, employee = null where numb_order = '$get_numb'";
    $del_result = mysqli_query($con, $del_query);
    if ($del_result) {
        echo "<script>alert('Заказ отменен!!');location.href='orders_check.php';</script>";
    }
    else{
         echo "<script>alert('Заказ не отменен!!');location.href='orders_check.php';</script>";
    }
}
?>
<?php
if ($_GET['ap']) {
    $get_numb = $_GET['ap'];
    $del_query = "update orders set status = 5 where numb_order = '$get_numb'";
    $del_result = mysqli_query($con, $del_query);
    $cur_query = "update employees set status_empl = 2 where id_employee = $id_cur";
    $cur_result = mysqli_query($con, $cur_query);
    if ($del_result && $cur_result) {
        echo "<script>alert('Заказ принят!!');location.href='orders_check.php';</script>";
    }
    else{
         echo "<script>alert('Заказ не принят!!');location.href='orders_check.php';</script>";
    }
}
?>
<?php
if ($_GET['deliv']) {
    $get_numb = $_GET['deliv'];
    $del_query = "update orders set status = 4 where numb_order = '$get_numb'";
    $del_result = mysqli_query($con, $del_query);
    $cur_query = "update employees set status_empl = 1 where id_employee = $id_cur";
    $cur_result = mysqli_query($con, $cur_query);
    if ($del_result && $cur_result) {
        echo "<script>alert('Заказ доставлен!!');location.href='orders_check.php';</script>";
    }
    else{
         echo "<script>alert('Ошибка!!');location.href='orders_check.php';</script>";
    }
}
?>
