<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link href="../css/plantilla.css" rel="stylesheet"><!-- Enlaza el archivo CSS externo -->
    <link href="../css/rolAdmin.css" rel="stylesheet"><!-- Enlaza el archivo CSS externo -->
</head>
<body>
<header>
        <nav>
            <ul>
                <li><a href="..\index.php">DrPets</a></li>
                <li><a href="..\js\nuestraClinica.php">Nuestra Clínica</a></li>
                <li><a href="..\js\servicios.php">Servicios</a></li>
                <li><a href="..\js\productos.php#">Productos</a></li>
                <li><a href="..\js\contacto.php">Contacto</a></li>
                <li><a href="..\js\login.php">Cuenta</a></li>
            </ul>
        </nav>
    </header>
    <div class="welcome-msg">
    <?php
    // Mostrar el nombre del usuario
    if(isset($_GET['nombre'])){
        echo "<h3> Bienvenido (a) " . htmlspecialchars($_GET['nombre'])  . "</h3>"; 
    } else {
        echo "Usuario no encontrado";
    }
    ?>
</div>
<div class="opciones-administrador">
    <h2>Opciones de Administrador:</h2>
    <main>
        <button class="botones" onclick="location.href='agregar_usuario.php'">Agregar Usuario</button>
        <button class="botones" onclick="location.href='eliminar_usuario.php'">Eliminar Usuario</button>
        <button class="botones" onclick="location.href='modificar_datos.php'">Modificar Datos</button>
    </main>
</div>
<aside class="menu">
    <h3>Menú</h3>
    <ul>
        <li>
            <button class="opcion-desplegable">Tablero</button>
            <ul class="submenu">
                <li><a href="#">Perfil</a></li>
                <li><a href="#">Tablero</a></li>
                <li><a href="#">Compras</a></li>
            </ul>
        </li>
        <li>
            <button class="opcion-desplegable">Clientes</button>
            <ul class="submenu">
                <li><a href="#">Lista</a></li>
            </ul>
        </li>
        <li>
            <button class="opcion-desplegable">Pacientes</button>
            <ul class="submenu">
                <li><a href="#">Lista</a></li>
                <li><a href="#">Historial</a></li>
            </ul>
        </li>
        <li>
            <button class="opcion-desplegable">Servicios</button>
            <ul class="submenu">
                <li><a href="#">Médicos</a></li>
                <li><a href="#">Spa</a></li>
                <li><a href="#">Ventas</a></li>
            </ul>
        </li>
        <li>
            <button class="opcion-desplegable">Citas y Recordatorios</button>
            <ul class="submenu">
                <li><a href="#">Agendas</a></li>
                <li>
                    <button class="opcion-desplegable">Inventario</button>
                    <ul class="submenu">
                        <li><a href="#">Lista de inventario</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <button class="opcion-desplegable">Informes</button>
        </li>
        <li>
            <button class="opcion-desplegable">Registros</button>
            <ul class="submenu">
                <li><a href="#">Correos enviados</a></li>
                <li><a href="#">Modificación de Pacientes</a></li>
            </ul>
        </li>
    </ul>
</aside>




<footer>
    <!--cerrar sesión -->
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <input class="botones cerrarSesion" type="submit" value="Cerrar Sesión" name="cerrarSesion">
</form>
<?php
// Comprobar si se ha pulsado el botón de cerrar sesión
if(isset($_POST['cerrarSesion'])) {
    session_start(); // Iniciar una sesión o reanudar la existente
    session_destroy(); // Destruir todas las variables de sesión
    header("Location: ../js/login.php"); // Redireccionar al login.php
}
?>
Derechos Reservados &copy; 2024 
</footer>
</body>
</html>