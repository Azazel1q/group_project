<?php
session_start();
session_destroy();
echo "<script>alert('Вы вышли из личного кабинета!!');location.href='/index.php';</script>";
?>