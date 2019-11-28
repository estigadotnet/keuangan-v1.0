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
$v203_costsheet_list = new v203_costsheet_list();

// Run the page
$v203_costsheet_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v203_costsheet_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$v203_costsheet_list->isExport()) { ?>
<script>
var fv203_costsheetlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fv203_costsheetlist = currentForm = new ew.Form("fv203_costsheetlist", "list");
	fv203_costsheetlist.formKeyCountName = '<?php echo $v203_costsheet_list->FormKeyCountName ?>';
	loadjs.done("fv203_costsheetlist");
});
var fv203_costsheetlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fv203_costsheetlistsrch = currentSearchForm = new ew.Form("fv203_costsheetlistsrch");

	// Validate function for search
	fv203_costsheetlistsrch.validate = function(fobj) {
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
	fv203_costsheetlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fv203_costsheetlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fv203_costsheetlistsrch.lists["x_NoJO"] = <?php echo $v203_costsheet_list->NoJO->Lookup->toClientList($v203_costsheet_list) ?>;
	fv203_costsheetlistsrch.lists["x_NoJO"].options = <?php echo JsonEncode($v203_costsheet_list->NoJO->lookupOptions()) ?>;

	// Filters
	fv203_costsheetlistsrch.filterList = <?php echo $v203_costsheet_list->getFilterList() ?>;
	loadjs.done("fv203_costsheetlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$v203_costsheet_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($v203_costsheet_list->TotalRecords > 0 && $v203_costsheet_list->ExportOptions->visible()) { ?>
<?php $v203_costsheet_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($v203_costsheet_list->ImportOptions->visible()) { ?>
<?php $v203_costsheet_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($v203_costsheet_list->SearchOptions->visible()) { ?>
<?php $v203_costsheet_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($v203_costsheet_list->FilterOptions->visible()) { ?>
<?php $v203_costsheet_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$v203_costsheet_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$v203_costsheet_list->isExport() && !$v203_costsheet->CurrentAction) { ?>
<form name="fv203_costsheetlistsrch" id="fv203_costsheetlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fv203_costsheetlistsrch-search-panel" class="<?php echo $v203_costsheet_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="v203_costsheet">
	<div class="ew-extended-search">
<?php

// Render search row
$v203_costsheet->RowType = ROWTYPE_SEARCH;
$v203_costsheet->resetAttributes();
$v203_costsheet_list->renderRow();
?>
<?php if ($v203_costsheet_list->NoJO->Visible) { // NoJO ?>
	<?php
		$v203_costsheet_list->SearchColumnCount++;
		if (($v203_costsheet_list->SearchColumnCount - 1) % $v203_costsheet_list->SearchFieldsPerRow == 0) {
			$v203_costsheet_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $v203_costsheet_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_NoJO" class="ew-cell form-group">
		<label for="x_NoJO" class="ew-search-caption ew-label"><?php echo $v203_costsheet_list->NoJO->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_NoJO" id="z_NoJO" value="=">
</span>
		<span id="el_v203_costsheet_NoJO" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_NoJO"><?php echo EmptyValue(strval($v203_costsheet_list->NoJO->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $v203_costsheet_list->NoJO->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v203_costsheet_list->NoJO->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v203_costsheet_list->NoJO->ReadOnly || $v203_costsheet_list->NoJO->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_NoJO',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v203_costsheet_list->NoJO->Lookup->getParamTag($v203_costsheet_list, "p_x_NoJO") ?>
<input type="hidden" data-table="v203_costsheet" data-field="x_NoJO" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v203_costsheet_list->NoJO->displayValueSeparatorAttribute() ?>" name="x_NoJO" id="x_NoJO" value="<?php echo $v203_costsheet_list->NoJO->AdvancedSearch->SearchValue ?>"<?php echo $v203_costsheet_list->NoJO->editAttributes() ?>>
</span>
	</div>
	<?php if ($v203_costsheet_list->SearchColumnCount % $v203_costsheet_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($v203_costsheet_list->SearchColumnCount % $v203_costsheet_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $v203_costsheet_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $v203_costsheet_list->showPageHeader(); ?>
<?php
$v203_costsheet_list->showMessage();
?>
<?php if ($v203_costsheet_list->TotalRecords > 0 || $v203_costsheet->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($v203_costsheet_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> v203_costsheet">
<?php if (!$v203_costsheet_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$v203_costsheet_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v203_costsheet_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v203_costsheet_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fv203_costsheetlist" id="fv203_costsheetlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v203_costsheet">
<div id="gmp_v203_costsheet" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($v203_costsheet_list->TotalRecords > 0 || $v203_costsheet_list->isGridEdit()) { ?>
<table id="tbl_v203_costsheetlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$v203_costsheet->RowType = ROWTYPE_HEADER;

// Render list options
$v203_costsheet_list->renderListOptions();

// Render list options (header, left)
$v203_costsheet_list->ListOptions->render("header", "left");
?>
<?php if ($v203_costsheet_list->jo_id->Visible) { // jo_id ?>
	<?php if ($v203_costsheet_list->SortUrl($v203_costsheet_list->jo_id) == "") { ?>
		<th data-name="jo_id" class="<?php echo $v203_costsheet_list->jo_id->headerCellClass() ?>"><div id="elh_v203_costsheet_jo_id" class="v203_costsheet_jo_id"><div class="ew-table-header-caption"><?php echo $v203_costsheet_list->jo_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jo_id" class="<?php echo $v203_costsheet_list->jo_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v203_costsheet_list->SortUrl($v203_costsheet_list->jo_id) ?>', 2);"><div id="elh_v203_costsheet_jo_id" class="v203_costsheet_jo_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v203_costsheet_list->jo_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v203_costsheet_list->jo_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v203_costsheet_list->jo_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v203_costsheet_list->NoJO->Visible) { // NoJO ?>
	<?php if ($v203_costsheet_list->SortUrl($v203_costsheet_list->NoJO) == "") { ?>
		<th data-name="NoJO" class="<?php echo $v203_costsheet_list->NoJO->headerCellClass() ?>"><div id="elh_v203_costsheet_NoJO" class="v203_costsheet_NoJO"><div class="ew-table-header-caption"><?php echo $v203_costsheet_list->NoJO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoJO" class="<?php echo $v203_costsheet_list->NoJO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v203_costsheet_list->SortUrl($v203_costsheet_list->NoJO) ?>', 2);"><div id="elh_v203_costsheet_NoJO" class="v203_costsheet_NoJO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v203_costsheet_list->NoJO->caption() ?></span><span class="ew-table-header-sort"><?php if ($v203_costsheet_list->NoJO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v203_costsheet_list->NoJO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v203_costsheet_list->Tagihan->Visible) { // Tagihan ?>
	<?php if ($v203_costsheet_list->SortUrl($v203_costsheet_list->Tagihan) == "") { ?>
		<th data-name="Tagihan" class="<?php echo $v203_costsheet_list->Tagihan->headerCellClass() ?>"><div id="elh_v203_costsheet_Tagihan" class="v203_costsheet_Tagihan"><div class="ew-table-header-caption"><?php echo $v203_costsheet_list->Tagihan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tagihan" class="<?php echo $v203_costsheet_list->Tagihan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v203_costsheet_list->SortUrl($v203_costsheet_list->Tagihan) ?>', 2);"><div id="elh_v203_costsheet_Tagihan" class="v203_costsheet_Tagihan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v203_costsheet_list->Tagihan->caption() ?></span><span class="ew-table-header-sort"><?php if ($v203_costsheet_list->Tagihan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v203_costsheet_list->Tagihan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v203_costsheet_list->Shipper->Visible) { // Shipper ?>
	<?php if ($v203_costsheet_list->SortUrl($v203_costsheet_list->Shipper) == "") { ?>
		<th data-name="Shipper" class="<?php echo $v203_costsheet_list->Shipper->headerCellClass() ?>"><div id="elh_v203_costsheet_Shipper" class="v203_costsheet_Shipper"><div class="ew-table-header-caption"><?php echo $v203_costsheet_list->Shipper->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Shipper" class="<?php echo $v203_costsheet_list->Shipper->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v203_costsheet_list->SortUrl($v203_costsheet_list->Shipper) ?>', 2);"><div id="elh_v203_costsheet_Shipper" class="v203_costsheet_Shipper">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v203_costsheet_list->Shipper->caption() ?></span><span class="ew-table-header-sort"><?php if ($v203_costsheet_list->Shipper->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v203_costsheet_list->Shipper->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v203_costsheet_list->Qty->Visible) { // Qty ?>
	<?php if ($v203_costsheet_list->SortUrl($v203_costsheet_list->Qty) == "") { ?>
		<th data-name="Qty" class="<?php echo $v203_costsheet_list->Qty->headerCellClass() ?>"><div id="elh_v203_costsheet_Qty" class="v203_costsheet_Qty"><div class="ew-table-header-caption"><?php echo $v203_costsheet_list->Qty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Qty" class="<?php echo $v203_costsheet_list->Qty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v203_costsheet_list->SortUrl($v203_costsheet_list->Qty) ?>', 2);"><div id="elh_v203_costsheet_Qty" class="v203_costsheet_Qty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v203_costsheet_list->Qty->caption() ?></span><span class="ew-table-header-sort"><?php if ($v203_costsheet_list->Qty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v203_costsheet_list->Qty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v203_costsheet_list->Cont->Visible) { // Cont ?>
	<?php if ($v203_costsheet_list->SortUrl($v203_costsheet_list->Cont) == "") { ?>
		<th data-name="Cont" class="<?php echo $v203_costsheet_list->Cont->headerCellClass() ?>"><div id="elh_v203_costsheet_Cont" class="v203_costsheet_Cont"><div class="ew-table-header-caption"><?php echo $v203_costsheet_list->Cont->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cont" class="<?php echo $v203_costsheet_list->Cont->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v203_costsheet_list->SortUrl($v203_costsheet_list->Cont) ?>', 2);"><div id="elh_v203_costsheet_Cont" class="v203_costsheet_Cont">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v203_costsheet_list->Cont->caption() ?></span><span class="ew-table-header-sort"><?php if ($v203_costsheet_list->Cont->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v203_costsheet_list->Cont->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v203_costsheet_list->Status->Visible) { // Status ?>
	<?php if ($v203_costsheet_list->SortUrl($v203_costsheet_list->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $v203_costsheet_list->Status->headerCellClass() ?>"><div id="elh_v203_costsheet_Status" class="v203_costsheet_Status"><div class="ew-table-header-caption"><?php echo $v203_costsheet_list->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $v203_costsheet_list->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v203_costsheet_list->SortUrl($v203_costsheet_list->Status) ?>', 2);"><div id="elh_v203_costsheet_Status" class="v203_costsheet_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v203_costsheet_list->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($v203_costsheet_list->Status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v203_costsheet_list->Status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v203_costsheet_list->doc->Visible) { // doc ?>
	<?php if ($v203_costsheet_list->SortUrl($v203_costsheet_list->doc) == "") { ?>
		<th data-name="doc" class="<?php echo $v203_costsheet_list->doc->headerCellClass() ?>"><div id="elh_v203_costsheet_doc" class="v203_costsheet_doc"><div class="ew-table-header-caption"><?php echo $v203_costsheet_list->doc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="doc" class="<?php echo $v203_costsheet_list->doc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v203_costsheet_list->SortUrl($v203_costsheet_list->doc) ?>', 2);"><div id="elh_v203_costsheet_doc" class="v203_costsheet_doc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v203_costsheet_list->doc->caption() ?></span><span class="ew-table-header-sort"><?php if ($v203_costsheet_list->doc->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v203_costsheet_list->doc->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v203_costsheet_list->Tujuan->Visible) { // Tujuan ?>
	<?php if ($v203_costsheet_list->SortUrl($v203_costsheet_list->Tujuan) == "") { ?>
		<th data-name="Tujuan" class="<?php echo $v203_costsheet_list->Tujuan->headerCellClass() ?>"><div id="elh_v203_costsheet_Tujuan" class="v203_costsheet_Tujuan"><div class="ew-table-header-caption"><?php echo $v203_costsheet_list->Tujuan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tujuan" class="<?php echo $v203_costsheet_list->Tujuan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v203_costsheet_list->SortUrl($v203_costsheet_list->Tujuan) ?>', 2);"><div id="elh_v203_costsheet_Tujuan" class="v203_costsheet_Tujuan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v203_costsheet_list->Tujuan->caption() ?></span><span class="ew-table-header-sort"><?php if ($v203_costsheet_list->Tujuan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v203_costsheet_list->Tujuan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v203_costsheet_list->Kapal->Visible) { // Kapal ?>
	<?php if ($v203_costsheet_list->SortUrl($v203_costsheet_list->Kapal) == "") { ?>
		<th data-name="Kapal" class="<?php echo $v203_costsheet_list->Kapal->headerCellClass() ?>"><div id="elh_v203_costsheet_Kapal" class="v203_costsheet_Kapal"><div class="ew-table-header-caption"><?php echo $v203_costsheet_list->Kapal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Kapal" class="<?php echo $v203_costsheet_list->Kapal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v203_costsheet_list->SortUrl($v203_costsheet_list->Kapal) ?>', 2);"><div id="elh_v203_costsheet_Kapal" class="v203_costsheet_Kapal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v203_costsheet_list->Kapal->caption() ?></span><span class="ew-table-header-sort"><?php if ($v203_costsheet_list->Kapal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v203_costsheet_list->Kapal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v203_costsheet_list->BM->Visible) { // BM ?>
	<?php if ($v203_costsheet_list->SortUrl($v203_costsheet_list->BM) == "") { ?>
		<th data-name="BM" class="<?php echo $v203_costsheet_list->BM->headerCellClass() ?>"><div id="elh_v203_costsheet_BM" class="v203_costsheet_BM"><div class="ew-table-header-caption"><?php echo $v203_costsheet_list->BM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BM" class="<?php echo $v203_costsheet_list->BM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v203_costsheet_list->SortUrl($v203_costsheet_list->BM) ?>', 2);"><div id="elh_v203_costsheet_BM" class="v203_costsheet_BM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v203_costsheet_list->BM->caption() ?></span><span class="ew-table-header-sort"><?php if ($v203_costsheet_list->BM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v203_costsheet_list->BM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v203_costsheet_list->mts_id->Visible) { // mts_id ?>
	<?php if ($v203_costsheet_list->SortUrl($v203_costsheet_list->mts_id) == "") { ?>
		<th data-name="mts_id" class="<?php echo $v203_costsheet_list->mts_id->headerCellClass() ?>"><div id="elh_v203_costsheet_mts_id" class="v203_costsheet_mts_id"><div class="ew-table-header-caption"><?php echo $v203_costsheet_list->mts_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mts_id" class="<?php echo $v203_costsheet_list->mts_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v203_costsheet_list->SortUrl($v203_costsheet_list->mts_id) ?>', 2);"><div id="elh_v203_costsheet_mts_id" class="v203_costsheet_mts_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v203_costsheet_list->mts_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v203_costsheet_list->mts_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v203_costsheet_list->mts_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v203_costsheet_list->Tanggal->Visible) { // Tanggal ?>
	<?php if ($v203_costsheet_list->SortUrl($v203_costsheet_list->Tanggal) == "") { ?>
		<th data-name="Tanggal" class="<?php echo $v203_costsheet_list->Tanggal->headerCellClass() ?>"><div id="elh_v203_costsheet_Tanggal" class="v203_costsheet_Tanggal"><div class="ew-table-header-caption"><?php echo $v203_costsheet_list->Tanggal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tanggal" class="<?php echo $v203_costsheet_list->Tanggal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v203_costsheet_list->SortUrl($v203_costsheet_list->Tanggal) ?>', 2);"><div id="elh_v203_costsheet_Tanggal" class="v203_costsheet_Tanggal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v203_costsheet_list->Tanggal->caption() ?></span><span class="ew-table-header-sort"><?php if ($v203_costsheet_list->Tanggal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v203_costsheet_list->Tanggal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v203_costsheet_list->NoUrut->Visible) { // NoUrut ?>
	<?php if ($v203_costsheet_list->SortUrl($v203_costsheet_list->NoUrut) == "") { ?>
		<th data-name="NoUrut" class="<?php echo $v203_costsheet_list->NoUrut->headerCellClass() ?>"><div id="elh_v203_costsheet_NoUrut" class="v203_costsheet_NoUrut"><div class="ew-table-header-caption"><?php echo $v203_costsheet_list->NoUrut->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoUrut" class="<?php echo $v203_costsheet_list->NoUrut->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v203_costsheet_list->SortUrl($v203_costsheet_list->NoUrut) ?>', 2);"><div id="elh_v203_costsheet_NoUrut" class="v203_costsheet_NoUrut">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v203_costsheet_list->NoUrut->caption() ?></span><span class="ew-table-header-sort"><?php if ($v203_costsheet_list->NoUrut->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v203_costsheet_list->NoUrut->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v203_costsheet_list->mts_jo_id->Visible) { // mts_jo_id ?>
	<?php if ($v203_costsheet_list->SortUrl($v203_costsheet_list->mts_jo_id) == "") { ?>
		<th data-name="mts_jo_id" class="<?php echo $v203_costsheet_list->mts_jo_id->headerCellClass() ?>"><div id="elh_v203_costsheet_mts_jo_id" class="v203_costsheet_mts_jo_id"><div class="ew-table-header-caption"><?php echo $v203_costsheet_list->mts_jo_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mts_jo_id" class="<?php echo $v203_costsheet_list->mts_jo_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v203_costsheet_list->SortUrl($v203_costsheet_list->mts_jo_id) ?>', 2);"><div id="elh_v203_costsheet_mts_jo_id" class="v203_costsheet_mts_jo_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v203_costsheet_list->mts_jo_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v203_costsheet_list->mts_jo_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v203_costsheet_list->mts_jo_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v203_costsheet_list->mts_jenis_id->Visible) { // mts_jenis_id ?>
	<?php if ($v203_costsheet_list->SortUrl($v203_costsheet_list->mts_jenis_id) == "") { ?>
		<th data-name="mts_jenis_id" class="<?php echo $v203_costsheet_list->mts_jenis_id->headerCellClass() ?>"><div id="elh_v203_costsheet_mts_jenis_id" class="v203_costsheet_mts_jenis_id"><div class="ew-table-header-caption"><?php echo $v203_costsheet_list->mts_jenis_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mts_jenis_id" class="<?php echo $v203_costsheet_list->mts_jenis_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v203_costsheet_list->SortUrl($v203_costsheet_list->mts_jenis_id) ?>', 2);"><div id="elh_v203_costsheet_mts_jenis_id" class="v203_costsheet_mts_jenis_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v203_costsheet_list->mts_jenis_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v203_costsheet_list->mts_jenis_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v203_costsheet_list->mts_jenis_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v203_costsheet_list->Masuk->Visible) { // Masuk ?>
	<?php if ($v203_costsheet_list->SortUrl($v203_costsheet_list->Masuk) == "") { ?>
		<th data-name="Masuk" class="<?php echo $v203_costsheet_list->Masuk->headerCellClass() ?>"><div id="elh_v203_costsheet_Masuk" class="v203_costsheet_Masuk"><div class="ew-table-header-caption"><?php echo $v203_costsheet_list->Masuk->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Masuk" class="<?php echo $v203_costsheet_list->Masuk->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v203_costsheet_list->SortUrl($v203_costsheet_list->Masuk) ?>', 2);"><div id="elh_v203_costsheet_Masuk" class="v203_costsheet_Masuk">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v203_costsheet_list->Masuk->caption() ?></span><span class="ew-table-header-sort"><?php if ($v203_costsheet_list->Masuk->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v203_costsheet_list->Masuk->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v203_costsheet_list->Keluar->Visible) { // Keluar ?>
	<?php if ($v203_costsheet_list->SortUrl($v203_costsheet_list->Keluar) == "") { ?>
		<th data-name="Keluar" class="<?php echo $v203_costsheet_list->Keluar->headerCellClass() ?>"><div id="elh_v203_costsheet_Keluar" class="v203_costsheet_Keluar"><div class="ew-table-header-caption"><?php echo $v203_costsheet_list->Keluar->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Keluar" class="<?php echo $v203_costsheet_list->Keluar->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v203_costsheet_list->SortUrl($v203_costsheet_list->Keluar) ?>', 2);"><div id="elh_v203_costsheet_Keluar" class="v203_costsheet_Keluar">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v203_costsheet_list->Keluar->caption() ?></span><span class="ew-table-header-sort"><?php if ($v203_costsheet_list->Keluar->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v203_costsheet_list->Keluar->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v203_costsheet_list->jns_id->Visible) { // jns_id ?>
	<?php if ($v203_costsheet_list->SortUrl($v203_costsheet_list->jns_id) == "") { ?>
		<th data-name="jns_id" class="<?php echo $v203_costsheet_list->jns_id->headerCellClass() ?>"><div id="elh_v203_costsheet_jns_id" class="v203_costsheet_jns_id"><div class="ew-table-header-caption"><?php echo $v203_costsheet_list->jns_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jns_id" class="<?php echo $v203_costsheet_list->jns_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v203_costsheet_list->SortUrl($v203_costsheet_list->jns_id) ?>', 2);"><div id="elh_v203_costsheet_jns_id" class="v203_costsheet_jns_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v203_costsheet_list->jns_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v203_costsheet_list->jns_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v203_costsheet_list->jns_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v203_costsheet_list->NoKolom->Visible) { // NoKolom ?>
	<?php if ($v203_costsheet_list->SortUrl($v203_costsheet_list->NoKolom) == "") { ?>
		<th data-name="NoKolom" class="<?php echo $v203_costsheet_list->NoKolom->headerCellClass() ?>"><div id="elh_v203_costsheet_NoKolom" class="v203_costsheet_NoKolom"><div class="ew-table-header-caption"><?php echo $v203_costsheet_list->NoKolom->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoKolom" class="<?php echo $v203_costsheet_list->NoKolom->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v203_costsheet_list->SortUrl($v203_costsheet_list->NoKolom) ?>', 2);"><div id="elh_v203_costsheet_NoKolom" class="v203_costsheet_NoKolom">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v203_costsheet_list->NoKolom->caption() ?></span><span class="ew-table-header-sort"><?php if ($v203_costsheet_list->NoKolom->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v203_costsheet_list->NoKolom->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v203_costsheet_list->NoBL->Visible) { // NoBL ?>
	<?php if ($v203_costsheet_list->SortUrl($v203_costsheet_list->NoBL) == "") { ?>
		<th data-name="NoBL" class="<?php echo $v203_costsheet_list->NoBL->headerCellClass() ?>"><div id="elh_v203_costsheet_NoBL" class="v203_costsheet_NoBL"><div class="ew-table-header-caption"><?php echo $v203_costsheet_list->NoBL->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoBL" class="<?php echo $v203_costsheet_list->NoBL->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v203_costsheet_list->SortUrl($v203_costsheet_list->NoBL) ?>', 2);"><div id="elh_v203_costsheet_NoBL" class="v203_costsheet_NoBL">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v203_costsheet_list->NoBL->caption() ?></span><span class="ew-table-header-sort"><?php if ($v203_costsheet_list->NoBL->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v203_costsheet_list->NoBL->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v203_costsheet_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($v203_costsheet_list->ExportAll && $v203_costsheet_list->isExport()) {
	$v203_costsheet_list->StopRecord = $v203_costsheet_list->TotalRecords;
} else {

	// Set the last record to display
	if ($v203_costsheet_list->TotalRecords > $v203_costsheet_list->StartRecord + $v203_costsheet_list->DisplayRecords - 1)
		$v203_costsheet_list->StopRecord = $v203_costsheet_list->StartRecord + $v203_costsheet_list->DisplayRecords - 1;
	else
		$v203_costsheet_list->StopRecord = $v203_costsheet_list->TotalRecords;
}
$v203_costsheet_list->RecordCount = $v203_costsheet_list->StartRecord - 1;
if ($v203_costsheet_list->Recordset && !$v203_costsheet_list->Recordset->EOF) {
	$v203_costsheet_list->Recordset->moveFirst();
	$selectLimit = $v203_costsheet_list->UseSelectLimit;
	if (!$selectLimit && $v203_costsheet_list->StartRecord > 1)
		$v203_costsheet_list->Recordset->move($v203_costsheet_list->StartRecord - 1);
} elseif (!$v203_costsheet->AllowAddDeleteRow && $v203_costsheet_list->StopRecord == 0) {
	$v203_costsheet_list->StopRecord = $v203_costsheet->GridAddRowCount;
}

// Initialize aggregate
$v203_costsheet->RowType = ROWTYPE_AGGREGATEINIT;
$v203_costsheet->resetAttributes();
$v203_costsheet_list->renderRow();
while ($v203_costsheet_list->RecordCount < $v203_costsheet_list->StopRecord) {
	$v203_costsheet_list->RecordCount++;
	if ($v203_costsheet_list->RecordCount >= $v203_costsheet_list->StartRecord) {
		$v203_costsheet_list->RowCount++;

		// Set up key count
		$v203_costsheet_list->KeyCount = $v203_costsheet_list->RowIndex;

		// Init row class and style
		$v203_costsheet->resetAttributes();
		$v203_costsheet->CssClass = "";
		if ($v203_costsheet_list->isGridAdd()) {
		} else {
			$v203_costsheet_list->loadRowValues($v203_costsheet_list->Recordset); // Load row values
		}
		$v203_costsheet->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$v203_costsheet->RowAttrs->merge(["data-rowindex" => $v203_costsheet_list->RowCount, "id" => "r" . $v203_costsheet_list->RowCount . "_v203_costsheet", "data-rowtype" => $v203_costsheet->RowType]);

		// Render row
		$v203_costsheet_list->renderRow();

		// Render list options
		$v203_costsheet_list->renderListOptions();
?>
	<tr <?php echo $v203_costsheet->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v203_costsheet_list->ListOptions->render("body", "left", $v203_costsheet_list->RowCount);
?>
	<?php if ($v203_costsheet_list->jo_id->Visible) { // jo_id ?>
		<td data-name="jo_id" <?php echo $v203_costsheet_list->jo_id->cellAttributes() ?>>
<span id="el<?php echo $v203_costsheet_list->RowCount ?>_v203_costsheet_jo_id">
<span<?php echo $v203_costsheet_list->jo_id->viewAttributes() ?>><?php echo $v203_costsheet_list->jo_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v203_costsheet_list->NoJO->Visible) { // NoJO ?>
		<td data-name="NoJO" <?php echo $v203_costsheet_list->NoJO->cellAttributes() ?>>
<span id="el<?php echo $v203_costsheet_list->RowCount ?>_v203_costsheet_NoJO">
<span<?php echo $v203_costsheet_list->NoJO->viewAttributes() ?>><?php echo $v203_costsheet_list->NoJO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v203_costsheet_list->Tagihan->Visible) { // Tagihan ?>
		<td data-name="Tagihan" <?php echo $v203_costsheet_list->Tagihan->cellAttributes() ?>>
<span id="el<?php echo $v203_costsheet_list->RowCount ?>_v203_costsheet_Tagihan">
<span<?php echo $v203_costsheet_list->Tagihan->viewAttributes() ?>><?php echo $v203_costsheet_list->Tagihan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v203_costsheet_list->Shipper->Visible) { // Shipper ?>
		<td data-name="Shipper" <?php echo $v203_costsheet_list->Shipper->cellAttributes() ?>>
<span id="el<?php echo $v203_costsheet_list->RowCount ?>_v203_costsheet_Shipper">
<span<?php echo $v203_costsheet_list->Shipper->viewAttributes() ?>><?php echo $v203_costsheet_list->Shipper->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v203_costsheet_list->Qty->Visible) { // Qty ?>
		<td data-name="Qty" <?php echo $v203_costsheet_list->Qty->cellAttributes() ?>>
<span id="el<?php echo $v203_costsheet_list->RowCount ?>_v203_costsheet_Qty">
<span<?php echo $v203_costsheet_list->Qty->viewAttributes() ?>><?php echo $v203_costsheet_list->Qty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v203_costsheet_list->Cont->Visible) { // Cont ?>
		<td data-name="Cont" <?php echo $v203_costsheet_list->Cont->cellAttributes() ?>>
<span id="el<?php echo $v203_costsheet_list->RowCount ?>_v203_costsheet_Cont">
<span<?php echo $v203_costsheet_list->Cont->viewAttributes() ?>><?php echo $v203_costsheet_list->Cont->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v203_costsheet_list->Status->Visible) { // Status ?>
		<td data-name="Status" <?php echo $v203_costsheet_list->Status->cellAttributes() ?>>
<span id="el<?php echo $v203_costsheet_list->RowCount ?>_v203_costsheet_Status">
<span<?php echo $v203_costsheet_list->Status->viewAttributes() ?>><?php echo $v203_costsheet_list->Status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v203_costsheet_list->doc->Visible) { // doc ?>
		<td data-name="doc" <?php echo $v203_costsheet_list->doc->cellAttributes() ?>>
<span id="el<?php echo $v203_costsheet_list->RowCount ?>_v203_costsheet_doc">
<span<?php echo $v203_costsheet_list->doc->viewAttributes() ?>><?php echo $v203_costsheet_list->doc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v203_costsheet_list->Tujuan->Visible) { // Tujuan ?>
		<td data-name="Tujuan" <?php echo $v203_costsheet_list->Tujuan->cellAttributes() ?>>
<span id="el<?php echo $v203_costsheet_list->RowCount ?>_v203_costsheet_Tujuan">
<span<?php echo $v203_costsheet_list->Tujuan->viewAttributes() ?>><?php echo $v203_costsheet_list->Tujuan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v203_costsheet_list->Kapal->Visible) { // Kapal ?>
		<td data-name="Kapal" <?php echo $v203_costsheet_list->Kapal->cellAttributes() ?>>
<span id="el<?php echo $v203_costsheet_list->RowCount ?>_v203_costsheet_Kapal">
<span<?php echo $v203_costsheet_list->Kapal->viewAttributes() ?>><?php echo $v203_costsheet_list->Kapal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v203_costsheet_list->BM->Visible) { // BM ?>
		<td data-name="BM" <?php echo $v203_costsheet_list->BM->cellAttributes() ?>>
<span id="el<?php echo $v203_costsheet_list->RowCount ?>_v203_costsheet_BM">
<span<?php echo $v203_costsheet_list->BM->viewAttributes() ?>><?php echo $v203_costsheet_list->BM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v203_costsheet_list->mts_id->Visible) { // mts_id ?>
		<td data-name="mts_id" <?php echo $v203_costsheet_list->mts_id->cellAttributes() ?>>
<span id="el<?php echo $v203_costsheet_list->RowCount ?>_v203_costsheet_mts_id">
<span<?php echo $v203_costsheet_list->mts_id->viewAttributes() ?>><?php echo $v203_costsheet_list->mts_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v203_costsheet_list->Tanggal->Visible) { // Tanggal ?>
		<td data-name="Tanggal" <?php echo $v203_costsheet_list->Tanggal->cellAttributes() ?>>
<span id="el<?php echo $v203_costsheet_list->RowCount ?>_v203_costsheet_Tanggal">
<span<?php echo $v203_costsheet_list->Tanggal->viewAttributes() ?>><?php echo $v203_costsheet_list->Tanggal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v203_costsheet_list->NoUrut->Visible) { // NoUrut ?>
		<td data-name="NoUrut" <?php echo $v203_costsheet_list->NoUrut->cellAttributes() ?>>
<span id="el<?php echo $v203_costsheet_list->RowCount ?>_v203_costsheet_NoUrut">
<span<?php echo $v203_costsheet_list->NoUrut->viewAttributes() ?>><?php echo $v203_costsheet_list->NoUrut->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v203_costsheet_list->mts_jo_id->Visible) { // mts_jo_id ?>
		<td data-name="mts_jo_id" <?php echo $v203_costsheet_list->mts_jo_id->cellAttributes() ?>>
<span id="el<?php echo $v203_costsheet_list->RowCount ?>_v203_costsheet_mts_jo_id">
<span<?php echo $v203_costsheet_list->mts_jo_id->viewAttributes() ?>><?php echo $v203_costsheet_list->mts_jo_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v203_costsheet_list->mts_jenis_id->Visible) { // mts_jenis_id ?>
		<td data-name="mts_jenis_id" <?php echo $v203_costsheet_list->mts_jenis_id->cellAttributes() ?>>
<span id="el<?php echo $v203_costsheet_list->RowCount ?>_v203_costsheet_mts_jenis_id">
<span<?php echo $v203_costsheet_list->mts_jenis_id->viewAttributes() ?>><?php echo $v203_costsheet_list->mts_jenis_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v203_costsheet_list->Masuk->Visible) { // Masuk ?>
		<td data-name="Masuk" <?php echo $v203_costsheet_list->Masuk->cellAttributes() ?>>
<span id="el<?php echo $v203_costsheet_list->RowCount ?>_v203_costsheet_Masuk">
<span<?php echo $v203_costsheet_list->Masuk->viewAttributes() ?>><?php echo $v203_costsheet_list->Masuk->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v203_costsheet_list->Keluar->Visible) { // Keluar ?>
		<td data-name="Keluar" <?php echo $v203_costsheet_list->Keluar->cellAttributes() ?>>
<span id="el<?php echo $v203_costsheet_list->RowCount ?>_v203_costsheet_Keluar">
<span<?php echo $v203_costsheet_list->Keluar->viewAttributes() ?>><?php echo $v203_costsheet_list->Keluar->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v203_costsheet_list->jns_id->Visible) { // jns_id ?>
		<td data-name="jns_id" <?php echo $v203_costsheet_list->jns_id->cellAttributes() ?>>
<span id="el<?php echo $v203_costsheet_list->RowCount ?>_v203_costsheet_jns_id">
<span<?php echo $v203_costsheet_list->jns_id->viewAttributes() ?>><?php echo $v203_costsheet_list->jns_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v203_costsheet_list->NoKolom->Visible) { // NoKolom ?>
		<td data-name="NoKolom" <?php echo $v203_costsheet_list->NoKolom->cellAttributes() ?>>
<span id="el<?php echo $v203_costsheet_list->RowCount ?>_v203_costsheet_NoKolom">
<span<?php echo $v203_costsheet_list->NoKolom->viewAttributes() ?>><?php echo $v203_costsheet_list->NoKolom->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v203_costsheet_list->NoBL->Visible) { // NoBL ?>
		<td data-name="NoBL" <?php echo $v203_costsheet_list->NoBL->cellAttributes() ?>>
<span id="el<?php echo $v203_costsheet_list->RowCount ?>_v203_costsheet_NoBL">
<span<?php echo $v203_costsheet_list->NoBL->viewAttributes() ?>><?php echo $v203_costsheet_list->NoBL->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v203_costsheet_list->ListOptions->render("body", "right", $v203_costsheet_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$v203_costsheet_list->isGridAdd())
		$v203_costsheet_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$v203_costsheet->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($v203_costsheet_list->Recordset)
	$v203_costsheet_list->Recordset->Close();
?>
<?php if (!$v203_costsheet_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$v203_costsheet_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v203_costsheet_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v203_costsheet_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($v203_costsheet_list->TotalRecords == 0 && !$v203_costsheet->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $v203_costsheet_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$v203_costsheet_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$v203_costsheet_list->isExport()) { ?>
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
$v203_costsheet_list->terminate();
?>