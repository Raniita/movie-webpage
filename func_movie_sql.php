<?php
    function smGetMovieName($id) {
        $connect = sgConnectDB();
        $query = "SELECT title FROM movie WHERE id='$id'";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
            $return = 'KO';
        } else {
            while ($row = $result->fetch_assoc()) {
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return['title'];
    }

    function smGetMovieBackground($id) {
        $connect = sgConnectDB();
        $query = "SELECT url_pic FROM movie WHERE id='$id'";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
            $return = 'KO';
        } else {
            while ($row = $result->fetch_assoc()) {
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return['url_pic'];
    }

    function smGetMovieDescription($id) {
        $connect = sgConnectDB();
        $query = "SELECT description FROM movie WHERE id='$id'";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
            $return['description'] = ' ';
        } else {
            while ($row = $result->fetch_assoc()) {
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return['description'];
    }

    function smGetMovieDate($id) {
        $connect = sgConnectDB();
        $query = "SELECT date FROM movie WHERE id='$id'";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
            $return = 'KO';
        } else {
            while ($row = $result->fetch_assoc()) {
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return['date'];
    }

    function smGetMovieListDefault() {
        $connect = sgConnectDB();
        $query = "SELECT id FROM movie ORDER BY id";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
            $return = 'KO';
        } else {
            $return = array();
            while ($row = $result->fetch_assoc()) {
                $return[] = $row['id'];
            }
        }

        mysqli_close($connect);
        return $return;
    }

    function smGetMovieListRating() {
        $connect = sgConnectDB();
        $query = "SELECT id,avg_rate FROM (SELECT id_movie as id, avg(score) as avg_rate FROM user_score WHERE id_movie IN(SELECT id FROM movie)GROUP BY id_movie) AS avgTable1 ORDER BY avg_rate DESC";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
            $return = 'KO';
        } else {
            $return = array();
            while ($row = $result->fetch_assoc()) {
                $return[] = $row['id'];
            }
        }

        mysqli_close($connect);
        return $return;
    }

    function smGetMovieListName() {
        $connect = sgConnectDB();
        $query = "SELECT id FROM movie ORDER BY title";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
            $return = 'KO';
        } else {
            $return = array();
            while ($row = $result->fetch_assoc()) {
                $return[] = $row['id'];
            }
        }

        mysqli_close($connect);
        return $return;
    }

    /* ######################################################################### */
    /*                           Rating functions                                */
    /* ######################################################################### */

//TODO
    function smGetMovieStarRating($id) {
        $connect = sgConnectDB();
        $query = "SELECT url_pic FROM movie WHERE id='$id'";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
            $return = 'KO';
        } else {
            while ($row = $result->fetch_assoc()) {
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return[0];
    }

//TODO
    function smGetMovieNumRating($id) {
        $connect = sgConnectDB();
        $query = "SELECT url_pic FROM movie WHERE id='$id'";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
            $return = 'KO';
        } else {
            while ($row = $result->fetch_assoc()) {
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return[0];
    }

//TODO
    function smGetMovieRating($id) {
        $connect = sgConnectDB();
        $query = "SELECT url_pic FROM movie WHERE id='$id'";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
            $return = 'KO';
        } else {
            while ($row = $result->fetch_assoc()) {
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return[0];
    }

    function smGetNumberMovies() {
        $connect = sgConnectDB();
        $query = "SELECT count(id) FROM movie";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
            $return = 'KO';
        } else {
            while ($row = $result->fetch_assoc()) {
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return['count(id)'];
    }

    function smGetAvgRateMovie($id) {
        $connect = sgConnectDB();
        $query = "SELECT avg(score) FROM `user_score` WHERE id_movie='$id'";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
            $return = 'KO';
        } else {
            while ($row = $result->fetch_assoc()) {
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return['avg(score)'];
    }

    function smGetCountRate($id) {
        $connect = sgConnectDB();
        $query = "SELECT count(score) FROM `user_score` WHERE id_movie='$id'";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
            $return = 'KO';
        } else {
            while ($row = $result->fetch_assoc()) {
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return['count(score)'];
    }

    function smGetAvgRateAllMovies() {
        $connect = sgConnectDB();
        $query = "SELECT AVG(avgScore) FROM (SELECT AVG(score) AS avgScore FROM user_score WHERE id_movie IN(SELECT id FROM movie)GROUP BY id_movie) AS avgTable";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
            $return = 'KO';
        } else {
            while ($row = $result->fetch_assoc()) {
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return['AVG(avgScore)'];
    }

    function smGetMovieGenre($id) {
        $connect = sgConnectDB();
        $query = "SELECT name FROM genre WHERE id IN(SELECT genre FROM moviegenre WHERE movie_id='$id')";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
            $return = 'KO';
        } else {
            $return = array();
            while ($row = $result->fetch_assoc()) {
                $return[] = $row['name'];
            }
        }

        mysqli_close($connect);
        return $return;
    }

    function smCountAllMovieStars($id) {
        $connect = sgConnectDB();
        $query = "SELECT count(id_user) FROM user_score WHERE id_movie='$id'";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
            $return = 'KO';
        } else {
            while ($row = $result->fetch_assoc()) {
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return['count(id_user)'];
    }

    function smCountMovieStars($id, $star) {
        $connect = sgConnectDB();
        $query = "SELECT count(id_user) FROM user_score WHERE id_movie='$id' AND score='$star' ";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
            $return = 'KO';
        } else {
            while ($row = $result->fetch_assoc()) {
                $return = $row;
            }
        }

        mysqli_close($connect);
        return $return['count(id_user)'];
    }

    function smGetMovieComments($id) {
        $connect = sgConnectDB();
        $query = "SELECT user_id,short,comment,stars FROM moviecomments WHERE movie_id='$id' ";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
            $return = 'KO';
        } else {
            $return = array();
            while ($row = $result->fetch_array()) {
                $return[] = $row;
            }
        }

        mysqli_close($connect);
        return $return;
    }

    function smSubmitComment($idMovie, $idUser, $stars, $shortComment, $fullReview) {
        $connect = sgConnectDB();
        $query = "INSERT INTO moviecomments (movie_id, user_id, short, comment, stars) values ($idMovie, $idUser, '$shortComment', '$fullReview', $stars)";
        $result = $connect->query($query);

        if ($result) { //1 -> Query succ
            $date = date('Y-m-d h:i:s', time());
            //Add Star rate to user_score
            $query = "INSERT INTO user_score (id_user, id_movie, score, time) values ($idUser, $idMovie, $stars, '$date')";
            $result = $connect->query($query);

            if ($result) {
                $return = 'succ';
            } else {
                $return = 'KO-score';
            }
        } else {
            //Codigo error
            $return = "KO-comment";
        }

        mysqli_close($connect);
        return $return;
    }

    function smSearchMovie($input){
        $connect = sgConnectDB();
        $query = "SELECT title,id FROM movie WHERE title LIKE '%$input%' LIMIT 5";
        $result = $connect->query($query);

        if($result->num_rows==0){
            $return = 'KO';
        } else {
            $return = array();
            while ($row = $result->fetch_array()) {
                $return[] = $row;
            }
        }

        mysqli_close($connect);
        return $return;
    }

    function smGetRecommendations($idUser){
        $connect = sgConnectDB();
        $query = "SELECT movie_id,rec_score FROM recs WHERE user_id='$idUser' ORDER BY rec_score DESC LIMIT 10";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
            $return = 'KO';
        } else {
            $return = array();
            while ($row = $result->fetch_array()) {
                $return[] = $row;
            }
        }

        mysqli_close($connect);
        return $return;
    }

?>