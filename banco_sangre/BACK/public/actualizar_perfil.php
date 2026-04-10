<?php
session_start();
require_once "../config/database.php";

$db = $conexion;

if($_SERVER["REQUEST_METHOD"] == "POST"){

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$tipo = $_POST['tipo_sanguineo'];
$ciudad = $_POST['ciudad'];

$imagenNombre = null;

/* Verificar si se subió imagen */
if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0){

    $carpeta = "uploads/";

    /* crear carpeta si no existe */
    if(!is_dir($carpeta)){
        mkdir($carpeta,0777,true);
    }

    $imagenNombre = time()."_".basename($_FILES['imagen']['name']);
    $ruta = $carpeta.$imagenNombre;

    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);

    $sql = "UPDATE users 
            SET nombre=?, correo=?, telefono=?, tipo_sanguineo=?, ciudad=?, imagen=? 
            WHERE id=?";

    $stmt = $db->prepare($sql);
    $stmt->execute([$nombre,$correo,$telefono,$tipo,$ciudad,$imagenNombre,$id]);

}else{

    $sql = "UPDATE users 
            SET nombre=?, correo=?, telefono=?, tipo_sanguineo=?, ciudad=? 
            WHERE id=?";

    $stmt = $db->prepare($sql);
    $stmt->execute([$nombre,$correo,$telefono,$tipo,$ciudad,$id]);
}

/* actualizar datos en sesión */
$_SESSION['user']['nombre'] = $nombre;
$_SESSION['user']['correo'] = $correo;

header("Location: perfil.php");
exit;

}
?>