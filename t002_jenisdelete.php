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
$t002_jenis_delete = new t002_jenis_delete();

// Run the page
$t002_jenis_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_jenis_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft002_jenisdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft002_jenisdelete = currentForm = new ew.Form("ft002_jenisdelete", "delete");
	loadjs.done("ft002_jenisdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t002_jenis_delete->showPageHeader(); ?>
<?php
$t002_jenis_delete->showMessage();
?>
<form name="ft002_jenisdelete" id="ft002_jenisdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_jenis">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t002_jenis_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t002_jenis_delete->Nama->Visible) { // Nama ?>
		<th class="<?php echo $t002_jenis_delete->Nama->headerCellClass() ?>"><span id="elh_t002_jenis_Nama" class="t002_jenis_Nama"><?php echo $t002_jenis_delete->Nama->caption() ?></span></th>
<?php } ?>
<?php if ($t002_jenis_delete->NoKolom->Visible) { // NoKolom ?>
		<th class="<?php echo $t002_jenis_delete->NoKolom->headerCellClass() ?>"><span id="elh_t002_jenis_NoKolom" class="t002_jenis_NoKolom"><?php echo $t002_jenis_delete->NoKolom->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t002_jenis_delete->RecordCount = 0;
$i = 0;
while (!$t002_jenis_delete->Recordset->EOF) {
	$t002_jenis_delete->RecordCount++;
	$t002_jenis_delete->RowCount++;

	// Set row properties
	$t002_jenis->resetAttributes();
	$t002_jenis->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t002_jenis_delete->loadRowValues($t002_jenis_delete->Recordset);

	// Render row
	$t002_jenis_delete->renderRow();
?>
	<tr <?php echo $t002_jenis->rowAttributes() ?>>
<?php if ($t002_jenis_delete->Nama->Visible) { // Nama ?>
		<td <?php echo $t002_jenis_delete->Nama->cellAttributes() ?>>
<span id="el<?php echo $t002_jenis_delete->RowCount ?>_t002_jenis_Nama" class="t002_jenis_Nama">
<span<?php echo $t002_jenis_delete->Nama->viewAttributes() ?>><?php echo $t002_jenis_delete->Nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t002_jenis_delete->NoKolom->Visible) { // NoKolom ?>
		<td <?php echo $t002_jenis_delete->NoKolom->cellAttributes() ?>>
<span id="el<?php echo $t002_jenis_delete->RowCount ?>_t002_jenis_NoKolom" class="t002_jenis_NoKolom">
<span<?php echo $t002_jenis_delete->NoKolom->viewAttributes() ?>><?php echo $t002_jenis_delete->NoKolom->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t002_jenis_delete->Recordset->moveNext();
}
$t002_jenis_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t002_jenis_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t002_jenis_delete->showPageFooter();
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
$t002_jenis_delete->terminate();
?>