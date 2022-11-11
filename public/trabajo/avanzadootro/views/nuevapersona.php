
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Nueva persona</h1>
    <form action="?method=valido" method="post">
        <label for="">Nombre</label>
        <p><input type="text" name="nombrepersona"></p>
        <label for="">Apellidos</label>
        <p><input type="text" name="apellidospersona"></p>
        <label for="">Direccion</label>
        <p><input type="text" name="direccionpersona"></p>
        <label for="">Telefono</label>
        <p><input type="text" name="telefonopersona"></p>
        <input type="submit" name="envionuevapersona" value="crear persona">
    </form>

</body>

</html>