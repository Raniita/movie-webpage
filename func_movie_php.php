<?php

    function pmGenerateMovieCard($id) {

        //GetMovieName
        //GetMovieBackground
        //GetMovieStarRating
        //GetMovieNumRating
        //GetMovieDescription
        //GetMovieDate
        //GetMovieRating

        $return = "<div class=\"movie-card\">
            <div class=\"movie-header\"
                 style=\"background: url(http://henrycavill.org/images/Films/2013-Man-of-Steel/posters/3-Walmart-Superman-a.jpg);
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
                        <h3 class=\"movie-title\">Man of Steel</h3>
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
                        <span class=\"text-justify\" style=\"font-size: 60%;\">A cowboy doll is profoundly threatened and jealous when a new spaceman figure supplants him as top toy in a boy's room.</span>
                    </div>

                    <div class=\"info-section\">
                        <label>Date</label>
                        <span>1995-01-01</span>
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