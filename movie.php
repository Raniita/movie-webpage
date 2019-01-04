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
        $movieDecoded = pgEncodeDecode($_GET['movie'],0);
        $movieSecure = pgSecureCheck($movieDecoded);
        $idMovie = substr($movieDecoded, 0, -5);
    }
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title><?php echo smGetMovieName($idMovie);?> - Tuxflix</title>
    <meta name="description" content="<?php echo smGetMovieName($idMovie);?> - Tuxflix">
    <meta name="author" content="Ranii">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="svg+xml" href="img/tuxflix_logo.svg">

    <!-- my css -->
    <link rel="stylesheet" href="css/dashboard.css">
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
    <div class="row">
        <p>
            <?php
                echo "movieId".$idMovie;
            ?>
        </p>
    </div>
</main>


<!-- SCRIPTS -->
<script src="js/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-3.3.1.min.js"><\/script>')</script>
<script src="js/bootstrap.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>


