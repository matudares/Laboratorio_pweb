<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
</head>
<body>
<form method="POST" action="process/log_process.php">
<table border="1" align="center">
    <tr>
        <td>Correo</td> 
        <td><input type="text" name="email" required></td>
    </tr>

    <tr>
        <td>Contraseña</td>
        <td><input type="text" name="password" required></td>
    </tr>
</table>
<table border="1" align="center">

    <tr>
       <td><input type="submit" class="btn" name="procesar" value="procesar"></td>
    
    </tr>


</table>

<p>No estas registrado? <a href="registration.php">Registrate aqui</a></p>
</body>
</html>