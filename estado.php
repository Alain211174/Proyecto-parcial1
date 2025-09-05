<?php
include 'database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $activo = intval($_POST['activo']);
    
    $sql = "UPDATE registros SET activo = $activo WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        // Verificar que se actualizó correctamente
        $check_sql = "SELECT activo FROM registros WHERE id = $id";
        $result = $conn->query($check_sql);
        $row = $result->fetch_assoc();
        
        echo json_encode([
            "success" => true, 
            "message" => "Estado actualizado correctamente",
            "nuevo_estado" => (bool)$row['activo']
        ]);
    } else {
        echo json_encode(["success" => false, "message" => "Error: " . $conn->error]);
    }
    
    $conn->close();
} else {
    echo json_encode(["success" => false, "message" => "Método no permitido"]);
}
?>