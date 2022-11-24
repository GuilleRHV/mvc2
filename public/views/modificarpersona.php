<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Modificar persona</h1>

    <form action="controllers/validocontroller.php" method="post">
        <label for="">Nombre</label>
        <p><?=$_SESSION["nombremodificar"]?></p>
        <label for="">apellidos</label>
        <p><input type="text" name="apellidos"></p>
        <label for="">Direccion</label>
        <p><input type="text" name="direccion"></p>
        <label for="">Telefono</label>
        <p><input type="text" name="telefono"></p>
       
        <input type="submit" name="personamodificada" value="Modificar persona">
    </form>
</body>
</html>