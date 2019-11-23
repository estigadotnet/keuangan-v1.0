<?php
namespace PHPMaker2020\p_keuangan_v1_0;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start();

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$t102_mutasi_view = new t102_mutasi_view();

// Run the page
$t102_mutasi_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_mutasi_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t102_mutasi_view->isExport()) { ?>
<script>
var ft102_mutasiview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft102_mutasiview = currentForm = new ew.Form("ft102_mutasiview", "view");
	loadjs.done("ft102_mutasiview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t102_mutasi_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t102_mutasi_view->ExportOptions->render("body") ?>
<?php $t102_mutasi_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t102_mutasi_view->showPageHeader(); ?>
<?php
$t102_mutasi_view->showMessage();
?>
<form name="ft102_mutasiview" id="ft102_mutasiview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_mutasi">
<input type="hidden" name="modal" value="<?php echo (int)$t102_mutasi_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t102_mutasi_view->Tanggal->Visible) { // Tanggal ?>
	<tr id="r_Tanggal">
		<td class="<?php echo $t102_mutasi_view->TableLeftColumnClass ?>"><span id="elh_t102_mutasi_Tanggal"><?php echo $t102_mutasi_view->Tanggal->caption() ?></span></td>
		<td data-name="Tanggal" <?php echo $t102_mutasi_view->Tanggal->cellAttributes() ?>>
<span id="el_t102_mutasi_Tanggal">
<span<?php echo $t102_mutasi_view->Tanggal->viewAttributes() ?>><?php echo $t102_mutasi_view->Tanggal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t102_mutasi_view->NoUrut->Visible) { // NoUrut ?>
	<tr id="r_NoUrut">
		<td class="<?php echo $t102_mutasi_view->TableLeftColumnClass ?>"><span id="elh_t102_mutasi_NoUrut"><?php echo $t102_mutasi_view->NoUrut->caption() ?></span></td>
		<td data-name="NoUrut" <?php echo $t102_mutasi_view->NoUrut->cellAttributes() ?>>
<span id="el_t102_mutasi_NoUrut">
<span<?php echo $t102_mutasi_view->NoUrut->viewAttributes() ?>><?php echo $t102_mutasi_view->NoUrut->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t102_mutasi_view->jo_id->Visible) { // jo_id ?>
	<tr id="r_jo_id">
		<td class="<?php echo $t102_mutasi_view->TableLeftColumnClass ?>"><span id="elh_t102_mutasi_jo_id"><?php echo $t102_mutasi_view->jo_id->caption() ?></span></td>
		<td data-name="jo_id" <?php echo $t102_mutasi_view->jo_id->cellAttributes() ?>>
<span id="el_t102_mutasi_jo_id">
<span<?php echo $t102_mutasi_view->jo_id->viewAttributes() ?>><?php echo $t102_mutasi_view->jo_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t102_mutasi_view->jenis_id->Visible) { // jenis_id ?>
	<tr id="r_jenis_id">
		<td class="<?php echo $t102_mutasi_view->TableLeftColumnClass ?>"><span id="elh_t102_mutasi_jenis_id"><?php echo $t102_mutasi_view->jenis_id->caption() ?></span></td>
		<td data-name="jenis_id" <?php echo $t102_mutasi_view->jenis_id->cellAttributes() ?>>
<span id="el_t102_mutasi_jenis_id">
<span<?php echo $t102_mutasi_view->jenis_id->viewAttributes() ?>><?php echo $t102_mutasi_view->jenis_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t102_mutasi_view->Comment->Visible) { // Comment ?>
	<tr id="r_Comment">
		<td class="<?php echo $t102_mutasi_view->TableLeftColumnClass ?>"><span id="elh_t102_mutasi_Comment"><?php echo $t102_mutasi_view->Comment->caption() ?></span></td>
		<td data-name="Comment" <?php echo $t102_mutasi_view->Comment->cellAttributes() ?>>
<span id="el_t102_mutasi_Comment">
<span<?php echo $t102_mutasi_view->Comment->viewAttributes() ?>><?php echo $t102_mutasi_view->Comment->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t102_mutasi_view->Masuk->Visible) { // Masuk ?>
	<tr id="r_Masuk">
		<td class="<?php echo $t102_mutasi_view->TableLeftColumnClass ?>"><span id="elh_t102_mutasi_Masuk"><?php echo $t102_mutasi_view->Masuk->caption() ?></span></td>
		<td data-name="Masuk" <?php echo $t102_mutasi_view->Masuk->cellAttributes() ?>>
<span id="el_t102_mutasi_Masuk">
<span<?php echo $t102_mutasi_view->Masuk->viewAttributes() ?>><?php echo $t102_mutasi_view->Masuk->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t102_mutasi_view->Keluar->Visible) { // Keluar ?>
	<tr id="r_Keluar">
		<td class="<?php echo $t102_mutasi_view->TableLeftColumnClass ?>"><span id="elh_t102_mutasi_Keluar"><?php echo $t102_mutasi_view->Keluar->caption() ?></span></td>
		<td data-name="Keluar" <?php echo $t102_mutasi_view->Keluar->cellAttributes() ?>>
<span id="el_t102_mutasi_Keluar">
<span<?php echo $t102_mutasi_view->Keluar->viewAttributes() ?>><?php echo $t102_mutasi_view->Keluar->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t102_mutasi_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t102_mutasi_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$t102_mutasi_view->terminate();
?>