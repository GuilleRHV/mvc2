
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/eliminar.css" type="text/css">
    <title>Eliminar</title>
</head>

<body>
    <h1>Eliminar usuario</h1>
    <form action="controllers/validocontroller.php" method="post">
        <label for="">Nombre de la persona que quieres eliminar</label>
        <p><input type="text" name="nombreeliminar"></p>
        
        <input type="submit" name="envioeliminar" value="eliminar usuario">
    </form>

</body>

</html>