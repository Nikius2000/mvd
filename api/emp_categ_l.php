<?
include 'db.php';

function get_emp_categ($connection){
    $list = [];
    $result = pg_query($connection, 'SELECT * FROM "Emp_categ"');
    if(!$result){
        echo 'Ошибка с данными';
        exit;
    }

    while($row = pg_fetch_assoc($result)){
        $list[] = array($row['id'], $row['text']);
    }

    return $list;
}
echo json_encode(get_emp_categ($connection));
?>