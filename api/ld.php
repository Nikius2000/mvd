<?
include 'db.php';

function get_ld($connection){
    $list = [];
    $result = pg_query($connection, 'SELECT * FROM "Ld"');
    if(!$result){
        echo 'Ошибка с данными';
        exit;
    }

    while($row = pg_fetch_assoc($result)){
        $list[] = array($row['fund_number'], $row['inventory_number'], $row['case_number'], $row['case_number_old'], $row['box_is_numeric_field'], $row['f'], $row['i'], $row['o'], $row['date_of_birth'], $row['place_of_birth'], $row['number_of_sheets'], $row['employee_category'], $row['note']);
    }

    return $list;
}
echo json_encode(get_ld($connection));
?>