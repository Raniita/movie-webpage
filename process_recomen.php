<?php
    session_start();
    include('func_gen_php.php');
    include('func_gen_sql.php');

    $state = '';
    if (isset($_GET['logout'])) {
        header('Location:login.php?logout');
    } else {
        $state = pgCheckSession();
        if ($state == 'OK!') {
            $logged = true;
            $idUser = $_SESSION['id'];
            $nameUser = $_SESSION['name'];
        } else {
            $logged = false;
        }
    }

    //check if is logged
    if ($logged) {
        $id_user = $_SESSION['id'];
        $pwd = "/home/alumnos/ai18/public_html/scripts\r\n";
        $fun = "collab_filter(" . $id_user . ")\r\n";

        //Prepare Socket
        $domain = AF_INET;
        $type = SOCK_STREAM;
        $port = 1111;
        $url = "labit601.upct.es";

        $socket = socket_create($domain, $type, getprotobyname("tcp"));

        //echo "Connect " . getprotobyname("tcp");
        socket_connect($socket, $url, $port);

        $info = $pwd . $fun . chr(0);
        $sent = socket_write($socket, $info, strlen($info));
        socket_close($socket);
    }

?>