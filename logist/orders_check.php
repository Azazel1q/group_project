<div class="menu">
    <?php 
        include("header.php");
        include("../connect.php");
        $id_log = $_SESSION['id_logist'];
        $order_query = "select numb_order, sum(price), status, title_status, comment, date FROM orders inner join status where orders.status = status.id_status and status = 1 group by numb_order, status, title_status, comment, date";
        $order_result = mysqli_query($con, $order_query);
        $cur_query = "select * from employees where id_role = 3 and status_empl = 1";
        $cur_result = mysqli_query($con, $cur_query);
    ?>
    <div class="container">
        <div class="menu_content">
            <h1>Заказы</h1>
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
                    <li>Комментарий: </li><p><?=$order['comment'];?></p>
                    <?php if ($order['title_status'] == "В ожидании") {
                    ?>
                    <form action="?del=<?=$order['numb_order'];?>" method="POST">
                    <button>Отклонить заказ</button>
                    <li>Причина отклонения: <input type="text" name="decl"></li>
                    </form>
                    <form action="?ap=<?=$order['numb_order'];?>" method="POST">
                        
                        <li>Курьер: <select name="id_cur">
                            <?php while($cur = mysqli_fetch_array($cur_result)){
                                ?>
                            <option value="<?=$cur['id_employee'];?>"><?=$cur['name'];?></option>
                            <?php
                        }
                            ?>
                        </select><button>Назначит курьера</button></li>

                    </form>
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
    $decl = $_POST['decl'];
    $del_query = "update orders set comment = '$decl', status = 3 where numb_order = '$get_numb'";
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
    $id_cur = $_POST['id_cur'];
    $del_query = "update orders set employee = '$id_cur', status = 2 where numb_order = '$get_numb'";
    $del_result = mysqli_query($con, $del_query);
    if ($del_result) {
        echo "<script>alert('Заказ подтвержден!!');location.href='orders_check.php';</script>";
    }
    else{
         echo "<script>alert('Заказ не подтвержден!!');location.href='orders_check.php';</script>";
    }
}
?>
