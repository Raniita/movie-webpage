<?php

    function pmGenerateMovieCard($id) {
        $movieName = smGetMovieName($id);
        $movieBackground = "movie-images/".smGetMovieBackground($id);
        $movieDescription = smGetMovieDescription($id);
        $movieDate = smGetMovieDate($id);

        //GetMovieName
        //GetMovieBackground
        //GetMovieStarRating
        //GetMovieNumRating
        //GetMovieDescription
        //GetMovieDate
        //GetMovieRating

        $return = "<div class=\"movie-card\">
            <div class=\"movie-header\"
                 style=\"background: url(".$movieBackground.");
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
                        <h3 class=\"movie-title\">".$movieName."</h3>
                    </a>
                    <div class=\"info-section\">
                        <span class=\"fa fa-star checked\"></span>
                        <span class=\"fa fa-star checked\"></span>
                        <span class=\"fa fa-star checked\"></span>
                        <span class=\"fa fa-star checked\"></span>
                        <span class=\"fa fa-star\"></span>
                        <span> (30)</span>
                    </div>
                </div><!--movie-content-header-->

                <div class=\"movie-info\">
                    <div class=\"info-section\">
                        <label>Description</label>
                        <span class=\"text-justify\" style=\"font-size: 60%;\">".$movieDescription."</span>
                    </div>

                    <div class=\"info-section\">
                        <label>Date</label>
                        <span>".$movieDate."</span>
                    </div>

                    <div class=\"info-section\">
                        <label>Rating</label>
                        <span style=\"font-size: 70%;\">4.1</span>
                    </div>

                </div><!-- movie-info-->
            </div><!--movie-content-->
        </div><!--movie-card-->";

        return $return;
    }

?>