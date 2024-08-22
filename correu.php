<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $nom = htmlspecialchars(trim($_POST['nom']));
    $correu = htmlspecialchars(trim($_POST['correu']));
    $motiu = htmlspecialchars(trim($_POST['motiu']));
    $missatge = htmlspecialchars(trim($_POST['missatge']));

    // Configuración del correo
    $to = "ricardesra@gmail.com"; // Cambia a la dirección donde quieres recibir los correos
    $subject = "Nou missatge de $nom - $motiu";
    $body = "Has rebut un nou missatge:\n\n" .
            "Nom: $nom\n" .
            "Correu electrònic: $correu\n" .
            "Motiu: $motiu\n\n" .
            "Missatge:\n$missatge\n";

    $headers = "From: $correu\r\n" .
               "Reply-To: $correu\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "Missatge enviat correctament!";
    } else {
        echo "Hi ha hagut un error al enviar el missatge.";
    }
}
?>