<?php
namespace PHPMaker2020\p_keuangan_v1_0;

/**
 * Page class
 */
class t102_mutasi_add extends t102_mutasi
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{FBB5EF95-13BB-496B-B131-E8C649D0628A}";

	// Table name
	public $TableName = 't102_mutasi';

	// Page object name
	public $PageObjName = "t102_mutasi_add";

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

		// Table object (t102_mutasi)
		if (!isset($GLOBALS["t102_mutasi"]) || get_class($GLOBALS["t102_mutasi"]) == PROJECT_NAMESPACE . "t102_mutasi") {
			$GLOBALS["t102_mutasi"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t102_mutasi"];
		}

		// Table object (t301_employees)
		if (!isset($GLOBALS['t301_employees']))
			$GLOBALS['t301_employees'] = new t301_employees();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 't102_mutasi');

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
		global $t102_mutasi;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($t102_mutasi);
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
					if ($pageName == "t102_mutasiview.php")
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
	public $FormClassName = "ew-horizontal ew-form ew-add-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRecord;
	public $Priv = 0;
	public $OldRecordset;
	public $CopyRecord;

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
			if (!$Security->canAdd()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("t102_mutasilist.php"));
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
		$this->Tanggal->setVisibility();
		$this->NoUrut->setVisibility();
		$this->jo_id->setVisibility();
		$this->jenis_id->setVisibility();
		$this->Comment->setVisibility();
		$this->Masuk->setVisibility();
		$this->Keluar->setVisibility();
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
		$this->setupLookupOptions($this->jo_id);
		$this->setupLookupOptions($this->jenis_id);

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-add-form ew-horizontal";
		$postBack = FALSE;

		// Set up current action
		if (IsApi()) {
			$this->CurrentAction = "insert"; // Add record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get form action
			$postBack = TRUE;
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$this->setKey("id", $this->id->CurrentValue); // Set up key
			} else {
				$this->setKey("id", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$this->CurrentAction = "copy"; // Copy record
			} else {
				$this->CurrentAction = "show"; // Display blank record
			}
		}

		// Load old record / default values
		$loaded = $this->loadOldRecord();

		// Load form values
		if ($postBack) {
			$this->loadFormValues(); // Load form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues(); // Restore form values
				$this->setFailureMessage($FormError);
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = "show"; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "copy": // Copy an existing record
				if (!$loaded) { // Record not loaded
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("t102_mutasilist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "t102_mutasilist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "t102_mutasiview.php")
						$returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
					if (IsApi()) { // Return to caller
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl);
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Add failed, restore form values
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render row based on row type
		$this->RowType = ROWTYPE_ADD; // Render add type

		// Render row
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->Tanggal->CurrentValue = NULL;
		$this->Tanggal->OldValue = $this->Tanggal->CurrentValue;
		$this->NoUrut->CurrentValue = 0;
		$this->jo_id->CurrentValue = NULL;
		$this->jo_id->OldValue = $this->jo_id->CurrentValue;
		$this->jenis_id->CurrentValue = NULL;
		$this->jenis_id->OldValue = $this->jenis_id->CurrentValue;
		$this->Comment->CurrentValue = NULL;
		$this->Comment->OldValue = $this->Comment->CurrentValue;
		$this->Masuk->CurrentValue = 0.00;
		$this->Keluar->CurrentValue = 0.00;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'Tanggal' first before field var 'x_Tanggal'
		$val = $CurrentForm->hasValue("Tanggal") ? $CurrentForm->getValue("Tanggal") : $CurrentForm->getValue("x_Tanggal");
		if (!$this->Tanggal->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Tanggal->Visible = FALSE; // Disable update for API request
			else
				$this->Tanggal->setFormValue($val);
			$this->Tanggal->CurrentValue = UnFormatDateTime($this->Tanggal->CurrentValue, 7);
		}

		// Check field name 'NoUrut' first before field var 'x_NoUrut'
		$val = $CurrentForm->hasValue("NoUrut") ? $CurrentForm->getValue("NoUrut") : $CurrentForm->getValue("x_NoUrut");
		if (!$this->NoUrut->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NoUrut->Visible = FALSE; // Disable update for API request
			else
				$this->NoUrut->setFormValue($val);
		}

		// Check field name 'jo_id' first before field var 'x_jo_id'
		$val = $CurrentForm->hasValue("jo_id") ? $CurrentForm->getValue("jo_id") : $CurrentForm->getValue("x_jo_id");
		if (!$this->jo_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->jo_id->Visible = FALSE; // Disable update for API request
			else
				$this->jo_id->setFormValue($val);
		}

		// Check field name 'jenis_id' first before field var 'x_jenis_id'
		$val = $CurrentForm->hasValue("jenis_id") ? $CurrentForm->getValue("jenis_id") : $CurrentForm->getValue("x_jenis_id");
		if (!$this->jenis_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->jenis_id->Visible = FALSE; // Disable update for API request
			else
				$this->jenis_id->setFormValue($val);
		}

		// Check field name 'Comment' first before field var 'x_Comment'
		$val = $CurrentForm->hasValue("Comment") ? $CurrentForm->getValue("Comment") : $CurrentForm->getValue("x_Comment");
		if (!$this->Comment->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Comment->Visible = FALSE; // Disable update for API request
			else
				$this->Comment->setFormValue($val);
		}

		// Check field name 'Masuk' first before field var 'x_Masuk'
		$val = $CurrentForm->hasValue("Masuk") ? $CurrentForm->getValue("Masuk") : $CurrentForm->getValue("x_Masuk");
		if (!$this->Masuk->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Masuk->Visible = FALSE; // Disable update for API request
			else
				$this->Masuk->setFormValue($val);
		}

		// Check field name 'Keluar' first before field var 'x_Keluar'
		$val = $CurrentForm->hasValue("Keluar") ? $CurrentForm->getValue("Keluar") : $CurrentForm->getValue("x_Keluar");
		if (!$this->Keluar->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Keluar->Visible = FALSE; // Disable update for API request
			else
				$this->Keluar->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->Tanggal->CurrentValue = $this->Tanggal->FormValue;
		$this->Tanggal->CurrentValue = UnFormatDateTime($this->Tanggal->CurrentValue, 7);
		$this->NoUrut->CurrentValue = $this->NoUrut->FormValue;
		$this->jo_id->CurrentValue = $this->jo_id->FormValue;
		$this->jenis_id->CurrentValue = $this->jenis_id->FormValue;
		$this->Comment->CurrentValue = $this->Comment->FormValue;
		$this->Masuk->CurrentValue = $this->Masuk->FormValue;
		$this->Keluar->CurrentValue = $this->Keluar->FormValue;
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
		$this->Tanggal->setDbValue($row['Tanggal']);
		$this->NoUrut->setDbValue($row['NoUrut']);
		$this->jo_id->setDbValue($row['jo_id']);
		$this->jenis_id->setDbValue($row['jenis_id']);
		$this->Comment->setDbValue($row['Comment']);
		$this->Masuk->setDbValue($row['Masuk']);
		$this->Keluar->setDbValue($row['Keluar']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['Tanggal'] = $this->Tanggal->CurrentValue;
		$row['NoUrut'] = $this->NoUrut->CurrentValue;
		$row['jo_id'] = $this->jo_id->CurrentValue;
		$row['jenis_id'] = $this->jenis_id->CurrentValue;
		$row['Comment'] = $this->Comment->CurrentValue;
		$row['Masuk'] = $this->Masuk->CurrentValue;
		$row['Keluar'] = $this->Keluar->CurrentValue;
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

		if ($this->Masuk->FormValue == $this->Masuk->CurrentValue && is_numeric(ConvertToFloatString($this->Masuk->CurrentValue)))
			$this->Masuk->CurrentValue = ConvertToFloatString($this->Masuk->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Keluar->FormValue == $this->Keluar->CurrentValue && is_numeric(ConvertToFloatString($this->Keluar->CurrentValue)))
			$this->Keluar->CurrentValue = ConvertToFloatString($this->Keluar->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// Tanggal
		// NoUrut
		// jo_id
		// jenis_id
		// Comment
		// Masuk
		// Keluar

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Tanggal
			$this->Tanggal->ViewValue = $this->Tanggal->CurrentValue;
			$this->Tanggal->ViewValue = FormatDateTime($this->Tanggal->ViewValue, 7);
			$this->Tanggal->ViewCustomAttributes = "";

			// NoUrut
			$this->NoUrut->ViewValue = $this->NoUrut->CurrentValue;
			$this->NoUrut->ViewValue = FormatNumber($this->NoUrut->ViewValue, 0, -2, -2, -2);
			$this->NoUrut->CellCssStyle .= "text-align: right;";
			$this->NoUrut->ViewCustomAttributes = "";

			// jo_id
			$curVal = strval($this->jo_id->CurrentValue);
			if ($curVal != "") {
				$this->jo_id->ViewValue = $this->jo_id->lookupCacheOption($curVal);
				if ($this->jo_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->jo_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->jo_id->ViewValue = $this->jo_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->jo_id->ViewValue = $this->jo_id->CurrentValue;
					}
				}
			} else {
				$this->jo_id->ViewValue = NULL;
			}
			$this->jo_id->ViewCustomAttributes = "";

			// jenis_id
			$curVal = strval($this->jenis_id->CurrentValue);
			if ($curVal != "") {
				$this->jenis_id->ViewValue = $this->jenis_id->lookupCacheOption($curVal);
				if ($this->jenis_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->jenis_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->jenis_id->ViewValue = $this->jenis_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->jenis_id->ViewValue = $this->jenis_id->CurrentValue;
					}
				}
			} else {
				$this->jenis_id->ViewValue = NULL;
			}
			$this->jenis_id->ViewCustomAttributes = "";

			// Comment
			$this->Comment->ViewValue = $this->Comment->CurrentValue;
			$this->Comment->ViewCustomAttributes = "";

			// Masuk
			$this->Masuk->ViewValue = $this->Masuk->CurrentValue;
			$this->Masuk->ViewValue = FormatNumber($this->Masuk->ViewValue, 0, -2, -2, -2);
			$this->Masuk->CellCssStyle .= "text-align: right;";
			$this->Masuk->ViewCustomAttributes = "";

			// Keluar
			$this->Keluar->ViewValue = $this->Keluar->CurrentValue;
			$this->Keluar->ViewValue = FormatNumber($this->Keluar->ViewValue, 0, -2, -2, -2);
			$this->Keluar->CellCssStyle .= "text-align: right;";
			$this->Keluar->ViewCustomAttributes = "";

			// Tanggal
			$this->Tanggal->LinkCustomAttributes = "";
			$this->Tanggal->HrefValue = "";
			$this->Tanggal->TooltipValue = "";

			// NoUrut
			$this->NoUrut->LinkCustomAttributes = "";
			$this->NoUrut->HrefValue = "";
			$this->NoUrut->TooltipValue = "";

			// jo_id
			$this->jo_id->LinkCustomAttributes = "";
			$this->jo_id->HrefValue = "";
			$this->jo_id->TooltipValue = "";

			// jenis_id
			$this->jenis_id->LinkCustomAttributes = "";
			$this->jenis_id->HrefValue = "";
			$this->jenis_id->TooltipValue = "";

			// Comment
			$this->Comment->LinkCustomAttributes = "";
			$this->Comment->HrefValue = "";
			$this->Comment->TooltipValue = "";

			// Masuk
			$this->Masuk->LinkCustomAttributes = "";
			$this->Masuk->HrefValue = "";
			$this->Masuk->TooltipValue = "";

			// Keluar
			$this->Keluar->LinkCustomAttributes = "";
			$this->Keluar->HrefValue = "";
			$this->Keluar->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// Tanggal
			$this->Tanggal->EditAttrs["class"] = "form-control";
			$this->Tanggal->EditCustomAttributes = "";
			$this->Tanggal->EditValue = HtmlEncode(FormatDateTime($this->Tanggal->CurrentValue, 7));
			$this->Tanggal->PlaceHolder = RemoveHtml($this->Tanggal->caption());

			// NoUrut
			$this->NoUrut->EditAttrs["class"] = "form-control";
			$this->NoUrut->EditCustomAttributes = "";
			$this->NoUrut->EditValue = HtmlEncode($this->NoUrut->CurrentValue);
			$this->NoUrut->PlaceHolder = RemoveHtml($this->NoUrut->caption());

			// jo_id
			$this->jo_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->jo_id->CurrentValue));
			if ($curVal != "")
				$this->jo_id->ViewValue = $this->jo_id->lookupCacheOption($curVal);
			else
				$this->jo_id->ViewValue = $this->jo_id->Lookup !== NULL && is_array($this->jo_id->Lookup->Options) ? $curVal : NULL;
			if ($this->jo_id->ViewValue !== NULL) { // Load from cache
				$this->jo_id->EditValue = array_values($this->jo_id->Lookup->Options);
				if ($this->jo_id->ViewValue == "")
					$this->jo_id->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->jo_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->jo_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->jo_id->ViewValue = $this->jo_id->displayValue($arwrk);
				} else {
					$this->jo_id->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->jo_id->EditValue = $arwrk;
			}

			// jenis_id
			$this->jenis_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->jenis_id->CurrentValue));
			if ($curVal != "")
				$this->jenis_id->ViewValue = $this->jenis_id->lookupCacheOption($curVal);
			else
				$this->jenis_id->ViewValue = $this->jenis_id->Lookup !== NULL && is_array($this->jenis_id->Lookup->Options) ? $curVal : NULL;
			if ($this->jenis_id->ViewValue !== NULL) { // Load from cache
				$this->jenis_id->EditValue = array_values($this->jenis_id->Lookup->Options);
				if ($this->jenis_id->ViewValue == "")
					$this->jenis_id->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->jenis_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->jenis_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->jenis_id->ViewValue = $this->jenis_id->displayValue($arwrk);
				} else {
					$this->jenis_id->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->jenis_id->EditValue = $arwrk;
			}

			// Comment
			$this->Comment->EditAttrs["class"] = "form-control";
			$this->Comment->EditCustomAttributes = "";
			$this->Comment->EditValue = HtmlEncode($this->Comment->CurrentValue);
			$this->Comment->PlaceHolder = RemoveHtml($this->Comment->caption());

			// Masuk
			$this->Masuk->EditAttrs["class"] = "form-control";
			$this->Masuk->EditCustomAttributes = "";
			$this->Masuk->EditValue = HtmlEncode($this->Masuk->CurrentValue);
			$this->Masuk->PlaceHolder = RemoveHtml($this->Masuk->caption());
			if (strval($this->Masuk->EditValue) != "" && is_numeric($this->Masuk->EditValue))
				$this->Masuk->EditValue = FormatNumber($this->Masuk->EditValue, -2, -2, -2, -2);
			

			// Keluar
			$this->Keluar->EditAttrs["class"] = "form-control";
			$this->Keluar->EditCustomAttributes = "";
			$this->Keluar->EditValue = HtmlEncode($this->Keluar->CurrentValue);
			$this->Keluar->PlaceHolder = RemoveHtml($this->Keluar->caption());
			if (strval($this->Keluar->EditValue) != "" && is_numeric($this->Keluar->EditValue))
				$this->Keluar->EditValue = FormatNumber($this->Keluar->EditValue, -2, -2, -2, -2);
			

			// Add refer script
			// Tanggal

			$this->Tanggal->LinkCustomAttributes = "";
			$this->Tanggal->HrefValue = "";

			// NoUrut
			$this->NoUrut->LinkCustomAttributes = "";
			$this->NoUrut->HrefValue = "";

			// jo_id
			$this->jo_id->LinkCustomAttributes = "";
			$this->jo_id->HrefValue = "";

			// jenis_id
			$this->jenis_id->LinkCustomAttributes = "";
			$this->jenis_id->HrefValue = "";

			// Comment
			$this->Comment->LinkCustomAttributes = "";
			$this->Comment->HrefValue = "";

			// Masuk
			$this->Masuk->LinkCustomAttributes = "";
			$this->Masuk->HrefValue = "";

			// Keluar
			$this->Keluar->LinkCustomAttributes = "";
			$this->Keluar->HrefValue = "";
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
		if ($this->Tanggal->Required) {
			if (!$this->Tanggal->IsDetailKey && $this->Tanggal->FormValue != NULL && $this->Tanggal->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Tanggal->caption(), $this->Tanggal->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->Tanggal->FormValue)) {
			AddMessage($FormError, $this->Tanggal->errorMessage());
		}
		if ($this->NoUrut->Required) {
			if (!$this->NoUrut->IsDetailKey && $this->NoUrut->FormValue != NULL && $this->NoUrut->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoUrut->caption(), $this->NoUrut->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->NoUrut->FormValue)) {
			AddMessage($FormError, $this->NoUrut->errorMessage());
		}
		if ($this->jo_id->Required) {
			if (!$this->jo_id->IsDetailKey && $this->jo_id->FormValue != NULL && $this->jo_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->jo_id->caption(), $this->jo_id->RequiredErrorMessage));
			}
		}
		if ($this->jenis_id->Required) {
			if (!$this->jenis_id->IsDetailKey && $this->jenis_id->FormValue != NULL && $this->jenis_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->jenis_id->caption(), $this->jenis_id->RequiredErrorMessage));
			}
		}
		if ($this->Comment->Required) {
			if (!$this->Comment->IsDetailKey && $this->Comment->FormValue != NULL && $this->Comment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Comment->caption(), $this->Comment->RequiredErrorMessage));
			}
		}
		if ($this->Masuk->Required) {
			if (!$this->Masuk->IsDetailKey && $this->Masuk->FormValue != NULL && $this->Masuk->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Masuk->caption(), $this->Masuk->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Masuk->FormValue)) {
			AddMessage($FormError, $this->Masuk->errorMessage());
		}
		if ($this->Keluar->Required) {
			if (!$this->Keluar->IsDetailKey && $this->Keluar->FormValue != NULL && $this->Keluar->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Keluar->caption(), $this->Keluar->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Keluar->FormValue)) {
			AddMessage($FormError, $this->Keluar->errorMessage());
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

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// Tanggal
		$this->Tanggal->setDbValueDef($rsnew, UnFormatDateTime($this->Tanggal->CurrentValue, 7), CurrentDate(), FALSE);

		// NoUrut
		$this->NoUrut->setDbValueDef($rsnew, $this->NoUrut->CurrentValue, 0, strval($this->NoUrut->CurrentValue) == "");

		// jo_id
		$this->jo_id->setDbValueDef($rsnew, $this->jo_id->CurrentValue, 0, FALSE);

		// jenis_id
		$this->jenis_id->setDbValueDef($rsnew, $this->jenis_id->CurrentValue, 0, FALSE);

		// Comment
		$this->Comment->setDbValueDef($rsnew, $this->Comment->CurrentValue, NULL, FALSE);

		// Masuk
		$this->Masuk->setDbValueDef($rsnew, $this->Masuk->CurrentValue, 0, strval($this->Masuk->CurrentValue) == "");

		// Keluar
		$this->Keluar->setDbValueDef($rsnew, $this->Keluar->CurrentValue, 0, strval($this->Keluar->CurrentValue) == "");

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = "";
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage != "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("InsertCancelled"));
			}
			$addRow = FALSE;
		}
		if ($addRow) {

			// Call Row Inserted event
			$rs = ($rsold) ? $rsold->fields : NULL;
			$this->Row_Inserted($rs, $rsnew);
		}

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("t102_mutasilist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
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
				case "x_jo_id":
					$conn = Conn("");
					break;
				case "x_jenis_id":
					$conn = Conn("");
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
						case "x_jo_id":
							break;
						case "x_jenis_id":
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