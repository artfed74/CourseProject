<?php
require("../../DB_Connect/db_connect.php");
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../admin_login.php");
    exit();
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $teacher_ID = $_POST['id'];
        $selectStmt = $mysql->prepare("DELETE FROM `teachers-veterans` WHERE id=?");
        $selectStmt->bind_param("i", $teacher_ID);
        $selectStmt->execute();
        header("Location:../../pages/teachers-veterans.php");
        exit();
    }
}