<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Edit Product</h1>
            <form method="POST" enctype="multipart/form-data">
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
                    <input type="text" class="form-control" name="toppings"
                        value="<?php echo $product->getToppings() ?>">
                </div>
                <div class="form-group">
                    <label><img onClick="triggerClick()" id="Display" src="view/images/<?php echo $product->getAvatar() ?>" class="img-thumbnail avatar" alt="<?php echo $product->getName() ?>"></label>
                    <input type="file" class="form-control" onChange="displayImage(this)" id="idImage" name="avatar">
                </div>
                <div class="form-group">
                    <label>Store</label>
                    <select class="form-control" name="editStore">
                        <?php foreach($showStore as $value){ ?>
                        <option value="<?php echo $value->getId(); ?>"
                            <?php if ($storeProduct->getShop_id() == $value->getId()): ?>selected<?php endif; ?>>
                            <?php echo $value->getNameStore(); ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
function triggerClick(e) {
    document.querySelector('#idImage').click();
}

function displayImage(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('#Display').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}
</script>