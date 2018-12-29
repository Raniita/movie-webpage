<?php
    require 'secret.php';

    function sgLogin($user, $passwd_crypt) {
        $connect = sgConnectDB();
        $query = "SELECT id FROM members WHERE user='$user' and passwd='$passwd_crypt'";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
            /*
             * Codigo de error
             */
            $return = '';
        } else {
            while ($row = $result->fetch_assoc()) {
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return;
    }


    function sgRegister($user, $passwd, $mail) {
        $connect = sgConnectDB();
        $query = "INSERT INTO members (member_name, passwd, email_address, real_name, is_activated, lgnfile, date_registered) values ('$nick', '$pw', '$mail','$nick','1','spanish_es')";
        $result = $connect->query($query);

        /* Devolvemos el uuid del user*/
        if ($result) {
            $query = "SELECT id FROM members WHERE nick='$nick'";
            $result = $connect->query($query);
            while ($row = $result->fetch_assoc()) {
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
    function sgExists($id) {
        $connect = sgConnectDB();
        $query = "SELECT * FROM USERS WHERE UUID='$id'";
        $result = $connect->query($query);
        if ($result->num_rows == 0) {
            $return = 'OK!';
        } else {
            $return = 'KO:(';
        }

        return $return;
    }

?>