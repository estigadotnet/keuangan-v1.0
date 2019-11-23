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
$t101_saldoawal_delete = new t101_saldoawal_delete();

// Run the page
$t101_saldoawal_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_saldoawal_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft101_saldoawaldelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft101_saldoawaldelete = currentForm = new ew.Form("ft101_saldoawaldelete", "delete");
	loadjs.done("ft101_saldoawaldelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t101_saldoawal_delete->showPageHeader(); ?>
<?php
$t101_saldoawal_delete->showMessage();
?>
<form name="ft101_saldoawaldelete" id="ft101_saldoawaldelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_saldoawal">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t101_saldoawal_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t101_saldoawal_delete->Tanggal->Visible) { // Tanggal ?>
		<th class="<?php echo $t101_saldoawal_delete->Tanggal->headerCellClass() ?>"><span id="elh_t101_saldoawal_Tanggal" class="t101_saldoawal_Tanggal"><?php echo $t101_saldoawal_delete->Tanggal->caption() ?></span></th>
<?php } ?>
<?php if ($t101_saldoawal_delete->Jumlah->Visible) { // Jumlah ?>
		<th class="<?php echo $t101_saldoawal_delete->Jumlah->headerCellClass() ?>"><span id="elh_t101_saldoawal_Jumlah" class="t101_saldoawal_Jumlah"><?php echo $t101_saldoawal_delete->Jumlah->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t101_saldoawal_delete->RecordCount = 0;
$i = 0;
while (!$t101_saldoawal_delete->Recordset->EOF) {
	$t101_saldoawal_delete->RecordCount++;
	$t101_saldoawal_delete->RowCount++;

	// Set row properties
	$t101_saldoawal->resetAttributes();
	$t101_saldoawal->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t101_saldoawal_delete->loadRowValues($t101_saldoawal_delete->Recordset);

	// Render row
	$t101_saldoawal_delete->renderRow();
?>
	<tr <?php echo $t101_saldoawal->rowAttributes() ?>>
<?php if ($t101_saldoawal_delete->Tanggal->Visible) { // Tanggal ?>
		<td <?php echo $t101_saldoawal_delete->Tanggal->cellAttributes() ?>>
<span id="el<?php echo $t101_saldoawal_delete->RowCount ?>_t101_saldoawal_Tanggal" class="t101_saldoawal_Tanggal">
<span<?php echo $t101_saldoawal_delete->Tanggal->viewAttributes() ?>><?php echo $t101_saldoawal_delete->Tanggal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_saldoawal_delete->Jumlah->Visible) { // Jumlah ?>
		<td <?php echo $t101_saldoawal_delete->Jumlah->cellAttributes() ?>>
<span id="el<?php echo $t101_saldoawal_delete->RowCount ?>_t101_saldoawal_Jumlah" class="t101_saldoawal_Jumlah">
<span<?php echo $t101_saldoawal_delete->Jumlah->viewAttributes() ?>><?php echo $t101_saldoawal_delete->Jumlah->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t101_saldoawal_delete->Recordset->moveNext();
}
$t101_saldoawal_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_saldoawal_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t101_saldoawal_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$t101_saldoawal_delete->terminate();
?>