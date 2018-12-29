<?php
    session_start();
    include('func_gen_php.php');
    include('func_gen_sql.php');

    $state = '';
    if(isset($_GET['logout'])){
        if(!empty($_GET['logout'])){
            $logout = pgSecureCheck($_GET['logout']);
            if($logout=='timeout'){
                $state = pgKillSession();
            }
        } else {
            $state = pgKillSession();
        }
    } else {
        $state = pgCheckSession();
    }

    if(isset($_POST['name']) AND isset($_POST['password'])){
        $user = pgSecureCheck($_POST['name']);
        $passwd = pgSecureCheck($_POST['password']);
        $state = pgLogin($user, $passwd);

        if($state == 'OK!'){
            //Redirigimos a la pagina principal
            //header('Location:dashboard.php');

            echo $_SESSION['id'];
            echo $_SESSION['name'];
        } else {
            //error
            echo "error";
        }
    }

?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title>Sign in!</title>
    <meta name="description" content="Sign in!">
    <meta name="author" content="Ranii">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- my css -->
    <link rel="stylesheet" href="css/main.css">

    <!-- Boostrap 4 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- sign in CSS -->
    <link rel="stylesheet" href="css/sign-in.css">

    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="text-center">

<form class="form-signin" action="login.php" method="POST" >
    <img class="mb-4" src="img/tuxflix_logo.svg" alt="" width="220" height="220">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in!</h1>

    <label for="inputName" class="sr-only">Username</label>
    <input type="text" name="name" id="inputName" class="form-control" placeholder="Username" required autofocus>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

    <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
</form>

<!-- SCRIPTS -->
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>