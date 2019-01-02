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
        return $return['title'];
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
        return $return['url_pic'];
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
        return $return[0];
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
        return $return[0];
    }

    function smGetMovieDescription($id){
        $connect = sgConnectDB();
        $query = "SELECT description FROM movie WHERE id='$id'";
        $result = $connect->query($query);

        if($result->num_rows==0){
            $return['description'] = ' ';
        } else {
            while($row = $result->fetch_assoc()){
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return['description'];
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
        return $return['date'];
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
        return $return[0];
    }
?>