<?php
require("../../DB_Connect/db_connect.php");
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../admin_login.php");
    exit();
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $alumni_id = $_POST['id'];
        $selectStmt = $mysql->prepare("DELETE FROM `notable alumni` WHERE id=?");
        $selectStmt->bind_param("i", $alumni_id);
        $selectStmt->execute();
        header("Location:../../pages/notable_alumni.php");
        exit();
    }
}