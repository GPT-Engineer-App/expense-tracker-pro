<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}
include('db.php');
include('functions.php');
$gastos = getGastos($_SESSION['user']['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Gastos</h1>
        <canvas id="gastosChart"></canvas>
        <ul>
            <?php foreach ($gastos as $gasto): ?>
                <li><?php echo $gasto['descricao']; ?> - <?php echo $gasto['valor']; ?> - <?php echo $gasto['data']; ?> - <?php echo $gasto['categoria_nome']; ?></li>
            <?php endforeach; ?>
        </ul>
        <button onclick="window.location.href='add_gasto.php'">Adicionar Gasto</button>
    </div>
    <script>
        const ctx = document.getElementById('gastosChart').getContext('2d');
        const gastosChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [/* Datas */],
                datasets: [{
                    label: 'Gastos',
                    data: [/* Valores */],
                    borderColor: 'rgba(255, 99, 132, 1)',
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