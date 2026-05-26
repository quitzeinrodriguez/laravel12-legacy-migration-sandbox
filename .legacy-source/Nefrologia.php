<?php
// CÓDIGO ANTIGUO: Vulnerable a inyección SQL, sin tipado, mezclando responsabilidades
$id_paciente = $_GET['id'];
$comentario = $_POST['comentario'];
$tipo = $_POST['tipo_comentario']; // String plano: "critico", "seguimiento"

// Query propenso a errores y difícil de mantener
$sql = "INSERT INTO comentarios_medicos (paciente_id, texto, categoria, creado) 
        VALUES (" . $id_paciente . ", '" . $comentario . "', '" . $tipo . "', NOW())";
mysqli_query($conn, $sql);