<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ess Porject</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<!-- //custom style Script    -->
  <link rel='stylesheet' href="<?php echo base_url('assests/css/style.css') ?>">
</head>
<body>
<div class="container">
      <nav class="navbar navbar-light bg-faded rounded navbar-toggleable-md">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#containerNavbar" aria-controls="containerNavbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="<?php echo base_url('assests/images/logo/newAmpsLogoMin.png');?>" class="rounded float-left" alt="NewAmps" style="width:100px;height:60px;"></a>

        <div class="collapse navbar-collapse" id="containerNavbar">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url() ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url()  ?>about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() ?>post">Blog</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() ?>Categories/index">View Category</a>
            </li>
            <?php if($this->session->userdata('logged_in')) :?>
             <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() ?>post/create">Create Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() ?>Categories/create">Create Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() ?>users/logout">Log_out</a>
            </li>
            <?php endif;  ?>
            <?php if(!$this->session->userdata('logged_in')) :?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() ?>users/register">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() ?>users/login">Log_In</a>
            </li>
            <?php endif;  ?>
            
          </ul>
          <form class="form-inline my-2 my-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>







      <div class="conatiner">
          <!-- FLASH MESSAGE  -->
        <?php  if($this->session->flashdata('user_registered')) ?>
        <?php echo '<p class="alert alert-success>'.$this->session->flashdata('user_registered') .'</p>' ;?>
        
        <?php  if($this->session->flashdata('post_created')) ?>
        <?php echo '<p class="alert alert-success>'.$this->session->flashdata('post_created') .'</p>' ;?>
        
        <?php  if($this->session->flashdata('post_updated')) ?>
        <?php echo '<p class="alert alert-success>'.$this->session->flashdata('post_updated') .'</p>' ;?>
        
        <?php  if($this->session->flashdata('category_created')) ?>
        <?php echo '<p class="alert alert-success>'.$this->session->flashdata('category_created') .'</p>' ;?>

         <?php  if($this->session->flashdata('post_deleted')) ?>
        <?php echo '<p class="alert alert-danger>'.$this->session->flashdata('post_deleted') .'</p>' ;?>

        <?php  if($this->session->flashdata('user_failed')) ?>
        <?php echo '<p class="alert alert-warning>'.$this->session->flashdata('user_failed') .'</p>' ;?>

         <?php  if($this->session->flashdata('user_loggedin')) ?>
        <?php echo '<p class="alert alert-success>'.$this->session->flashdata('user_loggedin') .'</p>' ;?>

        <?php  if($this->session->flashdata('user_logout')) ?>
        <?php echo '<p class="alert alert-success>'.$this->session->flashdata('user_logout') .'</p>' ;?>
        
        <?php  if($this->session->flashdata('category_deleted')) ?>
        <?php echo '<p class="alert alert-success>'.$this->session->flashdata('category_deleted') .'</p>' ;?>
      </div>

     

      <div class="jumbotron">
        <div class="col-sm-8 mx-auto">
          <h1>Navbar examples</h1>
          <p>This example is a quick exercise to illustrate how the navbar and its contents work. Some navbars extend the width of the viewport, others are confined within a <code>.container</code>. For positioning of navbars, checkout the <a href="../navbar-top/">top</a> and <a href="../navbar-top-fixed/">fixed top</a> examples.</p>
          <p>At the smallest breakpoint, the collapse plugin is used to hide the links and show a menu button to toggle the collapsed content.</p>
          <p>
            <a class="btn btn-primary" href="../../components/navbar/" role="button">View navbar docs »</a>
          </p>
        </div>
      </div>
