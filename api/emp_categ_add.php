<?
include 'db.php';

function checkIdExists($id) {
    global $connection;
    
    // Экранирование входных данных для предотвращения SQL инъекций
    $escaped_id = $id;

    // Формирование SQL запроса для проверки наличия ID в базе
    $query = "SELECT COUNT(*) FROM" . '"Emp_categ"' ." WHERE id = '$escaped_id'";
    
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

    $id = $inputData[0];
    $text = $inputData[1];

    $check_result = checkIdExists($id);

    if($check_result){
        error_log("Ошибка, такое уже есть!");
        echo $check_result;
    }else{
        $sql = "INSERT INTO " . '"Emp_categ"' . " (id, text)
        VALUES ($id, '$text')";

        $result = pg_query($connection, $sql);

        if ($result) {
            echo "Данные успешно добавлены в таблицу Emp_categ.";
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