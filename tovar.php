<div class="menu">
    <?php 
        include("header.php");
    ?>
     <?php
    include("connect.php");
    $id_dish = $_GET['dish'];
    $prod_query = "select * from dishes inner join categories where dishes.id_categ = categories.id_categ and id_dish = $id_dish";
    $prod_result = mysqli_query($con, $prod_query);
    $prod = mysqli_fetch_array($prod_result);
    ?>
    <div class="container">
        <div class="menu_content">
            <h1>Блюдо</h1>
            <form action="/curtAdd.php?prod=<?=$prod['id_dish'];?>" method="POST">
            <div class="card tovar_card">
                    <div class="card_img tovar_img">
                        <img src="/img/menu_img/<?=$prod['photo'];?>" alt="<?=$prod['name_dish'];?>">
                    </div>
                    <div class="card_text tovar_text">
                        <h1><?=$prod['name_dish'];?></h1>
                        <li>Цена: </li><p><?=$prod['cost'];?></p>
                        <li>Категория: </li><p><?=$prod['name_categ'];?></p>
                        <?php 
                        ini_set('display_errors', 0);
                        if ($_SESSION['id_client']) {
                        ?>
  <div class="row">
    
    <li>Цена: </li><p class="price"><?=$prod['cost'];?></p>
    <div class="input__field">
      <button class="fa-solid fa-minus down button">-</button>
      <input type="number" value="1" min="1" name="count" readonly style="width: 50px; margin: 10px 0px; background: #2a2a2a99; color: white;">
      <button class="fa-solid fa-plus up button">+</button>
    </div>
  </div>
  <li>Итог:</li><p class="total"> <span><?=$prod['cost'];?></span> ₽</p>
</form>

                        <input class="button" type="submit" value="Добавить в корзину">
                        </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>  
<script>
    let btnUp = document.querySelectorAll(".up"),
    btnDown = document.querySelectorAll(".down"),
    input = document.querySelectorAll("input");

input.forEach(item => {
  item.addEventListener('keypress', function(e) {
    if(e.key === "Enter") {
      e.preventDefault();
      sum();
    }
  });
  item.addEventListener('blur', function(e) {
    item.value = item.value === '' ? 0 : item.value ;
    sum();
  });
});

btnDown.forEach(item => {
  item.addEventListener('click', function(e) {
    e.preventDefault();
    if (item.parentNode.querySelector("input").value > "0") {
      item.nextElementSibling.stepDown();
    };
    sum();
  });
});

btnUp.forEach(item => {
  item.addEventListener('click', function(e) {
    e.preventDefault();
    item.previousElementSibling.stepUp();
    sum();
  });
})

function sum() {
  let total = 0;
  let inputField = document.querySelectorAll(".row");
  inputField.forEach(item => {
  let value = item.querySelector("input").value;
  console.log(value);
  let price = item.querySelector(".price").innerText.replace('$','');
  total = total + value * price;
  document.querySelector('.total').children[0].innerHTML = total;
});  
}

</script>
