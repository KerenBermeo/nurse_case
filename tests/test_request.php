<?php
// URL del endpoint de registro
$url = 'http://localhost/nurse_case/register';

// Datos JSON que se enviarán en la solicitud
$data = [
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'password' => 'password123'
];

// Convertir los datos a JSON
$jsonData = json_encode($data);

// Configurar las opciones de la solicitud HTTP
$options = [
    'http' => [
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => $jsonData,
    ],
];

// Crear el contexto de la solicitud
$context = stream_context_create($options);

// Enviar la solicitud y obtener la respuesta
$response = @file_get_contents($url, false, $context);

// Verificar si la solicitud fue exitosa
if ($response === FALSE) {
    echo "Error al realizar la solicitud.\n";
    echo "URL: $url\n";
    echo "Código de error HTTP: " . $http_response_header[0] . "\n";
} else {
    // Mostrar la respuesta del servidor
    echo "Respuesta del servidor:\n";
    print_r($response);
}
?>