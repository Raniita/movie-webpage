<?php
session_start();
include('func_gen_php.php');
include('func_gen_sql.php');
include('func_movie_php.php');
include('func_movie_sql.php');

$state = '';
if (isset($_GET['logout'])) {
    header('Location:login.php?logout');
} else {
    $state = pgCheckSession();
    if ($state == 'OK!') {
        $logged = true;
        $idUser = $_SESSION['id'];
        $nameUser = $_SESSION['name'];
    } else {
        $logged = false;
    }
}

if (isset($_GET['movie'])) {
    $movieDecoded = pgEncodeDecode($_GET['movie'], 0);
    $movieSecure = pgSecureCheck($movieDecoded);
    $idMovie = substr($movieDecoded, 0, -5);
}

if (isset($_POST['comment'])) {

}

?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title><?php echo smGetMovieName($idMovie); ?> - Tuxflix</title>
    <meta name="description" content="<?php echo smGetMovieName($idMovie); ?> - Tuxflix">
    <meta name="author" content="Ranii">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="svg+xml" href="img/tuxflix_logo.svg">

    <!-- my css -->
    <link href="css/movie.css" rel="stylesheet">
    <link href="css/movie-card.css" rel="stylesheet">

    <!-- Boostrap 4 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="css/all.min.css">

    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?php
echo pgShowNavbar($logged, $idUser, $nameUser);
?>

<main role="main">
    <div class="container" style="margin-top: 30px;">
        <div class="row">
            <div class="col-3">
                <?php
                $movieName = pmSubStrYear(smGetMovieName($idMovie));
                $movieBackground = smGetMovieBackground($idMovie);
                if (strlen($movieBackground) == 8) {
                    //No tiene caratula
                    $moviePoster = 'movie-images/default_movie.jpg';
                } else {
                    //Si tiene caratula
                    $moviePoster = 'movie-images/' . $movieBackground;
                }
                ?>
                <img src="<?php echo $moviePoster ?>"
                     class="img-thumbnail" alt="<?php echo $movieName ?>">
            </div>
            <div class="col-9">
                <h3><?php echo $movieName ?></h3>

                <hr>

                <div class="info-movie">
                    <label>Description</label><br>
                    <span class="text-justify"
                          style="display: inline-block"><?php echo smGetMovieDescription($idMovie) ?></span>
                </div>

                <div class="info-movie">
                    <label>Date</label><br>
                    <span class="text-justify"><?php echo smGetMovieDate($idMovie) ?></span>
                </div>

                <div class="info-movie">
                    <label>Ponderate Rate</label><br>
                    <span class="text-justify"><?php echo pmBayesianRating($idMovie) ?></span>
                </div>

                <div class="info-movie">
                    <label>Genre</label><br>
                    <span class="tag-links">
                        <?php
                        $movieGenre = smGetMovieGenre($idMovie);
                        foreach ($movieGenre as $genre) {
                            echo "<a href='#' rel='tag'>" . $genre . "</a>";
                        }
                        ?>
                    </span>
                </div>

            </div>
        </div>
    </div>

    <div class="container" style="margin-top: auto;">
        <hr>
    </div>

    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-sm-3">
                <div class="rating-block">
                    <h4>Average user rating</h4>
                    <h2 class="bold padding-bottom-7"><?php echo round(smGetAvgRateMovie($idMovie), 2) ?>
                        <small>/ 5</small>
                    </h2>

                    <?php
                    echo pmGenerateMovieStarRating(smGetAvgRateMovie($idMovie));
                    ?>

                </div>
            </div>

            <div class="col-sm-3">
                <h4>Rating breakdown</h4>

                <div class="float-left">
                    <div class="float-left" style="width:35px; line-height:1;">
                        <div style="height:9px; margin:5px 0;">5 <span class="fas fa-star"></span></div>
                    </div>
                    <div class="float-left" style="width:180px;">
                        <div class="progress" style="height:9px; margin:8px 0;">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="5" aria-valuemin="0"
                                 aria-valuemax="5" style="width: 1000%">
                                <span class="sr-only">80% Complete (danger)</span>
                            </div>
                        </div>
                    </div>
                    <div class="float-right" style="margin-left:10px;">1</div>
                </div>

                <div class="float-left">
                    <div class="float-left" style="width:35px; line-height:1;">
                        <div style="height:9px; margin:5px 0;">4 <span class="fas fa-star"></span></div>
                    </div>
                    <div class="float-left" style="width:180px;">
                        <div class="progress" style="height:9px; margin:8px 0;">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0"
                                 aria-valuemax="5" style="width: 80%">
                                <span class="sr-only">80% Complete (danger)</span>
                            </div>
                        </div>
                    </div>
                    <div class="float-right" style="margin-left:10px;">1</div>
                </div>

                <div class="float-left">
                    <div class="float-left" style="width:35px; line-height:1;">
                        <div style="height:9px; margin:5px 0;">3 <span class="fas fa-star"></span></div>
                    </div>
                    <div class="float-left" style="width:180px;">
                        <div class="progress" style="height:9px; margin:8px 0;">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="3" aria-valuemin="0"
                                 aria-valuemax="5" style="width: 60%">
                                <span class="sr-only">80% Complete (danger)</span>
                            </div>
                        </div>
                    </div>
                    <div class="float-right" style="margin-left:10px;">0</div>
                </div>

                <div class="float-left">
                    <div class="float-left" style="width:35px; line-height:1;">
                        <div style="height:9px; margin:5px 0;">2 <span class="fas fa-star"></span></div>
                    </div>
                    <div class="float-left" style="width:180px;">
                        <div class="progress" style="height:9px; margin:8px 0;">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0"
                                 aria-valuemax="5" style="width: 40%">
                                <span class="sr-only">80% Complete (danger)</span>
                            </div>
                        </div>
                    </div>
                    <div class="float-right" style="margin-left:10px;">0</div>
                </div>

                <div class="float-left">
                    <div class="float-left" style="width:35px; line-height:1;">
                        <div style="height:9px; margin:5px 0;">1 <span class="fas fa-star"></span></div>
                    </div>
                    <div class="float-left" style="width:180px;">
                        <div class="progress" style="height:9px; margin:8px 0;">
                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0"
                                 aria-valuemax="5" style="width: 20%">
                                <span class="sr-only">80% Complete (danger)</span>
                            </div>
                        </div>
                    </div>
                    <div class="float-right" style="margin-left:10px;">0</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-7">
                <hr/>
                <div class="review-block">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
                            <div class="review-block-name"><a href="#">nktailor</a></div>
                            <div class="review-block-date">January 29, 2016<br/>1 day ago</div>
                        </div>
                        <div class="col-sm-9">
                            <div class="review-block-rate">
                                <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                    <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                    <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                    <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                    <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                    <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="review-block-title">this was nice in buy</div>
                            <div class="review-block-description">this was nice in buy. this was nice in buy. this was
                                nice in buy. this was nice in buy this was nice in buy this was nice in buy this was
                                nice in buy this was nice in buy
                            </div>
                        </div>
                    </div>

                    <hr/>

                    <div class="row">
                        <div class="col-sm-3">
                            <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
                            <div class="review-block-name"><a href="#">nktailor</a></div>
                            <div class="review-block-date">January 29, 2016<br/>1 day ago</div>
                        </div>
                        <div class="col-sm-9">
                            <div class="review-block-rate">
                                <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                    <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                    <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                    <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                    <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                    <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="review-block-title">this was nice in buy</div>
                            <div class="review-block-description">this was nice in buy. this was nice in buy. this was
                                nice in buy. this was nice in buy this was nice in buy this was nice in buy this was
                                nice in buy this was nice in buy
                            </div>
                        </div>
                    </div>

                    <hr/>

                    <div class="row">
                        <div class="col-sm-3">
                            <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
                            <div class="review-block-name"><a href="#">nktailor</a></div>
                            <div class="review-block-date">January 29, 2016<br/>1 day ago</div>
                        </div>
                        <div class="col-sm-9">
                            <div class="review-block-rate">
                                <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                    <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                    <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                    <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                    <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                    <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="review-block-title">this was nice in buy</div>
                            <div class="review-block-description">this was nice in buy. this was nice in buy. this was
                                nice in buy. this was nice in buy this was nice in buy this was nice in buy this was
                                nice in buy this was nice in buy
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: auto;">
        <hr>
    </div>

    <div class="container" style="margin-top: auto;margin-bottom: 10px;">
        <h4 style="margin-bottom: 10px;">Review this title</h4>
        <form>
            <div class="form-group">
                <label for="exampleFormControlSelect1"><i class="fas fa-star"></i> Give stars</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1"><i class="fas fa-pen"></i> Short comment</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea2"><i class="fas fa-edit"></i> Write full review</label>
                <textarea class="form-control" id="exampleFormControlTextarea2" rows="3"></textarea>
            </div>
            <div class="text-center">
                <button class="btn btn-secondary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</main>

<?php
echo pgShowFooter();
?>

<!-- SCRIPTS -->
<script src="js/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-3.3.1.min.js"><\/script>')</script>
<script src="js/bootstrap.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>


