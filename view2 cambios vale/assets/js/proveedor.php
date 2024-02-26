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
                <li><a href="..\modu\contacto.php">Contacto</a></li>
                <li><a href="..\modu\login.php">Cuenta</a></li>
                <li><a href="..\modu\pacientes.php">Pacientes</a></li>
                <li><a href="..\modu\proveedor.php">Proveedor</a></li>
            </ul>
        </nav>
    </header>
    <h2>Tabla de Facturas</h2>
<div class="contacto-info">
<div class="boton-centrado">
    <button onclick="abrirModal()">Agregar Factura</button>
</div>
</div>

<div class="contacto-info">
<table>
  <tr>
    <th>Nombre de Proveedor</th>
    <th>Contacto</th>
    <th>Vendedor Asignado</th>
    <th>Facturas</th>
    <th>Monto</th>
  </tr>
  <tr>
    <td>Proveedor A</td>
    <td>contacto@proveedora.com</td>
    <td>Juan Pérez</td>
    <td>123456, 123457</td>
    <td>$1500</td>
  </tr>
  <tr>
    <td>Proveedor B</td>
    <td>info@proveedorb.com</td>
    <td>María García</td>
    <td>123458</td>
    <td>$2000</td>
  </tr>
  <!-- Agrega más filas según sea necesario -->
</table>
</div>
<div id="modalAgregar" class="modal">
  <div class="modal-content">
    <span class="close" onclick="cerrarModal()">&times;</span>
    <h3>Agregar Factura</h3>
    <form>
      <label for="nombreProveedor">Nombre de Proveedor:</label>
      <input type="text" id="nombreProveedor" name="nombreProveedor"><br>
      <label for="contacto">Contacto:</label>
      <input type="text" id="contacto" name="contacto"><br>
      <label for="vendedorAsignado">Vendedor Asignado:</label>
      <input type="text" id="vendedorAsignado" name="vendedorAsignado"><br>
      <label for="facturas">Facturas:</label>
      <input type="text" id="facturas" name="facturas"><br>
      <label for="monto">Monto:</label>
      <input type="text" id="monto" name="monto"><br>
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
