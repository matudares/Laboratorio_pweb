<?php
include_once('../connection/connection.php');

session_start();

if (isset($_POST['Procesar'])) {

    if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['telefono']) && !empty($_POST['correo']) && !empty($_POST['password'])) {
        //Variables para el insert
        $nombre = $_POST['nombre'];
        $apellido= $_POST['apellido'];
        $telefono= $_POST['codigo_cel'] . $_POST['telefono'];
        $correo = $_POST['correo'];
        $password = $_POST['password'];
        $validar_usuario = 0;

        $QueryLog = "SELECT * FROM usuarios WHERE Nombre = '$NOMBRE' AND Apellido = '$apellido'";
        $rsQueryLog = mysqli_query($connection, $QueryLog) OR die('Error: '. mysqli_error($connection));
        $noFileQueryLog = mysqli_num_rows($rsQueryLog);
        if($noFileQueryLog > 1){
                $validar_usuario=1;
        }

        if($validar_usuario ==1){
            $QueryLog = "INSERT INTO usuarios (Nombre, Apellido, Telefono, correo, contraseña) VALUES ('$nombre', '$apellido', '$telefono', '$correo', '$password')";
            mysqli_query($connection, $QueryLog) OR die('Error: '. mysqli_error($connection));
            session_destroy();
            header("Location: success.php?id=usuario");
        } else{
            session_destroy();
            header("Location: failure.php?id=usuario");
        }

    } else {
        echo("Error isset");
    }// isset if
    
} else {
    echo("Error POST");
}//post if




mysqli_close($connection);


?>
