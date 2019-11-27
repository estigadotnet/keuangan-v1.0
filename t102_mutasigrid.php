<?php
namespace PHPMaker2020\p_keuangan_v1_0;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($t102_mutasi_grid))
	$t102_mutasi_grid = new t102_mutasi_grid();

// Run the page
$t102_mutasi_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_mutasi_grid->Page_Render();
?>
<?php if (!$t102_mutasi_grid->isExport()) { ?>
<script>
var ft102_mutasigrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	ft102_mutasigrid = new ew.Form("ft102_mutasigrid", "grid");
	ft102_mutasigrid.formKeyCountName = '<?php echo $t102_mutasi_grid->FormKeyCountName ?>';

	// Validate form
	ft102_mutasigrid.validate = function() {
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
			<?php if ($t102_mutasi_grid->Tanggal->Required) { ?>
				elm = this.getElements("x" + infix + "_Tanggal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_mutasi_grid->Tanggal->caption(), $t102_mutasi_grid->Tanggal->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Tanggal");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_mutasi_grid->Tanggal->errorMessage()) ?>");
			<?php if ($t102_mutasi_grid->NoUrut->Required) { ?>
				elm = this.getElements("x" + infix + "_NoUrut");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_mutasi_grid->NoUrut->caption(), $t102_mutasi_grid->NoUrut->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoUrut");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_mutasi_grid->NoUrut->errorMessage()) ?>");
			<?php if ($t102_mutasi_grid->jo_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jo_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_mutasi_grid->jo_id->caption(), $t102_mutasi_grid->jo_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t102_mutasi_grid->jenis_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jenis_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_mutasi_grid->jenis_id->caption(), $t102_mutasi_grid->jenis_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t102_mutasi_grid->Comment->Required) { ?>
				elm = this.getElements("x" + infix + "_Comment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_mutasi_grid->Comment->caption(), $t102_mutasi_grid->Comment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t102_mutasi_grid->Masuk->Required) { ?>
				elm = this.getElements("x" + infix + "_Masuk");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_mutasi_grid->Masuk->caption(), $t102_mutasi_grid->Masuk->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Masuk");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_mutasi_grid->Masuk->errorMessage()) ?>");
			<?php if ($t102_mutasi_grid->Keluar->Required) { ?>
				elm = this.getElements("x" + infix + "_Keluar");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_mutasi_grid->Keluar->caption(), $t102_mutasi_grid->Keluar->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Keluar");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_mutasi_grid->Keluar->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	ft102_mutasigrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "Tanggal", false)) return false;
		if (ew.valueChanged(fobj, infix, "NoUrut", false)) return false;
		if (ew.valueChanged(fobj, infix, "jo_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "jenis_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "Comment", false)) return false;
		if (ew.valueChanged(fobj, infix, "Masuk", false)) return false;
		if (ew.valueChanged(fobj, infix, "Keluar", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft102_mutasigrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft102_mutasigrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft102_mutasigrid.lists["x_jo_id"] = <?php echo $t102_mutasi_grid->jo_id->Lookup->toClientList($t102_mutasi_grid) ?>;
	ft102_mutasigrid.lists["x_jo_id"].options = <?php echo JsonEncode($t102_mutasi_grid->jo_id->lookupOptions()) ?>;
	ft102_mutasigrid.lists["x_jenis_id"] = <?php echo $t102_mutasi_grid->jenis_id->Lookup->toClientList($t102_mutasi_grid) ?>;
	ft102_mutasigrid.lists["x_jenis_id"].options = <?php echo JsonEncode($t102_mutasi_grid->jenis_id->lookupOptions()) ?>;
	loadjs.done("ft102_mutasigrid");
});
</script>
<?php } ?>
<?php
$t102_mutasi_grid->renderOtherOptions();
?>
<?php if ($t102_mutasi_grid->TotalRecords > 0 || $t102_mutasi->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t102_mutasi_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t102_mutasi">
<?php if ($t102_mutasi_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $t102_mutasi_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="ft102_mutasigrid" class="ew-form ew-list-form form-inline">
<div id="gmp_t102_mutasi" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_t102_mutasigrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t102_mutasi->RowType = ROWTYPE_HEADER;

// Render list options
$t102_mutasi_grid->renderListOptions();

// Render list options (header, left)
$t102_mutasi_grid->ListOptions->render("header", "left");
?>
<?php if ($t102_mutasi_grid->Tanggal->Visible) { // Tanggal ?>
	<?php if ($t102_mutasi_grid->SortUrl($t102_mutasi_grid->Tanggal) == "") { ?>
		<th data-name="Tanggal" class="<?php echo $t102_mutasi_grid->Tanggal->headerCellClass() ?>"><div id="elh_t102_mutasi_Tanggal" class="t102_mutasi_Tanggal"><div class="ew-table-header-caption"><?php echo $t102_mutasi_grid->Tanggal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tanggal" class="<?php echo $t102_mutasi_grid->Tanggal->headerCellClass() ?>"><div><div id="elh_t102_mutasi_Tanggal" class="t102_mutasi_Tanggal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_mutasi_grid->Tanggal->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_mutasi_grid->Tanggal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_mutasi_grid->Tanggal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_mutasi_grid->NoUrut->Visible) { // NoUrut ?>
	<?php if ($t102_mutasi_grid->SortUrl($t102_mutasi_grid->NoUrut) == "") { ?>
		<th data-name="NoUrut" class="<?php echo $t102_mutasi_grid->NoUrut->headerCellClass() ?>"><div id="elh_t102_mutasi_NoUrut" class="t102_mutasi_NoUrut"><div class="ew-table-header-caption"><?php echo $t102_mutasi_grid->NoUrut->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoUrut" class="<?php echo $t102_mutasi_grid->NoUrut->headerCellClass() ?>"><div><div id="elh_t102_mutasi_NoUrut" class="t102_mutasi_NoUrut">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_mutasi_grid->NoUrut->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_mutasi_grid->NoUrut->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_mutasi_grid->NoUrut->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_mutasi_grid->jo_id->Visible) { // jo_id ?>
	<?php if ($t102_mutasi_grid->SortUrl($t102_mutasi_grid->jo_id) == "") { ?>
		<th data-name="jo_id" class="<?php echo $t102_mutasi_grid->jo_id->headerCellClass() ?>"><div id="elh_t102_mutasi_jo_id" class="t102_mutasi_jo_id"><div class="ew-table-header-caption"><?php echo $t102_mutasi_grid->jo_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jo_id" class="<?php echo $t102_mutasi_grid->jo_id->headerCellClass() ?>"><div><div id="elh_t102_mutasi_jo_id" class="t102_mutasi_jo_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_mutasi_grid->jo_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_mutasi_grid->jo_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_mutasi_grid->jo_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_mutasi_grid->jenis_id->Visible) { // jenis_id ?>
	<?php if ($t102_mutasi_grid->SortUrl($t102_mutasi_grid->jenis_id) == "") { ?>
		<th data-name="jenis_id" class="<?php echo $t102_mutasi_grid->jenis_id->headerCellClass() ?>"><div id="elh_t102_mutasi_jenis_id" class="t102_mutasi_jenis_id"><div class="ew-table-header-caption"><?php echo $t102_mutasi_grid->jenis_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenis_id" class="<?php echo $t102_mutasi_grid->jenis_id->headerCellClass() ?>"><div><div id="elh_t102_mutasi_jenis_id" class="t102_mutasi_jenis_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_mutasi_grid->jenis_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_mutasi_grid->jenis_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_mutasi_grid->jenis_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_mutasi_grid->Comment->Visible) { // Comment ?>
	<?php if ($t102_mutasi_grid->SortUrl($t102_mutasi_grid->Comment) == "") { ?>
		<th data-name="Comment" class="<?php echo $t102_mutasi_grid->Comment->headerCellClass() ?>"><div id="elh_t102_mutasi_Comment" class="t102_mutasi_Comment"><div class="ew-table-header-caption"><?php echo $t102_mutasi_grid->Comment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Comment" class="<?php echo $t102_mutasi_grid->Comment->headerCellClass() ?>"><div><div id="elh_t102_mutasi_Comment" class="t102_mutasi_Comment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_mutasi_grid->Comment->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_mutasi_grid->Comment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_mutasi_grid->Comment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_mutasi_grid->Masuk->Visible) { // Masuk ?>
	<?php if ($t102_mutasi_grid->SortUrl($t102_mutasi_grid->Masuk) == "") { ?>
		<th data-name="Masuk" class="<?php echo $t102_mutasi_grid->Masuk->headerCellClass() ?>"><div id="elh_t102_mutasi_Masuk" class="t102_mutasi_Masuk"><div class="ew-table-header-caption"><?php echo $t102_mutasi_grid->Masuk->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Masuk" class="<?php echo $t102_mutasi_grid->Masuk->headerCellClass() ?>"><div><div id="elh_t102_mutasi_Masuk" class="t102_mutasi_Masuk">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_mutasi_grid->Masuk->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_mutasi_grid->Masuk->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_mutasi_grid->Masuk->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_mutasi_grid->Keluar->Visible) { // Keluar ?>
	<?php if ($t102_mutasi_grid->SortUrl($t102_mutasi_grid->Keluar) == "") { ?>
		<th data-name="Keluar" class="<?php echo $t102_mutasi_grid->Keluar->headerCellClass() ?>"><div id="elh_t102_mutasi_Keluar" class="t102_mutasi_Keluar"><div class="ew-table-header-caption"><?php echo $t102_mutasi_grid->Keluar->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Keluar" class="<?php echo $t102_mutasi_grid->Keluar->headerCellClass() ?>"><div><div id="elh_t102_mutasi_Keluar" class="t102_mutasi_Keluar">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_mutasi_grid->Keluar->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_mutasi_grid->Keluar->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_mutasi_grid->Keluar->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t102_mutasi_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$t102_mutasi_grid->StartRecord = 1;
$t102_mutasi_grid->StopRecord = $t102_mutasi_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($t102_mutasi->isConfirm() || $t102_mutasi_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t102_mutasi_grid->FormKeyCountName) && ($t102_mutasi_grid->isGridAdd() || $t102_mutasi_grid->isGridEdit() || $t102_mutasi->isConfirm())) {
		$t102_mutasi_grid->KeyCount = $CurrentForm->getValue($t102_mutasi_grid->FormKeyCountName);
		$t102_mutasi_grid->StopRecord = $t102_mutasi_grid->StartRecord + $t102_mutasi_grid->KeyCount - 1;
	}
}
$t102_mutasi_grid->RecordCount = $t102_mutasi_grid->StartRecord - 1;
if ($t102_mutasi_grid->Recordset && !$t102_mutasi_grid->Recordset->EOF) {
	$t102_mutasi_grid->Recordset->moveFirst();
	$selectLimit = $t102_mutasi_grid->UseSelectLimit;
	if (!$selectLimit && $t102_mutasi_grid->StartRecord > 1)
		$t102_mutasi_grid->Recordset->move($t102_mutasi_grid->StartRecord - 1);
} elseif (!$t102_mutasi->AllowAddDeleteRow && $t102_mutasi_grid->StopRecord == 0) {
	$t102_mutasi_grid->StopRecord = $t102_mutasi->GridAddRowCount;
}

// Initialize aggregate
$t102_mutasi->RowType = ROWTYPE_AGGREGATEINIT;
$t102_mutasi->resetAttributes();
$t102_mutasi_grid->renderRow();
if ($t102_mutasi_grid->isGridAdd())
	$t102_mutasi_grid->RowIndex = 0;
if ($t102_mutasi_grid->isGridEdit())
	$t102_mutasi_grid->RowIndex = 0;
while ($t102_mutasi_grid->RecordCount < $t102_mutasi_grid->StopRecord) {
	$t102_mutasi_grid->RecordCount++;
	if ($t102_mutasi_grid->RecordCount >= $t102_mutasi_grid->StartRecord) {
		$t102_mutasi_grid->RowCount++;
		if ($t102_mutasi_grid->isGridAdd() || $t102_mutasi_grid->isGridEdit() || $t102_mutasi->isConfirm()) {
			$t102_mutasi_grid->RowIndex++;
			$CurrentForm->Index = $t102_mutasi_grid->RowIndex;
			if ($CurrentForm->hasValue($t102_mutasi_grid->FormActionName) && ($t102_mutasi->isConfirm() || $t102_mutasi_grid->EventCancelled))
				$t102_mutasi_grid->RowAction = strval($CurrentForm->getValue($t102_mutasi_grid->FormActionName));
			elseif ($t102_mutasi_grid->isGridAdd())
				$t102_mutasi_grid->RowAction = "insert";
			else
				$t102_mutasi_grid->RowAction = "";
		}

		// Set up key count
		$t102_mutasi_grid->KeyCount = $t102_mutasi_grid->RowIndex;

		// Init row class and style
		$t102_mutasi->resetAttributes();
		$t102_mutasi->CssClass = "";
		if ($t102_mutasi_grid->isGridAdd()) {
			if ($t102_mutasi->CurrentMode == "copy") {
				$t102_mutasi_grid->loadRowValues($t102_mutasi_grid->Recordset); // Load row values
				$t102_mutasi_grid->setRecordKey($t102_mutasi_grid->RowOldKey, $t102_mutasi_grid->Recordset); // Set old record key
			} else {
				$t102_mutasi_grid->loadRowValues(); // Load default values
				$t102_mutasi_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$t102_mutasi_grid->loadRowValues($t102_mutasi_grid->Recordset); // Load row values
		}
		$t102_mutasi->RowType = ROWTYPE_VIEW; // Render view
		if ($t102_mutasi_grid->isGridAdd()) // Grid add
			$t102_mutasi->RowType = ROWTYPE_ADD; // Render add
		if ($t102_mutasi_grid->isGridAdd() && $t102_mutasi->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t102_mutasi_grid->restoreCurrentRowFormValues($t102_mutasi_grid->RowIndex); // Restore form values
		if ($t102_mutasi_grid->isGridEdit()) { // Grid edit
			if ($t102_mutasi->EventCancelled)
				$t102_mutasi_grid->restoreCurrentRowFormValues($t102_mutasi_grid->RowIndex); // Restore form values
			if ($t102_mutasi_grid->RowAction == "insert")
				$t102_mutasi->RowType = ROWTYPE_ADD; // Render add
			else
				$t102_mutasi->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t102_mutasi_grid->isGridEdit() && ($t102_mutasi->RowType == ROWTYPE_EDIT || $t102_mutasi->RowType == ROWTYPE_ADD) && $t102_mutasi->EventCancelled) // Update failed
			$t102_mutasi_grid->restoreCurrentRowFormValues($t102_mutasi_grid->RowIndex); // Restore form values
		if ($t102_mutasi->RowType == ROWTYPE_EDIT) // Edit row
			$t102_mutasi_grid->EditRowCount++;
		if ($t102_mutasi->isConfirm()) // Confirm row
			$t102_mutasi_grid->restoreCurrentRowFormValues($t102_mutasi_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$t102_mutasi->RowAttrs->merge(["data-rowindex" => $t102_mutasi_grid->RowCount, "id" => "r" . $t102_mutasi_grid->RowCount . "_t102_mutasi", "data-rowtype" => $t102_mutasi->RowType]);

		// Render row
		$t102_mutasi_grid->renderRow();

		// Render list options
		$t102_mutasi_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t102_mutasi_grid->RowAction != "delete" && $t102_mutasi_grid->RowAction != "insertdelete" && !($t102_mutasi_grid->RowAction == "insert" && $t102_mutasi->isConfirm() && $t102_mutasi_grid->emptyRow())) {
?>
	<tr <?php echo $t102_mutasi->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t102_mutasi_grid->ListOptions->render("body", "left", $t102_mutasi_grid->RowCount);
?>
	<?php if ($t102_mutasi_grid->Tanggal->Visible) { // Tanggal ?>
		<td data-name="Tanggal" <?php echo $t102_mutasi_grid->Tanggal->cellAttributes() ?>>
<?php if ($t102_mutasi->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_Tanggal" class="form-group">
<input type="text" data-table="t102_mutasi" data-field="x_Tanggal" data-format="7" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t102_mutasi_grid->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_grid->Tanggal->EditValue ?>"<?php echo $t102_mutasi_grid->Tanggal->editAttributes() ?>>
<?php if (!$t102_mutasi_grid->Tanggal->ReadOnly && !$t102_mutasi_grid->Tanggal->Disabled && !isset($t102_mutasi_grid->Tanggal->EditAttrs["readonly"]) && !isset($t102_mutasi_grid->Tanggal->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft102_mutasigrid", "datetimepicker"], function() {
	ew.createDateTimePicker("ft102_mutasigrid", "x<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_Tanggal" name="o<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal" id="o<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal" value="<?php echo HtmlEncode($t102_mutasi_grid->Tanggal->OldValue) ?>">
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_Tanggal" class="form-group">
<input type="text" data-table="t102_mutasi" data-field="x_Tanggal" data-format="7" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t102_mutasi_grid->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_grid->Tanggal->EditValue ?>"<?php echo $t102_mutasi_grid->Tanggal->editAttributes() ?>>
<?php if (!$t102_mutasi_grid->Tanggal->ReadOnly && !$t102_mutasi_grid->Tanggal->Disabled && !isset($t102_mutasi_grid->Tanggal->EditAttrs["readonly"]) && !isset($t102_mutasi_grid->Tanggal->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft102_mutasigrid", "datetimepicker"], function() {
	ew.createDateTimePicker("ft102_mutasigrid", "x<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_Tanggal">
<span<?php echo $t102_mutasi_grid->Tanggal->viewAttributes() ?>><?php echo $t102_mutasi_grid->Tanggal->getViewValue() ?></span>
</span>
<?php if (!$t102_mutasi->isConfirm()) { ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_Tanggal" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal" value="<?php echo HtmlEncode($t102_mutasi_grid->Tanggal->FormValue) ?>">
<input type="hidden" data-table="t102_mutasi" data-field="x_Tanggal" name="o<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal" id="o<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal" value="<?php echo HtmlEncode($t102_mutasi_grid->Tanggal->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_Tanggal" name="ft102_mutasigrid$x<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal" id="ft102_mutasigrid$x<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal" value="<?php echo HtmlEncode($t102_mutasi_grid->Tanggal->FormValue) ?>">
<input type="hidden" data-table="t102_mutasi" data-field="x_Tanggal" name="ft102_mutasigrid$o<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal" id="ft102_mutasigrid$o<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal" value="<?php echo HtmlEncode($t102_mutasi_grid->Tanggal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_id" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_id" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_mutasi_grid->id->CurrentValue) ?>">
<input type="hidden" data-table="t102_mutasi" data-field="x_id" name="o<?php echo $t102_mutasi_grid->RowIndex ?>_id" id="o<?php echo $t102_mutasi_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_mutasi_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_EDIT || $t102_mutasi->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_id" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_id" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_mutasi_grid->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t102_mutasi_grid->NoUrut->Visible) { // NoUrut ?>
		<td data-name="NoUrut" <?php echo $t102_mutasi_grid->NoUrut->cellAttributes() ?>>
<?php if ($t102_mutasi->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_NoUrut" class="form-group">
<input type="text" data-table="t102_mutasi" data-field="x_NoUrut" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_NoUrut" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_NoUrut" size="3" maxlength="4" placeholder="<?php echo HtmlEncode($t102_mutasi_grid->NoUrut->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_grid->NoUrut->EditValue ?>"<?php echo $t102_mutasi_grid->NoUrut->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_NoUrut" name="o<?php echo $t102_mutasi_grid->RowIndex ?>_NoUrut" id="o<?php echo $t102_mutasi_grid->RowIndex ?>_NoUrut" value="<?php echo HtmlEncode($t102_mutasi_grid->NoUrut->OldValue) ?>">
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_NoUrut" class="form-group">
<input type="text" data-table="t102_mutasi" data-field="x_NoUrut" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_NoUrut" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_NoUrut" size="3" maxlength="4" placeholder="<?php echo HtmlEncode($t102_mutasi_grid->NoUrut->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_grid->NoUrut->EditValue ?>"<?php echo $t102_mutasi_grid->NoUrut->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_NoUrut">
<span<?php echo $t102_mutasi_grid->NoUrut->viewAttributes() ?>><?php echo $t102_mutasi_grid->NoUrut->getViewValue() ?></span>
</span>
<?php if (!$t102_mutasi->isConfirm()) { ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_NoUrut" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_NoUrut" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_NoUrut" value="<?php echo HtmlEncode($t102_mutasi_grid->NoUrut->FormValue) ?>">
<input type="hidden" data-table="t102_mutasi" data-field="x_NoUrut" name="o<?php echo $t102_mutasi_grid->RowIndex ?>_NoUrut" id="o<?php echo $t102_mutasi_grid->RowIndex ?>_NoUrut" value="<?php echo HtmlEncode($t102_mutasi_grid->NoUrut->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_NoUrut" name="ft102_mutasigrid$x<?php echo $t102_mutasi_grid->RowIndex ?>_NoUrut" id="ft102_mutasigrid$x<?php echo $t102_mutasi_grid->RowIndex ?>_NoUrut" value="<?php echo HtmlEncode($t102_mutasi_grid->NoUrut->FormValue) ?>">
<input type="hidden" data-table="t102_mutasi" data-field="x_NoUrut" name="ft102_mutasigrid$o<?php echo $t102_mutasi_grid->RowIndex ?>_NoUrut" id="ft102_mutasigrid$o<?php echo $t102_mutasi_grid->RowIndex ?>_NoUrut" value="<?php echo HtmlEncode($t102_mutasi_grid->NoUrut->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_mutasi_grid->jo_id->Visible) { // jo_id ?>
		<td data-name="jo_id" <?php echo $t102_mutasi_grid->jo_id->cellAttributes() ?>>
<?php if ($t102_mutasi->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($t102_mutasi_grid->jo_id->getSessionValue() != "") { ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_jo_id" class="form-group">
<span<?php echo $t102_mutasi_grid->jo_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_mutasi_grid->jo_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" value="<?php echo HtmlEncode($t102_mutasi_grid->jo_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_jo_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id"><?php echo EmptyValue(strval($t102_mutasi_grid->jo_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_mutasi_grid->jo_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_mutasi_grid->jo_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_mutasi_grid->jo_id->ReadOnly || $t102_mutasi_grid->jo_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t001_jo") && !$t102_mutasi_grid->jo_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_mutasi_grid->jo_id->caption() ?>" data-title="<?php echo $t102_mutasi_grid->jo_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id',url:'t001_joaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t102_mutasi_grid->jo_id->Lookup->getParamTag($t102_mutasi_grid, "p_x" . $t102_mutasi_grid->RowIndex . "_jo_id") ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jo_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_mutasi_grid->jo_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" value="<?php echo $t102_mutasi_grid->jo_id->CurrentValue ?>"<?php echo $t102_mutasi_grid->jo_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jo_id" name="o<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" id="o<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" value="<?php echo HtmlEncode($t102_mutasi_grid->jo_id->OldValue) ?>">
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($t102_mutasi_grid->jo_id->getSessionValue() != "") { ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_jo_id" class="form-group">
<span<?php echo $t102_mutasi_grid->jo_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_mutasi_grid->jo_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" value="<?php echo HtmlEncode($t102_mutasi_grid->jo_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_jo_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id"><?php echo EmptyValue(strval($t102_mutasi_grid->jo_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_mutasi_grid->jo_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_mutasi_grid->jo_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_mutasi_grid->jo_id->ReadOnly || $t102_mutasi_grid->jo_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t001_jo") && !$t102_mutasi_grid->jo_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_mutasi_grid->jo_id->caption() ?>" data-title="<?php echo $t102_mutasi_grid->jo_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id',url:'t001_joaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t102_mutasi_grid->jo_id->Lookup->getParamTag($t102_mutasi_grid, "p_x" . $t102_mutasi_grid->RowIndex . "_jo_id") ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jo_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_mutasi_grid->jo_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" value="<?php echo $t102_mutasi_grid->jo_id->CurrentValue ?>"<?php echo $t102_mutasi_grid->jo_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_jo_id">
<span<?php echo $t102_mutasi_grid->jo_id->viewAttributes() ?>><?php echo $t102_mutasi_grid->jo_id->getViewValue() ?></span>
</span>
<?php if (!$t102_mutasi->isConfirm()) { ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jo_id" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" value="<?php echo HtmlEncode($t102_mutasi_grid->jo_id->FormValue) ?>">
<input type="hidden" data-table="t102_mutasi" data-field="x_jo_id" name="o<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" id="o<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" value="<?php echo HtmlEncode($t102_mutasi_grid->jo_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jo_id" name="ft102_mutasigrid$x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" id="ft102_mutasigrid$x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" value="<?php echo HtmlEncode($t102_mutasi_grid->jo_id->FormValue) ?>">
<input type="hidden" data-table="t102_mutasi" data-field="x_jo_id" name="ft102_mutasigrid$o<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" id="ft102_mutasigrid$o<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" value="<?php echo HtmlEncode($t102_mutasi_grid->jo_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_mutasi_grid->jenis_id->Visible) { // jenis_id ?>
		<td data-name="jenis_id" <?php echo $t102_mutasi_grid->jenis_id->cellAttributes() ?>>
<?php if ($t102_mutasi->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_jenis_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id"><?php echo EmptyValue(strval($t102_mutasi_grid->jenis_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_mutasi_grid->jenis_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_mutasi_grid->jenis_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_mutasi_grid->jenis_id->ReadOnly || $t102_mutasi_grid->jenis_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t002_jenis") && !$t102_mutasi_grid->jenis_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_mutasi_grid->jenis_id->caption() ?>" data-title="<?php echo $t102_mutasi_grid->jenis_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id',url:'t002_jenisaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t102_mutasi_grid->jenis_id->Lookup->getParamTag($t102_mutasi_grid, "p_x" . $t102_mutasi_grid->RowIndex . "_jenis_id") ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jenis_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_mutasi_grid->jenis_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" value="<?php echo $t102_mutasi_grid->jenis_id->CurrentValue ?>"<?php echo $t102_mutasi_grid->jenis_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_jenis_id" name="o<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" id="o<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" value="<?php echo HtmlEncode($t102_mutasi_grid->jenis_id->OldValue) ?>">
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_jenis_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id"><?php echo EmptyValue(strval($t102_mutasi_grid->jenis_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_mutasi_grid->jenis_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_mutasi_grid->jenis_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_mutasi_grid->jenis_id->ReadOnly || $t102_mutasi_grid->jenis_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t002_jenis") && !$t102_mutasi_grid->jenis_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_mutasi_grid->jenis_id->caption() ?>" data-title="<?php echo $t102_mutasi_grid->jenis_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id',url:'t002_jenisaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t102_mutasi_grid->jenis_id->Lookup->getParamTag($t102_mutasi_grid, "p_x" . $t102_mutasi_grid->RowIndex . "_jenis_id") ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jenis_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_mutasi_grid->jenis_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" value="<?php echo $t102_mutasi_grid->jenis_id->CurrentValue ?>"<?php echo $t102_mutasi_grid->jenis_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_jenis_id">
<span<?php echo $t102_mutasi_grid->jenis_id->viewAttributes() ?>><?php echo $t102_mutasi_grid->jenis_id->getViewValue() ?></span>
</span>
<?php if (!$t102_mutasi->isConfirm()) { ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jenis_id" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" value="<?php echo HtmlEncode($t102_mutasi_grid->jenis_id->FormValue) ?>">
<input type="hidden" data-table="t102_mutasi" data-field="x_jenis_id" name="o<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" id="o<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" value="<?php echo HtmlEncode($t102_mutasi_grid->jenis_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jenis_id" name="ft102_mutasigrid$x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" id="ft102_mutasigrid$x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" value="<?php echo HtmlEncode($t102_mutasi_grid->jenis_id->FormValue) ?>">
<input type="hidden" data-table="t102_mutasi" data-field="x_jenis_id" name="ft102_mutasigrid$o<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" id="ft102_mutasigrid$o<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" value="<?php echo HtmlEncode($t102_mutasi_grid->jenis_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_mutasi_grid->Comment->Visible) { // Comment ?>
		<td data-name="Comment" <?php echo $t102_mutasi_grid->Comment->cellAttributes() ?>>
<?php if ($t102_mutasi->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_Comment" class="form-group">
<textarea data-table="t102_mutasi" data-field="x_Comment" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_Comment" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_Comment" cols="25" rows="1" placeholder="<?php echo HtmlEncode($t102_mutasi_grid->Comment->getPlaceHolder()) ?>"<?php echo $t102_mutasi_grid->Comment->editAttributes() ?>><?php echo $t102_mutasi_grid->Comment->EditValue ?></textarea>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_Comment" name="o<?php echo $t102_mutasi_grid->RowIndex ?>_Comment" id="o<?php echo $t102_mutasi_grid->RowIndex ?>_Comment" value="<?php echo HtmlEncode($t102_mutasi_grid->Comment->OldValue) ?>">
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_Comment" class="form-group">
<textarea data-table="t102_mutasi" data-field="x_Comment" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_Comment" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_Comment" cols="25" rows="1" placeholder="<?php echo HtmlEncode($t102_mutasi_grid->Comment->getPlaceHolder()) ?>"<?php echo $t102_mutasi_grid->Comment->editAttributes() ?>><?php echo $t102_mutasi_grid->Comment->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_Comment">
<span<?php echo $t102_mutasi_grid->Comment->viewAttributes() ?>><?php echo $t102_mutasi_grid->Comment->getViewValue() ?></span>
</span>
<?php if (!$t102_mutasi->isConfirm()) { ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_Comment" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_Comment" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_Comment" value="<?php echo HtmlEncode($t102_mutasi_grid->Comment->FormValue) ?>">
<input type="hidden" data-table="t102_mutasi" data-field="x_Comment" name="o<?php echo $t102_mutasi_grid->RowIndex ?>_Comment" id="o<?php echo $t102_mutasi_grid->RowIndex ?>_Comment" value="<?php echo HtmlEncode($t102_mutasi_grid->Comment->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_Comment" name="ft102_mutasigrid$x<?php echo $t102_mutasi_grid->RowIndex ?>_Comment" id="ft102_mutasigrid$x<?php echo $t102_mutasi_grid->RowIndex ?>_Comment" value="<?php echo HtmlEncode($t102_mutasi_grid->Comment->FormValue) ?>">
<input type="hidden" data-table="t102_mutasi" data-field="x_Comment" name="ft102_mutasigrid$o<?php echo $t102_mutasi_grid->RowIndex ?>_Comment" id="ft102_mutasigrid$o<?php echo $t102_mutasi_grid->RowIndex ?>_Comment" value="<?php echo HtmlEncode($t102_mutasi_grid->Comment->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_mutasi_grid->Masuk->Visible) { // Masuk ?>
		<td data-name="Masuk" <?php echo $t102_mutasi_grid->Masuk->cellAttributes() ?>>
<?php if ($t102_mutasi->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_Masuk" class="form-group">
<input type="text" data-table="t102_mutasi" data-field="x_Masuk" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_Masuk" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_Masuk" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t102_mutasi_grid->Masuk->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_grid->Masuk->EditValue ?>"<?php echo $t102_mutasi_grid->Masuk->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_Masuk" name="o<?php echo $t102_mutasi_grid->RowIndex ?>_Masuk" id="o<?php echo $t102_mutasi_grid->RowIndex ?>_Masuk" value="<?php echo HtmlEncode($t102_mutasi_grid->Masuk->OldValue) ?>">
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_Masuk" class="form-group">
<input type="text" data-table="t102_mutasi" data-field="x_Masuk" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_Masuk" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_Masuk" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t102_mutasi_grid->Masuk->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_grid->Masuk->EditValue ?>"<?php echo $t102_mutasi_grid->Masuk->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_Masuk">
<span<?php echo $t102_mutasi_grid->Masuk->viewAttributes() ?>><?php echo $t102_mutasi_grid->Masuk->getViewValue() ?></span>
</span>
<?php if (!$t102_mutasi->isConfirm()) { ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_Masuk" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_Masuk" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_Masuk" value="<?php echo HtmlEncode($t102_mutasi_grid->Masuk->FormValue) ?>">
<input type="hidden" data-table="t102_mutasi" data-field="x_Masuk" name="o<?php echo $t102_mutasi_grid->RowIndex ?>_Masuk" id="o<?php echo $t102_mutasi_grid->RowIndex ?>_Masuk" value="<?php echo HtmlEncode($t102_mutasi_grid->Masuk->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_Masuk" name="ft102_mutasigrid$x<?php echo $t102_mutasi_grid->RowIndex ?>_Masuk" id="ft102_mutasigrid$x<?php echo $t102_mutasi_grid->RowIndex ?>_Masuk" value="<?php echo HtmlEncode($t102_mutasi_grid->Masuk->FormValue) ?>">
<input type="hidden" data-table="t102_mutasi" data-field="x_Masuk" name="ft102_mutasigrid$o<?php echo $t102_mutasi_grid->RowIndex ?>_Masuk" id="ft102_mutasigrid$o<?php echo $t102_mutasi_grid->RowIndex ?>_Masuk" value="<?php echo HtmlEncode($t102_mutasi_grid->Masuk->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_mutasi_grid->Keluar->Visible) { // Keluar ?>
		<td data-name="Keluar" <?php echo $t102_mutasi_grid->Keluar->cellAttributes() ?>>
<?php if ($t102_mutasi->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_Keluar" class="form-group">
<input type="text" data-table="t102_mutasi" data-field="x_Keluar" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_Keluar" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_Keluar" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t102_mutasi_grid->Keluar->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_grid->Keluar->EditValue ?>"<?php echo $t102_mutasi_grid->Keluar->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_Keluar" name="o<?php echo $t102_mutasi_grid->RowIndex ?>_Keluar" id="o<?php echo $t102_mutasi_grid->RowIndex ?>_Keluar" value="<?php echo HtmlEncode($t102_mutasi_grid->Keluar->OldValue) ?>">
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_Keluar" class="form-group">
<input type="text" data-table="t102_mutasi" data-field="x_Keluar" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_Keluar" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_Keluar" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t102_mutasi_grid->Keluar->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_grid->Keluar->EditValue ?>"<?php echo $t102_mutasi_grid->Keluar->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_mutasi_grid->RowCount ?>_t102_mutasi_Keluar">
<span<?php echo $t102_mutasi_grid->Keluar->viewAttributes() ?>><?php echo $t102_mutasi_grid->Keluar->getViewValue() ?></span>
</span>
<?php if (!$t102_mutasi->isConfirm()) { ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_Keluar" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_Keluar" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_Keluar" value="<?php echo HtmlEncode($t102_mutasi_grid->Keluar->FormValue) ?>">
<input type="hidden" data-table="t102_mutasi" data-field="x_Keluar" name="o<?php echo $t102_mutasi_grid->RowIndex ?>_Keluar" id="o<?php echo $t102_mutasi_grid->RowIndex ?>_Keluar" value="<?php echo HtmlEncode($t102_mutasi_grid->Keluar->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_Keluar" name="ft102_mutasigrid$x<?php echo $t102_mutasi_grid->RowIndex ?>_Keluar" id="ft102_mutasigrid$x<?php echo $t102_mutasi_grid->RowIndex ?>_Keluar" value="<?php echo HtmlEncode($t102_mutasi_grid->Keluar->FormValue) ?>">
<input type="hidden" data-table="t102_mutasi" data-field="x_Keluar" name="ft102_mutasigrid$o<?php echo $t102_mutasi_grid->RowIndex ?>_Keluar" id="ft102_mutasigrid$o<?php echo $t102_mutasi_grid->RowIndex ?>_Keluar" value="<?php echo HtmlEncode($t102_mutasi_grid->Keluar->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t102_mutasi_grid->ListOptions->render("body", "right", $t102_mutasi_grid->RowCount);
?>
	</tr>
<?php if ($t102_mutasi->RowType == ROWTYPE_ADD || $t102_mutasi->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft102_mutasigrid", "load"], function() {
	ft102_mutasigrid.updateLists(<?php echo $t102_mutasi_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t102_mutasi_grid->isGridAdd() || $t102_mutasi->CurrentMode == "copy")
		if (!$t102_mutasi_grid->Recordset->EOF)
			$t102_mutasi_grid->Recordset->moveNext();
}
?>
<?php
	if ($t102_mutasi->CurrentMode == "add" || $t102_mutasi->CurrentMode == "copy" || $t102_mutasi->CurrentMode == "edit") {
		$t102_mutasi_grid->RowIndex = '$rowindex$';
		$t102_mutasi_grid->loadRowValues();

		// Set row properties
		$t102_mutasi->resetAttributes();
		$t102_mutasi->RowAttrs->merge(["data-rowindex" => $t102_mutasi_grid->RowIndex, "id" => "r0_t102_mutasi", "data-rowtype" => ROWTYPE_ADD]);
		$t102_mutasi->RowAttrs->appendClass("ew-template");
		$t102_mutasi->RowType = ROWTYPE_ADD;

		// Render row
		$t102_mutasi_grid->renderRow();

		// Render list options
		$t102_mutasi_grid->renderListOptions();
		$t102_mutasi_grid->StartRowCount = 0;
?>
	<tr <?php echo $t102_mutasi->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t102_mutasi_grid->ListOptions->render("body", "left", $t102_mutasi_grid->RowIndex);
?>
	<?php if ($t102_mutasi_grid->Tanggal->Visible) { // Tanggal ?>
		<td data-name="Tanggal">
<?php if (!$t102_mutasi->isConfirm()) { ?>
<span id="el$rowindex$_t102_mutasi_Tanggal" class="form-group t102_mutasi_Tanggal">
<input type="text" data-table="t102_mutasi" data-field="x_Tanggal" data-format="7" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t102_mutasi_grid->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_grid->Tanggal->EditValue ?>"<?php echo $t102_mutasi_grid->Tanggal->editAttributes() ?>>
<?php if (!$t102_mutasi_grid->Tanggal->ReadOnly && !$t102_mutasi_grid->Tanggal->Disabled && !isset($t102_mutasi_grid->Tanggal->EditAttrs["readonly"]) && !isset($t102_mutasi_grid->Tanggal->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft102_mutasigrid", "datetimepicker"], function() {
	ew.createDateTimePicker("ft102_mutasigrid", "x<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_t102_mutasi_Tanggal" class="form-group t102_mutasi_Tanggal">
<span<?php echo $t102_mutasi_grid->Tanggal->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_mutasi_grid->Tanggal->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_Tanggal" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal" value="<?php echo HtmlEncode($t102_mutasi_grid->Tanggal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_Tanggal" name="o<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal" id="o<?php echo $t102_mutasi_grid->RowIndex ?>_Tanggal" value="<?php echo HtmlEncode($t102_mutasi_grid->Tanggal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_mutasi_grid->NoUrut->Visible) { // NoUrut ?>
		<td data-name="NoUrut">
<?php if (!$t102_mutasi->isConfirm()) { ?>
<span id="el$rowindex$_t102_mutasi_NoUrut" class="form-group t102_mutasi_NoUrut">
<input type="text" data-table="t102_mutasi" data-field="x_NoUrut" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_NoUrut" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_NoUrut" size="3" maxlength="4" placeholder="<?php echo HtmlEncode($t102_mutasi_grid->NoUrut->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_grid->NoUrut->EditValue ?>"<?php echo $t102_mutasi_grid->NoUrut->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t102_mutasi_NoUrut" class="form-group t102_mutasi_NoUrut">
<span<?php echo $t102_mutasi_grid->NoUrut->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_mutasi_grid->NoUrut->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_NoUrut" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_NoUrut" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_NoUrut" value="<?php echo HtmlEncode($t102_mutasi_grid->NoUrut->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_NoUrut" name="o<?php echo $t102_mutasi_grid->RowIndex ?>_NoUrut" id="o<?php echo $t102_mutasi_grid->RowIndex ?>_NoUrut" value="<?php echo HtmlEncode($t102_mutasi_grid->NoUrut->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_mutasi_grid->jo_id->Visible) { // jo_id ?>
		<td data-name="jo_id">
<?php if (!$t102_mutasi->isConfirm()) { ?>
<?php if ($t102_mutasi_grid->jo_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_t102_mutasi_jo_id" class="form-group t102_mutasi_jo_id">
<span<?php echo $t102_mutasi_grid->jo_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_mutasi_grid->jo_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" value="<?php echo HtmlEncode($t102_mutasi_grid->jo_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_t102_mutasi_jo_id" class="form-group t102_mutasi_jo_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id"><?php echo EmptyValue(strval($t102_mutasi_grid->jo_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_mutasi_grid->jo_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_mutasi_grid->jo_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_mutasi_grid->jo_id->ReadOnly || $t102_mutasi_grid->jo_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t001_jo") && !$t102_mutasi_grid->jo_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_mutasi_grid->jo_id->caption() ?>" data-title="<?php echo $t102_mutasi_grid->jo_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id',url:'t001_joaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t102_mutasi_grid->jo_id->Lookup->getParamTag($t102_mutasi_grid, "p_x" . $t102_mutasi_grid->RowIndex . "_jo_id") ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jo_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_mutasi_grid->jo_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" value="<?php echo $t102_mutasi_grid->jo_id->CurrentValue ?>"<?php echo $t102_mutasi_grid->jo_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_t102_mutasi_jo_id" class="form-group t102_mutasi_jo_id">
<span<?php echo $t102_mutasi_grid->jo_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_mutasi_grid->jo_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_jo_id" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" value="<?php echo HtmlEncode($t102_mutasi_grid->jo_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jo_id" name="o<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" id="o<?php echo $t102_mutasi_grid->RowIndex ?>_jo_id" value="<?php echo HtmlEncode($t102_mutasi_grid->jo_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_mutasi_grid->jenis_id->Visible) { // jenis_id ?>
		<td data-name="jenis_id">
<?php if (!$t102_mutasi->isConfirm()) { ?>
<span id="el$rowindex$_t102_mutasi_jenis_id" class="form-group t102_mutasi_jenis_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id"><?php echo EmptyValue(strval($t102_mutasi_grid->jenis_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_mutasi_grid->jenis_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_mutasi_grid->jenis_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_mutasi_grid->jenis_id->ReadOnly || $t102_mutasi_grid->jenis_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t002_jenis") && !$t102_mutasi_grid->jenis_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_mutasi_grid->jenis_id->caption() ?>" data-title="<?php echo $t102_mutasi_grid->jenis_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id',url:'t002_jenisaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t102_mutasi_grid->jenis_id->Lookup->getParamTag($t102_mutasi_grid, "p_x" . $t102_mutasi_grid->RowIndex . "_jenis_id") ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jenis_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_mutasi_grid->jenis_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" value="<?php echo $t102_mutasi_grid->jenis_id->CurrentValue ?>"<?php echo $t102_mutasi_grid->jenis_id->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t102_mutasi_jenis_id" class="form-group t102_mutasi_jenis_id">
<span<?php echo $t102_mutasi_grid->jenis_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_mutasi_grid->jenis_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_jenis_id" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" value="<?php echo HtmlEncode($t102_mutasi_grid->jenis_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jenis_id" name="o<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" id="o<?php echo $t102_mutasi_grid->RowIndex ?>_jenis_id" value="<?php echo HtmlEncode($t102_mutasi_grid->jenis_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_mutasi_grid->Comment->Visible) { // Comment ?>
		<td data-name="Comment">
<?php if (!$t102_mutasi->isConfirm()) { ?>
<span id="el$rowindex$_t102_mutasi_Comment" class="form-group t102_mutasi_Comment">
<textarea data-table="t102_mutasi" data-field="x_Comment" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_Comment" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_Comment" cols="25" rows="1" placeholder="<?php echo HtmlEncode($t102_mutasi_grid->Comment->getPlaceHolder()) ?>"<?php echo $t102_mutasi_grid->Comment->editAttributes() ?>><?php echo $t102_mutasi_grid->Comment->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_t102_mutasi_Comment" class="form-group t102_mutasi_Comment">
<span<?php echo $t102_mutasi_grid->Comment->viewAttributes() ?>><?php echo $t102_mutasi_grid->Comment->ViewValue ?></span>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_Comment" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_Comment" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_Comment" value="<?php echo HtmlEncode($t102_mutasi_grid->Comment->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_Comment" name="o<?php echo $t102_mutasi_grid->RowIndex ?>_Comment" id="o<?php echo $t102_mutasi_grid->RowIndex ?>_Comment" value="<?php echo HtmlEncode($t102_mutasi_grid->Comment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_mutasi_grid->Masuk->Visible) { // Masuk ?>
		<td data-name="Masuk">
<?php if (!$t102_mutasi->isConfirm()) { ?>
<span id="el$rowindex$_t102_mutasi_Masuk" class="form-group t102_mutasi_Masuk">
<input type="text" data-table="t102_mutasi" data-field="x_Masuk" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_Masuk" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_Masuk" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t102_mutasi_grid->Masuk->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_grid->Masuk->EditValue ?>"<?php echo $t102_mutasi_grid->Masuk->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t102_mutasi_Masuk" class="form-group t102_mutasi_Masuk">
<span<?php echo $t102_mutasi_grid->Masuk->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_mutasi_grid->Masuk->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_Masuk" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_Masuk" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_Masuk" value="<?php echo HtmlEncode($t102_mutasi_grid->Masuk->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_Masuk" name="o<?php echo $t102_mutasi_grid->RowIndex ?>_Masuk" id="o<?php echo $t102_mutasi_grid->RowIndex ?>_Masuk" value="<?php echo HtmlEncode($t102_mutasi_grid->Masuk->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_mutasi_grid->Keluar->Visible) { // Keluar ?>
		<td data-name="Keluar">
<?php if (!$t102_mutasi->isConfirm()) { ?>
<span id="el$rowindex$_t102_mutasi_Keluar" class="form-group t102_mutasi_Keluar">
<input type="text" data-table="t102_mutasi" data-field="x_Keluar" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_Keluar" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_Keluar" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t102_mutasi_grid->Keluar->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_grid->Keluar->EditValue ?>"<?php echo $t102_mutasi_grid->Keluar->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t102_mutasi_Keluar" class="form-group t102_mutasi_Keluar">
<span<?php echo $t102_mutasi_grid->Keluar->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_mutasi_grid->Keluar->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_Keluar" name="x<?php echo $t102_mutasi_grid->RowIndex ?>_Keluar" id="x<?php echo $t102_mutasi_grid->RowIndex ?>_Keluar" value="<?php echo HtmlEncode($t102_mutasi_grid->Keluar->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_Keluar" name="o<?php echo $t102_mutasi_grid->RowIndex ?>_Keluar" id="o<?php echo $t102_mutasi_grid->RowIndex ?>_Keluar" value="<?php echo HtmlEncode($t102_mutasi_grid->Keluar->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t102_mutasi_grid->ListOptions->render("body", "right", $t102_mutasi_grid->RowIndex);
?>
<script>
loadjs.ready(["ft102_mutasigrid", "load"], function() {
	ft102_mutasigrid.updateLists(<?php echo $t102_mutasi_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
<?php

// Render aggregate row
$t102_mutasi->RowType = ROWTYPE_AGGREGATE;
$t102_mutasi->resetAttributes();
$t102_mutasi_grid->renderRow();
?>
<?php if ($t102_mutasi_grid->TotalRecords > 0 && $t102_mutasi->CurrentMode == "view") { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$t102_mutasi_grid->renderListOptions();

// Render list options (footer, left)
$t102_mutasi_grid->ListOptions->render("footer", "left");
?>
	<?php if ($t102_mutasi_grid->Tanggal->Visible) { // Tanggal ?>
		<td data-name="Tanggal" class="<?php echo $t102_mutasi_grid->Tanggal->footerCellClass() ?>"><span id="elf_t102_mutasi_Tanggal" class="t102_mutasi_Tanggal">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($t102_mutasi_grid->NoUrut->Visible) { // NoUrut ?>
		<td data-name="NoUrut" class="<?php echo $t102_mutasi_grid->NoUrut->footerCellClass() ?>"><span id="elf_t102_mutasi_NoUrut" class="t102_mutasi_NoUrut">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($t102_mutasi_grid->jo_id->Visible) { // jo_id ?>
		<td data-name="jo_id" class="<?php echo $t102_mutasi_grid->jo_id->footerCellClass() ?>"><span id="elf_t102_mutasi_jo_id" class="t102_mutasi_jo_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($t102_mutasi_grid->jenis_id->Visible) { // jenis_id ?>
		<td data-name="jenis_id" class="<?php echo $t102_mutasi_grid->jenis_id->footerCellClass() ?>"><span id="elf_t102_mutasi_jenis_id" class="t102_mutasi_jenis_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($t102_mutasi_grid->Comment->Visible) { // Comment ?>
		<td data-name="Comment" class="<?php echo $t102_mutasi_grid->Comment->footerCellClass() ?>"><span id="elf_t102_mutasi_Comment" class="t102_mutasi_Comment">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($t102_mutasi_grid->Masuk->Visible) { // Masuk ?>
		<td data-name="Masuk" class="<?php echo $t102_mutasi_grid->Masuk->footerCellClass() ?>"><span id="elf_t102_mutasi_Masuk" class="t102_mutasi_Masuk">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $t102_mutasi_grid->Masuk->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($t102_mutasi_grid->Keluar->Visible) { // Keluar ?>
		<td data-name="Keluar" class="<?php echo $t102_mutasi_grid->Keluar->footerCellClass() ?>"><span id="elf_t102_mutasi_Keluar" class="t102_mutasi_Keluar">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $t102_mutasi_grid->Keluar->ViewValue ?></span>
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$t102_mutasi_grid->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($t102_mutasi->CurrentMode == "add" || $t102_mutasi->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $t102_mutasi_grid->FormKeyCountName ?>" id="<?php echo $t102_mutasi_grid->FormKeyCountName ?>" value="<?php echo $t102_mutasi_grid->KeyCount ?>">
<?php echo $t102_mutasi_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t102_mutasi->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $t102_mutasi_grid->FormKeyCountName ?>" id="<?php echo $t102_mutasi_grid->FormKeyCountName ?>" value="<?php echo $t102_mutasi_grid->KeyCount ?>">
<?php echo $t102_mutasi_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t102_mutasi->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="ft102_mutasigrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t102_mutasi_grid->Recordset)
	$t102_mutasi_grid->Recordset->Close();
?>
<?php if ($t102_mutasi_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $t102_mutasi_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t102_mutasi_grid->TotalRecords == 0 && !$t102_mutasi->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t102_mutasi_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$t102_mutasi_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$t102_mutasi_grid->terminate();
?>