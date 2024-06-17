<?php
include 'db.php';

// Получаем параметры из тела POST запроса
$inputData = file_get_contents('php://input');
$inputData = json_decode($inputData, true); // Декодируем JSON-строку в массив

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($inputData['id'])) {
    $id = $inputData['id'];

    // Выполняем SQL запрос для удаления записи по номеру фонда
    $query = "DELETE FROM \"Emp_categ\" WHERE id = $1";
    
    $result = pg_query_params($connection, $query, array($id));

    if ($result) {
        echo json_encode(['message' => 'Данные успешно удалены']);
    } else {
        echo json_encode(['error' => 'Ошибка при удалении данных']);
    }
} else {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Неверные данные запроса']);
}
?>
