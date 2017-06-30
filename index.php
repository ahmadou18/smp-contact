<?php
/*
Plugin Name: Formulaire de contact
Plugin URI: http://prod.simplon.co/
Description: Formulaire de contact qui envoie un mail
Version: 0.1
Author: Ahmadou GUEYE (ah.gueye@laposte.net)
License: GPLv2 or later
Text Domain: lorem ipsum
*/

add_shortcode('ahformulaire', 'ah_shortcode');

function ah_shortcode(){
    require ('tmp-form.php');
}



wp_enqueue_style('bootstrap', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");
if ( ! wp_script_is( 'jquery', 'enqueued' ))

{        //Enqueue
    wp_enqueue_script( 'jquery' );
}
