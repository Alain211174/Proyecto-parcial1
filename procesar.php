<?php
include 'database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $rol = $conn->real_escape_string($_POST['rol']);
    $piso = $conn->real_escape_string($_POST['piso']);
    $fecha = $conn->real_escape_string($_POST['fecha']);
    
    $sql = "INSERT INTO registros (nombre, rol, piso_destino, fecha) 
            VALUES ('$nombre', '$rol', '$piso', '$fecha')";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true, "message" => "Registro guardado correctamente"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error: " . $conn->error]);
    }
    
    $conn->close();
} else {
    echo json_encode(["success" => false, "message" => "Método no permitido"]);
}
?>