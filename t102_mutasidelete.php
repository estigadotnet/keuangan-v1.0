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
$t102_mutasi_delete = new t102_mutasi_delete();

// Run the page
$t102_mutasi_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_mutasi_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft102_mutasidelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft102_mutasidelete = currentForm = new ew.Form("ft102_mutasidelete", "delete");
	loadjs.done("ft102_mutasidelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t102_mutasi_delete->showPageHeader(); ?>
<?php
$t102_mutasi_delete->showMessage();
?>
<form name="ft102_mutasidelete" id="ft102_mutasidelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_mutasi">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t102_mutasi_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t102_mutasi_delete->Tanggal->Visible) { // Tanggal ?>
		<th class="<?php echo $t102_mutasi_delete->Tanggal->headerCellClass() ?>"><span id="elh_t102_mutasi_Tanggal" class="t102_mutasi_Tanggal"><?php echo $t102_mutasi_delete->Tanggal->caption() ?></span></th>
<?php } ?>
<?php if ($t102_mutasi_delete->NoUrut->Visible) { // NoUrut ?>
		<th class="<?php echo $t102_mutasi_delete->NoUrut->headerCellClass() ?>"><span id="elh_t102_mutasi_NoUrut" class="t102_mutasi_NoUrut"><?php echo $t102_mutasi_delete->NoUrut->caption() ?></span></th>
<?php } ?>
<?php if ($t102_mutasi_delete->jo_id->Visible) { // jo_id ?>
		<th class="<?php echo $t102_mutasi_delete->jo_id->headerCellClass() ?>"><span id="elh_t102_mutasi_jo_id" class="t102_mutasi_jo_id"><?php echo $t102_mutasi_delete->jo_id->caption() ?></span></th>
<?php } ?>
<?php if ($t102_mutasi_delete->jenis_id->Visible) { // jenis_id ?>
		<th class="<?php echo $t102_mutasi_delete->jenis_id->headerCellClass() ?>"><span id="elh_t102_mutasi_jenis_id" class="t102_mutasi_jenis_id"><?php echo $t102_mutasi_delete->jenis_id->caption() ?></span></th>
<?php } ?>
<?php if ($t102_mutasi_delete->Comment->Visible) { // Comment ?>
		<th class="<?php echo $t102_mutasi_delete->Comment->headerCellClass() ?>"><span id="elh_t102_mutasi_Comment" class="t102_mutasi_Comment"><?php echo $t102_mutasi_delete->Comment->caption() ?></span></th>
<?php } ?>
<?php if ($t102_mutasi_delete->Masuk->Visible) { // Masuk ?>
		<th class="<?php echo $t102_mutasi_delete->Masuk->headerCellClass() ?>"><span id="elh_t102_mutasi_Masuk" class="t102_mutasi_Masuk"><?php echo $t102_mutasi_delete->Masuk->caption() ?></span></th>
<?php } ?>
<?php if ($t102_mutasi_delete->Keluar->Visible) { // Keluar ?>
		<th class="<?php echo $t102_mutasi_delete->Keluar->headerCellClass() ?>"><span id="elh_t102_mutasi_Keluar" class="t102_mutasi_Keluar"><?php echo $t102_mutasi_delete->Keluar->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t102_mutasi_delete->RecordCount = 0;
$i = 0;
while (!$t102_mutasi_delete->Recordset->EOF) {
	$t102_mutasi_delete->RecordCount++;
	$t102_mutasi_delete->RowCount++;

	// Set row properties
	$t102_mutasi->resetAttributes();
	$t102_mutasi->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t102_mutasi_delete->loadRowValues($t102_mutasi_delete->Recordset);

	// Render row
	$t102_mutasi_delete->renderRow();
?>
	<tr <?php echo $t102_mutasi->rowAttributes() ?>>
<?php if ($t102_mutasi_delete->Tanggal->Visible) { // Tanggal ?>
		<td <?php echo $t102_mutasi_delete->Tanggal->cellAttributes() ?>>
<span id="el<?php echo $t102_mutasi_delete->RowCount ?>_t102_mutasi_Tanggal" class="t102_mutasi_Tanggal">
<span<?php echo $t102_mutasi_delete->Tanggal->viewAttributes() ?>><?php echo $t102_mutasi_delete->Tanggal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t102_mutasi_delete->NoUrut->Visible) { // NoUrut ?>
		<td <?php echo $t102_mutasi_delete->NoUrut->cellAttributes() ?>>
<span id="el<?php echo $t102_mutasi_delete->RowCount ?>_t102_mutasi_NoUrut" class="t102_mutasi_NoUrut">
<span<?php echo $t102_mutasi_delete->NoUrut->viewAttributes() ?>><?php echo $t102_mutasi_delete->NoUrut->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t102_mutasi_delete->jo_id->Visible) { // jo_id ?>
		<td <?php echo $t102_mutasi_delete->jo_id->cellAttributes() ?>>
<span id="el<?php echo $t102_mutasi_delete->RowCount ?>_t102_mutasi_jo_id" class="t102_mutasi_jo_id">
<span<?php echo $t102_mutasi_delete->jo_id->viewAttributes() ?>><?php echo $t102_mutasi_delete->jo_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t102_mutasi_delete->jenis_id->Visible) { // jenis_id ?>
		<td <?php echo $t102_mutasi_delete->jenis_id->cellAttributes() ?>>
<span id="el<?php echo $t102_mutasi_delete->RowCount ?>_t102_mutasi_jenis_id" class="t102_mutasi_jenis_id">
<span<?php echo $t102_mutasi_delete->jenis_id->viewAttributes() ?>><?php echo $t102_mutasi_delete->jenis_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t102_mutasi_delete->Comment->Visible) { // Comment ?>
		<td <?php echo $t102_mutasi_delete->Comment->cellAttributes() ?>>
<span id="el<?php echo $t102_mutasi_delete->RowCount ?>_t102_mutasi_Comment" class="t102_mutasi_Comment">
<span<?php echo $t102_mutasi_delete->Comment->viewAttributes() ?>><?php echo $t102_mutasi_delete->Comment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t102_mutasi_delete->Masuk->Visible) { // Masuk ?>
		<td <?php echo $t102_mutasi_delete->Masuk->cellAttributes() ?>>
<span id="el<?php echo $t102_mutasi_delete->RowCount ?>_t102_mutasi_Masuk" class="t102_mutasi_Masuk">
<span<?php echo $t102_mutasi_delete->Masuk->viewAttributes() ?>><?php echo $t102_mutasi_delete->Masuk->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t102_mutasi_delete->Keluar->Visible) { // Keluar ?>
		<td <?php echo $t102_mutasi_delete->Keluar->cellAttributes() ?>>
<span id="el<?php echo $t102_mutasi_delete->RowCount ?>_t102_mutasi_Keluar" class="t102_mutasi_Keluar">
<span<?php echo $t102_mutasi_delete->Keluar->viewAttributes() ?>><?php echo $t102_mutasi_delete->Keluar->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t102_mutasi_delete->Recordset->moveNext();
}
$t102_mutasi_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t102_mutasi_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t102_mutasi_delete->showPageFooter();
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
$t102_mutasi_delete->terminate();
?>