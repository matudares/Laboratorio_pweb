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

if (isset($_POST['modificar'])) {
    if ($_POST['modificar']) {
        $id_cliente= $_POST['id'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $direccion=$_POST['direccion'];
        $telefono=$_POST['codigo_cel']. $_POST['telefono'];
        $correo=$_POST['correo'];

        $QueryMod = "UPDATE clientes SET Nombre ='$nombre', Apellido= '$apellido', Telefono='$telefono', Correo='$correo', Direccion='$direccion'  WHERE id_clientes= '$id_cliente'";
        $rsQueryMod = mysqli_query($connection, $QueryMod) or die('Error: '. mysqli_error($connection));

        if ($rsQueryMod == true) {
            //echo $id_cliente;
            header('Location: success.php?id=cliente');
        }

        if ($rsQueryMod == false) {
            echo("Error no se pudo eliminar el usuario");
        }
        
    }
}

mysqli_error($connection);
?>