<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Lista de usuarios</h1>

    <table class="table table-striped table-hover">
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>F. nacimiento</th>
            <th></th>
        </tr>

        <?php foreach ($users as $key => $user) { ?>
            <tr>
                <td><?php echo $user->name ?></td>
                <td><?php echo $user->surname ?></td>
                <td><?php echo $user->email ?></td>
                <td><?php echo $user->birthdate ?></td>
                <td>
                    <a href="/user/show/<?php echo $user->id ?>" class="btn btn-primary">Ver </a>
                </td>
            </tr>
        <?php } ?>
        <h1>Detalle del usuario <?php echo $user->id ?></h1>
        <ul>
            <li><strong>Nombre: </strong><?php echo $user->name ?></li>
            <li><strong>Apellidos: </strong><?php echo $user->surname ?></li>
            <li><strong>Email: </strong><?php echo $user->email ?></li>
            <li><strong>F. nacimiento: </strong><?php echo $user->birthdate ?></li>
        </ul>
    </table>
</body>

</html>