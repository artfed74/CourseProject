<?php session_start();
require("../../DB_Connect/db_connect.php");
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../admin_login.php");
    exit();
} else {
    $stmt = $mysql->prepare("SELECT * FROM `achives`");
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
    <link rel="stylesheet" href="admin_achives.css">
    <title>Admin Panel</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img src="../../assets/logo.png" style="width:30px;height:30px"> <a class="navbar-brand" href="#">Панель администратора</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../../index.php">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../pages/achives.php">Награды</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../pages/notable_alumni.php">Выдающиеся выпускники</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../pages/teachers-veterans.php">Ветераны труда</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../pages/veterans.php">Участники войны</a>
                    </li>
                </ul>

                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) { ?>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../admin_feedback/admin_panel.php">Обратная связь</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Управление наградами</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-danger" href="#" onclick="confirmLogout();">Выйти</a>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </nav>
    <h3 style="font-weight: 300; text-align:center; color:#323C8D;">БД "Награды"</h3>
    <div class="container">
        <a href="Add_achive.php" class="add_button">Добавить награду</a>
    </div>
    <table class="table_feedback" style="width: 80%; margin:0 auto; height:auto;margin-top: 30px;">
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Год</th>
            <th>Тип</th>
            <th>Изображение</th>
            <th></th>
            <th></th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['year'] ?></td>
                <td><?php echo $row['type'] ?></td>
                <td><?php echo $row['image'] ?></td>
                <td>
                    <form action="Delete_achives.php" method="POST">
                        <input name="id" type="hidden" value="<?php echo $row['id'] ?>">
                        <input type="submit" class="del_btn" name="delete_feedback" value="Удалить" onclick="return confirmDelete();">
                    </form>
                </td>
                <td><a href="Reduct_achive.php?id=<?php echo $row['id']; ?>" class="reduct_btn">Редактировать</a></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        function confirmLogout() {
            const confirmLogout = confirm("Вы уверены, что хотите выйти?");

            if (confirmLogout) {
                const form = document.createElement('form');
                form.method = 'post';
                form.action = '../logout.php'; // Перенаправление на logout.php

                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'confirm_logout';
                input.value = 'true';

                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            }
        }

        function confirmDelete() {
            return confirm("Подтвердите удаление данных?");
        }
    </script>

</body>

</html>