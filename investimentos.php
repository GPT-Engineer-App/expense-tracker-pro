<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}
include('db.php');
include('functions.php');
$investimentos = getInvestimentos($_SESSION['user']['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investimentos</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Investimentos</h1>
        <canvas id="investimentosChart"></canvas>
        <ul>
            <?php foreach ($investimentos as $investimento): ?>
                <li><?php echo $investimento['nome']; ?> - <?php echo $investimento['valor_atual']; ?> - <?php echo $investimento['retorno']; ?></li>
            <?php endforeach; ?>
        </ul>
        <button onclick="window.location.href='add_investimento.php'">Adicionar Investimento</button>
    </div>
    <script>
        const ctx = document.getElementById('investimentosChart').getContext('2d');
        const investimentosChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [/* Datas */],
                datasets: [{
                    label: 'Investimentos',
                    data: [/* Valores */],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>