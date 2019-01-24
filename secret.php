<?php
    /* Credentials producction */
    $url_product = 'http://url';
    $host_product = 'host';
    $user_product = 'user';
    $passw_product = 'passwd';
    $db_product = 'db';

    /* Credentials develop enviroment */
    $url_dev = 'url-dev';
    $host_dev = 'host-dev';
    $user_dev = 'user-dev';
    $passw_dev = 'passwd-dev';
    $db_dev = 'db-dev';

    /* Default Credentials */
    $host_default = 'localhost';
    $user_default = 'user';
    $passw_default = 'passd';
    $db_default = 'db';

    /**
     * Connect to Database
     * @return mysqli reference
     */
    function sgConnectDB() {
        if ($_SERVER['HTTP_HOST'] == $url_product) {
            $host = $host_product;
            $user = $user_product;
            $passwd = $passwd_product;
            $db = $db_product;
        } else {
            if ($_SERVER['HTTP_HOST'] == $url_dev) {
                $host = $host_dev;
                $user = $user_dev;
                $passwd = $passwd_dev;
                $db = $db_dev;
            } else {
                $host = $host_default;
                $user = $user_default;
                $passw = $passwd_default;
                $db = $db_default;
            }
        }

        $connect = mysqli_connect($host, $user, $passwd, $db);
        if (mysqli_connect_errno()) {
            printf("Connection failed: %s\n", mysqli_connect_error());
            exit();
        }
        $connect->set_charset("utf8mb4_unicode_ci");

        return $connect;
    }

?>
