<!DOCTYPE html>
<html>
<head>
    <title>Consulta API</title>
</head>
<body>
    <h1>Consulta API do Brasil app</h1>
    <div>
        <h2>consulta de qual regial é o ddd</h2>
        <form method="GET">
            <label for="ddd">Digite o DDD:</label>
            <input type="text" name="ddd" id="cx_ddd" required>
            <button type="submit">Consultar</button>
            <?php
                if(isset($_GET['ddd'])) {
                    $ddd = $_GET['ddd'];
                    // chama a api
                    $url = "https://brasilapi.com.br/api/ddd/v1/$ddd";
                    // pega a resposta e coloca em um json
                    $response = json_decode(file_get_contents($url), true);
                    echo "<h2>Resultado:</h2><p>Região:".$response['state']."</p>";
                }
            ?>
        </form>
    </div>
</body>
</html>
