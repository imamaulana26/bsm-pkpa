<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url('assets/admin/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap -->
<script src="<?= base_url('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- overlayScrollbars -->
<!-- <script src="<?= base_url('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script> -->
<!-- AdminLTE App -->
<script src="<?= base_url('assets/admin/dist/js/adminlte.min.js') ?>"></script>

<!-- OPTIONAL SCRIPTS -->
<!-- <script src="<?= base_url('assets/admin/dist/js/demo.js') ?>"></script> -->

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url('assets/admin/plugins/jquery-mousewheel/jquery.mousewheel.js') ?>"></script>
<script src="<?= base_url('assets/admin/plugins/raphael/raphael.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/plugins/jquery-mapael/jquery.mapael.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/plugins/jquery-mapael/maps/usa_states.min.js') ?>"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/admin/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<!-- Bootsrap Select -->
<script src="<?= base_url('assets/admin/plugins/bootstrap-select/js/bootstrap-select.min.js') ?>"></script>
<!-- Sweetalert2 -->
<script src="<?= base_url('assets/admin/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/admin/plugins/chart.js/Chart.min.js') ?>"></script>

<!-- PAGE SCRIPTS -->
<?php if ($this->uri->segment(2) == 'beranda') : ?>
	<script src="<?= base_url('assets/admin/dist/js/pages/dashboard2.js') ?>"></script>
<?php endif; ?>

<!-- Format Number -->
<script>
	function FormatCurrency(ctrl) {
		//Check if arrow keys are pressed - we want to allow navigation around textbox using arrow keys
		if (event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40) {
			return;
		}

		var val = ctrl.value;

		val = val.replace(/,/g, "")
		ctrl.value = "";
		val += '';
		x = val.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';

		var rgx = /(\d+)(\d{3})/;

		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}

		ctrl.value = x1 + x2;
	}

	function CheckNumeric() {
		return event.keyCode >= 48 && event.keyCode <= 57;
	}
</script>

<?php
$menu = $this->uri->segment(2);
$submenu = $this->uri->segment(3);

// if ($submenu != '') {
//    echo "<script>$('#setting').parents().addClass('menu-open')</script>";
//    echo "<script>$('#setting').addClass('active')</script>";
//    echo "<script>$('#" . strtolower($submenu) . "').addClass('active')</script>";
// } else {
//    echo "<script>$('#" . strtolower($menu) . "').addClass('active')</script>";
// }

if ($menu != '') {
	echo "<script>$('#" . strtolower($menu) . "').addClass('active')</script>";
}
?>
