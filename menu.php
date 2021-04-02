<?php
include_once('connection/connection.php');
session_start();
 
if (isset($_SESSION['id_usuario'])) {
    $id = $_SESSION['id_usuario'];
    $Query = "SELECT * FROM usuarios WHERE id_usuarios ='$id'";
    $rsQuery = mysqli_query($connection, $Query) or die('Error: ' . mysqli_error($connection));
    $countQuery = mysqli_num_rows($rsQuery);

    if ($countQuery<=0) {
        echo ("<script type = 'text/javascript'>alert('Ha ocurrido un error')</script");
        header('Location: index.php');
    }


} else {
    echo ("<script type = 'text/javascript'>alert('Ha ocurrido un error')</script");
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>

<h1>Bienvenido</h1>

<img src="<?php echo ($_SESSION['foto']);?>"  width="75px" height="75px" alt="Rompistes el programa">
<br>
<?php
echo ($_SESSION['nombre_completo']);
?> <br>
<a href="process/logout_process.php"> Cerrar sesion</a>
<br><br>

<h2>Opciones</h2>
<ol>
<li><a href="logon/clientes.php">Clientes</a></li>
<li><a href="logon/examen.php">Realizar una Factura</a></li>
</ol>
    
</body>
</html>