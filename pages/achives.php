<?php
require("../DB_Connect/db_connect.php");
session_start();
$stmt = $mysql->prepare("SELECT * FROM `achives` ORDER BY `type` desc");
$stmt->execute();
$result = $stmt->get_result();

$prevType = null;
$rows = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/achives.css">
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
          <a class="nav-link active" href="achives.php">Награды</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="notable_alumni.php">Выдающиеся выпускники</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ветераны труда</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="veterans.php">Участники войны</a>
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
            <h1 style='font-weight:500; color:#323C8D;'>Награды</h1>
            <p>
            Фронтендер, добавь текст       
         </div>
    </div>
    <div class="container sort">
        <div class="row">
            <div class="col-6"></div>
            <div class="col-2">
                <select id="typeSelect" class="form-select">
                    <option value="">Тип награды</option>
                    <?php
                    $uniqueTypes = array_unique(array_column($rows, 'type'));
                    foreach ($uniqueTypes as $type) {
                        echo "<option value='" . $type . "'>" . $type . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-2">
                <select id="yearSelect" class="form-select">
                    <option value="">Год награды</option>
                    <?php
                    $uniqueYears = array_unique(array_column($rows, 'year'));
                    sort($uniqueYears);
                    foreach ($uniqueYears as $option) {
                        echo "<option value='" . $option . "'>" . $option . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-2">
                <button class="btn_sort">Сортировать</button>
            </div>
        </div>
    </div>

    <div class="container images_cont">
        <div class="row">
            <?php
            foreach ($rows as $row) {
                if ($row['type'] != $prevType) {
                    echo "<div class='image_container'>
                            <h1 class='types'>" . $row['type'] . "</h1>
                          </div>";
                    $prevType = $row['type'];
                }
            ?>
            
                <div class="col-4 image_container"><img type="<?php echo $row['type'] ?>" src="../assets/<?php echo $row['image'] ?>" year="<?php echo $row['year'] ?>" onclick="enlargeImg()"></div>
            <?php
            }
            ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
       
        document.querySelector('.btn_sort').addEventListener('click', function() {
            var type = document.getElementById('typeSelect').value;
            var year = document.getElementById('yearSelect').value;

            var images = document.querySelectorAll('.col-4');

            images.forEach(function(image) {
    var imageType = image.querySelector('img').getAttribute('type');
    var isVisibleType = type === '' || imageType === type;
    var isVisibleYear = year === '' || image.querySelector('img').getAttribute('year') === year;

    if (isVisibleType && isVisibleYear) {
        image.style.display = 'block';
    } else {
        image.style.display = 'none';
    }
    // Версия 2, если нужна другая сортировка
    // var types = document.querySelectorAll('.types');
    // types.forEach(type => {
    //     if (type.innerText === type) {
    //         type.style.display = 'block';
    //     } else {
    //         type.style.display = 'none';
    //     }
        });
        });
        document.addEventListener("DOMContentLoaded", function() {
            const types = document.querySelectorAll('.types');
            const imageContainers = document.querySelectorAll('.image_container');

            function checkVisibility(elements) {
                elements.forEach(element => {
                    var positionFromTop = element.getBoundingClientRect().top;
                    var windowHeight = window.innerHeight;
                    if (positionFromTop - windowHeight <= 0) {
                        element.classList.add('show');
                    }
                });
            }

            function throttle(func, limit) {
                let inThrottle;
                return function() {
                    if (!inThrottle) {
                        func.apply(this, arguments);
                        inThrottle = true;
                        setTimeout(function() {
                            inThrottle = false;
                        }, limit);
                    }
                };
            }

            function handleScroll() {
                checkVisibility(types);
                checkVisibility(imageContainers);
            }

            window.addEventListener('scroll', throttle(handleScroll, 100)); // Throttling scroll event

            checkVisibility(types);
            checkVisibility(imageContainers);
        });
    </script>
</body>

</html>