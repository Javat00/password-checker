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
                    <p>Here you will be able to check if your password meets the requirements to be
                        considered as a strong one.
                    </p><br>
                    <p>Made by Javat00</p>
                    
                </div>
            </div>
            <?php
            include("functions.php");
            //comprobamos que la contraseña no esté vacía ni que solo contenga un espacio
                if (isset($_POST["password"]) && $_POST["password"]!= "" && $_POST["password"] != " "){
                    $password = $_POST["password"];
                    $passwordL = characters($password); //longitud password
                    $possibilities = 0; //numero de caracteres posibles
                }
                else{
                    header("Location: index.php?error=1"); //la contraseña no puede estar vacía ni contener un único espacio
                    exit;
                }

                //comprobaciones en la checkbox de los requisitos
             ?>
            <div class="main">
                <img class=center src="./sources/images/password.svg">
            <div class="checkbox">
                <label class=<?php if (lowerCase($password)){ echo "green";$possibilities+=27;} else echo "red";?> for="lower"> lowerCase</label><br>

                <label class=<?php if (upperCase($password)){ echo "green";$possibilities+=27;} else echo "red";?> for="upper"> upperCase</label><br>

                <label class=<?php if (symbols($password)){ echo "green";$possibilities+=26;} else echo "red";?> for="symbols"> symbols</label><br>

                <label class=<?php if (numbers($password)){ echo "green";$possibilities+=10;} else echo "red";?> for="numbers"> numbers</label><br>

                <label class=<?php if ($passwordL>8)echo "green"; else echo "red";?> for="length"> min length (8)</label><br>

                <label class=<?php if (dictionary($password))echo "red"; else echo "green";?> for="length">not vulnerable to a dictionary attack</label><br><br>

                <label ><b>Length </b> <?php echo characters($password); ?></label><br><br>
                <label ><b>Possibilities* </b><?php echo pow($possibilities,$passwordL); ?></label><br>
                
            </div>
                <div class="col-md-6 col-sm-12">
                    <div class="mainPageButton">
                    <form method="POST" action="results_2.php">
                        <button type="submit" class="btn btn-black">More info about it</button>
                        <input type="number" class="form-control" name=password hidden="hidden" value="<?php echo characters($password);?>">
                        <input type="number" class="form-control" name=possibilities hidden="hidden" value="<?php echo pow($possibilities,characters($password));?>">
                    </form>
                    <a href="index.php" class="btn btn-black" target="_self">Back to main page</a>
                    </div>
                </div>
                <br><footer> <b><small>*Number of attempts that a hacker must do to have the certain of decrypt your password</small></b></footer>
        </div>
    </body>
</html>
