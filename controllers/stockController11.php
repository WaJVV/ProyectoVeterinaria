<?php
$conn = new mysqli('localhost', 'root', '', 'drpetsvet');

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM productoinventario WHERE idProducto = 11";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["stockProducto"] . "</td>";
        echo "</tr>";

        if ($row["stockProducto"] < 5 && $row["stockProducto"] > 0) {
            echo "Se está quedando sin stock!";
        } elseif ($row["stockProducto"] == 0) {
            echo "Producto sin stock";
        }
    }
}

$conn->close();
?>