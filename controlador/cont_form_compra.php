<?php
session_start();

include_once '../librerias/phpqrcode/qrlib.php';

include_once '../librerias/fpdf/fpdf.php';

// Incluir las clases de PHPMailer
require '../librerias/PHPMailer/src/PHPMailer.php';
require '../librerias/PHPMailer/src/SMTP.php';
require '../librerias/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



// Verificar si el formulario se ha enviado por el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telf"];

    // Definir la ruta y nombre del archivo QR
    $rutaQRBase = "../qr/qr"; // Solo la ruta base, sin la extensión ni el número de evento

    // Crear un objeto FPDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Configurar la fuente
    $pdf->SetFont('Arial', '', 12); // Ajusta la fuente y el tamaño

    // Generar y mostrar códigos QR para cada evento comprado
    if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
        $numEvento = 1; // Contador para agregar un número único a cada código QR
        foreach ($_SESSION['carrito'] as $item) {
            // Combinar datos del evento y del comprador
            $datosEvento = "Evento: {$item['nombre']}\nFecha: {$item['fecha']}\nLugar: {$item['lugar']}\nAforo: {$item['aforo']}";
            $datosComprador = "Comprador: $nombre\nCorreo: $email\nTeléfono: $telefono";
            $contenidoQR = "$datosEvento\n\n$datosComprador";

            // Definir la ruta y nombre del archivo QR con el número de evento
            $rutaQR = "{$rutaQRBase}_{$numEvento}.png";

            // Generar el código QR
            QRcode::png($contenidoQR, $rutaQR, 'M', 10, 3);

            // Incrementar el contador
            $numEvento++;

            // Agregar códigos QR al PDF
            $pdf->Cell(0, 10, "Código QR Evento {$numEvento}", 0, 1, 'C');
            $pdf->Image($rutaQR, 10, $pdf->GetY(), 90);
            $pdf->Ln(70); // Ajusta el espaciado según tus necesidades
        }

        // Agregar información del comprador al PDF
        $pdf->Cell(0, 10, "Información del Comprador", 0, 1, 'C');
        $pdf->Cell(0, 10, "Nombre: $nombre", 0, 1, 'C');
        $pdf->Cell(0, 10, "Correo Electrónico: $email", 0, 1, 'C');
        $pdf->Cell(0, 10, "Número de Teléfono: $telefono", 0, 1, 'C');
    }

    // Definir la ruta y nombre del archivo PDF
    $pdfFilePath = "../pdf/compra_{$nombre}.pdf";

    // Guardar el PDF en un archivo
    $pdf->Output($pdfFilePath, 'F');





    // Enviar el PDF por correo electrónico con PHPMailer
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com'; // Servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'eventosxphp@outlook.com'; // Correo electrónico
        $mail->Password = 'AlvaroMolina1234'; // Contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // Puerto SMTP

        $mail->setFrom('eventosxphp@outlook.com', 'Eventos X');
        $mail->AddReplyTo('eventosxphp@outlook.com', 'Eventos X');
        $mail->addAddress($email, $nombre);

        $mail->isHTML(true);
        $mail->Subject = 'Resumen de su compra';
        $mail->Body = '<p>Adjunto encontrar&aacute;s el PDF con tus entradas</p>';

        // Adjuntar el PDF
        $mail->addAttachment($pdfFilePath);

        // Enviar el correo
        $mail->send();
        echo 'Correo enviado con éxito';
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }




    // Cerrar la sesión al finalizar el proceso
    session_destroy();

    // Redirigir a la página de confirmación
    header("Location: ../vista/confirmacion.php");
    exit();
} else {
    // Si alguien intenta acceder directamente a este archivo sin enviar datos por POST, redirigir a la página de inicio
    header("Location: ../vista/index.php");
    exit();
}