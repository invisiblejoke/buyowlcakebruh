<?php

$mail = new PHPMailer;
            //$mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = "smtp.gmail.com";  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'buyowlcakebruh@gmail.com';                 // SMTP username
            $mail->Password = 'buyowlcakebruh';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to
            $mail->setFrom('buyowlcakebruh@gmail.com', 'BuyOwlCakeBruh Team');
            $mail->addAddress($email);     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);    

            ?>