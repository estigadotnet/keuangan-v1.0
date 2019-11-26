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
$t001_jo_delete = new t001_jo_delete();

// Run the page
$t001_jo_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_jo_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft001_jodelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft001_jodelete = currentForm = new ew.Form("ft001_jodelete", "delete");
	loadjs.done("ft001_jodelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t001_jo_delete->showPageHeader(); ?>
<?php
$t001_jo_delete->showMessage();
?>
<form name="ft001_jodelete" id="ft001_jodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_jo">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t001_jo_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t001_jo_delete->NoJO->Visible) { // NoJO ?>
		<th class="<?php echo $t001_jo_delete->NoJO->headerCellClass() ?>"><span id="elh_t001_jo_NoJO" class="t001_jo_NoJO"><?php echo $t001_jo_delete->NoJO->caption() ?></span></th>
<?php } ?>
<?php if ($t001_jo_delete->Status->Visible) { // Status ?>
		<th class="<?php echo $t001_jo_delete->Status->headerCellClass() ?>"><span id="elh_t001_jo_Status" class="t001_jo_Status"><?php echo $t001_jo_delete->Status->caption() ?></span></th>
<?php } ?>
<?php if ($t001_jo_delete->Tagihan->Visible) { // Tagihan ?>
		<th class="<?php echo $t001_jo_delete->Tagihan->headerCellClass() ?>"><span id="elh_t001_jo_Tagihan" class="t001_jo_Tagihan"><?php echo $t001_jo_delete->Tagihan->caption() ?></span></th>
<?php } ?>
<?php if ($t001_jo_delete->Shipper->Visible) { // Shipper ?>
		<th class="<?php echo $t001_jo_delete->Shipper->headerCellClass() ?>"><span id="elh_t001_jo_Shipper" class="t001_jo_Shipper"><?php echo $t001_jo_delete->Shipper->caption() ?></span></th>
<?php } ?>
<?php if ($t001_jo_delete->Qty->Visible) { // Qty ?>
		<th class="<?php echo $t001_jo_delete->Qty->headerCellClass() ?>"><span id="elh_t001_jo_Qty" class="t001_jo_Qty"><?php echo $t001_jo_delete->Qty->caption() ?></span></th>
<?php } ?>
<?php if ($t001_jo_delete->Cont->Visible) { // Cont ?>
		<th class="<?php echo $t001_jo_delete->Cont->headerCellClass() ?>"><span id="elh_t001_jo_Cont" class="t001_jo_Cont"><?php echo $t001_jo_delete->Cont->caption() ?></span></th>
<?php } ?>
<?php if ($t001_jo_delete->BM->Visible) { // BM ?>
		<th class="<?php echo $t001_jo_delete->BM->headerCellClass() ?>"><span id="elh_t001_jo_BM" class="t001_jo_BM"><?php echo $t001_jo_delete->BM->caption() ?></span></th>
<?php } ?>
<?php if ($t001_jo_delete->Tujuan->Visible) { // Tujuan ?>
		<th class="<?php echo $t001_jo_delete->Tujuan->headerCellClass() ?>"><span id="elh_t001_jo_Tujuan" class="t001_jo_Tujuan"><?php echo $t001_jo_delete->Tujuan->caption() ?></span></th>
<?php } ?>
<?php if ($t001_jo_delete->Kapal->Visible) { // Kapal ?>
		<th class="<?php echo $t001_jo_delete->Kapal->headerCellClass() ?>"><span id="elh_t001_jo_Kapal" class="t001_jo_Kapal"><?php echo $t001_jo_delete->Kapal->caption() ?></span></th>
<?php } ?>
<?php if ($t001_jo_delete->Doc->Visible) { // Doc ?>
		<th class="<?php echo $t001_jo_delete->Doc->headerCellClass() ?>"><span id="elh_t001_jo_Doc" class="t001_jo_Doc"><?php echo $t001_jo_delete->Doc->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t001_jo_delete->RecordCount = 0;
$i = 0;
while (!$t001_jo_delete->Recordset->EOF) {
	$t001_jo_delete->RecordCount++;
	$t001_jo_delete->RowCount++;

	// Set row properties
	$t001_jo->resetAttributes();
	$t001_jo->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t001_jo_delete->loadRowValues($t001_jo_delete->Recordset);

	// Render row
	$t001_jo_delete->renderRow();
?>
	<tr <?php echo $t001_jo->rowAttributes() ?>>
<?php if ($t001_jo_delete->NoJO->Visible) { // NoJO ?>
		<td <?php echo $t001_jo_delete->NoJO->cellAttributes() ?>>
<span id="el<?php echo $t001_jo_delete->RowCount ?>_t001_jo_NoJO" class="t001_jo_NoJO">
<span<?php echo $t001_jo_delete->NoJO->viewAttributes() ?>><?php echo $t001_jo_delete->NoJO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t001_jo_delete->Status->Visible) { // Status ?>
		<td <?php echo $t001_jo_delete->Status->cellAttributes() ?>>
<span id="el<?php echo $t001_jo_delete->RowCount ?>_t001_jo_Status" class="t001_jo_Status">
<span<?php echo $t001_jo_delete->Status->viewAttributes() ?>><?php echo $t001_jo_delete->Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t001_jo_delete->Tagihan->Visible) { // Tagihan ?>
		<td <?php echo $t001_jo_delete->Tagihan->cellAttributes() ?>>
<span id="el<?php echo $t001_jo_delete->RowCount ?>_t001_jo_Tagihan" class="t001_jo_Tagihan">
<span<?php echo $t001_jo_delete->Tagihan->viewAttributes() ?>><?php echo $t001_jo_delete->Tagihan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t001_jo_delete->Shipper->Visible) { // Shipper ?>
		<td <?php echo $t001_jo_delete->Shipper->cellAttributes() ?>>
<span id="el<?php echo $t001_jo_delete->RowCount ?>_t001_jo_Shipper" class="t001_jo_Shipper">
<span<?php echo $t001_jo_delete->Shipper->viewAttributes() ?>><?php echo $t001_jo_delete->Shipper->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t001_jo_delete->Qty->Visible) { // Qty ?>
		<td <?php echo $t001_jo_delete->Qty->cellAttributes() ?>>
<span id="el<?php echo $t001_jo_delete->RowCount ?>_t001_jo_Qty" class="t001_jo_Qty">
<span<?php echo $t001_jo_delete->Qty->viewAttributes() ?>><?php echo $t001_jo_delete->Qty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t001_jo_delete->Cont->Visible) { // Cont ?>
		<td <?php echo $t001_jo_delete->Cont->cellAttributes() ?>>
<span id="el<?php echo $t001_jo_delete->RowCount ?>_t001_jo_Cont" class="t001_jo_Cont">
<span<?php echo $t001_jo_delete->Cont->viewAttributes() ?>><?php echo $t001_jo_delete->Cont->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t001_jo_delete->BM->Visible) { // BM ?>
		<td <?php echo $t001_jo_delete->BM->cellAttributes() ?>>
<span id="el<?php echo $t001_jo_delete->RowCount ?>_t001_jo_BM" class="t001_jo_BM">
<span<?php echo $t001_jo_delete->BM->viewAttributes() ?>><?php echo $t001_jo_delete->BM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t001_jo_delete->Tujuan->Visible) { // Tujuan ?>
		<td <?php echo $t001_jo_delete->Tujuan->cellAttributes() ?>>
<span id="el<?php echo $t001_jo_delete->RowCount ?>_t001_jo_Tujuan" class="t001_jo_Tujuan">
<span<?php echo $t001_jo_delete->Tujuan->viewAttributes() ?>><?php echo $t001_jo_delete->Tujuan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t001_jo_delete->Kapal->Visible) { // Kapal ?>
		<td <?php echo $t001_jo_delete->Kapal->cellAttributes() ?>>
<span id="el<?php echo $t001_jo_delete->RowCount ?>_t001_jo_Kapal" class="t001_jo_Kapal">
<span<?php echo $t001_jo_delete->Kapal->viewAttributes() ?>><?php echo $t001_jo_delete->Kapal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t001_jo_delete->Doc->Visible) { // Doc ?>
		<td <?php echo $t001_jo_delete->Doc->cellAttributes() ?>>
<span id="el<?php echo $t001_jo_delete->RowCount ?>_t001_jo_Doc" class="t001_jo_Doc">
<span<?php echo $t001_jo_delete->Doc->viewAttributes() ?>><?php echo GetFileViewTag($t001_jo_delete->Doc, $t001_jo_delete->Doc->getViewValue(), FALSE) ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t001_jo_delete->Recordset->moveNext();
}
$t001_jo_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t001_jo_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t001_jo_delete->showPageFooter();
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
$t001_jo_delete->terminate();
?>