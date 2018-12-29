<?php
    session_start();
    include('func_gen_php.php');
    include('func_gen_sql.php');

    $state = '';
    if(isset($_GET['logout']){}

?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title>Sign up!</title>
    <meta name="description" content="Sign up!">
    <meta name="author" content="Ranii">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- my css -->
    <link rel="stylesheet" href="css/main.css">

    <!-- Boostrap 4 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- sign in CSS -->
    <link rel="stylesheet" href="css/sign-up.css">

    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="text-center">

<form class="form-signin" method="post" action="register.php">
    <img class="mb-4" src="img/tuxflix_logo.svg" alt="tuxflix_logo" width="220" height="220">
    <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
    <label for="inputName" class="sr-only">Name</label>
    <input type="text" id="inputName" class="form-control" placeholder="Name" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>

    <!--
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    -->

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
</form>

<!-- SCRIPTS -->
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>