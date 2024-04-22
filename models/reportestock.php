<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Stock</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/Admin.css">
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand text-white" href="#">Dr. Pet</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="..\views\index.php"> Inicio <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white" href="..\views\nuestraClinica.php">Nuestra Clínica <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="..\views\Servicios.php">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="..\views\productos.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled text-white" href="..\views\contacto.php">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled text-white" href="..\views\login.php">Sesión</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<body>
    <!-- Formulario para generar el reporte de stock -->
    <div class="container">
        <h1 class="mt-5">Revisión de Stock</h1>
        <form action="../controllers/reporteStockController.php" method="post" class="mt-3">
            <button type="submit" name="btnConsultar" class="btn btn-primary">Reporte de stock</button>
        </form>
<!-- Tabla del stock general -->
        <div class="container">
    <h2>Total de Inventario</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Stock</th>
                <th>Proveedor</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $dsn = 'mysql:host=localhost;dbname=drpetsvet';
            $user = 'root';
            $pass = '';

            try {
                $dbh = new PDO($dsn, $user, $pass);
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
                exit;
            }

            // Consulta a la base de datos para obtener los productos con stock menor a 5
            $stmt = $dbh->prepare('SELECT p.nombre AS proveedor_nombre, pi.nombre, pi.descripcion, pi.stockProducto, pi.idProveedor, pi.precio FROM productoinventario pi JOIN proveedores p ON pi.idProveedor = p.idProveedor WHERE pi.stockProducto');
            $stmt->execute();
            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($productos as $producto) {
                echo '<tr>';
                echo '<td>' . $producto['nombre'] . '</td>';
                echo '<td>' . $producto['descripcion'] . '</td>';
                echo '<td>' . $producto['stockProducto'] . '</td>';
                echo '<td>' . $producto['proveedor_nombre'] . '</td>';
                echo '<td>' . $producto['precio'] . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>
<!-- Script para cargar los datos de productos -->
</div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetch('../controllers/reporteStockController.php')
                .then(response => response.json())
                .then(data => {
                    const productosTableBody = document.getElementById('productosTableBody');
                    productosTableBody.innerHTML = ''; // Limpiar tabla antes de agregar nuevos datos

                    // Insertar cada producto en la tabla
                    data.forEach(producto => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${producto.idProducto}</td>
                            <td>${producto.nombre}</td>
                            <td>${producto.descripcion}</td>
                            <td>${producto.stockProducto}</td>
                            <td>${producto.idProveedor}</td>
                            <td>${producto.precio}</td>
                        `;
                        productosTableBody.appendChild(row);
                    });
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
     </script>
    <button class="btn btn-secondary back-button" onclick="atras()">Atrás</button>
    <script>
        function atras() {
            window.history.back();
        }
    </script>

    <footer class="bg-dark">
        <div class="row justify-content-center mt-0 pt-0 row-1 mb-0 px-sm-3 px-2">
            <div class="col-12">
                <div class="row my-4 row-1 no-gutters">
                    <div class="col-sm-3 col-auto text-center"><small class="text-white">&#9400; Veterinaria
                            Dr.Pet</small></div>
                    <div class="col-md-3 col-auto"></div>
                    <div class="col-md-3 col-auto"></div>
                    <div class="col my-auto text-md-left text-right text-white"> <small> veterinariaDr.Pet@outlook.com
                            <span><img src="https://i.imgur.com/TtB6MDc.png" class="img-fluid " width="25"></span>
                            <span><img src="https://i.imgur.com/N90KDYM.png" class="img-fluid "
                                    width="25"></span></small> </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
