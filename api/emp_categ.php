<?
include 'db.php';
function get_category($connection){
    $categories = [];
    $result = pg_query($connection, 'SELECT * FROM "Emp_categ"');
    if(!$result){
        echo 'Ошибка с данными';
        exit;
    }

    while($row = pg_fetch_assoc($result)){
        $categories[] = array($row['id'], $row['text']);
    }

    return $categories;
}
echo json_encode(get_category($connection));
?>