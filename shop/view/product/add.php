<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Add Product</h1>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" class="form-control" name="price">
                </div>
                <div class="form-group">
                    <label>Topping</label>
                    <input type="text" class="form-control" name="toppings">
                </div>
                <div class="form-group">
                    <label>Avatar</label>
                    <input type="file" class="form-control" name="avatar">
                </div>
                <div class="form-group">
                    <label>Store</label>
                    <select class="form-control" name="store">
                        <?php foreach($showStore as $value){ ?>
                        <option value="<?php echo $value->getId(); ?>" selected><?php echo $value->getNameStore(); ?>
                        </option>
                        <?php } ?>
                        <option>...</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>