<?php
    require './secret.php';

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
            $return = 'KO!';
        } else {
            while ($row = $result->fetch_assoc()) {
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return;
    }

    function sgRegister($id, $user, $age, $gender, $occupation, $passwd, $pic) {
        $connect = sgConnectDB();
        $query = "INSERT INTO users (id, name, edad, sex, ocupacion, pic, passwd) values ($id, '$user', '$age','$gender','$occupation','$pic','$passwd')";
        $result = $connect->query($query);

        // Devolvemos el uuid del user
        if ($result) { //1 -> Query succ
            $query = "SELECT id FROM users WHERE id='$user'";
            $result = $connect->query($query);
            while ($row = $result->fetch_assoc()) {
                $return = $row;
            }
        } else {
            //Codigo error
            $return = "KO!";
        }

        mysqli_close($connect);
        return $return;
    }

    /*
     * Comprobamos si existe el ID
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

    function sgInfoUser($uuid) {
        $connect = sgConnectDB();
        $query = "SELECT name FROM users WHERE id='$uuid'";
        $result = $connect->query($query);
        if ($result->num_rows == 0) {
            $return = "KO";
        } else {
            $return = array();
            while ($row = $result->fetch_assoc()) {
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return;
    }

    function sgNameUser($id) {
        $connect = sgConnectDB();
        $query = "SELECT name FROM users WHERE id='$id'";
        $result = $connect->query($query);
        if ($result->num_rows == 0) {
            $return = "KO";
        } else {
            $return = array();
            while ($row = $result->fetch_assoc()) {
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return['name'];
    }

    function sgUserImg($id) {
        $connect = sgConnectDB();
        $query = "SELECT pic FROM users WHERE id='$id'";
        $result = $connect->query($query);
        if ($result->num_rows == 0) {
            $return = "KO";
        } else {
            $return = array();
            while ($row = $result->fetch_assoc()) {
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return['pic'];
    }

    function sgGetPasswd($idUser) {
        $connect = sgConnectDB();
        $query = "SELECT passwd FROM users WHERE id='$idUser'";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
            $return = "KO";
        } else {
            while ($row = $result->fetch_assoc()) {
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return;
    }

    function sgUpdateUserInfo($idUser, $age, $occupation, $passwd, $pic, $sex) {
        $connect = sgConnectDB();
        $query = "UPDATE users SET edad=$age,ocupacion='$occupation',passwd='$passwd',pic='$pic',sex='$sex' WHERE id='$idUser'";
        $result = $connect->query($query);

        if ($result) {
            $return = 'OK';
        } else {
            $return = 'KO';
        }

        mysqli_close($connect);
        return $return;
    }

?>
