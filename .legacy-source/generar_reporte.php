<?php
// Agotar la memoria cargando miles de objetos en un array masivo
$conn = mysqli_connect("localhost", "root", "", "sistema");
$result = mysqli_query($conn, "SELECT * FROM auditorias_medicas"); 

$reporte = [];
// Si hay 100,000 registros, el servidor colapsa aquí (Memory Exhausted)
while ($row = mysqli_fetch_assoc($result)) {
    $reporte[] = [
        'id' => $row['id'],
        'medico' => $row['nombre_medico'],
        'fecha' => date('Y-m-d', strtotime($row['fecha_creacion']))
    ];
}

// Procesamiento pesado en bucles anidados
foreach ($reporte as $item) {
    // Lógica compleja...
}
