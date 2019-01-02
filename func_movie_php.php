<?php

    function pmGenerateMovieCard($id) {
        $movieName = smGetMovieName($id);
        $movieBackground = smGetMovieBackground($id);
        $movieDescription = smGetMovieDescription($id);
        $movieDate = smGetMovieDate($id);
        $movieRate = pmBayesianRating($id);

        //Hack img incoming
        if (strlen($movieBackground) == 8) {
            //No tiene caratula
            $moviePoster = 'movie-images/default_movie.jpg';
        } else {
            //Si tiene caratula
            $moviePoster = 'movie-images/' . $movieBackground;
        }

        $return = "<div class=\"movie-card\">
            <div class=\"movie-header\"
                 style=\"background: url(" . $moviePoster . ");
                        background-size: cover;\">
                <div class=\"header-icon-container\">
                    <a href=\"#\">
                        <i class=\"fa fa-info header-icon\"></i>
                    </a>
                </div>
            </div><!--movie-header-->

            <div class=\"movie-content\">
                <div class=\"movie-content-header\">
                    <a href=\"#\">
                        <h3 class=\"movie-title\">" . $movieName . "</h3>
                    </a>
                    <div class=\"info-section\">
                        <span class=\"fa fa-star checked\"></span>
                        <span class=\"fa fa-star checked\"></span>
                        <span class=\"fa fa-star checked\"></span>
                        <span class=\"fa fa-star checked\"></span>
                        <span class=\"fa fa-star\"></span>
                        <span>".smGetCountRate($id)."</span>
                    </div>
                </div><!--movie-content-header-->

                <div class=\"movie-info\">
                    <div class=\"info-section\">
                        <label>Description</label>
                        <span class=\"text-justify\" style=\"font-size: 60%;\">" . $movieDescription . "</span>
                    </div>

                    <div class=\"info-section\">
                        <label>Date</label>
                        <span>" . $movieDate . "</span>
                    </div>

                    <div class=\"info-section\">
                        <label>Rating</label>
                        <span style=\"font-size: 70%;\">".$movieRate."</span>
                    </div>

                </div><!-- movie-info-->
            </div><!--movie-content-->
        </div><!--movie-card-->";

        return $return;
    }

    function pmBayesianRating($id){
        //Comprobamos si ya tenemos valores en la session.
        /*if(isset($_SESSION['numberMovie']) AND isset($_SESSION['avgAllMovie'])){
            //Recuperamos los valores;
            $numberMovies = $_SESSION['numberMovies'];
            $avgAllMovies = $_SESSION['avgAllMovies'];
        } else {
            //Guardamos en la session
            $_SESSION['numberMovie'] = smGetNumberMovies();
            $_SESSION['avgAllMovie'] = smGetAvgRateAllMovies();
            $numberMovies = $_SESSION['numberMovie'];
            $avgAllMovies = $_SESSION['avgAllMovie'];
        }*/

        $numberMovies = smGetNumberMovies();
        $avgAllMovies = smGetAvgRateAllMovies();
        $numberRateID = smGetCountRate($id);
        $avgRateID = smGetAvgRateMovie($id);

        $bayesian = ($numberMovies*$avgAllMovies + $numberRateID*$avgRateID)/($numberMovies + $numberRateID);

        return round($bayesian,2);
    }
?>