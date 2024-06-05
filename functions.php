<?php
function login($email, $senha) {
    global $conn;
    $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}

function register($nome, $email, $senha) {
    global $conn;
    $sql = "INSERT INTO usuario (nomeCompleto, email, senha) VALUES ('$nome', '$email', '$senha')";
    return $conn->query($sql);
}

function getGastos($user_id) {
    global $conn;
    $sql = "SELECT * FROM transacao WHERE conta_id = (SELECT id FROM conta WHERE usuario_id = '$user_id') AND tipo = 'Débito'";
    $result = $conn->query($sql);
    $gastos = [];
    while ($row = $result->fetch_assoc()) {
        $gastos[] = $row;
    }
    return $gastos;
}

function getEconomias($user_id) {
    global $conn;
    $sql = "SELECT * FROM transacao WHERE conta_id = (SELECT id FROM conta WHERE usuario_id = '$user_id') AND tipo = 'Crédito'";
    $result = $conn->query($sql);
    $economias = [];
    while ($row = $result->fetch_assoc()) {
        $economias[] = $row;
    }
    return $economias;
}

function getInvestimentos($user_id) {
    global $conn;
    $sql = "SELECT * FROM investimento WHERE usuario_id = '$user_id'";
    $result = $conn->query($sql);
    $investimentos = [];
    while ($row = $result->fetch_assoc()) {
        $investimentos[] = $row;
    }
    return $investimentos;
}
?>