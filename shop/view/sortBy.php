<form method="POST">
    <div class="text-right form-group">
        <!-- <label class="text-capitalize">Sort By</label> -->
        <select class="btn btn-dark" name="sortBy">
            <option value="name ASC" <?php if ($sortBy == 'name ASC'): ?>selected<?php endif; ?>>Name ASC</option>
            <option value="name DESC" <?php if ($sortBy == 'name DESC'): ?>selected<?php endif; ?>>Name DESC</option>
            <option value="price ASC" <?php if ($sortBy == 'price ASC'): ?>selected<?php endif; ?>>Price ASC</option>
            <option value="price DESC" <?php if ($sortBy == 'price DESC'): ?>selected<?php endif; ?>>Price DESC</option>
        </select>
        <button type="submit" class="btn btn-secondary">Submit</button>
    </div>
</form>