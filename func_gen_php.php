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

    function pgEncodeDecode($code, $mode) {
        if ($mode == 1) {
            //Encapsulamos
            $new_code = base64_encode($code);
            return $new_code;
        } elseif ($mode == 0) {
            //Desencapsulamos
            $decode = base64_decode($code);
            return $decode;
        } else {
            return 'KO!';
        }
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
        if ($uuid <> 'KO!') {
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
            return 'KO!';
        }
    }

    function pgRegister($user, $age, $gender, $occupation, $passwd) {
        $id = rand(1, 500000);
        while (sgExists($id) == 'OK!') {
            $id = rand(1, 500000);
        }

        $passw_crypt = pgCodifica($user, $passwd);
        $uuid = sgRegister($id, $user, $age, $gender, $occupation, $passw_crypt);

        //Si el id es diferente al error...
        if ($uuid <> 'KO!') {
            //Usuario registrado
            return 'OK!';
        } else {
            //Error al registrar
            return 'KO!';
        }
    }

    function pgKillSession() {
        session_destroy();
        return "OK!";
    }

    function pgCheckSession() {
        if (isset($_SESSION['id']) AND isset($_SESSION['name'])) {
            return "OK!";
        } else {
            return "KO!";
        }
    }

    function pgShowUserBar($id,$name) {
        //TODO
        //Image user
        $return = '';
        $return = "<ul class=\"navbar-nav mr-auto\">
                    <li class=\"dropdown\">
                        <a class=\"dropdown-toggle text-dark\" data-toggle=\"dropdown\" href=\"#\">
                            <span class=\"fas fa-user\"></span> 
                            <b>".$name."</b>
                        </a>
                   <ul class=\"dropdown-menu\">
                    <li>
                        <div class=\"navbar-login\">
                            <div class=\"row\">
                                <div class=\"col-lg-4\">
                                    <p class=\"text-center\">
                                        <!--Pic check --> 
                                        <span class=\"fas fa-user icon-size\"></span>
                                    </p>
                                </div>
                                <div class=\"col-lg-8\">
                                    <p class=\"text-left\"><strong>".$name."</strong></p>
                                    <p class=\"text-left small\">correoElectronico@email.com</p>
                                    <p class=\"text-left\">
                                        <a class=\"btn btn-primary btn-block btn-sm\" href=\"settings.php\">User Settings</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class=\"divider\"></li>
                    <li>
                        <div class=\"navbar-login navbar-login-session\">
                            <div class=\"row\">
                                <div class=\"col-lg-12\">
                                    <p>
                                        <a class=\"btn btn-danger btn-block\" href=\"login.php?logout\">Sign out</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                   </ul>
                  </li>
                 </ul>";

        return $return;
    }

    function pgShowButtonsNavbar() {
        $return = '';
        $return = "<button type=\"button\" class=\"btn btn-outline-info\" onclick=\"location.href = 'login.php';\" id=\"signInButton\">Sign in</button>
                 <button type=\"button\" class=\"btn btn-outline-secondary\" onclick=\"location.href = 'register.php';\" id=\"registerButton\">Join us</button>";

        return $return;
    }

?>