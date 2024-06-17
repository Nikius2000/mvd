<? include 'api/db.php'; ?>
<? include 'components/header.php'; ?>

<div id="myModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="modal-close">&times;</button>
            </div>
            <div class="modal-body" id="modalValue">
                
            </div>
        </div>
    </div>
</div>

<?
    if(isset($_GET['p'])){
        if($_GET['p'] == 'ld_search'){
            include 'pages/ld_search.php';
        }elseif($_GET['p'] == 'ld_add'){
            include 'pages/ld_add.php';
        }elseif($_GET['p'] == 'emp_categ_add'){
            include 'pages/emp_categ_add.php';
        }elseif($_GET['p'] == 'emp_categ_search'){
            include 'pages/emp_categ_search.php';
        }else{
            echo 'Страницы' . '"' . $_GET['p'] . '"' . 'нет!';
        }
    }else{
        header('Location: /?p=ld_search');
    }
?>

<? include 'components/footer.php'; ?>