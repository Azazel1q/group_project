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
  <link rel="stylesheet" href="../style.css">
  <title>"Hijouni Oi Shii" Ресторан</title>
</head>
<body>
  <header>
    <div class="logo">
      <img src="../img/full_logo.png" alt="">
    </div>
  </header>
  <div class="panel">
    <?php
      ini_set('display_errors', 0);
      if ($_SESSION['id_logist']) {
      ?>
    <div class="panel__item panel__reg">
      <span class="panel__icon"><img src="../img/icons/man.svg" alt=""></span>
      

      <a href="/logout.php" class="panel__btn">Выход</a>

      
    </div>
    <?php
     }
      ?>
  </div>