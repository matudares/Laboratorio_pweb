<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro exitoso</title>
</head>
<body>
<h1 align="center">Su registro ha sido exitoso</h1>

    <?php

    $id= basename($_GET['id']);
    //echo($id);

    switch ($id) {
        case 'usuario':
            echo('<button><a href="../index.php">Regresar al inicio</a></button>');
            break;
        
        case 'cliente':
            echo('<button><a href="../logon/clientes.php">Regresar al inicio</a></button>');
    
            break;

        default:
            echo("Rompistes el programa <br>");
            echo('<button><a href="../index.php">Regresar al inicio</a></button>"');
            break;
    }
    
    ?>
</body>
</html>