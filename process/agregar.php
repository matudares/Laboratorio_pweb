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

if (isset($_POST['agregar'])) {

    if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['telefono']) && !empty($_POST['correo']) && !empty($_POST['direccion'])) {
        //Variables para el insert
        $nombre = $_POST['nombre'];
        $apellido= $_POST['apellido'];
        $telefono= $_POST['codigo_cel'] . $_POST['telefono'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];
        $validar_usuario = 0;

        $QueryLog = "SELECT * FROM clientes WHERE Nombre = '$nombre' AND Apellido = '$apellido'";
        $rsQueryLog = mysqli_query($connection, $QueryLog) OR die('Error: '. mysqli_error($connection));
        $noFileQueryLog = mysqli_num_rows($rsQueryLog);
        if($noFileQueryLog < 1){
                $validar_usuario=1;
        }

        if($validar_usuario ==1){
            $QueryLog = "INSERT INTO Clientes (Nombre, Apellido, Telefono, Correo, Direccion) VALUES ('$nombre', '$apellido', '$telefono', '$correo', '$direccion')";
            mysqli_query($connection, $QueryLog) OR die('Error: '. mysqli_error($connection));
            header("Location: success.php?id=cliente");
 
        } else{
            
            header("Location: failure.php?id=cliente");
        }

    } else {
        echo("Error isset");
    }// isset if
    
} else {
    echo("Error POST");
}//post if




mysqli_close($connection);


?>