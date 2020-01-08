<form method="POST">
    <div class="text-right form-group">
        <!-- <label class="text-capitalize">Sort By</label> -->
        <select class="btn btn-dark" name="sortBy">
            <option value="ORDER BY name ASC" <?php if ($sortBy == 'ORDER BY name ASC'): ?>selected<?php endif; ?>>Name ASC</option>
            <option value="ORDER BY name DESC" <?php if ($sortBy == 'ORDER BY name DESC'): ?>selected<?php endif; ?>>Name DESC</option>
            <option value="ORDER BY price ASC" <?php if ($sortBy == 'ORDER BY price ASC'): ?>selected<?php endif; ?>>Price ASC</option>
            <option value="ORDER BY price DESC" <?php if ($sortBy == 'ORDER BY price DESC'): ?>selected<?php endif; ?>>Price DESC</option>
        </select>
        <button type="submit" class="btn btn-secondary">Submit</button>
    </div>
</form>