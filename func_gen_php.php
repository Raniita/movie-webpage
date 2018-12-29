<?php
/* FUNCIONES GENERALES */

/**
 * Funcion para codificar passwd
 * @param $user
 * @param $passw
 * @return string
 */
function pgCodifica($user, $passw){
    $salt = "web";
    $passw = strtolower($user).$salt.$passw;

    return sha1($passw);
}

function pgLogin($user, $passw){
    $passw_crypt = pgCodifica($user, $passw);
    $uuid = sgLogin($user,$passw_crypt);
    if($uuid<>'OK!'){
        /**
         * Usuario Logeado
         */

    } else {
        /**
         * Usuario no logeado
         */
        return 'KO:(';
    }
}

function pgRegister(){
    return null;
}
?>