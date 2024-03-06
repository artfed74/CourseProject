<?php
$hostname = 'localhost';
$name = 'root';
$password = '';
$db = 'db_project';
$mysqli = mysqli_connect($hostname, $name, $password, $db);
if ($mysqli->connect_errno) {
    echo "Ошибка соединения с БД " . $mysqli->connect_error;
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $userId = $_GET['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $patr = $_POST['patr'];
        $phone = $_POST['phone'];
        $birthday = $_POST['birthday'];
        $hobby = $_POST['hobby'];
        $hobby_json = json_encode([$hobby]);

        $updateStmt = $mysqli->prepare("UPDATE  `users` SET  firstname = ?, lastname = ?, patr = ?, phone = ?, birthday = ?, hobby = ? WHERE id = ?");
        $updateStmt->bind_param("ssssssi", $firstname, $lastname, $patr, $phone, $birthday, $hobby_json, $userId);
        $updateStmt->execute();
        $updateStmt->close();
        header("Location: index.php");
        exit();
    }
    $userId = $_GET['id'];
    $selectStmt = $mysqli->prepare("SELECT * FROM `users` WHERE id = ?");
    $selectStmt->bind_param("i", $userId);
    $selectStmt->execute();
    $query = $selectStmt->get_result();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tablestyle.css">
    <title>Document</title>
</head>

<body>
    <h2 style="text-align:center">Редактирование пользователя</h2>
    <?php
    if ($row = $query->fetch_assoc()) {
        $result = json_decode($row['hobby']);
    } else {
        echo "User not found!";
    }
    ?>
    <form class="form-style" action="" method="POST">
        <div class="info">
            <label>Имя</label> <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>">
        </div>
        <div class="info">
            <label>Фамилия</label> <input type="text" name="lastname" value="<?php echo $row['lastname']; ?>">
        </div>
        <div class="info">
            <label>Отчество</label> <input type="text" name="patr" value="<?php echo $row['patr']; ?>">
        </div>
        <div class="info">
            <label>Телефон</label> <input type="phone" name="phone" value="<?php echo $row['phone']; ?>">
        </div>
        <div class="info">
            <label>Дата рождения</label> <input type="date" name="birthday" value="<?php echo $row['birthday']; ?>">
        </div>
        <div class="info">
            <label>Хобби</label> <input type="text" name="hobby" value="<?php
                                                                        foreach ($result as $hobby => $key) {
                                                                            echo  $key . ' ';
                                                                        }
                                                                        ?>">
        </div>
        <div class="inp_btn">
            <center><input type="submit" value="Отправить" class="inpbut"> </center>
        </div>
    </form>
</body>

</html>