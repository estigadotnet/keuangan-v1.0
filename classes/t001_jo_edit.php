<?php
namespace PHPMaker2020\p_keuangan_v1_0;

/**
 * Page class
 */
class t001_jo_edit extends t001_jo
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{FBB5EF95-13BB-496B-B131-E8C649D0628A}";

	// Table name
	public $TableName = 't001_jo';

	// Page object name
	public $PageObjName = "t001_jo_edit";

	// Audit Trail
	public $AuditTrailOnAdd = TRUE;
	public $AuditTrailOnEdit = TRUE;
	public $AuditTrailOnDelete = TRUE;
	public $AuditTrailOnView = FALSE;
	public $AuditTrailOnViewData = FALSE;
	public $AuditTrailOnSearch = FALSE;

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken;

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading != "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading != "")
			return $this->Subheading;
		if ($this->TableName)
			return $Language->phrase($this->PageID);
		return "";
	}

	// Page name
	public function pageName()
	{
		return CurrentPageName();
	}

	// Page URL
	public function pageUrl()
	{
		$url = CurrentPageName() . "?";
		if ($this->UseTokenInUrl)
			$url .= "t=" . $this->TableVar . "&"; // Add page token
		return $url;
	}

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

	// Get message
	public function getMessage()
	{
		return isset($_SESSION[SESSION_MESSAGE]) ? $_SESSION[SESSION_MESSAGE] : $this->_message;
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($this->_message, $v);
		$_SESSION[SESSION_MESSAGE] = $this->_message;
	}

	// Get failure message
	public function getFailureMessage()
	{
		return isset($_SESSION[SESSION_FAILURE_MESSAGE]) ? $_SESSION[SESSION_FAILURE_MESSAGE] : $this->_failureMessage;
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($this->_failureMessage, $v);
		$_SESSION[SESSION_FAILURE_MESSAGE] = $this->_failureMessage;
	}

	// Get success message
	public function getSuccessMessage()
	{
		return isset($_SESSION[SESSION_SUCCESS_MESSAGE]) ? $_SESSION[SESSION_SUCCESS_MESSAGE] : $this->_successMessage;
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($this->_successMessage, $v);
		$_SESSION[SESSION_SUCCESS_MESSAGE] = $this->_successMessage;
	}

	// Get warning message
	public function getWarningMessage()
	{
		return isset($_SESSION[SESSION_WARNING_MESSAGE]) ? $_SESSION[SESSION_WARNING_MESSAGE] : $this->_warningMessage;
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($this->_warningMessage, $v);
		$_SESSION[SESSION_WARNING_MESSAGE] = $this->_warningMessage;
	}

	// Clear message
	public function clearMessage()
	{
		$this->_message = "";
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$this->_failureMessage = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$this->_successMessage = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$this->_warningMessage = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Clear messages
	public function clearMessages()
	{
		$this->clearMessage();
		$this->clearFailureMessage();
		$this->clearSuccessMessage();
		$this->clearWarningMessage();
	}

	// Show message
	public function showMessage()
	{
		$hidden = TRUE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message != "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fas fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage != "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fas fa-exclamation"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage != "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fas fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage != "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fas fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessages()
	{
		$ar = [];

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message != "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage != "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage != "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage != "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header != "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer != "") { // Footer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
		}
	}

	// Validate page request
	protected function isPageRequest()
	{
		global $CurrentForm;
		if ($this->UseTokenInUrl) {
			if ($CurrentForm)
				return ($this->TableVar == $CurrentForm->getValue("t"));
			if (Get("t") !== NULL)
				return ($this->TableVar == Get("t"));
		}
		return TRUE;
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(Config("TOKEN_NAME")) === NULL)
			return FALSE;
		$fn = Config("CHECK_TOKEN_FUNC");
		if (is_callable($fn))
			return $fn(Post(Config("TOKEN_NAME")), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = Config("CREATE_TOKEN_FUNC"); // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $DashboardReport;
		global $UserTable;

		// Check token
		$this->CheckToken = Config("CHECK_TOKEN");

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (t001_jo)
		if (!isset($GLOBALS["t001_jo"]) || get_class($GLOBALS["t001_jo"]) == PROJECT_NAMESPACE . "t001_jo") {
			$GLOBALS["t001_jo"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t001_jo"];
		}

		// Table object (t301_employees)
		if (!isset($GLOBALS['t301_employees']))
			$GLOBALS['t301_employees'] = new t301_employees();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 't001_jo');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = $this->getConnection();

		// User table object (t301_employees)
		$UserTable = $UserTable ?: new t301_employees();
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages, $DashboardReport;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $t001_jo;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($t001_jo);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessages()));
			return;
		}

		// Go to URL if specified
		if ($url != "") {
			if (!Config("DEBUG") && ob_get_length())
				ob_end_clean();

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = ["url" => $url, "modal" => "1"];
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "t001_joview.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				WriteJson($row);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = [];
		if (is_object($rs)) { // Recordset
			while ($rs && !$rs->EOF) {
				$this->loadRowValues($rs); // Set up DbValue/CurrentValue
				$row = $this->getRecordFromArray($rs->fields);
				if ($current)
					return $row;
				else
					$rows[] = $row;
				$rs->moveNext();
			}
		} elseif (is_array($rs)) {
			foreach ($rs as $ar) {
				$row = $this->getRecordFromArray($ar);
				if ($current)
					return $row;
				else
					$rows[] = $row;
			}
		}
		return $rows;
	}

	// Get record from array
	protected function getRecordFromArray($ar)
	{
		$row = [];
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {
								$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
									Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
									Config("API_FIELD_NAME") . "=" . $fld->Param . "&" .
									Config("API_KEY_NAME") . "=" . rawurlencode($this->getRecordKeyValue($ar)))); //*** need to add this? API may not be in the same folder
								$row[$fldname] = ["mimeType" => ContentType($val), "url" => $url];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, Config("MULTIPLE_UPLOAD_SEPARATOR"))) { // Single file
								$row[$fldname] = ["mimeType" => MimeContentType($val), "url" => FullUrl($fld->hrefPath() . $val)];
							} else { // Multiple files
								$files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
								$ar = [];
								foreach ($files as $file) {
									if (!EmptyValue($file))
										$ar[] = ["type" => MimeContentType($file), "url" => FullUrl($fld->hrefPath() . $file)];
								}
								$row[$fldname] = $ar;
							}
						}
					} else {
						$row[$fldname] = $val;
					}
				}
			}
		}
		return $row;
	}

	// Get record key value from array
	protected function getRecordKeyValue($ar)
	{
		$key = "";
		if (is_array($ar)) {
			$key .= @$ar['id'];
		}
		return $key;
	}

	/**
	 * Hide fields for add/edit
	 *
	 * @return void
	 */
	protected function hideFieldsForAddEdit()
	{
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->id->Visible = FALSE;
	}

	// Lookup data
	public function lookup()
	{
		global $Language, $Security;
		if (!isset($Language))
			$Language = new Language(Config("LANGUAGE_FOLDER"), Post("language", ""));

		// Set up API request
		if (!$this->setupApiRequest())
			return FALSE;

		// Get lookup object
		$fieldName = Post("field");
		if (!array_key_exists($fieldName, $this->fields))
			return FALSE;
		$lookupField = $this->fields[$fieldName];
		$lookup = $lookupField->Lookup;
		if ($lookup === NULL)
			return FALSE;
		$tbl = $lookup->getTable();
		if (!$Security->allowLookup(Config("PROJECT_ID") . $tbl->TableName)) // Lookup permission
			return FALSE;

		// Get lookup parameters
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Get("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = Config("AUTO_SUGGEST_MAX_ENTRIES");
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));
		$keys = Post("keys");
		$lookup->LookupType = $lookupType; // Lookup type
		if ($keys !== NULL) { // Selected records from modal
			if (is_array($keys))
				$keys = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $keys);
			$lookup->FilterFields = []; // Skip parent fields if any
			$lookup->FilterValues[] = $keys; // Lookup values
			$pageSize = -1; // Show all records
		} else { // Lookup values
			$lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
		}
		$cnt = is_array($lookup->FilterFields) ? count($lookup->FilterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = Post("v" . $i, "");
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect != "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter != "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy != "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson($this); // Use settings from current page
	}

	// Set up API request
	public function setupApiRequest()
	{
		global $Security;

		// Check security for API request
		If (ValidApiRequest()) {
			if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel(Config("PROJECT_ID") . $this->TableName);
			if ($Security->isLoggedIn()) $Security->TablePermission_Loaded();
			$Security->UserID_Loading();
			$Security->loadUserID();
			$Security->UserID_Loaded();
			return TRUE;
		}
		return FALSE;
	}
	public $FormClassName = "ew-horizontal ew-form ew-edit-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter;
	public $DbDetailFilter;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (!$this->setupApiRequest()) {
			$Security = new AdvancedSecurity();
			if (!$Security->isLoggedIn())
				$Security->autoLogin();
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName);
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loaded();
			if (!$Security->canEdit()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("t001_jolist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
			if ($Security->isLoggedIn()) {
				$Security->UserID_Loading();
				$Security->loadUserID();
				$Security->UserID_Loaded();
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->NoJO->setVisibility();
		$this->Status->setVisibility();
		$this->Tagihan->setVisibility();
		$this->NoBL->setVisibility();
		$this->Shipper->setVisibility();
		$this->Qty->setVisibility();
		$this->Cont->setVisibility();
		$this->BM->setVisibility();
		$this->Tujuan->setVisibility();
		$this->Kapal->setVisibility();
		$this->Doc->setVisibility();
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();

		// Set up lookup cache
		$this->setupLookupOptions($this->NoJO);

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-edit-form ew-horizontal";
		$loaded = FALSE;
		$postBack = FALSE;

		// Set up current action and primary key
		if (IsApi()) {
			$this->CurrentAction = "update"; // Update record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get action code
			if (!$this->isShow()) // Not reload record, handle as postback
				$postBack = TRUE;

			// Load key from Form
			if ($CurrentForm->hasValue("x_id")) {
				$this->id->setFormValue($CurrentForm->getValue("x_id"));
			}
		} else {
			$this->CurrentAction = "show"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$loadByQuery = TRUE;
			} else {
				$this->id->CurrentValue = NULL;
			}
		}

		// Load current record
		$loaded = $this->loadRow();

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values

			// Set up detail parameters
			$this->setupDetailParms();
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->setFailureMessage($FormError);
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues();
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = ""; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "show": // Get a record to display
				if (!$loaded) { // Load record based on key
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("t001_jolist.php"); // No matching record, return to list
				}

				// Set up detail parameters
				$this->setupDetailParms();
				break;
			case "update": // Update
				if ($this->getCurrentDetailTable() != "") // Master/detail edit
					$returnUrl = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=" . $this->getCurrentDetailTable()); // Master/Detail view page
				else
					$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "t001_jolist.php")
					$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
				$this->SendEmail = TRUE; // Send email on update success
				if ($this->editRow()) { // Update record based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Update success
					if (IsApi()) {
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl); // Return to caller
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} elseif ($this->getFailureMessage() == $Language->phrase("NoRecord")) {
					$this->terminate($returnUrl); // Return to caller
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Restore form values if update failed

					// Set up detail parameters
					$this->setupDetailParms();
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render the record
		$this->RowType = ROWTYPE_EDIT; // Render as Edit
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
		$this->Doc->Upload->Index = $CurrentForm->Index;
		$this->Doc->Upload->uploadFile();
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;
		$this->getUploadFiles(); // Get upload files

		// Check field name 'NoJO' first before field var 'x_NoJO'
		$val = $CurrentForm->hasValue("NoJO") ? $CurrentForm->getValue("NoJO") : $CurrentForm->getValue("x_NoJO");
		if (!$this->NoJO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NoJO->Visible = FALSE; // Disable update for API request
			else
				$this->NoJO->setFormValue($val);
		}

		// Check field name 'Status' first before field var 'x_Status'
		$val = $CurrentForm->hasValue("Status") ? $CurrentForm->getValue("Status") : $CurrentForm->getValue("x_Status");
		if (!$this->Status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Status->Visible = FALSE; // Disable update for API request
			else
				$this->Status->setFormValue($val);
		}

		// Check field name 'Tagihan' first before field var 'x_Tagihan'
		$val = $CurrentForm->hasValue("Tagihan") ? $CurrentForm->getValue("Tagihan") : $CurrentForm->getValue("x_Tagihan");
		if (!$this->Tagihan->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Tagihan->Visible = FALSE; // Disable update for API request
			else
				$this->Tagihan->setFormValue($val);
		}

		// Check field name 'NoBL' first before field var 'x_NoBL'
		$val = $CurrentForm->hasValue("NoBL") ? $CurrentForm->getValue("NoBL") : $CurrentForm->getValue("x_NoBL");
		if (!$this->NoBL->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NoBL->Visible = FALSE; // Disable update for API request
			else
				$this->NoBL->setFormValue($val);
		}

		// Check field name 'Shipper' first before field var 'x_Shipper'
		$val = $CurrentForm->hasValue("Shipper") ? $CurrentForm->getValue("Shipper") : $CurrentForm->getValue("x_Shipper");
		if (!$this->Shipper->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Shipper->Visible = FALSE; // Disable update for API request
			else
				$this->Shipper->setFormValue($val);
		}

		// Check field name 'Qty' first before field var 'x_Qty'
		$val = $CurrentForm->hasValue("Qty") ? $CurrentForm->getValue("Qty") : $CurrentForm->getValue("x_Qty");
		if (!$this->Qty->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Qty->Visible = FALSE; // Disable update for API request
			else
				$this->Qty->setFormValue($val);
		}

		// Check field name 'Cont' first before field var 'x_Cont'
		$val = $CurrentForm->hasValue("Cont") ? $CurrentForm->getValue("Cont") : $CurrentForm->getValue("x_Cont");
		if (!$this->Cont->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Cont->Visible = FALSE; // Disable update for API request
			else
				$this->Cont->setFormValue($val);
		}

		// Check field name 'BM' first before field var 'x_BM'
		$val = $CurrentForm->hasValue("BM") ? $CurrentForm->getValue("BM") : $CurrentForm->getValue("x_BM");
		if (!$this->BM->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BM->Visible = FALSE; // Disable update for API request
			else
				$this->BM->setFormValue($val);
		}

		// Check field name 'Tujuan' first before field var 'x_Tujuan'
		$val = $CurrentForm->hasValue("Tujuan") ? $CurrentForm->getValue("Tujuan") : $CurrentForm->getValue("x_Tujuan");
		if (!$this->Tujuan->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Tujuan->Visible = FALSE; // Disable update for API request
			else
				$this->Tujuan->setFormValue($val);
		}

		// Check field name 'Kapal' first before field var 'x_Kapal'
		$val = $CurrentForm->hasValue("Kapal") ? $CurrentForm->getValue("Kapal") : $CurrentForm->getValue("x_Kapal");
		if (!$this->Kapal->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Kapal->Visible = FALSE; // Disable update for API request
			else
				$this->Kapal->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->NoJO->CurrentValue = $this->NoJO->FormValue;
		$this->Status->CurrentValue = $this->Status->FormValue;
		$this->Tagihan->CurrentValue = $this->Tagihan->FormValue;
		$this->NoBL->CurrentValue = $this->NoBL->FormValue;
		$this->Shipper->CurrentValue = $this->Shipper->FormValue;
		$this->Qty->CurrentValue = $this->Qty->FormValue;
		$this->Cont->CurrentValue = $this->Cont->FormValue;
		$this->BM->CurrentValue = $this->BM->FormValue;
		$this->Tujuan->CurrentValue = $this->Tujuan->FormValue;
		$this->Kapal->CurrentValue = $this->Kapal->FormValue;
	}

	// Load row based on key values
	public function loadRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();

		// Call Row Selecting event
		$this->Row_Selecting($filter);

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$res = FALSE;
		$rs = LoadRecordset($sql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->loadRowValues($rs); // Load row values
			$rs->close();
		}
		return $res;
	}

	// Load row values from recordset
	public function loadRowValues($rs = NULL)
	{
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->newRow();

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
		$this->id->setDbValue($row['id']);
		$this->NoJO->setDbValue($row['NoJO']);
		$this->Status->setDbValue($row['Status']);
		$this->Tagihan->setDbValue($row['Tagihan']);
		$this->NoBL->setDbValue($row['NoBL']);
		$this->Shipper->setDbValue($row['Shipper']);
		$this->Qty->setDbValue($row['Qty']);
		$this->Cont->setDbValue($row['Cont']);
		$this->BM->setDbValue($row['BM']);
		$this->Tujuan->setDbValue($row['Tujuan']);
		$this->Kapal->setDbValue($row['Kapal']);
		$this->Doc->Upload->DbValue = $row['Doc'];
		$this->Doc->setDbValue($this->Doc->Upload->DbValue);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['NoJO'] = NULL;
		$row['Status'] = NULL;
		$row['Tagihan'] = NULL;
		$row['NoBL'] = NULL;
		$row['Shipper'] = NULL;
		$row['Qty'] = NULL;
		$row['Cont'] = NULL;
		$row['BM'] = NULL;
		$row['Tujuan'] = NULL;
		$row['Kapal'] = NULL;
		$row['Doc'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id")) != "")
			$this->id->OldValue = $this->getKey("id"); // id
		else
			$validKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = $this->getConnection();
			$this->OldRecordset = LoadRecordset($sql, $conn);
		}
		$this->loadRowValues($this->OldRecordset); // Load row values
		return $validKey;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Convert decimal values if posted back

		if ($this->Tagihan->FormValue == $this->Tagihan->CurrentValue && is_numeric(ConvertToFloatString($this->Tagihan->CurrentValue)))
			$this->Tagihan->CurrentValue = ConvertToFloatString($this->Tagihan->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// NoJO
		// Status
		// Tagihan
		// NoBL
		// Shipper
		// Qty
		// Cont
		// BM
		// Tujuan
		// Kapal
		// Doc

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// NoJO
			$this->NoJO->ViewValue = $this->NoJO->CurrentValue;
			$arwrk = [];
			$arwrk[1] = $this->NoJO->CurrentValue;
			$this->NoJO->ViewValue = $this->NoJO->displayValue($arwrk);
			$this->NoJO->ViewCustomAttributes = "";

			// Status
			if (strval($this->Status->CurrentValue) != "") {
				$this->Status->ViewValue = $this->Status->optionCaption($this->Status->CurrentValue);
			} else {
				$this->Status->ViewValue = NULL;
			}
			$this->Status->ViewCustomAttributes = "";

			// Tagihan
			$this->Tagihan->ViewValue = $this->Tagihan->CurrentValue;
			$this->Tagihan->ViewValue = FormatNumber($this->Tagihan->ViewValue, 0, -2, -2, -2);
			$this->Tagihan->CellCssStyle .= "text-align: right;";
			$this->Tagihan->ViewCustomAttributes = "";

			// NoBL
			$this->NoBL->ViewValue = $this->NoBL->CurrentValue;
			$this->NoBL->ViewCustomAttributes = "";

			// Shipper
			$this->Shipper->ViewValue = $this->Shipper->CurrentValue;
			$this->Shipper->ViewCustomAttributes = "";

			// Qty
			$this->Qty->ViewValue = $this->Qty->CurrentValue;
			$this->Qty->ViewCustomAttributes = "";

			// Cont
			$this->Cont->ViewValue = $this->Cont->CurrentValue;
			$this->Cont->ViewCustomAttributes = "";

			// BM
			if (strval($this->BM->CurrentValue) != "") {
				$this->BM->ViewValue = $this->BM->optionCaption($this->BM->CurrentValue);
			} else {
				$this->BM->ViewValue = NULL;
			}
			$this->BM->ViewCustomAttributes = "";

			// Tujuan
			$this->Tujuan->ViewValue = $this->Tujuan->CurrentValue;
			$this->Tujuan->ViewCustomAttributes = "";

			// Kapal
			$this->Kapal->ViewValue = $this->Kapal->CurrentValue;
			$this->Kapal->ViewCustomAttributes = "";

			// Doc
			if (!EmptyValue($this->Doc->Upload->DbValue)) {
				$this->Doc->ViewValue = $this->Doc->Upload->DbValue;
			} else {
				$this->Doc->ViewValue = "";
			}
			$this->Doc->ViewCustomAttributes = "";

			// NoJO
			$this->NoJO->LinkCustomAttributes = "";
			$this->NoJO->HrefValue = "";
			$this->NoJO->TooltipValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";
			$this->Status->TooltipValue = "";

			// Tagihan
			$this->Tagihan->LinkCustomAttributes = "";
			$this->Tagihan->HrefValue = "";
			$this->Tagihan->TooltipValue = "";

			// NoBL
			$this->NoBL->LinkCustomAttributes = "";
			$this->NoBL->HrefValue = "";
			$this->NoBL->TooltipValue = "";

			// Shipper
			$this->Shipper->LinkCustomAttributes = "";
			$this->Shipper->HrefValue = "";
			$this->Shipper->TooltipValue = "";

			// Qty
			$this->Qty->LinkCustomAttributes = "";
			$this->Qty->HrefValue = "";
			$this->Qty->TooltipValue = "";

			// Cont
			$this->Cont->LinkCustomAttributes = "";
			$this->Cont->HrefValue = "";
			$this->Cont->TooltipValue = "";

			// BM
			$this->BM->LinkCustomAttributes = "";
			$this->BM->HrefValue = "";
			$this->BM->TooltipValue = "";

			// Tujuan
			$this->Tujuan->LinkCustomAttributes = "";
			$this->Tujuan->HrefValue = "";
			$this->Tujuan->TooltipValue = "";

			// Kapal
			$this->Kapal->LinkCustomAttributes = "";
			$this->Kapal->HrefValue = "";
			$this->Kapal->TooltipValue = "";

			// Doc
			$this->Doc->LinkCustomAttributes = "";
			$this->Doc->HrefValue = "";
			$this->Doc->ExportHrefValue = $this->Doc->UploadPath . $this->Doc->Upload->DbValue;
			$this->Doc->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// NoJO
			$this->NoJO->EditAttrs["class"] = "form-control";
			$this->NoJO->EditCustomAttributes = "";
			if (!$this->NoJO->Raw)
				$this->NoJO->CurrentValue = HtmlDecode($this->NoJO->CurrentValue);
			$this->NoJO->EditValue = HtmlEncode($this->NoJO->CurrentValue);
			$arwrk = [];
			$arwrk[1] = HtmlEncode($this->NoJO->CurrentValue);
			$this->NoJO->EditValue = $this->NoJO->displayValue($arwrk);
			$this->NoJO->PlaceHolder = RemoveHtml($this->NoJO->caption());

			// Status
			$this->Status->EditAttrs["class"] = "form-control";
			$this->Status->EditCustomAttributes = "";
			$this->Status->EditValue = $this->Status->options(TRUE);

			// Tagihan
			$this->Tagihan->EditAttrs["class"] = "form-control";
			$this->Tagihan->EditCustomAttributes = "";
			$this->Tagihan->EditValue = HtmlEncode($this->Tagihan->CurrentValue);
			$this->Tagihan->PlaceHolder = RemoveHtml($this->Tagihan->caption());
			if (strval($this->Tagihan->EditValue) != "" && is_numeric($this->Tagihan->EditValue))
				$this->Tagihan->EditValue = FormatNumber($this->Tagihan->EditValue, -2, -2, -2, -2);
			

			// NoBL
			$this->NoBL->EditAttrs["class"] = "form-control";
			$this->NoBL->EditCustomAttributes = "";
			if (!$this->NoBL->Raw)
				$this->NoBL->CurrentValue = HtmlDecode($this->NoBL->CurrentValue);
			$this->NoBL->EditValue = HtmlEncode($this->NoBL->CurrentValue);
			$this->NoBL->PlaceHolder = RemoveHtml($this->NoBL->caption());

			// Shipper
			$this->Shipper->EditAttrs["class"] = "form-control";
			$this->Shipper->EditCustomAttributes = "";
			if (!$this->Shipper->Raw)
				$this->Shipper->CurrentValue = HtmlDecode($this->Shipper->CurrentValue);
			$this->Shipper->EditValue = HtmlEncode($this->Shipper->CurrentValue);
			$this->Shipper->PlaceHolder = RemoveHtml($this->Shipper->caption());

			// Qty
			$this->Qty->EditAttrs["class"] = "form-control";
			$this->Qty->EditCustomAttributes = "";
			if (!$this->Qty->Raw)
				$this->Qty->CurrentValue = HtmlDecode($this->Qty->CurrentValue);
			$this->Qty->EditValue = HtmlEncode($this->Qty->CurrentValue);
			$this->Qty->PlaceHolder = RemoveHtml($this->Qty->caption());

			// Cont
			$this->Cont->EditAttrs["class"] = "form-control";
			$this->Cont->EditCustomAttributes = "";
			if (!$this->Cont->Raw)
				$this->Cont->CurrentValue = HtmlDecode($this->Cont->CurrentValue);
			$this->Cont->EditValue = HtmlEncode($this->Cont->CurrentValue);
			$this->Cont->PlaceHolder = RemoveHtml($this->Cont->caption());

			// BM
			$this->BM->EditCustomAttributes = "";
			$this->BM->EditValue = $this->BM->options(FALSE);

			// Tujuan
			$this->Tujuan->EditAttrs["class"] = "form-control";
			$this->Tujuan->EditCustomAttributes = "";
			if (!$this->Tujuan->Raw)
				$this->Tujuan->CurrentValue = HtmlDecode($this->Tujuan->CurrentValue);
			$this->Tujuan->EditValue = HtmlEncode($this->Tujuan->CurrentValue);
			$this->Tujuan->PlaceHolder = RemoveHtml($this->Tujuan->caption());

			// Kapal
			$this->Kapal->EditAttrs["class"] = "form-control";
			$this->Kapal->EditCustomAttributes = "";
			if (!$this->Kapal->Raw)
				$this->Kapal->CurrentValue = HtmlDecode($this->Kapal->CurrentValue);
			$this->Kapal->EditValue = HtmlEncode($this->Kapal->CurrentValue);
			$this->Kapal->PlaceHolder = RemoveHtml($this->Kapal->caption());

			// Doc
			$this->Doc->EditAttrs["class"] = "form-control";
			$this->Doc->EditCustomAttributes = "";
			if (!EmptyValue($this->Doc->Upload->DbValue)) {
				$this->Doc->EditValue = $this->Doc->Upload->DbValue;
			} else {
				$this->Doc->EditValue = "";
			}
			if ($this->isShow())
				RenderUploadField($this->Doc);

			// Edit refer script
			// NoJO

			$this->NoJO->LinkCustomAttributes = "";
			$this->NoJO->HrefValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";

			// Tagihan
			$this->Tagihan->LinkCustomAttributes = "";
			$this->Tagihan->HrefValue = "";

			// NoBL
			$this->NoBL->LinkCustomAttributes = "";
			$this->NoBL->HrefValue = "";

			// Shipper
			$this->Shipper->LinkCustomAttributes = "";
			$this->Shipper->HrefValue = "";

			// Qty
			$this->Qty->LinkCustomAttributes = "";
			$this->Qty->HrefValue = "";

			// Cont
			$this->Cont->LinkCustomAttributes = "";
			$this->Cont->HrefValue = "";

			// BM
			$this->BM->LinkCustomAttributes = "";
			$this->BM->HrefValue = "";

			// Tujuan
			$this->Tujuan->LinkCustomAttributes = "";
			$this->Tujuan->HrefValue = "";

			// Kapal
			$this->Kapal->LinkCustomAttributes = "";
			$this->Kapal->HrefValue = "";

			// Doc
			$this->Doc->LinkCustomAttributes = "";
			$this->Doc->HrefValue = "";
			$this->Doc->ExportHrefValue = $this->Doc->UploadPath . $this->Doc->Upload->DbValue;
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return ($FormError == "");
		if ($this->NoJO->Required) {
			if (!$this->NoJO->IsDetailKey && $this->NoJO->FormValue != NULL && $this->NoJO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoJO->caption(), $this->NoJO->RequiredErrorMessage));
			}
		}
		if ($this->Status->Required) {
			if (!$this->Status->IsDetailKey && $this->Status->FormValue != NULL && $this->Status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Status->caption(), $this->Status->RequiredErrorMessage));
			}
		}
		if ($this->Tagihan->Required) {
			if (!$this->Tagihan->IsDetailKey && $this->Tagihan->FormValue != NULL && $this->Tagihan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Tagihan->caption(), $this->Tagihan->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Tagihan->FormValue)) {
			AddMessage($FormError, $this->Tagihan->errorMessage());
		}
		if ($this->NoBL->Required) {
			if (!$this->NoBL->IsDetailKey && $this->NoBL->FormValue != NULL && $this->NoBL->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoBL->caption(), $this->NoBL->RequiredErrorMessage));
			}
		}
		if ($this->Shipper->Required) {
			if (!$this->Shipper->IsDetailKey && $this->Shipper->FormValue != NULL && $this->Shipper->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Shipper->caption(), $this->Shipper->RequiredErrorMessage));
			}
		}
		if ($this->Qty->Required) {
			if (!$this->Qty->IsDetailKey && $this->Qty->FormValue != NULL && $this->Qty->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Qty->caption(), $this->Qty->RequiredErrorMessage));
			}
		}
		if ($this->Cont->Required) {
			if (!$this->Cont->IsDetailKey && $this->Cont->FormValue != NULL && $this->Cont->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Cont->caption(), $this->Cont->RequiredErrorMessage));
			}
		}
		if ($this->BM->Required) {
			if ($this->BM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BM->caption(), $this->BM->RequiredErrorMessage));
			}
		}
		if ($this->Tujuan->Required) {
			if (!$this->Tujuan->IsDetailKey && $this->Tujuan->FormValue != NULL && $this->Tujuan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Tujuan->caption(), $this->Tujuan->RequiredErrorMessage));
			}
		}
		if ($this->Kapal->Required) {
			if (!$this->Kapal->IsDetailKey && $this->Kapal->FormValue != NULL && $this->Kapal->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Kapal->caption(), $this->Kapal->RequiredErrorMessage));
			}
		}
		if ($this->Doc->Required) {
			if ($this->Doc->Upload->FileName == "" && !$this->Doc->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->Doc->caption(), $this->Doc->RequiredErrorMessage));
			}
		}

		// Validate detail grid
		$detailTblVar = explode(",", $this->getCurrentDetailTable());
		if (in_array("t102_mutasi", $detailTblVar) && $GLOBALS["t102_mutasi"]->DetailEdit) {
			if (!isset($GLOBALS["t102_mutasi_grid"]))
				$GLOBALS["t102_mutasi_grid"] = new t102_mutasi_grid(); // Get detail page object
			$GLOBALS["t102_mutasi_grid"]->validateGridForm();
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError != "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Update record based on key values
	protected function editRow()
	{
		global $Security, $Language;
		$oldKeyFilter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($oldKeyFilter);
		$conn = $this->getConnection();
		if ($this->NoJO->CurrentValue != "") { // Check field with unique index
			$filterChk = "(`NoJO` = '" . AdjustSql($this->NoJO->CurrentValue, $this->Dbid) . "')";
			$filterChk .= " AND NOT (" . $filter . ")";
			$this->CurrentFilter = $filterChk;
			$sqlChk = $this->getCurrentSql();
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			$rsChk = $conn->Execute($sqlChk);
			$conn->raiseErrorFn = "";
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$idxErrMsg = str_replace("%f", $this->NoJO->caption(), $Language->phrase("DupIndex"));
				$idxErrMsg = str_replace("%v", $this->NoJO->CurrentValue, $idxErrMsg);
				$this->setFailureMessage($idxErrMsg);
				$rsChk->close();
				return FALSE;
			}
			$rsChk->close();
		}
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = "";
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
			$editRow = FALSE; // Update Failed
		} else {

			// Begin transaction
			if ($this->getCurrentDetailTable() != "")
				$conn->beginTrans();

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// NoJO
			$this->NoJO->setDbValueDef($rsnew, $this->NoJO->CurrentValue, "", $this->NoJO->ReadOnly);

			// Status
			$this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, NULL, $this->Status->ReadOnly);

			// Tagihan
			$this->Tagihan->setDbValueDef($rsnew, $this->Tagihan->CurrentValue, 0, $this->Tagihan->ReadOnly);

			// NoBL
			$this->NoBL->setDbValueDef($rsnew, $this->NoBL->CurrentValue, NULL, $this->NoBL->ReadOnly);

			// Shipper
			$this->Shipper->setDbValueDef($rsnew, $this->Shipper->CurrentValue, NULL, $this->Shipper->ReadOnly);

			// Qty
			$this->Qty->setDbValueDef($rsnew, $this->Qty->CurrentValue, NULL, $this->Qty->ReadOnly);

			// Cont
			$this->Cont->setDbValueDef($rsnew, $this->Cont->CurrentValue, NULL, $this->Cont->ReadOnly);

			// BM
			$this->BM->setDbValueDef($rsnew, $this->BM->CurrentValue, "", $this->BM->ReadOnly);

			// Tujuan
			$this->Tujuan->setDbValueDef($rsnew, $this->Tujuan->CurrentValue, NULL, $this->Tujuan->ReadOnly);

			// Kapal
			$this->Kapal->setDbValueDef($rsnew, $this->Kapal->CurrentValue, NULL, $this->Kapal->ReadOnly);

			// Doc
			if ($this->Doc->Visible && !$this->Doc->ReadOnly && !$this->Doc->Upload->KeepFile) {
				$this->Doc->Upload->DbValue = $rsold['Doc']; // Get original value
				if ($this->Doc->Upload->FileName == "") {
					$rsnew['Doc'] = NULL;
				} else {
					$rsnew['Doc'] = $this->Doc->Upload->FileName;
				}
			}
			if ($this->Doc->Visible && !$this->Doc->Upload->KeepFile) {
				$oldFiles = EmptyValue($this->Doc->Upload->DbValue) ? [] : [$this->Doc->htmlDecode($this->Doc->Upload->DbValue)];
				if (!EmptyValue($this->Doc->Upload->FileName)) {
					$newFiles = [$this->Doc->Upload->FileName];
					$NewFileCount = count($newFiles);
					for ($i = 0; $i < $NewFileCount; $i++) {
						if ($newFiles[$i] != "") {
							$file = $newFiles[$i];
							$tempPath = UploadTempPath($this->Doc, $this->Doc->Upload->Index);
							if (file_exists($tempPath . $file)) {
								if (Config("DELETE_UPLOADED_FILES")) {
									$oldFileFound = FALSE;
									$oldFileCount = count($oldFiles);
									for ($j = 0; $j < $oldFileCount; $j++) {
										$oldFile = $oldFiles[$j];
										if ($oldFile == $file) { // Old file found, no need to delete anymore
											unset($oldFiles[$j]);
											$oldFileFound = TRUE;
											break;
										}
									}
									if ($oldFileFound) // No need to check if file exists further
										continue;
								}
								$file1 = UniqueFilename($this->Doc->physicalUploadPath(), $file); // Get new file name
								if ($file1 != $file) { // Rename temp file
									while (file_exists($tempPath . $file1) || file_exists($this->Doc->physicalUploadPath() . $file1)) // Make sure no file name clash
										$file1 = UniqueFilename($this->Doc->physicalUploadPath(), $file1, TRUE); // Use indexed name
									rename($tempPath . $file, $tempPath . $file1);
									$newFiles[$i] = $file1;
								}
							}
						}
					}
					$this->Doc->Upload->DbValue = empty($oldFiles) ? "" : implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $oldFiles);
					$this->Doc->Upload->FileName = implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $newFiles);
					$this->Doc->setDbValueDef($rsnew, $this->Doc->Upload->FileName, NULL, $this->Doc->ReadOnly);
				}
			}

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);

			// Check for duplicate key when key changed
			if ($updateRow) {
				$newKeyFilter = $this->getRecordFilter($rsnew); 
				if ($newKeyFilter != $oldKeyFilter) {
					$rsChk = $this->loadRs($newKeyFilter);
					if ($rsChk && !$rsChk->EOF) {
						$keyErrMsg = str_replace("%f", $newKeyFilter, $Language->phrase("DupKey"));
						$this->setFailureMessage($keyErrMsg);
						$rsChk->close();
						$updateRow = FALSE;
					}
				}
			}
			if ($updateRow) {
				$conn->raiseErrorFn = Config("ERROR_FUNC");
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = "";
				if ($editRow) {
					if ($this->Doc->Visible && !$this->Doc->Upload->KeepFile) {
						$oldFiles = EmptyValue($this->Doc->Upload->DbValue) ? [] : [$this->Doc->htmlDecode($this->Doc->Upload->DbValue)];
						if (!EmptyValue($this->Doc->Upload->FileName)) {
							$newFiles = [$this->Doc->Upload->FileName];
							$newFiles2 = [$this->Doc->htmlDecode($rsnew['Doc'])];
							$newFileCount = count($newFiles);
							for ($i = 0; $i < $newFileCount; $i++) {
								if ($newFiles[$i] != "") {
									$file = UploadTempPath($this->Doc, $this->Doc->Upload->Index) . $newFiles[$i];
									if (file_exists($file)) {
										if (@$newFiles2[$i] != "") // Use correct file name
											$newFiles[$i] = $newFiles2[$i];
										if (!$this->Doc->Upload->SaveToFile($newFiles[$i], TRUE, $i)) { // Just replace
											$this->setFailureMessage($Language->phrase("UploadErrMsg7"));
											return FALSE;
										}
									}
								}
							}
						} else {
							$newFiles = [];
						}
						if (Config("DELETE_UPLOADED_FILES")) {
							foreach ($oldFiles as $oldFile) {
								if ($oldFile != "" && !in_array($oldFile, $newFiles))
									@unlink($this->Doc->oldPhysicalUploadPath() . $oldFile);
							}
						}
					}
				}

				// Update detail records
				$detailTblVar = explode(",", $this->getCurrentDetailTable());
				if ($editRow) {
					if (in_array("t102_mutasi", $detailTblVar) && $GLOBALS["t102_mutasi"]->DetailEdit) {
						if (!isset($GLOBALS["t102_mutasi_grid"]))
							$GLOBALS["t102_mutasi_grid"] = new t102_mutasi_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "t102_mutasi"); // Load user level of detail table
						$editRow = $GLOBALS["t102_mutasi_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}

				// Commit/Rollback transaction
				if ($this->getCurrentDetailTable() != "") {
					if ($editRow) {
						$conn->commitTrans(); // Commit transaction
					} else {
						$conn->rollbackTrans(); // Rollback transaction
					}
				}
			} else {
				if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage != "") {
					$this->setFailureMessage($this->CancelMessage);
					$this->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->phrase("UpdateCancelled"));
				}
				$editRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($editRow)
			$this->Row_Updated($rsold, $rsnew);
		$rs->close();

		// Clean upload path if any
		if ($editRow) {

			// Doc
			if ($this->Doc->Upload->FileToken != "")
				CleanUploadTempPath($this->Doc->Upload->FileToken, $this->Doc->Upload->Index);
			else
				CleanUploadTempPath($this->Doc, $this->Doc->Upload->Index);
		}

		// Write JSON for API request
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
	}

	// Set up detail parms based on QueryString
	protected function setupDetailParms()
	{

		// Get the keys for master table
		$detailTblVar = Get(Config("TABLE_SHOW_DETAIL"));
		if ($detailTblVar !== NULL) {
			$this->setCurrentDetailTable($detailTblVar);
		} else {
			$detailTblVar = $this->getCurrentDetailTable();
		}
		if ($detailTblVar != "") {
			$detailTblVar = explode(",", $detailTblVar);
			if (in_array("t102_mutasi", $detailTblVar)) {
				if (!isset($GLOBALS["t102_mutasi_grid"]))
					$GLOBALS["t102_mutasi_grid"] = new t102_mutasi_grid();
				if ($GLOBALS["t102_mutasi_grid"]->DetailEdit) {
					$GLOBALS["t102_mutasi_grid"]->CurrentMode = "edit";
					$GLOBALS["t102_mutasi_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["t102_mutasi_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["t102_mutasi_grid"]->setStartRecordNumber(1);
					$GLOBALS["t102_mutasi_grid"]->jo_id->IsDetailKey = TRUE;
					$GLOBALS["t102_mutasi_grid"]->jo_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["t102_mutasi_grid"]->jo_id->setSessionValue($GLOBALS["t102_mutasi_grid"]->jo_id->CurrentValue);
				}
			}
		}
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("t001_jolist.php"), "", $this->TableVar, TRUE);
		$pageId = "edit";
		$Breadcrumb->add("edit", $pageId, $url);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// Get default connection and filter
			$conn = $this->getConnection();
			$lookupFilter = "";

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL and connection
			switch ($fld->FieldVar) {
				case "x_NoJO":
					break;
				case "x_Status":
					break;
				case "x_BM":
					break;
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql != "" && count($fld->Lookup->Options) == 0) {
				$totalCnt = $this->getRecordCount($sql, $conn);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
						case "x_NoJO":
							break;
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
		}
	}

	// Set up starting record parameters
	public function setupStartRecord()
	{
		if ($this->DisplayRecords == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			$startRec = Get(Config("TABLE_START_REC"));
			$pageNo = Get(Config("TABLE_PAGE_NO"));
			if ($startRec !== NULL) { // Check for "start" parameter
				$this->StartRecord = $startRec;
				$this->setStartRecordNumber($this->StartRecord);
			} elseif ($pageNo !== NULL) {
				if (is_numeric($pageNo)) {
					$this->StartRecord = ($pageNo - 1) * $this->DisplayRecords + 1;
					if ($this->StartRecord <= 0) {
						$this->StartRecord = 1;
					} elseif ($this->StartRecord >= (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1) {
						$this->StartRecord = (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1;
					}
					$this->setStartRecordNumber($this->StartRecord);
				}
			}
		}
		$this->StartRecord = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRecord) || $this->StartRecord == "") { // Avoid invalid start record counter
			$this->StartRecord = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRecord);
		} elseif ($this->StartRecord > $this->TotalRecords) { // Avoid starting record > total records
			$this->StartRecord = (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRecord);
		} elseif (($this->StartRecord - 1) % $this->DisplayRecords != 0) {
			$this->StartRecord = (int)(($this->StartRecord - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRecord);
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
} // End class
?>