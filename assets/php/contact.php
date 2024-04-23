<?php

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$headers = 'From: ';

$to = "";

$error = "El formulario se encuentra vacío";
$nameError = "El campo de nombre es requerido";
$emailError = "El campo de email es requerido";
$subjectError = "El campo de asunto es requerido";
$messageError = "El campo de mensaje es requerido";

if ($_POST){
    if (!$_POST['name'] && !$_POST['email'] && !$_POST['subject'] && !$_POST['message']) {
        echo $error;
        return 0;
    }
    if (!$_POST['name']){
        echo $nameError;
        return 0;
    }
    if (!$_POST['email']){
        echo $emailError;
        return 0;
    }
    if ($_POST['email'] && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
        $emailError = 'La dirección de email no es valida';
        echo $emailError;
        return 0;
    }
    if (!$_POST['subject']){
        echo $subjectError;
        return 0;
    }
    if (!$_POST['message']){
        echo $messageError;
        return 0;
    }
    

    mail($to,$subject,$message,$headers)
    or die ("error");

    echo 'OK';
    return 1;
}

?>