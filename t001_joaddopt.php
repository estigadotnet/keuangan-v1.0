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
$t001_jo_addopt = new t001_jo_addopt();

// Run the page
$t001_jo_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_jo_addopt->Page_Render();
?>
<script>
var ft001_joaddopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	ft001_joaddopt = currentForm = new ew.Form("ft001_joaddopt", "addopt");

	// Validate form
	ft001_joaddopt.validate = function() {
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
			<?php if ($t001_jo_addopt->NoJO->Required) { ?>
				elm = this.getElements("x" + infix + "_NoJO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_addopt->NoJO->caption(), $t001_jo_addopt->NoJO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_addopt->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_addopt->Status->caption(), $t001_jo_addopt->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_addopt->Tagihan->Required) { ?>
				elm = this.getElements("x" + infix + "_Tagihan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_addopt->Tagihan->caption(), $t001_jo_addopt->Tagihan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Tagihan");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t001_jo_addopt->Tagihan->errorMessage()) ?>");
			<?php if ($t001_jo_addopt->Shipper->Required) { ?>
				elm = this.getElements("x" + infix + "_Shipper");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_addopt->Shipper->caption(), $t001_jo_addopt->Shipper->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_addopt->Qty->Required) { ?>
				elm = this.getElements("x" + infix + "_Qty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_addopt->Qty->caption(), $t001_jo_addopt->Qty->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_addopt->Cont->Required) { ?>
				elm = this.getElements("x" + infix + "_Cont");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_addopt->Cont->caption(), $t001_jo_addopt->Cont->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_addopt->Tujuan->Required) { ?>
				elm = this.getElements("x" + infix + "_Tujuan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_addopt->Tujuan->caption(), $t001_jo_addopt->Tujuan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_addopt->Kapal->Required) { ?>
				elm = this.getElements("x" + infix + "_Kapal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_addopt->Kapal->caption(), $t001_jo_addopt->Kapal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_addopt->BM->Required) { ?>
				elm = this.getElements("x" + infix + "_BM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_jo_addopt->BM->caption(), $t001_jo_addopt->BM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_jo_addopt->Doc->Required) { ?>
				felm = this.getElements("x" + infix + "_Doc");
				elm = this.getElements("fn_x" + infix + "_Doc");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $t001_jo_addopt->Doc->caption(), $t001_jo_addopt->Doc->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	ft001_joaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft001_joaddopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft001_joaddopt.lists["x_Status"] = <?php echo $t001_jo_addopt->Status->Lookup->toClientList($t001_jo_addopt) ?>;
	ft001_joaddopt.lists["x_Status"].options = <?php echo JsonEncode($t001_jo_addopt->Status->options(FALSE, TRUE)) ?>;
	ft001_joaddopt.lists["x_BM"] = <?php echo $t001_jo_addopt->BM->Lookup->toClientList($t001_jo_addopt) ?>;
	ft001_joaddopt.lists["x_BM"].options = <?php echo JsonEncode($t001_jo_addopt->BM->options(FALSE, TRUE)) ?>;
	loadjs.done("ft001_joaddopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t001_jo_addopt->showPageHeader(); ?>
<?php
$t001_jo_addopt->showMessage();
?>
<form name="ft001_joaddopt" id="ft001_joaddopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $t001_jo_addopt->TableVar ?>">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($t001_jo_addopt->NoJO->Visible) { // NoJO ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_NoJO"><?php echo $t001_jo_addopt->NoJO->caption() ?><?php echo $t001_jo_addopt->NoJO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="t001_jo" data-field="x_NoJO" name="x_NoJO" id="x_NoJO" size="15" maxlength="25" placeholder="<?php echo HtmlEncode($t001_jo_addopt->NoJO->getPlaceHolder()) ?>" value="<?php echo $t001_jo_addopt->NoJO->EditValue ?>"<?php echo $t001_jo_addopt->NoJO->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($t001_jo_addopt->Status->Visible) { // Status ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Status"><?php echo $t001_jo_addopt->Status->caption() ?><?php echo $t001_jo_addopt->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t001_jo" data-field="x_Status" data-value-separator="<?php echo $t001_jo_addopt->Status->displayValueSeparatorAttribute() ?>" id="x_Status" name="x_Status"<?php echo $t001_jo_addopt->Status->editAttributes() ?>>
			<?php echo $t001_jo_addopt->Status->selectOptionListHtml("x_Status") ?>
		</select>
</div>
</div>
	</div>
<?php } ?>
<?php if ($t001_jo_addopt->Tagihan->Visible) { // Tagihan ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Tagihan"><?php echo $t001_jo_addopt->Tagihan->caption() ?><?php echo $t001_jo_addopt->Tagihan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="t001_jo" data-field="x_Tagihan" name="x_Tagihan" id="x_Tagihan" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t001_jo_addopt->Tagihan->getPlaceHolder()) ?>" value="<?php echo $t001_jo_addopt->Tagihan->EditValue ?>"<?php echo $t001_jo_addopt->Tagihan->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($t001_jo_addopt->Shipper->Visible) { // Shipper ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Shipper"><?php echo $t001_jo_addopt->Shipper->caption() ?><?php echo $t001_jo_addopt->Shipper->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="t001_jo" data-field="x_Shipper" name="x_Shipper" id="x_Shipper" size="10" maxlength="100" placeholder="<?php echo HtmlEncode($t001_jo_addopt->Shipper->getPlaceHolder()) ?>" value="<?php echo $t001_jo_addopt->Shipper->EditValue ?>"<?php echo $t001_jo_addopt->Shipper->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($t001_jo_addopt->Qty->Visible) { // Qty ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Qty"><?php echo $t001_jo_addopt->Qty->caption() ?><?php echo $t001_jo_addopt->Qty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="t001_jo" data-field="x_Qty" name="x_Qty" id="x_Qty" size="10" maxlength="5" placeholder="<?php echo HtmlEncode($t001_jo_addopt->Qty->getPlaceHolder()) ?>" value="<?php echo $t001_jo_addopt->Qty->EditValue ?>"<?php echo $t001_jo_addopt->Qty->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($t001_jo_addopt->Cont->Visible) { // Cont ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Cont"><?php echo $t001_jo_addopt->Cont->caption() ?><?php echo $t001_jo_addopt->Cont->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="t001_jo" data-field="x_Cont" name="x_Cont" id="x_Cont" size="10" maxlength="5" placeholder="<?php echo HtmlEncode($t001_jo_addopt->Cont->getPlaceHolder()) ?>" value="<?php echo $t001_jo_addopt->Cont->EditValue ?>"<?php echo $t001_jo_addopt->Cont->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($t001_jo_addopt->Tujuan->Visible) { // Tujuan ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Tujuan"><?php echo $t001_jo_addopt->Tujuan->caption() ?><?php echo $t001_jo_addopt->Tujuan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="t001_jo" data-field="x_Tujuan" name="x_Tujuan" id="x_Tujuan" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t001_jo_addopt->Tujuan->getPlaceHolder()) ?>" value="<?php echo $t001_jo_addopt->Tujuan->EditValue ?>"<?php echo $t001_jo_addopt->Tujuan->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($t001_jo_addopt->Kapal->Visible) { // Kapal ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Kapal"><?php echo $t001_jo_addopt->Kapal->caption() ?><?php echo $t001_jo_addopt->Kapal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="t001_jo" data-field="x_Kapal" name="x_Kapal" id="x_Kapal" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t001_jo_addopt->Kapal->getPlaceHolder()) ?>" value="<?php echo $t001_jo_addopt->Kapal->EditValue ?>"<?php echo $t001_jo_addopt->Kapal->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($t001_jo_addopt->BM->Visible) { // BM ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label"><?php echo $t001_jo_addopt->BM->caption() ?><?php echo $t001_jo_addopt->BM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div id="tp_x_BM" class="ew-template"><input type="radio" class="custom-control-input" data-table="t001_jo" data-field="x_BM" data-value-separator="<?php echo $t001_jo_addopt->BM->displayValueSeparatorAttribute() ?>" name="x_BM" id="x_BM" value="{value}"<?php echo $t001_jo_addopt->BM->editAttributes() ?>></div>
<div id="dsl_x_BM" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t001_jo_addopt->BM->radioButtonListHtml(FALSE, "x_BM") ?>
</div></div>
</div>
	</div>
<?php } ?>
<?php if ($t001_jo_addopt->Doc->Visible) { // Doc ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label"><?php echo $t001_jo_addopt->Doc->caption() ?><?php echo $t001_jo_addopt->Doc->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div id="fd_x_Doc">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $t001_jo_addopt->Doc->title() ?>" data-table="t001_jo" data-field="x_Doc" name="x_Doc" id="x_Doc" lang="<?php echo CurrentLanguageID() ?>"<?php echo $t001_jo_addopt->Doc->editAttributes() ?><?php if ($t001_jo_addopt->Doc->ReadOnly || $t001_jo_addopt->Doc->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_Doc"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_Doc" id= "fn_x_Doc" value="<?php echo $t001_jo_addopt->Doc->Upload->FileName ?>">
<input type="hidden" name="fa_x_Doc" id= "fa_x_Doc" value="0">
<input type="hidden" name="fs_x_Doc" id= "fs_x_Doc" value="255">
<input type="hidden" name="fx_x_Doc" id= "fx_x_Doc" value="<?php echo $t001_jo_addopt->Doc->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_Doc" id= "fm_x_Doc" value="<?php echo $t001_jo_addopt->Doc->UploadMaxFileSize ?>">
</div>
<table id="ft_x_Doc" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</div>
	</div>
<?php } ?>
</form>
<?php
$t001_jo_addopt->showPageFooter();
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
<?php
$t001_jo_addopt->terminate();
?>