<?php
include 'database.php';

header('Content-Type: application/json');

$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : date('Y-m-d');

$sql = "SELECT id, nombre, rol, piso_destino, fecha, activo 
        FROM registros 
        WHERE fecha = '$fecha' 
        ORDER BY id DESC";

$result = $conn->query($sql);

$registros = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Asegurar que el campo 'activo' sea un booleano
        $row['activo'] = (bool)$row['activo'];
        $registros[] = $row;
    }
}

echo json_encode($registros);

$conn->close();
?>