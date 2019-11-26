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
$t001_jo_view = new t001_jo_view();

// Run the page
$t001_jo_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_jo_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t001_jo_view->isExport()) { ?>
<script>
var ft001_joview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft001_joview = currentForm = new ew.Form("ft001_joview", "view");
	loadjs.done("ft001_joview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t001_jo_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t001_jo_view->ExportOptions->render("body") ?>
<?php $t001_jo_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t001_jo_view->showPageHeader(); ?>
<?php
$t001_jo_view->showMessage();
?>
<form name="ft001_joview" id="ft001_joview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_jo">
<input type="hidden" name="modal" value="<?php echo (int)$t001_jo_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t001_jo_view->NoJO->Visible) { // NoJO ?>
	<tr id="r_NoJO">
		<td class="<?php echo $t001_jo_view->TableLeftColumnClass ?>"><span id="elh_t001_jo_NoJO"><?php echo $t001_jo_view->NoJO->caption() ?></span></td>
		<td data-name="NoJO" <?php echo $t001_jo_view->NoJO->cellAttributes() ?>>
<span id="el_t001_jo_NoJO">
<span<?php echo $t001_jo_view->NoJO->viewAttributes() ?>><?php echo $t001_jo_view->NoJO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t001_jo_view->Status->Visible) { // Status ?>
	<tr id="r_Status">
		<td class="<?php echo $t001_jo_view->TableLeftColumnClass ?>"><span id="elh_t001_jo_Status"><?php echo $t001_jo_view->Status->caption() ?></span></td>
		<td data-name="Status" <?php echo $t001_jo_view->Status->cellAttributes() ?>>
<span id="el_t001_jo_Status">
<span<?php echo $t001_jo_view->Status->viewAttributes() ?>><?php echo $t001_jo_view->Status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t001_jo_view->Tagihan->Visible) { // Tagihan ?>
	<tr id="r_Tagihan">
		<td class="<?php echo $t001_jo_view->TableLeftColumnClass ?>"><span id="elh_t001_jo_Tagihan"><?php echo $t001_jo_view->Tagihan->caption() ?></span></td>
		<td data-name="Tagihan" <?php echo $t001_jo_view->Tagihan->cellAttributes() ?>>
<span id="el_t001_jo_Tagihan">
<span<?php echo $t001_jo_view->Tagihan->viewAttributes() ?>><?php echo $t001_jo_view->Tagihan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t001_jo_view->Shipper->Visible) { // Shipper ?>
	<tr id="r_Shipper">
		<td class="<?php echo $t001_jo_view->TableLeftColumnClass ?>"><span id="elh_t001_jo_Shipper"><?php echo $t001_jo_view->Shipper->caption() ?></span></td>
		<td data-name="Shipper" <?php echo $t001_jo_view->Shipper->cellAttributes() ?>>
<span id="el_t001_jo_Shipper">
<span<?php echo $t001_jo_view->Shipper->viewAttributes() ?>><?php echo $t001_jo_view->Shipper->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t001_jo_view->Qty->Visible) { // Qty ?>
	<tr id="r_Qty">
		<td class="<?php echo $t001_jo_view->TableLeftColumnClass ?>"><span id="elh_t001_jo_Qty"><?php echo $t001_jo_view->Qty->caption() ?></span></td>
		<td data-name="Qty" <?php echo $t001_jo_view->Qty->cellAttributes() ?>>
<span id="el_t001_jo_Qty">
<span<?php echo $t001_jo_view->Qty->viewAttributes() ?>><?php echo $t001_jo_view->Qty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t001_jo_view->Cont->Visible) { // Cont ?>
	<tr id="r_Cont">
		<td class="<?php echo $t001_jo_view->TableLeftColumnClass ?>"><span id="elh_t001_jo_Cont"><?php echo $t001_jo_view->Cont->caption() ?></span></td>
		<td data-name="Cont" <?php echo $t001_jo_view->Cont->cellAttributes() ?>>
<span id="el_t001_jo_Cont">
<span<?php echo $t001_jo_view->Cont->viewAttributes() ?>><?php echo $t001_jo_view->Cont->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t001_jo_view->Tujuan->Visible) { // Tujuan ?>
	<tr id="r_Tujuan">
		<td class="<?php echo $t001_jo_view->TableLeftColumnClass ?>"><span id="elh_t001_jo_Tujuan"><?php echo $t001_jo_view->Tujuan->caption() ?></span></td>
		<td data-name="Tujuan" <?php echo $t001_jo_view->Tujuan->cellAttributes() ?>>
<span id="el_t001_jo_Tujuan">
<span<?php echo $t001_jo_view->Tujuan->viewAttributes() ?>><?php echo $t001_jo_view->Tujuan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t001_jo_view->Kapal->Visible) { // Kapal ?>
	<tr id="r_Kapal">
		<td class="<?php echo $t001_jo_view->TableLeftColumnClass ?>"><span id="elh_t001_jo_Kapal"><?php echo $t001_jo_view->Kapal->caption() ?></span></td>
		<td data-name="Kapal" <?php echo $t001_jo_view->Kapal->cellAttributes() ?>>
<span id="el_t001_jo_Kapal">
<span<?php echo $t001_jo_view->Kapal->viewAttributes() ?>><?php echo $t001_jo_view->Kapal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t001_jo_view->Doc->Visible) { // Doc ?>
	<tr id="r_Doc">
		<td class="<?php echo $t001_jo_view->TableLeftColumnClass ?>"><span id="elh_t001_jo_Doc"><?php echo $t001_jo_view->Doc->caption() ?></span></td>
		<td data-name="Doc" <?php echo $t001_jo_view->Doc->cellAttributes() ?>>
<span id="el_t001_jo_Doc">
<span<?php echo $t001_jo_view->Doc->viewAttributes() ?>><?php echo GetFileViewTag($t001_jo_view->Doc, $t001_jo_view->Doc->getViewValue(), FALSE) ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t001_jo_view->BM->Visible) { // BM ?>
	<tr id="r_BM">
		<td class="<?php echo $t001_jo_view->TableLeftColumnClass ?>"><span id="elh_t001_jo_BM"><?php echo $t001_jo_view->BM->caption() ?></span></td>
		<td data-name="BM" <?php echo $t001_jo_view->BM->cellAttributes() ?>>
<span id="el_t001_jo_BM">
<span<?php echo $t001_jo_view->BM->viewAttributes() ?>><?php echo $t001_jo_view->BM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t001_jo_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t001_jo_view->isExport()) { ?>
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
$t001_jo_view->terminate();
?>