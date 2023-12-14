<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
          <div class="section-header">
            <h1>Add Positions</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Position</a></div>
              <div class="breadcrumb-item">Add Positions</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <a href="<?= site_url('position') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                      <form action="<?= site_url('position/create') ?>" method="post">
                      <div class="form-group">
                        <label for="position">Name Position</label>
                        <input type="text" class="form-control <?= (isset($validation)) ? 'is-invalid' : '' ?>" name="position" id="position" value="">
                        <div class="invalid-feedback">
                        <?= (isset($validation)) ? $validation->getError('position') : '' ?>
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