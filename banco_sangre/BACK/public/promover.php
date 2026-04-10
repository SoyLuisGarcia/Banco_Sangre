<?php
require_once "../middleware/admin.php";
require_once "../config/database.php";
require_once "../models/User.php";

$db = (new Database())->connect();
$userModel = new User($db);

if (isset($_GET['id'])) {
    $userModel->promoverAdmin($_GET['id']);
}

header("Location: usuarios.php");