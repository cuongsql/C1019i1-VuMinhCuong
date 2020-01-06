<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Edit Store</h1>
            <form method="POST">
                    <div class="form-group">
                        <label>Name Store</label>
                        <input type="text" class="form-control" name="nameStore" value="<?php echo $store->getNameStore() ?>">
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>