<?php 
require("../DB_Connect/db_connect.php");
session_start();
$stmt = $mysql->prepare("SELECT * FROM `veterans`");
$stmt->execute();
$result = $stmt->get_result();
$rows = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <link rel="stylesheet" href="../styles/alumni.css">
    <title>Document</title>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <img src="../assets/logo.png" style="width:30px;height:30px"> <a class="navbar-brand" href="#">Музей МПК</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="achives.php">Награды</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="notable_alumni.php">Выдающиеся выпускники</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ветераны труда</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="veterans.php">Участники войны</a>
                </li>
            </ul>
            
            <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == true) { ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../admin_panel/admin_feedback/admin_panel.php">Обратная связь</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin_panel/admin_achives/admin_panel.php">Управление наградами</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger" href="#" onclick="confirmLogout();">Выйти</a>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </div>
</nav>
    <div class="container">
        <div class="row">
            <h1 style='font-weight:500; color:#323C8D;'>Участники войны</h1>
            <p>
Фронтендер, добавь текст
            </p>
            <?php if(isset($_SESSION['admin']) && $_SESSION['admin']==true) { ?>
                <a href="../admin_panel/admin_veterans/add_veterans.php" class="new_alumni">Новый участник войны</a>
                <?php }?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php 
            foreach ($rows as $row) { ?>
                <div class="col-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="card" style="width: 18rem;" data-alumni-id="<?php echo $row['id']; ?>">
                        <img src="../assets/<?php echo $row['image'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-title"><?php echo $row['firstname'] ?><br><?php echo $row['lastname'] ?><br><?php echo $row['patr'] ?></h6>
                            <center>
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal_<?php echo $row['id']; ?>">Подробнее</button>
                            </center>
                            <?php if(isset($_SESSION['admin']) && $_SESSION['admin']==true) {?>
                                <center><button class="btn_reduct" onclick="goreduct(this)" data-alumni-id="<?php echo $row['id']; ?>">Редактировать</button></center>
                                <center>
                                <form action="../admin_panel/admin_veterans/delete_veterans.php" method="POST">
                                    <input name="id" type="hidden" value="<?php echo $row['id'] ?>">
                                    <input type="submit" class="btn_delete" name="delete_veterans" value="Удалить" onclick="return confirmDelete();">
                                </form>
                                </center>
                                <?php }?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php 
    foreach ($rows as $row) { ?>
       <div class="modal fade" id="myModal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel_<?php echo $row['id']; ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Информация о выпуснике</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <img src="../assets/<?php echo $row['image'] ?>" class="card-img-top" alt="...">
                    <h6 class="card-title"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?> <?php echo $row['patr'] ?></h6>
                    <!-- <audio controls>
                    <source src="../assets/mp3/1.mp3" type="audio/mpeg">
        
                    </audio> -->
                    <p><?php echo $row['biography'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
// Функция подтверждения выхода
function confirmLogout() {
    const confirmLogout = confirm("Вы уверены, что хотите выйти?");

    if (confirmLogout) {
        const form = document.createElement('form');
        form.method = 'post';
        form.action = '../admin_panel/logout.php'; // Перенаправление на logout.php

        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'confirm_logout';
        input.value = 'true';

        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    }
}
function goreduct(btn) {
    const alumniId = btn.getAttribute('data-alumni-id');
    window.location.href = `../admin_panel/admin_veterans/reduct_veterans.php?id=${alumniId}`;
}

// Добавляем обработчики событий после загрузки DOM
document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll('.card');

    function checkCardVisibility() {
        cards.forEach(card => {
            if (isElementInViewport(card, 600)) {
                card.classList.add('show');
            }
        });
    }

    function isElementInViewport(el, offset = 0) {
        const rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom - offset <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    window.addEventListener('load', checkCardVisibility);
    window.addEventListener('scroll', checkCardVisibility);
});
function confirmDelete() {
            return confirm("Подтвердите удаление участника войны?");
        }
</script>
</body>
</html>