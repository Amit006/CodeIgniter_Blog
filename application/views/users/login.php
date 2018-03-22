
<div class="row">
<div class="offset-md-4 col-md-4">
<?php echo validation_errors(); ?>
<?php echo form_open("users/login");  ?>
        
            <h1 class="text-center"><?php echo $title ?> </h1>
            <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Enter UserName" required autofocus>
            </div>
            <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Enter password" required autofocus>
            </div>
            <button type ="submit" class="btn btn-outline-info btn-block" >Login</button>
        </div>
<?php echo form_close(); ?>
</div>
</div>