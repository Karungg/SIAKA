<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
          <div class="section-header">
            <h1>Add Attendance</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Attendance</a></div>
              <div class="breadcrumb-item">Add Attendance</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <a href="<?= site_url('attendance') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                      <form action="<?= site_url('attendance/create') ?>" method="post">
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control <?= (isset($validation)) ? 'is-invalid' : '' ?>" name="title" id="title" value="">
                        <div class="invalid-feedback">
                        <?= (isset($validation)) ? $validation->getError('title') : '' ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control <?= (isset($validation)) ? 'is-invalid' : '' ?>" name="description" id="description" value="">
                        <div class="invalid-feedback">
                        <?= (isset($validation)) ? $validation->getError('description') : '' ?>
                        </div>
                      </div>
                      <div class="form-group">
                      <label>Entry Time</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-clock"></i>
                          </div>
                        </div>
                        <input type="text" name="entry_time" class="form-control timepicker <?= (isset($validation)) ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                        <?= (isset($validation)) ? $validation->getError('entry_time') : '' ?>
                        </div>
                      </div>
                    </div>
                      <div class="form-group">
                      <label>Limit Entry Time</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-clock"></i>
                          </div>
                        </div>
                        <input type="text" name="limit_entry_time" class="form-control timepicker <?= (isset($validation)) ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                        <?= (isset($validation)) ? $validation->getError('limit_entry_time') : '' ?>
                        </div>
                      </div>
                    </div>
                      <div class="form-group">
                      <label>Out Time</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-clock"></i>
                          </div>
                        </div>
                        <input type="text" name="out_time" class="form-control timepicker <?= (isset($validation)) ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                        <?= (isset($validation)) ? $validation->getError('out_time') : '' ?>
                        </div>
                      </div>
                    </div>
                      <div class="form-group">
                      <label>Limit Out Time</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-clock"></i>
                          </div>
                        </div>
                        <input type="text" name="limit_out_time" class="form-control timepicker <?= (isset($validation)) ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                        <?= (isset($validation)) ? $validation->getError('limit_out_time') : '' ?>
                        </div>
                      </div>
                    </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </section>
<?= $this->endSection('content'); ?>