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
$r201_mutasi_summary = new r201_mutasi_summary();

// Run the page
$r201_mutasi_summary->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$r201_mutasi_summary->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "header.php"; ?>
<?php } ?>
<?php if (!$r201_mutasi_summary->isExport() && !$r201_mutasi_summary->DrillDown && !$DashboardReport) { ?>
<script>
var fsummary, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	fsummary = currentForm = new ew.Form("fsummary", "summary");
	currentPageID = ew.PAGE_ID = "summary";

	// Validate function for search
	fsummary.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_tanggal");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($r201_mutasi_summary->tanggal->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fsummary.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fsummary.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fsummary.lists["x_jo_id"] = <?php echo $r201_mutasi_summary->jo_id->Lookup->toClientList($r201_mutasi_summary) ?>;
	fsummary.lists["x_jo_id"].options = <?php echo JsonEncode($r201_mutasi_summary->jo_id->lookupOptions()) ?>;
	fsummary.lists["x_jenis_id"] = <?php echo $r201_mutasi_summary->jenis_id->Lookup->toClientList($r201_mutasi_summary) ?>;
	fsummary.lists["x_jenis_id"].options = <?php echo JsonEncode($r201_mutasi_summary->jenis_id->lookupOptions()) ?>;

	// Filters
	fsummary.filterList = <?php echo $r201_mutasi_summary->getFilterList() ?>;
	loadjs.done("fsummary");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<a id="top"></a>
<?php if ((!$r201_mutasi_summary->isExport() || $r201_mutasi_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-report" class="ew-report container-fluid">
<?php } ?>
<?php if ($r201_mutasi_summary->ShowCurrentFilter) { ?>
<?php $r201_mutasi_summary->showFilterList() ?>
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$r201_mutasi_summary->DrillDownInPanel) {
	$r201_mutasi_summary->ExportOptions->render("body");
	$r201_mutasi_summary->SearchOptions->render("body");
	$r201_mutasi_summary->FilterOptions->render("body");
}
?>
</div>
<?php $r201_mutasi_summary->showPageHeader(); ?>
<?php
$r201_mutasi_summary->showMessage();
?>
<?php if ((!$r201_mutasi_summary->isExport() || $r201_mutasi_summary->isExport("print")) && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ((!$r201_mutasi_summary->isExport() || $r201_mutasi_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Center Container -->
<div id="ew-center" class="<?php echo $r201_mutasi_summary->CenterContentClass ?>">
<?php } ?>
<!-- Summary report (begin) -->
<div id="report_summary">
<?php if (!$r201_mutasi_summary->isExport() && !$r201_mutasi_summary->DrillDown && !$DashboardReport) { ?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$r201_mutasi_summary->isExport() && !$r201_mutasi->CurrentAction) { ?>
<form name="fsummary" id="fsummary" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fsummary-search-panel" class="<?php echo $r201_mutasi_summary->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="r201_mutasi">
	<div class="ew-extended-search">
<?php

// Render search row
$r201_mutasi->RowType = ROWTYPE_SEARCH;
$r201_mutasi->resetAttributes();
$r201_mutasi_summary->renderRow();
?>
<?php if ($r201_mutasi_summary->tanggal->Visible) { // tanggal ?>
	<?php
		$r201_mutasi_summary->SearchColumnCount++;
		if (($r201_mutasi_summary->SearchColumnCount - 1) % $r201_mutasi_summary->SearchFieldsPerRow == 0) {
			$r201_mutasi_summary->SearchRowCount++;
	?>
<div id="xsr_<?php echo $r201_mutasi_summary->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_tanggal" class="ew-cell form-group">
		<label for="x_tanggal" class="ew-search-caption ew-label"><?php echo $r201_mutasi_summary->tanggal->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_tanggal" id="z_tanggal" value="BETWEEN">
</span>
		<span id="el_r201_mutasi_tanggal" class="ew-search-field">
<input type="text" data-table="r201_mutasi" data-field="x_tanggal" data-format="7" name="x_tanggal" id="x_tanggal" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($r201_mutasi_summary->tanggal->getPlaceHolder()) ?>" value="<?php echo $r201_mutasi_summary->tanggal->EditValue ?>"<?php echo $r201_mutasi_summary->tanggal->editAttributes() ?>>
<?php if (!$r201_mutasi_summary->tanggal->ReadOnly && !$r201_mutasi_summary->tanggal->Disabled && !isset($r201_mutasi_summary->tanggal->EditAttrs["readonly"]) && !isset($r201_mutasi_summary->tanggal->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fsummary", "datetimepicker"], function() {
	ew.createDateTimePicker("fsummary", "x_tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_r201_mutasi_tanggal" class="ew-search-field2">
<input type="text" data-table="r201_mutasi" data-field="x_tanggal" data-format="7" name="y_tanggal" id="y_tanggal" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($r201_mutasi_summary->tanggal->getPlaceHolder()) ?>" value="<?php echo $r201_mutasi_summary->tanggal->EditValue2 ?>"<?php echo $r201_mutasi_summary->tanggal->editAttributes() ?>>
<?php if (!$r201_mutasi_summary->tanggal->ReadOnly && !$r201_mutasi_summary->tanggal->Disabled && !isset($r201_mutasi_summary->tanggal->EditAttrs["readonly"]) && !isset($r201_mutasi_summary->tanggal->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fsummary", "datetimepicker"], function() {
	ew.createDateTimePicker("fsummary", "y_tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($r201_mutasi_summary->SearchColumnCount % $r201_mutasi_summary->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($r201_mutasi_summary->jo_id->Visible) { // jo_id ?>
	<?php
		$r201_mutasi_summary->SearchColumnCount++;
		if (($r201_mutasi_summary->SearchColumnCount - 1) % $r201_mutasi_summary->SearchFieldsPerRow == 0) {
			$r201_mutasi_summary->SearchRowCount++;
	?>
<div id="xsr_<?php echo $r201_mutasi_summary->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_jo_id" class="ew-cell form-group">
		<label for="x_jo_id" class="ew-search-caption ew-label"><?php echo $r201_mutasi_summary->jo_id->caption() ?></label>
		<span id="el_r201_mutasi_jo_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_jo_id"><?php echo EmptyValue(strval($r201_mutasi_summary->jo_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $r201_mutasi_summary->jo_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($r201_mutasi_summary->jo_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($r201_mutasi_summary->jo_id->ReadOnly || $r201_mutasi_summary->jo_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_jo_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $r201_mutasi_summary->jo_id->Lookup->getParamTag($r201_mutasi_summary, "p_x_jo_id") ?>
<input type="hidden" data-table="r201_mutasi" data-field="x_jo_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $r201_mutasi_summary->jo_id->displayValueSeparatorAttribute() ?>" name="x_jo_id" id="x_jo_id" value="<?php echo $r201_mutasi_summary->jo_id->AdvancedSearch->SearchValue ?>"<?php echo $r201_mutasi_summary->jo_id->editAttributes() ?>>
</span>
	</div>
	<?php if ($r201_mutasi_summary->SearchColumnCount % $r201_mutasi_summary->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($r201_mutasi_summary->jenis_id->Visible) { // jenis_id ?>
	<?php
		$r201_mutasi_summary->SearchColumnCount++;
		if (($r201_mutasi_summary->SearchColumnCount - 1) % $r201_mutasi_summary->SearchFieldsPerRow == 0) {
			$r201_mutasi_summary->SearchRowCount++;
	?>
<div id="xsr_<?php echo $r201_mutasi_summary->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_jenis_id" class="ew-cell form-group">
		<label for="x_jenis_id" class="ew-search-caption ew-label"><?php echo $r201_mutasi_summary->jenis_id->caption() ?></label>
		<span id="el_r201_mutasi_jenis_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_jenis_id"><?php echo EmptyValue(strval($r201_mutasi_summary->jenis_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $r201_mutasi_summary->jenis_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($r201_mutasi_summary->jenis_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($r201_mutasi_summary->jenis_id->ReadOnly || $r201_mutasi_summary->jenis_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_jenis_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $r201_mutasi_summary->jenis_id->Lookup->getParamTag($r201_mutasi_summary, "p_x_jenis_id") ?>
<input type="hidden" data-table="r201_mutasi" data-field="x_jenis_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $r201_mutasi_summary->jenis_id->displayValueSeparatorAttribute() ?>" name="x_jenis_id" id="x_jenis_id" value="<?php echo $r201_mutasi_summary->jenis_id->AdvancedSearch->SearchValue ?>"<?php echo $r201_mutasi_summary->jenis_id->editAttributes() ?>>
</span>
	</div>
	<?php if ($r201_mutasi_summary->SearchColumnCount % $r201_mutasi_summary->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($r201_mutasi_summary->SearchColumnCount % $r201_mutasi_summary->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $r201_mutasi_summary->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php } ?>
<?php
while ($r201_mutasi_summary->RecordCount < count($r201_mutasi_summary->DetailRecords) && $r201_mutasi_summary->RecordCount < $r201_mutasi_summary->DisplayGroups) {
?>
<?php

	// Show header
	if ($r201_mutasi_summary->ShowHeader) {
?>
<div class="<?php if (!$r201_mutasi_summary->isExport("word") && !$r201_mutasi_summary->isExport("excel")) { ?>card ew-card <?php } ?>ew-grid"<?php echo $r201_mutasi_summary->ReportTableStyle ?>>
<?php if (!$r201_mutasi_summary->isExport() && !($r201_mutasi_summary->DrillDown && $r201_mutasi_summary->TotalGroups > 0)) { ?>
<!-- Top pager -->
<div class="card-header ew-grid-upper-panel">
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $r201_mutasi_summary->Pager->render() ?>
</form>
<div class="clearfix"></div>
</div>
<?php } ?>
<!-- Report grid (begin) -->
<div id="gmp_r201_mutasi" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="<?php echo $r201_mutasi_summary->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($r201_mutasi_summary->tanggal->Visible) { ?>
	<?php if ($r201_mutasi_summary->sortUrl($r201_mutasi_summary->tanggal) == "") { ?>
	<th data-name="tanggal" class="<?php echo $r201_mutasi_summary->tanggal->headerCellClass() ?>"><div class="r201_mutasi_tanggal"><div class="ew-table-header-caption"><?php echo $r201_mutasi_summary->tanggal->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="tanggal" class="<?php echo $r201_mutasi_summary->tanggal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r201_mutasi_summary->sortUrl($r201_mutasi_summary->tanggal) ?>', 2);"><div class="r201_mutasi_tanggal">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r201_mutasi_summary->tanggal->caption() ?></span><span class="ew-table-header-sort"><?php if ($r201_mutasi_summary->tanggal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r201_mutasi_summary->tanggal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r201_mutasi_summary->nourut->Visible) { ?>
	<?php if ($r201_mutasi_summary->sortUrl($r201_mutasi_summary->nourut) == "") { ?>
	<th data-name="nourut" class="<?php echo $r201_mutasi_summary->nourut->headerCellClass() ?>"><div class="r201_mutasi_nourut"><div class="ew-table-header-caption"><?php echo $r201_mutasi_summary->nourut->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="nourut" class="<?php echo $r201_mutasi_summary->nourut->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r201_mutasi_summary->sortUrl($r201_mutasi_summary->nourut) ?>', 2);"><div class="r201_mutasi_nourut">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r201_mutasi_summary->nourut->caption() ?></span><span class="ew-table-header-sort"><?php if ($r201_mutasi_summary->nourut->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r201_mutasi_summary->nourut->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r201_mutasi_summary->jo_id->Visible) { ?>
	<?php if ($r201_mutasi_summary->sortUrl($r201_mutasi_summary->jo_id) == "") { ?>
	<th data-name="jo_id" class="<?php echo $r201_mutasi_summary->jo_id->headerCellClass() ?>"><div class="r201_mutasi_jo_id"><div class="ew-table-header-caption"><?php echo $r201_mutasi_summary->jo_id->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="jo_id" class="<?php echo $r201_mutasi_summary->jo_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r201_mutasi_summary->sortUrl($r201_mutasi_summary->jo_id) ?>', 2);"><div class="r201_mutasi_jo_id">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r201_mutasi_summary->jo_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($r201_mutasi_summary->jo_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r201_mutasi_summary->jo_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r201_mutasi_summary->jenis_id->Visible) { ?>
	<?php if ($r201_mutasi_summary->sortUrl($r201_mutasi_summary->jenis_id) == "") { ?>
	<th data-name="jenis_id" class="<?php echo $r201_mutasi_summary->jenis_id->headerCellClass() ?>"><div class="r201_mutasi_jenis_id"><div class="ew-table-header-caption"><?php echo $r201_mutasi_summary->jenis_id->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="jenis_id" class="<?php echo $r201_mutasi_summary->jenis_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r201_mutasi_summary->sortUrl($r201_mutasi_summary->jenis_id) ?>', 2);"><div class="r201_mutasi_jenis_id">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r201_mutasi_summary->jenis_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($r201_mutasi_summary->jenis_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r201_mutasi_summary->jenis_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r201_mutasi_summary->comment->Visible) { ?>
	<?php if ($r201_mutasi_summary->sortUrl($r201_mutasi_summary->comment) == "") { ?>
	<th data-name="comment" class="<?php echo $r201_mutasi_summary->comment->headerCellClass() ?>"><div class="r201_mutasi_comment"><div class="ew-table-header-caption"><?php echo $r201_mutasi_summary->comment->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="comment" class="<?php echo $r201_mutasi_summary->comment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r201_mutasi_summary->sortUrl($r201_mutasi_summary->comment) ?>', 2);"><div class="r201_mutasi_comment">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r201_mutasi_summary->comment->caption() ?></span><span class="ew-table-header-sort"><?php if ($r201_mutasi_summary->comment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r201_mutasi_summary->comment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r201_mutasi_summary->masuk->Visible) { ?>
	<?php if ($r201_mutasi_summary->sortUrl($r201_mutasi_summary->masuk) == "") { ?>
	<th data-name="masuk" class="<?php echo $r201_mutasi_summary->masuk->headerCellClass() ?>"><div class="r201_mutasi_masuk"><div class="ew-table-header-caption"><?php echo $r201_mutasi_summary->masuk->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="masuk" class="<?php echo $r201_mutasi_summary->masuk->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r201_mutasi_summary->sortUrl($r201_mutasi_summary->masuk) ?>', 2);"><div class="r201_mutasi_masuk">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r201_mutasi_summary->masuk->caption() ?></span><span class="ew-table-header-sort"><?php if ($r201_mutasi_summary->masuk->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r201_mutasi_summary->masuk->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r201_mutasi_summary->keluar->Visible) { ?>
	<?php if ($r201_mutasi_summary->sortUrl($r201_mutasi_summary->keluar) == "") { ?>
	<th data-name="keluar" class="<?php echo $r201_mutasi_summary->keluar->headerCellClass() ?>"><div class="r201_mutasi_keluar"><div class="ew-table-header-caption"><?php echo $r201_mutasi_summary->keluar->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="keluar" class="<?php echo $r201_mutasi_summary->keluar->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r201_mutasi_summary->sortUrl($r201_mutasi_summary->keluar) ?>', 2);"><div class="r201_mutasi_keluar">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r201_mutasi_summary->keluar->caption() ?></span><span class="ew-table-header-sort"><?php if ($r201_mutasi_summary->keluar->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r201_mutasi_summary->keluar->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r201_mutasi_summary->selisih->Visible) { ?>
	<?php if ($r201_mutasi_summary->sortUrl($r201_mutasi_summary->selisih) == "") { ?>
	<th data-name="selisih" class="<?php echo $r201_mutasi_summary->selisih->headerCellClass() ?>"><div class="r201_mutasi_selisih"><div class="ew-table-header-caption"><?php echo $r201_mutasi_summary->selisih->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="selisih" class="<?php echo $r201_mutasi_summary->selisih->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r201_mutasi_summary->sortUrl($r201_mutasi_summary->selisih) ?>', 2);"><div class="r201_mutasi_selisih">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r201_mutasi_summary->selisih->caption() ?></span><span class="ew-table-header-sort"><?php if ($r201_mutasi_summary->selisih->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r201_mutasi_summary->selisih->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r201_mutasi_summary->mutasi->Visible) { ?>
	<?php if ($r201_mutasi_summary->sortUrl($r201_mutasi_summary->mutasi) == "") { ?>
	<th data-name="mutasi" class="<?php echo $r201_mutasi_summary->mutasi->headerCellClass() ?>"><div class="r201_mutasi_mutasi"><div class="ew-table-header-caption"><?php echo $r201_mutasi_summary->mutasi->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="mutasi" class="<?php echo $r201_mutasi_summary->mutasi->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r201_mutasi_summary->sortUrl($r201_mutasi_summary->mutasi) ?>', 2);"><div class="r201_mutasi_mutasi">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r201_mutasi_summary->mutasi->caption() ?></span><span class="ew-table-header-sort"><?php if ($r201_mutasi_summary->mutasi->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r201_mutasi_summary->mutasi->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
	</tr>
</thead>
<tbody>
<?php
		if ($r201_mutasi_summary->TotalGroups == 0)
			break; // Show header only
		$r201_mutasi_summary->ShowHeader = FALSE;
	} // End show header
?>
<?php
	$r201_mutasi_summary->loadRowValues($r201_mutasi_summary->DetailRecords[$r201_mutasi_summary->RecordCount]);
	$r201_mutasi_summary->RecordCount++;
	$r201_mutasi_summary->RecordIndex++;
?>
<?php

		// Render detail row
		$r201_mutasi_summary->resetAttributes();
		$r201_mutasi_summary->RowType = ROWTYPE_DETAIL;
		$r201_mutasi_summary->renderRow();
?>
	<tr<?php echo $r201_mutasi_summary->rowAttributes(); ?>>
<?php if ($r201_mutasi_summary->tanggal->Visible) { ?>
		<td data-field="tanggal"<?php echo $r201_mutasi_summary->tanggal->cellAttributes() ?>>
<span<?php echo $r201_mutasi_summary->tanggal->viewAttributes() ?>><?php echo $r201_mutasi_summary->tanggal->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r201_mutasi_summary->nourut->Visible) { ?>
		<td data-field="nourut"<?php echo $r201_mutasi_summary->nourut->cellAttributes() ?>>
<span<?php echo $r201_mutasi_summary->nourut->viewAttributes() ?>><?php echo $r201_mutasi_summary->nourut->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r201_mutasi_summary->jo_id->Visible) { ?>
		<td data-field="jo_id"<?php echo $r201_mutasi_summary->jo_id->cellAttributes() ?>>
<span<?php echo $r201_mutasi_summary->jo_id->viewAttributes() ?>><?php echo $r201_mutasi_summary->jo_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r201_mutasi_summary->jenis_id->Visible) { ?>
		<td data-field="jenis_id"<?php echo $r201_mutasi_summary->jenis_id->cellAttributes() ?>>
<span<?php echo $r201_mutasi_summary->jenis_id->viewAttributes() ?>><?php echo $r201_mutasi_summary->jenis_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r201_mutasi_summary->comment->Visible) { ?>
		<td data-field="comment"<?php echo $r201_mutasi_summary->comment->cellAttributes() ?>>
<span<?php echo $r201_mutasi_summary->comment->viewAttributes() ?>><?php echo $r201_mutasi_summary->comment->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r201_mutasi_summary->masuk->Visible) { ?>
		<td data-field="masuk"<?php echo $r201_mutasi_summary->masuk->cellAttributes() ?>>
<span<?php echo $r201_mutasi_summary->masuk->viewAttributes() ?>><?php echo $r201_mutasi_summary->masuk->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r201_mutasi_summary->keluar->Visible) { ?>
		<td data-field="keluar"<?php echo $r201_mutasi_summary->keluar->cellAttributes() ?>>
<span<?php echo $r201_mutasi_summary->keluar->viewAttributes() ?>><?php echo $r201_mutasi_summary->keluar->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r201_mutasi_summary->selisih->Visible) { ?>
		<td data-field="selisih"<?php echo $r201_mutasi_summary->selisih->cellAttributes() ?>>
<span<?php echo $r201_mutasi_summary->selisih->viewAttributes() ?>><?php echo $r201_mutasi_summary->selisih->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r201_mutasi_summary->mutasi->Visible) { ?>
		<td data-field="mutasi"<?php echo $r201_mutasi_summary->mutasi->cellAttributes() ?>>
<span<?php echo $r201_mutasi_summary->mutasi->viewAttributes() ?>><?php echo $r201_mutasi_summary->mutasi->getViewValue() ?></span>
</td>
<?php } ?>
	</tr>
<?php
} // End while
?>
<?php if ($r201_mutasi_summary->TotalGroups > 0) { ?>
</tbody>
<tfoot>
<?php
	$r201_mutasi_summary->resetAttributes();
	$r201_mutasi_summary->RowType = ROWTYPE_TOTAL;
	$r201_mutasi_summary->RowTotalType = ROWTOTAL_GRAND;
	$r201_mutasi_summary->RowTotalSubType = ROWTOTAL_FOOTER;
	$r201_mutasi_summary->RowAttrs["class"] = "ew-rpt-grand-summary";
	$r201_mutasi_summary->renderRow();
?>
<?php if ($r201_mutasi_summary->ShowCompactSummaryFooter) { ?>
	<tr<?php echo $r201_mutasi_summary->rowAttributes() ?>><td colspan="<?php echo ($r201_mutasi_summary->GroupColumnCount + $r201_mutasi_summary->DetailColumnCount) ?>"><?php echo $Language->phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $Language->phrase("RptCnt") ?></span><?php echo $Language->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($r201_mutasi_summary->TotalCount, 0); ?></span>)</span></td></tr>
	<tr<?php echo $r201_mutasi_summary->rowAttributes() ?>>
<?php if ($r201_mutasi_summary->GroupColumnCount > 0) { ?>
		<td colspan="<?php echo $r201_mutasi_summary->GroupColumnCount ?>" class="ew-rpt-grp-aggregate">&nbsp;</td>
<?php } ?>
<?php if ($r201_mutasi_summary->tanggal->Visible) { ?>
		<td data-field="tanggal"<?php echo $r201_mutasi_summary->tanggal->cellAttributes() ?>></td>
<?php } ?>
<?php if ($r201_mutasi_summary->nourut->Visible) { ?>
		<td data-field="nourut"<?php echo $r201_mutasi_summary->nourut->cellAttributes() ?>></td>
<?php } ?>
<?php if ($r201_mutasi_summary->jo_id->Visible) { ?>
		<td data-field="jo_id"<?php echo $r201_mutasi_summary->jo_id->cellAttributes() ?>></td>
<?php } ?>
<?php if ($r201_mutasi_summary->jenis_id->Visible) { ?>
		<td data-field="jenis_id"<?php echo $r201_mutasi_summary->jenis_id->cellAttributes() ?>></td>
<?php } ?>
<?php if ($r201_mutasi_summary->comment->Visible) { ?>
		<td data-field="comment"<?php echo $r201_mutasi_summary->comment->cellAttributes() ?>></td>
<?php } ?>
<?php if ($r201_mutasi_summary->masuk->Visible) { ?>
		<td data-field="masuk"<?php echo $r201_mutasi_summary->masuk->cellAttributes() ?>><span class="ew-aggregate-caption"><?php echo $Language->phrase("RptSum") ?></span><?php echo $Language->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><span<?php echo $r201_mutasi_summary->masuk->viewAttributes() ?>><?php echo $r201_mutasi_summary->masuk->SumViewValue ?></span></span></td>
<?php } ?>
<?php if ($r201_mutasi_summary->keluar->Visible) { ?>
		<td data-field="keluar"<?php echo $r201_mutasi_summary->keluar->cellAttributes() ?>><span class="ew-aggregate-caption"><?php echo $Language->phrase("RptSum") ?></span><?php echo $Language->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><span<?php echo $r201_mutasi_summary->keluar->viewAttributes() ?>><?php echo $r201_mutasi_summary->keluar->SumViewValue ?></span></span></td>
<?php } ?>
<?php if ($r201_mutasi_summary->selisih->Visible) { ?>
		<td data-field="selisih"<?php echo $r201_mutasi_summary->selisih->cellAttributes() ?>><span class="ew-aggregate-caption"><?php echo $Language->phrase("RptSum") ?></span><?php echo $Language->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><span<?php echo $r201_mutasi_summary->selisih->viewAttributes() ?>><?php echo $r201_mutasi_summary->selisih->SumViewValue ?></span></span></td>
<?php } ?>
<?php if ($r201_mutasi_summary->mutasi->Visible) { ?>
		<td data-field="mutasi"<?php echo $r201_mutasi_summary->mutasi->cellAttributes() ?>></td>
<?php } ?>
	</tr>
<?php } else { ?>
	<tr<?php echo $r201_mutasi_summary->rowAttributes() ?>><td colspan="<?php echo ($r201_mutasi_summary->GroupColumnCount + $r201_mutasi_summary->DetailColumnCount) ?>"><?php echo $Language->phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<?php echo FormatNumber($r201_mutasi_summary->TotalCount, 0); ?><?php echo $Language->phrase("RptDtlRec") ?>)</span></td></tr>
	<tr<?php echo $r201_mutasi_summary->rowAttributes() ?>>
<?php if ($r201_mutasi_summary->tanggal->Visible) { ?>
		<td data-field="tanggal"<?php echo $r201_mutasi_summary->tanggal->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($r201_mutasi_summary->nourut->Visible) { ?>
		<td data-field="nourut"<?php echo $r201_mutasi_summary->nourut->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($r201_mutasi_summary->jo_id->Visible) { ?>
		<td data-field="jo_id"<?php echo $r201_mutasi_summary->jo_id->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($r201_mutasi_summary->jenis_id->Visible) { ?>
		<td data-field="jenis_id"<?php echo $r201_mutasi_summary->jenis_id->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($r201_mutasi_summary->comment->Visible) { ?>
		<td data-field="comment"<?php echo $r201_mutasi_summary->comment->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($r201_mutasi_summary->masuk->Visible) { ?>
		<td data-field="masuk"<?php echo $r201_mutasi_summary->masuk->cellAttributes() ?>><span class="ew-aggregate"><?php echo $Language->phrase("RptSum") ?></span><?php echo $Language->phrase("AggregateColon") ?>
<span<?php echo $r201_mutasi_summary->masuk->viewAttributes() ?>><?php echo $r201_mutasi_summary->masuk->SumViewValue ?></span>
</td>
<?php } ?>
<?php if ($r201_mutasi_summary->keluar->Visible) { ?>
		<td data-field="keluar"<?php echo $r201_mutasi_summary->keluar->cellAttributes() ?>><span class="ew-aggregate"><?php echo $Language->phrase("RptSum") ?></span><?php echo $Language->phrase("AggregateColon") ?>
<span<?php echo $r201_mutasi_summary->keluar->viewAttributes() ?>><?php echo $r201_mutasi_summary->keluar->SumViewValue ?></span>
</td>
<?php } ?>
<?php if ($r201_mutasi_summary->selisih->Visible) { ?>
		<td data-field="selisih"<?php echo $r201_mutasi_summary->selisih->cellAttributes() ?>><span class="ew-aggregate"><?php echo $Language->phrase("RptSum") ?></span><?php echo $Language->phrase("AggregateColon") ?>
<span<?php echo $r201_mutasi_summary->selisih->viewAttributes() ?>><?php echo $r201_mutasi_summary->selisih->SumViewValue ?></span>
</td>
<?php } ?>
<?php if ($r201_mutasi_summary->mutasi->Visible) { ?>
		<td data-field="mutasi"<?php echo $r201_mutasi_summary->mutasi->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
	</tr>
<?php } ?>
</tfoot>
</table>
</div>
<!-- /.ew-grid-middle-panel -->
<!-- Report grid (end) -->
<?php if ($r201_mutasi_summary->TotalGroups > 0) { ?>
<?php if (!$r201_mutasi_summary->isExport() && !($r201_mutasi_summary->DrillDown && $r201_mutasi_summary->TotalGroups > 0)) { ?>
<!-- Bottom pager -->
<div class="card-footer ew-grid-lower-panel">
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $r201_mutasi_summary->Pager->render() ?>
</form>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php } ?>
</div>
<!-- /.ew-grid -->
<?php } ?>
</div>
<!-- /#report-summary -->
<!-- Summary report (end) -->
<?php if ((!$r201_mutasi_summary->isExport() || $r201_mutasi_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ((!$r201_mutasi_summary->isExport() || $r201_mutasi_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ((!$r201_mutasi_summary->isExport() || $r201_mutasi_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.ew-report -->
<?php } ?>
<?php
$r201_mutasi_summary->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$r201_mutasi_summary->isExport() && !$r201_mutasi_summary->DrillDown && !$DashboardReport) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php if (!$DashboardReport) { ?>
<?php include_once "footer.php"; ?>
<?php } ?>
<?php
$r201_mutasi_summary->terminate();
?>