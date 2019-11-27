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
$t001_jo_add = new t001_jo_add();

// Run the page
$t001_jo_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_jo_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft001_joadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ft001_joadd = currentForm = new ew.Form("ft001_joadd", "add");

	// Validate form
	ft001_joadd.validate = function() {
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
			<?php if ($t001_jo_add->NoJO->Required) { ?>
				elm = this.getElements("x" + infix + "_NoJO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_add->NoJO->caption(), $t001_jo_add->NoJO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_add->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_add->Status->caption(), $t001_jo_add->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_add->Tagihan->Required) { ?>
				elm = this.getElements("x" + infix + "_Tagihan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_add->Tagihan->caption(), $t001_jo_add->Tagihan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Tagihan");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t001_jo_add->Tagihan->errorMessage()) ?>");
			<?php if ($t001_jo_add->Shipper->Required) { ?>
				elm = this.getElements("x" + infix + "_Shipper");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_add->Shipper->caption(), $t001_jo_add->Shipper->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_add->Qty->Required) { ?>
				elm = this.getElements("x" + infix + "_Qty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_add->Qty->caption(), $t001_jo_add->Qty->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_add->Cont->Required) { ?>
				elm = this.getElements("x" + infix + "_Cont");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_add->Cont->caption(), $t001_jo_add->Cont->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_add->BM->Required) { ?>
				elm = this.getElements("x" + infix + "_BM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_add->BM->caption(), $t001_jo_add->BM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_add->Tujuan->Required) { ?>
				elm = this.getElements("x" + infix + "_Tujuan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_add->Tujuan->caption(), $t001_jo_add->Tujuan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_add->Kapal->Required) { ?>
				elm = this.getElements("x" + infix + "_Kapal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_add->Kapal->caption(), $t001_jo_add->Kapal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_add->Doc->Required) { ?>
				felm = this.getElements("x" + infix + "_Doc");
				elm = this.getElements("fn_x" + infix + "_Doc");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $t001_jo_add->Doc->caption(), $t001_jo_add->Doc->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}

		// Process detail forms
		var dfs = $fobj.find("input[name='detailpage']").get();
		for (var i = 0; i < dfs.length; i++) {
			var df = dfs[i], val = df.value;
			if (val && ew.forms[val])
				if (!ew.forms[val].validate())
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	ft001_joadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft001_joadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft001_joadd.lists["x_NoJO"] = <?php echo $t001_jo_add->NoJO->Lookup->toClientList($t001_jo_add) ?>;
	ft001_joadd.lists["x_NoJO"].options = <?php echo JsonEncode($t001_jo_add->NoJO->lookupOptions()) ?>;
	ft001_joadd.lists["x_Status"] = <?php echo $t001_jo_add->Status->Lookup->toClientList($t001_jo_add) ?>;
	ft001_joadd.lists["x_Status"].options = <?php echo JsonEncode($t001_jo_add->Status->options(FALSE, TRUE)) ?>;
	ft001_joadd.lists["x_BM"] = <?php echo $t001_jo_add->BM->Lookup->toClientList($t001_jo_add) ?>;
	ft001_joadd.lists["x_BM"].options = <?php echo JsonEncode($t001_jo_add->BM->options(FALSE, TRUE)) ?>;
	loadjs.done("ft001_joadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t001_jo_add->showPageHeader(); ?>
<?php
$t001_jo_add->showMessage();
?>
<form name="ft001_joadd" id="ft001_joadd" class="<?php echo $t001_jo_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_jo">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t001_jo_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t001_jo_add->NoJO->Visible) { // NoJO ?>
	<div id="r_NoJO" class="form-group row">
		<label id="elh_t001_jo_NoJO" for="x_NoJO" class="<?php echo $t001_jo_add->LeftColumnClass ?>"><?php echo $t001_jo_add->NoJO->caption() ?><?php echo $t001_jo_add->NoJO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_jo_add->RightColumnClass ?>"><div <?php echo $t001_jo_add->NoJO->cellAttributes() ?>>
<span id="el_t001_jo_NoJO">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_NoJO"><?php echo EmptyValue(strval($t001_jo_add->NoJO->ViewValue)) ? $Language->phrase("PleaseSelect") : $t001_jo_add->NoJO->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t001_jo_add->NoJO->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t001_jo_add->NoJO->ReadOnly || $t001_jo_add->NoJO->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_NoJO',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t001_jo_add->NoJO->Lookup->getParamTag($t001_jo_add, "p_x_NoJO") ?>
<input type="hidden" data-table="t001_jo" data-field="x_NoJO" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t001_jo_add->NoJO->displayValueSeparatorAttribute() ?>" name="x_NoJO" id="x_NoJO" value="<?php echo $t001_jo_add->NoJO->CurrentValue ?>"<?php echo $t001_jo_add->NoJO->editAttributes() ?>>
</span>
<?php echo $t001_jo_add->NoJO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t001_jo_add->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label id="elh_t001_jo_Status" for="x_Status" class="<?php echo $t001_jo_add->LeftColumnClass ?>"><?php echo $t001_jo_add->Status->caption() ?><?php echo $t001_jo_add->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_jo_add->RightColumnClass ?>"><div <?php echo $t001_jo_add->Status->cellAttributes() ?>>
<span id="el_t001_jo_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t001_jo" data-field="x_Status" data-value-separator="<?php echo $t001_jo_add->Status->displayValueSeparatorAttribute() ?>" id="x_Status" name="x_Status"<?php echo $t001_jo_add->Status->editAttributes() ?>>
			<?php echo $t001_jo_add->Status->selectOptionListHtml("x_Status") ?>
		</select>
</div>
</span>
<?php echo $t001_jo_add->Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t001_jo_add->Tagihan->Visible) { // Tagihan ?>
	<div id="r_Tagihan" class="form-group row">
		<label id="elh_t001_jo_Tagihan" for="x_Tagihan" class="<?php echo $t001_jo_add->LeftColumnClass ?>"><?php echo $t001_jo_add->Tagihan->caption() ?><?php echo $t001_jo_add->Tagihan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_jo_add->RightColumnClass ?>"><div <?php echo $t001_jo_add->Tagihan->cellAttributes() ?>>
<span id="el_t001_jo_Tagihan">
<input type="text" data-table="t001_jo" data-field="x_Tagihan" name="x_Tagihan" id="x_Tagihan" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t001_jo_add->Tagihan->getPlaceHolder()) ?>" value="<?php echo $t001_jo_add->Tagihan->EditValue ?>"<?php echo $t001_jo_add->Tagihan->editAttributes() ?>>
</span>
<?php echo $t001_jo_add->Tagihan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t001_jo_add->Shipper->Visible) { // Shipper ?>
	<div id="r_Shipper" class="form-group row">
		<label id="elh_t001_jo_Shipper" for="x_Shipper" class="<?php echo $t001_jo_add->LeftColumnClass ?>"><?php echo $t001_jo_add->Shipper->caption() ?><?php echo $t001_jo_add->Shipper->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_jo_add->RightColumnClass ?>"><div <?php echo $t001_jo_add->Shipper->cellAttributes() ?>>
<span id="el_t001_jo_Shipper">
<input type="text" data-table="t001_jo" data-field="x_Shipper" name="x_Shipper" id="x_Shipper" size="10" maxlength="100" placeholder="<?php echo HtmlEncode($t001_jo_add->Shipper->getPlaceHolder()) ?>" value="<?php echo $t001_jo_add->Shipper->EditValue ?>"<?php echo $t001_jo_add->Shipper->editAttributes() ?>>
</span>
<?php echo $t001_jo_add->Shipper->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t001_jo_add->Qty->Visible) { // Qty ?>
	<div id="r_Qty" class="form-group row">
		<label id="elh_t001_jo_Qty" for="x_Qty" class="<?php echo $t001_jo_add->LeftColumnClass ?>"><?php echo $t001_jo_add->Qty->caption() ?><?php echo $t001_jo_add->Qty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_jo_add->RightColumnClass ?>"><div <?php echo $t001_jo_add->Qty->cellAttributes() ?>>
<span id="el_t001_jo_Qty">
<input type="text" data-table="t001_jo" data-field="x_Qty" name="x_Qty" id="x_Qty" size="10" maxlength="5" placeholder="<?php echo HtmlEncode($t001_jo_add->Qty->getPlaceHolder()) ?>" value="<?php echo $t001_jo_add->Qty->EditValue ?>"<?php echo $t001_jo_add->Qty->editAttributes() ?>>
</span>
<?php echo $t001_jo_add->Qty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t001_jo_add->Cont->Visible) { // Cont ?>
	<div id="r_Cont" class="form-group row">
		<label id="elh_t001_jo_Cont" for="x_Cont" class="<?php echo $t001_jo_add->LeftColumnClass ?>"><?php echo $t001_jo_add->Cont->caption() ?><?php echo $t001_jo_add->Cont->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_jo_add->RightColumnClass ?>"><div <?php echo $t001_jo_add->Cont->cellAttributes() ?>>
<span id="el_t001_jo_Cont">
<input type="text" data-table="t001_jo" data-field="x_Cont" name="x_Cont" id="x_Cont" size="10" maxlength="5" placeholder="<?php echo HtmlEncode($t001_jo_add->Cont->getPlaceHolder()) ?>" value="<?php echo $t001_jo_add->Cont->EditValue ?>"<?php echo $t001_jo_add->Cont->editAttributes() ?>>
</span>
<?php echo $t001_jo_add->Cont->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t001_jo_add->BM->Visible) { // BM ?>
	<div id="r_BM" class="form-group row">
		<label id="elh_t001_jo_BM" class="<?php echo $t001_jo_add->LeftColumnClass ?>"><?php echo $t001_jo_add->BM->caption() ?><?php echo $t001_jo_add->BM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_jo_add->RightColumnClass ?>"><div <?php echo $t001_jo_add->BM->cellAttributes() ?>>
<span id="el_t001_jo_BM">
<div id="tp_x_BM" class="ew-template"><input type="radio" class="custom-control-input" data-table="t001_jo" data-field="x_BM" data-value-separator="<?php echo $t001_jo_add->BM->displayValueSeparatorAttribute() ?>" name="x_BM" id="x_BM" value="{value}"<?php echo $t001_jo_add->BM->editAttributes() ?>></div>
<div id="dsl_x_BM" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t001_jo_add->BM->radioButtonListHtml(FALSE, "x_BM") ?>
</div></div>
</span>
<?php echo $t001_jo_add->BM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t001_jo_add->Tujuan->Visible) { // Tujuan ?>
	<div id="r_Tujuan" class="form-group row">
		<label id="elh_t001_jo_Tujuan" for="x_Tujuan" class="<?php echo $t001_jo_add->LeftColumnClass ?>"><?php echo $t001_jo_add->Tujuan->caption() ?><?php echo $t001_jo_add->Tujuan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_jo_add->RightColumnClass ?>"><div <?php echo $t001_jo_add->Tujuan->cellAttributes() ?>>
<span id="el_t001_jo_Tujuan">
<input type="text" data-table="t001_jo" data-field="x_Tujuan" name="x_Tujuan" id="x_Tujuan" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t001_jo_add->Tujuan->getPlaceHolder()) ?>" value="<?php echo $t001_jo_add->Tujuan->EditValue ?>"<?php echo $t001_jo_add->Tujuan->editAttributes() ?>>
</span>
<?php echo $t001_jo_add->Tujuan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t001_jo_add->Kapal->Visible) { // Kapal ?>
	<div id="r_Kapal" class="form-group row">
		<label id="elh_t001_jo_Kapal" for="x_Kapal" class="<?php echo $t001_jo_add->LeftColumnClass ?>"><?php echo $t001_jo_add->Kapal->caption() ?><?php echo $t001_jo_add->Kapal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_jo_add->RightColumnClass ?>"><div <?php echo $t001_jo_add->Kapal->cellAttributes() ?>>
<span id="el_t001_jo_Kapal">
<input type="text" data-table="t001_jo" data-field="x_Kapal" name="x_Kapal" id="x_Kapal" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t001_jo_add->Kapal->getPlaceHolder()) ?>" value="<?php echo $t001_jo_add->Kapal->EditValue ?>"<?php echo $t001_jo_add->Kapal->editAttributes() ?>>
</span>
<?php echo $t001_jo_add->Kapal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t001_jo_add->Doc->Visible) { // Doc ?>
	<div id="r_Doc" class="form-group row">
		<label id="elh_t001_jo_Doc" class="<?php echo $t001_jo_add->LeftColumnClass ?>"><?php echo $t001_jo_add->Doc->caption() ?><?php echo $t001_jo_add->Doc->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_jo_add->RightColumnClass ?>"><div <?php echo $t001_jo_add->Doc->cellAttributes() ?>>
<span id="el_t001_jo_Doc">
<div id="fd_x_Doc">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $t001_jo_add->Doc->title() ?>" data-table="t001_jo" data-field="x_Doc" name="x_Doc" id="x_Doc" lang="<?php echo CurrentLanguageID() ?>"<?php echo $t001_jo_add->Doc->editAttributes() ?><?php if ($t001_jo_add->Doc->ReadOnly || $t001_jo_add->Doc->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_Doc"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_Doc" id= "fn_x_Doc" value="<?php echo $t001_jo_add->Doc->Upload->FileName ?>">
<input type="hidden" name="fa_x_Doc" id= "fa_x_Doc" value="0">
<input type="hidden" name="fs_x_Doc" id= "fs_x_Doc" value="255">
<input type="hidden" name="fx_x_Doc" id= "fx_x_Doc" value="<?php echo $t001_jo_add->Doc->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_Doc" id= "fm_x_Doc" value="<?php echo $t001_jo_add->Doc->UploadMaxFileSize ?>">
</div>
<table id="ft_x_Doc" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $t001_jo_add->Doc->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("t102_mutasi", explode(",", $t001_jo->getCurrentDetailTable())) && $t102_mutasi->DetailAdd) {
?>
<?php if ($t001_jo->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("t102_mutasi", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t102_mutasigrid.php" ?>
<?php } ?>
<?php if (!$t001_jo_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t001_jo_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t001_jo_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t001_jo_add->showPageFooter();
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
$t001_jo_add->terminate();
?>