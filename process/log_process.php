<?php
include_once('../connection/connection.php');

session_start();
$email=null;
$password=null;

if (isset($_POST['procesar'])) {
    
    if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $email= $_POST['email'];
        $password =($_POST['password']);

        echo($email . "<br>");
        echo($password . "<br>");

        //variables SQL
        $QueryLog = "SELECT * FROM usuarios WHERE correo= '$email' AND contraseña='$password'";
        $rsQueryLog = mysqli_query($connection, $QueryLog) OR die('Error: '. mysqli_error($connection));
        $fileQueryLog = mysqli_fetch_array($rsQueryLog);
        $noFileQueryLog = mysqli_num_rows($rsQueryLog);
        echo ($QueryLog);

        //informacion usuario
        if ($noFileQueryLog > 0) {
            $_SESSION['id_usuario'] = $fileQueryLog['id_usuarios'];
            $_SESSION['nombre_completo'] = $fileQueryLog['Nombre'] . ' ' . $fileQueryLog['Apellido'];
        
        
        if (!empty($fileQueryLog['foto'])) {
            $_SESSION['foto'] = "pics/" . $fileQueryLog['foto'];
        }else {
            $_SESSION['foto'] = "pics/silueta.png";
        }

        echo ('<br>');
        echo ('User ID session: '. $_SESSION['id_usuario'] . '<br>');
        echo ('Name session: ' . $_SESSION['nombre_completo'] . '<br>');
        echo ('Imagen Usuario session: ' . $_SESSION['foto'] . '<br>');

        
        header('Location: ../menu.php');


        }else{
            session_destroy();
            header('Location: ../index.php');
            echo("Error1");
        }

        }else {
        session_destroy();
        header('Location: ../index.php');
        echo("error2");
        
        }
    

    }else {
    session_destroy();
    header('Location: ../index.php');
    echo("Error 3");
    
}
//cierre de conexion
mysqli_close($connection);

?>