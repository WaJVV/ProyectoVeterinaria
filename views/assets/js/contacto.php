<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DrPets</title>
    <link href="../css/plantilla.css" rel="stylesheet"> <!-- Enlaza el archivo CSS externo -->
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="..\index.php">DrPets</a></li>
                <li><a href="#">Nuestra Clínica</a></li>
                <li><a href="#">Servicios</a></li>
                <li><a href="#">Productos</a></li>
                <li><a href="..\js\contacto.php">Contacto</a></li>
                <li><a href="..\js\login.php">Cuenta</a></li>
                <li><a href="..\js\pacientes.php">Pacientes</a></li>
                <li><a href="..\js\proveedor.php">Proveedor</a></li>
            </ul>
        </nav>
    </header>
       
<div class="contacto">
        <section>
            <div class="contact-form">
                <h3>Envíanos un mensaje</h3>
                <form action="" method="post">
                    <label for="nombre">Nombre y apellido:</label>
                    <input type="text" id="nombre" name="nombre"><br>
                    
                    <label for="correo">Correo electrónico:</label>
                    <input type="email" id="correo" name="correo"><br>
                    
                    <label for="asunto">Asunto:</label>
                    <select id="asunto" name="asunto">
                        <option value="consulta">Consulta médica</option>
                        <option value="producto">Reclamos</option>
                        <option value="servicio">Solicitud de servicio</option>
                        <option value="otro">Otro</option>
                    </select><br>
                    
                    <label for="mensaje">Mensaje:</label>
                    <textarea id="mensaje" name="mensaje"></textarea><br>
                    
                    <input type="submit" value="Enviar mensaje">
                </form>
                </div>
        </section>
    </div>
</div>
</div>
<div class="contenedor">
    
    <div class="contacto-info">
        <h2>Contacto</h2>
        <div class="contact-info">
            <p><strong>Dirección:</strong> Alajuela, Naranjo Ruta Nacional Secundaria 141</p>
            <p><strong>Teléfono:</strong> +506 8466 7897</p>
            <p><strong>Correo electrónico:</strong> DrPets@gmail.com</p>
        </div>
        </div>

</div>
   
    <footer>
        Derechos Reservados &copy; 2024 
    </footer>

</body>
</html>
