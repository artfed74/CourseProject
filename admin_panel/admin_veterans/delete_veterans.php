<?php
require("../../DB_Connect/db_connect.php");
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../admin_login.php");
    exit();
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $veteranId = $_POST['id'];
        $selectStmt = $mysql->prepare("DELETE FROM `veterans` WHERE id=?");
        $selectStmt->bind_param("i", $veteranId);
        $selectStmt->execute();
        header("Location:../../pages/veterans.php");
        exit();
    }
}