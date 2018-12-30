<?php
    session_start();
    include("func_gen_php.php");
    include("func_gen_sql.php");

    echo $_POST['name'];
    echo $_POST['age'];
    echo $_POST['password'];
    echo $_POST['confirm_password'];
    echo $_POST['gender'];
    echo $_POST['occupation'];
?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title>template</title>
    <meta name="description" content="template">
    <meta name="author" content="Ranii">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- my css -->
    <link rel="stylesheet" href="css/main.css">

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

<!-- SCRIPTS -->
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
