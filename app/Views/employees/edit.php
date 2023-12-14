<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Edit Employee</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Employee</a></div>
            <div class="breadcrumb-item">Edit Employee</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= site_url('employee') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('employee/edit/' . $employee->id) ?>" method="post">
                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input type="text" class="form-control <?= (isset($validation)) ? 'is-invalid' : '' ?>" name="fullname" id="fullname" value="<?= $employee->fullname ?>">
                                <div class="invalid-feedback">
                                    <?= (isset($validation)) ? $validation->getError('fullname') : '' ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control <?= (isset($validation)) ? 'is-invalid' : '' ?>" name="email" id="email" value="<?= $employee->email ?>">
                                <div class="invalid-feedback">
                                    <?= (isset($validation)) ? $validation->getError('email') : '' ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control <?= (isset($validation)) ? 'is-invalid' : '' ?>" name="username" id="username" value="<?= $employee->username ?>">
                                <div class="invalid-feedback">
                                    <?= (isset($validation)) ? $validation->getError('username') : '' ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="number" class="form-control <?= (isset($validation)) ? 'is-invalid' : '' ?>" name="phone" id="phone" value="<?= $employee->phone ?>">
                                <div class="invalid-feedback">
                                    <?= (isset($validation)) ? $validation->getError('phone') : '' ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password_hash">Password</label>
                                <input type="password" class="form-control <?= (isset($validation)) ? 'is-invalid' : '' ?>" name="password_hash" id="password_hash" value="">
                                <div class="invalid-feedback">
                                    <?= (isset($validation)) ? $validation->getError('password_hash') : '' ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <select class="form-control" name="position_id">
                                    <?php
                                    foreach ($positions as $position) : ?>
                                        <option value="<?= $position['id'] ?>"><?= $position['name'] ?></option>
                                    <?php endforeach ?>
                                </select>
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