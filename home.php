<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Bem-vindo, <?php echo $user['nomeCompleto']; ?></h1>
        <input type="text" placeholder="Pesquisar...">
        <div class="grid">
            <a href="gastos.php">Gastos</a>
            <a href="economias.php">Economias</a>
            <a href="investimentos.php">Investimentos</a>
        </div>
        <button onclick="window.location.href='add_gasto.php'">Adicionar Gasto</button>
    </div>
</body>
</html>