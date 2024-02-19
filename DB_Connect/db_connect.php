<?php
$name = 'root';
$password = '';
$db_name = 'museum';
$host = 'localhost';
$mysql = mysqli_connect($host,$name,$password,$db_name);
if (mysqli_connect_errno()) {
    echo "<h2 style='color:red;font-weight:300;text-align:center'>Ошибка подключения к базе данных.Проверьте правильность подключения к базе данных</h2>";
}
?>