<?php
header('Content-Type: application/json');

try {
    $pdo = new PDO('mysql:host=localhost;dbname=morphdigi;charset=utf8mb4', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $table = 'transactions';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $stmt = $pdo->query("SELECT id, currency_code, transaction_date FROM `$table` ORDER BY id DESC");
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $payload = json_decode(file_get_contents('php://input'), true);

        $currency = isset($payload['currency']) ? strtoupper(trim($payload['currency'])) : '';
        $date = isset($payload['date']) ? trim($payload['date']) : '';

        if ($currency === '' || $date === '') {
            http_response_code(400);
            echo json_encode(['error' => 'Both currency and date are required.']);
            exit;
        }

        $stmt = $pdo->prepare("INSERT INTO `$table` (currency_code, transaction_date) VALUES (:currency, :tx_date)");
        $stmt->execute([
            ':currency' => $currency,
            ':tx_date' => $date
        ]);

        echo json_encode(['ok' => true, 'id' => $pdo->lastInsertId()]);
        exit;
    }

    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Database error',
        'details' => $e->getMessage()
    ]);
}

