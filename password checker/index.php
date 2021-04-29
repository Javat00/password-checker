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
        <script src="./sources/js/functions.js"></script>

    </head>
    <body>       
        <div class="sidenav">
                <div class="login-main-text">
                    <h1><br>Password strength checker</h1>
                    <p>Here you will be able to check if your password meets the requirements to be
                        considered as a strong one.
                    </p><br>
                    <p>Creado por Aarón Espinosa Asencio, estudiante en I.E.S Kursaal<br>
                    Profesor: José López Expósito</p><br>
                    Curso de Especialización en Ciberseguridad en Entornos de las Tecnologías de la Información (2021)
                </div>
            </div>
        </div>
            <div class="main">
                <div class="picture">
                    <img class="center" src="./sources/images/password.svg">
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="login-form">
                        <form method="POST" action="results.php">

                            <div class="form-group">
                                <label><b>Pass</b></label>
                                <input type="text" class="form-control" placeholder="Password to be checked" name="password" required="required">
                            </div>

                            <div class = "check">
                                <button class="btn btn-black" type="submit">Check</button>
                            </div>

                        </form> 

                        <div class="suggest">
                        <a href="?suggest=1" onclick="newPass()" class="btn btn-black" id="randPass" target="_self">Suggest me a secure password</a>
                        <!--si se ha clickeado en el enlace de sugerir contraseña se verá un cuadro con ella!-->
                        </div>

                        <?php
                          include ("functions.php");
                            if (isset($_GET['suggest'])){
                                $link = $_GET['suggest'];
                                
                                if ($link == '1'){
                                    ?>
                                    <input class="suggested" type="text" class="form-control" id="suggested" value="<?php echo randomPassword();?>"readonly>
                                    
                                    <div class="copy">
                                        <button type="button" id="copy" onclick="copyText()">Copy it</a>
                                    </div>
                        <?php   }
                            }
                                ?>
                    </div>
                </div>
            </div>
                    <?php //errores
                    if (isset($_GET["error"])){
                        if ($_GET["error"] == 1){
                            ?>
                            <div class= "error" th:if="${param.error}" class="alert alert-danger" role="alert">Password cannot be empty or it only contains a space</div>
                            <?php
                        } 
                    }?>
        
    </body>
</html>