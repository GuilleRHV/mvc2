
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="views/conexion.php" method="post">
<?php
echo "USUARIO: normaluser, PASSWORD: usudwes<br>USUARIO: adminuser, PASSWORD: admindwes";
?>
        <p><label for="">usuario</label></p>
        <input type="text" name="usuario" id="">
        <p><label for="">password</label></p>
        <input type="password" name="password" id="">
        <p><input type="submit" name="envio" id="" value="enviar"></p>
    </form>
</body>
</html>