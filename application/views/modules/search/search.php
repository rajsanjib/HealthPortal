<div class="section">
    <div class="container">
        <div class="row">
            <?php echo form_open('Search/search_doctors'); ?>
                <div class="form-group-lg">
                    <input type="text" name="name" placeholder="Name">
                    <input type="text" name="specialist" placeholder="Specialist">
                    <input type="text" name="hospital" placeholder="Hospital">
                    <button type="submit" class="btn btn-blue">Search</button>
                </div>
            <?php form_close(); ?>
        </div>
    </div>
</div>