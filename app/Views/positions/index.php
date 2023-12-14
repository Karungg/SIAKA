<?= $this->extend('layouts/app'); ?>

<?= $this->section('title'); ?>
Position
<?= $this->endSection('title'); ?>

<?= $this->section('content'); ?>
<section class="section">
  <div class="section-header">
    <h1>Positions</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item">Positions</div>
    </div>
  </div>

  <div class="section-body">

    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <?php if (session()->getFlashdata('success')) : ?>
          <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert">
                <span>&times;</span>
              </button>
              <?= session()->getFlashdata('success') ?>
            </div>
          </div>
        <?php endif; ?>
        <div class="card">
          <div class="card-header">
            <a href="<?= site_url('position/create') ?>" class="btn btn-primary">Add</a>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped table-md">
                <tr>
                  <th>No</th>
                  <th>Name Position</th>
                  <th>Action</th>
                </tr>
                <tr>
                  <?php
                  $no = 1;
                  foreach ($positions as $position) : ?>
                    <td><?= $no++; ?></td>
                    <td><?= $position['name'] ?></td>
                    <td>
                      <a href="<?= site_url('position/edit/' . $position['id']) ?>" class="btn btn-success">Edit</a>
                      <a href="<?= site_url('position/delete/' . $position['id']) ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
              <?php endforeach; ?>
              </table>
            </div>
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
              <?= $pager->links('position', 'bootstrap_pagination') ?>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection('content'); ?>