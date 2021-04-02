<?php
include_once('../connection/connection.php');
session_start();

if (isset($_SESSION['id_usuario'])) {
    $id = $_SESSION['id_usuario'];
    $Query = "SELECT * FROM usuarios WHERE id_usuarios ='$id'";
    $rsQuery = mysqli_query($connection, $Query) or die('Error: ' . mysqli_error($connection));
    $countQuery = mysqli_num_rows($rsQuery);

    if ($countQuery<=0) {
        session_destroy();
        header('Location: index.php');
    }


} else {
    session_destroy();
    header('Location: index.php');
}

if (!isset($_POST['Elegir'])) {
    header('Location: ../menu.php');
}

$examen=$_POST['selector_examen'];
$id_paciente= $_POST['paciente'];
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

<h2>Escriba los parametros entregados por la maquina</h2>    
<!--<p><?php echo $cliente;?></p>!-->
<?php


switch ($examen) {
    case 'sangre':
        
        echo('<form method="post" action="../process/facturacion.php?id='.$id_paciente.'&examen='.$examen.'">
    
        <table border ="1">
        <tr>
        <th>Hematies</th>
        <td><input type="text" name= "hematies" required></td>
        </tr>

        <tr><th>Hemoglobina</th>
        <td><input type="text" name="hemoglobina" required></td>
        </tr>
    
        <tr><th>Hematocrito</th>
        <td><input type="text" name="hematocrito" required></td>
        </tr>
    
        <tr><th>VCM</th>
        <td><input type="text" name="vcm" required></td>
        </tr>
    
        <tr><th>Linfocitos</th>
        <td><input type="text" name="linfocitos" required></textarea></td>
        </tr>
        
        <tr><th>Plaquetas</th>
        <td><input type="text" name="plaquetas"></td>
        </tr>
    
        </table>
        <br>
        <input type="submit" name="prueba" value="Facturar">
        </form>');

        break;

    case 'orina':
        echo('<form method="post" action="../process/facturacion.php?id='.$id_paciente.'&examen='.$examen.'">
    
        <table border ="1">
        <tr>
        <th>Aldosterona</th>
        <td><input type="text" name= "aldosterona" required></td>
        </tr>

        <tr><th>Calcio</th>
        <td><input type="text" name="calcio" required></td>
        </tr>
    
        <tr><th>Cloruro</th>
        <td><input type="text" name="cloruro" required></td>
        </tr>
    
        <tr><th>Creatinina</th>
        <td><input type="text" name="creatinina" required></td>
        </tr>
    
        <tr><th>Sodio</th>
        <td><input type="text" name="sodio" required></textarea></td>
        </tr>
        
        <tr><th>Acido urico</th>
        <td><input type="text" name="acido_urico"></td>
        </tr>
    
        </table>
        <br>
        <input type="submit" name="prueba" value="Facturar">
        </form>');
        break;

        case 'heces':
        echo('<form method="post" action="../process/facturacion.php?id='.$id_paciente.'&examen='.$examen.'">
    
        <table border ="1">
        <tr>
        <th>Proteinas</th>
        <td><input type="text" name= "proteinas" required></td>
        </tr>

        <tr><th>Grasa</th>
        <td><input type="text" name="grasa" required></td>
        </tr>
    
        <tr><th>Minerales</th>
        <td><input type="text" name="minerales" required></td>
        </tr>
    
        <tr><th>Fibra</th>
        <td><input type="text" name="fibra" required></td>
        </tr>
    
        <tr><th>Bacteria</th>
        <td><input type="text" name="bacteria" required></textarea></td>
        </tr>
        
        <tr><th>Peptidasa</th>
        <td><input type="text" name="peptidasa"></td>
        </tr>
    
        </table>
        <br>
        <input type="submit" name="prueba" value="Facturar">
        </form>');
        break;
    
    default:
        # code...
        break;
}


mysqli_close($connection);
?>

<button><a href="../menu.php">Regresar</a></button>

</body>
</html>