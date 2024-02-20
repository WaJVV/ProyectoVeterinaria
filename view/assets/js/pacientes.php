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
                <li><a href="..\js\proveedor.php">Proveedor</a></li>

            </ul>
        </nav>
    </header>
    <h2>Listado de Pacientes</h2>
    <div class="contacto-info">
    <button class="agregarPaciente" onclick="abrirModal()">Agregar Mascota</button>
</div>
<div class="tablas">
    <table class="contacto-info">
  <tr>
    <th>Nombre</th>
    <th>Propietario</th>
    <th>Peso</th>
    <th>Edad</th>
    <th>Fecha de Nacimiento</th>
    <th>Raza</th>
  </tr>
  <tr>
    <td>Bobby</td>
    <td>Carlos</td>
    <td>5 kg</td>
    <td>3 años</td>
    <td>2021-02-14</td>
    <td>Golden Retriever</td>
  </tr>
  <tr>
    <td>Luna</td>
    <td>María</td>
    <td>3 kg</td>
    <td>2 años</td>
    <td>2022-05-20</td>
    <td>Labrador</td>
  </tr>
</table>
</div>
<div id="modalAgregar" class="contacto-info">
  <div class="modal-content">
    <span class="close" onclick="cerrarModal()">&times;</span>
    <h3>Agregar Mascota</h3>
    <form>
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre"><br>
      <label for="propietario">Propietario:</label>
      <input type="text" id="propietario" name="propietario"><br>
      <label for="peso">Peso:</label>
      <input type="text" id="peso" name="peso"><br>
      <label for="edad">Edad:</label>
      <input type="text" id="edad" name="edad"><br>
      <label for="fechaNacimiento">Fecha de Nacimiento:</label>
      <input type="text" id="fechaNacimiento" name="fechaNacimiento"><br>
      <label for="raza">Raza:</label>
      <input type="text" id="raza" name="raza"><br>
      <input type="submit" value="Agregar">
    </form>
  </div>
</div>
<script>
function abrirModal() {
  document.getElementById('modalAgregar').style.display = 'block';
}

function cerrarModal() {
  document.getElementById('modalAgregar').style.display = 'none';
}
</script>

    <footer>
        Derechos Reservados &copy; 2024 
    </footer>

</body>
</html>
