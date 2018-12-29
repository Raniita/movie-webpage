<?php
    require $_SERVER['DOCUMENT_ROOT'].'/secret.php';

    /**
     * Funcion SQL para login en la app
     * @param $user --> Usuario que accede
     * @param $passwd_crypt --> Passwd encriptada
     * @return array|string|null --> Devolvemos el id logeado
     */
    function sgLogin($user, $passwd_crypt) {
        $connect = sgConnectDB();
        $query = "SELECT id FROM users WHERE name='$user' and passwd='$passwd_crypt'";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
            echo 'error login';
            $return = 'KO!';
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
        $query = "INSERT INTO users (id, name, edad, sex, ocupacion, pic, passwd) values ('$nick', '$pw', '$mail','$nick','1','spanish_es')";
        $result = $connect->query($query);

        /* Devolvemos el uuid del user*/
        if ($result) {
            $query = "SELECT id FROM users WHERE id='$nick'";
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
        $query = "SELECT * FROM users WHERE id='$id'";
        $result = $connect->query($query);
        if ($result->num_rows == 0) {
            $return = 'KO';
        } else {
            $return = 'OK!';
        }

        mysqli_close($connect);
        return $return;
    }

    function sgInfoUser($uuid){
        $connect = sgConnectDB();
        $query = "SELECT name FROM users WHERE id='$uuid'";
        $result = $connect->query($query);
        if($result->num_rows == 0){
            $return = "KO";
        } else {
            $return = array();
            while($row = $result->fetch_assoc()){
                $return= $row;
            }
        }

        mysqli_close($connect);
        return $return;
    }

?>