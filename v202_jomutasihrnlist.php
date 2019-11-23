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
$v202_jomutasihrn_list = new v202_jomutasihrn_list();

// Run the page
$v202_jomutasihrn_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v202_jomutasihrn_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$v202_jomutasihrn_list->isExport()) { ?>
<script>
var fv202_jomutasihrnlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fv202_jomutasihrnlist = currentForm = new ew.Form("fv202_jomutasihrnlist", "list");
	fv202_jomutasihrnlist.formKeyCountName = '<?php echo $v202_jomutasihrn_list->FormKeyCountName ?>';
	loadjs.done("fv202_jomutasihrnlist");
});
var fv202_jomutasihrnlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fv202_jomutasihrnlistsrch = currentSearchForm = new ew.Form("fv202_jomutasihrnlistsrch");

	// Validate function for search
	fv202_jomutasihrnlistsrch.validate = function(fobj) {
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
	fv202_jomutasihrnlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fv202_jomutasihrnlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fv202_jomutasihrnlistsrch.lists["x_Periode"] = <?php echo $v202_jomutasihrn_list->Periode->Lookup->toClientList($v202_jomutasihrn_list) ?>;
	fv202_jomutasihrnlistsrch.lists["x_Periode"].options = <?php echo JsonEncode($v202_jomutasihrn_list->Periode->lookupOptions()) ?>;
	fv202_jomutasihrnlistsrch.lists["x_NoJO"] = <?php echo $v202_jomutasihrn_list->NoJO->Lookup->toClientList($v202_jomutasihrn_list) ?>;
	fv202_jomutasihrnlistsrch.lists["x_NoJO"].options = <?php echo JsonEncode($v202_jomutasihrn_list->NoJO->lookupOptions()) ?>;

	// Filters
	fv202_jomutasihrnlistsrch.filterList = <?php echo $v202_jomutasihrn_list->getFilterList() ?>;
	loadjs.done("fv202_jomutasihrnlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$v202_jomutasihrn_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($v202_jomutasihrn_list->TotalRecords > 0 && $v202_jomutasihrn_list->ExportOptions->visible()) { ?>
<?php $v202_jomutasihrn_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($v202_jomutasihrn_list->ImportOptions->visible()) { ?>
<?php $v202_jomutasihrn_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($v202_jomutasihrn_list->SearchOptions->visible()) { ?>
<?php $v202_jomutasihrn_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($v202_jomutasihrn_list->FilterOptions->visible()) { ?>
<?php $v202_jomutasihrn_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$v202_jomutasihrn_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$v202_jomutasihrn_list->isExport() && !$v202_jomutasihrn->CurrentAction) { ?>
<form name="fv202_jomutasihrnlistsrch" id="fv202_jomutasihrnlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fv202_jomutasihrnlistsrch-search-panel" class="<?php echo $v202_jomutasihrn_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="v202_jomutasihrn">
	<div class="ew-extended-search">
<?php

// Render search row
$v202_jomutasihrn->RowType = ROWTYPE_SEARCH;
$v202_jomutasihrn->resetAttributes();
$v202_jomutasihrn_list->renderRow();
?>
<?php if ($v202_jomutasihrn_list->Periode->Visible) { // Periode ?>
	<?php
		$v202_jomutasihrn_list->SearchColumnCount++;
		if (($v202_jomutasihrn_list->SearchColumnCount - 1) % $v202_jomutasihrn_list->SearchFieldsPerRow == 0) {
			$v202_jomutasihrn_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $v202_jomutasihrn_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Periode" class="ew-cell form-group">
		<label for="x_Periode" class="ew-search-caption ew-label"><?php echo $v202_jomutasihrn_list->Periode->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Periode" id="z_Periode" value="LIKE">
</span>
		<span id="el_v202_jomutasihrn_Periode" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Periode"><?php echo EmptyValue(strval($v202_jomutasihrn_list->Periode->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $v202_jomutasihrn_list->Periode->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v202_jomutasihrn_list->Periode->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v202_jomutasihrn_list->Periode->ReadOnly || $v202_jomutasihrn_list->Periode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Periode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v202_jomutasihrn_list->Periode->Lookup->getParamTag($v202_jomutasihrn_list, "p_x_Periode") ?>
<input type="hidden" data-table="v202_jomutasihrn" data-field="x_Periode" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v202_jomutasihrn_list->Periode->displayValueSeparatorAttribute() ?>" name="x_Periode" id="x_Periode" value="<?php echo $v202_jomutasihrn_list->Periode->AdvancedSearch->SearchValue ?>"<?php echo $v202_jomutasihrn_list->Periode->editAttributes() ?>>
</span>
	</div>
	<?php if ($v202_jomutasihrn_list->SearchColumnCount % $v202_jomutasihrn_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($v202_jomutasihrn_list->NoJO->Visible) { // NoJO ?>
	<?php
		$v202_jomutasihrn_list->SearchColumnCount++;
		if (($v202_jomutasihrn_list->SearchColumnCount - 1) % $v202_jomutasihrn_list->SearchFieldsPerRow == 0) {
			$v202_jomutasihrn_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $v202_jomutasihrn_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_NoJO" class="ew-cell form-group">
		<label for="x_NoJO" class="ew-search-caption ew-label"><?php echo $v202_jomutasihrn_list->NoJO->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_NoJO" id="z_NoJO" value="LIKE">
</span>
		<span id="el_v202_jomutasihrn_NoJO" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_NoJO"><?php echo EmptyValue(strval($v202_jomutasihrn_list->NoJO->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $v202_jomutasihrn_list->NoJO->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v202_jomutasihrn_list->NoJO->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v202_jomutasihrn_list->NoJO->ReadOnly || $v202_jomutasihrn_list->NoJO->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_NoJO',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v202_jomutasihrn_list->NoJO->Lookup->getParamTag($v202_jomutasihrn_list, "p_x_NoJO") ?>
<input type="hidden" data-table="v202_jomutasihrn" data-field="x_NoJO" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v202_jomutasihrn_list->NoJO->displayValueSeparatorAttribute() ?>" name="x_NoJO" id="x_NoJO" value="<?php echo $v202_jomutasihrn_list->NoJO->AdvancedSearch->SearchValue ?>"<?php echo $v202_jomutasihrn_list->NoJO->editAttributes() ?>>
</span>
	</div>
	<?php if ($v202_jomutasihrn_list->SearchColumnCount % $v202_jomutasihrn_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($v202_jomutasihrn_list->SearchColumnCount % $v202_jomutasihrn_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $v202_jomutasihrn_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $v202_jomutasihrn_list->showPageHeader(); ?>
<?php
$v202_jomutasihrn_list->showMessage();
?>
<?php if ($v202_jomutasihrn_list->TotalRecords > 0 || $v202_jomutasihrn->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($v202_jomutasihrn_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> v202_jomutasihrn">
<?php if (!$v202_jomutasihrn_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$v202_jomutasihrn_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v202_jomutasihrn_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v202_jomutasihrn_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fv202_jomutasihrnlist" id="fv202_jomutasihrnlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v202_jomutasihrn">
<div id="gmp_v202_jomutasihrn" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($v202_jomutasihrn_list->TotalRecords > 0 || $v202_jomutasihrn_list->isGridEdit()) { ?>
<table id="tbl_v202_jomutasihrnlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$v202_jomutasihrn->RowType = ROWTYPE_HEADER;

// Render list options
$v202_jomutasihrn_list->renderListOptions();

// Render list options (header, left)
$v202_jomutasihrn_list->ListOptions->render("header", "left");
?>
<?php if ($v202_jomutasihrn_list->Periode->Visible) { // Periode ?>
	<?php if ($v202_jomutasihrn_list->SortUrl($v202_jomutasihrn_list->Periode) == "") { ?>
		<th data-name="Periode" class="<?php echo $v202_jomutasihrn_list->Periode->headerCellClass() ?>"><div id="elh_v202_jomutasihrn_Periode" class="v202_jomutasihrn_Periode"><div class="ew-table-header-caption"><?php echo $v202_jomutasihrn_list->Periode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Periode" class="<?php echo $v202_jomutasihrn_list->Periode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v202_jomutasihrn_list->SortUrl($v202_jomutasihrn_list->Periode) ?>', 2);"><div id="elh_v202_jomutasihrn_Periode" class="v202_jomutasihrn_Periode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v202_jomutasihrn_list->Periode->caption() ?></span><span class="ew-table-header-sort"><?php if ($v202_jomutasihrn_list->Periode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v202_jomutasihrn_list->Periode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v202_jomutasihrn_list->NoJO->Visible) { // NoJO ?>
	<?php if ($v202_jomutasihrn_list->SortUrl($v202_jomutasihrn_list->NoJO) == "") { ?>
		<th data-name="NoJO" class="<?php echo $v202_jomutasihrn_list->NoJO->headerCellClass() ?>"><div id="elh_v202_jomutasihrn_NoJO" class="v202_jomutasihrn_NoJO"><div class="ew-table-header-caption"><?php echo $v202_jomutasihrn_list->NoJO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoJO" class="<?php echo $v202_jomutasihrn_list->NoJO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v202_jomutasihrn_list->SortUrl($v202_jomutasihrn_list->NoJO) ?>', 2);"><div id="elh_v202_jomutasihrn_NoJO" class="v202_jomutasihrn_NoJO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v202_jomutasihrn_list->NoJO->caption() ?></span><span class="ew-table-header-sort"><?php if ($v202_jomutasihrn_list->NoJO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v202_jomutasihrn_list->NoJO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v202_jomutasihrn_list->NoKolom->Visible) { // NoKolom ?>
	<?php if ($v202_jomutasihrn_list->SortUrl($v202_jomutasihrn_list->NoKolom) == "") { ?>
		<th data-name="NoKolom" class="<?php echo $v202_jomutasihrn_list->NoKolom->headerCellClass() ?>"><div id="elh_v202_jomutasihrn_NoKolom" class="v202_jomutasihrn_NoKolom"><div class="ew-table-header-caption"><?php echo $v202_jomutasihrn_list->NoKolom->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoKolom" class="<?php echo $v202_jomutasihrn_list->NoKolom->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v202_jomutasihrn_list->SortUrl($v202_jomutasihrn_list->NoKolom) ?>', 2);"><div id="elh_v202_jomutasihrn_NoKolom" class="v202_jomutasihrn_NoKolom">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v202_jomutasihrn_list->NoKolom->caption() ?></span><span class="ew-table-header-sort"><?php if ($v202_jomutasihrn_list->NoKolom->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v202_jomutasihrn_list->NoKolom->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v202_jomutasihrn_list->total_masuk->Visible) { // total_masuk ?>
	<?php if ($v202_jomutasihrn_list->SortUrl($v202_jomutasihrn_list->total_masuk) == "") { ?>
		<th data-name="total_masuk" class="<?php echo $v202_jomutasihrn_list->total_masuk->headerCellClass() ?>"><div id="elh_v202_jomutasihrn_total_masuk" class="v202_jomutasihrn_total_masuk"><div class="ew-table-header-caption"><?php echo $v202_jomutasihrn_list->total_masuk->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total_masuk" class="<?php echo $v202_jomutasihrn_list->total_masuk->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v202_jomutasihrn_list->SortUrl($v202_jomutasihrn_list->total_masuk) ?>', 2);"><div id="elh_v202_jomutasihrn_total_masuk" class="v202_jomutasihrn_total_masuk">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v202_jomutasihrn_list->total_masuk->caption() ?></span><span class="ew-table-header-sort"><?php if ($v202_jomutasihrn_list->total_masuk->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v202_jomutasihrn_list->total_masuk->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v202_jomutasihrn_list->total_keluar->Visible) { // total_keluar ?>
	<?php if ($v202_jomutasihrn_list->SortUrl($v202_jomutasihrn_list->total_keluar) == "") { ?>
		<th data-name="total_keluar" class="<?php echo $v202_jomutasihrn_list->total_keluar->headerCellClass() ?>"><div id="elh_v202_jomutasihrn_total_keluar" class="v202_jomutasihrn_total_keluar"><div class="ew-table-header-caption"><?php echo $v202_jomutasihrn_list->total_keluar->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total_keluar" class="<?php echo $v202_jomutasihrn_list->total_keluar->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v202_jomutasihrn_list->SortUrl($v202_jomutasihrn_list->total_keluar) ?>', 2);"><div id="elh_v202_jomutasihrn_total_keluar" class="v202_jomutasihrn_total_keluar">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v202_jomutasihrn_list->total_keluar->caption() ?></span><span class="ew-table-header-sort"><?php if ($v202_jomutasihrn_list->total_keluar->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v202_jomutasihrn_list->total_keluar->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v202_jomutasihrn_list->Tagihan->Visible) { // Tagihan ?>
	<?php if ($v202_jomutasihrn_list->SortUrl($v202_jomutasihrn_list->Tagihan) == "") { ?>
		<th data-name="Tagihan" class="<?php echo $v202_jomutasihrn_list->Tagihan->headerCellClass() ?>"><div id="elh_v202_jomutasihrn_Tagihan" class="v202_jomutasihrn_Tagihan"><div class="ew-table-header-caption"><?php echo $v202_jomutasihrn_list->Tagihan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tagihan" class="<?php echo $v202_jomutasihrn_list->Tagihan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v202_jomutasihrn_list->SortUrl($v202_jomutasihrn_list->Tagihan) ?>', 2);"><div id="elh_v202_jomutasihrn_Tagihan" class="v202_jomutasihrn_Tagihan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v202_jomutasihrn_list->Tagihan->caption() ?></span><span class="ew-table-header-sort"><?php if ($v202_jomutasihrn_list->Tagihan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v202_jomutasihrn_list->Tagihan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v202_jomutasihrn_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($v202_jomutasihrn_list->ExportAll && $v202_jomutasihrn_list->isExport()) {
	$v202_jomutasihrn_list->StopRecord = $v202_jomutasihrn_list->TotalRecords;
} else {

	// Set the last record to display
	if ($v202_jomutasihrn_list->TotalRecords > $v202_jomutasihrn_list->StartRecord + $v202_jomutasihrn_list->DisplayRecords - 1)
		$v202_jomutasihrn_list->StopRecord = $v202_jomutasihrn_list->StartRecord + $v202_jomutasihrn_list->DisplayRecords - 1;
	else
		$v202_jomutasihrn_list->StopRecord = $v202_jomutasihrn_list->TotalRecords;
}
$v202_jomutasihrn_list->RecordCount = $v202_jomutasihrn_list->StartRecord - 1;
if ($v202_jomutasihrn_list->Recordset && !$v202_jomutasihrn_list->Recordset->EOF) {
	$v202_jomutasihrn_list->Recordset->moveFirst();
	$selectLimit = $v202_jomutasihrn_list->UseSelectLimit;
	if (!$selectLimit && $v202_jomutasihrn_list->StartRecord > 1)
		$v202_jomutasihrn_list->Recordset->move($v202_jomutasihrn_list->StartRecord - 1);
} elseif (!$v202_jomutasihrn->AllowAddDeleteRow && $v202_jomutasihrn_list->StopRecord == 0) {
	$v202_jomutasihrn_list->StopRecord = $v202_jomutasihrn->GridAddRowCount;
}

// Initialize aggregate
$v202_jomutasihrn->RowType = ROWTYPE_AGGREGATEINIT;
$v202_jomutasihrn->resetAttributes();
$v202_jomutasihrn_list->renderRow();
while ($v202_jomutasihrn_list->RecordCount < $v202_jomutasihrn_list->StopRecord) {
	$v202_jomutasihrn_list->RecordCount++;
	if ($v202_jomutasihrn_list->RecordCount >= $v202_jomutasihrn_list->StartRecord) {
		$v202_jomutasihrn_list->RowCount++;

		// Set up key count
		$v202_jomutasihrn_list->KeyCount = $v202_jomutasihrn_list->RowIndex;

		// Init row class and style
		$v202_jomutasihrn->resetAttributes();
		$v202_jomutasihrn->CssClass = "";
		if ($v202_jomutasihrn_list->isGridAdd()) {
		} else {
			$v202_jomutasihrn_list->loadRowValues($v202_jomutasihrn_list->Recordset); // Load row values
		}
		$v202_jomutasihrn->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$v202_jomutasihrn->RowAttrs->merge(["data-rowindex" => $v202_jomutasihrn_list->RowCount, "id" => "r" . $v202_jomutasihrn_list->RowCount . "_v202_jomutasihrn", "data-rowtype" => $v202_jomutasihrn->RowType]);

		// Render row
		$v202_jomutasihrn_list->renderRow();

		// Render list options
		$v202_jomutasihrn_list->renderListOptions();
?>
	<tr <?php echo $v202_jomutasihrn->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v202_jomutasihrn_list->ListOptions->render("body", "left", $v202_jomutasihrn_list->RowCount);
?>
	<?php if ($v202_jomutasihrn_list->Periode->Visible) { // Periode ?>
		<td data-name="Periode" <?php echo $v202_jomutasihrn_list->Periode->cellAttributes() ?>>
<span id="el<?php echo $v202_jomutasihrn_list->RowCount ?>_v202_jomutasihrn_Periode">
<span<?php echo $v202_jomutasihrn_list->Periode->viewAttributes() ?>><?php echo $v202_jomutasihrn_list->Periode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v202_jomutasihrn_list->NoJO->Visible) { // NoJO ?>
		<td data-name="NoJO" <?php echo $v202_jomutasihrn_list->NoJO->cellAttributes() ?>>
<span id="el<?php echo $v202_jomutasihrn_list->RowCount ?>_v202_jomutasihrn_NoJO">
<span<?php echo $v202_jomutasihrn_list->NoJO->viewAttributes() ?>><?php echo $v202_jomutasihrn_list->NoJO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v202_jomutasihrn_list->NoKolom->Visible) { // NoKolom ?>
		<td data-name="NoKolom" <?php echo $v202_jomutasihrn_list->NoKolom->cellAttributes() ?>>
<span id="el<?php echo $v202_jomutasihrn_list->RowCount ?>_v202_jomutasihrn_NoKolom">
<span<?php echo $v202_jomutasihrn_list->NoKolom->viewAttributes() ?>><?php echo $v202_jomutasihrn_list->NoKolom->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v202_jomutasihrn_list->total_masuk->Visible) { // total_masuk ?>
		<td data-name="total_masuk" <?php echo $v202_jomutasihrn_list->total_masuk->cellAttributes() ?>>
<span id="el<?php echo $v202_jomutasihrn_list->RowCount ?>_v202_jomutasihrn_total_masuk">
<span<?php echo $v202_jomutasihrn_list->total_masuk->viewAttributes() ?>><?php echo $v202_jomutasihrn_list->total_masuk->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v202_jomutasihrn_list->total_keluar->Visible) { // total_keluar ?>
		<td data-name="total_keluar" <?php echo $v202_jomutasihrn_list->total_keluar->cellAttributes() ?>>
<span id="el<?php echo $v202_jomutasihrn_list->RowCount ?>_v202_jomutasihrn_total_keluar">
<span<?php echo $v202_jomutasihrn_list->total_keluar->viewAttributes() ?>><?php echo $v202_jomutasihrn_list->total_keluar->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v202_jomutasihrn_list->Tagihan->Visible) { // Tagihan ?>
		<td data-name="Tagihan" <?php echo $v202_jomutasihrn_list->Tagihan->cellAttributes() ?>>
<span id="el<?php echo $v202_jomutasihrn_list->RowCount ?>_v202_jomutasihrn_Tagihan">
<span<?php echo $v202_jomutasihrn_list->Tagihan->viewAttributes() ?>><?php echo $v202_jomutasihrn_list->Tagihan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v202_jomutasihrn_list->ListOptions->render("body", "right", $v202_jomutasihrn_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$v202_jomutasihrn_list->isGridAdd())
		$v202_jomutasihrn_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$v202_jomutasihrn->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($v202_jomutasihrn_list->Recordset)
	$v202_jomutasihrn_list->Recordset->Close();
?>
<?php if (!$v202_jomutasihrn_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$v202_jomutasihrn_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v202_jomutasihrn_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v202_jomutasihrn_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($v202_jomutasihrn_list->TotalRecords == 0 && !$v202_jomutasihrn->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $v202_jomutasihrn_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$v202_jomutasihrn_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$v202_jomutasihrn_list->isExport()) { ?>
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
$v202_jomutasihrn_list->terminate();
?>