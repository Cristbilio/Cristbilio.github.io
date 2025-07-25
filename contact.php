<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila los datos del formulario y sanitízalos
    $name = htmlspecialchars(strip_tags(trim($_POST["name"])));
    $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
    $message = htmlspecialchars(strip_tags(trim($_POST["message"])));

    // Tu dirección de correo a donde quieres que lleguen los mensajes
    $to = "camezquita91@gmail.com"; // ¡Esta dirección es correcta!
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
        // Éxito: Redirige al usuario a la página principal o a una de agradecimiento
        // Esto es crucial para evitar que el usuario se quede en la página PHP
        header("Location: index.html?status=success");
        exit;
    } else {
        // Error: Redirige al usuario a la página principal con un mensaje de error
        header("Location: index.html?status=error");
        exit;
    }
} else {
    // Si alguien intenta acceder directamente a este archivo sin enviar el formulario
    header("Location: index.html?status=no_access");
    exit;
}
?>
