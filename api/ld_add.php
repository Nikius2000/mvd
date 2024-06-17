<?
include 'db.php';

function checkIdExists($id) {
    global $connection;
    
    // Экранирование входных данных для предотвращения SQL инъекций
    $escaped_id = $id;

    // Формирование SQL запроса для проверки наличия ID в базе
    $query = "SELECT COUNT(*) FROM" . '"Ld"' ." WHERE fund_number = '$escaped_id'";
    
    // Выполнение запроса
    $result = pg_query($connection, $query);
    
    if ($result) {
        // Получение результата запроса
        $row = pg_fetch_row($result);
        $count = $row[0];
        
        // Если количество найденных строк равно 1, значит ID существует, возвращаем 1, иначе возвращаем 0
        return ($count == 1) ? 1 : 0;
    } else {
        // В случае ошибки выполнения запроса
        return -1;
    }
}

// Проверяем, что запрос был выполнен методом POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Получаем данные из тела запроса
    $inputData = $_POST['inputData'];

    $fund_number = $inputData[0];
    $inventory_number = $inputData[1];
    $case_number = $inputData[2];
    $case_number_old = $inputData[3];
    $box_is_numeric_field = $inputData[4];
    $f = $inputData[5];
    $i = $inputData[6];
    $o = $inputData[7];
    $date_of_birth = $inputData[8];
    $place_of_birth = $inputData[9];
    $number_of_sheets = $inputData[10];
    $employee_category = $inputData[11];
    $note = $inputData[12];

    $check_result = checkIdExists($fund_number);

    if($check_result){
        error_log("Ошибка, такое дело уже есть!");
        echo $check_result;
    }else{
        $sql = "INSERT INTO " . '"Ld"' . " (fund_number, inventory_number, case_number, case_number_old, box_is_numeric_field, f, i, o, date_of_birth, place_of_birth, number_of_sheets, employee_category, note)
        VALUES ($fund_number, $inventory_number, $case_number, $case_number_old, $box_is_numeric_field, '$f', '$i', '$o', '$date_of_birth', '$place_of_birth', $number_of_sheets, $employee_category, '$note')";

        $result = pg_query($connection, $sql);

        if ($result) {
            echo "Данные успешно добавлены в таблицу ld.";
        } else {
            echo "Произошла ошибка при добавлении данных: " . pg_last_error($connection);
        }

        error_log("Полученные данные: " . print_r($inputData, true));
        echo "Данные успешно получены на сервере.";
    }
} else {
    // Если запрос не был выполнен методом POST, возвращаем ошибку
    http_response_code(400); // Bad Request
    echo "Ошибка: Неверный метод запроса.";
}

?>