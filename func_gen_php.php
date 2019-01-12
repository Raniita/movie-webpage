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

    function pgShowUserBar($id, $name) {
        //TODO
        //Image user
        $return = '';
        $return = "<ul class=\"navbar-nav mr-auto\">
                    <li class=\"dropdown\">
                        <a class=\"dropdown-toggle text-dark\" data-toggle=\"dropdown\" href=\"#\">
                            <span class=\"fas fa-user\"></span> 
                            <b>" . $name . "</b>
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
                                    <p class=\"text-left\"><strong>" . $name . "</strong></p>
                                    <!--<p class=\"text-left small\">correoElectronico@email.com</p>-->
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

    function pgShowNavbar($logged, $id, $name) {
        $return = '';
        $return = "<nav class=\"navbar navbar-expand-md navbar-light fixed-top bg-white \">
    <a class=\"navbar-brand navbar-tuxflix\" href=\"dashboard.php\"><img alt=\"tuxflix\" class=\"d-inline-block align-top\"
                                                                     height=\"45\" src=\"img/tuxflix_logo+text.svg\"
                                                                     width=\"120\"></a>

    <button aria-controls=\"navbarsLinks\" aria-expanded=\"false\" aria-label=\"Toggle navigation\" class=\"navbar-toggler\"
            data-target=\"#navbarsLinks\" data-toggle=\"collapse\" type=\"button\">
        <span class=\"navbar-toggler-icon\"></span>
    </button>

    <div class=\"left-navbar\">";

        if ($logged == true) {
            $return = $return . pgShowUserBar($id, $name);
        } else {
            $return = $return . pgShowButtonsNavbar();
        }

        $return = $return . "
        </div >

    <!--NavBar Links-->
    <div class=\"collapse navbar-collapse\" id=\"navbarsLinks\">
        <ul class=\"navbar-nav ml-auto navbar-links\">
            <li class=\"nav-item active\">
                <a class=\"nav-link\" href=\"#\"><b>Home</b> <span class=\"sr-only\">(current)</span></a>
            </li>

            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">Link</a>
            </li>

            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">Link 2</a>
            </li>

            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">Link 3</a>
            </li>
            
            <li>
                <div id=\"searchBox\" class=\"dropdown pull-right\" style=\"margin-top: 5px;\"><input type=\"text\" id=\"search\"
                                                                                               placeholder=\"Search\"/>
                    <i aria-hidden=\"true\" class=\"fas fa-search\"></i>
                    <div id=\"display\" style=\"background-color:white; position:absolute; z-index:10\"></div>
                </div>
            </li>
        
        </ul>

        <!--
        <form class=\"form-inline md-form form-sm\">
            <input aria-label=\"Search\" class=\"form-control form-control-sm mr-3 w-75\" placeholder=\"Search\" type=\"text\">
            <i aria-hidden=\"true\" class=\"fas fa-search\"></i>
        </form>-->

    </div>
</nav>";

        return $return;
    }

    function pgShowFooter() {
        $return = '';
        $return = "<footer class=\"footer\">
                        <div class=\"sticky-footer text-center\">
                            <span class=\"text-muted\">See you on my Github! <a href=\"#\"><i class=\"fab fa-github\"></i> Raniita</a></span>
                        </div>
                   </footer>";

        return $return;
    }

    function pgGetUserImg($id) {
        $pic = sgUserImg($id);

        if ($pic == '') {
            //No existe la img
            $picture = 'user-images/default-user.jpg';
        } elseif (file_exists("user-images/" . $pic)) {
            $picture = 'user-images/' . $pic;
        } else {
            $picture = 'user-images/default.png';
        }

        return $picture;
    }

?>