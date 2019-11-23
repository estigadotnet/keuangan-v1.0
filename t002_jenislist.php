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
$t002_jenis_list = new t002_jenis_list();

// Run the page
$t002_jenis_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_jenis_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t002_jenis_list->isExport()) { ?>
<script>
var ft002_jenislist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft002_jenislist = currentForm = new ew.Form("ft002_jenislist", "list");
	ft002_jenislist.formKeyCountName = '<?php echo $t002_jenis_list->FormKeyCountName ?>';

	// Validate form
	ft002_jenislist.validate = function() {
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
			<?php if ($t002_jenis_list->Nama->Required) { ?>
				elm = this.getElements("x" + infix + "_Nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_jenis_list->Nama->caption(), $t002_jenis_list->Nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t002_jenis_list->NoKolom->Required) { ?>
				elm = this.getElements("x" + infix + "_NoKolom");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_jenis_list->NoKolom->caption(), $t002_jenis_list->NoKolom->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoKolom");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_jenis_list->NoKolom->errorMessage()) ?>");

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
	ft002_jenislist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "Nama", false)) return false;
		if (ew.valueChanged(fobj, infix, "NoKolom", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft002_jenislist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft002_jenislist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft002_jenislist");
});
var ft002_jenislistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft002_jenislistsrch = currentSearchForm = new ew.Form("ft002_jenislistsrch");

	// Dynamic selection lists
	// Filters

	ft002_jenislistsrch.filterList = <?php echo $t002_jenis_list->getFilterList() ?>;
	loadjs.done("ft002_jenislistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t002_jenis_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t002_jenis_list->TotalRecords > 0 && $t002_jenis_list->ExportOptions->visible()) { ?>
<?php $t002_jenis_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t002_jenis_list->ImportOptions->visible()) { ?>
<?php $t002_jenis_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t002_jenis_list->SearchOptions->visible()) { ?>
<?php $t002_jenis_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t002_jenis_list->FilterOptions->visible()) { ?>
<?php $t002_jenis_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t002_jenis_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t002_jenis_list->isExport() && !$t002_jenis->CurrentAction) { ?>
<form name="ft002_jenislistsrch" id="ft002_jenislistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft002_jenislistsrch-search-panel" class="<?php echo $t002_jenis_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t002_jenis">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t002_jenis_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t002_jenis_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t002_jenis_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t002_jenis_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t002_jenis_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t002_jenis_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t002_jenis_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t002_jenis_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $t002_jenis_list->showPageHeader(); ?>
<?php
$t002_jenis_list->showMessage();
?>
<?php if ($t002_jenis_list->TotalRecords > 0 || $t002_jenis->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t002_jenis_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t002_jenis">
<?php if (!$t002_jenis_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$t002_jenis_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t002_jenis_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t002_jenis_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ft002_jenislist" id="ft002_jenislist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_jenis">
<div id="gmp_t002_jenis" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t002_jenis_list->TotalRecords > 0 || $t002_jenis_list->isAdd() || $t002_jenis_list->isCopy() || $t002_jenis_list->isGridEdit()) { ?>
<table id="tbl_t002_jenislist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t002_jenis->RowType = ROWTYPE_HEADER;

// Render list options
$t002_jenis_list->renderListOptions();

// Render list options (header, left)
$t002_jenis_list->ListOptions->render("header", "left");
?>
<?php if ($t002_jenis_list->Nama->Visible) { // Nama ?>
	<?php if ($t002_jenis_list->SortUrl($t002_jenis_list->Nama) == "") { ?>
		<th data-name="Nama" class="<?php echo $t002_jenis_list->Nama->headerCellClass() ?>"><div id="elh_t002_jenis_Nama" class="t002_jenis_Nama"><div class="ew-table-header-caption"><?php echo $t002_jenis_list->Nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nama" class="<?php echo $t002_jenis_list->Nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t002_jenis_list->SortUrl($t002_jenis_list->Nama) ?>', 2);"><div id="elh_t002_jenis_Nama" class="t002_jenis_Nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_jenis_list->Nama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t002_jenis_list->Nama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_jenis_list->Nama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_jenis_list->NoKolom->Visible) { // NoKolom ?>
	<?php if ($t002_jenis_list->SortUrl($t002_jenis_list->NoKolom) == "") { ?>
		<th data-name="NoKolom" class="<?php echo $t002_jenis_list->NoKolom->headerCellClass() ?>"><div id="elh_t002_jenis_NoKolom" class="t002_jenis_NoKolom"><div class="ew-table-header-caption"><?php echo $t002_jenis_list->NoKolom->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoKolom" class="<?php echo $t002_jenis_list->NoKolom->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t002_jenis_list->SortUrl($t002_jenis_list->NoKolom) ?>', 2);"><div id="elh_t002_jenis_NoKolom" class="t002_jenis_NoKolom">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_jenis_list->NoKolom->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_jenis_list->NoKolom->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_jenis_list->NoKolom->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t002_jenis_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($t002_jenis_list->isAdd() || $t002_jenis_list->isCopy()) {
		$t002_jenis_list->RowIndex = 0;
		$t002_jenis_list->KeyCount = $t002_jenis_list->RowIndex;
		if ($t002_jenis_list->isCopy() && !$t002_jenis_list->loadRow())
			$t002_jenis->CurrentAction = "add";
		if ($t002_jenis_list->isAdd())
			$t002_jenis_list->loadRowValues();
		if ($t002_jenis->EventCancelled) // Insert failed
			$t002_jenis_list->restoreFormValues(); // Restore form values

		// Set row properties
		$t002_jenis->resetAttributes();
		$t002_jenis->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_t002_jenis", "data-rowtype" => ROWTYPE_ADD]);
		$t002_jenis->RowType = ROWTYPE_ADD;

		// Render row
		$t002_jenis_list->renderRow();

		// Render list options
		$t002_jenis_list->renderListOptions();
		$t002_jenis_list->StartRowCount = 0;
?>
	<tr <?php echo $t002_jenis->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t002_jenis_list->ListOptions->render("body", "left", $t002_jenis_list->RowCount);
?>
	<?php if ($t002_jenis_list->Nama->Visible) { // Nama ?>
		<td data-name="Nama">
<span id="el<?php echo $t002_jenis_list->RowCount ?>_t002_jenis_Nama" class="form-group t002_jenis_Nama">
<textarea data-table="t002_jenis" data-field="x_Nama" name="x<?php echo $t002_jenis_list->RowIndex ?>_Nama" id="x<?php echo $t002_jenis_list->RowIndex ?>_Nama" cols="50" rows="1" placeholder="<?php echo HtmlEncode($t002_jenis_list->Nama->getPlaceHolder()) ?>"<?php echo $t002_jenis_list->Nama->editAttributes() ?>><?php echo $t002_jenis_list->Nama->EditValue ?></textarea>
</span>
<input type="hidden" data-table="t002_jenis" data-field="x_Nama" name="o<?php echo $t002_jenis_list->RowIndex ?>_Nama" id="o<?php echo $t002_jenis_list->RowIndex ?>_Nama" value="<?php echo HtmlEncode($t002_jenis_list->Nama->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t002_jenis_list->NoKolom->Visible) { // NoKolom ?>
		<td data-name="NoKolom">
<span id="el<?php echo $t002_jenis_list->RowCount ?>_t002_jenis_NoKolom" class="form-group t002_jenis_NoKolom">
<input type="text" data-table="t002_jenis" data-field="x_NoKolom" name="x<?php echo $t002_jenis_list->RowIndex ?>_NoKolom" id="x<?php echo $t002_jenis_list->RowIndex ?>_NoKolom" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t002_jenis_list->NoKolom->getPlaceHolder()) ?>" value="<?php echo $t002_jenis_list->NoKolom->EditValue ?>"<?php echo $t002_jenis_list->NoKolom->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_jenis" data-field="x_NoKolom" name="o<?php echo $t002_jenis_list->RowIndex ?>_NoKolom" id="o<?php echo $t002_jenis_list->RowIndex ?>_NoKolom" value="<?php echo HtmlEncode($t002_jenis_list->NoKolom->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t002_jenis_list->ListOptions->render("body", "right", $t002_jenis_list->RowCount);
?>
<script>
loadjs.ready(["ft002_jenislist", "load"], function() {
	ft002_jenislist.updateLists(<?php echo $t002_jenis_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
<?php
if ($t002_jenis_list->ExportAll && $t002_jenis_list->isExport()) {
	$t002_jenis_list->StopRecord = $t002_jenis_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t002_jenis_list->TotalRecords > $t002_jenis_list->StartRecord + $t002_jenis_list->DisplayRecords - 1)
		$t002_jenis_list->StopRecord = $t002_jenis_list->StartRecord + $t002_jenis_list->DisplayRecords - 1;
	else
		$t002_jenis_list->StopRecord = $t002_jenis_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t002_jenis->isConfirm() || $t002_jenis_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t002_jenis_list->FormKeyCountName) && ($t002_jenis_list->isGridAdd() || $t002_jenis_list->isGridEdit() || $t002_jenis->isConfirm())) {
		$t002_jenis_list->KeyCount = $CurrentForm->getValue($t002_jenis_list->FormKeyCountName);
		$t002_jenis_list->StopRecord = $t002_jenis_list->StartRecord + $t002_jenis_list->KeyCount - 1;
	}
}
$t002_jenis_list->RecordCount = $t002_jenis_list->StartRecord - 1;
if ($t002_jenis_list->Recordset && !$t002_jenis_list->Recordset->EOF) {
	$t002_jenis_list->Recordset->moveFirst();
	$selectLimit = $t002_jenis_list->UseSelectLimit;
	if (!$selectLimit && $t002_jenis_list->StartRecord > 1)
		$t002_jenis_list->Recordset->move($t002_jenis_list->StartRecord - 1);
} elseif (!$t002_jenis->AllowAddDeleteRow && $t002_jenis_list->StopRecord == 0) {
	$t002_jenis_list->StopRecord = $t002_jenis->GridAddRowCount;
}

// Initialize aggregate
$t002_jenis->RowType = ROWTYPE_AGGREGATEINIT;
$t002_jenis->resetAttributes();
$t002_jenis_list->renderRow();
$t002_jenis_list->EditRowCount = 0;
if ($t002_jenis_list->isEdit())
	$t002_jenis_list->RowIndex = 1;
if ($t002_jenis_list->isGridAdd())
	$t002_jenis_list->RowIndex = 0;
if ($t002_jenis_list->isGridEdit())
	$t002_jenis_list->RowIndex = 0;
while ($t002_jenis_list->RecordCount < $t002_jenis_list->StopRecord) {
	$t002_jenis_list->RecordCount++;
	if ($t002_jenis_list->RecordCount >= $t002_jenis_list->StartRecord) {
		$t002_jenis_list->RowCount++;
		if ($t002_jenis_list->isGridAdd() || $t002_jenis_list->isGridEdit() || $t002_jenis->isConfirm()) {
			$t002_jenis_list->RowIndex++;
			$CurrentForm->Index = $t002_jenis_list->RowIndex;
			if ($CurrentForm->hasValue($t002_jenis_list->FormActionName) && ($t002_jenis->isConfirm() || $t002_jenis_list->EventCancelled))
				$t002_jenis_list->RowAction = strval($CurrentForm->getValue($t002_jenis_list->FormActionName));
			elseif ($t002_jenis_list->isGridAdd())
				$t002_jenis_list->RowAction = "insert";
			else
				$t002_jenis_list->RowAction = "";
		}

		// Set up key count
		$t002_jenis_list->KeyCount = $t002_jenis_list->RowIndex;

		// Init row class and style
		$t002_jenis->resetAttributes();
		$t002_jenis->CssClass = "";
		if ($t002_jenis_list->isGridAdd()) {
			$t002_jenis_list->loadRowValues(); // Load default values
		} else {
			$t002_jenis_list->loadRowValues($t002_jenis_list->Recordset); // Load row values
		}
		$t002_jenis->RowType = ROWTYPE_VIEW; // Render view
		if ($t002_jenis_list->isGridAdd()) // Grid add
			$t002_jenis->RowType = ROWTYPE_ADD; // Render add
		if ($t002_jenis_list->isGridAdd() && $t002_jenis->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t002_jenis_list->restoreCurrentRowFormValues($t002_jenis_list->RowIndex); // Restore form values
		if ($t002_jenis_list->isEdit()) {
			if ($t002_jenis_list->checkInlineEditKey() && $t002_jenis_list->EditRowCount == 0) { // Inline edit
				$t002_jenis->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($t002_jenis_list->isGridEdit()) { // Grid edit
			if ($t002_jenis->EventCancelled)
				$t002_jenis_list->restoreCurrentRowFormValues($t002_jenis_list->RowIndex); // Restore form values
			if ($t002_jenis_list->RowAction == "insert")
				$t002_jenis->RowType = ROWTYPE_ADD; // Render add
			else
				$t002_jenis->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t002_jenis_list->isEdit() && $t002_jenis->RowType == ROWTYPE_EDIT && $t002_jenis->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$t002_jenis_list->restoreFormValues(); // Restore form values
		}
		if ($t002_jenis_list->isGridEdit() && ($t002_jenis->RowType == ROWTYPE_EDIT || $t002_jenis->RowType == ROWTYPE_ADD) && $t002_jenis->EventCancelled) // Update failed
			$t002_jenis_list->restoreCurrentRowFormValues($t002_jenis_list->RowIndex); // Restore form values
		if ($t002_jenis->RowType == ROWTYPE_EDIT) // Edit row
			$t002_jenis_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t002_jenis->RowAttrs->merge(["data-rowindex" => $t002_jenis_list->RowCount, "id" => "r" . $t002_jenis_list->RowCount . "_t002_jenis", "data-rowtype" => $t002_jenis->RowType]);

		// Render row
		$t002_jenis_list->renderRow();

		// Render list options
		$t002_jenis_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t002_jenis_list->RowAction != "delete" && $t002_jenis_list->RowAction != "insertdelete" && !($t002_jenis_list->RowAction == "insert" && $t002_jenis->isConfirm() && $t002_jenis_list->emptyRow())) {
?>
	<tr <?php echo $t002_jenis->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t002_jenis_list->ListOptions->render("body", "left", $t002_jenis_list->RowCount);
?>
	<?php if ($t002_jenis_list->Nama->Visible) { // Nama ?>
		<td data-name="Nama" <?php echo $t002_jenis_list->Nama->cellAttributes() ?>>
<?php if ($t002_jenis->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_jenis_list->RowCount ?>_t002_jenis_Nama" class="form-group">
<textarea data-table="t002_jenis" data-field="x_Nama" name="x<?php echo $t002_jenis_list->RowIndex ?>_Nama" id="x<?php echo $t002_jenis_list->RowIndex ?>_Nama" cols="50" rows="1" placeholder="<?php echo HtmlEncode($t002_jenis_list->Nama->getPlaceHolder()) ?>"<?php echo $t002_jenis_list->Nama->editAttributes() ?>><?php echo $t002_jenis_list->Nama->EditValue ?></textarea>
</span>
<input type="hidden" data-table="t002_jenis" data-field="x_Nama" name="o<?php echo $t002_jenis_list->RowIndex ?>_Nama" id="o<?php echo $t002_jenis_list->RowIndex ?>_Nama" value="<?php echo HtmlEncode($t002_jenis_list->Nama->OldValue) ?>">
<?php } ?>
<?php if ($t002_jenis->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_jenis_list->RowCount ?>_t002_jenis_Nama" class="form-group">
<textarea data-table="t002_jenis" data-field="x_Nama" name="x<?php echo $t002_jenis_list->RowIndex ?>_Nama" id="x<?php echo $t002_jenis_list->RowIndex ?>_Nama" cols="50" rows="1" placeholder="<?php echo HtmlEncode($t002_jenis_list->Nama->getPlaceHolder()) ?>"<?php echo $t002_jenis_list->Nama->editAttributes() ?>><?php echo $t002_jenis_list->Nama->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($t002_jenis->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_jenis_list->RowCount ?>_t002_jenis_Nama">
<span<?php echo $t002_jenis_list->Nama->viewAttributes() ?>><?php echo $t002_jenis_list->Nama->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t002_jenis->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t002_jenis" data-field="x_id" name="x<?php echo $t002_jenis_list->RowIndex ?>_id" id="x<?php echo $t002_jenis_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t002_jenis_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t002_jenis" data-field="x_id" name="o<?php echo $t002_jenis_list->RowIndex ?>_id" id="o<?php echo $t002_jenis_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t002_jenis_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t002_jenis->RowType == ROWTYPE_EDIT || $t002_jenis->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t002_jenis" data-field="x_id" name="x<?php echo $t002_jenis_list->RowIndex ?>_id" id="x<?php echo $t002_jenis_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t002_jenis_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t002_jenis_list->NoKolom->Visible) { // NoKolom ?>
		<td data-name="NoKolom" <?php echo $t002_jenis_list->NoKolom->cellAttributes() ?>>
<?php if ($t002_jenis->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_jenis_list->RowCount ?>_t002_jenis_NoKolom" class="form-group">
<input type="text" data-table="t002_jenis" data-field="x_NoKolom" name="x<?php echo $t002_jenis_list->RowIndex ?>_NoKolom" id="x<?php echo $t002_jenis_list->RowIndex ?>_NoKolom" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t002_jenis_list->NoKolom->getPlaceHolder()) ?>" value="<?php echo $t002_jenis_list->NoKolom->EditValue ?>"<?php echo $t002_jenis_list->NoKolom->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_jenis" data-field="x_NoKolom" name="o<?php echo $t002_jenis_list->RowIndex ?>_NoKolom" id="o<?php echo $t002_jenis_list->RowIndex ?>_NoKolom" value="<?php echo HtmlEncode($t002_jenis_list->NoKolom->OldValue) ?>">
<?php } ?>
<?php if ($t002_jenis->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_jenis_list->RowCount ?>_t002_jenis_NoKolom" class="form-group">
<input type="text" data-table="t002_jenis" data-field="x_NoKolom" name="x<?php echo $t002_jenis_list->RowIndex ?>_NoKolom" id="x<?php echo $t002_jenis_list->RowIndex ?>_NoKolom" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t002_jenis_list->NoKolom->getPlaceHolder()) ?>" value="<?php echo $t002_jenis_list->NoKolom->EditValue ?>"<?php echo $t002_jenis_list->NoKolom->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_jenis->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_jenis_list->RowCount ?>_t002_jenis_NoKolom">
<span<?php echo $t002_jenis_list->NoKolom->viewAttributes() ?>><?php echo $t002_jenis_list->NoKolom->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t002_jenis_list->ListOptions->render("body", "right", $t002_jenis_list->RowCount);
?>
	</tr>
<?php if ($t002_jenis->RowType == ROWTYPE_ADD || $t002_jenis->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft002_jenislist", "load"], function() {
	ft002_jenislist.updateLists(<?php echo $t002_jenis_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t002_jenis_list->isGridAdd())
		if (!$t002_jenis_list->Recordset->EOF)
			$t002_jenis_list->Recordset->moveNext();
}
?>
<?php
	if ($t002_jenis_list->isGridAdd() || $t002_jenis_list->isGridEdit()) {
		$t002_jenis_list->RowIndex = '$rowindex$';
		$t002_jenis_list->loadRowValues();

		// Set row properties
		$t002_jenis->resetAttributes();
		$t002_jenis->RowAttrs->merge(["data-rowindex" => $t002_jenis_list->RowIndex, "id" => "r0_t002_jenis", "data-rowtype" => ROWTYPE_ADD]);
		$t002_jenis->RowAttrs->appendClass("ew-template");
		$t002_jenis->RowType = ROWTYPE_ADD;

		// Render row
		$t002_jenis_list->renderRow();

		// Render list options
		$t002_jenis_list->renderListOptions();
		$t002_jenis_list->StartRowCount = 0;
?>
	<tr <?php echo $t002_jenis->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t002_jenis_list->ListOptions->render("body", "left", $t002_jenis_list->RowIndex);
?>
	<?php if ($t002_jenis_list->Nama->Visible) { // Nama ?>
		<td data-name="Nama">
<span id="el$rowindex$_t002_jenis_Nama" class="form-group t002_jenis_Nama">
<textarea data-table="t002_jenis" data-field="x_Nama" name="x<?php echo $t002_jenis_list->RowIndex ?>_Nama" id="x<?php echo $t002_jenis_list->RowIndex ?>_Nama" cols="50" rows="1" placeholder="<?php echo HtmlEncode($t002_jenis_list->Nama->getPlaceHolder()) ?>"<?php echo $t002_jenis_list->Nama->editAttributes() ?>><?php echo $t002_jenis_list->Nama->EditValue ?></textarea>
</span>
<input type="hidden" data-table="t002_jenis" data-field="x_Nama" name="o<?php echo $t002_jenis_list->RowIndex ?>_Nama" id="o<?php echo $t002_jenis_list->RowIndex ?>_Nama" value="<?php echo HtmlEncode($t002_jenis_list->Nama->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t002_jenis_list->NoKolom->Visible) { // NoKolom ?>
		<td data-name="NoKolom">
<span id="el$rowindex$_t002_jenis_NoKolom" class="form-group t002_jenis_NoKolom">
<input type="text" data-table="t002_jenis" data-field="x_NoKolom" name="x<?php echo $t002_jenis_list->RowIndex ?>_NoKolom" id="x<?php echo $t002_jenis_list->RowIndex ?>_NoKolom" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t002_jenis_list->NoKolom->getPlaceHolder()) ?>" value="<?php echo $t002_jenis_list->NoKolom->EditValue ?>"<?php echo $t002_jenis_list->NoKolom->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_jenis" data-field="x_NoKolom" name="o<?php echo $t002_jenis_list->RowIndex ?>_NoKolom" id="o<?php echo $t002_jenis_list->RowIndex ?>_NoKolom" value="<?php echo HtmlEncode($t002_jenis_list->NoKolom->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t002_jenis_list->ListOptions->render("body", "right", $t002_jenis_list->RowIndex);
?>
<script>
loadjs.ready(["ft002_jenislist", "load"], function() {
	ft002_jenislist.updateLists(<?php echo $t002_jenis_list->RowIndex ?>);
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
<?php if ($t002_jenis_list->isAdd() || $t002_jenis_list->isCopy()) { ?>
<input type="hidden" name="<?php echo $t002_jenis_list->FormKeyCountName ?>" id="<?php echo $t002_jenis_list->FormKeyCountName ?>" value="<?php echo $t002_jenis_list->KeyCount ?>">
<?php } ?>
<?php if ($t002_jenis_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t002_jenis_list->FormKeyCountName ?>" id="<?php echo $t002_jenis_list->FormKeyCountName ?>" value="<?php echo $t002_jenis_list->KeyCount ?>">
<?php echo $t002_jenis_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t002_jenis_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $t002_jenis_list->FormKeyCountName ?>" id="<?php echo $t002_jenis_list->FormKeyCountName ?>" value="<?php echo $t002_jenis_list->KeyCount ?>">
<?php } ?>
<?php if ($t002_jenis_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t002_jenis_list->FormKeyCountName ?>" id="<?php echo $t002_jenis_list->FormKeyCountName ?>" value="<?php echo $t002_jenis_list->KeyCount ?>">
<?php echo $t002_jenis_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t002_jenis->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t002_jenis_list->Recordset)
	$t002_jenis_list->Recordset->Close();
?>
<?php if (!$t002_jenis_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t002_jenis_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t002_jenis_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t002_jenis_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t002_jenis_list->TotalRecords == 0 && !$t002_jenis->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t002_jenis_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t002_jenis_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t002_jenis_list->isExport()) { ?>
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
$t002_jenis_list->terminate();
?>