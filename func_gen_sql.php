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

        if ($result->num_rows==0) {
            $return = 'KO!';
        } else {
            while ($row = $result->fetch_assoc()) {
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return;
    }

    function sgRegister($id, $user, $age, $gender, $occupation, $passwd) {
        echo 'id'.$id;
        echo 'user'.$user;
        echo 'age'.$age;
        echo 'gender'.$gender;
        echo 'occu'.$occupation;
        echo 'pass'.$passwd;

        $connect = sgConnectDB();
        $query = "INSERT INTO users (id, name, edad, sex, ocupacion, pic, passwd) values ($id, '$user', '$age','$gender','$occupation', '','$passwd')";
        $result = $connect->query($query);

        echo "result: ".$result;
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