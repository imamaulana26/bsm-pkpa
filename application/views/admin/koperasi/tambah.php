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

					<div class="card">
						<form method="post" action="<?= site_url('admin/koperasi/save') ?>" class="form-horizontal" autocomplete="off">
							<div class="card-body">
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Nama Koperasi</label>
									<div class="col-sm-4">
										<input type="text" class="form-control <?= form_error('nm_koperasi') != '' ? 'is-invalid' : '' ?>" name="nm_koperasi" id="nm_koperasi" value="<?= set_value('nm_koperasi') ?>">
										<?php if (form_error('nm_koperasi')) : ?>
											<div class="invalid-feedback"><?= form_error('nm_koperasi') ?></div>
										<?php endif; ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">No. LOAN</label>
									<div class="col-sm-3">
										<input type="text" class="form-control <?= form_error('noloan') != '' ? 'is-invalid' : '' ?>" name="noloan" id="noloan" value="<?= set_value('noloan') ?>">
										<?php if (form_error('noloan')) : ?>
											<div class="invalid-feedback"><?= form_error('noloan') ?></div>
										<?php endif; ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">No. CIF</label>
									<div class="col-sm-3">
										<input type="text" class="form-control <?= form_error('nocif') != '' ? 'is-invalid' : '' ?>" name="nocif" id="nocif" value="<?= set_value('nocif') ?>">
										<?php if (form_error('nocif')) : ?>
											<div class="invalid-feedback"><?= form_error('nocif') ?></div>
										<?php endif; ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Jenis Pembiayaan</label>
									<div class="col-sm-4">
										<input type="text" class="form-control <?= form_error('jns_pembiayaan') != '' ? 'is-invalid' : '' ?>" name="jns_pembiayaan" id="jns_pembiayaan" value="<?= set_value('jns_pembiayaan') ?>">
										<?php if (form_error('jns_pembiayaan')) : ?>
											<div class="invalid-feedback"><?= form_error('jns_pembiayaan') ?></div>
										<?php endif; ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Tujuan Pembiayaan</label>
									<div class="col-sm-4">
										<input type="text" class="form-control <?= form_error('tujuan_pembiayaan') != '' ? 'is-invalid' : '' ?>" name="tujuan_pembiayaan" id="tujuan_pembiayaan" value="<?= set_value('tujuan_pembiayaan') ?>">
										<?php if (form_error('tujuan_pembiayaan')) : ?>
											<div class="invalid-feedback"><?= form_error('tujuan_pembiayaan') ?></div>
										<?php endif; ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Batch Pencairan</label>
									<div class="col-sm-2">
										<input type="text" class="form-control <?= form_error('batch') != '' ? 'is-invalid' : '' ?>" name="batch" id="batch" value="<?= set_value('batch') ?>">
										<?php if (form_error('batch')) : ?>
											<div class="invalid-feedback"><?= form_error('batch') ?></div>
										<?php endif; ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Tgl. Pencairan</label>
									<div class="col-sm-3 input-group">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-fw fa-calendar-alt"></i></span>
											</div>
											<input type="text" class="form-control <?= form_error('tgl_cair') != '' ? 'is-invalid' : '' ?>" name="tgl_cair" id="tgl_cair" value="<?= set_value('tgl_cair') ?>">
											<?php if (form_error('tgl_cair')) : ?>
												<div class="invalid-feedback"><?= form_error('tgl_cair') ?></div>
											<?php endif; ?>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Plafond Pencairan</label>
									<div class="col-sm-3 input-group">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">Rp</span>
											</div>
											<input type="text" class="form-control <?= form_error('plafond_cair') != '' ? 'is-invalid' : '' ?>" name="plafond_cair" id="plafond_cair" value="<?= set_value('plafond_cair') ?>">
											<?php if (form_error('plafond_cair')) : ?>
												<div class="invalid-feedback"><?= form_error('plafond_cair') ?></div>
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
											<input type="text" class="form-control <?= form_error('ospokok') != '' ? 'is-invalid' : '' ?>" name="ospokok" id="ospokok" value="<?= set_value('ospokok') ?>">
											<?php if (form_error('ospokok')) : ?>
												<div class="invalid-feedback"><?= form_error('ospokok') ?></div>
											<?php endif; ?>
										</div>
									</div>
								</div>

								<div class="form-group row">
									<div class="offset-sm-2 col-sm-4">
										<button type="submit" class="btn btn-outline-primary"><i class="fas fa-save"></i> Simpan</button>
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
</script>

<?php $this->load->view('admin/layout/close'); ?>
