<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

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
if (isset($_POST['prueba'])) {
    $id_cliente = $_GET['id'];
    $examen = $_GET['examen'];
    $Query= "SELECT * FROM clientes WHERE id_clientes='$id_cliente'";
    $rsQuery= mysqli_query($connection, $Query);
    $fileQuery = mysqli_fetch_array($rsQuery);
    $nombre_archivo= $fileQuery['Nombre'] . ' ' . $fileQuery['Apellido']. $examen. '.pdf';
    //echo $examen;
    switch ($examen) {
        case 'sangre':
            $hematies = $_POST['hematies'];
            $hemoglobina = $_POST['hemoglobina'];
            $hematocrito = $_POST['hematocrito'];
            $vcm = $_POST['vcm'];
            $linfocitos = $_POST['linfocitos'];
            $plaquetas = $_POST['plaquetas'];
            chdir('../pacientes/sangre');

            echo('<table border ="1">
            <tr>
            <th>Nombre del Paciente</th>
            <td>'.$fileQuery['Nombre']. ' '.$fileQuery['Apellido'].'</td>
            </tr>

            <tr>
            <th>Hematies</th>
            <td>'.$hematies.'</td>
            </tr>

            <tr><th>Hemoglobina</th>
            <td>'.$hemoglobina.'</td>
            </tr>

            <tr><th>Hematocrito</th>
            <td>'.$hematocrito.'</td>
            </tr>

            <tr><th>VCM</th>
            <td>'.$vcm.'</td>
            </tr>

            <tr><th>Linfocitos</th>
            <td>'.$linfocitos.'</td>
            </tr>
    
            <tr><th>Plaquetas</th>
            <td>'.$plaquetas.'</td>
            </tr>

            </table>');



            $Query ="INSERT INTO exam_sangre (hematies, hemoglobina, hematocrito, vcm, linfocitos, plaquetas) VALUES ('$hematies', '$hemoglobina', '$hematocrito', '$vcm', '$linfocitos', '$plaquetas')";
            $rsQuery= mysqli_query($connection, $Query);

            break;
        
        case 'orina':
            $aldosterona = $_POST['aldosterona'];
            $calcio = $_POST['calcio'];
            $cloruro = $_POST['cloruro'];
            $creatinina = $_POST['creatinina'];
            $sodio = $_POST['sodio'];
            $acido_urico = $_POST['acido_urico'];
            chdir('../pacientes/orina');


            echo('<table border ="1">
            <tr>
            <th>Nombre del Paciente</th>
            <td>'.$fileQuery['Nombre']. ' '.$fileQuery['Apellido'].'</td>
            </tr>

            <tr>
            <th>Aldosterona</th>
            <td>'.$aldosterona.'</td>
            </tr>

            <tr><th>Calcio</th>
            <td>'.$calcio.'</td>
            </tr>

            <tr><th>Cloruro</th>
            <td>'.$cloruro.'</td>
            </tr>

            <tr><th>Creatinina</th>
            <td>'.$creatinina.'</td>
            </tr>

            <tr><th>Sodio</th>
            <td>'.$sodio.'</td>
            </tr>
    
            <tr><th>Acido Urico</th>
            <td>'.$acido_urico.'</td>
            </tr>

            </table>');

            $Query ="INSERT INTO exam_orina (aldosterona, calcio, cloruro, creatinina, sodio, acido_urico) VALUES ('$aldosterona', '$calcio', '$cloruro', '$creatinina', '$sodio', '$acido_urico')";
            $rsQuery= mysqli_query($connection, $Query);        
            break;

        case 'heces':
            $proteinas = $_POST['proteinas'];
            $grasa = $_POST['grasa'];
            $minerales = $_POST['minerales'];
            $fibra = $_POST['fibra'];
            $bacteria = $_POST['bacteria'];
            $peptidasa = $_POST['peptidasa'];
            chdir('../pacientes/heces');

            echo('<table border ="1">
            <tr>
            <th>Nombre del Paciente</th>
            <td>'.$fileQuery['Nombre']. ' '.$fileQuery['Apellido'].'</td>
            </tr>

            <tr>
            <th>Proteinas</th>
            <td>'.$proteinas.'</td>
            </tr>

            <tr><th>Grasa</th>
            <td>'.$grasa.'</td>
            </tr>

            <tr><th>Minerales</th>
            <td>'.$minerales.'</td>
            </tr>

            <tr><th>Fibra</th>
            <td>'.$fibra.'</td>
            </tr>

            <tr><th>Bacteria</th>
            <td>'.$bacteria.'</td>
            </tr>
    
            <tr><th>Peptidasa</th>
            <td>'.$peptidasa.'</td>
            </tr>

            </table>');

            $Query ="INSERT INTO exam_heces (proteinas, grasa, minerales, fibra, bacteria, peptidasa) VALUES ('$proteinas', '$grasa', '$minerales', '$fibra', '$bacteria', '$peptidasa')";
            $rsQuery= mysqli_query($connection, $Query);
            break;
        default:
            echo("Rompistes el programa");
            break;
    }

}

mysqli_close($connection);

?>

<button><a href="enviarcorreo.php">Enviar correo</a></button>

</body>
</html>