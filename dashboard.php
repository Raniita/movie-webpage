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

    $numMovies = smGetNumberMovies();
    $pagRows = 4;
    $moviesPerRow = 4;
    $numPag = ceil(($pagRows * $moviesPerRow) / $numMovies);

    if (isset($_GET['pag'])) {
        $pag = pgSecureCheck($_GET['pag']);
    } else {
        $pag = 1;
    }

?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta charset="utf-8">
    <title>Dashboard - Tuxflix</title>
    <meta content="dashboard-tuxflix" name="description">
    <meta content="Ranii" name="author">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="img/tuxflix_logo.svg" rel="icon" type="svg+xml">

    <!-- my css -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="css/movie-card.css" rel="stylesheet">

    <!-- Boostrap 4 -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fontawesome -->
    <link href="css/all.min.css" rel="stylesheet">

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
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Hello, world!</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called a
                jumbotron and three supporting pieces of content. Use it as a starting point to create something more
                unique.</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
    </div>

    <div class="row" style="margin-right: 0px;margin-left: 0px;">

        <?php
        $movieList = smGetMovieListDefault();
        if ($pag == 1){
            $init = 0;
        } else {
            $init = ($pagRows*$moviesPerRow-1)*$pag;
        }
        $last = $init + ($pagRows*$moviesPerRow-1);
        $sliceMovieList = array_slice($movieList, $init, $last);

        foreach ($sliceMovieList as $idMovieList){
            echo pmGenerateMovieCard($idMovieList);
        }
        ?>

    </div><!--row-->

    <div class="row">
        <div class="pagination-box" style="text-align: center; margin=auto;">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">8</a></li>
                <li class="page-item"><a class="page-link" href="#">9</a></li>
                <li class="page-item"><a class="page-link" href="#">10</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </div>
    </div><!-- pagination box -->

</main>

<footer class="footer">
    <div class="sticky-footer text-center">
        <span class="text-muted">See you on my Github! <a href="#"><i class="fab fa-github"></i> Raniita</a></span>
    </div>
</footer>

<!-- SCRIPTS -->
<script src="js/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-3.3.1.min.js"><\/script>')</script>
<script src="js/bootstrap.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
