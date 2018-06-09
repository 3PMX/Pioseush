<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<?php

require __DIR__ . '/../vendor/autoload.php';

function send_mail($config)
{

	$mail = new PHPMailer;

	// $mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->CharSet = 'UTF-8';
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'poczta.int.pl';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'biuro.3pmx@int.pl';                 // SMTP username
	$mail->Password = 'P@ssw0rd';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 25;                                    // TCP port to connect to

	$mail->setFrom('biuro.3pmx@int.pl', '3PMX');
	$mail->addAddress('biuro.3pmx@int.pl', '3PMX');     // Add a recipient
	// $mail->addAddress('ellen@example.com');               // Name is optional
	$mail->addReplyTo($config->from_email, $config->from_name);
	// $mail->addCC('cc@example.com');
	// $mail->addBCC('bcc@example.com');

	// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	 $mail->addAttachment('img/logo.jpg', 'logo.jpg');    // Optional name
	// $mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $config->mail_subject;
	$mail->Body    = $config->mail_body;

	$html = new \Html2Text\Html2Text($mail->Body);
	$mail->AltBody = $html->getText();

	if(!$mail->send()) {
	    echo 'Wiadomość nie mogła zostać wysłana.';
	    //echo ' Wypełnij wszystkie pola'
	    echo 'Błąd: ' . $mail->ErrorInfo;
	} else {
	    echo 'Wiadomość została wysłana!';
	}

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$config = (object) [
		'from_email' => $_POST['from_email'],
		'from_name' => $_POST['from_name'],
		'from_name_office' => $_POST['from_name_office'],
		'mail_subject' => $_POST['mail_subject'],
		'mail_body' => $_POST['mail_body'],
		'checkbox' => $_POST['checkbox']
	];
	send_mail($config);

}



?>

<form action="" method="POST">
	<div class ="box">
	<h1>Formularz kontaktowy:</h1>
	
	<label>
	<span>Podaj swój e-mail:</span>
	<input type="text" name="from_email" class="wpis" placeholder="twoj.adres@email.com">
	</label>
	
	<label>
	<span>Podaj swoje imię i nazwisko:</span>
	<input type="text" name="from_name" class="wpis" placeholder="Imię i Nazwisko">
	</label>
	
	<label>
	<span>Podaj nazwę firmy:</span>
	<input type="text" name="from_name_office" class="wpis" placeholder="Nazwa firmy">
	</label>
	
	<label>
	<span>Podaj temat wiadomości:</span>
	<input type="text" name="mail_subject" class="wpis" placeholder="Temat wiadomości">
	</label>
	
	<label>
	<span>Tutaj wpisz treść wiadomości:</span>
	<textarea type="text" name="mail_body" class="wiadomosc"></textarea>
	</label>
	<br>
	<label>
	<input type="file" name="plik" accept="image/jpeg,application/pdf,application/msword">
	</label>
	<br><br>
	<input type="checkbox" name="checkbox" class="regulamin"></input>
	<div class="regulamin_text"><p>Wyrażam zgodę na przetwarzanie danych osobowych zgodnie z ustawą o ochronie danych osobowych w związku z (np. wysyłaniem zapytania przez formularz kontaktowy). Podanie danych jest dobrowolne, ale niezbędne do przetworzenia zapytania. Zostałem poinformowany, że przysługuje mi prawo dostępu do swoich danych, możliwości ich poprawiania, żądania zaprzestania i ich przetwarzania. Administraotem danych osobowych jest Pioseush - Monitoring zamówień (grupa projektowa, Politechnika Opolska).
	</p></div>
	<button type="submit" class="button">WYŚLIJ WIADOMOŚĆ</button>

</div>
</form>
</body>
</html>

