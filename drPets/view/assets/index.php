<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DrPets</title>
    <link href="../assets/css/plantilla.css" rel="stylesheet"><!-- Enlaza el archivo CSS externo -->
</head>
<body>
    <header> <!--Encabezado -->
    <nav>
        <ul>
            <li><a href="../assets/index.php">DrPets</a></li>
            <li><a href="../assets/model/nuestraClinica.php">Nuestra Clínica</a></li>
            <li><a href="../assets/model/servicios.php">Servicios</a></li>
            <li><a href="../assets/model/productos.php">Productos</a></li>
            <li><a href="../assets/model/contacto.php">Contacto</a></li>
            <li><a href="../assets/model/login.php">Cuenta</a></li>
        </ul>
    </nav>
    </header>
    <carrusel>
        <img src="../assets/img/perrosAdultos.jpg"  alt="Imagen de perros adultos">
        <img src="../assets/img/perrosCachorros.jpg"   alt="Imagen de perros cachorros">
        <img src="../assets/img/gatosCachorros.jpg"   alt="Imagen de gatos cachorros">
        <!--<img src="../assets/img/mascotas.jpg"   alt="Imagen de mascotas">-->
    </carrusel>
    <section>
        <h1>¡Bienvenido a DrPets!</h1>
        <h2>Busca tu servicio:</h2>
        <form action="" method="post">
        <input type="text" id="busqueda" placeholder="Buscar" required>
        <button type="submit" onclick="validarBusqueda()">Buscar</button>  
        </form> 
    <main>
        <h2>¿Qué es DrPets?</h2>
        <p>DrPets es una clínica veterinaria que se especializa en la atención de mascotas.Es una clínica veterinaria especializada en la atención integral de los animales domésticos.
        Brindamos servicios médicos, spa y venta de productos para sus mascotas</p>
        
        <h2>Misión</h2>
        <p>Nuestra misión es proporcionar atención veterinaria excepcional y compasiva a las mascotas,brindando servicios de alta calidad que promuevan su salud y bienestar. 
        Nos esforzamos por establecer relaciones duraderas con nuestros clientes y sus mascotas, basadas en la confianza, la integridad y el cuidado personalizado.En Dr. Pets, 
        estamos comprometidos con la excelencia en todo lo que hacemos, desde la atención médica hasta el servicio al cliente, con el objetivo de mejorar la vida de todas 
        las mascotas que atendemos</p>
        
        <h2>Visión</h2>
        <p>Nos visualizamos como líderes en el cuidado de la salud animal, reconocidos por nuestra excelencia clínica, nuestro enfoque centrado en el cliente y nuestro 
        compromiso con el bienestar animal. Nos esforzamos por expandir nuestra presencia para poder brindar nuestros servicios a más comunidades, siempre manteniendo los más altos 
        estándares de calidad y ética profesional. 
        <p>Aspiramos a ser un referente en la industria veterinaria, ofreciendo innovación, compasión y dedicación en todo lo que hacemos</p>
        <p>Servir a todos los seres queridos como si fueran parte de nuestra familia.</p>
    </main>
    </section>
    <aside>
            <h3>Horarios de atención</h3>
            Lunes a Viernes: 8am - 6pm <br> Sábado: 9am - 4pm <br> Domingo: Cerrado <br> <br>
    </aside>
    <footer>
        Derechos Reservados &copy; 2024 
    </footer>
</body>
</html>
