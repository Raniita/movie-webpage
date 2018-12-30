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
    <title>Register! - Tuxflix</title>
    <meta name="description" content="Register!">
    <meta name="author" content="Ranii">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="svg+xml" href="img/tuxflix_logo.svg">

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
    <h1 class="h3 mb-3 font-weight-normal">Create an account</h1>

    <label for="inputName" class="sr-only">Name</label>
    <input type="text" name="name" id="inputName" class="form-control" placeholder="Name" required autofocus>

    <label for="inputAge" class="sr-only">Age</label>
    <input type="number" name="age" id="inputAge" class="form-control" placeholder="Age" required>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

    <label for="inputGender"></label>
    <select class="form-control" id="inputGender" name="gender" required>
        <option>Women</option>
        <option>Men</option>
    </select>

    <label for="inputOccupation"></label>
    <select class="form-control" id="inputOccupation" name="occupation" required>
        <option>administrator</option>
        <option>artist</option>
        <option>doctor</option>
        <option>educator</option>
        <option>engineer</option>
        <option>entertainment</option>
        <option>executive</option>
        <option>healthcare</option>
        <option>homemaker</option>
        <option>lawyer</option>
        <option>librarian</option>
        <option>marketing</option>
        <option>programmer</option>
        <option>retired</option>
        <option>salesman</option>
        <option>scientist</option>
        <option>student</option>
        <option>technician</option>
        <option>writer</option>
        <option>none</option>
        <option>other</option>
    </select>

    <input type="checkbox" class="form-control" id="inputTerms" required>
    <label class="form-check-label" for="inputTerms"><a href="template.html">Accept terms</a></label>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up!</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
</form>

<!-- SCRIPTS -->
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>