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
                <li><a href="..\model\nuestraClinica.php">Nuestra Clínica</a></li>
                <li><a href="..\model\servicios.php">Servicios</a></li>
                <li><a href="..\model\productos.php">Productos</a></li>
                <li><a href="..\model\contacto.php">Contacto</a></li>
                <li><a href="..\model\login.php">Cuenta</a></li>
            </ul>
        </nav>
    </header>
    <div class="contenedor">

<div class="ubicacion"> 
 <h1> ¿Quienes Somos? </h1>
 <p>Bienvenidos a DrPets, su clínica veterinaria de confianza dedicada al cuidado y bienestar de sus mascotas. En DrPets, nos enorgullece ofrecer servicios de atención integral para todo tipo de animales, desde perros y gatos hasta aves exóticas y pequeños roedores. Nuestro equipo está formado por profesionales apasionados y comprometidos con la salud animal, que trabajan incansablemente para proporcionar el más alto nivel de atención médica, desde consultas de rutina hasta tratamientos especializados.  </p>
</div>

<div class="ubicacion"> 
 <h1> Nuestra Ubicación  </h1>
 <p>Ubicados en las afueras de Alajuela centro, Dr Pets le brinda un servicio personalizado en el cuido de sus mascotas</p>
 <img src="..\img\CampaniaVet1.gif" alt="Campaña de Gratuita">

</div>

<div class="ubicacion"> 
 <h1> Regente Veterinario </h1>
 <img src="https://micarrerauniversitaria.com/wp-content/uploads/2018/03/veterinario-1.gif" width="400px" height="400px" class="img">
 <p> Porque soy veterinaria en DrPets, tengo la oportunidad de fusionar mi pasión por los animales con mi vocación de cuidarlos, proporcionando atención médica de calidad y ayudando a fortalecer el vínculo entre las mascotas y sus familias. </p>
</div>

<button class="back-button" onclick="atras()">Atrás</button>
<script>
    function atras() {
        window.location.href = 'http://localhost/ProyectoVeterinaria/drPets/view/assets/index.php';
    }
</script>

</div>

    <footer>
        Derechos Reservados &copy; 2024 
    </footer>