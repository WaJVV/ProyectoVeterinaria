<?php
session_start();

// Verificar si existe un carrito en la sesión, si no, crear uno
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Manejar la solicitud de añadir al carrito
if (isset($_POST['id'])) {
    $productId = $_POST['id'];
    // Simplemente agregamos el producto a la sesión, utilizando el ID como clave
    $_SESSION['cart'][$productId] = [
        'name' => 'Producto ' . $productId,
        'price' => 5000 // Puedes definir el precio según corresponda al producto
    ];
}

// Redirigir de vuelta a la página de productos
header('Location: productos.php');
exit;
?>
