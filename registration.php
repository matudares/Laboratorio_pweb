<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
</head>
<body>

<h1>Formulario de registro</h1>
<form method="POST" action="process/reg_process.php">
<table border="1" align="center">

    <tr>
        <td>Nombre</td>
        <td><input type="text" name= "nombre" maxlength ="25" required></td>
    </tr>

    <tr>
        <td>Apellido</td>
        <td><input type="text" name= "apellido" maxlength ="25" required></td>
    </tr>

    <tr>
    <td> Telefono</td>
    <td><select name="codigo_cel" id="codigo_cel">
    <option value="0412">0412</option>
    <option value="0422">0422</option>
    <option value="0414">0414</option>
    <option value="0424">0424</option>
    <option value="0416">0416</option>
    <option value="0426">0426</option>
    </select>
    <input type="text" name= "telefono" required pattern= "[0-9]{7}"></td>
    </tr>

    <tr>
        <td>Correo</td> 
        <td><input type="email" name="correo" maxlength ="25" required></td>
    </tr>

    <tr>
        <td>Contraseña</td>
        <td><input type="text" name="password" minlength = "8" maxlength ="25" required></td>
    </tr>
</table>
<table border="1" align="center">

    <tr>
       <td><input type="submit" class="btn" name="Procesar" value="Procesar"></td>
    
    </tr>


</table>

<h2><a href="index.php">Regresar</a></h2>
</body>
</html>