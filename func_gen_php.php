<?php
    /* FUNCIONES GENERALES */

    /**
     * Funcion para codificar passwd
     * @param $user
     * @param $passw
     * @return string
     */
    function pgCodifica($user, $passw) {
        $salt = "web";
        $passw = strtolower($user) . $salt . $passw;

        return sha1($passw);
    }

    /**
     * Funcion para asegurar las entradas por GET y evitar SQL inyections
     * @param $unsecure
     * @return string Variable segura
     */
    function pgSecureCheck($unsecure) {
        $secure = htmlspecialchars(addslashes(stripslashes(strip_tags($unsecure))));
        return $secure;
    }

    /**
     * Funcion de login de la aplicacion
     * @param $user
     * @param $passw
     * @return string --> state
     */
    function pgLogin($user, $passw) {
        $passw_crypt = pgCodifica($user, $passw);
        $uuid = sgLogin($user, $passw_crypt);

        //Si el id es diferente al error...
        if ($uuid['id'] <> 'KO!') {
            /**
             * Usuario Logeado
             */

            $name = sgInfoUser($uuid['id']);

            $_SESSION['id'] = $uuid['id'];
            $_SESSION['name'] = $name['name'];

            return 'OK!';
        } else {
            /**
             * Usuario no logeado
             */
            return 'KO:(';
        }
    }

    function pgRegister() {
        return null;
    }

    function pgKillSession(){
        session_destroy();
        return "OK!";
    }

    function pgCheckSession(){
        if(isset($_SESSION['']) AND isset($_SESSION['']) AND isset($_SESSION[''])){
            return "OK!";
        } else {
            return "KO!";
        }
    }

?>