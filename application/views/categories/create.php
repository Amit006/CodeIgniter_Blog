<h2><?= $title; ?> </h2>
<?php validation_errors(); ?>

<?php echo form_open_multipart('categories/create')  ?>
    <div class="form-group">
        <label>Category  Id</label>
        <input type="number" class="form-control" name="cat_id" plcaeholder="Assign an Id">
     </div>
     <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="cat_name" plcaeholder="Enter your Categories Name">
     </div>
     <button class="btn btn-outline-info md-3" type="submit">Submit</button>
</form>     
