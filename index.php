<!DOCTYPE html>
<html>
<head>
    <title>Consulta API</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Consulta API do Brasil app</h1>
    <div>
        <h2>consulta de qual regial é o ddd</h2>
        <form method="GET">
            <label for="ddd">Digite o DDD:</label>
            <input type="text" name="ddd" required>
            <button type="submit">Consultar</button>
            <?php
                if(isset($_GET['ddd'])) {
                    $ddd = $_GET['ddd'];
                    // chama a api
                    $url = "https://brasilapi.com.br/api/ddd/v1/$ddd";
                    // pega a resposta do json 
                    $response = json_decode(file_get_contents($url), true);
                    echo "<h3>Resultado:</h3><p>Região:".$response['state']."</p>";
                }
            ?>
        </form>
    </div>
    <div>
        <h2>Consulta feriados nacionais pelo ano</h2>
        <form id="form_consulta" method="GET">
            <label for="ano">Ano: </label>
            <input type="text" id="ano" name="ano" required>
            <button type="submit">Consultar</button>
        </form>
        <div id="resultado"></div>
    </div>
    <script>
        $(document).ready(function() {
            $('#form_consulta').submit(function(event) {
                event.preventDefault();
                var ano = $('#ano').val();
                $.ajax({
                    // pode chamar, por exemplo, um robo em php
                    // ou pode chamar o site da api direto por aqui.
                    url: 'feriado_api.php',
                    type: 'GET',
                    data: { ano: ano },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response)
                        $('#resultado').html('<h3>Feriados:</h3>');
                        response.forEach(element => {
                            $('#resultado').append('<p>' + element.date + ' - '+ element.name + '</p>');
                        });
                    },
                    error: function() {
                        alert('Erro ao consultar os feriados.');
                    }
                });
            });
        });
    </script>
</body>
</html>
