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

					<?php if ($this->session->flashdata('msg')) : ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('msg'); ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>

					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
								<b><?= $list['koperasi']['nm_koperasi'] . ' - Batch ' . $list['koperasi']['batch_cair'] ?></b>
							</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<a href="<?= site_url('admin/anggota/tambah/') . $list['koperasi']['noloan'] ?>" class="btn btn-sm btn-primary mb-3 mr-2">Tambah Anggota</a>
							<a href="#" class="btn btn-sm btn-info mb-3 mr-2">Upload Anggota</a>
							<a href="#" class="btn btn-sm btn-success float-right">Export CVS</a>

							<table id="tbl_sample" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>No. CIF</th>
										<th>No. LOAN</th>
										<th>Nama Anggota</th>
										<th>Tgl. Pencairan</th>
										<th>Plafond Pencairan</th>
										<th>OS Pokok</th>
										<th class="text-center">Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($list['anggota'] as $li) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $li['nocif_anggota'] ?></td>
											<td><?= $li['noloan_anggota'] ?></td>
											<td><?= $li['nama_anggota'] ?></td>
											<td><?= tgl_indo($list['koperasi']['tgl_pencairan']) ?></td>
											<td>Rp. <?= number_format($li['pencairan_anggota'], 0, ',', '.') ?></td>
											<td>Rp. <?= number_format($li['ospokok_anggota'], 0, ',', '.') ?></td>
											<td class="text-center">
												<a href="#" class="btn btn-xs btn-outline-info" title="Mutasi"><i class="fas fa-fw fa-list"></i></a>
												<a href="<?= site_url('admin/anggota/sunting/') . $li['noloan_anggota'] ?>" class="btn btn-xs btn-outline-success" title="Sunting"><i class="fas fa-fw fa-edit"></i></a>
												<a href="javascript:void(0)" onclick="hapus('<?= $li['noloan_anggota'] ?>')" class="btn btn-xs btn-outline-danger" title="Hapus"><i class="fas fa-fw fa-trash"></i></a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
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
	$('#tbl_sample').DataTable({
		'responsive': true,
		'autoWidth': false,
		'searching': true,
		'ordering': false
	});

	function hapus(id) {
		Swal.fire({
			title: 'Anda yakin ingin menghapus data ini?',
			text: "Data yang terhapus tidak dapat dikembalikan!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus',
			cancelButtonText: 'Tidak'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: "<?= site_url('admin/anggota/delete/') ?>" + id,
					type: "POST",
					dataType: "JSON",
					success: function(data) {
						if (data.status == true) {
							Swal.fire({
								icon: 'success',
								title: 'Data anggota koperasi berhasil dihapus',
								showConfirmButton: false,
								timer: 1500
							}).then(function() {
								location.reload();
							})
						}
					}
				});
			}
		})
	}
</script>

<?php $this->load->view('admin/layout/close'); ?>
