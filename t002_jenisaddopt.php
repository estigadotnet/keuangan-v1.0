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
$t002_jenis_addopt = new t002_jenis_addopt();

// Run the page
$t002_jenis_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_jenis_addopt->Page_Render();
?>
<script>
var ft002_jenisaddopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	ft002_jenisaddopt = currentForm = new ew.Form("ft002_jenisaddopt", "addopt");

	// Validate form
	ft002_jenisaddopt.validate = function() {
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
			<?php if ($t002_jenis_addopt->Nama->Required) { ?>
				elm = this.getElements("x" + infix + "_Nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_jenis_addopt->Nama->caption(), $t002_jenis_addopt->Nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t002_jenis_addopt->NoKolom->Required) { ?>
				elm = this.getElements("x" + infix + "_NoKolom");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_jenis_addopt->NoKolom->caption(), $t002_jenis_addopt->NoKolom->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoKolom");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_jenis_addopt->NoKolom->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	ft002_jenisaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft002_jenisaddopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft002_jenisaddopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t002_jenis_addopt->showPageHeader(); ?>
<?php
$t002_jenis_addopt->showMessage();
?>
<form name="ft002_jenisaddopt" id="ft002_jenisaddopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $t002_jenis_addopt->TableVar ?>">
<?php if ($t002_jenis_addopt->Nama->Visible) { // Nama ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Nama"><?php echo $t002_jenis_addopt->Nama->caption() ?><?php echo $t002_jenis_addopt->Nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<textarea data-table="t002_jenis" data-field="x_Nama" name="x_Nama" id="x_Nama" cols="50" rows="1" placeholder="<?php echo HtmlEncode($t002_jenis_addopt->Nama->getPlaceHolder()) ?>"<?php echo $t002_jenis_addopt->Nama->editAttributes() ?>><?php echo $t002_jenis_addopt->Nama->EditValue ?></textarea>
</div>
	</div>
<?php } ?>
<?php if ($t002_jenis_addopt->NoKolom->Visible) { // NoKolom ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_NoKolom"><?php echo $t002_jenis_addopt->NoKolom->caption() ?><?php echo $t002_jenis_addopt->NoKolom->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="t002_jenis" data-field="x_NoKolom" name="x_NoKolom" id="x_NoKolom" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t002_jenis_addopt->NoKolom->getPlaceHolder()) ?>" value="<?php echo $t002_jenis_addopt->NoKolom->EditValue ?>"<?php echo $t002_jenis_addopt->NoKolom->editAttributes() ?>>
</div>
	</div>
<?php } ?>
</form>
<?php
$t002_jenis_addopt->showPageFooter();
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
$t002_jenis_addopt->terminate();
?>