<?php
require("../../DB_Connect/db_connect.php");
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../admin_login.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $patr = $_POST['patr'];
    $biography=$_POST['biography'];

    $current_path = $_FILES['myfile']['tmp_name'];
    $filename = $_FILES['myfile']['name'];
    $arr = explode('.', $filename);
    $ext = end($arr);
    $filenameWithExt = time() . '.' . $ext;
    $new_path = __DIR__ . '/../../assets/Alumni' . '/' . $filename;
    move_uploaded_file($current_path, $new_path);
    $image_path = 'Alumni'.'/' . $filename;
    $stmt = $mysql->prepare("INSERT INTO `notable alumni`(firstname,lastname,patr,biography,image) VALUES(?,?,?,?,?)");
    $stmt->bind_param("sssss", $firstname, $lastname, $patr,$biography, $filenameWithExt);
    $stmt->execute();
    header("Location:../../pages/notable_alumni.php");
}
$selectStmt = $mysql->prepare("SELECT * FROM `notable alumni`");
$selectStmt->execute();
$query = $selectStmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="reduct-alumni.css">
    <title>Добавление</title>
</head>

<body>
    <div class="container">
        <h2 style="text-align:center;font-weight:300">Добавление выпускника</h2>
        <form class="form-login" method="POST" action="#">
            <label>Фамилия</label>
            <input type="text" name="firstname">
            <label>Имя</label>
            <input type="text" name="lastname">
            <label>Отчество</label>
            <input type="text" name="patr">
            <label>Биография</label>
            <textarea name="biography"></textarea>
            <label style="margin-top: 10px;">Изображение</label>
            <input type="file" name="myfile" accept=".png, .jpg, .jpeg" />
            <input type="submit" value="Добавить">
        </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
