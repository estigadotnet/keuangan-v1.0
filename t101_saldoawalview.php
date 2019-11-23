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
$t101_saldoawal_view = new t101_saldoawal_view();

// Run the page
$t101_saldoawal_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_saldoawal_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t101_saldoawal_view->isExport()) { ?>
<script>
var ft101_saldoawalview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft101_saldoawalview = currentForm = new ew.Form("ft101_saldoawalview", "view");
	loadjs.done("ft101_saldoawalview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t101_saldoawal_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t101_saldoawal_view->ExportOptions->render("body") ?>
<?php $t101_saldoawal_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t101_saldoawal_view->showPageHeader(); ?>
<?php
$t101_saldoawal_view->showMessage();
?>
<form name="ft101_saldoawalview" id="ft101_saldoawalview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_saldoawal">
<input type="hidden" name="modal" value="<?php echo (int)$t101_saldoawal_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t101_saldoawal_view->Tanggal->Visible) { // Tanggal ?>
	<tr id="r_Tanggal">
		<td class="<?php echo $t101_saldoawal_view->TableLeftColumnClass ?>"><span id="elh_t101_saldoawal_Tanggal"><?php echo $t101_saldoawal_view->Tanggal->caption() ?></span></td>
		<td data-name="Tanggal" <?php echo $t101_saldoawal_view->Tanggal->cellAttributes() ?>>
<span id="el_t101_saldoawal_Tanggal">
<span<?php echo $t101_saldoawal_view->Tanggal->viewAttributes() ?>><?php echo $t101_saldoawal_view->Tanggal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_saldoawal_view->Jumlah->Visible) { // Jumlah ?>
	<tr id="r_Jumlah">
		<td class="<?php echo $t101_saldoawal_view->TableLeftColumnClass ?>"><span id="elh_t101_saldoawal_Jumlah"><?php echo $t101_saldoawal_view->Jumlah->caption() ?></span></td>
		<td data-name="Jumlah" <?php echo $t101_saldoawal_view->Jumlah->cellAttributes() ?>>
<span id="el_t101_saldoawal_Jumlah">
<span<?php echo $t101_saldoawal_view->Jumlah->viewAttributes() ?>><?php echo $t101_saldoawal_view->Jumlah->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t101_saldoawal_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t101_saldoawal_view->isExport()) { ?>
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
$t101_saldoawal_view->terminate();
?>