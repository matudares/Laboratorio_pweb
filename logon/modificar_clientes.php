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

if (isset($_GET['id'])) {
    $id_clientes= $_GET['id'];
} else {
    header('Location: clientes.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar cliente</title>
</head>
<body>
    
<h2>Modificar cliente</h2>

<form action="../process/modificar.php" method="post">

<?php
$QueryMod= "SELECT * FROM clientes WHERE id_clientes = '$id_clientes'";
$rsQueryMod = mysqli_query($connection, $QueryMod) or die('Error: '. mysqli_error($connection));
$fileQueryMod= mysqli_fetch_array($rsQueryMod);
?>

<table border ='1'>

<tr><input type="hidden" name="id" value = <?php echo $id_clientes ?> >
<th>Nombre</th>
<td><input type="text" name="nombre"  value="<?php echo($fileQueryMod['Nombre']) ?>" maxlength="25" required></td>
</tr>

<tr>
    <th>Apellido</th>
    <td><input type="text" name="apellido" value="<?php echo($fileQueryMod['Apellido']) ?>" maxlength="25" required></td>
</tr>

<tr>
    <th>Telefono</th>

    <td>
    <select name="codigo_cel" id="codigo_cel">
    <option value="0412">0412</option>
    <option value="0422">0422</option>
    <option value="0414">0414</option>
    <option value="0424">0424</option>
    <option value="0416">0416</option>
    <option value="0426">0426</option>
    </select>    
    <input type="text" name="telefono" maxlength="7" required pattern="[0-9]{7}"></td>
</tr>

<tr>
    <th>Correo Electronico</th>
    <td><input type="email" name="correo" value="<?php echo($fileQueryMod['Correo']) ?>"maxlength="25" required></td>
</tr>

<tr>
    <th>Direccion</th>
    <td><input type="text" name="direccion" value="<?php echo($fileQueryMod['Direccion']) ?>" maxlength="25" required></td>
</tr>

</table>
<br>
<input type="submit" name="modificar" value="Guardar">
</form>
<br><br>
<button><a href="clientes.php">Regresar</a></button>
    
<?php
mysqli_close($connection);
?>

</body>
</html>