<?php 
    // mail() -> pode ser confundido com apan e bloquear o computador para não enviar mais emails

    // para mandar é necessário:
    // -- Biblioteca PHPMailer
    // -- Senha, email, host, porta 587

    include_once 'vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = 'dmtp.email@example.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'teste@example.com';
    $mail->Password = "Senha";

    $mail->SMTPSecure = false;
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';

    $mail->setFrom('teste@example.com', 'Título'); //Quem está enviando
    $mail->addAddress('email_temporario@example.com'); //Para quem vai
    $mail->Subject = "E-mail de teste";

    $mail->Body = "<h1>EMail enviado com sucesso!</h1><p>Deu tudo certo!!</p>";

    if($mail->send()){
        echo "E-mail enviado com sucesso.";
    } else {
        echo "Falha ao enviar E-mail";
    }
?>