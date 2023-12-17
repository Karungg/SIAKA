<?= $this->extend('layouts/app'); ?>

<?= $this->section('title'); ?>
History
<?= $this->endSection('title'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>History</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">History</div>
        </div>
    </div>
</section>
<?= $this->endSection('content'); ?>