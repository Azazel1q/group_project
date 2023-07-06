<div class="menu">
    <?php 
        include("header.php");
    ?>
    <?php
    include("connect.php");
    $prod_query = "select * from dishes";
    if ($_POST['categ'] || $_POST['cost']) {
        $filter_categ = $_POST['categ'];
        $filter_cost = $_POST['cost'];
        if ($filter_categ == 0) {
            $prod_query = "select * from dishes order by cost $filter_cost";
        }
        else{
        $prod_query = $prod_query." where id_categ = $filter_categ order by cost $filter_cost";
        }
    }

    $prod_result = mysqli_query($con, $prod_query);
    $categ_query = "select * from categories";
    $categ_result = mysqli_query($con, $categ_query);
    ?>
    <div class="container">
        <div class="menu_content">
            <h1>Меню</h1>
            <form action="#" class="filter" method="POST">
                <h2>Сортировка</h2>
                <div class="input_group">
                    <h3><b>Категория</b></h3>
                    <select name="categ" class="input">
                        <option value="0">Все</option>
                        <?php while($categ = mysqli_fetch_array($categ_result)){
                            ?>
                        <option value="<?=$categ['id_categ'];?>"><?=$categ['name_categ'];?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <h3><b>Цена</b></h3>
                    <select name="cost">
                        <option value="desc">По убыванию</option>
                        <option value="asc">По возрастанию</option>
                    </select>
                    <button class = "button">Поиск</button>
                </div>
            </form>
            <div class="menu_body">
                <?php while($prod = mysqli_fetch_array($prod_result)){
                    ?>
            <div class="card">
                    <div class="card_img">
                        <img src="/img/menu_img/<?=$prod['photo'];?>" alt="<?=$prod['name_dish'];?>">
                    </div>
                    <div class="card_text">
                        <h3><?=$prod['name_dish'];?></h3>
                        <p><?=$prod['cost'];?> ₽</p>
                        <a href="/tovar.php?dish=<?=$prod['id_dish'];?>">Подробнее</a>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>  