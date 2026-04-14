<?php
session_start();

if (isset($_SESSION['nome'])) {
    header("Location: quiz.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Quiz PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3e8ff;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 360px;
            margin: 100px auto;
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }

        h1 {
            text-align: center;
            color: #7e22ce;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #d8b4fe;
            border-radius: 8px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #9333ea;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #7e22ce;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Quiz PHP</h1>

    <form action="quiz.php" method="POST">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <button type="submit">Entrar</button>
    </form>
</div>

</body>
</html>