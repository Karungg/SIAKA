<?= $this->extend('layouts/app'); ?>

<?= $this->section('title'); ?>
Dashboard
<?= $this->endSection('title'); ?>

<?= $this->section('content'); ?>
<!-- Section Admin -->
<?php if (in_groups('Admin')) : ?>
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Users</h4>
            </div>
            <div class="card-body">
              <?= $total_user; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Positions</h4>
            </div>
            <div class="card-body">
              <?= $total_position ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Attendance</h4>
            </div>
            <div class="card-body">
              <?= $total_attendance ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif ?>
<!-- End Section Admin -->

<?php if (in_groups('User')) : ?>
  <section class="section">
    <div class="section-header">
      <h1>Attendance</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Attendance</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-hover table-striped table-md">
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Entry Time</th>
                    <th>Out Time</th>
                    <th>Action</th>
                  </tr>
                  <?php
                  $no = 1;
                  foreach ($attendances as $attendance) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $attendance['title'] ?></td>
                      <td><?= $attendance['entry_time'] ?></td>
                      <td><?= $attendance['out_time'] ?></td>
                      <td>
                        <a href="" class="btn btn-success">Present</a>
                      </td>
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
<?php endif; ?>
<?= $this->endSection('content'); ?>