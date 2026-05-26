<?php
// CONTROLADOR DIOS: Mezcla HTTP, negocio, base de datos y servicios externos
$monto = $_POST['amount'];
$usuario_id = $_SESSION['user_id'];

// 1. Conexión y consulta directa
$conn = mysqli_connect("localhost", "root", "", "sistema");
$user_query = mysqli_query($conn, "SELECT email FROM usuarios WHERE id = $usuario_id");
$user = mysqli_fetch_assoc($user_query);

// 2. Lógica de negocio acoplada a API externa
$ch = curl_init("https://api.pasareladepago.com/v1/charges");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['amount' => $monto]));
$response = json_decode(curl_exec($ch), true);

if ($response['status'] == 'success') {
    // 3. Más consultas SQL crudas
    mysqli_query($conn, "INSERT INTO facturas (usuario_id, monto) VALUES ($usuario_id, $monto)");
    
    // 4. Envío de correo síncrono (ralentiza la petición del usuario)
    mail($user['email'], "Tu recibo", "Gracias por tu pago de " . $monto);
    
    echo json_encode(["status" => "ok"]);
}
