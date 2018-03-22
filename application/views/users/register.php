<h2><?=  $title;   ?></h2>
<?php echo validation_errors(); ?>
<!-- <div class="row"> -->
<?php echo form_open('users/register'); ?>
    <div class="form-group">
        <label>User Name</label>
        <input type="text" class="form-control" name="usrname" placeholder="User Name">
    </div>
    <div class="form-group">
            <label>Zip Code</label>
            <input type="number" class="form-control" name="zipcode" placeholder="User Name">
    </div> 
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" placeholder="Full Name">
    </div>
    <div class="form-group">
            <label>Email</label>
            <input type="Email" class="form-control" name="usr_Email" placeholder="User Email">
    </div> 
    <div class="form-group">
            <label>Password </label>
            <input type="password" class="form-control" name="usr_password" placeholder="password">
    </div> 
    <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" name="usr_con_password" placeholder="confirm password">
    </div> 
    <button type="submit"   class="btn btn-primary">Submit</button>
<?php echo form_close(); ?>
<!-- </div> -->
