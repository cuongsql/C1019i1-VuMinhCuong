<div class="container">
<div class="row">
    <div class="col-12">
        <h1>Edit Product</h1>
        <form method="POST">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $product->getName() ?>">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control" name="price" value="<?php echo $product->getPrice() ?>">
            </div>
            <div class="form-group">
                <label>Topping</label>
                <input type="text" class="form-control" name="toppings" value="<?php echo $product->getToppings() ?>">
            </div>
            <div class="form-group">
                <label>Store</label>
                <select class="form-control" name="editStore">
                    <?php foreach($showStore as $value){ ?>
                    <option value="<?php echo $value->getId(); ?>" selected><?php echo $value->getNameStore(); ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</div>