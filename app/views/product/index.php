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

        <?php foreach ($products as $key => $product) { ?>
            <tr>
                <td><?php echo $product->name ?></td>
             
                <td><?php echo $product->price ?></td>
                <td><?php echo $product->fecha_compra ?></td>
                <td>
                    <a href="/product/show/<?php echo $product->id ?>" class="btn btn-primary">Ver </a>
                </td>
            </tr>
        <?php } ?>
        
    </table>
</body>

</html>