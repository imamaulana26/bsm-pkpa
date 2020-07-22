<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 243px;">
	<!-- Main content -->
	<section class="content p-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<?= $breadcrumb ?>
						</ol>
					</nav>

					<?php if ($this->session->flashdata('error')) : ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('error'); ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>
					<div class="card">
						<form method="post" action="<?= site_url('admin/anggota/update') ?>" class="form-horizontal" autocomplete="off">
							<input type="hidden" class="form-control" name="id" id="id" value="<?= $data['id'] ?>">
							<input type="hidden" class="form-control" name="noloan_kop" id="noloan_kop" value="<?= $data['noloan_kop'] ?>">
							<div class="card-body">
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">No. LOAN</label>
									<div class="col-sm-2">
										<input type="text" class="form-control <?= form_error('noloan') != '' ? 'is-invalid' : '' ?>" name="noloan" id="noloan" value="<?= $data['noloan_anggota'] ?>">
										<?php if (form_error('noloan')) : ?>
											<div class="invalid-feedback"><?= form_error('noloan') ?></div>
										<?php endif; ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">No. CIF</label>
									<div class="col-sm-2">
										<input type="text" class="form-control <?= form_error('nocif') != '' ? 'is-invalid' : '' ?>" name="nocif" id="nocif" value="<?= $data['nocif_anggota'] ?>">
										<?php if (form_error('nocif')) : ?>
											<div class="invalid-feedback"><?= form_error('nocif') ?></div>
										<?php endif; ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Nama Anggota</label>
									<div class="col-sm-4">
										<input type="text" class="form-control <?= form_error('nm_anggota') != '' ? 'is-invalid' : '' ?>" name="nm_anggota" id="nm_anggota" value="<?= $data['nama_anggota'] ?>">
										<?php if (form_error('nm_anggota')) : ?>
											<div class="invalid-feedback"><?= form_error('nm_anggota') ?></div>
										<?php endif; ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Plafond Pencairan</label>
									<div class="col-sm-3 input-group">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">Rp</span>
											</div>
											<input type="text" class="form-control <?= form_error('pencairan_anggota') != '' ? 'is-invalid' : '' ?>" name="pencairan_anggota" id="pencairan_anggota" value="<?= number_format($data['pencairan_anggota'], 0, '.', ',') ?>" onkeypress="return CheckNumeric();" onkeyup="FormatCurrency(this);">
											<?php if (form_error('pencairan_anggota')) : ?>
												<div class="invalid-feedback"><?= form_error('pencairan_anggota') ?></div>
											<?php endif; ?>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">OS Pokok</label>
									<div class="col-sm-3 input-group">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">Rp</span>
											</div>
											<input type="text" class="form-control <?= form_error('ospokok_anggota') != '' ? 'is-invalid' : '' ?>" name="ospokok_anggota" id="ospokok_anggota" value="<?= number_format($data['ospokok_anggota'], 0, '.', ',') ?>" onkeypress="return CheckNumeric();" onkeyup="FormatCurrency(this);">
											<?php if (form_error('ospokok_anggota')) : ?>
												<div class="invalid-feedback"><?= form_error('ospokok_anggota') ?></div>
											<?php endif; ?>
										</div>
									</div>
								</div>

								<div class="form-group row">
									<div class="offset-sm-2 col-sm-4">
										<a href="javascript:void(0)" onclick="return back()" class="btn btn-outline-dark mr-3"><i class="fas fa-fw fa-times"></i> Batal</a>
										<button type="submit" class="btn btn-outline-primary mr-3"><i class="fas fa-fw fa-save"></i> Simpan</button>
									</div>
								</div>
							</div>
							<!-- /.card-body -->
						</form>
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!--/. container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('admin/layout/footer');
$this->load->view('admin/layout/js'); ?>

<script>
	$('#tbl_campaign').DataTable({
		'responsive': true,
		'autoWidth': false,
		'searching': false,
		'ordering': false
	});

	$('input').on('keyup', function() {
		$(this).removeClass('is-invalid');
		$(this).next().empty();
	});

	$('#tgl_cair').on('change', function() {
		$(this).removeClass('is-invalid');
		$(this).next().empty();
	});

	function back() {
		history.go(-1);
	}
</script>

<?php $this->load->view('admin/layout/close'); ?>
