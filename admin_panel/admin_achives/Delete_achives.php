<?php
require("../../DB_Connect/db_connect.php");
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../admin_login.php");
    exit();
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $achive_id = $_POST['id'];
        $selectStmt = $mysql->prepare("DELETE FROM `achives` WHERE id=?");
        $selectStmt->bind_param("i", $achive_id);
        $selectStmt->execute();
        header("Location:admin_panel.php");
        exit();
    }
}
