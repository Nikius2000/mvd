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
        'f' => $inputData['f'] ?? "",
        'i' => $inputData['i'] ?? "",
        'o' => $inputData['o'] ?? "",
        'date_of_birth' => $inputData['date_of_birth'] ?? "",
        'place_of_birth' => $inputData['place_of_birth'] ?? ""
    ];

    function get_ld($connection, $params) {
        $list = [];
        $conditions = [];

        foreach ($params as $key => $value) {
            if (!empty($value)) {
                $escapedValue = pg_escape_string($connection, $value);
                $conditions[] = "$key = '$escapedValue'";
            }
        }

        $query = "SELECT * FROM \"Ld\"";
        if (!empty($conditions)) {
            $whereClause = implode(" AND ", $conditions);
            $query .= " WHERE $whereClause";
        } else {
            echo json_encode(['message' => 'Нет условий для поиска']);
            exit;
        }

        // Debugging: output the query
        error_log("Executing query: $query");

        $result = pg_query($connection, $query);

        if (!$result) {
            echo json_encode(['error' => 'Ошибка с данными']);
            exit;
        }

        while ($row = pg_fetch_assoc($result)) {
            $list[] = $row;
        }

        return $list;
    }

    $result = get_ld($connection, $params);

    if (!empty($result)) {
        echo json_encode($result);
    } else {
        echo json_encode(['message' => 'Данные не найдены']);
    }
} else {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Неверные данные запроса.']);
}
?>
