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
								<a href="<?= site_url('admin/koperasi/tambah') ?>" class="btn btn-sm btn-primary mx-1">Tambah Koperasi</a>
								<!-- <a href="#" class="btn btn-sm btn-info mx-1"><i class="fas fa-fw fa-download"></i> Export CSV</a> -->
							</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<!-- search -->
							<!-- <div class="row">
                                <form class="form-horizontal col-md-4" method="post" action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-outline-info" type="button"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-md-2 p-0">
                                    <span class="btn btn-sm btn-outline-info" id="export"><i class="fas fa-download"></i> Export CSV</span>
                                </div>
                            </div> -->
							<!-- /.seach -->

							<table id="tbl_sample" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>No. CIF</th>
										<th>No. LOAN</th>
										<th>Nama Koperasi</th>
										<th>Tgl. Pencairan</th>
										<th>Plafond Pencairan</th>
										<th>OS Pokok</th>
										<th class="text-center">Anggota</th>
										<th class="text-center">Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($list as $li) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $li['cif'] ?></td>
											<td><?= $li['noloan'] ?></td>
											<td>
												<?= $li['nm_koperasi'] ?>
												<div class="dropdown-divider"></div>
												<span>Batch <?= $li['batch_cair'] ?></span>
											</td>
											<td><?= tgl_indo($li['tgl_pencairan']) ?></td>
											<td>Rp. <?= number_format($li['plafond_cair'], 0, ',', '.') ?></td>
											<td>Rp. <?= number_format($li['ospokok'], 0, ',', '.') ?></td>
											<td class="text-center"><a href="<?= site_url('admin/koperasi/') . $li['noloan'] ?>"><?= $li['anggota'] ?> Anggota</a></td>
											<td class="text-center">
												<a href="<?= site_url('admin/koperasi/sunting/') . $li['noloan'] ?>" class="btn btn-xs btn-outline-success" title="Sunting"><i class="fas fa-fw fa-edit"></i></a>
												<a href="javascript:void(0)" onclick="hapus('<?= $li['noloan'] ?>')" class="btn btn-xs btn-outline-danger" title="Hapus"><i class="fas fa-fw fa-trash"></i></a>
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
					url: "<?= site_url('admin/koperasi/delete/') ?>" + id,
					type: "POST",
					dataType: "JSON",
					success: function(data) {
						if (data.status == true) {
							Swal.fire({
								icon: 'success',
								title: 'Data koperasi berhasil dihapus',
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
