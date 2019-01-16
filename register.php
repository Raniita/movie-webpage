<?php
    session_start();
    include('func_gen_php.php');
    include('func_gen_sql.php');

    $state = '';
    if (isset($_GET['logout'])) {
        if (!empty($_GET['logout'])) {
            $logout = pgSecureCheck($_GET['logout']);
            if ($logout == 'timeout') {
                $state = pgKillSession();
            }
        } else {
            $state = pgKillSession();
        }
    } else {
        $state = pgCheckSession();
    }

    //Validacion del registro
    if (isset($_POST['name']) AND isset($_POST['age']) AND isset($_POST['password']) AND isset($_POST['confirm_password'])) {
        //Check and validate info
        $user = pgSecureCheck($_POST['name']);
        $passwd = pgSecureCheck($_POST['password']);
        $confirm_passwd = pgSecureCheck($_POST['confirm_password']);
        $age = $_POST['age'];
        $occupation = $_POST['occupation'];

        if($_POST['gender']=='Women'){
            $gender='F';
        }else{
            $gender='M';
        }

        if ($passwd <> $confirm_passwd) {
            //Passw diferentes
            $error_passwd = true;
        } else {
            //Passw correctas
            if ($age > 12 AND $age < 110) {
                $state = pgRegister($user, $age, $gender, $occupation, $passwd);

                if ($state == 'OK!') {
                    //Reg succesful
                    $code = pgEncodeDecode('ackregister',1);
                    header('Location:login.php?reg='.$code);
                } else {
                    $error_register = true;
                }
            } else {
                //Passw correctas, age incorrecta
                $error_age = true;
            }
        }
    }

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

<form class="form-signin" action="register.php" method="post">
    <img class="mb-4" src="img/tuxflix_logo.svg" alt="tuxflix_logo" width="220" height="220">
    <h1 class="h3 mb-3 font-weight-normal">Create an account</h1>

    <?php
        if ($error_register == true) {
            echo "<div class=\"alert alert-danger\">
                    <strong>Error!</strong> Something goes wrong. Register error.
                  </div>";
        }

        if ($error_passwd == true) {
            echo "<div class=\"alert alert-danger\">
                    <strong>Error!</strong> Incorrect passwords doesnt match.
                  </div>";
        }

        if ($error_age == true) {
            echo "<div class=\"alert alert-danger\">
                    <strong>Error!</strong> Incorrect age. Send values more than 10 and less than 110.
                  </div>";
        }
    ?>

    <label for="inputName" class="sr-only">Username</label>
    <input type="text" name="name" id="inputName" class="form-control" placeholder="Username" required autofocus>

    <label for="inputAge" class="sr-only">Age</label>
    <input type="number" name="age" id="inputAge" class="form-control" placeholder="Age" required>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

    <label for="inputPassword2" class="sr-only">Confirm Password</label>
    <input type="password" name="confirm_password" id="inputPassword2" class="form-control"
           placeholder="Confirm Password" required>


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

    <div class="form-group">
        <label for="avatar">Select your avatar image</label>
        <input type="file" class="form-control-file" id="avatar" name="avatar">
    </div>

    <input type="checkbox" class="form-control" id="inputTerms" required>
    <label class="form-check-label" for="inputTerms"><a href="html_templates/template.html">Accept terms</a></label>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up!</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
</form>

<!-- SCRIPTS -->
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>