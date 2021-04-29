<?php

    function characters($password) { //longitud
        return strlen($password);
    }

    function symbols($password){ //contiene simbolos (26)
        if (preg_match('/[\'^$%&*.()}{@#~?!¡><>,|=_+-]/', $password)) return true;
        return false;
    }

    function upperCase($password){ //contiene mayus
        if(preg_match('/[A-Z]/', $password)) return  true;
        return false;
    }

    function lowerCase($password){ //contiene minus
        if(preg_match('/[a-z]/', $password)) return  true;
        return false;
    }

    function numbers($password){ //contiene numeros
        if(preg_match('/[0-9]/', $password)) return  true;
        return false;
    }

    function dictionary($password){
        $string=file_get_contents("sources/worst-passwords.txt");
        $string = explode("\n", $string); // \n es el caracter de salto de línea
        if(in_array($password, $string)) return true;
        else return false;
    }

    function randomPassword() {
        $alphabet = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $symbol = "~!@-#$.";
        $pass = array(); 
        $alphaLength = strlen($alphabet);
        $symboLength = strlen($symbol) - 1;
        for ($i = 0; $i <10 ; $i++) { //10 caracteres del alfabeto
            $n = rand(0, $alphaLength - 1);
            $pass[] = $alphabet[$n];
        }
        for ($i = 0; $i <2 ; $i++) { //2 caracteres de simbolos
            $n = rand(0, $symboLength - 1);
            $pass[] = $symbol[$n];
        }
        return str_shuffle(implode($pass)); //devolvemos el array en forma de cadena y ordenado aleatoriamente
    }
?>