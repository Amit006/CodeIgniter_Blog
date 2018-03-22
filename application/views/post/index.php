<h1 class="text-success"> this is <span class="text-danger"><?= $title ?></span> page</h1>
<?php foreach ($data_post as $key ) : ?>
<div class="row">
<div class="col-md-3">
    <img class="profile-pic img-thumbnail" src="<?php echo site_url(); ?>assests/images/posts/<?php echo $key['post_image'] ?>">
</div>
<div class="col-md-9 ">
<h3><?php  echo $key['title']; ?></h3>
<small>Posted on <?php echo $key['created_at']; ?> in <strong> <?php echo $key['name'] ?></strong></small>
<p class="lagend text-info">
    <span class="text-danger">Post Content: </span></br> <?php  echo word_limiter($key['body'],50) ?> 
</p>
<p class="lagend"><a class="btn btn-info" href="<?php echo site_url('/post/'.$key['slug']); ?>" > Read More</a></p>
</div>
</div>
<?php endforeach; ?>
<div class="pagination-links">
<?php echo $this->pagination->create_links(); ?>
</div>

