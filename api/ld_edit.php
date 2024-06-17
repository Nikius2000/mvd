<?php
include 'db.php';

// Получаем входные данные из тела запроса
$inputData = file_get_contents('php://input');
$inputData = json_decode($inputData, true); // Декодируем JSON-строку в массив

if ($_SERVER['REQUEST_METHOD'] === 'POST' && is_array($inputData)) {
    $params = [
        'fund_number' => $inputData['fund_number'] ?? "",
        'inventory_number' => $inputData['inventory_number'] ?? "",
        'case_number' => $inputData['case_number'] ?? "",
        'case_number_old' => $inputData['case_number_old'] ?? "",
        'box_is_numeric_field' => $inputData['box_is_numeric_field'] ?? "",
        'f' => $inputData['f'] ?? "",
        'i' => $inputData['i'] ?? "",
        'o' => $inputData['o'] ?? "",
        'date_of_birth' => $inputData['date_of_birth'] ?? "",
        'place_of_birth' => $inputData['place_of_birth'] ?? "",
        'number_of_sheets' => $inputData['number_of_sheets'] ?? "",
        'employee_category' => $inputData['employee_category'] ?? "",
        'note' => $inputData['note'] ?? ""
    ];

    // Update database record
    $query = "UPDATE \"Ld\" SET 
              inventory_number = $1, 
              case_number = $2, 
              case_number_old = $3, 
              box_is_numeric_field = $4, 
              f = $5, 
              i = $6, 
              o = $7, 
              date_of_birth = $8, 
              place_of_birth = $9, 
              number_of_sheets = $10, 
              employee_category = $11, 
              note = $12 
              WHERE fund_number = $13";
    
    $values = [
        $params['inventory_number'],
        $params['case_number'],
        $params['case_number_old'],
        $params['box_is_numeric_field'],
        $params['f'],
        $params['i'],
        $params['o'],
        $params['date_of_birth'],
        $params['place_of_birth'],
        $params['number_of_sheets'],
        $params['employee_category'],
        $params['note'],
        $params['fund_number']
    ];

    // Выполнение SQL запроса с параметрами
    $result = pg_query_params($connection, $query, $values);

    if ($result) {
        echo json_encode(['message' => 'Данные успешно обновлены']);
    } else {
        echo json_encode(['error' => 'Ошибка при обновлении данных']);
    }
} else {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Неверные данные запроса.']);
}
?>
