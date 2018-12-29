<?php

/**
 * Connect to Database
 * @return mysqli
 */
function sgConnectDB(){
    if($_SERVER['HTTP_HOST'] == 'movie.ranii.pro'){
        $host = 'mariaDB';
        $user = '';
        $passw = '';
        $db = '';
    } else {
        /*
         * Completar con la URL del lab
         */
        if($_SERVER['HTTP_POST'] == 'labit601.upct.es/') {
            $host = '';
            $user = '';
            $passw = '';
            $db = '';
        } else {
            $host = '';
            $user = '';
            $passw = '';
            $db = '';
        }
    }

    $connect = mysqli_connect($host, $user, $passw, $db);
    if(mysqli_connect_errno()) {
        printf("Connection failed: %s\n", mysqli_connect_error());
        exit();
    }
    $connect->set_charset("utf8mb4_unicode_ci");
    /* Print char set*/

    return $connect;
}

/**
 * @param $user
 * @param $passwd_crypt
 */
function sgLogin($user, $passwd_crypt){
    $connect = sgConnectDB();
    $query = "SELECT id FROM members WHERE user='$user' and passwd='$passwd_crypt'";
    $result = $connect->query($query);

    if($result->num_rows==0){
        /*
         * Codigo de error
         */
        $return = '';
    } else {
        while($row=$result->fetch_assoc()){
            $return = $row;
        }
    }

    mysqli_close($connect);
    return $return;
}


function sgRegister($user,$passwd,$mail){
    $connect = sgConnectDB();
    $query = "INSERT INTO members (member_name, passwd, email_address, real_name, is_activated, lgnfile, date_registered) values ('$nick', '$pw', '$mail','$nick','1','spanish_es')";
    $result = $connect->query($query);

    /* Devolvemos el uuid del user*/
    if($result){
        $query = "SELECT id FROM members WHERE nick='$nick'";
        $result = $connect->query($query);
        while($row=$result->fetch_assoc()){
            $return = $row['id'];
        }
    } else {
        /*
         * Codigo de error
         */
        $return = "";
    }

    mysqli_close($connect);
    return $connect;
}

/*
 * Comprobamos si existe el usuario
 */
function sgExists($id){
    $connect = sgConnectDB();
    $query = "SELECT * FROM USERS WHERE UUID='$id'";
    $result = $connect->query($query);
    if($result->num_rows==0){
        $return = 'OK!';
    } else {
        $return = 'KO:(';
    }

    return $return;
}

?>