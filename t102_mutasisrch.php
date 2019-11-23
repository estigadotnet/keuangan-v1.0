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
$t102_mutasi_search = new t102_mutasi_search();

// Run the page
$t102_mutasi_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_mutasi_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft102_mutasisearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($t102_mutasi_search->IsModal) { ?>
	ft102_mutasisearch = currentAdvancedSearchForm = new ew.Form("ft102_mutasisearch", "search");
	<?php } else { ?>
	ft102_mutasisearch = currentForm = new ew.Form("ft102_mutasisearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	ft102_mutasisearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t102_mutasi_search->id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Tanggal");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t102_mutasi_search->Tanggal->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_NoUrut");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t102_mutasi_search->NoUrut->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Masuk");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t102_mutasi_search->Masuk->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Keluar");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t102_mutasi_search->Keluar->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	ft102_mutasisearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft102_mutasisearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft102_mutasisearch.lists["x_jo_id"] = <?php echo $t102_mutasi_search->jo_id->Lookup->toClientList($t102_mutasi_search) ?>;
	ft102_mutasisearch.lists["x_jo_id"].options = <?php echo JsonEncode($t102_mutasi_search->jo_id->lookupOptions()) ?>;
	ft102_mutasisearch.lists["x_jenis_id"] = <?php echo $t102_mutasi_search->jenis_id->Lookup->toClientList($t102_mutasi_search) ?>;
	ft102_mutasisearch.lists["x_jenis_id"].options = <?php echo JsonEncode($t102_mutasi_search->jenis_id->lookupOptions()) ?>;
	loadjs.done("ft102_mutasisearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t102_mutasi_search->showPageHeader(); ?>
<?php
$t102_mutasi_search->showMessage();
?>
<form name="ft102_mutasisearch" id="ft102_mutasisearch" class="<?php echo $t102_mutasi_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_mutasi">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$t102_mutasi_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($t102_mutasi_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $t102_mutasi_search->LeftColumnClass ?>"><span id="elh_t102_mutasi_id"><?php echo $t102_mutasi_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $t102_mutasi_search->RightColumnClass ?>"><div <?php echo $t102_mutasi_search->id->cellAttributes() ?>>
			<span id="el_t102_mutasi_id" class="ew-search-field">
<input type="text" data-table="t102_mutasi" data-field="x_id" name="x_id" id="x_id" maxlength="11" placeholder="<?php echo HtmlEncode($t102_mutasi_search->id->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_search->id->EditValue ?>"<?php echo $t102_mutasi_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t102_mutasi_search->Tanggal->Visible) { // Tanggal ?>
	<div id="r_Tanggal" class="form-group row">
		<label for="x_Tanggal" class="<?php echo $t102_mutasi_search->LeftColumnClass ?>"><span id="elh_t102_mutasi_Tanggal"><?php echo $t102_mutasi_search->Tanggal->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_Tanggal" id="z_Tanggal" value="BETWEEN">
</span>
		</label>
		<div class="<?php echo $t102_mutasi_search->RightColumnClass ?>"><div <?php echo $t102_mutasi_search->Tanggal->cellAttributes() ?>>
			<span id="el_t102_mutasi_Tanggal" class="ew-search-field">
<input type="text" data-table="t102_mutasi" data-field="x_Tanggal" data-format="7" name="x_Tanggal" id="x_Tanggal" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t102_mutasi_search->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_search->Tanggal->EditValue ?>"<?php echo $t102_mutasi_search->Tanggal->editAttributes() ?>>
<?php if (!$t102_mutasi_search->Tanggal->ReadOnly && !$t102_mutasi_search->Tanggal->Disabled && !isset($t102_mutasi_search->Tanggal->EditAttrs["readonly"]) && !isset($t102_mutasi_search->Tanggal->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft102_mutasisearch", "datetimepicker"], function() {
	ew.createDateTimePicker("ft102_mutasisearch", "x_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
			<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
			<span id="el2_t102_mutasi_Tanggal" class="ew-search-field2">
<input type="text" data-table="t102_mutasi" data-field="x_Tanggal" data-format="7" name="y_Tanggal" id="y_Tanggal" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t102_mutasi_search->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_search->Tanggal->EditValue2 ?>"<?php echo $t102_mutasi_search->Tanggal->editAttributes() ?>>
<?php if (!$t102_mutasi_search->Tanggal->ReadOnly && !$t102_mutasi_search->Tanggal->Disabled && !isset($t102_mutasi_search->Tanggal->EditAttrs["readonly"]) && !isset($t102_mutasi_search->Tanggal->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft102_mutasisearch", "datetimepicker"], function() {
	ew.createDateTimePicker("ft102_mutasisearch", "y_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t102_mutasi_search->NoUrut->Visible) { // NoUrut ?>
	<div id="r_NoUrut" class="form-group row">
		<label for="x_NoUrut" class="<?php echo $t102_mutasi_search->LeftColumnClass ?>"><span id="elh_t102_mutasi_NoUrut"><?php echo $t102_mutasi_search->NoUrut->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_NoUrut" id="z_NoUrut" value="=">
</span>
		</label>
		<div class="<?php echo $t102_mutasi_search->RightColumnClass ?>"><div <?php echo $t102_mutasi_search->NoUrut->cellAttributes() ?>>
			<span id="el_t102_mutasi_NoUrut" class="ew-search-field">
<input type="text" data-table="t102_mutasi" data-field="x_NoUrut" name="x_NoUrut" id="x_NoUrut" size="3" maxlength="4" placeholder="<?php echo HtmlEncode($t102_mutasi_search->NoUrut->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_search->NoUrut->EditValue ?>"<?php echo $t102_mutasi_search->NoUrut->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t102_mutasi_search->jo_id->Visible) { // jo_id ?>
	<div id="r_jo_id" class="form-group row">
		<label for="x_jo_id" class="<?php echo $t102_mutasi_search->LeftColumnClass ?>"><span id="elh_t102_mutasi_jo_id"><?php echo $t102_mutasi_search->jo_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_jo_id" id="z_jo_id" value="=">
</span>
		</label>
		<div class="<?php echo $t102_mutasi_search->RightColumnClass ?>"><div <?php echo $t102_mutasi_search->jo_id->cellAttributes() ?>>
			<span id="el_t102_mutasi_jo_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_jo_id"><?php echo EmptyValue(strval($t102_mutasi_search->jo_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_mutasi_search->jo_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_mutasi_search->jo_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_mutasi_search->jo_id->ReadOnly || $t102_mutasi_search->jo_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_jo_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t102_mutasi_search->jo_id->Lookup->getParamTag($t102_mutasi_search, "p_x_jo_id") ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jo_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_mutasi_search->jo_id->displayValueSeparatorAttribute() ?>" name="x_jo_id" id="x_jo_id" value="<?php echo $t102_mutasi_search->jo_id->AdvancedSearch->SearchValue ?>"<?php echo $t102_mutasi_search->jo_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t102_mutasi_search->jenis_id->Visible) { // jenis_id ?>
	<div id="r_jenis_id" class="form-group row">
		<label for="x_jenis_id" class="<?php echo $t102_mutasi_search->LeftColumnClass ?>"><span id="elh_t102_mutasi_jenis_id"><?php echo $t102_mutasi_search->jenis_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_jenis_id" id="z_jenis_id" value="=">
</span>
		</label>
		<div class="<?php echo $t102_mutasi_search->RightColumnClass ?>"><div <?php echo $t102_mutasi_search->jenis_id->cellAttributes() ?>>
			<span id="el_t102_mutasi_jenis_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_jenis_id"><?php echo EmptyValue(strval($t102_mutasi_search->jenis_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_mutasi_search->jenis_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_mutasi_search->jenis_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_mutasi_search->jenis_id->ReadOnly || $t102_mutasi_search->jenis_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_jenis_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t102_mutasi_search->jenis_id->Lookup->getParamTag($t102_mutasi_search, "p_x_jenis_id") ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jenis_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_mutasi_search->jenis_id->displayValueSeparatorAttribute() ?>" name="x_jenis_id" id="x_jenis_id" value="<?php echo $t102_mutasi_search->jenis_id->AdvancedSearch->SearchValue ?>"<?php echo $t102_mutasi_search->jenis_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t102_mutasi_search->Comment->Visible) { // Comment ?>
	<div id="r_Comment" class="form-group row">
		<label for="x_Comment" class="<?php echo $t102_mutasi_search->LeftColumnClass ?>"><span id="elh_t102_mutasi_Comment"><?php echo $t102_mutasi_search->Comment->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Comment" id="z_Comment" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t102_mutasi_search->RightColumnClass ?>"><div <?php echo $t102_mutasi_search->Comment->cellAttributes() ?>>
			<span id="el_t102_mutasi_Comment" class="ew-search-field">
<input type="text" data-table="t102_mutasi" data-field="x_Comment" name="x_Comment" id="x_Comment" size="25" maxlength="65535" placeholder="<?php echo HtmlEncode($t102_mutasi_search->Comment->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_search->Comment->EditValue ?>"<?php echo $t102_mutasi_search->Comment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t102_mutasi_search->Masuk->Visible) { // Masuk ?>
	<div id="r_Masuk" class="form-group row">
		<label for="x_Masuk" class="<?php echo $t102_mutasi_search->LeftColumnClass ?>"><span id="elh_t102_mutasi_Masuk"><?php echo $t102_mutasi_search->Masuk->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Masuk" id="z_Masuk" value="=">
</span>
		</label>
		<div class="<?php echo $t102_mutasi_search->RightColumnClass ?>"><div <?php echo $t102_mutasi_search->Masuk->cellAttributes() ?>>
			<span id="el_t102_mutasi_Masuk" class="ew-search-field">
<input type="text" data-table="t102_mutasi" data-field="x_Masuk" name="x_Masuk" id="x_Masuk" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t102_mutasi_search->Masuk->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_search->Masuk->EditValue ?>"<?php echo $t102_mutasi_search->Masuk->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t102_mutasi_search->Keluar->Visible) { // Keluar ?>
	<div id="r_Keluar" class="form-group row">
		<label for="x_Keluar" class="<?php echo $t102_mutasi_search->LeftColumnClass ?>"><span id="elh_t102_mutasi_Keluar"><?php echo $t102_mutasi_search->Keluar->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Keluar" id="z_Keluar" value="=">
</span>
		</label>
		<div class="<?php echo $t102_mutasi_search->RightColumnClass ?>"><div <?php echo $t102_mutasi_search->Keluar->cellAttributes() ?>>
			<span id="el_t102_mutasi_Keluar" class="ew-search-field">
<input type="text" data-table="t102_mutasi" data-field="x_Keluar" name="x_Keluar" id="x_Keluar" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t102_mutasi_search->Keluar->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_search->Keluar->EditValue ?>"<?php echo $t102_mutasi_search->Keluar->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t102_mutasi_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t102_mutasi_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t102_mutasi_search->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$t102_mutasi_search->terminate();
?>