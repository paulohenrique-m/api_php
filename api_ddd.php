<?php
    if(isset($_GET['ddd'])) {
        $ddd = $_GET['ddd'];
        $url = "https://brasilapi.com.br/api/ddd/v1/$ddd";
        $response = file_get_contents($url);
        echo $response;
    }
?>