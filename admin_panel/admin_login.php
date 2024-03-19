<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$error_message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];
    if ($login !== "admin" || $password !== "admintop") {
        $error_message = "Неправильный логин или пароль!";
    } else {
        $_SESSION['admin'] = true;
        header("Location:admin_achives/admin_panel.php");
        exit();
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="admin_login.css">
    <title>Document</title>
</head>

<body>
    <div class="container">

        <form class="form-login" method="POST" action="#">
            <h3 style="font-weight: 300; text-align:center">Авторизация администратора</h3>
            <input type="text" placeholder="Логин" name="login">
            <input type="password" placeholder="Пароль" name="password">
            <input type="submit" value="Войти">
            <span style="color: red;"><?php echo $error_message ?></span>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>