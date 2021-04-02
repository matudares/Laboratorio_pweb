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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de clientes</title>
</head>
<body>
    <table border="1">
    <tr>
        <th>ID</th>
        <th>Foto</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th>Direccion donde vive</th>
    </tr>
    

    <?php
    $Query = "SELECT * FROM clientes";
    $rsQuery = mysqli_query($connection, $Query) or die('Error: ' . mysqli_error($connection));
    while ($fileQuery = mysqli_fetch_array($rsQuery)) {
    ?>
    
    <tr>
    <td><?php echo $fileQuery['id_clientes'];?></td>
    <td>
    <?php
    if(!empty($fileQuery['foto'])){
        $rutaFoto = '../pics/'. $fileQuery['foto'];
    } else{
        $rutaFoto = '../pics/silueta.png';
    }
    ?>
    <img src="<?php echo $rutaFoto;?>" width="75px" height="75px" alt="Rompistes el programa">
    </td>
    <td><?php echo $fileQuery['Nombre']?></td>
    <td><?php echo $fileQuery['Apellido']?></td>
    <td><?php echo $fileQuery['Telefono']?></td>
    <td><?php echo $fileQuery['Correo']?></td>
    <td><?php echo $fileQuery['Direccion']?></td>
    <td><button><a href="modificar_clientes.php?id=<?php echo($fileQuery['id_clientes']);?>">Modificar</a></button>
    <button onClick="eliminar(<?php echo($fileQuery['id_clientes']);?>)">Eliminar</button>
    </td>
    </tr>
<?php } ?>
    </table>
    <?php mysqli_close($connection);?>
    <br>
    <button><a href="../menu.php">Regresar</a></button>

    <button><a href="agregar_clientes.php">Agregar clientes</a></button>

    <script>
    function eliminar(id) {
        var id=id;

        confirmar= confirm("Desea borrar el registro?");

        if (confirmar==true) {
            var url ='../process/borrar_clientes.php?dato=borrar&id='+id+'';
            location.href=url;

            alert('Se ha eliminado el cliente exitosamente');
            return true;             
        } else{
            alert("Se ha cancelado el proceso");
            return false;
        }
        window.refresh();
    }
    </script>
</body>
</html>