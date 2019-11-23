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
$t002_jenis_view = new t002_jenis_view();

// Run the page
$t002_jenis_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_jenis_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t002_jenis_view->isExport()) { ?>
<script>
var ft002_jenisview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft002_jenisview = currentForm = new ew.Form("ft002_jenisview", "view");
	loadjs.done("ft002_jenisview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t002_jenis_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t002_jenis_view->ExportOptions->render("body") ?>
<?php $t002_jenis_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t002_jenis_view->showPageHeader(); ?>
<?php
$t002_jenis_view->showMessage();
?>
<form name="ft002_jenisview" id="ft002_jenisview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_jenis">
<input type="hidden" name="modal" value="<?php echo (int)$t002_jenis_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t002_jenis_view->Nama->Visible) { // Nama ?>
	<tr id="r_Nama">
		<td class="<?php echo $t002_jenis_view->TableLeftColumnClass ?>"><span id="elh_t002_jenis_Nama"><?php echo $t002_jenis_view->Nama->caption() ?></span></td>
		<td data-name="Nama" <?php echo $t002_jenis_view->Nama->cellAttributes() ?>>
<span id="el_t002_jenis_Nama">
<span<?php echo $t002_jenis_view->Nama->viewAttributes() ?>><?php echo $t002_jenis_view->Nama->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t002_jenis_view->NoKolom->Visible) { // NoKolom ?>
	<tr id="r_NoKolom">
		<td class="<?php echo $t002_jenis_view->TableLeftColumnClass ?>"><span id="elh_t002_jenis_NoKolom"><?php echo $t002_jenis_view->NoKolom->caption() ?></span></td>
		<td data-name="NoKolom" <?php echo $t002_jenis_view->NoKolom->cellAttributes() ?>>
<span id="el_t002_jenis_NoKolom">
<span<?php echo $t002_jenis_view->NoKolom->viewAttributes() ?>><?php echo $t002_jenis_view->NoKolom->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t002_jenis_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t002_jenis_view->isExport()) { ?>
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
$t002_jenis_view->terminate();
?>