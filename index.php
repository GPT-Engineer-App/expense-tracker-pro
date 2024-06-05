<?php
session_start();
include('db.php');
include('functions.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $user = login($email, $senha);
    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: home.php');
    } else {
        $error = "Email ou senha incorretos!";
    }
}

if (isset($_POST['register'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];
    if ($senha === $confirmar_senha) {
        $success = register($nome, $email, $senha);
        if ($success) {
            header('Location: index.php');
        } else {
            $error = "Erro ao registrar!";
        }
    } else {
        $error = "As senhas não coincidem!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Cadastro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Login</h2>
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
            <form method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <button type="submit" name="login">Login</button>
            </form>
        </div>
        <div class="form-container">
            <h2>Cadastro</h2>
            <form method="POST">
                <input type="text" name="nome" placeholder="Nome Completo" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <input type="password" name="confirmar_senha" placeholder="Confirmar Senha" required>
                <button type="submit" name="register">Cadastrar</button>
            </form>
        </div>
    </div>
</body>
</html>