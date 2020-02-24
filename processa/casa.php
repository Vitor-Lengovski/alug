<?php

include_once '/var/www/html/site/class/casa.php';
    if ($_POST) {
        
        if ( isset($_POST['numero']) && isset($_POST['aluguel']) && isset($_POST['localizacao']) ) {
            $casa = new Casa();
            $casa->setAll($_POST['morador'], $_POST['moradores'], $_POST['numero'], $_POST['localizacao'], $_POST['aluguel']);
            if ($_POST['id']!=0) {
                $casa->setIdCasa($_POST['id']);
                $resultado = $casa->alterar();
            }else{
                $resultado = $casa->adicionarCasa();
            }

            if($resultado)
                header('location: ../index.php');
        }
    }   
?>