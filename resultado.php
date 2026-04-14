<?php
session_start();

if (!isset($_SESSION["nome"])) {
    header("Location: index.php");
    exit();
}

$nome = $_SESSION["nome"];
$email = $_COOKIE["email"] ?? "Email não encontrado";

function corrigirQuiz($dados) {
    $acertos = 0;

    $gabaritoSimples = [
        "q1" => "Exibir dados",
        "q2" => "$",
        "q3" => "$nome_usuario",
        "q4" => "GET",
        "q6" => "password",
        "q7" => "radio",
        "q8" => "Múltiplas opções",
        "q9" => "Lista suspensa",
        "q10" => "if",
        "q11" => "for",
        "q12" => "Uma variável com múltiplos valores",
        "q13" => "function",
        "q14" => "Armazenar no servidor",
        "q15" => "No navegador",
        "q16" => "file_get_contents",
        "q18" => "$_POST",
        "q19" => "isset()",
        "q20" => "session_start()"
    ];

    foreach ($gabaritoSimples as $pergunta => $respostaCorreta) {
        if (isset($dados[$pergunta]) && $dados[$pergunta] === $respostaCorreta) {
            $acertos++;
        }
    }

    if (isset($dados["q5"])) {
        $respostasQ5 = $dados["q5"];
        sort($respostasQ5);

        $corretaQ5 = [
            "Mais seguro para envio de dados",
            "Permite envio de grande volume de dados"
        ];
        sort($corretaQ5);

        if ($respostasQ5 == $corretaQ5) {
            $acertos++;
        }
    }

    if (isset($dados["q17"])) {
        $respostasQ17 = $dados["q17"];
        sort($respostasQ17);

        $corretaQ17 = [
            "Consome APIs",
            "Faz requisições HTTP"
        ];
        sort($corretaQ17);

        if ($respostasQ17 == $corretaQ17) {
            $acertos++;
        }
    }

    return $acertos;
}

$acertos = corrigirQuiz($_POST);

$mensagem = "";
if ($acertos >= 0 && $acertos <= 10) {
    $mensagem = "Precisa revisar";
} elseif ($acertos >= 11 && $acertos <= 17) {
    $mensagem = "Quase lá";
} else {
    $mensagem = "Excelente";
}

$conselho = "Continue estudando e praticando PHP!";

// Exemplo de API
$apiUrl = "https://api.adviceslip.com/advice";
$respostaApi = @file_get_contents($apiUrl);

if ($respostaApi !== false) {
    $dadosApi = json_decode($respostaApi, true);

    if (isset($dadosApi["slip"]["advice"])) {
        $conselho = $dadosApi["slip"]["advice"];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado do Quiz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3e8ff;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 600px;
            max-width: 95%;
            margin: 60px auto;
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }

        h1 {
            text-align: center;
            color: #7e22ce;
        }

        .box {
            background: #faf5ff;
            border-left: 5px solid #c084fc;
            padding: 15px;
            margin: 15px 0;
            border-radius: 10px;
        }

        .botoes a {
            display: inline-block;
            margin-right: 10px;
            margin-top: 15px;
            text-decoration: none;
            background: #9333ea;
            color: white;
            padding: 10px 16px;
            border-radius: 8px;
        }

        .botoes a:hover {
            background: #7e22ce;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Resultado Final</h1>

    <div class="box">
        <p><strong>Nome:</strong> <?php echo htmlspecialchars($nome); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    </div>

    <div class="box">
        <p><strong>Total de acertos:</strong> <?php echo $acertos; ?> de 20</p>
        <p><strong>Desempenho:</strong> <?php echo $mensagem; ?></p>
    </div>

    <div class="box">
        <p><strong>Conselho da API:</strong> <?php echo htmlspecialchars($conselho); ?></p>
    </div>

    <div class="botoes">
        <a href="quiz.php">Voltar ao quiz</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

</body>
</html>