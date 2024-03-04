<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/plantilla.css">    
    <link rel="stylesheet" href="../css/login.css">  
    
</head>
<body class="login-page">
    <header>
        <nav>
            <ul>
                <li><a href="..\index.php">DrPets</a></li>
                <li><a href="..\modu\nuestraClinica.php">Nuestra Clínica</a></li>
                <li><a href="..\modu\Servicios.php">Servicios</a></li>
                <li><a href="..\modu\productos.php">Productos</a></li>
                <li><a href="..\modu\contacto.php">Contacto</a></li>
                <li><a href="..\modu\login.php">Cuenta</a></li>
                <li><a href="..\modu\pacientes.php">Pacientes</a></li>
                <li><a href="..\modu\proveedor.php">Proveedor</a></li>
            </ul>
        </nav>
    </header>
    <section class="login-section">
        <div class="login-box">
            <div class="login-logo">
                <a href="..\controller\loginController.php"><b></b></a>
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Inicio de Sesión</p>
                    <form action="..\controller\loginController.php" method="post">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Usuario" name="usuario">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Contraseña" name="contrasena">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                    Recordarme
                </label>
            </div>
        </div>
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        </div>
    </div>
</form>

                    <p class="mb-1">
                        <a href="forgot-password.html">Olvide mi contraseña</a>
                    </p>
                    <p class="mb-0">
                        <a href="register.html" class="text-center">Crear cuenta</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        Derechos Reservados &copy; 2024 
    </footer>
</body>
</html>
