<?
include 'db.php';

if(isset($_GET['id'])){
    function get_emp_categ($connection, $id){
        $list = [];
        $result = pg_query($connection, "SELECT * FROM \"Emp_categ\" where id = $id");
        if(!$result){
            echo 'Ошибка с данными';
            exit;
        }

        while($row = pg_fetch_assoc($result)){
            $list[] = array(
                'id' => $row['id'],
                'text' => $row['text']
            );
        }

        return $list;
    }
    
    $id = $_GET['id'];
    echo json_encode(get_emp_categ($connection, $id));
}
?>