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
            <?= validation_errors() ?>

            <form method="post" action="<?= site_url('admin/koperasi/save') ?>" class="form-horizontal" autocomplete="off">
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Koperasi</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nm_koperasi" id="nm_koperasi">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">No. LOAN</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="noloan" id="noloan">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">No. CIF</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="nocif" id="nocif">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jenis Pembiayaan</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="jns_pembiayaan" id="jns_pembiayaan">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tujuan Pembiayaan</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="tujuan_pembiayaan" id="tujuan_pembiayaan">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Batch Pencairan</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="batch" id="batch">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tgl. Pencairan</label>
                  <div class="col-sm-3 input-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-fw fa-calendar-alt"></i></span>
                      </div>
                      <input type="text" class="form-control" name="tgl_cair" id="tgl_cair">
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
                      <input type="text" class="form-control" name="plafond_cair" id="plafond_cair">
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
                      <input type="text" class="form-control" name="ospokok" id="ospokok">
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
</script>

<?php $this->load->view('admin/layout/close'); ?>