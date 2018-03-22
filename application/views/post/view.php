<!-- <?php print_r($data_posts['title']); ?>  -->
<div class="row">
<div class="col-md-3">
     <img class="profile-pic img-thumbnail" src="<?php echo site_url(); ?>assests/images/posts/<?php echo $data_posts['post_image'] ?>">
</div>
<div class="col-md-9">
    <div class="post-body">
        <h2><?php echo $data_posts['title'] ?></h2>
        <p class="lagend text-info"><?php echo $data_posts['body']; ?></p>
        <small class="text-warning">Posted on <?php echo $data_posts['created_at']; ?> in <strong> <?php echo $data_posts['name']; ?></strong></small>
    </div>
</div>
</div>
<hr>
<?php if($this->session->userdata('user_id') == $data_posts['user_id']) : ?>
<div class="col-md-offset-2 col-md-4 auto">
<a class="btn btn-secondary btn-md float-left" href="<?php echo base_url();?>post/edit/<?php echo $data_posts['slug'];?>">Edit Content</a> 
<?php  echo form_open('/post/delete/'.$data_posts['id']); ?>
   <input type="submit" value="delete" class="btn btn-danger btn-md float-right" >  
</form>
<?php endif; ?>
<br><br><br>
</div>
<hr>
<div class="row">
<div class="col-md-8">
    <h3>comments</h3>
    <?php if($comments) :?>
        <?php foreach($comments as $comment) :?>
        <div class="card card-body bg-light">
            <h5 class="text-success"><?php echo $comment['body'];  ?>   [by <strong class="text-info"><?php echo $comment['name']; ?></strong> ]</h5>
        </div>
        <?php  endforeach ?>    
    <?php else :  ?>
        <p>No commants to Display </p>
    <?php endif; ?>  
</div>
</div>
<hr>
<h3>ADD Comment</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$data_posts['id']); ?> 
  <div class="from-group">  
    <label>Name</label>
    <input type="text" name="user_name" placeholder="Please Enter Your Name">
  </div>
  <div class="from-group">
    <label>Email</label>
    <input type="email" name="user_email" placeholder="Please Enter Your Email">
  </div>
  <div class="from-group">
    <label>Body</label>
    <textarea class="form-control" name="comment_body" placeholder="Please Enter Your Name"></textarea>
  </div>
<input type="hidden" name="slug" value="<?php echo $data_posts['slug']; ?> " >
<button class="btn btn-bg-primary" type="submit">Comment</button>
</form>