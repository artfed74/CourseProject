<?php
require("../DB_Connect/db_connect.php");
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
    <div class="container">
        <div class="row">
            <h1 style='font-weight:500; color:#323C8D;'>Награды</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo.</p>
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
                <div class="col-3 image_container"><img type="<?php echo $row['type'] ?>" src="../assets/<?php echo $row['image'] ?>" year="<?php echo $row['year'] ?>" onclick="enlargeImg()"></div>
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

            var images = document.querySelectorAll('.col-3');

            images.forEach(function(image) {
                var isVisibleType = type === '' || image.querySelector('img').getAttribute('type') === type;
                var isVisibleYear = year === '' || image.querySelector('img').getAttribute('year') === year;

                if (isVisibleType && isVisibleYear) {
                    image.style.display = 'block';
                } else {
                    image.style.display = 'none';
                }
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

            window.addEventListener('scroll', throttle(handleScroll, 200)); // Throttling scroll event

            checkVisibility(types);
            checkVisibility(imageContainers);
        });
    </script>
</body>

</html>