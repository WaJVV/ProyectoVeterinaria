<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nuestraClinica</title>
    <link href="../css/plantilla.css" rel="stylesheet"><!-- Enlaza el archivo CSS externo -->
    <link href="../css/rolAdmin.css" rel="stylesheet"><!-- Enlaza el archivo CSS externo -->
</head>
<body>
<header>
        <nav>
            <ul>
                <li><a href="..\index.php">DrPets</a></li>
                <li><a href="..\modu\nuestraClinica.php">Nuestra Clínica</a></li>
                <li><a href="..\modu\servicios.php">Servicios</a></li>
                <li><a href="..\modu\productos.php#">Productos</a></li>
                <li><a href="..\modu\contacto.php">Contacto</a></li>
                <li><a href="..\modu\login.php">Cuenta</a></li>
            </ul>
        </nav>
    </header>
    <main>
    <h2>Agregar Usuario</h2>
        <form action="../rolAdmiController.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required><br><br>
            <button type="submit">Registrar Usuario</button>
        </form>
    </main>

    <button onclick="goToPreviousPage()">Continuar</button>

<script>
    function goToPreviousPage() {
        window.history.back();
    }
</script>

    <button class="back-button" onclick="atras()">Atrás</button>
    <script>
        function atras() {
        window.history.back();
        }
        </script>

    <footer>
        Derechos Reservados &copy; 2024 
    </footer>