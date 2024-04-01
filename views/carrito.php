<?php
session_start();

    // Si el carrito tiene elementos, mostrar los productos en una tabla
    echo "<h2>Carrito de Compras Dr.Pet</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Producto</th><th>Precio</th><th>Cantidad</th></tr>";
    foreach ($_SESSION['cart'] as $productId => $product) {
        echo "<tr><td>{$product['name']}</td><td>{$product['price']}</td></tr>";
    }
    echo "</table>";

/*Pago y eliminacion de productos del carrito*/
    echo "<form action='procesar_pago.php' method='post'>";
    echo "<button type='submit'>Proceder con el pago</button>";
    echo "</form>";
    echo "<form action='productos.php' method='post'>";
    echo "<button type='submit'>Vaciar Carrito</button>";
    echo "</form>";

?>
