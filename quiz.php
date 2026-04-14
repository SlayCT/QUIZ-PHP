<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nome"]) && isset($_POST["email"])) {
    $_SESSION["nome"] = $_POST["nome"];
    setcookie("email", $_POST["email"], time() + (30 * 24 * 60 * 60), "/");
}

if (!isset($_SESSION["nome"])) {
    header("Location: index.php");
    exit();
}

$nome = $_SESSION["nome"];
$email = $_COOKIE["email"] ?? "Email não encontrado";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #faf5ff;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 850px;
            max-width: 95%;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }

        h1 {
            text-align: center;
            color: #7e22ce;
        }

        .info {
            background: #f3e8ff;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .pergunta {
            margin-bottom: 22px;
            padding: 15px;
            border-left: 5px solid #c084fc;
            background: #fcfaff;
            border-radius: 10px;
        }

        .pergunta p {
            font-weight: bold;
            margin-top: 0;
        }

        select {
            padding: 8px;
            border-radius: 8px;
            border: 1px solid #d8b4fe;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            background: #9333ea;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background: #7e22ce;
        }

        .logout {
            display: inline-block;
            margin-top: 15px;
            color: #7e22ce;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Questionário de Revisão PHP</h1>

    <div class="info">
        <p><strong>Nome:</strong> <?php echo htmlspecialchars($nome); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    </div>

    <form action="resultado.php" method="POST">

        <div class="pergunta">
            <p>1. O comando echo é utilizado para:</p>
            <input type="radio" name="q1" value="Receber dados" required> Receber dados<br>
            <input type="radio" name="q1" value="Exibir dados"> Exibir dados<br>
            <input type="radio" name="q1" value="Criar funções"> Criar funções<br>
            <input type="radio" name="q1" value="Encerrar o código"> Encerrar o código
        </div>

        <div class="pergunta">
            <p>2. Em PHP, uma variável começa com:</p>
            <input type="radio" name="q2" value="#" required> #<br>
            <input type="radio" name="q2" value="$"> $<br>
            <input type="radio" name="q2" value="@"> @<br>
            <input type="radio" name="q2" value="&"> &
        </div>

        <div class="pergunta">
            <p>3. Qual é uma variável válida?</p>
            <input type="radio" name="q3" value="$1nome" required> $1nome<br>
            <input type="radio" name="q3" value="$nome_usuario"> $nome_usuario<br>
            <input type="radio" name="q3" value="nome$"> nome$<br>
            <input type="radio" name="q3" value="$nome-usuario"> $nome-usuario
        </div>

        <div class="pergunta">
            <p>4. Qual método envia dados pela URL?</p>
            <input type="radio" name="q4" value="POST" required> POST<br>
            <input type="radio" name="q4" value="GET"> GET
        </div>

        <div class="pergunta">
            <p>5. Sobre o método POST (marque as corretas):</p>
            <input type="checkbox" name="q5[]" value="Dados ficam visíveis na URL"> Dados ficam visíveis na URL<br>
            <input type="checkbox" name="q5[]" value="Mais seguro para envio de dados"> Mais seguro para envio de dados<br>
            <input type="checkbox" name="q5[]" value="Permite envio de grande volume de dados"> Permite envio de grande volume de dados<br>
            <input type="checkbox" name="q5[]" value="Só funciona com textos"> Só funciona com textos
        </div>

        <div class="pergunta">
            <p>6. Qual input é mais adequado para senha?</p>
            <input type="radio" name="q6" value="text" required> text<br>
            <input type="radio" name="q6" value="email"> email<br>
            <input type="radio" name="q6" value="password"> password
        </div>

        <div class="pergunta">
            <p>7. Qual permite escolher apenas UMA opção?</p>
            <input type="radio" name="q7" value="checkbox" required> checkbox<br>
            <input type="radio" name="q7" value="radio"> radio<br>
            <input type="radio" name="q7" value="text"> text<br>
            <input type="radio" name="q7" value="textarea"> textarea
        </div>

        <div class="pergunta">
            <p>8. Checkbox é usado quando:</p>
            <input type="radio" name="q8" value="Apenas uma opção" required> Apenas uma opção<br>
            <input type="radio" name="q8" value="Múltiplas opções"> Múltiplas opções
        </div>

        <div class="pergunta">
            <p>9. A tag select serve para:</p>
            <input type="radio" name="q9" value="Campo de texto" required> Campo de texto<br>
            <input type="radio" name="q9" value="Lista suspensa"> Lista suspensa<br>
            <input type="radio" name="q9" value="Botão"> Botão<br>
            <input type="radio" name="q9" value="Sessão"> Sessão
        </div>

        <div class="pergunta">
            <p>10. Qual estrutura usamos para decisão?</p>
            <input type="radio" name="q10" value="for" required> for<br>
            <input type="radio" name="q10" value="echo"> echo<br>
            <input type="radio" name="q10" value="if"> if<br>
            <input type="radio" name="q10" value="array"> array
        </div>

        <div class="pergunta">
            <p>11. Qual estrutura usamos para repetição?</p>
            <input type="radio" name="q11" value="if" required> if<br>
            <input type="radio" name="q11" value="echo"> echo<br>
            <input type="radio" name="q11" value="for"> for<br>
            <input type="radio" name="q11" value="isset"> isset
        </div>

        <div class="pergunta">
            <p>12. Um array é:</p>
            <input type="radio" name="q12" value="Uma função" required> Uma função<br>
            <input type="radio" name="q12" value="Uma variável com múltiplos valores"> Uma variável com múltiplos valores<br>
            <input type="radio" name="q12" value="Um formulário"> Um formulário<br>
            <input type="radio" name="q12" value="Um loop"> Um loop
        </div>

        <div class="pergunta">
            <p>13. Para criar uma função usamos:</p>
            <input type="radio" name="q13" value="create" required> create<br>
            <input type="radio" name="q13" value="function"> function<br>
            <input type="radio" name="q13" value="def"> def<br>
            <input type="radio" name="q13" value="func"> func
        </div>

        <div class="pergunta">
            <p>14. Sessões servem para:</p>
            <input type="radio" name="q14" value="Armazenar no navegador" required> Armazenar no navegador<br>
            <input type="radio" name="q14" value="Armazenar no servidor"> Armazenar no servidor<br>
            <input type="radio" name="q14" value="Criar HTML"> Criar HTML<br>
            <input type="radio" name="q14" value="Fazer requisições"> Fazer requisições
        </div>

        <div class="pergunta">
            <p>15. Cookies são armazenados:</p>
            <input type="radio" name="q15" value="No servidor" required> No servidor<br>
            <input type="radio" name="q15" value="No navegador"> No navegador
        </div>

        <div class="pergunta">
            <p>16. Qual função pode consumir API?</p>
            <input type="radio" name="q16" value="echo" required> echo<br>
            <input type="radio" name="q16" value="file_get_contents"> file_get_contents<br>
            <input type="radio" name="q16" value="isset"> isset<br>
            <input type="radio" name="q16" value="print_r"> print_r
        </div>

        <div class="pergunta">
            <p>17. Sobre cURL (marque as corretas):</p>
            <input type="checkbox" name="q17[]" value="Faz requisições HTTP"> Faz requisições HTTP<br>
            <input type="checkbox" name="q17[]" value="Consome APIs"> Consome APIs<br>
            <input type="checkbox" name="q17[]" value="Apenas imprime dados"> Apenas imprime dados<br>
            <input type="checkbox" name="q17[]" value="Substitui sessão"> Substitui sessão
        </div>

        <div class="pergunta">
            <p>18. Para acessar dados via POST usamos:</p>
            <input type="radio" name="q18" value="$_GET" required> $_GET<br>
            <input type="radio" name="q18" value="$_POST"> $_POST<br>
            <input type="radio" name="q18" value="$_SESSION"> $_SESSION<br>
            <input type="radio" name="q18" value="$_COOKIE"> $_COOKIE
        </div>

        <div class="pergunta">
            <p>19. Para verificar se variável existe:</p>
            <input type="radio" name="q19" value="check()" required> check()<br>
            <input type="radio" name="q19" value="isset()"> isset()<br>
            <input type="radio" name="q19" value="exist()"> exist()<br>
            <input type="radio" name="q19" value="verify()"> verify()
        </div>

        <div class="pergunta">
            <p>20. Para iniciar uma sessão usamos:</p>
            <input type="radio" name="q20" value="start_session()" required> start_session()<br>
            <input type="radio" name="q20" value="session_start()"> session_start()<br>
            <input type="radio" name="q20" value="init_session()"> init_session()<br>
            <input type="radio" name="q20" value="begin_session()"> begin_session()
        </div>

        <button type="submit">Enviar respostas</button>
    </form>

    <a class="logout" href="logout.php">Sair</a>
</div>

</body>
</html>