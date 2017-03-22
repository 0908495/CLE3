<?php
include 'dbh.php';
session_start();

if (isset($_POST['submit']))
{
    $username 	= mysqli_real_escape_string($conn, $_POST['username']) ;
    $password 	= mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT id, username FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if(!$row = mysqli_fetch_assoc($result)){
        $error = "Je bent gebruikersnaam of wachtwoord is onjuist";
    }	else {
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
    }
}

// if the register btn is clicked do the following
if (isset($_POST['register']))
{
    $validate = true;

    // Check if the email input is not a valid emailadress
    if (!filter_var($_POST['username'], FILTER_VALIDATE_EMAIL))
    {
        $error_username = "Vul een geldig email adres in";
        $validate = false;
    }

    // Check if the two password input fields have a different input
    if($_POST['password']  != $_POST['password-confirm'])
    {
        $validate = false;
        $error_match_pass = "De ingevoerde wachtwoorden komen niet overeen";
    }

    // if all $validate variables are true do an insert in db
    if($validate)
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // insert new user in db
        $sql = "INSERT INTO users (username, password) 
		VALUES ('$username', '$password')";
        mysqli_query($conn, $sql);

        $succes_register = "Je bent geregistreerd";
    } else {
        $error_register = "Niet alle velden zijn juist ingevoerd!";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CLE 3 - mobile</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<img src="img/fey-logo.png" height="100px" width="auto" style="margin-left: auto; margin-right: auto; display: block; margin-top: 30px; margin-bottom:30px;"/>

<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Score overzicht</a></li>
                <?php
                if(isset($_SESSION['id'])){ ?>
                    <li><a href="logout.php">Uitloggen</a></li>
                    <?php
                } else { ?>
                    <li><a href="profile.php">Inloggen</a></li>
                    <?php
                }
                ?>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>

<div class="container" style="background-color: #f7f7f7; padding-top: 20px;">
    <div class="row">
        <div class="col-md-12">


            <?php
            // Check if someone is logged in - check if session started
            if(isset($_SESSION['id'])){
                // if someone is logged in show welcome text with name of the logged in user
                echo '<h1>Welkom '.$_SESSION['username'].'</h1>';
            } else {
                // If nobody is logged in show login and register text title
                echo '<h1>Inloggen en registreren</h1><br/>
	<span style="font-size: 22px;">Log in of maak een account aan om een reservering te kunnen plaatsen</span>';
            }
            ?>

            <h4>Registreren</h4>
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Gebruikersnaam" class="login-form" ><br>
                <?php
                if (isset($error_email)) { ?>
                    <div class="alert alert-danger" role="alert"><?= $error_username ?></div>
                <?php } ?>
                <input type="password" name="password" placeholder="Wachtwoord" class="login-form" required><br>
                <input type="password" name="password-confirm" placeholder="Wachtwoord herhalen" class="login-form" required><br>
                <?php
                if (isset($error_pass)) { ?>
                    <div class="alert alert-danger" role="alert"><?= $error_pass ?></div>
                <?php } ?>
                <?php
                if (isset($error_match_pass)) { ?>
                    <div class="alert alert-danger" role="alert"><?= $error_match_pass ?></div>
                <?php } ?>
                <button class="btn btn-info btn-custom" type="register" name="register">REGISTREREN</button>
                <?php
                if (isset($succes_register)) { ?>
                    <div class="alert alert-success" role="alert"><?= $succes_register ?></div>
                <?php } ?>
                <?php
                if (isset($error_register)) { ?>
                    <div class="alert alert-danger" role="alert"><?= $error_register ?></div>
                <?php } ?>
            </form>

            <h4>Inloggen</h4>
            <form action="" method="POST">
                <input type="email" name="username" placeholder="Gebruikersnaam" class="login-form" required><br>
                <input type="password" name="password" placeholder="Wachtwoord" class="login-form" required><br>
                <button class="btn btn-info btn-custom" type="submit" name="submit">INLOGGEN</button>
                <?php
                if (isset($error)) { ?>
                    <div class="alert alert-danger" role="alert"><?= $error ?></div>
                <?php } ?>
                <a href="#" style="font-size:12px; margin-top: 20px;">Wachtwoord vergeten?</a>
            </form>
        </div>
    </div>
</div



<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3" style="margin-top:30px; ">
                <a class="twitter-timeline" data-height="450" data-theme="light" href="https://twitter.com/Feyenoord">Tweets by Feyenoord</a>
            </div>
        </div>
    </div>

    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script><!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>





