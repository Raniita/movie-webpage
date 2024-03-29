<?php

    function pmGenerateMovieCard($id) {
        $movieName = smGetMovieName($id);
        $movieBackground = smGetMovieBackground($id);
        $movieDescription = smGetMovieDescription($id);
        $movieDate = smGetMovieDate($id);
        $movieRate = pmBayesianRating($id);
        $movieAvgRate = smGetAvgRateMovie($id);

        //creamos el link
        $movieLink = 'movie.php?movie=' . pgEncodeDecode($id . 'movie', 1);

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
                    <a href=\"" . $movieLink . "\">
                        <i class=\"fa fa-info header-icon\"></i>
                    </a>
                </div>
            </div><!--movie-header-->

            <div class=\"movie-content\">
                <div class=\"movie-content-header\">
                    <a href=\"" . $movieLink . "\">
                        <h3 class=\"movie-title\">" . pmSubStrYear($movieName) . "</h3>
                    </a>
                    <div class=\"info-section\">
                        " . pmGenerateStarRating($movieRate) . "
                        <span>" . smGetCountRate($id) . "</span>
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
                        <span style=\"font-size: 70%;\">" . $movieRate . "</span>
                    </div>

                    <div class=\"info-section\">
                        <label>Avg</label>
                        <span style=\"font-size: 70%;\">" . round($movieAvgRate, 2) . "</span>
                    </div>
                    
                </div><!-- movie-info-->
            </div><!--movie-content-->
        </div><!--movie-card-->";

        return $return;
    }

    function pmBayesianRating($id) {
        $numberMovies = smGetNumberMovies();
        $avgAllMovies = smGetAvgRateAllMovies();
        $numberRateID = smGetCountRate($id);
        $avgRateID = smGetAvgRateMovie($id);

        $bayesian = ($numberMovies * $avgAllMovies + $numberRateID * $avgRateID) / ($numberMovies + $numberRateID);

        return round($bayesian, 2);
    }

    function pmGenerateStarRating($rating) {
        $starts = round($rating);
        $return = '';

        switch ($starts) {
            case 0:
                $return = "<span class=\"fa fa-star\"></span>
                        <span class=\"fa fa-star\"></span>
                        <span class=\"fa fa-star\"></span>
                        <span class=\"fa fa-star\"></span>
                        <span class=\"fa fa-star\"></span>";
                break;
            case 1:
                $return = "<span class=\"fa fa-star checked\"></span>
                        <span class=\"fa fa-star\"></span>
                        <span class=\"fa fa-star\"></span>
                        <span class=\"fa fa-star\"></span>
                        <span class=\"fa fa-star\"></span>";
                break;
            case 2:
                $return = "<span class=\"fa fa-star checked\"></span>
                        <span class=\"fa fa-star checked\"></span>
                        <span class=\"fa fa-star\"></span>
                        <span class=\"fa fa-star\"></span>
                        <span class=\"fa fa-star\"></span>";
                break;
            case 3:
                $return = "<span class=\"fa fa-star checked\"></span>
                        <span class=\"fa fa-star checked\"></span>
                        <span class=\"fa fa-star checked\"></span>
                        <span class=\"fa fa-star\"></span>
                        <span class=\"fa fa-star\"></span>";
                break;
            case 4:
                $return = "<span class=\"fa fa-star checked\"></span>
                        <span class=\"fa fa-star checked\"></span>
                        <span class=\"fa fa-star checked\"></span>
                        <span class=\"fa fa-star checked\"></span>
                        <span class=\"fa fa-star\"></span>";
                break;
            case 5:
                $return = "<span class=\"fa fa-star checked\"></span>
                        <span class=\"fa fa-star checked\"></span>
                        <span class=\"fa fa-star checked\"></span>
                        <span class=\"fa fa-star checked\"></span>
                        <span class=\"fa fa-star checked\"></span>";
                break;
        }

        return $return;
    }

    function pmGenerateMovieStarRating($rating) {
        $starts = round($rating);
        $return = '';

        switch ($starts) {
            case 0:
                $return = "<button type=\"button\" class=\"btn btn-default btn-grey btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>
                           <button type=\"button\" class=\"btn btn-default btn-grey btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                            </button>
                           <button type=\"button\" class=\"btn btn-default btn-grey btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>
                           <button type=\"button\" class=\"btn btn-default btn-grey btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>
                           <button type=\"button\" class=\"btn btn-default btn-grey btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>";
                break;
            case 1:
                $return = "<button type=\"button\" class=\"btn btn-warning btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>
                           <button type=\"button\" class=\"btn btn-default btn-grey btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                            </button>
                           <button type=\"button\" class=\"btn btn-default btn-grey btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>
                           <button type=\"button\" class=\"btn btn-default btn-grey btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>
                           <button type=\"button\" class=\"btn btn-default btn-grey btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>";
                break;
            case 2:
                $return = "<button type=\"button\" class=\"btn btn-warning btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>
                           <button type=\"button\" class=\"btn btn-warning btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                            </button>
                           <button type=\"button\" class=\"btn btn-default btn-grey btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>
                           <button type=\"button\" class=\"btn btn-default btn-grey btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>
                           <button type=\"button\" class=\"btn btn-default btn-grey btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>";
                break;
            case 3:
                $return = "<button type=\"button\" class=\"btn btn-warning btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>
                           <button type=\"button\" class=\"btn btn-warning btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                            </button>
                           <button type=\"button\" class=\"btn btn-warning btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>
                           <button type=\"button\" class=\"btn btn-default btn-grey btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>
                           <button type=\"button\" class=\"btn btn-default btn-grey btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>";
                break;
            case 4:
                $return = "<button type=\"button\" class=\"btn btn-warning btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>
                           <button type=\"button\" class=\"btn btn-warning btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                            </button>
                           <button type=\"button\" class=\"btn btn-warning btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>
                           <button type=\"button\" class=\"btn btn-warning btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>
                           <button type=\"button\" class=\"btn btn-default btn-grey btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>";
                break;
            case 5:
                $return = "<button type=\"button\" class=\"btn btn-warning btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>
                           <button type=\"button\" class=\"btn btn-warning btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                            </button>
                           <button type=\"button\" class=\"btn btn-warning btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>
                           <button type=\"button\" class=\"btn btn-warning btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>
                           <button type=\"button\" class=\"btn btn-warning btn-sm\" aria-label=\"Left Align\">
                              <span class=\"fas fa-star\" aria-hidden=\"true\"></span>
                           </button>";
                break;
        }

        return $return;
    }

    function pmSubStrYear($title) {
        $newMovieName = substr($title, 0, -6);
        return $newMovieName;
    }

    function pmGenerateComment($user, $short, $comment, $stars) {
        $userImg = pgGetUserImg($user);
        $return = '';
        $return = "<div class=\"row\">
                        <div class=\"col-sm-3\">
                            <img src=\"" . $userImg . "\" alt=\"\" class=\"img-rounded\" width=\"60\" height=\"60\">
                            <div class=\"review-block-name\">" . sgNameUser($user) . "</div>
                        </div>
                        <div class=\"col-sm-9\">
                            <div class=\"review-block-rate\">". pmGenerateMovieStarRating($stars) ."</div>
                            <div class=\"review-block-title\">" . $short . "</div>
                            <div class=\"review-block-description\">" . $comment . "</div>
                        </div>
                    </div> <hr/>";

        return $return;
    }

    function pmGenerateMovieCardRecommendation($idMovie, $stars, $time) {
        $movieName = smGetMovieName($idMovie);
        $movieBackground = smGetMovieBackground($idMovie);
        $movieDescription = smGetMovieDescription($idMovie);

        $movieDate = smGetMovieDate($idMovie);
        $movieRate = pmBayesianRating($idMovie);
        $movieAvgRate = smGetAvgRateMovie($idMovie);

        //creamos el link
        $movieLink = 'movie.php?movie=' . pgEncodeDecode($idMovie . 'movie', 1);

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
                    <a href=\"" . $movieLink . "\">
                        <i class=\"fa fa-info header-icon\"></i>
                    </a>
                </div>
            </div><!--movie-header-->

            <div class=\"movie-content\">
                <div class=\"movie-content-header\">
                    <a href=\"" . $movieLink . "\">
                        <h3 class=\"movie-title\">" . pmSubStrYear($movieName) . "</h3>
                    </a>
                    <div class=\"info-section\">
                        " . pmGenerateStarRating($movieRate) . "
                        <span>" . smGetCountRate($idMovie) . "</span>
                    </div>
                </div><!--movie-content-header-->

                <div class=\"movie-info\">
                    <div class=\"info-section\">
                        <label>Description</label>
                        <span class=\"text-justify\" style=\"font-size: 60%;\">" . $movieDescription . "</span>
                    </div>

                    <div class=\"info-section\">
                        <label>Recommendation Score</label>
                        <span style=\"font-size: 70%;\">" . round($stars, 2) . "</span>
                    </div>
                    
                    <div class=\"info-section\">
                        <label>Created</label>
                        <span style=\"font-size: 70%;\">" . $time . "</span>
                    </div>
                    
                </div><!-- movie-info-->
            </div><!--movie-content-->
        </div><!--movie-card-->";

        return $return;
    }

?>