<div class="menu">
    <?php 
        include("header.php");
        include("connect.php");
        $id_client = $_SESSION['id_client'];
        $clients_query = "select * from clients where id_client = $id_client";
        $clients_result = mysqli_query($con, $clients_query);
        $clients = mysqli_fetch_array($clients_result);
    ?>
    <div class="container">
        <div class="menu_content">
            <h1>Личный кабинет</h1>
            <div class="card tovar_card">
                    <div class="card_img tovar_img">
                        <img src="/img/LK.jpg" alt="">
                    </div>
                    <div class="card_text tovar_text">
                        <h3>ФИО: <?=$clients['surname'];?> <?=$clients['name'];?> <?=$clients['patronymic'];?></h3>
                        <p>Телефонный номер: <?=$clients['phone'];?></p>
                        <p>Логин: <?=$clients['login'];?></p>
                        <p>Адрес: г. <?=$clients['city'];?> ул. <?=$clients['street'];?> д. <?=$clients['house'];?> п. <?=$clients['entrance'];?> кв. <?=$clients['apartment'];?></p>
                        <a href="/curt.php">Корзина</a>
                        <a href="/orders.php">Заказы</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>  