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
$t001_jo_list = new t001_jo_list();

// Run the page
$t001_jo_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_jo_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t001_jo_list->isExport()) { ?>
<script>
var ft001_jolist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft001_jolist = currentForm = new ew.Form("ft001_jolist", "list");
	ft001_jolist.formKeyCountName = '<?php echo $t001_jo_list->FormKeyCountName ?>';

	// Validate form
	ft001_jolist.validate = function() {
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
			<?php if ($t001_jo_list->NoJO->Required) { ?>
				elm = this.getElements("x" + infix + "_NoJO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_list->NoJO->caption(), $t001_jo_list->NoJO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_list->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_list->Status->caption(), $t001_jo_list->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_list->Tagihan->Required) { ?>
				elm = this.getElements("x" + infix + "_Tagihan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_list->Tagihan->caption(), $t001_jo_list->Tagihan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Tagihan");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t001_jo_list->Tagihan->errorMessage()) ?>");
			<?php if ($t001_jo_list->Shipper->Required) { ?>
				elm = this.getElements("x" + infix + "_Shipper");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_list->Shipper->caption(), $t001_jo_list->Shipper->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_list->Qty->Required) { ?>
				elm = this.getElements("x" + infix + "_Qty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_list->Qty->caption(), $t001_jo_list->Qty->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_list->Cont->Required) { ?>
				elm = this.getElements("x" + infix + "_Cont");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_list->Cont->caption(), $t001_jo_list->Cont->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_list->BM->Required) { ?>
				elm = this.getElements("x" + infix + "_BM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_list->BM->caption(), $t001_jo_list->BM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_list->Tujuan->Required) { ?>
				elm = this.getElements("x" + infix + "_Tujuan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_list->Tujuan->caption(), $t001_jo_list->Tujuan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_list->Kapal->Required) { ?>
				elm = this.getElements("x" + infix + "_Kapal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_list->Kapal->caption(), $t001_jo_list->Kapal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_list->Doc->Required) { ?>
				felm = this.getElements("x" + infix + "_Doc");
				elm = this.getElements("fn_x" + infix + "_Doc");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $t001_jo_list->Doc->caption(), $t001_jo_list->Doc->RequiredErrorMessage)) ?>");
			<?php } ?>

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
	ft001_jolist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "NoJO", false)) return false;
		if (ew.valueChanged(fobj, infix, "Status", false)) return false;
		if (ew.valueChanged(fobj, infix, "Tagihan", false)) return false;
		if (ew.valueChanged(fobj, infix, "Shipper", false)) return false;
		if (ew.valueChanged(fobj, infix, "Qty", false)) return false;
		if (ew.valueChanged(fobj, infix, "Cont", false)) return false;
		if (ew.valueChanged(fobj, infix, "BM", false)) return false;
		if (ew.valueChanged(fobj, infix, "Tujuan", false)) return false;
		if (ew.valueChanged(fobj, infix, "Kapal", false)) return false;
		if (ew.valueChanged(fobj, infix, "Doc", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft001_jolist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft001_jolist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft001_jolist.lists["x_Status"] = <?php echo $t001_jo_list->Status->Lookup->toClientList($t001_jo_list) ?>;
	ft001_jolist.lists["x_Status"].options = <?php echo JsonEncode($t001_jo_list->Status->options(FALSE, TRUE)) ?>;
	ft001_jolist.lists["x_BM"] = <?php echo $t001_jo_list->BM->Lookup->toClientList($t001_jo_list) ?>;
	ft001_jolist.lists["x_BM"].options = <?php echo JsonEncode($t001_jo_list->BM->options(FALSE, TRUE)) ?>;
	loadjs.done("ft001_jolist");
});
var ft001_jolistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft001_jolistsrch = currentSearchForm = new ew.Form("ft001_jolistsrch");

	// Dynamic selection lists
	// Filters

	ft001_jolistsrch.filterList = <?php echo $t001_jo_list->getFilterList() ?>;
	loadjs.done("ft001_jolistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t001_jo_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t001_jo_list->TotalRecords > 0 && $t001_jo_list->ExportOptions->visible()) { ?>
<?php $t001_jo_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t001_jo_list->ImportOptions->visible()) { ?>
<?php $t001_jo_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t001_jo_list->SearchOptions->visible()) { ?>
<?php $t001_jo_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t001_jo_list->FilterOptions->visible()) { ?>
<?php $t001_jo_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t001_jo_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t001_jo_list->isExport() && !$t001_jo->CurrentAction) { ?>
<form name="ft001_jolistsrch" id="ft001_jolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft001_jolistsrch-search-panel" class="<?php echo $t001_jo_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t001_jo">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t001_jo_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t001_jo_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t001_jo_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t001_jo_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t001_jo_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t001_jo_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t001_jo_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t001_jo_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $t001_jo_list->showPageHeader(); ?>
<?php
$t001_jo_list->showMessage();
?>
<?php if ($t001_jo_list->TotalRecords > 0 || $t001_jo->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t001_jo_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t001_jo">
<?php if (!$t001_jo_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$t001_jo_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t001_jo_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t001_jo_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ft001_jolist" id="ft001_jolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_jo">
<div id="gmp_t001_jo" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t001_jo_list->TotalRecords > 0 || $t001_jo_list->isAdd() || $t001_jo_list->isCopy() || $t001_jo_list->isGridEdit()) { ?>
<table id="tbl_t001_jolist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t001_jo->RowType = ROWTYPE_HEADER;

// Render list options
$t001_jo_list->renderListOptions();

// Render list options (header, left)
$t001_jo_list->ListOptions->render("header", "left");
?>
<?php if ($t001_jo_list->NoJO->Visible) { // NoJO ?>
	<?php if ($t001_jo_list->SortUrl($t001_jo_list->NoJO) == "") { ?>
		<th data-name="NoJO" class="<?php echo $t001_jo_list->NoJO->headerCellClass() ?>"><div id="elh_t001_jo_NoJO" class="t001_jo_NoJO"><div class="ew-table-header-caption"><?php echo $t001_jo_list->NoJO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoJO" class="<?php echo $t001_jo_list->NoJO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t001_jo_list->SortUrl($t001_jo_list->NoJO) ?>', 2);"><div id="elh_t001_jo_NoJO" class="t001_jo_NoJO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t001_jo_list->NoJO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t001_jo_list->NoJO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t001_jo_list->NoJO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t001_jo_list->Status->Visible) { // Status ?>
	<?php if ($t001_jo_list->SortUrl($t001_jo_list->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $t001_jo_list->Status->headerCellClass() ?>"><div id="elh_t001_jo_Status" class="t001_jo_Status"><div class="ew-table-header-caption"><?php echo $t001_jo_list->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $t001_jo_list->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t001_jo_list->SortUrl($t001_jo_list->Status) ?>', 2);"><div id="elh_t001_jo_Status" class="t001_jo_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t001_jo_list->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($t001_jo_list->Status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t001_jo_list->Status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t001_jo_list->Tagihan->Visible) { // Tagihan ?>
	<?php if ($t001_jo_list->SortUrl($t001_jo_list->Tagihan) == "") { ?>
		<th data-name="Tagihan" class="<?php echo $t001_jo_list->Tagihan->headerCellClass() ?>"><div id="elh_t001_jo_Tagihan" class="t001_jo_Tagihan"><div class="ew-table-header-caption"><?php echo $t001_jo_list->Tagihan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tagihan" class="<?php echo $t001_jo_list->Tagihan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t001_jo_list->SortUrl($t001_jo_list->Tagihan) ?>', 2);"><div id="elh_t001_jo_Tagihan" class="t001_jo_Tagihan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t001_jo_list->Tagihan->caption() ?></span><span class="ew-table-header-sort"><?php if ($t001_jo_list->Tagihan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t001_jo_list->Tagihan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t001_jo_list->Shipper->Visible) { // Shipper ?>
	<?php if ($t001_jo_list->SortUrl($t001_jo_list->Shipper) == "") { ?>
		<th data-name="Shipper" class="<?php echo $t001_jo_list->Shipper->headerCellClass() ?>"><div id="elh_t001_jo_Shipper" class="t001_jo_Shipper"><div class="ew-table-header-caption"><?php echo $t001_jo_list->Shipper->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Shipper" class="<?php echo $t001_jo_list->Shipper->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t001_jo_list->SortUrl($t001_jo_list->Shipper) ?>', 2);"><div id="elh_t001_jo_Shipper" class="t001_jo_Shipper">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t001_jo_list->Shipper->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t001_jo_list->Shipper->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t001_jo_list->Shipper->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t001_jo_list->Qty->Visible) { // Qty ?>
	<?php if ($t001_jo_list->SortUrl($t001_jo_list->Qty) == "") { ?>
		<th data-name="Qty" class="<?php echo $t001_jo_list->Qty->headerCellClass() ?>"><div id="elh_t001_jo_Qty" class="t001_jo_Qty"><div class="ew-table-header-caption"><?php echo $t001_jo_list->Qty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Qty" class="<?php echo $t001_jo_list->Qty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t001_jo_list->SortUrl($t001_jo_list->Qty) ?>', 2);"><div id="elh_t001_jo_Qty" class="t001_jo_Qty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t001_jo_list->Qty->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t001_jo_list->Qty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t001_jo_list->Qty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t001_jo_list->Cont->Visible) { // Cont ?>
	<?php if ($t001_jo_list->SortUrl($t001_jo_list->Cont) == "") { ?>
		<th data-name="Cont" class="<?php echo $t001_jo_list->Cont->headerCellClass() ?>"><div id="elh_t001_jo_Cont" class="t001_jo_Cont"><div class="ew-table-header-caption"><?php echo $t001_jo_list->Cont->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cont" class="<?php echo $t001_jo_list->Cont->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t001_jo_list->SortUrl($t001_jo_list->Cont) ?>', 2);"><div id="elh_t001_jo_Cont" class="t001_jo_Cont">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t001_jo_list->Cont->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t001_jo_list->Cont->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t001_jo_list->Cont->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t001_jo_list->BM->Visible) { // BM ?>
	<?php if ($t001_jo_list->SortUrl($t001_jo_list->BM) == "") { ?>
		<th data-name="BM" class="<?php echo $t001_jo_list->BM->headerCellClass() ?>"><div id="elh_t001_jo_BM" class="t001_jo_BM"><div class="ew-table-header-caption"><?php echo $t001_jo_list->BM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BM" class="<?php echo $t001_jo_list->BM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t001_jo_list->SortUrl($t001_jo_list->BM) ?>', 2);"><div id="elh_t001_jo_BM" class="t001_jo_BM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t001_jo_list->BM->caption() ?></span><span class="ew-table-header-sort"><?php if ($t001_jo_list->BM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t001_jo_list->BM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t001_jo_list->Tujuan->Visible) { // Tujuan ?>
	<?php if ($t001_jo_list->SortUrl($t001_jo_list->Tujuan) == "") { ?>
		<th data-name="Tujuan" class="<?php echo $t001_jo_list->Tujuan->headerCellClass() ?>"><div id="elh_t001_jo_Tujuan" class="t001_jo_Tujuan"><div class="ew-table-header-caption"><?php echo $t001_jo_list->Tujuan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tujuan" class="<?php echo $t001_jo_list->Tujuan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t001_jo_list->SortUrl($t001_jo_list->Tujuan) ?>', 2);"><div id="elh_t001_jo_Tujuan" class="t001_jo_Tujuan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t001_jo_list->Tujuan->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t001_jo_list->Tujuan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t001_jo_list->Tujuan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t001_jo_list->Kapal->Visible) { // Kapal ?>
	<?php if ($t001_jo_list->SortUrl($t001_jo_list->Kapal) == "") { ?>
		<th data-name="Kapal" class="<?php echo $t001_jo_list->Kapal->headerCellClass() ?>"><div id="elh_t001_jo_Kapal" class="t001_jo_Kapal"><div class="ew-table-header-caption"><?php echo $t001_jo_list->Kapal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Kapal" class="<?php echo $t001_jo_list->Kapal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t001_jo_list->SortUrl($t001_jo_list->Kapal) ?>', 2);"><div id="elh_t001_jo_Kapal" class="t001_jo_Kapal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t001_jo_list->Kapal->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t001_jo_list->Kapal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t001_jo_list->Kapal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t001_jo_list->Doc->Visible) { // Doc ?>
	<?php if ($t001_jo_list->SortUrl($t001_jo_list->Doc) == "") { ?>
		<th data-name="Doc" class="<?php echo $t001_jo_list->Doc->headerCellClass() ?>"><div id="elh_t001_jo_Doc" class="t001_jo_Doc"><div class="ew-table-header-caption"><?php echo $t001_jo_list->Doc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doc" class="<?php echo $t001_jo_list->Doc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t001_jo_list->SortUrl($t001_jo_list->Doc) ?>', 2);"><div id="elh_t001_jo_Doc" class="t001_jo_Doc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t001_jo_list->Doc->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t001_jo_list->Doc->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t001_jo_list->Doc->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t001_jo_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($t001_jo_list->isAdd() || $t001_jo_list->isCopy()) {
		$t001_jo_list->RowIndex = 0;
		$t001_jo_list->KeyCount = $t001_jo_list->RowIndex;
		if ($t001_jo_list->isCopy() && !$t001_jo_list->loadRow())
			$t001_jo->CurrentAction = "add";
		if ($t001_jo_list->isAdd())
			$t001_jo_list->loadRowValues();
		if ($t001_jo->EventCancelled) // Insert failed
			$t001_jo_list->restoreFormValues(); // Restore form values

		// Set row properties
		$t001_jo->resetAttributes();
		$t001_jo->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_t001_jo", "data-rowtype" => ROWTYPE_ADD]);
		$t001_jo->RowType = ROWTYPE_ADD;

		// Render row
		$t001_jo_list->renderRow();

		// Render list options
		$t001_jo_list->renderListOptions();
		$t001_jo_list->StartRowCount = 0;
?>
	<tr <?php echo $t001_jo->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t001_jo_list->ListOptions->render("body", "left", $t001_jo_list->RowCount);
?>
	<?php if ($t001_jo_list->NoJO->Visible) { // NoJO ?>
		<td data-name="NoJO">
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_NoJO" class="form-group t001_jo_NoJO">
<input type="text" data-table="t001_jo" data-field="x_NoJO" name="x<?php echo $t001_jo_list->RowIndex ?>_NoJO" id="x<?php echo $t001_jo_list->RowIndex ?>_NoJO" size="15" maxlength="25" placeholder="<?php echo HtmlEncode($t001_jo_list->NoJO->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->NoJO->EditValue ?>"<?php echo $t001_jo_list->NoJO->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_NoJO" name="o<?php echo $t001_jo_list->RowIndex ?>_NoJO" id="o<?php echo $t001_jo_list->RowIndex ?>_NoJO" value="<?php echo HtmlEncode($t001_jo_list->NoJO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Status->Visible) { // Status ?>
		<td data-name="Status">
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Status" class="form-group t001_jo_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t001_jo" data-field="x_Status" data-value-separator="<?php echo $t001_jo_list->Status->displayValueSeparatorAttribute() ?>" id="x<?php echo $t001_jo_list->RowIndex ?>_Status" name="x<?php echo $t001_jo_list->RowIndex ?>_Status"<?php echo $t001_jo_list->Status->editAttributes() ?>>
			<?php echo $t001_jo_list->Status->selectOptionListHtml("x{$t001_jo_list->RowIndex}_Status") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Status" name="o<?php echo $t001_jo_list->RowIndex ?>_Status" id="o<?php echo $t001_jo_list->RowIndex ?>_Status" value="<?php echo HtmlEncode($t001_jo_list->Status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Tagihan->Visible) { // Tagihan ?>
		<td data-name="Tagihan">
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Tagihan" class="form-group t001_jo_Tagihan">
<input type="text" data-table="t001_jo" data-field="x_Tagihan" name="x<?php echo $t001_jo_list->RowIndex ?>_Tagihan" id="x<?php echo $t001_jo_list->RowIndex ?>_Tagihan" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t001_jo_list->Tagihan->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Tagihan->EditValue ?>"<?php echo $t001_jo_list->Tagihan->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Tagihan" name="o<?php echo $t001_jo_list->RowIndex ?>_Tagihan" id="o<?php echo $t001_jo_list->RowIndex ?>_Tagihan" value="<?php echo HtmlEncode($t001_jo_list->Tagihan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Shipper->Visible) { // Shipper ?>
		<td data-name="Shipper">
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Shipper" class="form-group t001_jo_Shipper">
<input type="text" data-table="t001_jo" data-field="x_Shipper" name="x<?php echo $t001_jo_list->RowIndex ?>_Shipper" id="x<?php echo $t001_jo_list->RowIndex ?>_Shipper" size="10" maxlength="100" placeholder="<?php echo HtmlEncode($t001_jo_list->Shipper->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Shipper->EditValue ?>"<?php echo $t001_jo_list->Shipper->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Shipper" name="o<?php echo $t001_jo_list->RowIndex ?>_Shipper" id="o<?php echo $t001_jo_list->RowIndex ?>_Shipper" value="<?php echo HtmlEncode($t001_jo_list->Shipper->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Qty->Visible) { // Qty ?>
		<td data-name="Qty">
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Qty" class="form-group t001_jo_Qty">
<input type="text" data-table="t001_jo" data-field="x_Qty" name="x<?php echo $t001_jo_list->RowIndex ?>_Qty" id="x<?php echo $t001_jo_list->RowIndex ?>_Qty" size="10" maxlength="5" placeholder="<?php echo HtmlEncode($t001_jo_list->Qty->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Qty->EditValue ?>"<?php echo $t001_jo_list->Qty->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Qty" name="o<?php echo $t001_jo_list->RowIndex ?>_Qty" id="o<?php echo $t001_jo_list->RowIndex ?>_Qty" value="<?php echo HtmlEncode($t001_jo_list->Qty->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Cont->Visible) { // Cont ?>
		<td data-name="Cont">
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Cont" class="form-group t001_jo_Cont">
<input type="text" data-table="t001_jo" data-field="x_Cont" name="x<?php echo $t001_jo_list->RowIndex ?>_Cont" id="x<?php echo $t001_jo_list->RowIndex ?>_Cont" size="10" maxlength="5" placeholder="<?php echo HtmlEncode($t001_jo_list->Cont->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Cont->EditValue ?>"<?php echo $t001_jo_list->Cont->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Cont" name="o<?php echo $t001_jo_list->RowIndex ?>_Cont" id="o<?php echo $t001_jo_list->RowIndex ?>_Cont" value="<?php echo HtmlEncode($t001_jo_list->Cont->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t001_jo_list->BM->Visible) { // BM ?>
		<td data-name="BM">
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_BM" class="form-group t001_jo_BM">
<div id="tp_x<?php echo $t001_jo_list->RowIndex ?>_BM" class="ew-template"><input type="radio" class="custom-control-input" data-table="t001_jo" data-field="x_BM" data-value-separator="<?php echo $t001_jo_list->BM->displayValueSeparatorAttribute() ?>" name="x<?php echo $t001_jo_list->RowIndex ?>_BM" id="x<?php echo $t001_jo_list->RowIndex ?>_BM" value="{value}"<?php echo $t001_jo_list->BM->editAttributes() ?>></div>
<div id="dsl_x<?php echo $t001_jo_list->RowIndex ?>_BM" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t001_jo_list->BM->radioButtonListHtml(FALSE, "x{$t001_jo_list->RowIndex}_BM") ?>
</div></div>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_BM" name="o<?php echo $t001_jo_list->RowIndex ?>_BM" id="o<?php echo $t001_jo_list->RowIndex ?>_BM" value="<?php echo HtmlEncode($t001_jo_list->BM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Tujuan->Visible) { // Tujuan ?>
		<td data-name="Tujuan">
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Tujuan" class="form-group t001_jo_Tujuan">
<input type="text" data-table="t001_jo" data-field="x_Tujuan" name="x<?php echo $t001_jo_list->RowIndex ?>_Tujuan" id="x<?php echo $t001_jo_list->RowIndex ?>_Tujuan" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t001_jo_list->Tujuan->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Tujuan->EditValue ?>"<?php echo $t001_jo_list->Tujuan->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Tujuan" name="o<?php echo $t001_jo_list->RowIndex ?>_Tujuan" id="o<?php echo $t001_jo_list->RowIndex ?>_Tujuan" value="<?php echo HtmlEncode($t001_jo_list->Tujuan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Kapal->Visible) { // Kapal ?>
		<td data-name="Kapal">
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Kapal" class="form-group t001_jo_Kapal">
<input type="text" data-table="t001_jo" data-field="x_Kapal" name="x<?php echo $t001_jo_list->RowIndex ?>_Kapal" id="x<?php echo $t001_jo_list->RowIndex ?>_Kapal" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t001_jo_list->Kapal->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Kapal->EditValue ?>"<?php echo $t001_jo_list->Kapal->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Kapal" name="o<?php echo $t001_jo_list->RowIndex ?>_Kapal" id="o<?php echo $t001_jo_list->RowIndex ?>_Kapal" value="<?php echo HtmlEncode($t001_jo_list->Kapal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Doc->Visible) { // Doc ?>
		<td data-name="Doc">
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Doc" class="form-group t001_jo_Doc">
<div id="fd_x<?php echo $t001_jo_list->RowIndex ?>_Doc">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $t001_jo_list->Doc->title() ?>" data-table="t001_jo" data-field="x_Doc" name="x<?php echo $t001_jo_list->RowIndex ?>_Doc" id="x<?php echo $t001_jo_list->RowIndex ?>_Doc" lang="<?php echo CurrentLanguageID() ?>"<?php echo $t001_jo_list->Doc->editAttributes() ?><?php if ($t001_jo_list->Doc->ReadOnly || $t001_jo_list->Doc->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $t001_jo_list->RowIndex ?>_Doc"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $t001_jo_list->RowIndex ?>_Doc" id= "fn_x<?php echo $t001_jo_list->RowIndex ?>_Doc" value="<?php echo $t001_jo_list->Doc->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $t001_jo_list->RowIndex ?>_Doc" id= "fa_x<?php echo $t001_jo_list->RowIndex ?>_Doc" value="0">
<input type="hidden" name="fs_x<?php echo $t001_jo_list->RowIndex ?>_Doc" id= "fs_x<?php echo $t001_jo_list->RowIndex ?>_Doc" value="255">
<input type="hidden" name="fx_x<?php echo $t001_jo_list->RowIndex ?>_Doc" id= "fx_x<?php echo $t001_jo_list->RowIndex ?>_Doc" value="<?php echo $t001_jo_list->Doc->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $t001_jo_list->RowIndex ?>_Doc" id= "fm_x<?php echo $t001_jo_list->RowIndex ?>_Doc" value="<?php echo $t001_jo_list->Doc->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $t001_jo_list->RowIndex ?>_Doc" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Doc" name="o<?php echo $t001_jo_list->RowIndex ?>_Doc" id="o<?php echo $t001_jo_list->RowIndex ?>_Doc" value="<?php echo HtmlEncode($t001_jo_list->Doc->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t001_jo_list->ListOptions->render("body", "right", $t001_jo_list->RowCount);
?>
<script>
loadjs.ready(["ft001_jolist", "load"], function() {
	ft001_jolist.updateLists(<?php echo $t001_jo_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
<?php
if ($t001_jo_list->ExportAll && $t001_jo_list->isExport()) {
	$t001_jo_list->StopRecord = $t001_jo_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t001_jo_list->TotalRecords > $t001_jo_list->StartRecord + $t001_jo_list->DisplayRecords - 1)
		$t001_jo_list->StopRecord = $t001_jo_list->StartRecord + $t001_jo_list->DisplayRecords - 1;
	else
		$t001_jo_list->StopRecord = $t001_jo_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t001_jo->isConfirm() || $t001_jo_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t001_jo_list->FormKeyCountName) && ($t001_jo_list->isGridAdd() || $t001_jo_list->isGridEdit() || $t001_jo->isConfirm())) {
		$t001_jo_list->KeyCount = $CurrentForm->getValue($t001_jo_list->FormKeyCountName);
		$t001_jo_list->StopRecord = $t001_jo_list->StartRecord + $t001_jo_list->KeyCount - 1;
	}
}
$t001_jo_list->RecordCount = $t001_jo_list->StartRecord - 1;
if ($t001_jo_list->Recordset && !$t001_jo_list->Recordset->EOF) {
	$t001_jo_list->Recordset->moveFirst();
	$selectLimit = $t001_jo_list->UseSelectLimit;
	if (!$selectLimit && $t001_jo_list->StartRecord > 1)
		$t001_jo_list->Recordset->move($t001_jo_list->StartRecord - 1);
} elseif (!$t001_jo->AllowAddDeleteRow && $t001_jo_list->StopRecord == 0) {
	$t001_jo_list->StopRecord = $t001_jo->GridAddRowCount;
}

// Initialize aggregate
$t001_jo->RowType = ROWTYPE_AGGREGATEINIT;
$t001_jo->resetAttributes();
$t001_jo_list->renderRow();
$t001_jo_list->EditRowCount = 0;
if ($t001_jo_list->isEdit())
	$t001_jo_list->RowIndex = 1;
if ($t001_jo_list->isGridAdd())
	$t001_jo_list->RowIndex = 0;
if ($t001_jo_list->isGridEdit())
	$t001_jo_list->RowIndex = 0;
while ($t001_jo_list->RecordCount < $t001_jo_list->StopRecord) {
	$t001_jo_list->RecordCount++;
	if ($t001_jo_list->RecordCount >= $t001_jo_list->StartRecord) {
		$t001_jo_list->RowCount++;
		if ($t001_jo_list->isGridAdd() || $t001_jo_list->isGridEdit() || $t001_jo->isConfirm()) {
			$t001_jo_list->RowIndex++;
			$CurrentForm->Index = $t001_jo_list->RowIndex;
			if ($CurrentForm->hasValue($t001_jo_list->FormActionName) && ($t001_jo->isConfirm() || $t001_jo_list->EventCancelled))
				$t001_jo_list->RowAction = strval($CurrentForm->getValue($t001_jo_list->FormActionName));
			elseif ($t001_jo_list->isGridAdd())
				$t001_jo_list->RowAction = "insert";
			else
				$t001_jo_list->RowAction = "";
		}

		// Set up key count
		$t001_jo_list->KeyCount = $t001_jo_list->RowIndex;

		// Init row class and style
		$t001_jo->resetAttributes();
		$t001_jo->CssClass = "";
		if ($t001_jo_list->isGridAdd()) {
			$t001_jo_list->loadRowValues(); // Load default values
		} else {
			$t001_jo_list->loadRowValues($t001_jo_list->Recordset); // Load row values
		}
		$t001_jo->RowType = ROWTYPE_VIEW; // Render view
		if ($t001_jo_list->isGridAdd()) // Grid add
			$t001_jo->RowType = ROWTYPE_ADD; // Render add
		if ($t001_jo_list->isGridAdd() && $t001_jo->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t001_jo_list->restoreCurrentRowFormValues($t001_jo_list->RowIndex); // Restore form values
		if ($t001_jo_list->isEdit()) {
			if ($t001_jo_list->checkInlineEditKey() && $t001_jo_list->EditRowCount == 0) { // Inline edit
				$t001_jo->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($t001_jo_list->isGridEdit()) { // Grid edit
			if ($t001_jo->EventCancelled)
				$t001_jo_list->restoreCurrentRowFormValues($t001_jo_list->RowIndex); // Restore form values
			if ($t001_jo_list->RowAction == "insert")
				$t001_jo->RowType = ROWTYPE_ADD; // Render add
			else
				$t001_jo->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t001_jo_list->isEdit() && $t001_jo->RowType == ROWTYPE_EDIT && $t001_jo->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$t001_jo_list->restoreFormValues(); // Restore form values
		}
		if ($t001_jo_list->isGridEdit() && ($t001_jo->RowType == ROWTYPE_EDIT || $t001_jo->RowType == ROWTYPE_ADD) && $t001_jo->EventCancelled) // Update failed
			$t001_jo_list->restoreCurrentRowFormValues($t001_jo_list->RowIndex); // Restore form values
		if ($t001_jo->RowType == ROWTYPE_EDIT) // Edit row
			$t001_jo_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t001_jo->RowAttrs->merge(["data-rowindex" => $t001_jo_list->RowCount, "id" => "r" . $t001_jo_list->RowCount . "_t001_jo", "data-rowtype" => $t001_jo->RowType]);

		// Render row
		$t001_jo_list->renderRow();

		// Render list options
		$t001_jo_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t001_jo_list->RowAction != "delete" && $t001_jo_list->RowAction != "insertdelete" && !($t001_jo_list->RowAction == "insert" && $t001_jo->isConfirm() && $t001_jo_list->emptyRow())) {
?>
	<tr <?php echo $t001_jo->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t001_jo_list->ListOptions->render("body", "left", $t001_jo_list->RowCount);
?>
	<?php if ($t001_jo_list->NoJO->Visible) { // NoJO ?>
		<td data-name="NoJO" <?php echo $t001_jo_list->NoJO->cellAttributes() ?>>
<?php if ($t001_jo->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_NoJO" class="form-group">
<input type="text" data-table="t001_jo" data-field="x_NoJO" name="x<?php echo $t001_jo_list->RowIndex ?>_NoJO" id="x<?php echo $t001_jo_list->RowIndex ?>_NoJO" size="15" maxlength="25" placeholder="<?php echo HtmlEncode($t001_jo_list->NoJO->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->NoJO->EditValue ?>"<?php echo $t001_jo_list->NoJO->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_NoJO" name="o<?php echo $t001_jo_list->RowIndex ?>_NoJO" id="o<?php echo $t001_jo_list->RowIndex ?>_NoJO" value="<?php echo HtmlEncode($t001_jo_list->NoJO->OldValue) ?>">
<?php } ?>
<?php if ($t001_jo->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_NoJO" class="form-group">
<input type="text" data-table="t001_jo" data-field="x_NoJO" name="x<?php echo $t001_jo_list->RowIndex ?>_NoJO" id="x<?php echo $t001_jo_list->RowIndex ?>_NoJO" size="15" maxlength="25" placeholder="<?php echo HtmlEncode($t001_jo_list->NoJO->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->NoJO->EditValue ?>"<?php echo $t001_jo_list->NoJO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t001_jo->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_NoJO">
<span<?php echo $t001_jo_list->NoJO->viewAttributes() ?>><?php echo $t001_jo_list->NoJO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t001_jo->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t001_jo" data-field="x_id" name="x<?php echo $t001_jo_list->RowIndex ?>_id" id="x<?php echo $t001_jo_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t001_jo_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t001_jo" data-field="x_id" name="o<?php echo $t001_jo_list->RowIndex ?>_id" id="o<?php echo $t001_jo_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t001_jo_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t001_jo->RowType == ROWTYPE_EDIT || $t001_jo->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t001_jo" data-field="x_id" name="x<?php echo $t001_jo_list->RowIndex ?>_id" id="x<?php echo $t001_jo_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t001_jo_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t001_jo_list->Status->Visible) { // Status ?>
		<td data-name="Status" <?php echo $t001_jo_list->Status->cellAttributes() ?>>
<?php if ($t001_jo->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t001_jo" data-field="x_Status" data-value-separator="<?php echo $t001_jo_list->Status->displayValueSeparatorAttribute() ?>" id="x<?php echo $t001_jo_list->RowIndex ?>_Status" name="x<?php echo $t001_jo_list->RowIndex ?>_Status"<?php echo $t001_jo_list->Status->editAttributes() ?>>
			<?php echo $t001_jo_list->Status->selectOptionListHtml("x{$t001_jo_list->RowIndex}_Status") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Status" name="o<?php echo $t001_jo_list->RowIndex ?>_Status" id="o<?php echo $t001_jo_list->RowIndex ?>_Status" value="<?php echo HtmlEncode($t001_jo_list->Status->OldValue) ?>">
<?php } ?>
<?php if ($t001_jo->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t001_jo" data-field="x_Status" data-value-separator="<?php echo $t001_jo_list->Status->displayValueSeparatorAttribute() ?>" id="x<?php echo $t001_jo_list->RowIndex ?>_Status" name="x<?php echo $t001_jo_list->RowIndex ?>_Status"<?php echo $t001_jo_list->Status->editAttributes() ?>>
			<?php echo $t001_jo_list->Status->selectOptionListHtml("x{$t001_jo_list->RowIndex}_Status") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($t001_jo->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Status">
<span<?php echo $t001_jo_list->Status->viewAttributes() ?>><?php echo $t001_jo_list->Status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Tagihan->Visible) { // Tagihan ?>
		<td data-name="Tagihan" <?php echo $t001_jo_list->Tagihan->cellAttributes() ?>>
<?php if ($t001_jo->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Tagihan" class="form-group">
<input type="text" data-table="t001_jo" data-field="x_Tagihan" name="x<?php echo $t001_jo_list->RowIndex ?>_Tagihan" id="x<?php echo $t001_jo_list->RowIndex ?>_Tagihan" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t001_jo_list->Tagihan->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Tagihan->EditValue ?>"<?php echo $t001_jo_list->Tagihan->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Tagihan" name="o<?php echo $t001_jo_list->RowIndex ?>_Tagihan" id="o<?php echo $t001_jo_list->RowIndex ?>_Tagihan" value="<?php echo HtmlEncode($t001_jo_list->Tagihan->OldValue) ?>">
<?php } ?>
<?php if ($t001_jo->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Tagihan" class="form-group">
<input type="text" data-table="t001_jo" data-field="x_Tagihan" name="x<?php echo $t001_jo_list->RowIndex ?>_Tagihan" id="x<?php echo $t001_jo_list->RowIndex ?>_Tagihan" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t001_jo_list->Tagihan->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Tagihan->EditValue ?>"<?php echo $t001_jo_list->Tagihan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t001_jo->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Tagihan">
<span<?php echo $t001_jo_list->Tagihan->viewAttributes() ?>><?php echo $t001_jo_list->Tagihan->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Shipper->Visible) { // Shipper ?>
		<td data-name="Shipper" <?php echo $t001_jo_list->Shipper->cellAttributes() ?>>
<?php if ($t001_jo->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Shipper" class="form-group">
<input type="text" data-table="t001_jo" data-field="x_Shipper" name="x<?php echo $t001_jo_list->RowIndex ?>_Shipper" id="x<?php echo $t001_jo_list->RowIndex ?>_Shipper" size="10" maxlength="100" placeholder="<?php echo HtmlEncode($t001_jo_list->Shipper->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Shipper->EditValue ?>"<?php echo $t001_jo_list->Shipper->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Shipper" name="o<?php echo $t001_jo_list->RowIndex ?>_Shipper" id="o<?php echo $t001_jo_list->RowIndex ?>_Shipper" value="<?php echo HtmlEncode($t001_jo_list->Shipper->OldValue) ?>">
<?php } ?>
<?php if ($t001_jo->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Shipper" class="form-group">
<input type="text" data-table="t001_jo" data-field="x_Shipper" name="x<?php echo $t001_jo_list->RowIndex ?>_Shipper" id="x<?php echo $t001_jo_list->RowIndex ?>_Shipper" size="10" maxlength="100" placeholder="<?php echo HtmlEncode($t001_jo_list->Shipper->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Shipper->EditValue ?>"<?php echo $t001_jo_list->Shipper->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t001_jo->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Shipper">
<span<?php echo $t001_jo_list->Shipper->viewAttributes() ?>><?php echo $t001_jo_list->Shipper->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Qty->Visible) { // Qty ?>
		<td data-name="Qty" <?php echo $t001_jo_list->Qty->cellAttributes() ?>>
<?php if ($t001_jo->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Qty" class="form-group">
<input type="text" data-table="t001_jo" data-field="x_Qty" name="x<?php echo $t001_jo_list->RowIndex ?>_Qty" id="x<?php echo $t001_jo_list->RowIndex ?>_Qty" size="10" maxlength="5" placeholder="<?php echo HtmlEncode($t001_jo_list->Qty->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Qty->EditValue ?>"<?php echo $t001_jo_list->Qty->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Qty" name="o<?php echo $t001_jo_list->RowIndex ?>_Qty" id="o<?php echo $t001_jo_list->RowIndex ?>_Qty" value="<?php echo HtmlEncode($t001_jo_list->Qty->OldValue) ?>">
<?php } ?>
<?php if ($t001_jo->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Qty" class="form-group">
<input type="text" data-table="t001_jo" data-field="x_Qty" name="x<?php echo $t001_jo_list->RowIndex ?>_Qty" id="x<?php echo $t001_jo_list->RowIndex ?>_Qty" size="10" maxlength="5" placeholder="<?php echo HtmlEncode($t001_jo_list->Qty->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Qty->EditValue ?>"<?php echo $t001_jo_list->Qty->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t001_jo->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Qty">
<span<?php echo $t001_jo_list->Qty->viewAttributes() ?>><?php echo $t001_jo_list->Qty->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Cont->Visible) { // Cont ?>
		<td data-name="Cont" <?php echo $t001_jo_list->Cont->cellAttributes() ?>>
<?php if ($t001_jo->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Cont" class="form-group">
<input type="text" data-table="t001_jo" data-field="x_Cont" name="x<?php echo $t001_jo_list->RowIndex ?>_Cont" id="x<?php echo $t001_jo_list->RowIndex ?>_Cont" size="10" maxlength="5" placeholder="<?php echo HtmlEncode($t001_jo_list->Cont->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Cont->EditValue ?>"<?php echo $t001_jo_list->Cont->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Cont" name="o<?php echo $t001_jo_list->RowIndex ?>_Cont" id="o<?php echo $t001_jo_list->RowIndex ?>_Cont" value="<?php echo HtmlEncode($t001_jo_list->Cont->OldValue) ?>">
<?php } ?>
<?php if ($t001_jo->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Cont" class="form-group">
<input type="text" data-table="t001_jo" data-field="x_Cont" name="x<?php echo $t001_jo_list->RowIndex ?>_Cont" id="x<?php echo $t001_jo_list->RowIndex ?>_Cont" size="10" maxlength="5" placeholder="<?php echo HtmlEncode($t001_jo_list->Cont->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Cont->EditValue ?>"<?php echo $t001_jo_list->Cont->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t001_jo->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Cont">
<span<?php echo $t001_jo_list->Cont->viewAttributes() ?>><?php echo $t001_jo_list->Cont->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t001_jo_list->BM->Visible) { // BM ?>
		<td data-name="BM" <?php echo $t001_jo_list->BM->cellAttributes() ?>>
<?php if ($t001_jo->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_BM" class="form-group">
<div id="tp_x<?php echo $t001_jo_list->RowIndex ?>_BM" class="ew-template"><input type="radio" class="custom-control-input" data-table="t001_jo" data-field="x_BM" data-value-separator="<?php echo $t001_jo_list->BM->displayValueSeparatorAttribute() ?>" name="x<?php echo $t001_jo_list->RowIndex ?>_BM" id="x<?php echo $t001_jo_list->RowIndex ?>_BM" value="{value}"<?php echo $t001_jo_list->BM->editAttributes() ?>></div>
<div id="dsl_x<?php echo $t001_jo_list->RowIndex ?>_BM" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t001_jo_list->BM->radioButtonListHtml(FALSE, "x{$t001_jo_list->RowIndex}_BM") ?>
</div></div>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_BM" name="o<?php echo $t001_jo_list->RowIndex ?>_BM" id="o<?php echo $t001_jo_list->RowIndex ?>_BM" value="<?php echo HtmlEncode($t001_jo_list->BM->OldValue) ?>">
<?php } ?>
<?php if ($t001_jo->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_BM" class="form-group">
<div id="tp_x<?php echo $t001_jo_list->RowIndex ?>_BM" class="ew-template"><input type="radio" class="custom-control-input" data-table="t001_jo" data-field="x_BM" data-value-separator="<?php echo $t001_jo_list->BM->displayValueSeparatorAttribute() ?>" name="x<?php echo $t001_jo_list->RowIndex ?>_BM" id="x<?php echo $t001_jo_list->RowIndex ?>_BM" value="{value}"<?php echo $t001_jo_list->BM->editAttributes() ?>></div>
<div id="dsl_x<?php echo $t001_jo_list->RowIndex ?>_BM" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t001_jo_list->BM->radioButtonListHtml(FALSE, "x{$t001_jo_list->RowIndex}_BM") ?>
</div></div>
</span>
<?php } ?>
<?php if ($t001_jo->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_BM">
<span<?php echo $t001_jo_list->BM->viewAttributes() ?>><?php echo $t001_jo_list->BM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Tujuan->Visible) { // Tujuan ?>
		<td data-name="Tujuan" <?php echo $t001_jo_list->Tujuan->cellAttributes() ?>>
<?php if ($t001_jo->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Tujuan" class="form-group">
<input type="text" data-table="t001_jo" data-field="x_Tujuan" name="x<?php echo $t001_jo_list->RowIndex ?>_Tujuan" id="x<?php echo $t001_jo_list->RowIndex ?>_Tujuan" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t001_jo_list->Tujuan->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Tujuan->EditValue ?>"<?php echo $t001_jo_list->Tujuan->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Tujuan" name="o<?php echo $t001_jo_list->RowIndex ?>_Tujuan" id="o<?php echo $t001_jo_list->RowIndex ?>_Tujuan" value="<?php echo HtmlEncode($t001_jo_list->Tujuan->OldValue) ?>">
<?php } ?>
<?php if ($t001_jo->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Tujuan" class="form-group">
<input type="text" data-table="t001_jo" data-field="x_Tujuan" name="x<?php echo $t001_jo_list->RowIndex ?>_Tujuan" id="x<?php echo $t001_jo_list->RowIndex ?>_Tujuan" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t001_jo_list->Tujuan->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Tujuan->EditValue ?>"<?php echo $t001_jo_list->Tujuan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t001_jo->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Tujuan">
<span<?php echo $t001_jo_list->Tujuan->viewAttributes() ?>><?php echo $t001_jo_list->Tujuan->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Kapal->Visible) { // Kapal ?>
		<td data-name="Kapal" <?php echo $t001_jo_list->Kapal->cellAttributes() ?>>
<?php if ($t001_jo->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Kapal" class="form-group">
<input type="text" data-table="t001_jo" data-field="x_Kapal" name="x<?php echo $t001_jo_list->RowIndex ?>_Kapal" id="x<?php echo $t001_jo_list->RowIndex ?>_Kapal" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t001_jo_list->Kapal->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Kapal->EditValue ?>"<?php echo $t001_jo_list->Kapal->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Kapal" name="o<?php echo $t001_jo_list->RowIndex ?>_Kapal" id="o<?php echo $t001_jo_list->RowIndex ?>_Kapal" value="<?php echo HtmlEncode($t001_jo_list->Kapal->OldValue) ?>">
<?php } ?>
<?php if ($t001_jo->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Kapal" class="form-group">
<input type="text" data-table="t001_jo" data-field="x_Kapal" name="x<?php echo $t001_jo_list->RowIndex ?>_Kapal" id="x<?php echo $t001_jo_list->RowIndex ?>_Kapal" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t001_jo_list->Kapal->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Kapal->EditValue ?>"<?php echo $t001_jo_list->Kapal->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t001_jo->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Kapal">
<span<?php echo $t001_jo_list->Kapal->viewAttributes() ?>><?php echo $t001_jo_list->Kapal->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Doc->Visible) { // Doc ?>
		<td data-name="Doc" <?php echo $t001_jo_list->Doc->cellAttributes() ?>>
<?php if ($t001_jo->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Doc" class="form-group">
<div id="fd_x<?php echo $t001_jo_list->RowIndex ?>_Doc">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $t001_jo_list->Doc->title() ?>" data-table="t001_jo" data-field="x_Doc" name="x<?php echo $t001_jo_list->RowIndex ?>_Doc" id="x<?php echo $t001_jo_list->RowIndex ?>_Doc" lang="<?php echo CurrentLanguageID() ?>"<?php echo $t001_jo_list->Doc->editAttributes() ?><?php if ($t001_jo_list->Doc->ReadOnly || $t001_jo_list->Doc->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $t001_jo_list->RowIndex ?>_Doc"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $t001_jo_list->RowIndex ?>_Doc" id= "fn_x<?php echo $t001_jo_list->RowIndex ?>_Doc" value="<?php echo $t001_jo_list->Doc->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $t001_jo_list->RowIndex ?>_Doc" id= "fa_x<?php echo $t001_jo_list->RowIndex ?>_Doc" value="0">
<input type="hidden" name="fs_x<?php echo $t001_jo_list->RowIndex ?>_Doc" id= "fs_x<?php echo $t001_jo_list->RowIndex ?>_Doc" value="255">
<input type="hidden" name="fx_x<?php echo $t001_jo_list->RowIndex ?>_Doc" id= "fx_x<?php echo $t001_jo_list->RowIndex ?>_Doc" value="<?php echo $t001_jo_list->Doc->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $t001_jo_list->RowIndex ?>_Doc" id= "fm_x<?php echo $t001_jo_list->RowIndex ?>_Doc" value="<?php echo $t001_jo_list->Doc->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $t001_jo_list->RowIndex ?>_Doc" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Doc" name="o<?php echo $t001_jo_list->RowIndex ?>_Doc" id="o<?php echo $t001_jo_list->RowIndex ?>_Doc" value="<?php echo HtmlEncode($t001_jo_list->Doc->OldValue) ?>">
<?php } ?>
<?php if ($t001_jo->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Doc" class="form-group">
<div id="fd_x<?php echo $t001_jo_list->RowIndex ?>_Doc">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $t001_jo_list->Doc->title() ?>" data-table="t001_jo" data-field="x_Doc" name="x<?php echo $t001_jo_list->RowIndex ?>_Doc" id="x<?php echo $t001_jo_list->RowIndex ?>_Doc" lang="<?php echo CurrentLanguageID() ?>"<?php echo $t001_jo_list->Doc->editAttributes() ?><?php if ($t001_jo_list->Doc->ReadOnly || $t001_jo_list->Doc->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $t001_jo_list->RowIndex ?>_Doc"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $t001_jo_list->RowIndex ?>_Doc" id= "fn_x<?php echo $t001_jo_list->RowIndex ?>_Doc" value="<?php echo $t001_jo_list->Doc->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $t001_jo_list->RowIndex ?>_Doc" id= "fa_x<?php echo $t001_jo_list->RowIndex ?>_Doc" value="<?php echo (Post("fa_x<?php echo $t001_jo_list->RowIndex ?>_Doc") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x<?php echo $t001_jo_list->RowIndex ?>_Doc" id= "fs_x<?php echo $t001_jo_list->RowIndex ?>_Doc" value="255">
<input type="hidden" name="fx_x<?php echo $t001_jo_list->RowIndex ?>_Doc" id= "fx_x<?php echo $t001_jo_list->RowIndex ?>_Doc" value="<?php echo $t001_jo_list->Doc->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $t001_jo_list->RowIndex ?>_Doc" id= "fm_x<?php echo $t001_jo_list->RowIndex ?>_Doc" value="<?php echo $t001_jo_list->Doc->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $t001_jo_list->RowIndex ?>_Doc" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
<?php if ($t001_jo->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t001_jo_list->RowCount ?>_t001_jo_Doc">
<span<?php echo $t001_jo_list->Doc->viewAttributes() ?>><?php echo GetFileViewTag($t001_jo_list->Doc, $t001_jo_list->Doc->getViewValue(), FALSE) ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t001_jo_list->ListOptions->render("body", "right", $t001_jo_list->RowCount);
?>
	</tr>
<?php if ($t001_jo->RowType == ROWTYPE_ADD || $t001_jo->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft001_jolist", "load"], function() {
	ft001_jolist.updateLists(<?php echo $t001_jo_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t001_jo_list->isGridAdd())
		if (!$t001_jo_list->Recordset->EOF)
			$t001_jo_list->Recordset->moveNext();
}
?>
<?php
	if ($t001_jo_list->isGridAdd() || $t001_jo_list->isGridEdit()) {
		$t001_jo_list->RowIndex = '$rowindex$';
		$t001_jo_list->loadRowValues();

		// Set row properties
		$t001_jo->resetAttributes();
		$t001_jo->RowAttrs->merge(["data-rowindex" => $t001_jo_list->RowIndex, "id" => "r0_t001_jo", "data-rowtype" => ROWTYPE_ADD]);
		$t001_jo->RowAttrs->appendClass("ew-template");
		$t001_jo->RowType = ROWTYPE_ADD;

		// Render row
		$t001_jo_list->renderRow();

		// Render list options
		$t001_jo_list->renderListOptions();
		$t001_jo_list->StartRowCount = 0;
?>
	<tr <?php echo $t001_jo->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t001_jo_list->ListOptions->render("body", "left", $t001_jo_list->RowIndex);
?>
	<?php if ($t001_jo_list->NoJO->Visible) { // NoJO ?>
		<td data-name="NoJO">
<span id="el$rowindex$_t001_jo_NoJO" class="form-group t001_jo_NoJO">
<input type="text" data-table="t001_jo" data-field="x_NoJO" name="x<?php echo $t001_jo_list->RowIndex ?>_NoJO" id="x<?php echo $t001_jo_list->RowIndex ?>_NoJO" size="15" maxlength="25" placeholder="<?php echo HtmlEncode($t001_jo_list->NoJO->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->NoJO->EditValue ?>"<?php echo $t001_jo_list->NoJO->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_NoJO" name="o<?php echo $t001_jo_list->RowIndex ?>_NoJO" id="o<?php echo $t001_jo_list->RowIndex ?>_NoJO" value="<?php echo HtmlEncode($t001_jo_list->NoJO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Status->Visible) { // Status ?>
		<td data-name="Status">
<span id="el$rowindex$_t001_jo_Status" class="form-group t001_jo_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t001_jo" data-field="x_Status" data-value-separator="<?php echo $t001_jo_list->Status->displayValueSeparatorAttribute() ?>" id="x<?php echo $t001_jo_list->RowIndex ?>_Status" name="x<?php echo $t001_jo_list->RowIndex ?>_Status"<?php echo $t001_jo_list->Status->editAttributes() ?>>
			<?php echo $t001_jo_list->Status->selectOptionListHtml("x{$t001_jo_list->RowIndex}_Status") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Status" name="o<?php echo $t001_jo_list->RowIndex ?>_Status" id="o<?php echo $t001_jo_list->RowIndex ?>_Status" value="<?php echo HtmlEncode($t001_jo_list->Status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Tagihan->Visible) { // Tagihan ?>
		<td data-name="Tagihan">
<span id="el$rowindex$_t001_jo_Tagihan" class="form-group t001_jo_Tagihan">
<input type="text" data-table="t001_jo" data-field="x_Tagihan" name="x<?php echo $t001_jo_list->RowIndex ?>_Tagihan" id="x<?php echo $t001_jo_list->RowIndex ?>_Tagihan" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t001_jo_list->Tagihan->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Tagihan->EditValue ?>"<?php echo $t001_jo_list->Tagihan->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Tagihan" name="o<?php echo $t001_jo_list->RowIndex ?>_Tagihan" id="o<?php echo $t001_jo_list->RowIndex ?>_Tagihan" value="<?php echo HtmlEncode($t001_jo_list->Tagihan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Shipper->Visible) { // Shipper ?>
		<td data-name="Shipper">
<span id="el$rowindex$_t001_jo_Shipper" class="form-group t001_jo_Shipper">
<input type="text" data-table="t001_jo" data-field="x_Shipper" name="x<?php echo $t001_jo_list->RowIndex ?>_Shipper" id="x<?php echo $t001_jo_list->RowIndex ?>_Shipper" size="10" maxlength="100" placeholder="<?php echo HtmlEncode($t001_jo_list->Shipper->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Shipper->EditValue ?>"<?php echo $t001_jo_list->Shipper->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Shipper" name="o<?php echo $t001_jo_list->RowIndex ?>_Shipper" id="o<?php echo $t001_jo_list->RowIndex ?>_Shipper" value="<?php echo HtmlEncode($t001_jo_list->Shipper->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Qty->Visible) { // Qty ?>
		<td data-name="Qty">
<span id="el$rowindex$_t001_jo_Qty" class="form-group t001_jo_Qty">
<input type="text" data-table="t001_jo" data-field="x_Qty" name="x<?php echo $t001_jo_list->RowIndex ?>_Qty" id="x<?php echo $t001_jo_list->RowIndex ?>_Qty" size="10" maxlength="5" placeholder="<?php echo HtmlEncode($t001_jo_list->Qty->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Qty->EditValue ?>"<?php echo $t001_jo_list->Qty->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Qty" name="o<?php echo $t001_jo_list->RowIndex ?>_Qty" id="o<?php echo $t001_jo_list->RowIndex ?>_Qty" value="<?php echo HtmlEncode($t001_jo_list->Qty->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Cont->Visible) { // Cont ?>
		<td data-name="Cont">
<span id="el$rowindex$_t001_jo_Cont" class="form-group t001_jo_Cont">
<input type="text" data-table="t001_jo" data-field="x_Cont" name="x<?php echo $t001_jo_list->RowIndex ?>_Cont" id="x<?php echo $t001_jo_list->RowIndex ?>_Cont" size="10" maxlength="5" placeholder="<?php echo HtmlEncode($t001_jo_list->Cont->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Cont->EditValue ?>"<?php echo $t001_jo_list->Cont->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Cont" name="o<?php echo $t001_jo_list->RowIndex ?>_Cont" id="o<?php echo $t001_jo_list->RowIndex ?>_Cont" value="<?php echo HtmlEncode($t001_jo_list->Cont->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t001_jo_list->BM->Visible) { // BM ?>
		<td data-name="BM">
<span id="el$rowindex$_t001_jo_BM" class="form-group t001_jo_BM">
<div id="tp_x<?php echo $t001_jo_list->RowIndex ?>_BM" class="ew-template"><input type="radio" class="custom-control-input" data-table="t001_jo" data-field="x_BM" data-value-separator="<?php echo $t001_jo_list->BM->displayValueSeparatorAttribute() ?>" name="x<?php echo $t001_jo_list->RowIndex ?>_BM" id="x<?php echo $t001_jo_list->RowIndex ?>_BM" value="{value}"<?php echo $t001_jo_list->BM->editAttributes() ?>></div>
<div id="dsl_x<?php echo $t001_jo_list->RowIndex ?>_BM" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t001_jo_list->BM->radioButtonListHtml(FALSE, "x{$t001_jo_list->RowIndex}_BM") ?>
</div></div>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_BM" name="o<?php echo $t001_jo_list->RowIndex ?>_BM" id="o<?php echo $t001_jo_list->RowIndex ?>_BM" value="<?php echo HtmlEncode($t001_jo_list->BM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Tujuan->Visible) { // Tujuan ?>
		<td data-name="Tujuan">
<span id="el$rowindex$_t001_jo_Tujuan" class="form-group t001_jo_Tujuan">
<input type="text" data-table="t001_jo" data-field="x_Tujuan" name="x<?php echo $t001_jo_list->RowIndex ?>_Tujuan" id="x<?php echo $t001_jo_list->RowIndex ?>_Tujuan" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t001_jo_list->Tujuan->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Tujuan->EditValue ?>"<?php echo $t001_jo_list->Tujuan->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Tujuan" name="o<?php echo $t001_jo_list->RowIndex ?>_Tujuan" id="o<?php echo $t001_jo_list->RowIndex ?>_Tujuan" value="<?php echo HtmlEncode($t001_jo_list->Tujuan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Kapal->Visible) { // Kapal ?>
		<td data-name="Kapal">
<span id="el$rowindex$_t001_jo_Kapal" class="form-group t001_jo_Kapal">
<input type="text" data-table="t001_jo" data-field="x_Kapal" name="x<?php echo $t001_jo_list->RowIndex ?>_Kapal" id="x<?php echo $t001_jo_list->RowIndex ?>_Kapal" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t001_jo_list->Kapal->getPlaceHolder()) ?>" value="<?php echo $t001_jo_list->Kapal->EditValue ?>"<?php echo $t001_jo_list->Kapal->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Kapal" name="o<?php echo $t001_jo_list->RowIndex ?>_Kapal" id="o<?php echo $t001_jo_list->RowIndex ?>_Kapal" value="<?php echo HtmlEncode($t001_jo_list->Kapal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t001_jo_list->Doc->Visible) { // Doc ?>
		<td data-name="Doc">
<span id="el$rowindex$_t001_jo_Doc" class="form-group t001_jo_Doc">
<div id="fd_x<?php echo $t001_jo_list->RowIndex ?>_Doc">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $t001_jo_list->Doc->title() ?>" data-table="t001_jo" data-field="x_Doc" name="x<?php echo $t001_jo_list->RowIndex ?>_Doc" id="x<?php echo $t001_jo_list->RowIndex ?>_Doc" lang="<?php echo CurrentLanguageID() ?>"<?php echo $t001_jo_list->Doc->editAttributes() ?><?php if ($t001_jo_list->Doc->ReadOnly || $t001_jo_list->Doc->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $t001_jo_list->RowIndex ?>_Doc"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $t001_jo_list->RowIndex ?>_Doc" id= "fn_x<?php echo $t001_jo_list->RowIndex ?>_Doc" value="<?php echo $t001_jo_list->Doc->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $t001_jo_list->RowIndex ?>_Doc" id= "fa_x<?php echo $t001_jo_list->RowIndex ?>_Doc" value="0">
<input type="hidden" name="fs_x<?php echo $t001_jo_list->RowIndex ?>_Doc" id= "fs_x<?php echo $t001_jo_list->RowIndex ?>_Doc" value="255">
<input type="hidden" name="fx_x<?php echo $t001_jo_list->RowIndex ?>_Doc" id= "fx_x<?php echo $t001_jo_list->RowIndex ?>_Doc" value="<?php echo $t001_jo_list->Doc->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $t001_jo_list->RowIndex ?>_Doc" id= "fm_x<?php echo $t001_jo_list->RowIndex ?>_Doc" value="<?php echo $t001_jo_list->Doc->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $t001_jo_list->RowIndex ?>_Doc" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="t001_jo" data-field="x_Doc" name="o<?php echo $t001_jo_list->RowIndex ?>_Doc" id="o<?php echo $t001_jo_list->RowIndex ?>_Doc" value="<?php echo HtmlEncode($t001_jo_list->Doc->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t001_jo_list->ListOptions->render("body", "right", $t001_jo_list->RowIndex);
?>
<script>
loadjs.ready(["ft001_jolist", "load"], function() {
	ft001_jolist.updateLists(<?php echo $t001_jo_list->RowIndex ?>);
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
<?php if ($t001_jo_list->isAdd() || $t001_jo_list->isCopy()) { ?>
<input type="hidden" name="<?php echo $t001_jo_list->FormKeyCountName ?>" id="<?php echo $t001_jo_list->FormKeyCountName ?>" value="<?php echo $t001_jo_list->KeyCount ?>">
<?php } ?>
<?php if ($t001_jo_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t001_jo_list->FormKeyCountName ?>" id="<?php echo $t001_jo_list->FormKeyCountName ?>" value="<?php echo $t001_jo_list->KeyCount ?>">
<?php echo $t001_jo_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t001_jo_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $t001_jo_list->FormKeyCountName ?>" id="<?php echo $t001_jo_list->FormKeyCountName ?>" value="<?php echo $t001_jo_list->KeyCount ?>">
<?php } ?>
<?php if ($t001_jo_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t001_jo_list->FormKeyCountName ?>" id="<?php echo $t001_jo_list->FormKeyCountName ?>" value="<?php echo $t001_jo_list->KeyCount ?>">
<?php echo $t001_jo_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t001_jo->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t001_jo_list->Recordset)
	$t001_jo_list->Recordset->Close();
?>
<?php if (!$t001_jo_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t001_jo_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t001_jo_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t001_jo_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t001_jo_list->TotalRecords == 0 && !$t001_jo->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t001_jo_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t001_jo_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t001_jo_list->isExport()) { ?>
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
$t001_jo_list->terminate();
?>