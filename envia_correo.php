<?php
$to = "tucorreo@example.com";
$subject = "Prueba de correo";
$message = "Este es un correo de prueba.";
$headers = "From: prueba@example.com";

if (mail($to, $subject, $message, $headers)) {
    echo "Correo enviado correctamente.";
} else {
    echo "Error al enviar el correo.";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Por favor complete el formulario correctamente.";
        exit;
    }

    $recipient = "malenamontecino40@gmail.com";  // Reemplaza con tu dirección de correo
    $subject = "Nuevo mensaje de $name";

    $email_content = "Nombre: $name\n";
    $email_content .= "Correo Electrónico: $email\n\n";
    $email_content .= "Mensaje:\n$message\n";

    $email_headers = "From: $name <$email>";

    if (mail($recipient, $subject, $email_content, $email_headers)) {
        http_response_code(200);
        echo "¡Gracias! Su mensaje ha sido enviado.";
    } else {
        http_response_code(500);
        echo "Oops! Algo salió mal y no pudimos enviar su mensaje.";
    }

} else {
    http_response_code(403);
    echo "Hubo un problema con su envío, inténtelo de nuevo.";
}
?>
