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
$t002_jenis_edit = new t002_jenis_edit();

// Run the page
$t002_jenis_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_jenis_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft002_jenisedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft002_jenisedit = currentForm = new ew.Form("ft002_jenisedit", "edit");

	// Validate form
	ft002_jenisedit.validate = function() {
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
			<?php if ($t002_jenis_edit->Nama->Required) { ?>
				elm = this.getElements("x" + infix + "_Nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_jenis_edit->Nama->caption(), $t002_jenis_edit->Nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t002_jenis_edit->NoKolom->Required) { ?>
				elm = this.getElements("x" + infix + "_NoKolom");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_jenis_edit->NoKolom->caption(), $t002_jenis_edit->NoKolom->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoKolom");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_jenis_edit->NoKolom->errorMessage()) ?>");

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
	ft002_jenisedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft002_jenisedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft002_jenisedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t002_jenis_edit->showPageHeader(); ?>
<?php
$t002_jenis_edit->showMessage();
?>
<form name="ft002_jenisedit" id="ft002_jenisedit" class="<?php echo $t002_jenis_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_jenis">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t002_jenis_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t002_jenis_edit->Nama->Visible) { // Nama ?>
	<div id="r_Nama" class="form-group row">
		<label id="elh_t002_jenis_Nama" for="x_Nama" class="<?php echo $t002_jenis_edit->LeftColumnClass ?>"><?php echo $t002_jenis_edit->Nama->caption() ?><?php echo $t002_jenis_edit->Nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_jenis_edit->RightColumnClass ?>"><div <?php echo $t002_jenis_edit->Nama->cellAttributes() ?>>
<span id="el_t002_jenis_Nama">
<textarea data-table="t002_jenis" data-field="x_Nama" name="x_Nama" id="x_Nama" cols="50" rows="1" placeholder="<?php echo HtmlEncode($t002_jenis_edit->Nama->getPlaceHolder()) ?>"<?php echo $t002_jenis_edit->Nama->editAttributes() ?>><?php echo $t002_jenis_edit->Nama->EditValue ?></textarea>
</span>
<?php echo $t002_jenis_edit->Nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t002_jenis_edit->NoKolom->Visible) { // NoKolom ?>
	<div id="r_NoKolom" class="form-group row">
		<label id="elh_t002_jenis_NoKolom" for="x_NoKolom" class="<?php echo $t002_jenis_edit->LeftColumnClass ?>"><?php echo $t002_jenis_edit->NoKolom->caption() ?><?php echo $t002_jenis_edit->NoKolom->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_jenis_edit->RightColumnClass ?>"><div <?php echo $t002_jenis_edit->NoKolom->cellAttributes() ?>>
<span id="el_t002_jenis_NoKolom">
<input type="text" data-table="t002_jenis" data-field="x_NoKolom" name="x_NoKolom" id="x_NoKolom" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t002_jenis_edit->NoKolom->getPlaceHolder()) ?>" value="<?php echo $t002_jenis_edit->NoKolom->EditValue ?>"<?php echo $t002_jenis_edit->NoKolom->editAttributes() ?>>
</span>
<?php echo $t002_jenis_edit->NoKolom->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t002_jenis" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t002_jenis_edit->id->CurrentValue) ?>">
<?php if (!$t002_jenis_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t002_jenis_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t002_jenis_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t002_jenis_edit->showPageFooter();
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
$t002_jenis_edit->terminate();
?>