<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila los datos del formulario y sanitízalos
    $name = htmlspecialchars(strip_tags(trim($_POST["name"])));
    $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
    $message = htmlspecialchars(strip_tags(trim($_POST["message"])));

    // Tu dirección de correo a donde quieres que lleguen los mensajes
    $to = "camezquita91@gmail.com"; // <-- ¡CAMBIA ESTO A TU CORREO ELECTRÓNICO!
    $subject = "Nuevo mensaje del formulario web de " . $name;
    $headers = "From: " . $name . " <" . $email . ">\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

    // Contenido del correo
    $email_content = "Nombre: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Mensaje:\n$message\n";

    // Envía el correo
    if (mail($to, $subject, $email_content, $headers)) {
        // Éxito: puedes redirigir a una página de agradecimiento o mostrar un mensaje
        // header("Location: thank_you.html"); // Por ejemplo, a una página llamada thank_you.html
        // exit;
        echo "<p style='text-align: center; color: green; font-size: 1.2em;'>¡Gracias! Tu mensaje ha sido enviado.</p>";
    } else {
        // Error al enviar el correo
        echo "<p style='text-align: center; color: red; font-size: 1.2em;'>Lo siento, hubo un problema al enviar tu mensaje. Por favor, inténtalo de nuevo más tarde.</p>";
    }
} else {
    // Si alguien intenta acceder directamente a este archivo sin enviar el formulario
    echo "<p style='text-align: center; color: red; font-size: 1.2em;'>Acceso no permitido.</p>";
}
?>
