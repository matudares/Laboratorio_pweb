<?php

include_once('../connection/connection.php');
session_start();

if (isset($_SESSION['id_usuario'])) {
    $id = $_SESSION['id_usuario'];
    $Query = "SELECT * FROM usuarios WHERE id_usuarios ='$id'";
    $rsQuery = mysqli_query($connection, $Query) or die('Error: ' . mysqli_error($connection));
    $countQuery = mysqli_num_rows($rsQuery);

    if ($countQuery<=0) {
        header('Location: index.php');
    }


} else {
    header('Location: index.php');
}

if (isset($_GET['dato'])) {
    if ($_GET['dato'] == 'borrar') {
        $id_clientes=$_GET['id'];

        $QueryDelete="DELETE FROM clientes WHERE id_clientes='$id_clientes'";
        $rsQueryDelete= mysqli_query($connection, $QueryDelete) or die('Error: '.mysqli_error($connection));

        if ($rsQueryDelete ==true) {
            header('Location: ../logon/clientes.php');
        } else {
            echo("No se pudo borrar el cliente");
        }
    }
}

?>