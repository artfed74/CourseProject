<?php session_start();
require("../../DB_Connect/db_connect.php");
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../admin_login.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $achiveID = $_GET['id'];
    $name = $_POST['name'];
    $year = $_POST['year'];
    $type = $_POST['type'];
    $image = $_POST['image'];
    $updateStmt = $mysql->prepare("UPDATE  `achives` SET  name = ?, year = ?, type = ?, image = ? WHERE id = ?");
    $updateStmt->bind_param("ssssi", $name, $year, $type, $image, $achiveID);
    $updateStmt->execute();
    $updateStmt->close();
    header("Location: admin_panel.php");
    exit();
}
$achiveID = $_GET['id'];
$selectStmt = $mysql->prepare("SELECT * FROM `achives` WHERE id = ?");
$selectStmt->bind_param("i", $achiveID);
$selectStmt->execute();
$query = $selectStmt->get_result();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="admin_reduct_achive.css">
    <title>Редактирование</title>
</head>

<body>
    <?php
    if ($row = $query->fetch_assoc()) {
    }
    ?>
    <div class="container">
        <h2 style="text-align:center;font-weight:300">Редактирование награды</h2>
        <form class="form-login" method="POST" action="#">
            <label>Название</label>
            <input type="text" value="<?php echo $row['name'] ?>" name="name">
            <label>Год</label>
            <input type="text" value="<?php echo $row['year'] ?>" name="year">
            <label>Тип</label>
            <input type="text" value="<?php echo $row['type'] ?>" name="type">
            <label>Путь к изображению</label>
            <input type="text" value="<?php echo $row['image'] ?>" name="image">
            <label style="margin-top: 10px;">Изображение</label>
            <button type="button" class="btn_modal">Открыть</button>
            <input type="submit" value="Изменить">
        </form>
        <div class="modal" id="imageModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Изображение</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img id="modalImage" src="" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        const openModalButton = document.querySelector('.btn_modal');
        const closeModalButton = document.querySelector('.modal .btn-close');

        openModalButton.addEventListener('click', function() {
            modalImage.src = "../../assets/<?php echo $row['image']; ?>";
            modal.style.display = 'block';
            setTimeout(function() {
                modal.classList.add('fade-in');
            }, 100);
        });

        closeModalButton.addEventListener('click', function() {
            modal.classList.remove('fade-in');
            setTimeout(function() {
                modal.style.display = 'none';
            }, 300);
        });
    </script>
</body>

</html>