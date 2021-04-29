<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Is your password secure?</title>   
        <link rel="stylesheet" type="text/css" media="(max-width: 576px)"  href="css/celulares.css">
        <link rel="stylesheet" type="text/css" media="(min-width: 576px)"  href="css/ordenadores.css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    <body>       
        <div class="sidenav">
                <div class="login-main-text">
                    <h1><br>Password strength checker</h1>
                    <p>Here you will be able to check how long it would take to decrypt your password with a certain
                        number of attempts per second.
                    </p><br>
                    <p>Made by Javat00</p>
                    
                </div>
            </div>
            <?php
            include("functions.php");
            //comprobamos que la se han enviado las variables por POST
                if (isset($_POST["password"]) && $_POST["password"]!= 0 && $_POST["password"] != " "){
                    $password = $_POST["password"];
                    $possibilities = $_POST["possibilities"]; //numero de caracteres posibles 
                }
                else{
                    header("Location: index.php?error=2"); //la contraseña no puede estar vacía ni contener un único espacio
                    exit;
                }
                if (isset($_POST["attempts"]) && isset($_POST["possibilities"]) && is_numeric($_POST["attempts"])) { //existe la variable intentos por segundo y es numerica (no está vacía)
                    $attempts = $_POST["attempts"];
                    $time = $possibilities / $attempts;
                    //ahora formatearemos el tiempo para interpretarlo mejor
                    $days = floor($time / 86400)." Days";
                    $hours = floor(($time / 3600) %24)."H "; 
                    $minutes = floor(($time / 60) % 60)."m ";
                    $seconds = abs($time % 60)."s";
                    $time = "$days, $hours:$minutes:$seconds";
                }
             ?>
            <div class="main">
                <img class=center src="./sources/images/password.svg">
            <div class="checkbox">
            <?php //si hemos instanciado la variable del tiempo que tarda...
             if(isset($time)){ ?> 
                <label><b>Time to be decrypted with <?php echo $attempts;?> attempts per second </b><br> <?php echo $time; ?></label><br><br>
                <?php } ?>
                <div class="col-md-6 col-sm-12">
                    <form method="POST" action="results_2.php">
                        <label><b>Attempts per second</b></label>
                        <input type="number" class="form-control" placeholder="Attempts per second" name="attempts" required="required">
                        <input type="number" class="form-control" name=password hidden="hidden" value="<?php echo $password;?>">
                        <input type="number" class="form-control" name=possibilities hidden="hidden" value="<?php echo $possibilities;?>">
                        <br/>   
                        <button type="submit" class="btn btn-black">How long does it take?</button>
                    </form>
                    <a href="index.php" class="btn btn-black" target="_self">Back to main page</a>
                </div>
            </div>
        </div>
    </body>
</html>
