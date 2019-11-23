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
$v201_mutasi_list = new v201_mutasi_list();

// Run the page
$v201_mutasi_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v201_mutasi_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$v201_mutasi_list->isExport()) { ?>
<script>
var fv201_mutasilist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fv201_mutasilist = currentForm = new ew.Form("fv201_mutasilist", "list");
	fv201_mutasilist.formKeyCountName = '<?php echo $v201_mutasi_list->FormKeyCountName ?>';
	loadjs.done("fv201_mutasilist");
});
var fv201_mutasilistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fv201_mutasilistsrch = currentSearchForm = new ew.Form("fv201_mutasilistsrch");

	// Validate function for search
	fv201_mutasilistsrch.validate = function(fobj) {
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
	fv201_mutasilistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fv201_mutasilistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fv201_mutasilistsrch.lists["x_jo_id"] = <?php echo $v201_mutasi_list->jo_id->Lookup->toClientList($v201_mutasi_list) ?>;
	fv201_mutasilistsrch.lists["x_jo_id"].options = <?php echo JsonEncode($v201_mutasi_list->jo_id->lookupOptions()) ?>;

	// Filters
	fv201_mutasilistsrch.filterList = <?php echo $v201_mutasi_list->getFilterList() ?>;
	loadjs.done("fv201_mutasilistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$v201_mutasi_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($v201_mutasi_list->TotalRecords > 0 && $v201_mutasi_list->ExportOptions->visible()) { ?>
<?php $v201_mutasi_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($v201_mutasi_list->ImportOptions->visible()) { ?>
<?php $v201_mutasi_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($v201_mutasi_list->SearchOptions->visible()) { ?>
<?php $v201_mutasi_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($v201_mutasi_list->FilterOptions->visible()) { ?>
<?php $v201_mutasi_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$v201_mutasi_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$v201_mutasi_list->isExport() && !$v201_mutasi->CurrentAction) { ?>
<form name="fv201_mutasilistsrch" id="fv201_mutasilistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fv201_mutasilistsrch-search-panel" class="<?php echo $v201_mutasi_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="v201_mutasi">
	<div class="ew-extended-search">
<?php

// Render search row
$v201_mutasi->RowType = ROWTYPE_SEARCH;
$v201_mutasi->resetAttributes();
$v201_mutasi_list->renderRow();
?>
<?php if ($v201_mutasi_list->jo_id->Visible) { // jo_id ?>
	<?php
		$v201_mutasi_list->SearchColumnCount++;
		if (($v201_mutasi_list->SearchColumnCount - 1) % $v201_mutasi_list->SearchFieldsPerRow == 0) {
			$v201_mutasi_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $v201_mutasi_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_jo_id" class="ew-cell form-group">
		<label for="x_jo_id" class="ew-search-caption ew-label"><?php echo $v201_mutasi_list->jo_id->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_jo_id" id="z_jo_id" value="=">
</span>
		<span id="el_v201_mutasi_jo_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_jo_id"><?php echo EmptyValue(strval($v201_mutasi_list->jo_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $v201_mutasi_list->jo_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($v201_mutasi_list->jo_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($v201_mutasi_list->jo_id->ReadOnly || $v201_mutasi_list->jo_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_jo_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $v201_mutasi_list->jo_id->Lookup->getParamTag($v201_mutasi_list, "p_x_jo_id") ?>
<input type="hidden" data-table="v201_mutasi" data-field="x_jo_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $v201_mutasi_list->jo_id->displayValueSeparatorAttribute() ?>" name="x_jo_id" id="x_jo_id" value="<?php echo $v201_mutasi_list->jo_id->AdvancedSearch->SearchValue ?>"<?php echo $v201_mutasi_list->jo_id->editAttributes() ?>>
</span>
	</div>
	<?php if ($v201_mutasi_list->SearchColumnCount % $v201_mutasi_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($v201_mutasi_list->SearchColumnCount % $v201_mutasi_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $v201_mutasi_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $v201_mutasi_list->showPageHeader(); ?>
<?php
$v201_mutasi_list->showMessage();
?>
<?php if ($v201_mutasi_list->TotalRecords > 0 || $v201_mutasi->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($v201_mutasi_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> v201_mutasi">
<?php if (!$v201_mutasi_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$v201_mutasi_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v201_mutasi_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v201_mutasi_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fv201_mutasilist" id="fv201_mutasilist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v201_mutasi">
<div id="gmp_v201_mutasi" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($v201_mutasi_list->TotalRecords > 0 || $v201_mutasi_list->isGridEdit()) { ?>
<table id="tbl_v201_mutasilist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$v201_mutasi->RowType = ROWTYPE_HEADER;

// Render list options
$v201_mutasi_list->renderListOptions();

// Render list options (header, left)
$v201_mutasi_list->ListOptions->render("header", "left");
?>
<?php if ($v201_mutasi_list->jo_id->Visible) { // jo_id ?>
	<?php if ($v201_mutasi_list->SortUrl($v201_mutasi_list->jo_id) == "") { ?>
		<th data-name="jo_id" class="<?php echo $v201_mutasi_list->jo_id->headerCellClass() ?>"><div id="elh_v201_mutasi_jo_id" class="v201_mutasi_jo_id"><div class="ew-table-header-caption"><?php echo $v201_mutasi_list->jo_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jo_id" class="<?php echo $v201_mutasi_list->jo_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v201_mutasi_list->SortUrl($v201_mutasi_list->jo_id) ?>', 2);"><div id="elh_v201_mutasi_jo_id" class="v201_mutasi_jo_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v201_mutasi_list->jo_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v201_mutasi_list->jo_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v201_mutasi_list->jo_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v201_mutasi_list->jenis_id->Visible) { // jenis_id ?>
	<?php if ($v201_mutasi_list->SortUrl($v201_mutasi_list->jenis_id) == "") { ?>
		<th data-name="jenis_id" class="<?php echo $v201_mutasi_list->jenis_id->headerCellClass() ?>"><div id="elh_v201_mutasi_jenis_id" class="v201_mutasi_jenis_id"><div class="ew-table-header-caption"><?php echo $v201_mutasi_list->jenis_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jenis_id" class="<?php echo $v201_mutasi_list->jenis_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v201_mutasi_list->SortUrl($v201_mutasi_list->jenis_id) ?>', 2);"><div id="elh_v201_mutasi_jenis_id" class="v201_mutasi_jenis_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v201_mutasi_list->jenis_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v201_mutasi_list->jenis_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v201_mutasi_list->jenis_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v201_mutasi_list->keluar->Visible) { // keluar ?>
	<?php if ($v201_mutasi_list->SortUrl($v201_mutasi_list->keluar) == "") { ?>
		<th data-name="keluar" class="<?php echo $v201_mutasi_list->keluar->headerCellClass() ?>"><div id="elh_v201_mutasi_keluar" class="v201_mutasi_keluar"><div class="ew-table-header-caption"><?php echo $v201_mutasi_list->keluar->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="keluar" class="<?php echo $v201_mutasi_list->keluar->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v201_mutasi_list->SortUrl($v201_mutasi_list->keluar) ?>', 2);"><div id="elh_v201_mutasi_keluar" class="v201_mutasi_keluar">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v201_mutasi_list->keluar->caption() ?></span><span class="ew-table-header-sort"><?php if ($v201_mutasi_list->keluar->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v201_mutasi_list->keluar->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v201_mutasi_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($v201_mutasi_list->ExportAll && $v201_mutasi_list->isExport()) {
	$v201_mutasi_list->StopRecord = $v201_mutasi_list->TotalRecords;
} else {

	// Set the last record to display
	if ($v201_mutasi_list->TotalRecords > $v201_mutasi_list->StartRecord + $v201_mutasi_list->DisplayRecords - 1)
		$v201_mutasi_list->StopRecord = $v201_mutasi_list->StartRecord + $v201_mutasi_list->DisplayRecords - 1;
	else
		$v201_mutasi_list->StopRecord = $v201_mutasi_list->TotalRecords;
}
$v201_mutasi_list->RecordCount = $v201_mutasi_list->StartRecord - 1;
if ($v201_mutasi_list->Recordset && !$v201_mutasi_list->Recordset->EOF) {
	$v201_mutasi_list->Recordset->moveFirst();
	$selectLimit = $v201_mutasi_list->UseSelectLimit;
	if (!$selectLimit && $v201_mutasi_list->StartRecord > 1)
		$v201_mutasi_list->Recordset->move($v201_mutasi_list->StartRecord - 1);
} elseif (!$v201_mutasi->AllowAddDeleteRow && $v201_mutasi_list->StopRecord == 0) {
	$v201_mutasi_list->StopRecord = $v201_mutasi->GridAddRowCount;
}

// Initialize aggregate
$v201_mutasi->RowType = ROWTYPE_AGGREGATEINIT;
$v201_mutasi->resetAttributes();
$v201_mutasi_list->renderRow();
while ($v201_mutasi_list->RecordCount < $v201_mutasi_list->StopRecord) {
	$v201_mutasi_list->RecordCount++;
	if ($v201_mutasi_list->RecordCount >= $v201_mutasi_list->StartRecord) {
		$v201_mutasi_list->RowCount++;

		// Set up key count
		$v201_mutasi_list->KeyCount = $v201_mutasi_list->RowIndex;

		// Init row class and style
		$v201_mutasi->resetAttributes();
		$v201_mutasi->CssClass = "";
		if ($v201_mutasi_list->isGridAdd()) {
		} else {
			$v201_mutasi_list->loadRowValues($v201_mutasi_list->Recordset); // Load row values
		}
		$v201_mutasi->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$v201_mutasi->RowAttrs->merge(["data-rowindex" => $v201_mutasi_list->RowCount, "id" => "r" . $v201_mutasi_list->RowCount . "_v201_mutasi", "data-rowtype" => $v201_mutasi->RowType]);

		// Render row
		$v201_mutasi_list->renderRow();

		// Render list options
		$v201_mutasi_list->renderListOptions();
?>
	<tr <?php echo $v201_mutasi->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v201_mutasi_list->ListOptions->render("body", "left", $v201_mutasi_list->RowCount);
?>
	<?php if ($v201_mutasi_list->jo_id->Visible) { // jo_id ?>
		<td data-name="jo_id" <?php echo $v201_mutasi_list->jo_id->cellAttributes() ?>>
<span id="el<?php echo $v201_mutasi_list->RowCount ?>_v201_mutasi_jo_id">
<span<?php echo $v201_mutasi_list->jo_id->viewAttributes() ?>><?php echo $v201_mutasi_list->jo_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v201_mutasi_list->jenis_id->Visible) { // jenis_id ?>
		<td data-name="jenis_id" <?php echo $v201_mutasi_list->jenis_id->cellAttributes() ?>>
<span id="el<?php echo $v201_mutasi_list->RowCount ?>_v201_mutasi_jenis_id">
<span<?php echo $v201_mutasi_list->jenis_id->viewAttributes() ?>><?php echo $v201_mutasi_list->jenis_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v201_mutasi_list->keluar->Visible) { // keluar ?>
		<td data-name="keluar" <?php echo $v201_mutasi_list->keluar->cellAttributes() ?>>
<span id="el<?php echo $v201_mutasi_list->RowCount ?>_v201_mutasi_keluar">
<span<?php echo $v201_mutasi_list->keluar->viewAttributes() ?>><?php echo $v201_mutasi_list->keluar->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v201_mutasi_list->ListOptions->render("body", "right", $v201_mutasi_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$v201_mutasi_list->isGridAdd())
		$v201_mutasi_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$v201_mutasi->RowType = ROWTYPE_AGGREGATE;
$v201_mutasi->resetAttributes();
$v201_mutasi_list->renderRow();
?>
<?php if ($v201_mutasi_list->TotalRecords > 0 && !$v201_mutasi_list->isGridAdd() && !$v201_mutasi_list->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$v201_mutasi_list->renderListOptions();

// Render list options (footer, left)
$v201_mutasi_list->ListOptions->render("footer", "left");
?>
	<?php if ($v201_mutasi_list->jo_id->Visible) { // jo_id ?>
		<td data-name="jo_id" class="<?php echo $v201_mutasi_list->jo_id->footerCellClass() ?>"><span id="elf_v201_mutasi_jo_id" class="v201_mutasi_jo_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($v201_mutasi_list->jenis_id->Visible) { // jenis_id ?>
		<td data-name="jenis_id" class="<?php echo $v201_mutasi_list->jenis_id->footerCellClass() ?>"><span id="elf_v201_mutasi_jenis_id" class="v201_mutasi_jenis_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($v201_mutasi_list->keluar->Visible) { // keluar ?>
		<td data-name="keluar" class="<?php echo $v201_mutasi_list->keluar->footerCellClass() ?>"><span id="elf_v201_mutasi_keluar" class="v201_mutasi_keluar">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $v201_mutasi_list->keluar->ViewValue ?></span>
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$v201_mutasi_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$v201_mutasi->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($v201_mutasi_list->Recordset)
	$v201_mutasi_list->Recordset->Close();
?>
<?php if (!$v201_mutasi_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$v201_mutasi_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v201_mutasi_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v201_mutasi_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($v201_mutasi_list->TotalRecords == 0 && !$v201_mutasi->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $v201_mutasi_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$v201_mutasi_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$v201_mutasi_list->isExport()) { ?>
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
$v201_mutasi_list->terminate();
?>