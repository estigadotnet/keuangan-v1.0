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
$t102_mutasi_list = new t102_mutasi_list();

// Run the page
$t102_mutasi_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_mutasi_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t102_mutasi_list->isExport()) { ?>
<script>
var ft102_mutasilist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft102_mutasilist = currentForm = new ew.Form("ft102_mutasilist", "list");
	ft102_mutasilist.formKeyCountName = '<?php echo $t102_mutasi_list->FormKeyCountName ?>';

	// Validate form
	ft102_mutasilist.validate = function() {
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
			<?php if ($t102_mutasi_list->Tanggal->Required) { ?>
				elm = this.getElements("x" + infix + "_Tanggal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_mutasi_list->Tanggal->caption(), $t102_mutasi_list->Tanggal->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Tanggal");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_mutasi_list->Tanggal->errorMessage()) ?>");
			<?php if ($t102_mutasi_list->NoUrut->Required) { ?>
				elm = this.getElements("x" + infix + "_NoUrut");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_mutasi_list->NoUrut->caption(), $t102_mutasi_list->NoUrut->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoUrut");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_mutasi_list->NoUrut->errorMessage()) ?>");
			<?php if ($t102_mutasi_list->jo_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jo_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_mutasi_list->jo_id->caption(), $t102_mutasi_list->jo_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t102_mutasi_list->jenis_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jenis_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_mutasi_list->jenis_id->caption(), $t102_mutasi_list->jenis_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t102_mutasi_list->Comment->Required) { ?>
				elm = this.getElements("x" + infix + "_Comment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_mutasi_list->Comment->caption(), $t102_mutasi_list->Comment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t102_mutasi_list->Masuk->Required) { ?>
				elm = this.getElements("x" + infix + "_Masuk");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_mutasi_list->Masuk->caption(), $t102_mutasi_list->Masuk->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Masuk");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_mutasi_list->Masuk->errorMessage()) ?>");
			<?php if ($t102_mutasi_list->Keluar->Required) { ?>
				elm = this.getElements("x" + infix + "_Keluar");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_mutasi_list->Keluar->caption(), $t102_mutasi_list->Keluar->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Keluar");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_mutasi_list->Keluar->errorMessage()) ?>");

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
	ft102_mutasilist.emptyRow = function(infix) {
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
	ft102_mutasilist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft102_mutasilist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft102_mutasilist.lists["x_jo_id"] = <?php echo $t102_mutasi_list->jo_id->Lookup->toClientList($t102_mutasi_list) ?>;
	ft102_mutasilist.lists["x_jo_id"].options = <?php echo JsonEncode($t102_mutasi_list->jo_id->lookupOptions()) ?>;
	ft102_mutasilist.lists["x_jenis_id"] = <?php echo $t102_mutasi_list->jenis_id->Lookup->toClientList($t102_mutasi_list) ?>;
	ft102_mutasilist.lists["x_jenis_id"].options = <?php echo JsonEncode($t102_mutasi_list->jenis_id->lookupOptions()) ?>;
	loadjs.done("ft102_mutasilist");
});
var ft102_mutasilistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft102_mutasilistsrch = currentSearchForm = new ew.Form("ft102_mutasilistsrch");

	// Validate function for search
	ft102_mutasilistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_Tanggal");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t102_mutasi_list->Tanggal->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	ft102_mutasilistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft102_mutasilistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft102_mutasilistsrch.lists["x_jo_id"] = <?php echo $t102_mutasi_list->jo_id->Lookup->toClientList($t102_mutasi_list) ?>;
	ft102_mutasilistsrch.lists["x_jo_id"].options = <?php echo JsonEncode($t102_mutasi_list->jo_id->lookupOptions()) ?>;
	ft102_mutasilistsrch.lists["x_jenis_id"] = <?php echo $t102_mutasi_list->jenis_id->Lookup->toClientList($t102_mutasi_list) ?>;
	ft102_mutasilistsrch.lists["x_jenis_id"].options = <?php echo JsonEncode($t102_mutasi_list->jenis_id->lookupOptions()) ?>;

	// Filters
	ft102_mutasilistsrch.filterList = <?php echo $t102_mutasi_list->getFilterList() ?>;
	loadjs.done("ft102_mutasilistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t102_mutasi_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t102_mutasi_list->TotalRecords > 0 && $t102_mutasi_list->ExportOptions->visible()) { ?>
<?php $t102_mutasi_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t102_mutasi_list->ImportOptions->visible()) { ?>
<?php $t102_mutasi_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t102_mutasi_list->SearchOptions->visible()) { ?>
<?php $t102_mutasi_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t102_mutasi_list->FilterOptions->visible()) { ?>
<?php $t102_mutasi_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t102_mutasi_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t102_mutasi_list->isExport() && !$t102_mutasi->CurrentAction) { ?>
<form name="ft102_mutasilistsrch" id="ft102_mutasilistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft102_mutasilistsrch-search-panel" class="<?php echo $t102_mutasi_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t102_mutasi">
	<div class="ew-extended-search">
<?php

// Render search row
$t102_mutasi->RowType = ROWTYPE_SEARCH;
$t102_mutasi->resetAttributes();
$t102_mutasi_list->renderRow();
?>
<?php if ($t102_mutasi_list->Tanggal->Visible) { // Tanggal ?>
	<?php
		$t102_mutasi_list->SearchColumnCount++;
		if (($t102_mutasi_list->SearchColumnCount - 1) % $t102_mutasi_list->SearchFieldsPerRow == 0) {
			$t102_mutasi_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $t102_mutasi_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Tanggal" class="ew-cell form-group">
		<label for="x_Tanggal" class="ew-search-caption ew-label"><?php echo $t102_mutasi_list->Tanggal->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_Tanggal" id="z_Tanggal" value="BETWEEN">
</span>
		<span id="el_t102_mutasi_Tanggal" class="ew-search-field">
<input type="text" data-table="t102_mutasi" data-field="x_Tanggal" data-format="7" name="x_Tanggal" id="x_Tanggal" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t102_mutasi_list->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_list->Tanggal->EditValue ?>"<?php echo $t102_mutasi_list->Tanggal->editAttributes() ?>>
<?php if (!$t102_mutasi_list->Tanggal->ReadOnly && !$t102_mutasi_list->Tanggal->Disabled && !isset($t102_mutasi_list->Tanggal->EditAttrs["readonly"]) && !isset($t102_mutasi_list->Tanggal->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft102_mutasilistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("ft102_mutasilistsrch", "x_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_t102_mutasi_Tanggal" class="ew-search-field2">
<input type="text" data-table="t102_mutasi" data-field="x_Tanggal" data-format="7" name="y_Tanggal" id="y_Tanggal" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t102_mutasi_list->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_list->Tanggal->EditValue2 ?>"<?php echo $t102_mutasi_list->Tanggal->editAttributes() ?>>
<?php if (!$t102_mutasi_list->Tanggal->ReadOnly && !$t102_mutasi_list->Tanggal->Disabled && !isset($t102_mutasi_list->Tanggal->EditAttrs["readonly"]) && !isset($t102_mutasi_list->Tanggal->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft102_mutasilistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("ft102_mutasilistsrch", "y_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($t102_mutasi_list->SearchColumnCount % $t102_mutasi_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($t102_mutasi_list->jo_id->Visible) { // jo_id ?>
	<?php
		$t102_mutasi_list->SearchColumnCount++;
		if (($t102_mutasi_list->SearchColumnCount - 1) % $t102_mutasi_list->SearchFieldsPerRow == 0) {
			$t102_mutasi_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $t102_mutasi_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_jo_id" class="ew-cell form-group">
		<label for="x_jo_id" class="ew-search-caption ew-label"><?php echo $t102_mutasi_list->jo_id->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_jo_id" id="z_jo_id" value="=">
</span>
		<span id="el_t102_mutasi_jo_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_jo_id"><?php echo EmptyValue(strval($t102_mutasi_list->jo_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_mutasi_list->jo_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_mutasi_list->jo_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_mutasi_list->jo_id->ReadOnly || $t102_mutasi_list->jo_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_jo_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t102_mutasi_list->jo_id->Lookup->getParamTag($t102_mutasi_list, "p_x_jo_id") ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jo_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_mutasi_list->jo_id->displayValueSeparatorAttribute() ?>" name="x_jo_id" id="x_jo_id" value="<?php echo $t102_mutasi_list->jo_id->AdvancedSearch->SearchValue ?>"<?php echo $t102_mutasi_list->jo_id->editAttributes() ?>>
</span>
	</div>
	<?php if ($t102_mutasi_list->SearchColumnCount % $t102_mutasi_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($t102_mutasi_list->jenis_id->Visible) { // jenis_id ?>
	<?php
		$t102_mutasi_list->SearchColumnCount++;
		if (($t102_mutasi_list->SearchColumnCount - 1) % $t102_mutasi_list->SearchFieldsPerRow == 0) {
			$t102_mutasi_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $t102_mutasi_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_jenis_id" class="ew-cell form-group">
		<label for="x_jenis_id" class="ew-search-caption ew-label"><?php echo $t102_mutasi_list->jenis_id->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_jenis_id" id="z_jenis_id" value="=">
</span>
		<span id="el_t102_mutasi_jenis_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_jenis_id"><?php echo EmptyValue(strval($t102_mutasi_list->jenis_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_mutasi_list->jenis_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_mutasi_list->jenis_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_mutasi_list->jenis_id->ReadOnly || $t102_mutasi_list->jenis_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_jenis_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t102_mutasi_list->jenis_id->Lookup->getParamTag($t102_mutasi_list, "p_x_jenis_id") ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jenis_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_mutasi_list->jenis_id->displayValueSeparatorAttribute() ?>" name="x_jenis_id" id="x_jenis_id" value="<?php echo $t102_mutasi_list->jenis_id->AdvancedSearch->SearchValue ?>"<?php echo $t102_mutasi_list->jenis_id->editAttributes() ?>>
</span>
	</div>
	<?php if ($t102_mutasi_list->SearchColumnCount % $t102_mutasi_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($t102_mutasi_list->SearchColumnCount % $t102_mutasi_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $t102_mutasi_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t102_mutasi_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t102_mutasi_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t102_mutasi_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t102_mutasi_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t102_mutasi_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t102_mutasi_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t102_mutasi_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $t102_mutasi_list->showPageHeader(); ?>
<?php
$t102_mutasi_list->showMessage();
?>
<?php if ($t102_mutasi_list->TotalRecords > 0 || $t102_mutasi->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t102_mutasi_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t102_mutasi">
<?php if (!$t102_mutasi_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$t102_mutasi_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t102_mutasi_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t102_mutasi_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ft102_mutasilist" id="ft102_mutasilist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_mutasi">
<div id="gmp_t102_mutasi" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t102_mutasi_list->TotalRecords > 0 || $t102_mutasi_list->isAdd() || $t102_mutasi_list->isCopy() || $t102_mutasi_list->isGridEdit()) { ?>
<table id="tbl_t102_mutasilist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t102_mutasi->RowType = ROWTYPE_HEADER;

// Render list options
$t102_mutasi_list->renderListOptions();

// Render list options (header, left)
$t102_mutasi_list->ListOptions->render("header", "left");
?>
<?php if ($t102_mutasi_list->Tanggal->Visible) { // Tanggal ?>
	<?php if ($t102_mutasi_list->SortUrl($t102_mutasi_list->Tanggal) == "") { ?>
		<th data-name="Tanggal" class="<?php echo $t102_mutasi_list->Tanggal->headerCellClass() ?>"><div id="elh_t102_mutasi_Tanggal" class="t102_mutasi_Tanggal"><div class="ew-table-header-caption"><?php echo $t102_mutasi_list->Tanggal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tanggal" class="<?php echo $t102_mutasi_list->Tanggal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t102_mutasi_list->SortUrl($t102_mutasi_list->Tanggal) ?>', 2);"><div id="elh_t102_mutasi_Tanggal" class="t102_mutasi_Tanggal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_mutasi_list->Tanggal->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t102_mutasi_list->Tanggal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_mutasi_list->Tanggal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_mutasi_list->NoUrut->Visible) { // NoUrut ?>
	<?php if ($t102_mutasi_list->SortUrl($t102_mutasi_list->NoUrut) == "") { ?>
		<th data-name="NoUrut" class="<?php echo $t102_mutasi_list->NoUrut->headerCellClass() ?>"><div id="elh_t102_mutasi_NoUrut" class="t102_mutasi_NoUrut"><div class="ew-table-header-caption"><?php echo $t102_mutasi_list->NoUrut->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoUrut" class="<?php echo $t102_mutasi_list->NoUrut->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t102_mutasi_list->SortUrl($t102_mutasi_list->NoUrut) ?>', 2);"><div id="elh_t102_mutasi_NoUrut" class="t102_mutasi_NoUrut">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_mutasi_list->NoUrut->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t102_mutasi_list->NoUrut->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_mutasi_list->NoUrut->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_mutasi_list->jo_id->Visible) { // jo_id ?>
	<?php if ($t102_mutasi_list->SortUrl($t102_mutasi_list->jo_id) == "") { ?>
		<th data-name="jo_id" class="<?php echo $t102_mutasi_list->jo_id->headerCellClass() ?>"><div id="elh_t102_mutasi_jo_id" class="t102_mutasi_jo_id"><div class="ew-table-header-caption"><?php echo $t102_mutasi_list->jo_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jo_id" class="<?php echo $t102_mutasi_list->jo_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t102_mutasi_list->SortUrl($t102_mutasi_list->jo_id) ?>', 2);"><div id="elh_t102_mutasi_jo_id" class="t102_mutasi_jo_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_mutasi_list->jo_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_mutasi_list->jo_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_mutasi_list->jo_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_mutasi_list->jenis_id->Visible) { // jenis_id ?>
	<?php if ($t102_mutasi_list->SortUrl($t102_mutasi_list->jenis_id) == "") { ?>
		<th data-name="jenis_id" class="<?php echo $t102_mutasi_list->jenis_id->headerCellClass() ?>"><div id="elh_t102_mutasi_jenis_id" class="t102_mutasi_jenis_id"><div class="ew-table-header-caption"><?php echo $t102_mutasi_list->jenis_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenis_id" class="<?php echo $t102_mutasi_list->jenis_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t102_mutasi_list->SortUrl($t102_mutasi_list->jenis_id) ?>', 2);"><div id="elh_t102_mutasi_jenis_id" class="t102_mutasi_jenis_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_mutasi_list->jenis_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_mutasi_list->jenis_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_mutasi_list->jenis_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_mutasi_list->Comment->Visible) { // Comment ?>
	<?php if ($t102_mutasi_list->SortUrl($t102_mutasi_list->Comment) == "") { ?>
		<th data-name="Comment" class="<?php echo $t102_mutasi_list->Comment->headerCellClass() ?>"><div id="elh_t102_mutasi_Comment" class="t102_mutasi_Comment"><div class="ew-table-header-caption"><?php echo $t102_mutasi_list->Comment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Comment" class="<?php echo $t102_mutasi_list->Comment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t102_mutasi_list->SortUrl($t102_mutasi_list->Comment) ?>', 2);"><div id="elh_t102_mutasi_Comment" class="t102_mutasi_Comment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_mutasi_list->Comment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t102_mutasi_list->Comment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_mutasi_list->Comment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_mutasi_list->Masuk->Visible) { // Masuk ?>
	<?php if ($t102_mutasi_list->SortUrl($t102_mutasi_list->Masuk) == "") { ?>
		<th data-name="Masuk" class="<?php echo $t102_mutasi_list->Masuk->headerCellClass() ?>"><div id="elh_t102_mutasi_Masuk" class="t102_mutasi_Masuk"><div class="ew-table-header-caption"><?php echo $t102_mutasi_list->Masuk->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Masuk" class="<?php echo $t102_mutasi_list->Masuk->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t102_mutasi_list->SortUrl($t102_mutasi_list->Masuk) ?>', 2);"><div id="elh_t102_mutasi_Masuk" class="t102_mutasi_Masuk">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_mutasi_list->Masuk->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_mutasi_list->Masuk->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_mutasi_list->Masuk->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_mutasi_list->Keluar->Visible) { // Keluar ?>
	<?php if ($t102_mutasi_list->SortUrl($t102_mutasi_list->Keluar) == "") { ?>
		<th data-name="Keluar" class="<?php echo $t102_mutasi_list->Keluar->headerCellClass() ?>"><div id="elh_t102_mutasi_Keluar" class="t102_mutasi_Keluar"><div class="ew-table-header-caption"><?php echo $t102_mutasi_list->Keluar->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Keluar" class="<?php echo $t102_mutasi_list->Keluar->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t102_mutasi_list->SortUrl($t102_mutasi_list->Keluar) ?>', 2);"><div id="elh_t102_mutasi_Keluar" class="t102_mutasi_Keluar">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_mutasi_list->Keluar->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_mutasi_list->Keluar->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_mutasi_list->Keluar->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t102_mutasi_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($t102_mutasi_list->isAdd() || $t102_mutasi_list->isCopy()) {
		$t102_mutasi_list->RowIndex = 0;
		$t102_mutasi_list->KeyCount = $t102_mutasi_list->RowIndex;
		if ($t102_mutasi_list->isCopy() && !$t102_mutasi_list->loadRow())
			$t102_mutasi->CurrentAction = "add";
		if ($t102_mutasi_list->isAdd())
			$t102_mutasi_list->loadRowValues();
		if ($t102_mutasi->EventCancelled) // Insert failed
			$t102_mutasi_list->restoreFormValues(); // Restore form values

		// Set row properties
		$t102_mutasi->resetAttributes();
		$t102_mutasi->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_t102_mutasi", "data-rowtype" => ROWTYPE_ADD]);
		$t102_mutasi->RowType = ROWTYPE_ADD;

		// Render row
		$t102_mutasi_list->renderRow();

		// Render list options
		$t102_mutasi_list->renderListOptions();
		$t102_mutasi_list->StartRowCount = 0;
?>
	<tr <?php echo $t102_mutasi->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t102_mutasi_list->ListOptions->render("body", "left", $t102_mutasi_list->RowCount);
?>
	<?php if ($t102_mutasi_list->Tanggal->Visible) { // Tanggal ?>
		<td data-name="Tanggal">
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_Tanggal" class="form-group t102_mutasi_Tanggal">
<input type="text" data-table="t102_mutasi" data-field="x_Tanggal" data-format="7" name="x<?php echo $t102_mutasi_list->RowIndex ?>_Tanggal" id="x<?php echo $t102_mutasi_list->RowIndex ?>_Tanggal" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t102_mutasi_list->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_list->Tanggal->EditValue ?>"<?php echo $t102_mutasi_list->Tanggal->editAttributes() ?>>
<?php if (!$t102_mutasi_list->Tanggal->ReadOnly && !$t102_mutasi_list->Tanggal->Disabled && !isset($t102_mutasi_list->Tanggal->EditAttrs["readonly"]) && !isset($t102_mutasi_list->Tanggal->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft102_mutasilist", "datetimepicker"], function() {
	ew.createDateTimePicker("ft102_mutasilist", "x<?php echo $t102_mutasi_list->RowIndex ?>_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_Tanggal" name="o<?php echo $t102_mutasi_list->RowIndex ?>_Tanggal" id="o<?php echo $t102_mutasi_list->RowIndex ?>_Tanggal" value="<?php echo HtmlEncode($t102_mutasi_list->Tanggal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_mutasi_list->NoUrut->Visible) { // NoUrut ?>
		<td data-name="NoUrut">
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_NoUrut" class="form-group t102_mutasi_NoUrut">
<input type="text" data-table="t102_mutasi" data-field="x_NoUrut" name="x<?php echo $t102_mutasi_list->RowIndex ?>_NoUrut" id="x<?php echo $t102_mutasi_list->RowIndex ?>_NoUrut" size="3" maxlength="4" placeholder="<?php echo HtmlEncode($t102_mutasi_list->NoUrut->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_list->NoUrut->EditValue ?>"<?php echo $t102_mutasi_list->NoUrut->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_NoUrut" name="o<?php echo $t102_mutasi_list->RowIndex ?>_NoUrut" id="o<?php echo $t102_mutasi_list->RowIndex ?>_NoUrut" value="<?php echo HtmlEncode($t102_mutasi_list->NoUrut->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_mutasi_list->jo_id->Visible) { // jo_id ?>
		<td data-name="jo_id">
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_jo_id" class="form-group t102_mutasi_jo_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id"><?php echo EmptyValue(strval($t102_mutasi_list->jo_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_mutasi_list->jo_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_mutasi_list->jo_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_mutasi_list->jo_id->ReadOnly || $t102_mutasi_list->jo_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t001_jo") && !$t102_mutasi_list->jo_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_mutasi_list->jo_id->caption() ?>" data-title="<?php echo $t102_mutasi_list->jo_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id',url:'t001_joaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t102_mutasi_list->jo_id->Lookup->getParamTag($t102_mutasi_list, "p_x" . $t102_mutasi_list->RowIndex . "_jo_id") ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jo_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_mutasi_list->jo_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id" id="x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id" value="<?php echo $t102_mutasi_list->jo_id->CurrentValue ?>"<?php echo $t102_mutasi_list->jo_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_jo_id" name="o<?php echo $t102_mutasi_list->RowIndex ?>_jo_id" id="o<?php echo $t102_mutasi_list->RowIndex ?>_jo_id" value="<?php echo HtmlEncode($t102_mutasi_list->jo_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_mutasi_list->jenis_id->Visible) { // jenis_id ?>
		<td data-name="jenis_id">
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_jenis_id" class="form-group t102_mutasi_jenis_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id"><?php echo EmptyValue(strval($t102_mutasi_list->jenis_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_mutasi_list->jenis_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_mutasi_list->jenis_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_mutasi_list->jenis_id->ReadOnly || $t102_mutasi_list->jenis_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t002_jenis") && !$t102_mutasi_list->jenis_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_mutasi_list->jenis_id->caption() ?>" data-title="<?php echo $t102_mutasi_list->jenis_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id',url:'t002_jenisaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t102_mutasi_list->jenis_id->Lookup->getParamTag($t102_mutasi_list, "p_x" . $t102_mutasi_list->RowIndex . "_jenis_id") ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jenis_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_mutasi_list->jenis_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id" id="x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id" value="<?php echo $t102_mutasi_list->jenis_id->CurrentValue ?>"<?php echo $t102_mutasi_list->jenis_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_jenis_id" name="o<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id" id="o<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id" value="<?php echo HtmlEncode($t102_mutasi_list->jenis_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_mutasi_list->Comment->Visible) { // Comment ?>
		<td data-name="Comment">
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_Comment" class="form-group t102_mutasi_Comment">
<textarea data-table="t102_mutasi" data-field="x_Comment" name="x<?php echo $t102_mutasi_list->RowIndex ?>_Comment" id="x<?php echo $t102_mutasi_list->RowIndex ?>_Comment" cols="25" rows="1" placeholder="<?php echo HtmlEncode($t102_mutasi_list->Comment->getPlaceHolder()) ?>"<?php echo $t102_mutasi_list->Comment->editAttributes() ?>><?php echo $t102_mutasi_list->Comment->EditValue ?></textarea>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_Comment" name="o<?php echo $t102_mutasi_list->RowIndex ?>_Comment" id="o<?php echo $t102_mutasi_list->RowIndex ?>_Comment" value="<?php echo HtmlEncode($t102_mutasi_list->Comment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_mutasi_list->Masuk->Visible) { // Masuk ?>
		<td data-name="Masuk">
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_Masuk" class="form-group t102_mutasi_Masuk">
<input type="text" data-table="t102_mutasi" data-field="x_Masuk" name="x<?php echo $t102_mutasi_list->RowIndex ?>_Masuk" id="x<?php echo $t102_mutasi_list->RowIndex ?>_Masuk" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t102_mutasi_list->Masuk->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_list->Masuk->EditValue ?>"<?php echo $t102_mutasi_list->Masuk->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_Masuk" name="o<?php echo $t102_mutasi_list->RowIndex ?>_Masuk" id="o<?php echo $t102_mutasi_list->RowIndex ?>_Masuk" value="<?php echo HtmlEncode($t102_mutasi_list->Masuk->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_mutasi_list->Keluar->Visible) { // Keluar ?>
		<td data-name="Keluar">
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_Keluar" class="form-group t102_mutasi_Keluar">
<input type="text" data-table="t102_mutasi" data-field="x_Keluar" name="x<?php echo $t102_mutasi_list->RowIndex ?>_Keluar" id="x<?php echo $t102_mutasi_list->RowIndex ?>_Keluar" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t102_mutasi_list->Keluar->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_list->Keluar->EditValue ?>"<?php echo $t102_mutasi_list->Keluar->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_Keluar" name="o<?php echo $t102_mutasi_list->RowIndex ?>_Keluar" id="o<?php echo $t102_mutasi_list->RowIndex ?>_Keluar" value="<?php echo HtmlEncode($t102_mutasi_list->Keluar->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t102_mutasi_list->ListOptions->render("body", "right", $t102_mutasi_list->RowCount);
?>
<script>
loadjs.ready(["ft102_mutasilist", "load"], function() {
	ft102_mutasilist.updateLists(<?php echo $t102_mutasi_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
<?php
if ($t102_mutasi_list->ExportAll && $t102_mutasi_list->isExport()) {
	$t102_mutasi_list->StopRecord = $t102_mutasi_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t102_mutasi_list->TotalRecords > $t102_mutasi_list->StartRecord + $t102_mutasi_list->DisplayRecords - 1)
		$t102_mutasi_list->StopRecord = $t102_mutasi_list->StartRecord + $t102_mutasi_list->DisplayRecords - 1;
	else
		$t102_mutasi_list->StopRecord = $t102_mutasi_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t102_mutasi->isConfirm() || $t102_mutasi_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t102_mutasi_list->FormKeyCountName) && ($t102_mutasi_list->isGridAdd() || $t102_mutasi_list->isGridEdit() || $t102_mutasi->isConfirm())) {
		$t102_mutasi_list->KeyCount = $CurrentForm->getValue($t102_mutasi_list->FormKeyCountName);
		$t102_mutasi_list->StopRecord = $t102_mutasi_list->StartRecord + $t102_mutasi_list->KeyCount - 1;
	}
}
$t102_mutasi_list->RecordCount = $t102_mutasi_list->StartRecord - 1;
if ($t102_mutasi_list->Recordset && !$t102_mutasi_list->Recordset->EOF) {
	$t102_mutasi_list->Recordset->moveFirst();
	$selectLimit = $t102_mutasi_list->UseSelectLimit;
	if (!$selectLimit && $t102_mutasi_list->StartRecord > 1)
		$t102_mutasi_list->Recordset->move($t102_mutasi_list->StartRecord - 1);
} elseif (!$t102_mutasi->AllowAddDeleteRow && $t102_mutasi_list->StopRecord == 0) {
	$t102_mutasi_list->StopRecord = $t102_mutasi->GridAddRowCount;
}

// Initialize aggregate
$t102_mutasi->RowType = ROWTYPE_AGGREGATEINIT;
$t102_mutasi->resetAttributes();
$t102_mutasi_list->renderRow();
$t102_mutasi_list->EditRowCount = 0;
if ($t102_mutasi_list->isEdit())
	$t102_mutasi_list->RowIndex = 1;
if ($t102_mutasi_list->isGridAdd())
	$t102_mutasi_list->RowIndex = 0;
if ($t102_mutasi_list->isGridEdit())
	$t102_mutasi_list->RowIndex = 0;
while ($t102_mutasi_list->RecordCount < $t102_mutasi_list->StopRecord) {
	$t102_mutasi_list->RecordCount++;
	if ($t102_mutasi_list->RecordCount >= $t102_mutasi_list->StartRecord) {
		$t102_mutasi_list->RowCount++;
		if ($t102_mutasi_list->isGridAdd() || $t102_mutasi_list->isGridEdit() || $t102_mutasi->isConfirm()) {
			$t102_mutasi_list->RowIndex++;
			$CurrentForm->Index = $t102_mutasi_list->RowIndex;
			if ($CurrentForm->hasValue($t102_mutasi_list->FormActionName) && ($t102_mutasi->isConfirm() || $t102_mutasi_list->EventCancelled))
				$t102_mutasi_list->RowAction = strval($CurrentForm->getValue($t102_mutasi_list->FormActionName));
			elseif ($t102_mutasi_list->isGridAdd())
				$t102_mutasi_list->RowAction = "insert";
			else
				$t102_mutasi_list->RowAction = "";
		}

		// Set up key count
		$t102_mutasi_list->KeyCount = $t102_mutasi_list->RowIndex;

		// Init row class and style
		$t102_mutasi->resetAttributes();
		$t102_mutasi->CssClass = "";
		if ($t102_mutasi_list->isGridAdd()) {
			$t102_mutasi_list->loadRowValues(); // Load default values
		} else {
			$t102_mutasi_list->loadRowValues($t102_mutasi_list->Recordset); // Load row values
		}
		$t102_mutasi->RowType = ROWTYPE_VIEW; // Render view
		if ($t102_mutasi_list->isGridAdd()) // Grid add
			$t102_mutasi->RowType = ROWTYPE_ADD; // Render add
		if ($t102_mutasi_list->isGridAdd() && $t102_mutasi->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t102_mutasi_list->restoreCurrentRowFormValues($t102_mutasi_list->RowIndex); // Restore form values
		if ($t102_mutasi_list->isEdit()) {
			if ($t102_mutasi_list->checkInlineEditKey() && $t102_mutasi_list->EditRowCount == 0) { // Inline edit
				$t102_mutasi->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($t102_mutasi_list->isGridEdit()) { // Grid edit
			if ($t102_mutasi->EventCancelled)
				$t102_mutasi_list->restoreCurrentRowFormValues($t102_mutasi_list->RowIndex); // Restore form values
			if ($t102_mutasi_list->RowAction == "insert")
				$t102_mutasi->RowType = ROWTYPE_ADD; // Render add
			else
				$t102_mutasi->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t102_mutasi_list->isEdit() && $t102_mutasi->RowType == ROWTYPE_EDIT && $t102_mutasi->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$t102_mutasi_list->restoreFormValues(); // Restore form values
		}
		if ($t102_mutasi_list->isGridEdit() && ($t102_mutasi->RowType == ROWTYPE_EDIT || $t102_mutasi->RowType == ROWTYPE_ADD) && $t102_mutasi->EventCancelled) // Update failed
			$t102_mutasi_list->restoreCurrentRowFormValues($t102_mutasi_list->RowIndex); // Restore form values
		if ($t102_mutasi->RowType == ROWTYPE_EDIT) // Edit row
			$t102_mutasi_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t102_mutasi->RowAttrs->merge(["data-rowindex" => $t102_mutasi_list->RowCount, "id" => "r" . $t102_mutasi_list->RowCount . "_t102_mutasi", "data-rowtype" => $t102_mutasi->RowType]);

		// Render row
		$t102_mutasi_list->renderRow();

		// Render list options
		$t102_mutasi_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t102_mutasi_list->RowAction != "delete" && $t102_mutasi_list->RowAction != "insertdelete" && !($t102_mutasi_list->RowAction == "insert" && $t102_mutasi->isConfirm() && $t102_mutasi_list->emptyRow())) {
?>
	<tr <?php echo $t102_mutasi->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t102_mutasi_list->ListOptions->render("body", "left", $t102_mutasi_list->RowCount);
?>
	<?php if ($t102_mutasi_list->Tanggal->Visible) { // Tanggal ?>
		<td data-name="Tanggal" <?php echo $t102_mutasi_list->Tanggal->cellAttributes() ?>>
<?php if ($t102_mutasi->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_Tanggal" class="form-group">
<input type="text" data-table="t102_mutasi" data-field="x_Tanggal" data-format="7" name="x<?php echo $t102_mutasi_list->RowIndex ?>_Tanggal" id="x<?php echo $t102_mutasi_list->RowIndex ?>_Tanggal" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t102_mutasi_list->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_list->Tanggal->EditValue ?>"<?php echo $t102_mutasi_list->Tanggal->editAttributes() ?>>
<?php if (!$t102_mutasi_list->Tanggal->ReadOnly && !$t102_mutasi_list->Tanggal->Disabled && !isset($t102_mutasi_list->Tanggal->EditAttrs["readonly"]) && !isset($t102_mutasi_list->Tanggal->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft102_mutasilist", "datetimepicker"], function() {
	ew.createDateTimePicker("ft102_mutasilist", "x<?php echo $t102_mutasi_list->RowIndex ?>_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_Tanggal" name="o<?php echo $t102_mutasi_list->RowIndex ?>_Tanggal" id="o<?php echo $t102_mutasi_list->RowIndex ?>_Tanggal" value="<?php echo HtmlEncode($t102_mutasi_list->Tanggal->OldValue) ?>">
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_Tanggal" class="form-group">
<input type="text" data-table="t102_mutasi" data-field="x_Tanggal" data-format="7" name="x<?php echo $t102_mutasi_list->RowIndex ?>_Tanggal" id="x<?php echo $t102_mutasi_list->RowIndex ?>_Tanggal" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t102_mutasi_list->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_list->Tanggal->EditValue ?>"<?php echo $t102_mutasi_list->Tanggal->editAttributes() ?>>
<?php if (!$t102_mutasi_list->Tanggal->ReadOnly && !$t102_mutasi_list->Tanggal->Disabled && !isset($t102_mutasi_list->Tanggal->EditAttrs["readonly"]) && !isset($t102_mutasi_list->Tanggal->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft102_mutasilist", "datetimepicker"], function() {
	ew.createDateTimePicker("ft102_mutasilist", "x<?php echo $t102_mutasi_list->RowIndex ?>_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_Tanggal">
<span<?php echo $t102_mutasi_list->Tanggal->viewAttributes() ?>><?php echo $t102_mutasi_list->Tanggal->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_id" name="x<?php echo $t102_mutasi_list->RowIndex ?>_id" id="x<?php echo $t102_mutasi_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_mutasi_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t102_mutasi" data-field="x_id" name="o<?php echo $t102_mutasi_list->RowIndex ?>_id" id="o<?php echo $t102_mutasi_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_mutasi_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_EDIT || $t102_mutasi->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_id" name="x<?php echo $t102_mutasi_list->RowIndex ?>_id" id="x<?php echo $t102_mutasi_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_mutasi_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t102_mutasi_list->NoUrut->Visible) { // NoUrut ?>
		<td data-name="NoUrut" <?php echo $t102_mutasi_list->NoUrut->cellAttributes() ?>>
<?php if ($t102_mutasi->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_NoUrut" class="form-group">
<input type="text" data-table="t102_mutasi" data-field="x_NoUrut" name="x<?php echo $t102_mutasi_list->RowIndex ?>_NoUrut" id="x<?php echo $t102_mutasi_list->RowIndex ?>_NoUrut" size="3" maxlength="4" placeholder="<?php echo HtmlEncode($t102_mutasi_list->NoUrut->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_list->NoUrut->EditValue ?>"<?php echo $t102_mutasi_list->NoUrut->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_NoUrut" name="o<?php echo $t102_mutasi_list->RowIndex ?>_NoUrut" id="o<?php echo $t102_mutasi_list->RowIndex ?>_NoUrut" value="<?php echo HtmlEncode($t102_mutasi_list->NoUrut->OldValue) ?>">
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_NoUrut" class="form-group">
<input type="text" data-table="t102_mutasi" data-field="x_NoUrut" name="x<?php echo $t102_mutasi_list->RowIndex ?>_NoUrut" id="x<?php echo $t102_mutasi_list->RowIndex ?>_NoUrut" size="3" maxlength="4" placeholder="<?php echo HtmlEncode($t102_mutasi_list->NoUrut->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_list->NoUrut->EditValue ?>"<?php echo $t102_mutasi_list->NoUrut->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_NoUrut">
<span<?php echo $t102_mutasi_list->NoUrut->viewAttributes() ?>><?php echo $t102_mutasi_list->NoUrut->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_mutasi_list->jo_id->Visible) { // jo_id ?>
		<td data-name="jo_id" <?php echo $t102_mutasi_list->jo_id->cellAttributes() ?>>
<?php if ($t102_mutasi->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_jo_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id"><?php echo EmptyValue(strval($t102_mutasi_list->jo_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_mutasi_list->jo_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_mutasi_list->jo_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_mutasi_list->jo_id->ReadOnly || $t102_mutasi_list->jo_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t001_jo") && !$t102_mutasi_list->jo_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_mutasi_list->jo_id->caption() ?>" data-title="<?php echo $t102_mutasi_list->jo_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id',url:'t001_joaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t102_mutasi_list->jo_id->Lookup->getParamTag($t102_mutasi_list, "p_x" . $t102_mutasi_list->RowIndex . "_jo_id") ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jo_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_mutasi_list->jo_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id" id="x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id" value="<?php echo $t102_mutasi_list->jo_id->CurrentValue ?>"<?php echo $t102_mutasi_list->jo_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_jo_id" name="o<?php echo $t102_mutasi_list->RowIndex ?>_jo_id" id="o<?php echo $t102_mutasi_list->RowIndex ?>_jo_id" value="<?php echo HtmlEncode($t102_mutasi_list->jo_id->OldValue) ?>">
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_jo_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id"><?php echo EmptyValue(strval($t102_mutasi_list->jo_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_mutasi_list->jo_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_mutasi_list->jo_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_mutasi_list->jo_id->ReadOnly || $t102_mutasi_list->jo_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t001_jo") && !$t102_mutasi_list->jo_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_mutasi_list->jo_id->caption() ?>" data-title="<?php echo $t102_mutasi_list->jo_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id',url:'t001_joaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t102_mutasi_list->jo_id->Lookup->getParamTag($t102_mutasi_list, "p_x" . $t102_mutasi_list->RowIndex . "_jo_id") ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jo_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_mutasi_list->jo_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id" id="x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id" value="<?php echo $t102_mutasi_list->jo_id->CurrentValue ?>"<?php echo $t102_mutasi_list->jo_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_jo_id">
<span<?php echo $t102_mutasi_list->jo_id->viewAttributes() ?>><?php echo $t102_mutasi_list->jo_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_mutasi_list->jenis_id->Visible) { // jenis_id ?>
		<td data-name="jenis_id" <?php echo $t102_mutasi_list->jenis_id->cellAttributes() ?>>
<?php if ($t102_mutasi->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_jenis_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id"><?php echo EmptyValue(strval($t102_mutasi_list->jenis_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_mutasi_list->jenis_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_mutasi_list->jenis_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_mutasi_list->jenis_id->ReadOnly || $t102_mutasi_list->jenis_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t002_jenis") && !$t102_mutasi_list->jenis_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_mutasi_list->jenis_id->caption() ?>" data-title="<?php echo $t102_mutasi_list->jenis_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id',url:'t002_jenisaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t102_mutasi_list->jenis_id->Lookup->getParamTag($t102_mutasi_list, "p_x" . $t102_mutasi_list->RowIndex . "_jenis_id") ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jenis_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_mutasi_list->jenis_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id" id="x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id" value="<?php echo $t102_mutasi_list->jenis_id->CurrentValue ?>"<?php echo $t102_mutasi_list->jenis_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_jenis_id" name="o<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id" id="o<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id" value="<?php echo HtmlEncode($t102_mutasi_list->jenis_id->OldValue) ?>">
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_jenis_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id"><?php echo EmptyValue(strval($t102_mutasi_list->jenis_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_mutasi_list->jenis_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_mutasi_list->jenis_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_mutasi_list->jenis_id->ReadOnly || $t102_mutasi_list->jenis_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t002_jenis") && !$t102_mutasi_list->jenis_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_mutasi_list->jenis_id->caption() ?>" data-title="<?php echo $t102_mutasi_list->jenis_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id',url:'t002_jenisaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t102_mutasi_list->jenis_id->Lookup->getParamTag($t102_mutasi_list, "p_x" . $t102_mutasi_list->RowIndex . "_jenis_id") ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jenis_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_mutasi_list->jenis_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id" id="x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id" value="<?php echo $t102_mutasi_list->jenis_id->CurrentValue ?>"<?php echo $t102_mutasi_list->jenis_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_jenis_id">
<span<?php echo $t102_mutasi_list->jenis_id->viewAttributes() ?>><?php echo $t102_mutasi_list->jenis_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_mutasi_list->Comment->Visible) { // Comment ?>
		<td data-name="Comment" <?php echo $t102_mutasi_list->Comment->cellAttributes() ?>>
<?php if ($t102_mutasi->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_Comment" class="form-group">
<textarea data-table="t102_mutasi" data-field="x_Comment" name="x<?php echo $t102_mutasi_list->RowIndex ?>_Comment" id="x<?php echo $t102_mutasi_list->RowIndex ?>_Comment" cols="25" rows="1" placeholder="<?php echo HtmlEncode($t102_mutasi_list->Comment->getPlaceHolder()) ?>"<?php echo $t102_mutasi_list->Comment->editAttributes() ?>><?php echo $t102_mutasi_list->Comment->EditValue ?></textarea>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_Comment" name="o<?php echo $t102_mutasi_list->RowIndex ?>_Comment" id="o<?php echo $t102_mutasi_list->RowIndex ?>_Comment" value="<?php echo HtmlEncode($t102_mutasi_list->Comment->OldValue) ?>">
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_Comment" class="form-group">
<textarea data-table="t102_mutasi" data-field="x_Comment" name="x<?php echo $t102_mutasi_list->RowIndex ?>_Comment" id="x<?php echo $t102_mutasi_list->RowIndex ?>_Comment" cols="25" rows="1" placeholder="<?php echo HtmlEncode($t102_mutasi_list->Comment->getPlaceHolder()) ?>"<?php echo $t102_mutasi_list->Comment->editAttributes() ?>><?php echo $t102_mutasi_list->Comment->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_Comment">
<span<?php echo $t102_mutasi_list->Comment->viewAttributes() ?>><?php echo $t102_mutasi_list->Comment->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_mutasi_list->Masuk->Visible) { // Masuk ?>
		<td data-name="Masuk" <?php echo $t102_mutasi_list->Masuk->cellAttributes() ?>>
<?php if ($t102_mutasi->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_Masuk" class="form-group">
<input type="text" data-table="t102_mutasi" data-field="x_Masuk" name="x<?php echo $t102_mutasi_list->RowIndex ?>_Masuk" id="x<?php echo $t102_mutasi_list->RowIndex ?>_Masuk" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t102_mutasi_list->Masuk->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_list->Masuk->EditValue ?>"<?php echo $t102_mutasi_list->Masuk->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_Masuk" name="o<?php echo $t102_mutasi_list->RowIndex ?>_Masuk" id="o<?php echo $t102_mutasi_list->RowIndex ?>_Masuk" value="<?php echo HtmlEncode($t102_mutasi_list->Masuk->OldValue) ?>">
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_Masuk" class="form-group">
<input type="text" data-table="t102_mutasi" data-field="x_Masuk" name="x<?php echo $t102_mutasi_list->RowIndex ?>_Masuk" id="x<?php echo $t102_mutasi_list->RowIndex ?>_Masuk" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t102_mutasi_list->Masuk->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_list->Masuk->EditValue ?>"<?php echo $t102_mutasi_list->Masuk->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_Masuk">
<span<?php echo $t102_mutasi_list->Masuk->viewAttributes() ?>><?php echo $t102_mutasi_list->Masuk->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_mutasi_list->Keluar->Visible) { // Keluar ?>
		<td data-name="Keluar" <?php echo $t102_mutasi_list->Keluar->cellAttributes() ?>>
<?php if ($t102_mutasi->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_Keluar" class="form-group">
<input type="text" data-table="t102_mutasi" data-field="x_Keluar" name="x<?php echo $t102_mutasi_list->RowIndex ?>_Keluar" id="x<?php echo $t102_mutasi_list->RowIndex ?>_Keluar" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t102_mutasi_list->Keluar->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_list->Keluar->EditValue ?>"<?php echo $t102_mutasi_list->Keluar->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_Keluar" name="o<?php echo $t102_mutasi_list->RowIndex ?>_Keluar" id="o<?php echo $t102_mutasi_list->RowIndex ?>_Keluar" value="<?php echo HtmlEncode($t102_mutasi_list->Keluar->OldValue) ?>">
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_Keluar" class="form-group">
<input type="text" data-table="t102_mutasi" data-field="x_Keluar" name="x<?php echo $t102_mutasi_list->RowIndex ?>_Keluar" id="x<?php echo $t102_mutasi_list->RowIndex ?>_Keluar" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t102_mutasi_list->Keluar->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_list->Keluar->EditValue ?>"<?php echo $t102_mutasi_list->Keluar->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_mutasi->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_mutasi_list->RowCount ?>_t102_mutasi_Keluar">
<span<?php echo $t102_mutasi_list->Keluar->viewAttributes() ?>><?php echo $t102_mutasi_list->Keluar->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t102_mutasi_list->ListOptions->render("body", "right", $t102_mutasi_list->RowCount);
?>
	</tr>
<?php if ($t102_mutasi->RowType == ROWTYPE_ADD || $t102_mutasi->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft102_mutasilist", "load"], function() {
	ft102_mutasilist.updateLists(<?php echo $t102_mutasi_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t102_mutasi_list->isGridAdd())
		if (!$t102_mutasi_list->Recordset->EOF)
			$t102_mutasi_list->Recordset->moveNext();
}
?>
<?php
	if ($t102_mutasi_list->isGridAdd() || $t102_mutasi_list->isGridEdit()) {
		$t102_mutasi_list->RowIndex = '$rowindex$';
		$t102_mutasi_list->loadRowValues();

		// Set row properties
		$t102_mutasi->resetAttributes();
		$t102_mutasi->RowAttrs->merge(["data-rowindex" => $t102_mutasi_list->RowIndex, "id" => "r0_t102_mutasi", "data-rowtype" => ROWTYPE_ADD]);
		$t102_mutasi->RowAttrs->appendClass("ew-template");
		$t102_mutasi->RowType = ROWTYPE_ADD;

		// Render row
		$t102_mutasi_list->renderRow();

		// Render list options
		$t102_mutasi_list->renderListOptions();
		$t102_mutasi_list->StartRowCount = 0;
?>
	<tr <?php echo $t102_mutasi->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t102_mutasi_list->ListOptions->render("body", "left", $t102_mutasi_list->RowIndex);
?>
	<?php if ($t102_mutasi_list->Tanggal->Visible) { // Tanggal ?>
		<td data-name="Tanggal">
<span id="el$rowindex$_t102_mutasi_Tanggal" class="form-group t102_mutasi_Tanggal">
<input type="text" data-table="t102_mutasi" data-field="x_Tanggal" data-format="7" name="x<?php echo $t102_mutasi_list->RowIndex ?>_Tanggal" id="x<?php echo $t102_mutasi_list->RowIndex ?>_Tanggal" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t102_mutasi_list->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_list->Tanggal->EditValue ?>"<?php echo $t102_mutasi_list->Tanggal->editAttributes() ?>>
<?php if (!$t102_mutasi_list->Tanggal->ReadOnly && !$t102_mutasi_list->Tanggal->Disabled && !isset($t102_mutasi_list->Tanggal->EditAttrs["readonly"]) && !isset($t102_mutasi_list->Tanggal->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft102_mutasilist", "datetimepicker"], function() {
	ew.createDateTimePicker("ft102_mutasilist", "x<?php echo $t102_mutasi_list->RowIndex ?>_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_Tanggal" name="o<?php echo $t102_mutasi_list->RowIndex ?>_Tanggal" id="o<?php echo $t102_mutasi_list->RowIndex ?>_Tanggal" value="<?php echo HtmlEncode($t102_mutasi_list->Tanggal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_mutasi_list->NoUrut->Visible) { // NoUrut ?>
		<td data-name="NoUrut">
<span id="el$rowindex$_t102_mutasi_NoUrut" class="form-group t102_mutasi_NoUrut">
<input type="text" data-table="t102_mutasi" data-field="x_NoUrut" name="x<?php echo $t102_mutasi_list->RowIndex ?>_NoUrut" id="x<?php echo $t102_mutasi_list->RowIndex ?>_NoUrut" size="3" maxlength="4" placeholder="<?php echo HtmlEncode($t102_mutasi_list->NoUrut->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_list->NoUrut->EditValue ?>"<?php echo $t102_mutasi_list->NoUrut->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_NoUrut" name="o<?php echo $t102_mutasi_list->RowIndex ?>_NoUrut" id="o<?php echo $t102_mutasi_list->RowIndex ?>_NoUrut" value="<?php echo HtmlEncode($t102_mutasi_list->NoUrut->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_mutasi_list->jo_id->Visible) { // jo_id ?>
		<td data-name="jo_id">
<span id="el$rowindex$_t102_mutasi_jo_id" class="form-group t102_mutasi_jo_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id"><?php echo EmptyValue(strval($t102_mutasi_list->jo_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_mutasi_list->jo_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_mutasi_list->jo_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_mutasi_list->jo_id->ReadOnly || $t102_mutasi_list->jo_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t001_jo") && !$t102_mutasi_list->jo_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_mutasi_list->jo_id->caption() ?>" data-title="<?php echo $t102_mutasi_list->jo_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id',url:'t001_joaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t102_mutasi_list->jo_id->Lookup->getParamTag($t102_mutasi_list, "p_x" . $t102_mutasi_list->RowIndex . "_jo_id") ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jo_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_mutasi_list->jo_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id" id="x<?php echo $t102_mutasi_list->RowIndex ?>_jo_id" value="<?php echo $t102_mutasi_list->jo_id->CurrentValue ?>"<?php echo $t102_mutasi_list->jo_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_jo_id" name="o<?php echo $t102_mutasi_list->RowIndex ?>_jo_id" id="o<?php echo $t102_mutasi_list->RowIndex ?>_jo_id" value="<?php echo HtmlEncode($t102_mutasi_list->jo_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_mutasi_list->jenis_id->Visible) { // jenis_id ?>
		<td data-name="jenis_id">
<span id="el$rowindex$_t102_mutasi_jenis_id" class="form-group t102_mutasi_jenis_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id"><?php echo EmptyValue(strval($t102_mutasi_list->jenis_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_mutasi_list->jenis_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_mutasi_list->jenis_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_mutasi_list->jenis_id->ReadOnly || $t102_mutasi_list->jenis_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t002_jenis") && !$t102_mutasi_list->jenis_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_mutasi_list->jenis_id->caption() ?>" data-title="<?php echo $t102_mutasi_list->jenis_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id',url:'t002_jenisaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t102_mutasi_list->jenis_id->Lookup->getParamTag($t102_mutasi_list, "p_x" . $t102_mutasi_list->RowIndex . "_jenis_id") ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jenis_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_mutasi_list->jenis_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id" id="x<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id" value="<?php echo $t102_mutasi_list->jenis_id->CurrentValue ?>"<?php echo $t102_mutasi_list->jenis_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_jenis_id" name="o<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id" id="o<?php echo $t102_mutasi_list->RowIndex ?>_jenis_id" value="<?php echo HtmlEncode($t102_mutasi_list->jenis_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_mutasi_list->Comment->Visible) { // Comment ?>
		<td data-name="Comment">
<span id="el$rowindex$_t102_mutasi_Comment" class="form-group t102_mutasi_Comment">
<textarea data-table="t102_mutasi" data-field="x_Comment" name="x<?php echo $t102_mutasi_list->RowIndex ?>_Comment" id="x<?php echo $t102_mutasi_list->RowIndex ?>_Comment" cols="25" rows="1" placeholder="<?php echo HtmlEncode($t102_mutasi_list->Comment->getPlaceHolder()) ?>"<?php echo $t102_mutasi_list->Comment->editAttributes() ?>><?php echo $t102_mutasi_list->Comment->EditValue ?></textarea>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_Comment" name="o<?php echo $t102_mutasi_list->RowIndex ?>_Comment" id="o<?php echo $t102_mutasi_list->RowIndex ?>_Comment" value="<?php echo HtmlEncode($t102_mutasi_list->Comment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_mutasi_list->Masuk->Visible) { // Masuk ?>
		<td data-name="Masuk">
<span id="el$rowindex$_t102_mutasi_Masuk" class="form-group t102_mutasi_Masuk">
<input type="text" data-table="t102_mutasi" data-field="x_Masuk" name="x<?php echo $t102_mutasi_list->RowIndex ?>_Masuk" id="x<?php echo $t102_mutasi_list->RowIndex ?>_Masuk" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t102_mutasi_list->Masuk->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_list->Masuk->EditValue ?>"<?php echo $t102_mutasi_list->Masuk->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_Masuk" name="o<?php echo $t102_mutasi_list->RowIndex ?>_Masuk" id="o<?php echo $t102_mutasi_list->RowIndex ?>_Masuk" value="<?php echo HtmlEncode($t102_mutasi_list->Masuk->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_mutasi_list->Keluar->Visible) { // Keluar ?>
		<td data-name="Keluar">
<span id="el$rowindex$_t102_mutasi_Keluar" class="form-group t102_mutasi_Keluar">
<input type="text" data-table="t102_mutasi" data-field="x_Keluar" name="x<?php echo $t102_mutasi_list->RowIndex ?>_Keluar" id="x<?php echo $t102_mutasi_list->RowIndex ?>_Keluar" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t102_mutasi_list->Keluar->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_list->Keluar->EditValue ?>"<?php echo $t102_mutasi_list->Keluar->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_mutasi" data-field="x_Keluar" name="o<?php echo $t102_mutasi_list->RowIndex ?>_Keluar" id="o<?php echo $t102_mutasi_list->RowIndex ?>_Keluar" value="<?php echo HtmlEncode($t102_mutasi_list->Keluar->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t102_mutasi_list->ListOptions->render("body", "right", $t102_mutasi_list->RowIndex);
?>
<script>
loadjs.ready(["ft102_mutasilist", "load"], function() {
	ft102_mutasilist.updateLists(<?php echo $t102_mutasi_list->RowIndex ?>);
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
$t102_mutasi_list->renderRow();
?>
<?php if ($t102_mutasi_list->TotalRecords > 0 && !$t102_mutasi_list->isGridAdd() && !$t102_mutasi_list->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$t102_mutasi_list->renderListOptions();

// Render list options (footer, left)
$t102_mutasi_list->ListOptions->render("footer", "left");
?>
	<?php if ($t102_mutasi_list->Tanggal->Visible) { // Tanggal ?>
		<td data-name="Tanggal" class="<?php echo $t102_mutasi_list->Tanggal->footerCellClass() ?>"><span id="elf_t102_mutasi_Tanggal" class="t102_mutasi_Tanggal">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($t102_mutasi_list->NoUrut->Visible) { // NoUrut ?>
		<td data-name="NoUrut" class="<?php echo $t102_mutasi_list->NoUrut->footerCellClass() ?>"><span id="elf_t102_mutasi_NoUrut" class="t102_mutasi_NoUrut">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($t102_mutasi_list->jo_id->Visible) { // jo_id ?>
		<td data-name="jo_id" class="<?php echo $t102_mutasi_list->jo_id->footerCellClass() ?>"><span id="elf_t102_mutasi_jo_id" class="t102_mutasi_jo_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($t102_mutasi_list->jenis_id->Visible) { // jenis_id ?>
		<td data-name="jenis_id" class="<?php echo $t102_mutasi_list->jenis_id->footerCellClass() ?>"><span id="elf_t102_mutasi_jenis_id" class="t102_mutasi_jenis_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($t102_mutasi_list->Comment->Visible) { // Comment ?>
		<td data-name="Comment" class="<?php echo $t102_mutasi_list->Comment->footerCellClass() ?>"><span id="elf_t102_mutasi_Comment" class="t102_mutasi_Comment">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($t102_mutasi_list->Masuk->Visible) { // Masuk ?>
		<td data-name="Masuk" class="<?php echo $t102_mutasi_list->Masuk->footerCellClass() ?>"><span id="elf_t102_mutasi_Masuk" class="t102_mutasi_Masuk">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $t102_mutasi_list->Masuk->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($t102_mutasi_list->Keluar->Visible) { // Keluar ?>
		<td data-name="Keluar" class="<?php echo $t102_mutasi_list->Keluar->footerCellClass() ?>"><span id="elf_t102_mutasi_Keluar" class="t102_mutasi_Keluar">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $t102_mutasi_list->Keluar->ViewValue ?></span>
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$t102_mutasi_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($t102_mutasi_list->isAdd() || $t102_mutasi_list->isCopy()) { ?>
<input type="hidden" name="<?php echo $t102_mutasi_list->FormKeyCountName ?>" id="<?php echo $t102_mutasi_list->FormKeyCountName ?>" value="<?php echo $t102_mutasi_list->KeyCount ?>">
<?php } ?>
<?php if ($t102_mutasi_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t102_mutasi_list->FormKeyCountName ?>" id="<?php echo $t102_mutasi_list->FormKeyCountName ?>" value="<?php echo $t102_mutasi_list->KeyCount ?>">
<?php echo $t102_mutasi_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t102_mutasi_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $t102_mutasi_list->FormKeyCountName ?>" id="<?php echo $t102_mutasi_list->FormKeyCountName ?>" value="<?php echo $t102_mutasi_list->KeyCount ?>">
<?php } ?>
<?php if ($t102_mutasi_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t102_mutasi_list->FormKeyCountName ?>" id="<?php echo $t102_mutasi_list->FormKeyCountName ?>" value="<?php echo $t102_mutasi_list->KeyCount ?>">
<?php echo $t102_mutasi_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t102_mutasi->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t102_mutasi_list->Recordset)
	$t102_mutasi_list->Recordset->Close();
?>
<?php if (!$t102_mutasi_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t102_mutasi_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t102_mutasi_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t102_mutasi_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t102_mutasi_list->TotalRecords == 0 && !$t102_mutasi->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t102_mutasi_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t102_mutasi_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t102_mutasi_list->isExport()) { ?>
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
$t102_mutasi_list->terminate();
?>