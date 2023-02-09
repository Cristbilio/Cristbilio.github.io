<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  
  $to = "camezquita91@gmail.com";
  $subject = "Mensaje de contacto";
  $headers = "From: " . $email . "\r\n" .
    "Reply-To: " . $email . "\r\n";
  
  if (mail($to, $subject, $message, $headers)) {
    echo "El mensaje se ha enviado con éxito.";
  } else {
    echo "Error al enviar el mensaje.";
  }
}

?>
