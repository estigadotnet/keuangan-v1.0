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
$t102_mutasi_add = new t102_mutasi_add();

// Run the page
$t102_mutasi_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_mutasi_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft102_mutasiadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ft102_mutasiadd = currentForm = new ew.Form("ft102_mutasiadd", "add");

	// Validate form
	ft102_mutasiadd.validate = function() {
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
			<?php if ($t102_mutasi_add->Tanggal->Required) { ?>
				elm = this.getElements("x" + infix + "_Tanggal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_mutasi_add->Tanggal->caption(), $t102_mutasi_add->Tanggal->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Tanggal");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_mutasi_add->Tanggal->errorMessage()) ?>");
			<?php if ($t102_mutasi_add->NoUrut->Required) { ?>
				elm = this.getElements("x" + infix + "_NoUrut");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_mutasi_add->NoUrut->caption(), $t102_mutasi_add->NoUrut->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoUrut");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_mutasi_add->NoUrut->errorMessage()) ?>");
			<?php if ($t102_mutasi_add->jo_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jo_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_mutasi_add->jo_id->caption(), $t102_mutasi_add->jo_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t102_mutasi_add->jenis_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jenis_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_mutasi_add->jenis_id->caption(), $t102_mutasi_add->jenis_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t102_mutasi_add->Comment->Required) { ?>
				elm = this.getElements("x" + infix + "_Comment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_mutasi_add->Comment->caption(), $t102_mutasi_add->Comment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t102_mutasi_add->Masuk->Required) { ?>
				elm = this.getElements("x" + infix + "_Masuk");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_mutasi_add->Masuk->caption(), $t102_mutasi_add->Masuk->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Masuk");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_mutasi_add->Masuk->errorMessage()) ?>");
			<?php if ($t102_mutasi_add->Keluar->Required) { ?>
				elm = this.getElements("x" + infix + "_Keluar");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_mutasi_add->Keluar->caption(), $t102_mutasi_add->Keluar->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Keluar");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_mutasi_add->Keluar->errorMessage()) ?>");

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
	ft102_mutasiadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft102_mutasiadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft102_mutasiadd.lists["x_jo_id"] = <?php echo $t102_mutasi_add->jo_id->Lookup->toClientList($t102_mutasi_add) ?>;
	ft102_mutasiadd.lists["x_jo_id"].options = <?php echo JsonEncode($t102_mutasi_add->jo_id->lookupOptions()) ?>;
	ft102_mutasiadd.lists["x_jenis_id"] = <?php echo $t102_mutasi_add->jenis_id->Lookup->toClientList($t102_mutasi_add) ?>;
	ft102_mutasiadd.lists["x_jenis_id"].options = <?php echo JsonEncode($t102_mutasi_add->jenis_id->lookupOptions()) ?>;
	loadjs.done("ft102_mutasiadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t102_mutasi_add->showPageHeader(); ?>
<?php
$t102_mutasi_add->showMessage();
?>
<form name="ft102_mutasiadd" id="ft102_mutasiadd" class="<?php echo $t102_mutasi_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_mutasi">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t102_mutasi_add->IsModal ?>">
<?php if ($t102_mutasi->getCurrentMasterTable() == "t001_jo") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="t001_jo">
<input type="hidden" name="fk_id" value="<?php echo $t102_mutasi_add->jo_id->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($t102_mutasi_add->Tanggal->Visible) { // Tanggal ?>
	<div id="r_Tanggal" class="form-group row">
		<label id="elh_t102_mutasi_Tanggal" for="x_Tanggal" class="<?php echo $t102_mutasi_add->LeftColumnClass ?>"><?php echo $t102_mutasi_add->Tanggal->caption() ?><?php echo $t102_mutasi_add->Tanggal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_mutasi_add->RightColumnClass ?>"><div <?php echo $t102_mutasi_add->Tanggal->cellAttributes() ?>>
<span id="el_t102_mutasi_Tanggal">
<input type="text" data-table="t102_mutasi" data-field="x_Tanggal" data-format="7" name="x_Tanggal" id="x_Tanggal" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t102_mutasi_add->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_add->Tanggal->EditValue ?>"<?php echo $t102_mutasi_add->Tanggal->editAttributes() ?>>
<?php if (!$t102_mutasi_add->Tanggal->ReadOnly && !$t102_mutasi_add->Tanggal->Disabled && !isset($t102_mutasi_add->Tanggal->EditAttrs["readonly"]) && !isset($t102_mutasi_add->Tanggal->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft102_mutasiadd", "datetimepicker"], function() {
	ew.createDateTimePicker("ft102_mutasiadd", "x_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $t102_mutasi_add->Tanggal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t102_mutasi_add->NoUrut->Visible) { // NoUrut ?>
	<div id="r_NoUrut" class="form-group row">
		<label id="elh_t102_mutasi_NoUrut" for="x_NoUrut" class="<?php echo $t102_mutasi_add->LeftColumnClass ?>"><?php echo $t102_mutasi_add->NoUrut->caption() ?><?php echo $t102_mutasi_add->NoUrut->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_mutasi_add->RightColumnClass ?>"><div <?php echo $t102_mutasi_add->NoUrut->cellAttributes() ?>>
<span id="el_t102_mutasi_NoUrut">
<input type="text" data-table="t102_mutasi" data-field="x_NoUrut" name="x_NoUrut" id="x_NoUrut" size="3" maxlength="4" placeholder="<?php echo HtmlEncode($t102_mutasi_add->NoUrut->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_add->NoUrut->EditValue ?>"<?php echo $t102_mutasi_add->NoUrut->editAttributes() ?>>
</span>
<?php echo $t102_mutasi_add->NoUrut->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t102_mutasi_add->jo_id->Visible) { // jo_id ?>
	<div id="r_jo_id" class="form-group row">
		<label id="elh_t102_mutasi_jo_id" for="x_jo_id" class="<?php echo $t102_mutasi_add->LeftColumnClass ?>"><?php echo $t102_mutasi_add->jo_id->caption() ?><?php echo $t102_mutasi_add->jo_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_mutasi_add->RightColumnClass ?>"><div <?php echo $t102_mutasi_add->jo_id->cellAttributes() ?>>
<?php if ($t102_mutasi_add->jo_id->getSessionValue() != "") { ?>
<span id="el_t102_mutasi_jo_id">
<span<?php echo $t102_mutasi_add->jo_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_mutasi_add->jo_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_jo_id" name="x_jo_id" value="<?php echo HtmlEncode($t102_mutasi_add->jo_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_t102_mutasi_jo_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_jo_id"><?php echo EmptyValue(strval($t102_mutasi_add->jo_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_mutasi_add->jo_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_mutasi_add->jo_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_mutasi_add->jo_id->ReadOnly || $t102_mutasi_add->jo_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_jo_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t001_jo") && !$t102_mutasi_add->jo_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_jo_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_mutasi_add->jo_id->caption() ?>" data-title="<?php echo $t102_mutasi_add->jo_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_jo_id',url:'t001_joaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t102_mutasi_add->jo_id->Lookup->getParamTag($t102_mutasi_add, "p_x_jo_id") ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jo_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_mutasi_add->jo_id->displayValueSeparatorAttribute() ?>" name="x_jo_id" id="x_jo_id" value="<?php echo $t102_mutasi_add->jo_id->CurrentValue ?>"<?php echo $t102_mutasi_add->jo_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $t102_mutasi_add->jo_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t102_mutasi_add->jenis_id->Visible) { // jenis_id ?>
	<div id="r_jenis_id" class="form-group row">
		<label id="elh_t102_mutasi_jenis_id" for="x_jenis_id" class="<?php echo $t102_mutasi_add->LeftColumnClass ?>"><?php echo $t102_mutasi_add->jenis_id->caption() ?><?php echo $t102_mutasi_add->jenis_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_mutasi_add->RightColumnClass ?>"><div <?php echo $t102_mutasi_add->jenis_id->cellAttributes() ?>>
<span id="el_t102_mutasi_jenis_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_jenis_id"><?php echo EmptyValue(strval($t102_mutasi_add->jenis_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_mutasi_add->jenis_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_mutasi_add->jenis_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_mutasi_add->jenis_id->ReadOnly || $t102_mutasi_add->jenis_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_jenis_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t002_jenis") && !$t102_mutasi_add->jenis_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_jenis_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t102_mutasi_add->jenis_id->caption() ?>" data-title="<?php echo $t102_mutasi_add->jenis_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_jenis_id',url:'t002_jenisaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t102_mutasi_add->jenis_id->Lookup->getParamTag($t102_mutasi_add, "p_x_jenis_id") ?>
<input type="hidden" data-table="t102_mutasi" data-field="x_jenis_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_mutasi_add->jenis_id->displayValueSeparatorAttribute() ?>" name="x_jenis_id" id="x_jenis_id" value="<?php echo $t102_mutasi_add->jenis_id->CurrentValue ?>"<?php echo $t102_mutasi_add->jenis_id->editAttributes() ?>>
</span>
<?php echo $t102_mutasi_add->jenis_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t102_mutasi_add->Comment->Visible) { // Comment ?>
	<div id="r_Comment" class="form-group row">
		<label id="elh_t102_mutasi_Comment" for="x_Comment" class="<?php echo $t102_mutasi_add->LeftColumnClass ?>"><?php echo $t102_mutasi_add->Comment->caption() ?><?php echo $t102_mutasi_add->Comment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_mutasi_add->RightColumnClass ?>"><div <?php echo $t102_mutasi_add->Comment->cellAttributes() ?>>
<span id="el_t102_mutasi_Comment">
<textarea data-table="t102_mutasi" data-field="x_Comment" name="x_Comment" id="x_Comment" cols="25" rows="1" placeholder="<?php echo HtmlEncode($t102_mutasi_add->Comment->getPlaceHolder()) ?>"<?php echo $t102_mutasi_add->Comment->editAttributes() ?>><?php echo $t102_mutasi_add->Comment->EditValue ?></textarea>
</span>
<?php echo $t102_mutasi_add->Comment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t102_mutasi_add->Masuk->Visible) { // Masuk ?>
	<div id="r_Masuk" class="form-group row">
		<label id="elh_t102_mutasi_Masuk" for="x_Masuk" class="<?php echo $t102_mutasi_add->LeftColumnClass ?>"><?php echo $t102_mutasi_add->Masuk->caption() ?><?php echo $t102_mutasi_add->Masuk->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_mutasi_add->RightColumnClass ?>"><div <?php echo $t102_mutasi_add->Masuk->cellAttributes() ?>>
<span id="el_t102_mutasi_Masuk">
<input type="text" data-table="t102_mutasi" data-field="x_Masuk" name="x_Masuk" id="x_Masuk" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t102_mutasi_add->Masuk->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_add->Masuk->EditValue ?>"<?php echo $t102_mutasi_add->Masuk->editAttributes() ?>>
</span>
<?php echo $t102_mutasi_add->Masuk->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t102_mutasi_add->Keluar->Visible) { // Keluar ?>
	<div id="r_Keluar" class="form-group row">
		<label id="elh_t102_mutasi_Keluar" for="x_Keluar" class="<?php echo $t102_mutasi_add->LeftColumnClass ?>"><?php echo $t102_mutasi_add->Keluar->caption() ?><?php echo $t102_mutasi_add->Keluar->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_mutasi_add->RightColumnClass ?>"><div <?php echo $t102_mutasi_add->Keluar->cellAttributes() ?>>
<span id="el_t102_mutasi_Keluar">
<input type="text" data-table="t102_mutasi" data-field="x_Keluar" name="x_Keluar" id="x_Keluar" size="14" maxlength="14" placeholder="<?php echo HtmlEncode($t102_mutasi_add->Keluar->getPlaceHolder()) ?>" value="<?php echo $t102_mutasi_add->Keluar->EditValue ?>"<?php echo $t102_mutasi_add->Keluar->editAttributes() ?>>
</span>
<?php echo $t102_mutasi_add->Keluar->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t102_mutasi_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t102_mutasi_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t102_mutasi_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t102_mutasi_add->showPageFooter();
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
$t102_mutasi_add->terminate();
?>