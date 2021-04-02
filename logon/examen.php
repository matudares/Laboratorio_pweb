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

$Query= "SELECT id_clientes, Nombre, Apellido FROM clientes";
$rsQuery= mysqli_query($connection, $Query) or die("Error: ". mysqli_error($connection));
 

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturacion</title>
</head>
<body>
    <h2>Que tipo de factura desea realizar?</h2>
<table>

    <form action="factura.php" method="post">
    <th>Nombre de examen</th>
    <td>    
    <select name="selector_examen">
    <option value="sangre">Examen de sangre</option>
    <option value="orina">Examen de orina</option>
    <option value="heces">Examen de heces</option>
    </select>
    </td>
    <th>Paciente</th>
    <td>
    <select name="paciente" id="paciente">
    <?php 
    while ($fileQuery = mysqli_fetch_array($rsQuery)) {

    echo('<option value='.$fileQuery['id_clientes'] . '>' . $fileQuery['Nombre'] . ' ' .$fileQuery['Apellido'] . '</option>');
    } ?>
    </select></td>
    
</table>    

<input type="submit" name="Elegir" value="Procesar">
    </form>

</body>
</html>