
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Nueva persona</h1>
    <form action="views/valido.php" method="post">
        <label for="">Nombre</label>
        <p><input type="text" name="nombre"></p>
        <label for="">Apellidos</label>
        <p><input type="text" name="apellidos"></p>
        <label for="">Direccion</label>
        <p><input type="text" name="direccion"></p>
        <label for="">Telefono</label>
        <p><input type="text" name="telefono"></p>
        <input type="submit" name="envionuevo" value="crear persona">
    </form>

</body>

</html>