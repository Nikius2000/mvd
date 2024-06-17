<?
$connection = pg_connect("host=localhost dbname=mvd user=postgres password=123");

if(!$connection){
    echo 'Ошибка с подключением';
    exit;
}

?>