<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoramento de Relógios Pontos</title>
    <style>

        *{
            padding: 0;
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
        }

        form {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        
        input{
            width: 300px;
            padding: 10px 5px;
            outline: none;
        }

        button{
            width: 300px;
            padding: 10px 5px;
            border: none;
            background: #F0E7E9;
            transition: border-radius 0.3s, color 0.3s; /* Adicione esta linha para a transição */
        }

        button:hover{
            border-radius: 10px;
            background: #D30001;

        }

        .result {
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .error {
            color: #ff0000;
        }
    </style>
</head>
<body>

<h1>Monitoramento das bolas</h1>

<form method="post" action="">
    <input type="text" id="bolinha" name="bolinha" placeholder="Digite o valor da bolinha:" required>
    <br>
    <button type="submit">Realizar Monitoramento</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $bolinha = $_POST["bolinha"];
    $y = $bolinha - 700;

    realizarPing("10.$y.0.150");
    realizarPing("10.$y.0.240");
    realizarPing("10.$y.0.200");
}

function realizarPing($ip) {
    exec("ping " . $ip, $output, $status);

    echo '<div class="result">';
    echo "<p>Disparando $ip com 32 bytes de dados:</p>";
    
    if (!$status)
    {
        echo "<pre>" . implode("\n", $output) . "</pre>";
    } 
    else 
    {
        echo '<p class="error">Erro ao realizar ping para ' . $ip . '</p>';
    }
    
    echo '</div>';
}
?>

</body>
</html>
