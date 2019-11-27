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
$v101_costsheet_list = new v101_costsheet_list();

// Run the page
$v101_costsheet_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v101_costsheet_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$v101_costsheet_list->isExport()) { ?>
<script>
var fv101_costsheetlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fv101_costsheetlist = currentForm = new ew.Form("fv101_costsheetlist", "list");
	fv101_costsheetlist.formKeyCountName = '<?php echo $v101_costsheet_list->FormKeyCountName ?>';
	loadjs.done("fv101_costsheetlist");
});
var fv101_costsheetlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fv101_costsheetlistsrch = currentSearchForm = new ew.Form("fv101_costsheetlistsrch");

	// Validate function for search
	fv101_costsheetlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fv101_costsheetlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fv101_costsheetlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fv101_costsheetlistsrch.lists["x_NoJO"] = <?php echo $v101_costsheet_list->NoJO->Lookup->toClientList($v101_costsheet_list) ?>;
	fv101_costsheetlistsrch.lists["x_NoJO"].options = <?php echo JsonEncode($v101_costsheet_list->NoJO->lookupOptions()) ?>;

	// Filters
	fv101_costsheetlistsrch.filterList = <?php echo $v101_costsheet_list->getFilterList() ?>;
	loadjs.done("fv101_costsheetlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$v101_costsheet_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($v101_costsheet_list->TotalRecords > 0 && $v101_costsheet_list->ExportOptions->visible()) { ?>
<?php $v101_costsheet_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($v101_costsheet_list->ImportOptions->visible()) { ?>
<?php $v101_costsheet_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($v101_costsheet_list->SearchOptions->visible()) { ?>
<?php $v101_costsheet_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($v101_costsheet_list->FilterOptions->visible()) { ?>
<?php $v101_costsheet_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$v101_costsheet_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$v101_costsheet_list->isExport() && !$v101_costsheet->CurrentAction) { ?>
<form name="fv101_costsheetlistsrch" id="fv101_costsheetlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fv101_costsheetlistsrch-search-panel" class="<?php echo $v101_costsheet_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="v101_costsheet">
	<div class="ew-extended-search">
<?php

// Render search row
$v101_costsheet->RowType = ROWTYPE_SEARCH;
$v101_costsheet->resetAttributes();
$v101_costsheet_list->renderRow();
?>
<?php if ($v101_costsheet_list->NoJO->Visible) { // NoJO ?>
	<?php
		$v101_costsheet_list->SearchColumnCount++;
		if (($v101_costsheet_list->SearchColumnCount - 1) % $v101_costsheet_list->SearchFieldsPerRow == 0) {
			$v101_costsheet_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $v101_costsheet_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_NoJO" class="ew-cell form-group">
		<label for="x_NoJO" class="ew-search-caption ew-label"><?php echo $v101_costsheet_list->NoJO->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_NoJO" id="z_NoJO" value="=">
</span>
		<span id="el_v101_costsheet_NoJO" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_NoJO"><?php echo EmptyValue(strval($v101_costsheet_list->NoJO->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $v101_costsheet_list->NoJO->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v101_costsheet_list->NoJO->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v101_costsheet_list->NoJO->ReadOnly || $v101_costsheet_list->NoJO->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_NoJO',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v101_costsheet_list->NoJO->Lookup->getParamTag($v101_costsheet_list, "p_x_NoJO") ?>
<input type="hidden" data-table="v101_costsheet" data-field="x_NoJO" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v101_costsheet_list->NoJO->displayValueSeparatorAttribute() ?>" name="x_NoJO" id="x_NoJO" value="<?php echo $v101_costsheet_list->NoJO->AdvancedSearch->SearchValue ?>"<?php echo $v101_costsheet_list->NoJO->editAttributes() ?>>
</span>
	</div>
	<?php if ($v101_costsheet_list->SearchColumnCount % $v101_costsheet_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($v101_costsheet_list->SearchColumnCount % $v101_costsheet_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $v101_costsheet_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $v101_costsheet_list->showPageHeader(); ?>
<?php
$v101_costsheet_list->showMessage();
?>
<?php if ($v101_costsheet_list->TotalRecords > 0 || $v101_costsheet->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($v101_costsheet_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> v101_costsheet">
<?php if (!$v101_costsheet_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$v101_costsheet_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v101_costsheet_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v101_costsheet_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fv101_costsheetlist" id="fv101_costsheetlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v101_costsheet">
<div id="gmp_v101_costsheet" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($v101_costsheet_list->TotalRecords > 0 || $v101_costsheet_list->isGridEdit()) { ?>
<table id="tbl_v101_costsheetlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$v101_costsheet->RowType = ROWTYPE_HEADER;

// Render list options
$v101_costsheet_list->renderListOptions();

// Render list options (header, left)
$v101_costsheet_list->ListOptions->render("header", "left");
?>
<?php if ($v101_costsheet_list->id->Visible) { // id ?>
	<?php if ($v101_costsheet_list->SortUrl($v101_costsheet_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $v101_costsheet_list->id->headerCellClass() ?>"><div id="elh_v101_costsheet_id" class="v101_costsheet_id"><div class="ew-table-header-caption"><?php echo $v101_costsheet_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $v101_costsheet_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_costsheet_list->SortUrl($v101_costsheet_list->id) ?>', 2);"><div id="elh_v101_costsheet_id" class="v101_costsheet_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_costsheet_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_costsheet_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_costsheet_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_costsheet_list->NoJO->Visible) { // NoJO ?>
	<?php if ($v101_costsheet_list->SortUrl($v101_costsheet_list->NoJO) == "") { ?>
		<th data-name="NoJO" class="<?php echo $v101_costsheet_list->NoJO->headerCellClass() ?>"><div id="elh_v101_costsheet_NoJO" class="v101_costsheet_NoJO"><div class="ew-table-header-caption"><?php echo $v101_costsheet_list->NoJO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoJO" class="<?php echo $v101_costsheet_list->NoJO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_costsheet_list->SortUrl($v101_costsheet_list->NoJO) ?>', 2);"><div id="elh_v101_costsheet_NoJO" class="v101_costsheet_NoJO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_costsheet_list->NoJO->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_costsheet_list->NoJO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_costsheet_list->NoJO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_costsheet_list->Tagihan->Visible) { // Tagihan ?>
	<?php if ($v101_costsheet_list->SortUrl($v101_costsheet_list->Tagihan) == "") { ?>
		<th data-name="Tagihan" class="<?php echo $v101_costsheet_list->Tagihan->headerCellClass() ?>"><div id="elh_v101_costsheet_Tagihan" class="v101_costsheet_Tagihan"><div class="ew-table-header-caption"><?php echo $v101_costsheet_list->Tagihan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tagihan" class="<?php echo $v101_costsheet_list->Tagihan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_costsheet_list->SortUrl($v101_costsheet_list->Tagihan) ?>', 2);"><div id="elh_v101_costsheet_Tagihan" class="v101_costsheet_Tagihan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_costsheet_list->Tagihan->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_costsheet_list->Tagihan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_costsheet_list->Tagihan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_costsheet_list->Shipper->Visible) { // Shipper ?>
	<?php if ($v101_costsheet_list->SortUrl($v101_costsheet_list->Shipper) == "") { ?>
		<th data-name="Shipper" class="<?php echo $v101_costsheet_list->Shipper->headerCellClass() ?>"><div id="elh_v101_costsheet_Shipper" class="v101_costsheet_Shipper"><div class="ew-table-header-caption"><?php echo $v101_costsheet_list->Shipper->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Shipper" class="<?php echo $v101_costsheet_list->Shipper->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_costsheet_list->SortUrl($v101_costsheet_list->Shipper) ?>', 2);"><div id="elh_v101_costsheet_Shipper" class="v101_costsheet_Shipper">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_costsheet_list->Shipper->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_costsheet_list->Shipper->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_costsheet_list->Shipper->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_costsheet_list->Qty->Visible) { // Qty ?>
	<?php if ($v101_costsheet_list->SortUrl($v101_costsheet_list->Qty) == "") { ?>
		<th data-name="Qty" class="<?php echo $v101_costsheet_list->Qty->headerCellClass() ?>"><div id="elh_v101_costsheet_Qty" class="v101_costsheet_Qty"><div class="ew-table-header-caption"><?php echo $v101_costsheet_list->Qty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Qty" class="<?php echo $v101_costsheet_list->Qty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_costsheet_list->SortUrl($v101_costsheet_list->Qty) ?>', 2);"><div id="elh_v101_costsheet_Qty" class="v101_costsheet_Qty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_costsheet_list->Qty->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_costsheet_list->Qty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_costsheet_list->Qty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_costsheet_list->Cont->Visible) { // Cont ?>
	<?php if ($v101_costsheet_list->SortUrl($v101_costsheet_list->Cont) == "") { ?>
		<th data-name="Cont" class="<?php echo $v101_costsheet_list->Cont->headerCellClass() ?>"><div id="elh_v101_costsheet_Cont" class="v101_costsheet_Cont"><div class="ew-table-header-caption"><?php echo $v101_costsheet_list->Cont->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cont" class="<?php echo $v101_costsheet_list->Cont->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_costsheet_list->SortUrl($v101_costsheet_list->Cont) ?>', 2);"><div id="elh_v101_costsheet_Cont" class="v101_costsheet_Cont">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_costsheet_list->Cont->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_costsheet_list->Cont->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_costsheet_list->Cont->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_costsheet_list->Status->Visible) { // Status ?>
	<?php if ($v101_costsheet_list->SortUrl($v101_costsheet_list->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $v101_costsheet_list->Status->headerCellClass() ?>"><div id="elh_v101_costsheet_Status" class="v101_costsheet_Status"><div class="ew-table-header-caption"><?php echo $v101_costsheet_list->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $v101_costsheet_list->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_costsheet_list->SortUrl($v101_costsheet_list->Status) ?>', 2);"><div id="elh_v101_costsheet_Status" class="v101_costsheet_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_costsheet_list->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_costsheet_list->Status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_costsheet_list->Status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_costsheet_list->Doc->Visible) { // Doc ?>
	<?php if ($v101_costsheet_list->SortUrl($v101_costsheet_list->Doc) == "") { ?>
		<th data-name="Doc" class="<?php echo $v101_costsheet_list->Doc->headerCellClass() ?>"><div id="elh_v101_costsheet_Doc" class="v101_costsheet_Doc"><div class="ew-table-header-caption"><?php echo $v101_costsheet_list->Doc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doc" class="<?php echo $v101_costsheet_list->Doc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_costsheet_list->SortUrl($v101_costsheet_list->Doc) ?>', 2);"><div id="elh_v101_costsheet_Doc" class="v101_costsheet_Doc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_costsheet_list->Doc->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_costsheet_list->Doc->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_costsheet_list->Doc->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_costsheet_list->Tujuan->Visible) { // Tujuan ?>
	<?php if ($v101_costsheet_list->SortUrl($v101_costsheet_list->Tujuan) == "") { ?>
		<th data-name="Tujuan" class="<?php echo $v101_costsheet_list->Tujuan->headerCellClass() ?>"><div id="elh_v101_costsheet_Tujuan" class="v101_costsheet_Tujuan"><div class="ew-table-header-caption"><?php echo $v101_costsheet_list->Tujuan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tujuan" class="<?php echo $v101_costsheet_list->Tujuan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_costsheet_list->SortUrl($v101_costsheet_list->Tujuan) ?>', 2);"><div id="elh_v101_costsheet_Tujuan" class="v101_costsheet_Tujuan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_costsheet_list->Tujuan->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_costsheet_list->Tujuan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_costsheet_list->Tujuan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_costsheet_list->Kapal->Visible) { // Kapal ?>
	<?php if ($v101_costsheet_list->SortUrl($v101_costsheet_list->Kapal) == "") { ?>
		<th data-name="Kapal" class="<?php echo $v101_costsheet_list->Kapal->headerCellClass() ?>"><div id="elh_v101_costsheet_Kapal" class="v101_costsheet_Kapal"><div class="ew-table-header-caption"><?php echo $v101_costsheet_list->Kapal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Kapal" class="<?php echo $v101_costsheet_list->Kapal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_costsheet_list->SortUrl($v101_costsheet_list->Kapal) ?>', 2);"><div id="elh_v101_costsheet_Kapal" class="v101_costsheet_Kapal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_costsheet_list->Kapal->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_costsheet_list->Kapal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_costsheet_list->Kapal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_costsheet_list->BM->Visible) { // BM ?>
	<?php if ($v101_costsheet_list->SortUrl($v101_costsheet_list->BM) == "") { ?>
		<th data-name="BM" class="<?php echo $v101_costsheet_list->BM->headerCellClass() ?>"><div id="elh_v101_costsheet_BM" class="v101_costsheet_BM"><div class="ew-table-header-caption"><?php echo $v101_costsheet_list->BM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BM" class="<?php echo $v101_costsheet_list->BM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_costsheet_list->SortUrl($v101_costsheet_list->BM) ?>', 2);"><div id="elh_v101_costsheet_BM" class="v101_costsheet_BM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_costsheet_list->BM->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_costsheet_list->BM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_costsheet_list->BM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v101_costsheet_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($v101_costsheet_list->ExportAll && $v101_costsheet_list->isExport()) {
	$v101_costsheet_list->StopRecord = $v101_costsheet_list->TotalRecords;
} else {

	// Set the last record to display
	if ($v101_costsheet_list->TotalRecords > $v101_costsheet_list->StartRecord + $v101_costsheet_list->DisplayRecords - 1)
		$v101_costsheet_list->StopRecord = $v101_costsheet_list->StartRecord + $v101_costsheet_list->DisplayRecords - 1;
	else
		$v101_costsheet_list->StopRecord = $v101_costsheet_list->TotalRecords;
}
$v101_costsheet_list->RecordCount = $v101_costsheet_list->StartRecord - 1;
if ($v101_costsheet_list->Recordset && !$v101_costsheet_list->Recordset->EOF) {
	$v101_costsheet_list->Recordset->moveFirst();
	$selectLimit = $v101_costsheet_list->UseSelectLimit;
	if (!$selectLimit && $v101_costsheet_list->StartRecord > 1)
		$v101_costsheet_list->Recordset->move($v101_costsheet_list->StartRecord - 1);
} elseif (!$v101_costsheet->AllowAddDeleteRow && $v101_costsheet_list->StopRecord == 0) {
	$v101_costsheet_list->StopRecord = $v101_costsheet->GridAddRowCount;
}

// Initialize aggregate
$v101_costsheet->RowType = ROWTYPE_AGGREGATEINIT;
$v101_costsheet->resetAttributes();
$v101_costsheet_list->renderRow();
while ($v101_costsheet_list->RecordCount < $v101_costsheet_list->StopRecord) {
	$v101_costsheet_list->RecordCount++;
	if ($v101_costsheet_list->RecordCount >= $v101_costsheet_list->StartRecord) {
		$v101_costsheet_list->RowCount++;

		// Set up key count
		$v101_costsheet_list->KeyCount = $v101_costsheet_list->RowIndex;

		// Init row class and style
		$v101_costsheet->resetAttributes();
		$v101_costsheet->CssClass = "";
		if ($v101_costsheet_list->isGridAdd()) {
		} else {
			$v101_costsheet_list->loadRowValues($v101_costsheet_list->Recordset); // Load row values
		}
		$v101_costsheet->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$v101_costsheet->RowAttrs->merge(["data-rowindex" => $v101_costsheet_list->RowCount, "id" => "r" . $v101_costsheet_list->RowCount . "_v101_costsheet", "data-rowtype" => $v101_costsheet->RowType]);

		// Render row
		$v101_costsheet_list->renderRow();

		// Render list options
		$v101_costsheet_list->renderListOptions();
?>
	<tr <?php echo $v101_costsheet->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v101_costsheet_list->ListOptions->render("body", "left", $v101_costsheet_list->RowCount);
?>
	<?php if ($v101_costsheet_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $v101_costsheet_list->id->cellAttributes() ?>>
<span id="el<?php echo $v101_costsheet_list->RowCount ?>_v101_costsheet_id">
<span<?php echo $v101_costsheet_list->id->viewAttributes() ?>><?php echo $v101_costsheet_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_costsheet_list->NoJO->Visible) { // NoJO ?>
		<td data-name="NoJO" <?php echo $v101_costsheet_list->NoJO->cellAttributes() ?>>
<span id="el<?php echo $v101_costsheet_list->RowCount ?>_v101_costsheet_NoJO">
<span<?php echo $v101_costsheet_list->NoJO->viewAttributes() ?>><?php echo $v101_costsheet_list->NoJO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_costsheet_list->Tagihan->Visible) { // Tagihan ?>
		<td data-name="Tagihan" <?php echo $v101_costsheet_list->Tagihan->cellAttributes() ?>>
<span id="el<?php echo $v101_costsheet_list->RowCount ?>_v101_costsheet_Tagihan">
<span<?php echo $v101_costsheet_list->Tagihan->viewAttributes() ?>><?php echo $v101_costsheet_list->Tagihan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_costsheet_list->Shipper->Visible) { // Shipper ?>
		<td data-name="Shipper" <?php echo $v101_costsheet_list->Shipper->cellAttributes() ?>>
<span id="el<?php echo $v101_costsheet_list->RowCount ?>_v101_costsheet_Shipper">
<span<?php echo $v101_costsheet_list->Shipper->viewAttributes() ?>><?php echo $v101_costsheet_list->Shipper->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_costsheet_list->Qty->Visible) { // Qty ?>
		<td data-name="Qty" <?php echo $v101_costsheet_list->Qty->cellAttributes() ?>>
<span id="el<?php echo $v101_costsheet_list->RowCount ?>_v101_costsheet_Qty">
<span<?php echo $v101_costsheet_list->Qty->viewAttributes() ?>><?php echo $v101_costsheet_list->Qty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_costsheet_list->Cont->Visible) { // Cont ?>
		<td data-name="Cont" <?php echo $v101_costsheet_list->Cont->cellAttributes() ?>>
<span id="el<?php echo $v101_costsheet_list->RowCount ?>_v101_costsheet_Cont">
<span<?php echo $v101_costsheet_list->Cont->viewAttributes() ?>><?php echo $v101_costsheet_list->Cont->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_costsheet_list->Status->Visible) { // Status ?>
		<td data-name="Status" <?php echo $v101_costsheet_list->Status->cellAttributes() ?>>
<span id="el<?php echo $v101_costsheet_list->RowCount ?>_v101_costsheet_Status">
<span<?php echo $v101_costsheet_list->Status->viewAttributes() ?>><?php echo $v101_costsheet_list->Status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_costsheet_list->Doc->Visible) { // Doc ?>
		<td data-name="Doc" <?php echo $v101_costsheet_list->Doc->cellAttributes() ?>>
<span id="el<?php echo $v101_costsheet_list->RowCount ?>_v101_costsheet_Doc">
<span<?php echo $v101_costsheet_list->Doc->viewAttributes() ?>><?php echo $v101_costsheet_list->Doc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_costsheet_list->Tujuan->Visible) { // Tujuan ?>
		<td data-name="Tujuan" <?php echo $v101_costsheet_list->Tujuan->cellAttributes() ?>>
<span id="el<?php echo $v101_costsheet_list->RowCount ?>_v101_costsheet_Tujuan">
<span<?php echo $v101_costsheet_list->Tujuan->viewAttributes() ?>><?php echo $v101_costsheet_list->Tujuan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_costsheet_list->Kapal->Visible) { // Kapal ?>
		<td data-name="Kapal" <?php echo $v101_costsheet_list->Kapal->cellAttributes() ?>>
<span id="el<?php echo $v101_costsheet_list->RowCount ?>_v101_costsheet_Kapal">
<span<?php echo $v101_costsheet_list->Kapal->viewAttributes() ?>><?php echo $v101_costsheet_list->Kapal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_costsheet_list->BM->Visible) { // BM ?>
		<td data-name="BM" <?php echo $v101_costsheet_list->BM->cellAttributes() ?>>
<span id="el<?php echo $v101_costsheet_list->RowCount ?>_v101_costsheet_BM">
<span<?php echo $v101_costsheet_list->BM->viewAttributes() ?>><?php echo $v101_costsheet_list->BM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v101_costsheet_list->ListOptions->render("body", "right", $v101_costsheet_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$v101_costsheet_list->isGridAdd())
		$v101_costsheet_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$v101_costsheet->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($v101_costsheet_list->Recordset)
	$v101_costsheet_list->Recordset->Close();
?>
<?php if (!$v101_costsheet_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$v101_costsheet_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v101_costsheet_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v101_costsheet_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($v101_costsheet_list->TotalRecords == 0 && !$v101_costsheet->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $v101_costsheet_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$v101_costsheet_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$v101_costsheet_list->isExport()) { ?>
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
$v101_costsheet_list->terminate();
?>