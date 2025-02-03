
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $to = filter_var($_POST['to'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Configuration SMTP
            $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Serveur SMTP (exemple : Gmail)
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@gmail.com'; // Votre adresse Gmail
        $mail->Password = 'your_password'; // Mot de passe ou App Password Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Paramètres de l'e-mail
        $mail->setFrom('your_email@gmail.com', 'Nom de l\'expéditeur');
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        
        $_SESSION['sendSucces'] = "Email envoyé avec succès à $to.";
        header("Location: ../../index.html");
        exit;

        
    } catch (Exception $e) {
        $_SESSION['sendError'] = "Erreur lors de l'envoi de l'email, recommencez plus tard.";
        header("Location: ../../index.html");
        exit;
    }
    
} else {
     $_SESSION['error'] = "Requete impossible.";
    header("Location: ../../index.html");
    exit;
}
?>