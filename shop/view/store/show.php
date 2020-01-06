<div class="col-2 px-0">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
    <a href="/shop"><h5 class="text-white h4">Milk Tea Store</h5></a>
      <a href="/shop/index.php?page=addProduct" class="btn btn-info">Product</a>
      <a href="/shop/index.php?page=addstore" class="btn btn-info">Add Store</a>
    </div>
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>

    <div class="bg-dark p-4 h-100">
        <?php foreach($store as $value){ ?>
        <a class="nav-link btn btn-secondary"
            href="index.php?store=<?php echo $value->getID() ?>"><?php echo $value->getNameStore() ?></a>
            <br/>
        <?php } ?>
    </div>
</div>
