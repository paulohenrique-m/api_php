<?php
    if(isset($_GET['ano'])) {
        $ano = $_GET['ano'];
        // chama a api
        $url = "https://brasilapi.com.br/api/feriados/v1/$ano";
        // retorna a resposta em json mesmo
        $response = file_get_contents($url);
        echo $response;
    }
?>