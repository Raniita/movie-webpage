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

    /* ######################################################################### */
    /*                           Rating functions                                */
    /* ######################################################################### */

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

    function smGetNumberMovies(){
        $connect = sgConnectDB();
        $query = "SELECT count(id) FROM movie";
        $result = $connect->query($query);

        if($result->num_rows==0){
            $return = 'KO';
        } else{
            while($row = $result->fetch_assoc()){
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return['count(id)'];
    }

    function smGetAvgRateMovie($id){
        $connect = sgConnectDB();
        $query = "SELECT avg(score) FROM `user_score` WHERE id_movie='$id'";
        $result = $connect->query($query);

        if($result->num_rows==0){
            $return = 'KO';
        } else {
            while($row = $result->fetch_assoc()){
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return['avg(score)'];
    }

    function smGetCountRate($id){
        $connect = sgConnectDB();
        $query = "SELECT count(score) FROM `user_score` WHERE id_movie='$id'";
        $result = $connect->query($query);

        if($result->num_rows==0){
            $return = 'KO';
        } else {
            while($row = $result->fetch_assoc()){
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return['count(score)'];
    }

    function smGetAvgRateAllMovies(){
        $connect = sgConnectDB();
        $query = "SELECT AVG(avgScore) FROM (SELECT AVG(score) AS avgScore FROM user_score WHERE id_movie IN(SELECT id FROM movie)GROUP BY id_movie) AS avgTable";
        $result = $connect->query($query);

        if($result->num_rows==0){
            $return = 'KO';
        } else {
            while($row = $result->fetch_assoc()){
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return['AVG(avgScore)'];
    }

?>