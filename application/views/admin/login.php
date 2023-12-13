<!doctype html>
<html lang="en">

<head>
  <?php $this->load->view('includes/header'); ?>
  <title>Login Portal</title>
</head>

<body class="bg-light">
  <div class="container border rounded p-4">
    <div class="row justify-content-center align-items-center min-vh-100">
      <div class="col-md-6">
<form method="post" action="<?php echo base_url('Admin/login_auth'); ?>">
<?php if($error=$this->session->flashdata('message')){?>
    <?php if($msg=$this->session->flashdata('msg_class')){?>
        <div class="alert <?=$msg?>">
        <?=$error;?>
        </div>
        <?php }}?>
  <div class="mb-3">
    <label for="username" class="form-label">username</label>
    <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username')?>" aria-describedby="emailHelp">
    <?= form_error('username')?>
    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" value="<?= set_value('password')?>">
    <?= form_error('password')?>
  </div>
  <div class="mb-3">
    <label for="Email" class="form-label"> Email</label>
    <input type="email" class="form-control" id="Email" name="email" value="<?= set_value('email')?>">
    <?= form_error('email')?>
  </div>
  <button type="submit" class="btn btn-success">login</button>
  

</form>
<div class="d-flex mt-3">
    <a href="<?= base_url('Admin/index')?>" class="m-auto"> creat an account</a>
  </div>

<?php $this->load->view('includes/footer'); ?>

</body>

</html>