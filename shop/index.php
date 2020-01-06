<?php
include_once 'header.php';
$page = isset($_GET['page']) ? $_GET['page'] : null;

?>
<div class="container-fluid">
    <div class="row">
        <?php $orderManager->showStore(); ?>
        <div class="col-10 bg-light">
            <?php
            switch ($page) {
                case "editStore":
                    $orderManager->editStore();
                    break;
                case "deleteStore":
                    $orderManager->deleteStore();
                    break;
                case "addstore":
                    $orderManager->addStore();
                    break;
                case "addProduct":
                    $orderManager->addProduct();
                    break;
                case "editProduct":
                    $orderManager->editProduct();
                    break;
                case "deleteProduct":
                    $orderManager->deleteProduct();
                    break;
                default:
                    $orderManager->index();
            }
            ?>
        </div>
    </div>
</div>
</body>

</html>