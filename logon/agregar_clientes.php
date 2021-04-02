<?php
include_once('../connection/connection.php');
session_start();

if (isset($_SESSION['id_usuario'])) {
    $id= $_SESSION['id_usuario'];
    $Query= "SELECT * FROM usuarios WHERE id_usuarios=$id";
    $rsQuery = mysqli_query($connection, $Query) or die('Error: ' . mysqli_error($connection));
    $countQuery = mysqli_num_rows($rsQuery);

    if ($countQuery<=0) {
        header('Location: ../index.php');
    }
} else{
    header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar clientes</title>
</head>
<body>
    <h2>Agregar Usuario</h2>
    <form method="post" action="../process/agregar.php">
    
    <table border ="1">
    <tr>
    <th>Nombre</th>
    <td><input type="text" name= "nombre" required></td>
    </tr>
    
    <tr><th>Apellido</th>
    <td><input type="text" name="apellido" required></td>
    </tr>

    <tr><th>Correo</th>
    <td><input type="email" name="correo" required></td>
    </tr>

    <tr><th>Telefono</th>
    <td><select name="codigo_cel" id="codigo_cel">
    <option value="0412">0412</option>
    <option value="0422">0422</option>
    <option value="0414">0414</option>
    <option value="0424">0424</option>
    <option value="0416">0416</option>
    <option value="0426">0426</option>
    </select></td>
    <td><input type="text" name="telefono" required></td>
    </tr>

    <tr><th>Direccion</th>
    <td><textarea type="text" name="direccion" required></textarea></td>
    </tr>
    
    <tr><th>Foto</th>
    <td><input type="file" name="Foto"></td>
    </tr>

    </table>
    <br>
    <input type="submit" name="agregar" value="Registrar">
    </form>
    <br>

    <button><a href="clientes.php">Regresar</a></button>
</body>
</html>