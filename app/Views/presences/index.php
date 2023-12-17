<?= $this->extend('layouts/app'); ?>

<?= $this->section('title'); ?>
Presence
<?= $this->endSection('title'); ?>

<?= $this->section('content'); ?>
<section class="section">
  <div class="section-header">
    <h1>Presence</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item">Presence</div>
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
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-hover table-striped table-md">
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Entry Time</th>
                  <th>Out Time</th>
                </tr>
                <?php
                $no = 1;
                foreach ($attendances as $attendance) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $attendance['title'] ?></td>
                    <td><?= $attendance['description'] ?></td>
                    <td><?= $attendance['entry_time'] ?></td>
                    <td><?= $attendance['out_time'] ?></td>
                  </tr>
                <?php endforeach ?>
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