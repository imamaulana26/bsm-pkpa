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
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="<?= site_url('admin/koperasi/tambah') ?>" class="btn btn-sm btn-primary mx-1">Tambah Koperasi</a>
                                <a href="#" class="btn btn-sm btn-info mx-1"><i class="fas fa-fw fa-download"></i> Export CSV</a>
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

                            <table id="tbl_campaign" class="table table-bordered table-hover">
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
                                    <?php for ($i = 1; $i <= 50; $i++) { ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= rand() ?></td>
                                            <td>LD<?= rand() ?></td>
                                            <td>
                                                Anonymous
                                                <div class="dropdown-divider"></div>
                                                <span>Batch <?= $i ?></span>
                                            </td>
                                            <td><?= tgl_indo(date(rand(2010, 2020) . '-' . rand(1, 12) . '-' . rand(1, 31))) ?></td>
                                            <td>Rp. <?= number_format(rand(), 0, ',', '.') ?></td>
                                            <td>Rp. <?= number_format(rand(), 0, ',', '.') ?></td>
                                            <td class="text-center"><a href="#"><?= rand(1, 100) ?> Anngota</a></td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-xs btn-outline-success" title="Sunting"><i class="fas fa-fw fa-edit"></i></a>
                                                <a href="#" class="btn btn-xs btn-outline-danger" title="Hapus"><i class="fas fa-fw fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
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
    $('#tbl_campaign').DataTable({
        'responsive': true,
        'autoWidth': false,
        'searching': true,
        'ordering': false
    });
</script>

<?php $this->load->view('admin/layout/close'); ?>