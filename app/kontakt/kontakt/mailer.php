<?php

require_once('recaptchalib.php');
$privatekey = "6LeOxwQAAAAAAAS5WnILTciWSV-aKciZyXGhmiHp";
$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

if (!$resp->is_valid) {
  die ("Kod sa slike nije unet dobro. Vratite se i pokusajte ponovo." .
       "(reCAPTCHA kaze: " . $resp->error . ")");
}

session_start();
$_SESSION['form_element0'] = $_POST['form_element0'];
$_SESSION['form_element1'] = $_POST['form_element1'];
$_SESSION['form_element2'] = $_POST['form_element2'];
$_SESSION['form_element3'] = $_POST['form_element3'];
$form_element0 = $_SESSION['form_element0'];
$form_element1 = preg_replace("/\r/", "", $_SESSION['form_element1']);
$form_element1 = preg_replace("/\n/", "", $form_element1);
$form_element2 = preg_replace("/\r/", "", $_SESSION['form_element2']);
$form_element2 = preg_replace("/\n/", "", $form_element2);
$form_element3 = $_SESSION['form_element3'];
if(!$_SESSION['form_element0'] || !$_SESSION['form_element1'] || !$_SESSION['form_element2'] || !$_SESSION['form_element3']) {
$_SESSION['formMessage'] = "		Polja obeležena zvezdicom su obavezna\n";
Header("Location: kontakt.php");
exit();
} else {
$email="emforma.loznica@gmail.com";

if (!eregi ("^([a-z0-9_]|\-|\.)+@(([a-z0-9_]|\-)+\.)+[a-z]{2,4}$", $email)) {
unset($email);
}

$from = stripslashes($form_element0)." <".stripslashes($form_element1).">";$subject= $form_element2;$message = "\nVaše ime: $form_element0\n\nEmail: $form_element1\n\nTema: $form_element2\n\nPoruka: $form_element3\n";
$headers="From: $from\n";if (file_exists($tmp_name)){
if(is_uploaded_file($tmp_name)){
$file = fopen($tmp_name,'rb');
$data = fread($file,filesize($tmp_name));
fclose($file);
$data = chunk_split(base64_encode($data));

}

$headers .= "MIME-Version: 1.0\n" .
"Content-Type: multipart/mixed;\n";
$headers .= " boundary=\"{$mime_boundary}\"";

$message = "This is a multi-part message in MIME format.\n\n" .
"--{$mime_boundary}\n" .
"Content-Type: text/plain; charset=\"iso-8859-1\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" .
$message . "\n\n"; 

$message .= "--{$mime_boundary}\n" .
"Content-Type: {$type};\n" .
" name=\"{$name}\"\n" .
"Content-Transfer-Encoding: base64\n\n" .
$data . "\n\n" .
"--{$mime_boundary}--\n"; 
}

SESSION_UNREGISTER('form_element0');
SESSION_UNREGISTER('form_element1');
SESSION_UNREGISTER('form_element2');
SESSION_UNREGISTER('form_element3');
if (@mail($email, stripslashes($subject), stripslashes($message), $headers)) {$_SESSION["formMessage"] = "		".'Hvala, Va&scaron; email je poslat'."
";
header("Location: kontakt.php");
} else {
$_SESSION["formMessage"] = "I'm sorry, there seems to have been an error trying to send your email. Please try again.";
header("Location: kontakt.php");
}
}


?>
