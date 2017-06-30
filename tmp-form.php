<?php
if (isset($_POST['submitted'])){

    $reponse = "";
    //creer une fonction pour générer une réponse

    function  reponse_contact_form($type, $message){
        global $reponse;
        if ($type == "success") {
            $reponse = "<div class='alert alert-success'>{$message}</div>";
        } else {
            $reponse = "<div class='alert alert-danger'>{$message}</div>";
        }
        return $reponse;
    }

    // messages de success/errors

    $missing_element = "Indiquez toutes les informations.";
    $mail_invalid   = "Adresse Mail Invalide.";
    $message_error  = "Votre Message n'a pas pu être envoyé, veuillez ressayer.";
    $message_send    = "Merci! Votre message a bien été envoyé.";


    $name = $_POST['contact-name'];
    $email = $_POST['contact-mail'];
    $message = $_POST['contact-message'];



    //MESSAGE QUE NOUS ALLOONS RECEVOIR SUR NOTRE BOITE MAIL
    //mail variables

    $to = get_option('admin_email'); //stocker des informations (on récupère l'adresse mail de l'admin)
    $subject = "Une personne vous a envoyé un message du" . get_bloginfo('name');
    $headers = 'From: ' . $email . "\r\n" .  //\r\n équivalent au <br> en html
        'Reply-to: '  . $email . "\r\n";



    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        $msg = reponse_contact_form("error", $mail_invalid);
    elseif (empty($name) || empty($message)){ //si les champs prénom et message sont vides
        $msg = reponse_contact_form("error", $missing_element); // message d'erreur
    }else{
        //$sent = wp_mail($to, $subject, strip_tags($message), $headers); //strip_tags = supprime les balises html d'une chaine de caractères
        // Start output buffering to grab smtp debugging output
        ob_start();

        // Send the test mail
        $sent = wp_mail($to,$subject,$message);

        // Strip out the language strings which confuse users
        //unset($phpmailer->language);
        // This property became protected in WP 3.2

        // Grab the smtp debugging output
        $smtp_debug = ob_get_clean();

        if ($sent) {
            $msg = reponse_contact_form('success', $message_send);
        } else {
            $msg = reponse_contact_form('error', $message_error);
        }
    }


}
require ("inc/formulaire.php");
