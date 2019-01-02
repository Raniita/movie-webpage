<?php
    function smGetMovieName($id){
        $connect = sgConnectDB();
        $query = "SELECT title FROM movie WHERE id='$id'";
        $result = $connect->query($query);

        if($result->num_rows==0){
            $return = 'KO';
        } else {
            while ($row = $result->fetch_assoc()){
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return;
    }

    function smGetMovieBackground($id){
        $connect = sgConnectDB();
        $query = "SELECT url_pic FROM movie WHERE id='$id'";
        $result = $connect->query($query);

        if($result->num_rows==0){
            $return = 'KO';
        } else {
            while($row = $result->fetch_assoc()){
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return;
    }

    //TODO
    function smGetMovieStarRating($id){
        $connect = sgConnectDB();
        $query = "SELECT url_pic FROM movie WHERE id='$id'";
        $result = $connect->query($query);

        if($result->num_rows==0){
            $return = 'KO';
        } else {
            while($row = $result->fetch_assoc()){
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return;
    }

    //TODO
    function smGetMovieNumRating($id){
        $connect = sgConnectDB();
        $query = "SELECT url_pic FROM movie WHERE id='$id'";
        $result = $connect->query($query);

        if($result->num_rows==0){
            $return = 'KO';
        } else {
            while($row = $result->fetch_assoc()){
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return;
    }

    function smGetMovieDescription($id){
        $connect = sgConnectDB();
        $query = "SELECT desc FROM movie WHERE id='$id'";
        $result = $connect->query($query);

        if($result->num_rows==0){
            $return = 'KO';
        } else {
            while($row = $result->fetch_assoc()){
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return;
    }

    function smGetMovieDate($id){
        $connect = sgConnectDB();
        $query = "SELECT date FROM movie WHERE id='$id'";
        $result = $connect->query($query);

        if($result->num_rows==0){
            $return = 'KO';
        } else {
            while($row = $result->fetch_assoc()){
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return;
    }

    //TODO
    function smGetMovieRating($id){
        $connect = sgConnectDB();
        $query = "SELECT url_pic FROM movie WHERE id='$id'";
        $result = $connect->query($query);

        if($result->num_rows==0){
            $return = 'KO';
        } else {
            while($row = $result->fetch_assoc()){
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return;
    }
?>