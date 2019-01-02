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
            $id = $_SESSION['id'];
            $name = $_SESSION['name'];
        } else {
            $logged = false;
        }
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

<nav class="navbar navbar-expand-md navbar-light fixed-top bg-white ">
    <a class="navbar-brand navbar-tuxflix" href="dashboard.php"><img alt="tuxflix" class="d-inline-block align-top"
                                                                     height="45" src="img/tuxflix_logo+text.svg"
                                                                     width="120"></a>

    <button aria-controls="navbarsLinks" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"
            data-target="#navbarsLinks" data-toggle="collapse" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="left-navbar">
        <?php
            if ($logged == true) {
                echo pgShowUserBar($id, $name);
            } else {
                echo pgShowButtonsNavbar();
            }
        ?>
    </div>

    <!-- NavBar Links -->
    <div class="collapse navbar-collapse" id="navbarsLinks">
        <ul class="navbar-nav ml-auto navbar-links">
            <li class="nav-item active">
                <a class="nav-link" href="#"><b>Home</b> <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Link 2</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Link 3</a>
            </li>
        </ul>

        <form class="form-inline md-form form-sm">
            <input aria-label="Search" class="form-control form-control-sm mr-3 w-75" placeholder="Search" type="text">
            <i aria-hidden="true" class="fas fa-search"></i>
        </form>

    </div>
</nav>

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
            echo pmGenerateMovieCard(1);
        ?>

        <div class="movie-card">
            <div class="movie-header"
                 style="background: url(http://henrycavill.org/images/Films/2013-Man-of-Steel/posters/3-Walmart-Superman-a.jpg);
                        background-size: cover;">
                <div class="header-icon-container">
                    <a href="#">
                        <i class="fa fa-info header-icon"></i>
                    </a>
                </div>
            </div><!--movie-header-->

            <div class="movie-content">
                <div class="movie-content-header">
                    <a href="#">
                        <h3 class="movie-title">Man of Steel</h3>
                    </a>
                    <div class="info-section">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span> (30)</span>
                    </div>
                </div><!--movie-content-header-->

                <div class="movie-info">
                    <div class="info-section">
                        <label>Description</label>
                        <span class="text-justify" style="font-size: 60%;">A cowboy doll is profoundly threatened and jealous when a new spaceman figure supplants him as top toy in a boy's room.</span>
                    </div>

                    <div class="info-section">
                        <label>Date</label>
                        <span>1995-01-01</span>
                    </div>

                    <div class="info-section">
                        <label>Rating</label>
                        <span style="font-size: 70%;">4.1</span>
                    </div>

                </div><!-- movie-info-->
            </div><!--movie-content-->
        </div><!--movie-card-->

        <div class="movie-card">
            <div class="movie-header"
                 style="background: url(http://henrycavill.org/images/Films/2013-Man-of-Steel/posters/3-Walmart-Superman-a.jpg);
                        background-size: cover;">
                <div class="header-icon-container">
                    <a href="#">
                        <i class="fa fa-info header-icon"></i>
                    </a>
                </div>
            </div><!--movie-header-->

            <div class="movie-content">
                <div class="movie-content-header">
                    <a href="#">
                        <h3 class="movie-title">Man of Steel</h3>
                    </a>
                    <div class="info-section">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span> (30)</span>
                    </div>
                </div><!--movie-content-header-->

                <div class="movie-info">
                    <div class="info-section">
                        <label>Description</label>
                        <span class="text-justify" style="font-size: 60%;">A cowboy doll is profoundly threatened and jealous when a new spaceman figure supplants him as top toy in a boy's room.</span>
                    </div>

                    <div class="info-section">
                        <label>Date</label>
                        <span>1995-01-01</span>
                    </div>

                    <div class="info-section">
                        <label>Rating</label>
                        <span style="font-size: 70%;">4.1</span>
                    </div>

                </div><!-- movie-info-->
            </div><!--movie-content-->
        </div><!--movie-card-->

        <div class="movie-card">
            <div class="movie-header"
                 style="background: url(http://henrycavill.org/images/Films/2013-Man-of-Steel/posters/3-Walmart-Superman-a.jpg);
                        background-size: cover;">
                <div class="header-icon-container">
                    <a href="#">
                        <i class="fa fa-info header-icon"></i>
                    </a>
                </div>
            </div><!--movie-header-->

            <div class="movie-content">
                <div class="movie-content-header">
                    <a href="#">
                        <h3 class="movie-title">Man of Steel</h3>
                    </a>
                    <div class="info-section">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span> (30)</span>
                    </div>
                </div><!--movie-content-header-->

                <div class="movie-info">
                    <div class="info-section">
                        <label>Description</label>
                        <span class="text-justify" style="font-size: 60%;">A cowboy doll is profoundly threatened and jealous when a new spaceman figure supplants him as top toy in a boy's room.</span>
                    </div>

                    <div class="info-section">
                        <label>Date</label>
                        <span>1995-01-01</span>
                    </div>

                    <div class="info-section">
                        <label>Rating</label>
                        <span style="font-size: 70%;">4.1</span>
                    </div>

                </div><!-- movie-info-->
            </div><!--movie-content-->
        </div><!--movie-card-->

        <div class="movie-card">
            <div class="movie-header"
                 style="background: url(http://henrycavill.org/images/Films/2013-Man-of-Steel/posters/3-Walmart-Superman-a.jpg);
                        background-size: cover;">
                <div class="header-icon-container">
                    <a href="#">
                        <i class="fa fa-info header-icon"></i>
                    </a>
                </div>
            </div><!--movie-header-->

            <div class="movie-content">
                <div class="movie-content-header">
                    <a href="#">
                        <h3 class="movie-title">Man of Steel</h3>
                    </a>
                    <div class="info-section">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span> (30)</span>
                    </div>
                </div><!--movie-content-header-->

                <div class="movie-info">
                    <div class="info-section">
                        <label>Description</label>
                        <span class="text-justify" style="font-size: 60%;">A cowboy doll is profoundly threatened and jealous when a new spaceman figure supplants him as top toy in a boy's room.</span>
                    </div>

                    <div class="info-section">
                        <label>Date</label>
                        <span>1995-01-01</span>
                    </div>

                    <div class="info-section">
                        <label>Rating</label>
                        <span style="font-size: 70%;">4.1</span>
                    </div>

                </div><!-- movie-info-->
            </div><!--movie-content-->
        </div><!--movie-card-->

        <div class="movie-card">
            <div class="movie-header"
                 style="background: url(http://henrycavill.org/images/Films/2013-Man-of-Steel/posters/3-Walmart-Superman-a.jpg);
                        background-size: cover;">
                <div class="header-icon-container">
                    <a href="#">
                        <i class="fa fa-info header-icon"></i>
                    </a>
                </div>
            </div><!--movie-header-->

            <div class="movie-content">
                <div class="movie-content-header">
                    <a href="#">
                        <h3 class="movie-title">Man of Steel</h3>
                    </a>
                    <div class="info-section">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span> (30)</span>
                    </div>
                </div><!--movie-content-header-->

                <div class="movie-info">
                    <div class="info-section">
                        <label>Description</label>
                        <span class="text-justify" style="font-size: 60%;">A cowboy doll is profoundly threatened and jealous when a new spaceman figure supplants him as top toy in a boy's room.</span>
                    </div>

                    <div class="info-section">
                        <label>Date</label>
                        <span>1995-01-01</span>
                    </div>

                    <div class="info-section">
                        <label>Rating</label>
                        <span style="font-size: 70%;">4.1</span>
                    </div>

                </div><!-- movie-info-->
            </div><!--movie-content-->
        </div><!--movie-card-->

        <div class="movie-card">
            <div class="movie-header"
                 style="background: url(http://henrycavill.org/images/Films/2013-Man-of-Steel/posters/3-Walmart-Superman-a.jpg);
                        background-size: cover;">
                <div class="header-icon-container">
                    <a href="#">
                        <i class="fa fa-info header-icon"></i>
                    </a>
                </div>
            </div><!--movie-header-->

            <div class="movie-content">
                <div class="movie-content-header">
                    <a href="#">
                        <h3 class="movie-title">Man of Steel</h3>
                    </a>
                    <div class="info-section">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span> (30)</span>
                    </div>
                </div><!--movie-content-header-->

                <div class="movie-info">
                    <div class="info-section">
                        <label>Description</label>
                        <span class="text-justify" style="font-size: 60%;">A cowboy doll is profoundly threatened and jealous when a new spaceman figure supplants him as top toy in a boy's room.</span>
                    </div>

                    <div class="info-section">
                        <label>Date</label>
                        <span>1995-01-01</span>
                    </div>

                    <div class="info-section">
                        <label>Rating</label>
                        <span style="font-size: 70%;">4.1</span>
                    </div>

                </div><!-- movie-info-->
            </div><!--movie-content-->
        </div><!--movie-card-->

    </div><!--row-->
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
