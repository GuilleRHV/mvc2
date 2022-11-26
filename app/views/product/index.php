<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Lista de productos</h1>

    <table class="table table-striped table-hover">
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>F. compra</th>
            <th></th>
        </tr>

        <?php foreach ($products as $key => $producto) { ?>
            <tr>
                <td><?php echo $producto->name ?></td>
             
                <td><?php echo $producto->price ?></td>
                <td><?php echo $producto->fecha_compra ?></td>
                <td>
                    <a href="/product/show/<?php echo $producto->id ?>" class="btn btn-primary">Ver </a>
                    <a href="/product/edit/<?php echo $producto->id ?>" class="btn btn-primary">Edit </a>
                    <a href="/product/delete/<?php echo $producto->id ?>" class="btn btn-primary">Delete </a>
                </td>
            </tr>
        <?php } ?>
       
        
    </table>
    <a href="product/create">Create</a>
    
</body>

</html>