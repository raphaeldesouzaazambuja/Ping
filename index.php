<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoramento de Relógios Pontos</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>

<h1>Inspeção de bolas</h1>

<form method="post" action="">
    <input type="text" id="bolinha" name="bolinha" placeholder="Digite o valor da bolinha:" required>
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
    echo "<p>Disparando $ip:</p>";
    
    if (!$status)
    {
        echo "<pre>" .  $output . "</pre>";
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
