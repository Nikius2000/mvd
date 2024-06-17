<?php
include 'db.php';

// Получаем входные данные из тела запроса
$inputData = file_get_contents('php://input');
$inputData = json_decode($inputData, true); // Декодируем JSON-строку в массив

if ($_SERVER['REQUEST_METHOD'] === 'POST' && is_array($inputData)) {
    $params = [
        'id' => $inputData['id'] ?? "",
        'text' => $inputData['text'] ?? ""
    ];

    // Update database record
    $query = "UPDATE \"Emp_categ\" SET 
              text = $1 
              WHERE id = $2";
    
    $values = [
        $params['text'],
        $params['id']
    ];

    // Выполнение SQL запроса с параметрами
    $result = pg_query_params($connection, $query, $values);

    if ($result === false) {
        $error_message = pg_last_error($connection);
        error_log('Database error: ' . $error_message);
        echo json_encode(['error' => 'Ошибка при выполнении запроса к базе данных']);
    } else {
        echo json_encode(['message' => 'Данные успешно обновлены']);
    }
} else {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Неверные данные запроса.']);
}
?>
