<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=\, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;200;300;400;500;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>"Hijouni Oi Shii" Ресторан</title>
</head>
<body>
  <header>
    <div class="logo">
      <img src="img/kunai_logo.png" alt=""> <p class="logo_text">Hijouni Oi</p> <span>Shii</span>
    </div>
  </header>
  <div class="panel">
    <div class="panel__item">
      <span class="panel__icon"><img src="img/icons/home.svg" alt=""></span>
      <a href="/index.php" class="panel__a">Главная</a>
    </div>
    <div class="panel__item">
      <span class="panel__icon"><img src="img/icons/menu.svg" alt=""></span>
      <a href="/menu.php" class="panel__a">Меню</a>
    </div>
    <div class="panel__item">
      <span class="panel__icon"><img src="img/icons/contacts.svg" alt=""></span>
      <a href="/contacts.php" class="panel__a">Контакты</a>
    </div>
    <div class="panel__item panel__reg">
      <span class="panel__icon"><img src="img/icons/man.svg" alt=""></span>
      <?php
      ini_set('display_errors', 0);
      if ($_SESSION['id_client']) {
      ?>
      <div style="display:flex; flex-direction:column; align-items:center;">
        <a href="/LK.php" class="panel__btn">Личный кабинет</a>
        <a href="/logout.php" class="panel__btn">Выход</a></div>
      <?php
      }
      else{
      ?>
      <a href="/auth-reg.php" class="panel__btn">Вход</a>
      <a href="/auth-reg.php" class="panel__btn">Регистрация</a>
      <?php
     }
      ?>
    </div>
  </div>