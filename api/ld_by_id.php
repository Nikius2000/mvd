<?
include 'db.php';

if(isset($_GET['fund_number'])){
    function get_ld($connection, $fund_number){
        $list = [];
        $result = pg_query($connection, "SELECT * FROM \"Ld\" where fund_number = $fund_number");
        if(!$result){
            echo 'Ошибка с данными';
            exit;
        }

        while($row = pg_fetch_assoc($result)){
            $list[] = array(
                'fund_number' => $row['fund_number'],
                'inventory_number' => $row['inventory_number'],
                'case_number' => $row['case_number'],
                'case_number_old' => $row['case_number_old'],
                'box_is_numeric_field' => $row['box_is_numeric_field'],
                'f' => $row['f'],
                'i' => $row['i'],
                'o' => $row['o'],
                'date_of_birth' => $row['date_of_birth'],
                'place_of_birth' => $row['place_of_birth'],
                'number_of_sheets' => $row['number_of_sheets'],
                'employee_category' => $row['employee_category'],
                'note' => $row['note']
            );
        }

        return $list;
    }
    
    $fund_number = $_GET['fund_number'];
    echo json_encode(get_ld($connection, $fund_number));
}
?>