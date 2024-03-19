<?php session_start();
require("../../DB_Connect/db_connect.php");
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../admin_login.php");
    exit();
}
$stmt = $mysql->prepare("SELECT * FROM `achives` ORDER BY `type` desc");
$stmt->execute();
$result = $stmt->get_result();
$rows = $result->fetch_all(MYSQLI_ASSOC);
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST['name'];
    $year=$_POST['year'];
    $type=$_POST['type'];
    $new_type='';
    if($type=="Спорт"){
        $new_type='Sport';
    }
    elseif($type=="Научно-исследовательская"){
        $new_type="Scientific";
    }
    elseif($type=="Лучший преподаватель"){
        $new_type="Best_teacher";
    }
    elseif($type=="Достижения преподавателей и студентов"){
        $new_type="Achives_teachers_veterans";
    }
    elseif($type=="Worldskill"){
        $new_type="Worldskill";
    }
    $current_path = $_FILES['myfile']['tmp_name'];
         $filename = $_FILES['myfile']['name'];
         $arr = explode('.', $filename);
         $ext = end($arr);
         $filename = time() . '.' . $ext;
         $new_path = __DIR__ . '/../../assets/'.$new_type.'/' . $filename;
         move_uploaded_file($current_path, $new_path);
         $image_path = $new_type . '/' . $filename;
    $stmt=$mysql->prepare("INSERT INTO `achives`(name,year,type,image) VALUES(?,?,?,?)");
    $stmt->bind_param("ssss",$name,$year,$type,$image_path);
    $stmt->execute();
    header("Location:admin_panel.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="admin_reduct_achive.css">
    <title>Добавление</title>
</head>
<body>
   
    <div class="container">
    <h2 style="text-align:center;font-weight:300">Добавление награды</h2>
    <form class="form-login" method="POST" action="#" enctype="multipart/form-data">
    <label>Название</label>
    <input type="text" name="name">
    <label>Год</label>
    <input type="text" name="year">
    <label>Тип</label>
    <select name="type">
    <?php
                    $uniqueTypes = array_unique(array_column($rows, 'type'));
                    foreach ($uniqueTypes as $type) {
                        echo "<option value='" . $type . "'>" . $type . "</option>";
                    }
                    ?>
    </select>
    <label>Изображение</label>
    <input type="file" name="myfile">
    <input type="submit" value="Добавить">
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>