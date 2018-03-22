<h2><?= $title ?>  </h2>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('post/create'); ?>
<small id="emailHelp" class="form-text text-muted">We'll never share your INFO with anyone else.</small>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Enter Title">
  </div>
  <div class="form-group">
    <label >Message Body</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="add body" ></textarea>
  </div>
  <div class="form-group">
    <select name="catagory_id" class="from-control">
      <?php foreach($catagories as $catagory): ?>
          <option value="<?php echo $catagory['id'] ?>"><?php echo $catagory['name'] ?></option>
     <?php endforeach; ?>
    </select>
  </div>
  <div class="from-group">
    <label>Upload a Image</label>
    <input type="file" name="userfile" size="20">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</form>