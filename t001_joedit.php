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
$t001_jo_edit = new t001_jo_edit();

// Run the page
$t001_jo_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_jo_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft001_joedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft001_joedit = currentForm = new ew.Form("ft001_joedit", "edit");

	// Validate form
	ft001_joedit.validate = function() {
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
			<?php if ($t001_jo_edit->NoJO->Required) { ?>
				elm = this.getElements("x" + infix + "_NoJO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_edit->NoJO->caption(), $t001_jo_edit->NoJO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_edit->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_edit->Status->caption(), $t001_jo_edit->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_edit->Tagihan->Required) { ?>
				elm = this.getElements("x" + infix + "_Tagihan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_edit->Tagihan->caption(), $t001_jo_edit->Tagihan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Tagihan");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t001_jo_edit->Tagihan->errorMessage()) ?>");
			<?php if ($t001_jo_edit->Shipper->Required) { ?>
				elm = this.getElements("x" + infix + "_Shipper");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_edit->Shipper->caption(), $t001_jo_edit->Shipper->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_edit->Qty->Required) { ?>
				elm = this.getElements("x" + infix + "_Qty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_edit->Qty->caption(), $t001_jo_edit->Qty->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_edit->Cont->Required) { ?>
				elm = this.getElements("x" + infix + "_Cont");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_edit->Cont->caption(), $t001_jo_edit->Cont->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_edit->Tujuan->Required) { ?>
				elm = this.getElements("x" + infix + "_Tujuan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_edit->Tujuan->caption(), $t001_jo_edit->Tujuan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_edit->Kapal->Required) { ?>
				elm = this.getElements("x" + infix + "_Kapal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_edit->Kapal->caption(), $t001_jo_edit->Kapal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_edit->BM->Required) { ?>
				elm = this.getElements("x" + infix + "_BM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_edit->BM->caption(), $t001_jo_edit->BM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_edit->Doc->Required) { ?>
				felm = this.getElements("x" + infix + "_Doc");
				elm = this.getElements("fn_x" + infix + "_Doc");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $t001_jo_edit->Doc->caption(), $t001_jo_edit->Doc->RequiredErrorMessage)) ?>");
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
	ft001_joedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft001_joedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft001_joedit.lists["x_Status"] = <?php echo $t001_jo_edit->Status->Lookup->toClientList($t001_jo_edit) ?>;
	ft001_joedit.lists["x_Status"].options = <?php echo JsonEncode($t001_jo_edit->Status->options(FALSE, TRUE)) ?>;
	ft001_joedit.lists["x_BM"] = <?php echo $t001_jo_edit->BM->Lookup->toClientList($t001_jo_edit) ?>;
	ft001_joedit.lists["x_BM"].options = <?php echo JsonEncode($t001_jo_edit->BM->options(FALSE, TRUE)) ?>;
	loadjs.done("ft001_joedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t001_jo_edit->showPageHeader(); ?>
<?php
$t001_jo_edit->showMessage();
?>
<form name="ft001_joedit" id="ft001_joedit" class="<?php echo $t001_jo_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_jo">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t001_jo_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t001_jo_edit->NoJO->Visible) { // NoJO ?>
	<div id="r_NoJO" class="form-group row">
		<label id="elh_t001_jo_NoJO" for="x_NoJO" class="<?php echo $t001_jo_edit->LeftColumnClass ?>"><?php echo $t001_jo_edit->NoJO->caption() ?><?php echo $t001_jo_edit->NoJO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_jo_edit->RightColumnClass ?>"><div <?php echo $t001_jo_edit->NoJO->cellAttributes() ?>>
<span id="el_t001_jo_NoJO">
<input type="text" data-table="t001_jo" data-field="x_NoJO" name="x_NoJO" id="x_NoJO" size="15" maxlength="25" placeholder="<?php echo HtmlEncode($t001_jo_edit->NoJO->getPlaceHolder()) ?>" value="<?php echo $t001_jo_edit->NoJO->EditValue ?>"<?php echo $t001_jo_edit->NoJO->editAttributes() ?>>
</span>
<?php echo $t001_jo_edit->NoJO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t001_jo_edit->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label id="elh_t001_jo_Status" for="x_Status" class="<?php echo $t001_jo_edit->LeftColumnClass ?>"><?php echo $t001_jo_edit->Status->caption() ?><?php echo $t001_jo_edit->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_jo_edit->RightColumnClass ?>"><div <?php echo $t001_jo_edit->Status->cellAttributes() ?>>
<span id="el_t001_jo_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t001_jo" data-field="x_Status" data-value-separator="<?php echo $t001_jo_edit->Status->displayValueSeparatorAttribute() ?>" id="x_Status" name="x_Status"<?php echo $t001_jo_edit->Status->editAttributes() ?>>
			<?php echo $t001_jo_edit->Status->selectOptionListHtml("x_Status") ?>
		</select>
</div>
</span>
<?php echo $t001_jo_edit->Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t001_jo_edit->Tagihan->Visible) { // Tagihan ?>
	<div id="r_Tagihan" class="form-group row">
		<label id="elh_t001_jo_Tagihan" for="x_Tagihan" class="<?php echo $t001_jo_edit->LeftColumnClass ?>"><?php echo $t001_jo_edit->Tagihan->caption() ?><?php echo $t001_jo_edit->Tagihan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_jo_edit->RightColumnClass ?>"><div <?php echo $t001_jo_edit->Tagihan->cellAttributes() ?>>
<span id="el_t001_jo_Tagihan">
<input type="text" data-table="t001_jo" data-field="x_Tagihan" name="x_Tagihan" id="x_Tagihan" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t001_jo_edit->Tagihan->getPlaceHolder()) ?>" value="<?php echo $t001_jo_edit->Tagihan->EditValue ?>"<?php echo $t001_jo_edit->Tagihan->editAttributes() ?>>
</span>
<?php echo $t001_jo_edit->Tagihan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t001_jo_edit->Shipper->Visible) { // Shipper ?>
	<div id="r_Shipper" class="form-group row">
		<label id="elh_t001_jo_Shipper" for="x_Shipper" class="<?php echo $t001_jo_edit->LeftColumnClass ?>"><?php echo $t001_jo_edit->Shipper->caption() ?><?php echo $t001_jo_edit->Shipper->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_jo_edit->RightColumnClass ?>"><div <?php echo $t001_jo_edit->Shipper->cellAttributes() ?>>
<span id="el_t001_jo_Shipper">
<input type="text" data-table="t001_jo" data-field="x_Shipper" name="x_Shipper" id="x_Shipper" size="10" maxlength="100" placeholder="<?php echo HtmlEncode($t001_jo_edit->Shipper->getPlaceHolder()) ?>" value="<?php echo $t001_jo_edit->Shipper->EditValue ?>"<?php echo $t001_jo_edit->Shipper->editAttributes() ?>>
</span>
<?php echo $t001_jo_edit->Shipper->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t001_jo_edit->Qty->Visible) { // Qty ?>
	<div id="r_Qty" class="form-group row">
		<label id="elh_t001_jo_Qty" for="x_Qty" class="<?php echo $t001_jo_edit->LeftColumnClass ?>"><?php echo $t001_jo_edit->Qty->caption() ?><?php echo $t001_jo_edit->Qty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_jo_edit->RightColumnClass ?>"><div <?php echo $t001_jo_edit->Qty->cellAttributes() ?>>
<span id="el_t001_jo_Qty">
<input type="text" data-table="t001_jo" data-field="x_Qty" name="x_Qty" id="x_Qty" size="10" maxlength="5" placeholder="<?php echo HtmlEncode($t001_jo_edit->Qty->getPlaceHolder()) ?>" value="<?php echo $t001_jo_edit->Qty->EditValue ?>"<?php echo $t001_jo_edit->Qty->editAttributes() ?>>
</span>
<?php echo $t001_jo_edit->Qty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t001_jo_edit->Cont->Visible) { // Cont ?>
	<div id="r_Cont" class="form-group row">
		<label id="elh_t001_jo_Cont" for="x_Cont" class="<?php echo $t001_jo_edit->LeftColumnClass ?>"><?php echo $t001_jo_edit->Cont->caption() ?><?php echo $t001_jo_edit->Cont->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_jo_edit->RightColumnClass ?>"><div <?php echo $t001_jo_edit->Cont->cellAttributes() ?>>
<span id="el_t001_jo_Cont">
<input type="text" data-table="t001_jo" data-field="x_Cont" name="x_Cont" id="x_Cont" size="10" maxlength="5" placeholder="<?php echo HtmlEncode($t001_jo_edit->Cont->getPlaceHolder()) ?>" value="<?php echo $t001_jo_edit->Cont->EditValue ?>"<?php echo $t001_jo_edit->Cont->editAttributes() ?>>
</span>
<?php echo $t001_jo_edit->Cont->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t001_jo_edit->Tujuan->Visible) { // Tujuan ?>
	<div id="r_Tujuan" class="form-group row">
		<label id="elh_t001_jo_Tujuan" for="x_Tujuan" class="<?php echo $t001_jo_edit->LeftColumnClass ?>"><?php echo $t001_jo_edit->Tujuan->caption() ?><?php echo $t001_jo_edit->Tujuan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_jo_edit->RightColumnClass ?>"><div <?php echo $t001_jo_edit->Tujuan->cellAttributes() ?>>
<span id="el_t001_jo_Tujuan">
<input type="text" data-table="t001_jo" data-field="x_Tujuan" name="x_Tujuan" id="x_Tujuan" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t001_jo_edit->Tujuan->getPlaceHolder()) ?>" value="<?php echo $t001_jo_edit->Tujuan->EditValue ?>"<?php echo $t001_jo_edit->Tujuan->editAttributes() ?>>
</span>
<?php echo $t001_jo_edit->Tujuan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t001_jo_edit->Kapal->Visible) { // Kapal ?>
	<div id="r_Kapal" class="form-group row">
		<label id="elh_t001_jo_Kapal" for="x_Kapal" class="<?php echo $t001_jo_edit->LeftColumnClass ?>"><?php echo $t001_jo_edit->Kapal->caption() ?><?php echo $t001_jo_edit->Kapal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_jo_edit->RightColumnClass ?>"><div <?php echo $t001_jo_edit->Kapal->cellAttributes() ?>>
<span id="el_t001_jo_Kapal">
<input type="text" data-table="t001_jo" data-field="x_Kapal" name="x_Kapal" id="x_Kapal" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t001_jo_edit->Kapal->getPlaceHolder()) ?>" value="<?php echo $t001_jo_edit->Kapal->EditValue ?>"<?php echo $t001_jo_edit->Kapal->editAttributes() ?>>
</span>
<?php echo $t001_jo_edit->Kapal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t001_jo_edit->BM->Visible) { // BM ?>
	<div id="r_BM" class="form-group row">
		<label id="elh_t001_jo_BM" class="<?php echo $t001_jo_edit->LeftColumnClass ?>"><?php echo $t001_jo_edit->BM->caption() ?><?php echo $t001_jo_edit->BM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_jo_edit->RightColumnClass ?>"><div <?php echo $t001_jo_edit->BM->cellAttributes() ?>>
<span id="el_t001_jo_BM">
<div id="tp_x_BM" class="ew-template"><input type="radio" class="custom-control-input" data-table="t001_jo" data-field="x_BM" data-value-separator="<?php echo $t001_jo_edit->BM->displayValueSeparatorAttribute() ?>" name="x_BM" id="x_BM" value="{value}"<?php echo $t001_jo_edit->BM->editAttributes() ?>></div>
<div id="dsl_x_BM" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t001_jo_edit->BM->radioButtonListHtml(FALSE, "x_BM") ?>
</div></div>
</span>
<?php echo $t001_jo_edit->BM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t001_jo_edit->Doc->Visible) { // Doc ?>
	<div id="r_Doc" class="form-group row">
		<label id="elh_t001_jo_Doc" class="<?php echo $t001_jo_edit->LeftColumnClass ?>"><?php echo $t001_jo_edit->Doc->caption() ?><?php echo $t001_jo_edit->Doc->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_jo_edit->RightColumnClass ?>"><div <?php echo $t001_jo_edit->Doc->cellAttributes() ?>>
<span id="el_t001_jo_Doc">
<div id="fd_x_Doc">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $t001_jo_edit->Doc->title() ?>" data-table="t001_jo" data-field="x_Doc" name="x_Doc" id="x_Doc" lang="<?php echo CurrentLanguageID() ?>"<?php echo $t001_jo_edit->Doc->editAttributes() ?><?php if ($t001_jo_edit->Doc->ReadOnly || $t001_jo_edit->Doc->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_Doc"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_Doc" id= "fn_x_Doc" value="<?php echo $t001_jo_edit->Doc->Upload->FileName ?>">
<input type="hidden" name="fa_x_Doc" id= "fa_x_Doc" value="<?php echo (Post("fa_x_Doc") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x_Doc" id= "fs_x_Doc" value="255">
<input type="hidden" name="fx_x_Doc" id= "fx_x_Doc" value="<?php echo $t001_jo_edit->Doc->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_Doc" id= "fm_x_Doc" value="<?php echo $t001_jo_edit->Doc->UploadMaxFileSize ?>">
</div>
<table id="ft_x_Doc" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $t001_jo_edit->Doc->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t001_jo" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t001_jo_edit->id->CurrentValue) ?>">
<?php if (!$t001_jo_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t001_jo_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t001_jo_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t001_jo_edit->showPageFooter();
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
$t001_jo_edit->terminate();
?>