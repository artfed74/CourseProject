<?php
require("../DB_Connect/db_connect.php");
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: admin_login.php");
    exit();
} else {
    $stmt = $mysql->prepare("SELECT * FROM `feedback`");
    $stmt->execute();
    $result = $stmt->get_result();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Panel</title>
</head>

<body>
    <h1 style="font-weight: 300; text-align:center">Добро пожаловать в панель администратора!</h1>
    <h3 style="font-weight: 300; text-align:center">Вопросы из обратной связи</h3>
    <table class="table_feedback" style="width: 80%; margin:0 auto; height:auto">
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Почта</th>
            <th>Комментарий</th>
            <th></th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['comment'] ?></td>
                <td>
                    <form action="Delete_feedback.php" method="POST">
                        <input name="id" type="hidden" value="<?php echo $row['id'] ?>">
                        <input type="submit" class="del_btn" name="delete_feedback" value="Удалить" onclick="return confirmDelete();">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        function confirmDelete() {
            return confirm("Подтвердите удаление данных?");
        }
    </script>

</body>

</html>