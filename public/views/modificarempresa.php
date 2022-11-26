<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/modificar.css" type="text/css">
    <title>Document</title>
</head>
<body>
    <h1>Modificar empresa</h1>

    <form action="controllers/validocontroller.php" method="post">
        <label for="">Nombre</label>
        <p><?=$_SESSION["nombremodificar"]?></p>
        <label for="">Direccion</label>
        <p><input type="text" name="direccion"></p>
        <label for="">Telefono</label>
        <p><input type="text" name="telefono"></p>
        <label for="">Email</label>
        <p><input type="text" name="email"></p>
        <input type="submit" name="empresamodificada" value="Modificar empresa">
    </form>
</body>
</html>