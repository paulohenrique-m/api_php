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
        <form action="api_ddd.php" method="GET">
            <label for="ddd">Digite o DDD:</label>
            <input type="text" name="ddd" id="cx_ddd" required>
            <button type="submit">Consultar</button>
            <div id= "resp_ddd"></div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('form').submit(function(event) {
                event.preventDefault();
                var ddd = $('#cx_ddd').val();
                $.ajax({
                    url: 'api_ddd.php',
                    method: 'GET',
                    data: { ddd: ddd },
                    dataType: 'json',
                    success: function(resp) {
                        console.log(resp);
                        $('#resp_ddd').html('<h2>Resultado:</h2><p>Região: ' + resp.state + '</p>');
                    }
                });
            });
        });
    </script>
</body>
</html>
