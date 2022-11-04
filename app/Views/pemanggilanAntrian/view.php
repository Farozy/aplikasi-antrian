<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>

<div class="viewData">
	<?= $this->include('pemanggilanAntrian/data'); ?>
</div>
<div class="viewModal"></div>

<?= $this->endSection(); ?>
