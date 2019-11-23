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
$t101_saldoawal_list = new t101_saldoawal_list();

// Run the page
$t101_saldoawal_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_saldoawal_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t101_saldoawal_list->isExport()) { ?>
<script>
var ft101_saldoawallist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft101_saldoawallist = currentForm = new ew.Form("ft101_saldoawallist", "list");
	ft101_saldoawallist.formKeyCountName = '<?php echo $t101_saldoawal_list->FormKeyCountName ?>';

	// Validate form
	ft101_saldoawallist.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "F")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
			if (checkrow) {
				addcnt++;
			<?php if ($t101_saldoawal_list->Tanggal->Required) { ?>
				elm = this.getElements("x" + infix + "_Tanggal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_saldoawal_list->Tanggal->caption(), $t101_saldoawal_list->Tanggal->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Tanggal");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_saldoawal_list->Tanggal->errorMessage()) ?>");
			<?php if ($t101_saldoawal_list->Jumlah->Required) { ?>
				elm = this.getElements("x" + infix + "_Jumlah");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_saldoawal_list->Jumlah->caption(), $t101_saldoawal_list->Jumlah->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Jumlah");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_saldoawal_list->Jumlah->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		if (gridinsert && addcnt == 0) { // No row added
			ew.alert(ew.language.phrase("NoAddRecord"));
			return false;
		}
		return true;
	}

	// Check empty row
	ft101_saldoawallist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "Tanggal", false)) return false;
		if (ew.valueChanged(fobj, infix, "Jumlah", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft101_saldoawallist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft101_saldoawallist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft101_saldoawallist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t101_saldoawal_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t101_saldoawal_list->TotalRecords > 0 && $t101_saldoawal_list->ExportOptions->visible()) { ?>
<?php $t101_saldoawal_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t101_saldoawal_list->ImportOptions->visible()) { ?>
<?php $t101_saldoawal_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t101_saldoawal_list->renderOtherOptions();
?>
<?php $t101_saldoawal_list->showPageHeader(); ?>
<?php
$t101_saldoawal_list->showMessage();
?>
<?php if ($t101_saldoawal_list->TotalRecords > 0 || $t101_saldoawal->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t101_saldoawal_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t101_saldoawal">
<?php if (!$t101_saldoawal_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$t101_saldoawal_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t101_saldoawal_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t101_saldoawal_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ft101_saldoawallist" id="ft101_saldoawallist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_saldoawal">
<div id="gmp_t101_saldoawal" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t101_saldoawal_list->TotalRecords > 0 || $t101_saldoawal_list->isAdd() || $t101_saldoawal_list->isCopy() || $t101_saldoawal_list->isGridEdit()) { ?>
<table id="tbl_t101_saldoawallist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t101_saldoawal->RowType = ROWTYPE_HEADER;

// Render list options
$t101_saldoawal_list->renderListOptions();

// Render list options (header, left)
$t101_saldoawal_list->ListOptions->render("header", "left");
?>
<?php if ($t101_saldoawal_list->Tanggal->Visible) { // Tanggal ?>
	<?php if ($t101_saldoawal_list->SortUrl($t101_saldoawal_list->Tanggal) == "") { ?>
		<th data-name="Tanggal" class="<?php echo $t101_saldoawal_list->Tanggal->headerCellClass() ?>"><div id="elh_t101_saldoawal_Tanggal" class="t101_saldoawal_Tanggal"><div class="ew-table-header-caption"><?php echo $t101_saldoawal_list->Tanggal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tanggal" class="<?php echo $t101_saldoawal_list->Tanggal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_saldoawal_list->SortUrl($t101_saldoawal_list->Tanggal) ?>', 2);"><div id="elh_t101_saldoawal_Tanggal" class="t101_saldoawal_Tanggal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_saldoawal_list->Tanggal->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_saldoawal_list->Tanggal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_saldoawal_list->Tanggal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_saldoawal_list->Jumlah->Visible) { // Jumlah ?>
	<?php if ($t101_saldoawal_list->SortUrl($t101_saldoawal_list->Jumlah) == "") { ?>
		<th data-name="Jumlah" class="<?php echo $t101_saldoawal_list->Jumlah->headerCellClass() ?>"><div id="elh_t101_saldoawal_Jumlah" class="t101_saldoawal_Jumlah"><div class="ew-table-header-caption"><?php echo $t101_saldoawal_list->Jumlah->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jumlah" class="<?php echo $t101_saldoawal_list->Jumlah->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_saldoawal_list->SortUrl($t101_saldoawal_list->Jumlah) ?>', 2);"><div id="elh_t101_saldoawal_Jumlah" class="t101_saldoawal_Jumlah">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_saldoawal_list->Jumlah->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_saldoawal_list->Jumlah->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_saldoawal_list->Jumlah->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t101_saldoawal_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($t101_saldoawal_list->isAdd() || $t101_saldoawal_list->isCopy()) {
		$t101_saldoawal_list->RowIndex = 0;
		$t101_saldoawal_list->KeyCount = $t101_saldoawal_list->RowIndex;
		if ($t101_saldoawal_list->isCopy() && !$t101_saldoawal_list->loadRow())
			$t101_saldoawal->CurrentAction = "add";
		if ($t101_saldoawal_list->isAdd())
			$t101_saldoawal_list->loadRowValues();
		if ($t101_saldoawal->EventCancelled) // Insert failed
			$t101_saldoawal_list->restoreFormValues(); // Restore form values

		// Set row properties
		$t101_saldoawal->resetAttributes();
		$t101_saldoawal->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_t101_saldoawal", "data-rowtype" => ROWTYPE_ADD]);
		$t101_saldoawal->RowType = ROWTYPE_ADD;

		// Render row
		$t101_saldoawal_list->renderRow();

		// Render list options
		$t101_saldoawal_list->renderListOptions();
		$t101_saldoawal_list->StartRowCount = 0;
?>
	<tr <?php echo $t101_saldoawal->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_saldoawal_list->ListOptions->render("body", "left", $t101_saldoawal_list->RowCount);
?>
	<?php if ($t101_saldoawal_list->Tanggal->Visible) { // Tanggal ?>
		<td data-name="Tanggal">
<span id="el<?php echo $t101_saldoawal_list->RowCount ?>_t101_saldoawal_Tanggal" class="form-group t101_saldoawal_Tanggal">
<input type="text" data-table="t101_saldoawal" data-field="x_Tanggal" data-format="7" name="x<?php echo $t101_saldoawal_list->RowIndex ?>_Tanggal" id="x<?php echo $t101_saldoawal_list->RowIndex ?>_Tanggal" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t101_saldoawal_list->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t101_saldoawal_list->Tanggal->EditValue ?>"<?php echo $t101_saldoawal_list->Tanggal->editAttributes() ?>>
<?php if (!$t101_saldoawal_list->Tanggal->ReadOnly && !$t101_saldoawal_list->Tanggal->Disabled && !isset($t101_saldoawal_list->Tanggal->EditAttrs["readonly"]) && !isset($t101_saldoawal_list->Tanggal->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft101_saldoawallist", "datetimepicker"], function() {
	ew.createDateTimePicker("ft101_saldoawallist", "x<?php echo $t101_saldoawal_list->RowIndex ?>_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t101_saldoawal" data-field="x_Tanggal" name="o<?php echo $t101_saldoawal_list->RowIndex ?>_Tanggal" id="o<?php echo $t101_saldoawal_list->RowIndex ?>_Tanggal" value="<?php echo HtmlEncode($t101_saldoawal_list->Tanggal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_saldoawal_list->Jumlah->Visible) { // Jumlah ?>
		<td data-name="Jumlah">
<span id="el<?php echo $t101_saldoawal_list->RowCount ?>_t101_saldoawal_Jumlah" class="form-group t101_saldoawal_Jumlah">
<input type="text" data-table="t101_saldoawal" data-field="x_Jumlah" name="x<?php echo $t101_saldoawal_list->RowIndex ?>_Jumlah" id="x<?php echo $t101_saldoawal_list->RowIndex ?>_Jumlah" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t101_saldoawal_list->Jumlah->getPlaceHolder()) ?>" value="<?php echo $t101_saldoawal_list->Jumlah->EditValue ?>"<?php echo $t101_saldoawal_list->Jumlah->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_saldoawal" data-field="x_Jumlah" name="o<?php echo $t101_saldoawal_list->RowIndex ?>_Jumlah" id="o<?php echo $t101_saldoawal_list->RowIndex ?>_Jumlah" value="<?php echo HtmlEncode($t101_saldoawal_list->Jumlah->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t101_saldoawal_list->ListOptions->render("body", "right", $t101_saldoawal_list->RowCount);
?>
<script>
loadjs.ready(["ft101_saldoawallist", "load"], function() {
	ft101_saldoawallist.updateLists(<?php echo $t101_saldoawal_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
<?php
if ($t101_saldoawal_list->ExportAll && $t101_saldoawal_list->isExport()) {
	$t101_saldoawal_list->StopRecord = $t101_saldoawal_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t101_saldoawal_list->TotalRecords > $t101_saldoawal_list->StartRecord + $t101_saldoawal_list->DisplayRecords - 1)
		$t101_saldoawal_list->StopRecord = $t101_saldoawal_list->StartRecord + $t101_saldoawal_list->DisplayRecords - 1;
	else
		$t101_saldoawal_list->StopRecord = $t101_saldoawal_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t101_saldoawal->isConfirm() || $t101_saldoawal_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t101_saldoawal_list->FormKeyCountName) && ($t101_saldoawal_list->isGridAdd() || $t101_saldoawal_list->isGridEdit() || $t101_saldoawal->isConfirm())) {
		$t101_saldoawal_list->KeyCount = $CurrentForm->getValue($t101_saldoawal_list->FormKeyCountName);
		$t101_saldoawal_list->StopRecord = $t101_saldoawal_list->StartRecord + $t101_saldoawal_list->KeyCount - 1;
	}
}
$t101_saldoawal_list->RecordCount = $t101_saldoawal_list->StartRecord - 1;
if ($t101_saldoawal_list->Recordset && !$t101_saldoawal_list->Recordset->EOF) {
	$t101_saldoawal_list->Recordset->moveFirst();
	$selectLimit = $t101_saldoawal_list->UseSelectLimit;
	if (!$selectLimit && $t101_saldoawal_list->StartRecord > 1)
		$t101_saldoawal_list->Recordset->move($t101_saldoawal_list->StartRecord - 1);
} elseif (!$t101_saldoawal->AllowAddDeleteRow && $t101_saldoawal_list->StopRecord == 0) {
	$t101_saldoawal_list->StopRecord = $t101_saldoawal->GridAddRowCount;
}

// Initialize aggregate
$t101_saldoawal->RowType = ROWTYPE_AGGREGATEINIT;
$t101_saldoawal->resetAttributes();
$t101_saldoawal_list->renderRow();
$t101_saldoawal_list->EditRowCount = 0;
if ($t101_saldoawal_list->isEdit())
	$t101_saldoawal_list->RowIndex = 1;
if ($t101_saldoawal_list->isGridAdd())
	$t101_saldoawal_list->RowIndex = 0;
if ($t101_saldoawal_list->isGridEdit())
	$t101_saldoawal_list->RowIndex = 0;
while ($t101_saldoawal_list->RecordCount < $t101_saldoawal_list->StopRecord) {
	$t101_saldoawal_list->RecordCount++;
	if ($t101_saldoawal_list->RecordCount >= $t101_saldoawal_list->StartRecord) {
		$t101_saldoawal_list->RowCount++;
		if ($t101_saldoawal_list->isGridAdd() || $t101_saldoawal_list->isGridEdit() || $t101_saldoawal->isConfirm()) {
			$t101_saldoawal_list->RowIndex++;
			$CurrentForm->Index = $t101_saldoawal_list->RowIndex;
			if ($CurrentForm->hasValue($t101_saldoawal_list->FormActionName) && ($t101_saldoawal->isConfirm() || $t101_saldoawal_list->EventCancelled))
				$t101_saldoawal_list->RowAction = strval($CurrentForm->getValue($t101_saldoawal_list->FormActionName));
			elseif ($t101_saldoawal_list->isGridAdd())
				$t101_saldoawal_list->RowAction = "insert";
			else
				$t101_saldoawal_list->RowAction = "";
		}

		// Set up key count
		$t101_saldoawal_list->KeyCount = $t101_saldoawal_list->RowIndex;

		// Init row class and style
		$t101_saldoawal->resetAttributes();
		$t101_saldoawal->CssClass = "";
		if ($t101_saldoawal_list->isGridAdd()) {
			$t101_saldoawal_list->loadRowValues(); // Load default values
		} else {
			$t101_saldoawal_list->loadRowValues($t101_saldoawal_list->Recordset); // Load row values
		}
		$t101_saldoawal->RowType = ROWTYPE_VIEW; // Render view
		if ($t101_saldoawal_list->isGridAdd()) // Grid add
			$t101_saldoawal->RowType = ROWTYPE_ADD; // Render add
		if ($t101_saldoawal_list->isGridAdd() && $t101_saldoawal->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t101_saldoawal_list->restoreCurrentRowFormValues($t101_saldoawal_list->RowIndex); // Restore form values
		if ($t101_saldoawal_list->isEdit()) {
			if ($t101_saldoawal_list->checkInlineEditKey() && $t101_saldoawal_list->EditRowCount == 0) { // Inline edit
				$t101_saldoawal->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($t101_saldoawal_list->isGridEdit()) { // Grid edit
			if ($t101_saldoawal->EventCancelled)
				$t101_saldoawal_list->restoreCurrentRowFormValues($t101_saldoawal_list->RowIndex); // Restore form values
			if ($t101_saldoawal_list->RowAction == "insert")
				$t101_saldoawal->RowType = ROWTYPE_ADD; // Render add
			else
				$t101_saldoawal->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t101_saldoawal_list->isEdit() && $t101_saldoawal->RowType == ROWTYPE_EDIT && $t101_saldoawal->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$t101_saldoawal_list->restoreFormValues(); // Restore form values
		}
		if ($t101_saldoawal_list->isGridEdit() && ($t101_saldoawal->RowType == ROWTYPE_EDIT || $t101_saldoawal->RowType == ROWTYPE_ADD) && $t101_saldoawal->EventCancelled) // Update failed
			$t101_saldoawal_list->restoreCurrentRowFormValues($t101_saldoawal_list->RowIndex); // Restore form values
		if ($t101_saldoawal->RowType == ROWTYPE_EDIT) // Edit row
			$t101_saldoawal_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t101_saldoawal->RowAttrs->merge(["data-rowindex" => $t101_saldoawal_list->RowCount, "id" => "r" . $t101_saldoawal_list->RowCount . "_t101_saldoawal", "data-rowtype" => $t101_saldoawal->RowType]);

		// Render row
		$t101_saldoawal_list->renderRow();

		// Render list options
		$t101_saldoawal_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t101_saldoawal_list->RowAction != "delete" && $t101_saldoawal_list->RowAction != "insertdelete" && !($t101_saldoawal_list->RowAction == "insert" && $t101_saldoawal->isConfirm() && $t101_saldoawal_list->emptyRow())) {
?>
	<tr <?php echo $t101_saldoawal->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_saldoawal_list->ListOptions->render("body", "left", $t101_saldoawal_list->RowCount);
?>
	<?php if ($t101_saldoawal_list->Tanggal->Visible) { // Tanggal ?>
		<td data-name="Tanggal" <?php echo $t101_saldoawal_list->Tanggal->cellAttributes() ?>>
<?php if ($t101_saldoawal->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_saldoawal_list->RowCount ?>_t101_saldoawal_Tanggal" class="form-group">
<input type="text" data-table="t101_saldoawal" data-field="x_Tanggal" data-format="7" name="x<?php echo $t101_saldoawal_list->RowIndex ?>_Tanggal" id="x<?php echo $t101_saldoawal_list->RowIndex ?>_Tanggal" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t101_saldoawal_list->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t101_saldoawal_list->Tanggal->EditValue ?>"<?php echo $t101_saldoawal_list->Tanggal->editAttributes() ?>>
<?php if (!$t101_saldoawal_list->Tanggal->ReadOnly && !$t101_saldoawal_list->Tanggal->Disabled && !isset($t101_saldoawal_list->Tanggal->EditAttrs["readonly"]) && !isset($t101_saldoawal_list->Tanggal->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft101_saldoawallist", "datetimepicker"], function() {
	ew.createDateTimePicker("ft101_saldoawallist", "x<?php echo $t101_saldoawal_list->RowIndex ?>_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t101_saldoawal" data-field="x_Tanggal" name="o<?php echo $t101_saldoawal_list->RowIndex ?>_Tanggal" id="o<?php echo $t101_saldoawal_list->RowIndex ?>_Tanggal" value="<?php echo HtmlEncode($t101_saldoawal_list->Tanggal->OldValue) ?>">
<?php } ?>
<?php if ($t101_saldoawal->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_saldoawal_list->RowCount ?>_t101_saldoawal_Tanggal" class="form-group">
<input type="text" data-table="t101_saldoawal" data-field="x_Tanggal" data-format="7" name="x<?php echo $t101_saldoawal_list->RowIndex ?>_Tanggal" id="x<?php echo $t101_saldoawal_list->RowIndex ?>_Tanggal" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t101_saldoawal_list->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t101_saldoawal_list->Tanggal->EditValue ?>"<?php echo $t101_saldoawal_list->Tanggal->editAttributes() ?>>
<?php if (!$t101_saldoawal_list->Tanggal->ReadOnly && !$t101_saldoawal_list->Tanggal->Disabled && !isset($t101_saldoawal_list->Tanggal->EditAttrs["readonly"]) && !isset($t101_saldoawal_list->Tanggal->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft101_saldoawallist", "datetimepicker"], function() {
	ew.createDateTimePicker("ft101_saldoawallist", "x<?php echo $t101_saldoawal_list->RowIndex ?>_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($t101_saldoawal->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_saldoawal_list->RowCount ?>_t101_saldoawal_Tanggal">
<span<?php echo $t101_saldoawal_list->Tanggal->viewAttributes() ?>><?php echo $t101_saldoawal_list->Tanggal->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t101_saldoawal->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t101_saldoawal" data-field="x_id" name="x<?php echo $t101_saldoawal_list->RowIndex ?>_id" id="x<?php echo $t101_saldoawal_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t101_saldoawal_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t101_saldoawal" data-field="x_id" name="o<?php echo $t101_saldoawal_list->RowIndex ?>_id" id="o<?php echo $t101_saldoawal_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t101_saldoawal_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t101_saldoawal->RowType == ROWTYPE_EDIT || $t101_saldoawal->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t101_saldoawal" data-field="x_id" name="x<?php echo $t101_saldoawal_list->RowIndex ?>_id" id="x<?php echo $t101_saldoawal_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t101_saldoawal_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t101_saldoawal_list->Jumlah->Visible) { // Jumlah ?>
		<td data-name="Jumlah" <?php echo $t101_saldoawal_list->Jumlah->cellAttributes() ?>>
<?php if ($t101_saldoawal->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t101_saldoawal_list->RowCount ?>_t101_saldoawal_Jumlah" class="form-group">
<input type="text" data-table="t101_saldoawal" data-field="x_Jumlah" name="x<?php echo $t101_saldoawal_list->RowIndex ?>_Jumlah" id="x<?php echo $t101_saldoawal_list->RowIndex ?>_Jumlah" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t101_saldoawal_list->Jumlah->getPlaceHolder()) ?>" value="<?php echo $t101_saldoawal_list->Jumlah->EditValue ?>"<?php echo $t101_saldoawal_list->Jumlah->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_saldoawal" data-field="x_Jumlah" name="o<?php echo $t101_saldoawal_list->RowIndex ?>_Jumlah" id="o<?php echo $t101_saldoawal_list->RowIndex ?>_Jumlah" value="<?php echo HtmlEncode($t101_saldoawal_list->Jumlah->OldValue) ?>">
<?php } ?>
<?php if ($t101_saldoawal->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t101_saldoawal_list->RowCount ?>_t101_saldoawal_Jumlah" class="form-group">
<input type="text" data-table="t101_saldoawal" data-field="x_Jumlah" name="x<?php echo $t101_saldoawal_list->RowIndex ?>_Jumlah" id="x<?php echo $t101_saldoawal_list->RowIndex ?>_Jumlah" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t101_saldoawal_list->Jumlah->getPlaceHolder()) ?>" value="<?php echo $t101_saldoawal_list->Jumlah->EditValue ?>"<?php echo $t101_saldoawal_list->Jumlah->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t101_saldoawal->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t101_saldoawal_list->RowCount ?>_t101_saldoawal_Jumlah">
<span<?php echo $t101_saldoawal_list->Jumlah->viewAttributes() ?>><?php echo $t101_saldoawal_list->Jumlah->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t101_saldoawal_list->ListOptions->render("body", "right", $t101_saldoawal_list->RowCount);
?>
	</tr>
<?php if ($t101_saldoawal->RowType == ROWTYPE_ADD || $t101_saldoawal->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft101_saldoawallist", "load"], function() {
	ft101_saldoawallist.updateLists(<?php echo $t101_saldoawal_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t101_saldoawal_list->isGridAdd())
		if (!$t101_saldoawal_list->Recordset->EOF)
			$t101_saldoawal_list->Recordset->moveNext();
}
?>
<?php
	if ($t101_saldoawal_list->isGridAdd() || $t101_saldoawal_list->isGridEdit()) {
		$t101_saldoawal_list->RowIndex = '$rowindex$';
		$t101_saldoawal_list->loadRowValues();

		// Set row properties
		$t101_saldoawal->resetAttributes();
		$t101_saldoawal->RowAttrs->merge(["data-rowindex" => $t101_saldoawal_list->RowIndex, "id" => "r0_t101_saldoawal", "data-rowtype" => ROWTYPE_ADD]);
		$t101_saldoawal->RowAttrs->appendClass("ew-template");
		$t101_saldoawal->RowType = ROWTYPE_ADD;

		// Render row
		$t101_saldoawal_list->renderRow();

		// Render list options
		$t101_saldoawal_list->renderListOptions();
		$t101_saldoawal_list->StartRowCount = 0;
?>
	<tr <?php echo $t101_saldoawal->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_saldoawal_list->ListOptions->render("body", "left", $t101_saldoawal_list->RowIndex);
?>
	<?php if ($t101_saldoawal_list->Tanggal->Visible) { // Tanggal ?>
		<td data-name="Tanggal">
<span id="el$rowindex$_t101_saldoawal_Tanggal" class="form-group t101_saldoawal_Tanggal">
<input type="text" data-table="t101_saldoawal" data-field="x_Tanggal" data-format="7" name="x<?php echo $t101_saldoawal_list->RowIndex ?>_Tanggal" id="x<?php echo $t101_saldoawal_list->RowIndex ?>_Tanggal" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t101_saldoawal_list->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t101_saldoawal_list->Tanggal->EditValue ?>"<?php echo $t101_saldoawal_list->Tanggal->editAttributes() ?>>
<?php if (!$t101_saldoawal_list->Tanggal->ReadOnly && !$t101_saldoawal_list->Tanggal->Disabled && !isset($t101_saldoawal_list->Tanggal->EditAttrs["readonly"]) && !isset($t101_saldoawal_list->Tanggal->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft101_saldoawallist", "datetimepicker"], function() {
	ew.createDateTimePicker("ft101_saldoawallist", "x<?php echo $t101_saldoawal_list->RowIndex ?>_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t101_saldoawal" data-field="x_Tanggal" name="o<?php echo $t101_saldoawal_list->RowIndex ?>_Tanggal" id="o<?php echo $t101_saldoawal_list->RowIndex ?>_Tanggal" value="<?php echo HtmlEncode($t101_saldoawal_list->Tanggal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t101_saldoawal_list->Jumlah->Visible) { // Jumlah ?>
		<td data-name="Jumlah">
<span id="el$rowindex$_t101_saldoawal_Jumlah" class="form-group t101_saldoawal_Jumlah">
<input type="text" data-table="t101_saldoawal" data-field="x_Jumlah" name="x<?php echo $t101_saldoawal_list->RowIndex ?>_Jumlah" id="x<?php echo $t101_saldoawal_list->RowIndex ?>_Jumlah" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t101_saldoawal_list->Jumlah->getPlaceHolder()) ?>" value="<?php echo $t101_saldoawal_list->Jumlah->EditValue ?>"<?php echo $t101_saldoawal_list->Jumlah->editAttributes() ?>>
</span>
<input type="hidden" data-table="t101_saldoawal" data-field="x_Jumlah" name="o<?php echo $t101_saldoawal_list->RowIndex ?>_Jumlah" id="o<?php echo $t101_saldoawal_list->RowIndex ?>_Jumlah" value="<?php echo HtmlEncode($t101_saldoawal_list->Jumlah->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t101_saldoawal_list->ListOptions->render("body", "right", $t101_saldoawal_list->RowIndex);
?>
<script>
loadjs.ready(["ft101_saldoawallist", "load"], function() {
	ft101_saldoawallist.updateLists(<?php echo $t101_saldoawal_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($t101_saldoawal_list->isAdd() || $t101_saldoawal_list->isCopy()) { ?>
<input type="hidden" name="<?php echo $t101_saldoawal_list->FormKeyCountName ?>" id="<?php echo $t101_saldoawal_list->FormKeyCountName ?>" value="<?php echo $t101_saldoawal_list->KeyCount ?>">
<?php } ?>
<?php if ($t101_saldoawal_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t101_saldoawal_list->FormKeyCountName ?>" id="<?php echo $t101_saldoawal_list->FormKeyCountName ?>" value="<?php echo $t101_saldoawal_list->KeyCount ?>">
<?php echo $t101_saldoawal_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t101_saldoawal_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $t101_saldoawal_list->FormKeyCountName ?>" id="<?php echo $t101_saldoawal_list->FormKeyCountName ?>" value="<?php echo $t101_saldoawal_list->KeyCount ?>">
<?php } ?>
<?php if ($t101_saldoawal_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t101_saldoawal_list->FormKeyCountName ?>" id="<?php echo $t101_saldoawal_list->FormKeyCountName ?>" value="<?php echo $t101_saldoawal_list->KeyCount ?>">
<?php echo $t101_saldoawal_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t101_saldoawal->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t101_saldoawal_list->Recordset)
	$t101_saldoawal_list->Recordset->Close();
?>
<?php if (!$t101_saldoawal_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t101_saldoawal_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t101_saldoawal_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t101_saldoawal_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t101_saldoawal_list->TotalRecords == 0 && !$t101_saldoawal->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t101_saldoawal_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t101_saldoawal_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t101_saldoawal_list->isExport()) { ?>
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
$t101_saldoawal_list->terminate();
?>