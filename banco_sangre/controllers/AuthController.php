<?php
session_start();

require_once "../config/database.php";
require_once "../models/User.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $db = $conexion;
    $userModel = new User($db);


    // =========================
    // REGISTRO
    // =========================

    if (isset($_POST['action']) && $_POST['action'] === 'register') {

        $userModel->register(
            $_POST['nombre'],
            $_POST['correo'],
            $_POST['telefono'],
            $_POST['password']
        );

        header("Location: ../public/login.php");
        exit;
    }


    // =========================
    // LOGIN
    // =========================

    if (isset($_POST['action']) && $_POST['action'] === 'login') {

        $user = $userModel->login(
            $_POST['correo'],
            $_POST['password']
        );

        if ($user) {

            $_SESSION['user'] = $user;

            // ✅ REDIRECCION SEGUN PERMISO

            if ($user['permiso'] == "admin") {

                header("Location: ../public/dashboard_admin.php");
                exit;

            } elseif ($user['permiso'] == "doctor") {

                header("Location: ../public/doctor_dashboard.php");
                exit;

            } elseif ($user['permiso'] == "recepcion") {

                header("Location: ../public/recepcion_dashboard.php");
                exit;

            } else {

                header("Location: ../public/dashboard.php");
                exit;

            }

        } else {

            echo "Credenciales incorrectas";

        }

    }

} else {

    header("Location: ../public/login.php");
    exit;

}