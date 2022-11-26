
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css" type="text/css">
    <title>Document</title>
</head>
<body>
<form action="conexion.php" method="post">
<h1>Login</h1>
<?php
//echo "USUARIO: normaluser, PASSWORD: usudwes<br>USUARIO: adminuser, PASSWORD: admindwes";
?>
        <p><label for="">Usuario</label></p>
        <input type="text" name="usuario" id="">
        <p><label for="">Password</label></p>
        <input type="password" name="password" id="">
        <p><input type="submit" name="envio" id="" value="enviar"></p>
    </form>
</body>
</html>