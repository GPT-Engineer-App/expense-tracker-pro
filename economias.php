<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}
include('db.php');
include('functions.php');
$economias = getEconomias($_SESSION['user']['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Economias</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Economias</h1>
        <canvas id="economiasChart"></canvas>
        <ul>
            <?php foreach ($economias as $economia): ?>
                <li><?php echo $economia['descricao']; ?> - <?php echo $economia['valor']; ?> - <?php echo $economia['data']; ?></li>
            <?php endforeach; ?>
        </ul>
        <button onclick="window.location.href='add_economia.php'">Adicionar Economia</button>
    </div>
    <script>
        const ctx = document.getElementById('economiasChart').getContext('2d');
        const economiasChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [/* Datas */],
                datasets: [{
                    label: 'Economias',
                    data: [/* Valores */],
                    borderColor: 'rgba(54, 162, 235, 1)',
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