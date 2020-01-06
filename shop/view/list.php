<h1 class="text-center"><?php echo $store->getNameStore() ?> Menu <a class="btn btn-warning"
        href="index.php?page=editStore&id=<?php echo $store->getId() ?>">Edit</a>
    <a href="index.php?page=deleteStore&id=<?php echo $store->getId() ?>"
        onclick="return confirm('Ban chac chan muon xoa khong')" class="btn btn-danger">Delete</a></h1>
<br />

<div class="row row-cols-1 row-cols-md-4">
    <?php foreach($list as $value){ ?>
    <div class="col">
        <div class="card text-white bg-dark mb-3">
            <img src="https://vnn-imgs-f.vgcloud.vn/2019/10/06/08/tra-sua.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5><small>MT-<?php echo $value->getId() ?></small></h5>
                <h4 class="card-title"><?php echo $value->getName() ?></h4>
                <a class="btn btn-success" href="index.php?page=editProduct&id=<?php echo $value->getId() ?>">Edit</a>
                <a href="index.php?page=deleteProduct&id=<?php echo $value->getId() ?>"
                    onclick="return confirm('Ban chac chan muon xoa khong')" class="btn btn-danger">Delete</a>
                <hr color="red" />
                <div class="card-text">
                    <strong>Toppings:</strong><br />
                    <?php echo $value->getToppings() ?>

                    <h6 class="text-right">$<?php echo $value->getPrice() ?></h6>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

</div>