<?php
include 'dbh.php';
session_start();

// if login form submitted do the following
if (isset($_POST['submit']))
{
    $username 	= mysqli_real_escape_string($conn, $_POST['username']) ;
    $password 	= mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT password FROM users WHERE username='$username'";
    $resultQuery  = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($resultQuery);
    $dbPass = $row['password'];

    // compare password with hash database password
    if(password_verify($password, $dbPass)){
        $sql = "SELECT id, username FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);

        if(!$row = mysqli_fetch_assoc($result)){
            $error = "Je bent gebruikersnaam of wachtwoord is onjuist";
        }	else {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
        }
    }
}



// if the register btn is clicked do the following
if (isset($_POST['register']))
{
    $validate = true;

    // Check if the name input contains anything other than lower and uppercase letters
    if (!preg_match("/^[a-z0-9_-]{3,15}$/",$_POST['username'])){
        $error_username = "Dit veld mag alleen kleine letters, cijfers, '-' en '_' bevatten";
        $validate = false;
    }

    // Check if the two password input fields have a different input
    if($_POST['password'] != $_POST['password-confirm'])
    {
        $validate = false;
        $error_match_pass = "De ingevoerde wachtwoorden komen niet overeen";
    }

    // if all $validate variables are true do an insert in db
    if($validate)
    {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // insert new user in db
        $sql = "INSERT INTO users (username, password) 
		VALUES ('$username', '$passwordHash')";
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
<div class="header">
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
                    <li><a href="scores.php">Score overzicht</a></li>
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
    <div class="col-md-12 head-title">
        <img src="img/fey-logo.png" class="logo" height="100px" width="auto"/>
        <span>Feyeboard</span>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            // Check if someone is logged in - check if session started
            if(isset($_SESSION['id'])){
                // if someone is logged in show welcome text with name of the logged in user
                echo '<h2 style="margin-top:50px; margin-bottom: 30px;">Welkom '.$_SESSION['username'].'</h2>';
            } else {
                // If nobody is logged in show login and register text title
                echo '<h4>Inloggen en registreren</h4><br/>
	            <span>Log in of maak een account aan</span>';
            }
            ?>
        </div>
    </div>
    <div class="row" style="margin-bottom:50px;">
        <div class="col-md-6">
            <h4>Registreren</h4>
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Gebruikersnaam" class="login-form" ><br>
                <?php
                if (isset($error_username)) { ?>
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
                <button class="btn btn-custom" type="register" name="register">REGISTREREN</button>
                <?php
                if (isset($succes_register)) { ?>
                    <div class="alert alert-success" role="alert"><?= $succes_register ?></div>
                <?php } ?>
                <?php
                if (isset($error_register)) { ?>
                    <div class="alert alert-danger" role="alert"><?= $error_register ?></div>
                <?php } ?>
            </form>
        </div>

        <div class="col-md-6">
            <h4>Inloggen</h4>
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Gebruikersnaam" class="login-form" required><br>
                <input type="password" name="password" placeholder="Wachtwoord" class="login-form" required><br>
                <button class="btn btn-custom" type="submit" name="submit">INLOGGEN</button>
                <?php
                if (isset($error)) { ?>
                    <div class="alert alert-danger" role="alert"><?= $error ?></div>
                <?php } ?>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid quoteArea">
    <div class="container" style="text-align:center;">
        <h2>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit."</h2>
    </div>
</div>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10" style="text-align:center; margin-bottom: 50px; color:#fff;">
                <h1>Support jouw team</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <script>
                    window.fbAsyncInit = function() {
                        FB.init({
                            appId      : 'your-app-id',
                            xfbml      : true,
                            version    : 'v2.8'
                        });
                        FB.AppEvents.logPageView();
                    };

                    (function(d, s, id){
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) {return;}
                        js = d.createElement(s); js.id = id;
                        js.src = "//connect.facebook.net/en_US/sdk.js";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                </script>

                <div class="fb-page" data-href="https://www.facebook.com/feyenoord/?fref=ts" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Feyenoord-CMGT-780217648793081/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Feyenoord-CMGT-780217648793081/">Feyenoord CMGT</a></blockquote></div>

            </div>
            <div class="col-md-4">
                <a class="twitter-timeline" data-height="500" data-theme="light" href="https://twitter.com/Feyenoord">Tweets by Feyenoord</a>
                <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script><!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>





