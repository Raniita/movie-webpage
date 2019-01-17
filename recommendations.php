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
            header('Location:dashboard.php');
        }
    }

?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta charset="utf-8">
    <title>Recommendations - Tuxflix</title>
    <meta content="Recommendations-tuxflix" name="description">
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
    <div class="row" style="margin-top: 10px;margin-right: 0px;margin-left: 0px;">
        <?php
            $movieList = smGetRecommendations($idUser);
            echo $movieList;
            print_r($movieList);
            //foreach ($movieList as $movie) {
                //echo pmGenerateMovieCardRecommendation($movie['movie_id'], $movie['rec_score']);
            //    echo $movie['rec_score'];
            //}
        ?>

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
<script src="js/ajax_search.js"></script>
<script src="js/main.js"></script>
</body>
</html>
