<?php

// // Replace this with your own email address
// // $to = 'anafellipelli@gmail.com';
// $to = 'pedrotramos97@gmail.com';

// function url(){
//   return sprintf(
//     "%s://%s",
//     isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
//     $_SERVER['SERVER_NAME']
//   );
// }

// if($_POST) {

//    $name = trim(stripslashes($_POST['name']));
//    $email = trim(stripslashes($_POST['email']));
//    $subject = "Mensagem do seu Portfólio";
//    $contact_message = trim(stripslashes($_POST['message']));

   
// 	if ($subject == '') { $subject = "Contact Form Submission"; }

//    // Set Message
//    $message .= "Email from: " . $name . "<br />";
// 	$message .= "Email address: " . $email . "<br />";
//    $message .= "Message: <br />";
//    $message .= nl2br($contact_message);
//    $message .= "<br /> ----- <br /> This email was sent from your site " . url() . " contact form. <br />";

//    // Set From: header
//    $from =  $name . " <" . $email . ">";

//    // Email Headers
// 	$headers = "From: " . $from . "\r\n";
// 	$headers .= "Reply-To: ". $email . "\r\n";
//  	$headers .= "MIME-Version: 1.0\r\n";
// 	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

//    ini_set("sendmail_from", $to); // for windows server
//    $mail = mail($to, $subject, $message, $headers);

// 	if ($mail) { echo "OK"; }
//    else { echo "Algo deu errado. Por favor, tente novamente."; }

// }

$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (empty($name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($message)) {
        $errors[] = 'Message is empty';
    }


    if (empty($errors)) {
        $toEmail = 'pedrotramos97@gmail.com';
        $emailSubject = 'New email from your contant form';
        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=iso-8859-1'];

        $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", $message];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
            header('Location: thank-you.html');
        } else {
            $errorMessage = 'Oops, something went wrong. Please try again later';
        }
    } else {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    }
}

?>