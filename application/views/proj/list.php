<!doctype html>
<html lang="en">

<head>
  <?php $this->load->view('includes/header'); ?>
  <title>Codeigniter 3 CRUD Application</title>
</head>

<body>
<?php echo $loginid= $this->session->userdata('logged_in');?>
  <div class="container">
    <div class="row">

      <div class="col-lg-12 my-5">
        <h2 class="text-center mb-3">Codeigniter 3 CRUD (Create-Read-Update-Delete) Application</h2>
      </div>

      <div class="col-lg-12">

        <?php echo $this->session->flashdata('message'); ?>

        <div class="d-flex justify-content-between mb-3">
          <h4>Manage Posts</h4>
          <a href="<?= base_url('newProj/create') ?>" class="btn btn-success"> <i class="fas fa-plus"></i> Add New Post</a>
          <a href="<?= base_url('Admin/logout') ?>" class="btn btn-success">  logout</a>
        </div>

        <table class="table table-bordered table-default">

          <thead class="thead-light">
            <tr>
              <th width="5%">$i</th>
              <th width="19%">name</th>
              <th width="19%">email</th>
              <th width="19%">contact</th>
              <th width="19%">suggestion</th>
              <th width="19%">Action</th>

            </tr>
          </thead>

          <tbody>

            <?php $i = 1; foreach ($data as $post) { ?>

              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $post->name; ?></td>
                <td><?php echo $post->email; ?></td>
                <td><?php echo $post->contact; ?></td>
                <td><?php echo $post->suggestion; ?></td>

                <td>
                  <a href="<?= base_url('Edit/' . $post->id) ?>" class="btn btn-primary"> <i class="fas fa-edit"></i> Edit </a>
                  <a href="<?= base_url('Delete/' . $post->id) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')"> <i class="fas fa-trash"></i> Delete </a>
                </td>

              </tr>

            <?php $i++; } ?>

          </tbody>

        </table>

      </div>
    </div>
  </div>



  <?php $this->load->view('includes/footer'); ?>

</body>

</html>