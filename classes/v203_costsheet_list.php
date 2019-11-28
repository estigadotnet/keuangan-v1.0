<?php
namespace PHPMaker2020\p_keuangan_v1_0;

/**
 * Page class
 */
class v203_costsheet_list extends v203_costsheet
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{FBB5EF95-13BB-496B-B131-E8C649D0628A}";

	// Table name
	public $TableName = 'v203_costsheet';

	// Page object name
	public $PageObjName = "v203_costsheet_list";

	// Grid form hidden field names
	public $FormName = "fv203_costsheetlist";
	public $FormActionName = "k_action";
	public $FormKeyName = "k_key";
	public $FormOldKeyName = "k_oldkey";
	public $FormBlankRowName = "k_blankrow";
	public $FormKeyCountName = "key_count";

	// Page URLs
	public $AddUrl;
	public $EditUrl;
	public $CopyUrl;
	public $DeleteUrl;
	public $ViewUrl;
	public $ListUrl;

	// Export URLs
	public $ExportPrintUrl;
	public $ExportHtmlUrl;
	public $ExportExcelUrl;
	public $ExportWordUrl;
	public $ExportXmlUrl;
	public $ExportCsvUrl;
	public $ExportPdfUrl;

	// Custom export
	public $ExportExcelCustom = FALSE;
	public $ExportWordCustom = FALSE;
	public $ExportPdfCustom = FALSE;
	public $ExportEmailCustom = FALSE;

	// Update URLs
	public $InlineAddUrl;
	public $InlineCopyUrl;
	public $InlineEditUrl;
	public $GridAddUrl;
	public $GridEditUrl;
	public $MultiDeleteUrl;
	public $MultiUpdateUrl;

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

		// Table object (v203_costsheet)
		if (!isset($GLOBALS["v203_costsheet"]) || get_class($GLOBALS["v203_costsheet"]) == PROJECT_NAMESPACE . "v203_costsheet") {
			$GLOBALS["v203_costsheet"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["v203_costsheet"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "v203_costsheetadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "v203_costsheetdelete.php";
		$this->MultiUpdateUrl = "v203_costsheetupdate.php";

		// Table object (t301_employees)
		if (!isset($GLOBALS['t301_employees']))
			$GLOBALS['t301_employees'] = new t301_employees();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'v203_costsheet');

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

		// List options
		$this->ListOptions = new ListOptions();
		$this->ListOptions->TableVar = $this->TableVar;

		// Export options
		$this->ExportOptions = new ListOptions("div");
		$this->ExportOptions->TagClassName = "ew-export-option";

		// Import options
		$this->ImportOptions = new ListOptions("div");
		$this->ImportOptions->TagClassName = "ew-import-option";

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["addedit"] = new ListOptions("div");
		$this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
		$this->OtherOptions["detail"] = new ListOptions("div");
		$this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
		$this->OtherOptions["action"] = new ListOptions("div");
		$this->OtherOptions["action"]->TagClassName = "ew-action-option";

		// Filter options
		$this->FilterOptions = new ListOptions("div");
		$this->FilterOptions->TagClassName = "ew-filter-option fv203_costsheetlistsrch";

		// List actions
		$this->ListActions = new ListActions();
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
		global $v203_costsheet;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($v203_costsheet);
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
			SaveDebugMessage();
			AddHeader("Location", $url);
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
			$key .= @$ar['jo_id'] . Config("COMPOSITE_KEY_SEPARATOR");
			$key .= @$ar['mts_id'] . Config("COMPOSITE_KEY_SEPARATOR");
			$key .= @$ar['jns_id'];
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
			$this->jo_id->Visible = FALSE;
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->mts_id->Visible = FALSE;
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->jns_id->Visible = FALSE;
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

	// Class variables
	public $ListOptions; // List options
	public $ExportOptions; // Export options
	public $SearchOptions; // Search options
	public $OtherOptions; // Other options
	public $FilterOptions; // Filter options
	public $ImportOptions; // Import options
	public $ListActions; // List actions
	public $SelectedCount = 0;
	public $SelectedIndex = 0;
	public $DisplayRecords = 20;
	public $StartRecord;
	public $StopRecord;
	public $TotalRecords = 0;
	public $RecordRange = 10;
	public $PageSizes = "10,20,50,-1"; // Page sizes (comma separated)
	public $DefaultSearchWhere = ""; // Default search WHERE clause
	public $SearchWhere = ""; // Search WHERE clause
	public $SearchPanelClass = "ew-search-panel collapse show"; // Search Panel class
	public $SearchRowCount = 0; // For extended search
	public $SearchColumnCount = 0; // For extended search
	public $SearchFieldsPerRow = 1; // For extended search
	public $RecordCount = 0; // Record count
	public $EditRowCount;
	public $StartRowCount = 1;
	public $RowCount = 0;
	public $Attrs = []; // Row attributes and cell attributes
	public $RowIndex = 0; // Row index
	public $KeyCount = 0; // Key count
	public $RowAction = ""; // Row action
	public $RowOldKey = ""; // Row old key (for copy)
	public $MultiColumnClass = "col-sm";
	public $MultiColumnEditClass = "w-100";
	public $DbMasterFilter = ""; // Master filter
	public $DbDetailFilter = ""; // Detail filter
	public $MasterRecordExists;
	public $MultiSelectKey;
	public $Command;
	public $RestoreSearch = FALSE;
	public $DetailPages;
	public $OldRecordset;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$FormError, $SearchError;

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
			if (!$Security->canList()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				$this->terminate(GetUrl("index.php"));
				return;
			}
			if ($Security->isLoggedIn()) {
				$Security->UserID_Loading();
				$Security->loadUserID();
				$Security->UserID_Loaded();
			}
		}

		// Get export parameters
		$custom = "";
		if (Param("export") !== NULL) {
			$this->Export = Param("export");
			$custom = Param("custom", "");
		} elseif (IsPost()) {
			if (Post("exporttype") !== NULL)
				$this->Export = Post("exporttype");
			$custom = Post("custom", "");
		} elseif (Get("cmd") == "json") {
			$this->Export = Get("cmd");
		} else {
			$this->setExportReturnUrl(CurrentUrl());
		}
		$ExportFileName = $this->TableVar; // Get export file, used in header

		// Get custom export parameters
		if ($this->isExport() && $custom != "") {
			$this->CustomExport = $this->Export;
			$this->Export = "print";
		}
		$CustomExportType = $this->CustomExport;
		$ExportType = $this->Export; // Get export parameter, used in header

		// Update Export URLs
		if (Config("USE_PHPEXCEL"))
			$this->ExportExcelCustom = FALSE;
		if ($this->ExportExcelCustom)
			$this->ExportExcelUrl .= "&amp;custom=1";
		if (Config("USE_PHPWORD"))
			$this->ExportWordCustom = FALSE;
		if ($this->ExportWordCustom)
			$this->ExportWordUrl .= "&amp;custom=1";
		if ($this->ExportPdfCustom)
			$this->ExportPdfUrl .= "&amp;custom=1";
		$this->CurrentAction = Param("action"); // Set up current action

		// Get grid add count
		$gridaddcnt = Get(Config("TABLE_GRID_ADD_ROW_COUNT"), "");
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->setupListOptions();

		// Setup export options
		$this->setupExportOptions();
		$this->jo_id->setVisibility();
		$this->NoJO->setVisibility();
		$this->Tagihan->setVisibility();
		$this->Shipper->setVisibility();
		$this->Qty->setVisibility();
		$this->Cont->setVisibility();
		$this->Status->setVisibility();
		$this->doc->setVisibility();
		$this->Tujuan->setVisibility();
		$this->Kapal->setVisibility();
		$this->BM->setVisibility();
		$this->mts_id->setVisibility();
		$this->Tanggal->setVisibility();
		$this->NoUrut->setVisibility();
		$this->mts_jo_id->setVisibility();
		$this->mts_jenis_id->setVisibility();
		$this->Masuk->setVisibility();
		$this->Keluar->setVisibility();
		$this->Comment->Visible = FALSE;
		$this->jns_id->setVisibility();
		$this->jns_nama->Visible = FALSE;
		$this->NoKolom->setVisibility();
		$this->NoBL->setVisibility();
		$this->hideFieldsForAddEdit();

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

		// Setup other options
		$this->setupOtherOptions();

		// Set up custom action (compatible with old version)
		foreach ($this->CustomActions as $name => $action)
			$this->ListActions->add($name, $action);

		// Show checkbox column if multiple action
		foreach ($this->ListActions->Items as $listaction) {
			if ($listaction->Select == ACTION_MULTIPLE && $listaction->Allow) {
				$this->ListOptions["checkbox"]->Visible = TRUE;
				break;
			}
		}

		// Set up lookup cache
		$this->setupLookupOptions($this->NoJO);

		// Search filters
		$srchAdvanced = ""; // Advanced search filter
		$srchBasic = ""; // Basic search filter
		$filter = "";

		// Get command
		$this->Command = strtolower(Get("cmd"));
		if ($this->isPageRequest()) { // Validate request

			// Process list action first
			if ($this->processListAction()) // Ajax request
				$this->terminate();

			// Set up records per page
			$this->setupDisplayRecords();

			// Handle reset command
			$this->resetCmd();

			// Set up Breadcrumb
			if (!$this->isExport())
				$this->setupBreadcrumb();

			// Hide list options
			if ($this->isExport()) {
				$this->ListOptions->hideAllOptions(["sequence"]);
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			} elseif ($this->isGridAdd() || $this->isGridEdit()) {
				$this->ListOptions->hideAllOptions();
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			}

			// Hide options
			if ($this->isExport() || $this->CurrentAction) {
				$this->ExportOptions->hideAllOptions();
				$this->FilterOptions->hideAllOptions();
				$this->ImportOptions->hideAllOptions();
			}

			// Hide other options
			if ($this->isExport())
				$this->OtherOptions->hideAllOptions();

			// Get default search criteria
			AddFilter($this->DefaultSearchWhere, $this->advancedSearchWhere(TRUE));

			// Get and validate search values for advanced search
			$this->loadSearchValues(); // Get search values

			// Process filter list
			if ($this->processFilterList())
				$this->terminate();
			if (!$this->validateSearch())
				$this->setFailureMessage($SearchError);

			// Restore search parms from Session if not searching / reset / export
			if (($this->isExport() || $this->Command != "search" && $this->Command != "reset" && $this->Command != "resetall") && $this->Command != "json" && $this->checkSearchParms())
				$this->restoreSearchParms();

			// Call Recordset SearchValidated event
			$this->Recordset_SearchValidated();

			// Set up sorting order
			$this->setupSortOrder();

			// Get search criteria for advanced search
			if ($SearchError == "")
				$srchAdvanced = $this->advancedSearchWhere();
		}

		// Restore display records
		if ($this->Command != "json" && $this->getRecordsPerPage() != "") {
			$this->DisplayRecords = $this->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecords = 20; // Load default
			$this->setRecordsPerPage($this->DisplayRecords); // Save default to Session
		}

		// Load Sorting Order
		if ($this->Command != "json")
			$this->loadSortOrder();

		// Load search default if no existing search criteria
		if (!$this->checkSearchParms()) {

			// Load advanced search from default
			if ($this->loadAdvancedSearchDefault()) {
				$srchAdvanced = $this->advancedSearchWhere();
			}
		}

		// Restore search settings from Session
		if ($SearchError == "")
			$this->loadAdvancedSearch();

		// Build search criteria
		AddFilter($this->SearchWhere, $srchAdvanced);
		AddFilter($this->SearchWhere, $srchBasic);

		// Call Recordset_Searching event
		$this->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->Command == "search" && !$this->RestoreSearch) {
			$this->setSearchWhere($this->SearchWhere); // Save to Session
			$this->StartRecord = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRecord);
		} elseif ($this->Command != "json") {
			$this->SearchWhere = $this->getSearchWhere();
		}

		// Build filter
		$filter = "";
		if (!$Security->canList())
			$filter = "(0=1)"; // Filter all records
		AddFilter($filter, $this->DbDetailFilter);
		AddFilter($filter, $this->SearchWhere);
		if ($filter == "") {
			$filter = "0=101";
			$this->SearchWhere = $filter;
		}

		// Set up filter
		if ($this->Command == "json") {
			$this->UseSessionForListSql = FALSE; // Do not use session for ListSQL
			$this->CurrentFilter = $filter;
		} else {
			$this->setSessionWhere($filter);
			$this->CurrentFilter = "";
		}

		// Export data only
		if (!$this->CustomExport && in_array($this->Export, array_keys(Config("EXPORT_CLASSES")))) {
			$this->exportData();
			$this->terminate();
		}
		if ($this->isGridAdd()) {
			$this->CurrentFilter = "0=1";
			$this->StartRecord = 1;
			$this->DisplayRecords = $this->GridAddRowCount;
			$this->TotalRecords = $this->DisplayRecords;
			$this->StopRecord = $this->DisplayRecords;
		} else {
			$selectLimit = $this->UseSelectLimit;
			if ($selectLimit) {
				$this->TotalRecords = $this->listRecordCount();
			} else {
				if ($this->Recordset = $this->loadRecordset())
					$this->TotalRecords = $this->Recordset->RecordCount();
			}
			$this->StartRecord = 1;
			if ($this->DisplayRecords <= 0 || ($this->isExport() && $this->ExportAll)) // Display all records
				$this->DisplayRecords = $this->TotalRecords;
			if (!($this->isExport() && $this->ExportAll)) // Set up start record position
				$this->setupStartRecord();
			if ($selectLimit)
				$this->Recordset = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords);

			// Set no record found message
			if (!$this->CurrentAction && $this->TotalRecords == 0) {
				if (!$Security->canList())
					$this->setWarningMessage(DeniedMessage());
				if ($this->SearchWhere == "0=101")
					$this->setWarningMessage($Language->phrase("EnterSearchCriteria"));
				else
					$this->setWarningMessage($Language->phrase("NoRecord"));
			}
		}

		// Search options
		$this->setupSearchOptions();

		// Set up search panel class
		if ($this->SearchWhere != "")
			AppendClass($this->SearchPanelClass, "show");

		// Normal return
		if (IsApi()) {
			$rows = $this->getRecordsFromRecordset($this->Recordset);
			$this->Recordset->close();
			WriteJson(["success" => TRUE, $this->TableVar => $rows, "totalRecordCount" => $this->TotalRecords]);
			$this->terminate(TRUE);
		}

		// Set up pager
		$this->Pager = new PrevNextPager($this->StartRecord, $this->getRecordsPerPage(), $this->TotalRecords, $this->PageSizes, $this->RecordRange, $this->AutoHidePager, $this->AutoHidePageSizeSelector);
	}

	// Set up number of records displayed per page
	protected function setupDisplayRecords()
	{
		$wrk = Get(Config("TABLE_REC_PER_PAGE"), "");
		if ($wrk != "") {
			if (is_numeric($wrk)) {
				$this->DisplayRecords = (int)$wrk;
			} else {
				if (SameText($wrk, "all")) { // Display all records
					$this->DisplayRecords = -1;
				} else {
					$this->DisplayRecords = 20; // Non-numeric, load default
				}
			}
			$this->setRecordsPerPage($this->DisplayRecords); // Save to Session

			// Reset start position
			$this->StartRecord = 1;
			$this->setStartRecordNumber($this->StartRecord);
		}
	}

	// Build filter for all keys
	protected function buildKeyFilter()
	{
		global $CurrentForm;
		$wrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$CurrentForm->Index = $rowindex;
		$thisKey = strval($CurrentForm->getValue($this->FormKeyName));
		while ($thisKey != "") {
			if ($this->setupKeyValues($thisKey)) {
				$filter = $this->getRecordFilter();
				if ($wrkFilter != "")
					$wrkFilter .= " OR ";
				$wrkFilter .= $filter;
			} else {
				$wrkFilter = "0=1";
				break;
			}

			// Update row index and get row key
			$rowindex++; // Next row
			$CurrentForm->Index = $rowindex;
			$thisKey = strval($CurrentForm->getValue($this->FormKeyName));
		}
		return $wrkFilter;
	}

	// Set up key values
	protected function setupKeyValues($key)
	{
		$arKeyFlds = explode(Config("COMPOSITE_KEY_SEPARATOR"), $key);
		if (count($arKeyFlds) >= 3) {
			$this->jo_id->setOldValue($arKeyFlds[0]);
			if (!is_numeric($this->jo_id->OldValue))
				return FALSE;
			$this->mts_id->setOldValue($arKeyFlds[1]);
			if (!is_numeric($this->mts_id->OldValue))
				return FALSE;
			$this->jns_id->setOldValue($arKeyFlds[2]);
			if (!is_numeric($this->jns_id->OldValue))
				return FALSE;
		}
		return TRUE;
	}

	// Get list of filters
	public function getFilterList()
	{
		global $UserProfile;

		// Initialize
		$filterList = "";
		$savedFilterList = "";
		$filterList = Concat($filterList, $this->jo_id->AdvancedSearch->toJson(), ","); // Field jo_id
		$filterList = Concat($filterList, $this->NoJO->AdvancedSearch->toJson(), ","); // Field NoJO
		$filterList = Concat($filterList, $this->Tagihan->AdvancedSearch->toJson(), ","); // Field Tagihan
		$filterList = Concat($filterList, $this->Shipper->AdvancedSearch->toJson(), ","); // Field Shipper
		$filterList = Concat($filterList, $this->Qty->AdvancedSearch->toJson(), ","); // Field Qty
		$filterList = Concat($filterList, $this->Cont->AdvancedSearch->toJson(), ","); // Field Cont
		$filterList = Concat($filterList, $this->Status->AdvancedSearch->toJson(), ","); // Field Status
		$filterList = Concat($filterList, $this->doc->AdvancedSearch->toJson(), ","); // Field doc
		$filterList = Concat($filterList, $this->Tujuan->AdvancedSearch->toJson(), ","); // Field Tujuan
		$filterList = Concat($filterList, $this->Kapal->AdvancedSearch->toJson(), ","); // Field Kapal
		$filterList = Concat($filterList, $this->BM->AdvancedSearch->toJson(), ","); // Field BM
		$filterList = Concat($filterList, $this->mts_id->AdvancedSearch->toJson(), ","); // Field mts_id
		$filterList = Concat($filterList, $this->Tanggal->AdvancedSearch->toJson(), ","); // Field Tanggal
		$filterList = Concat($filterList, $this->NoUrut->AdvancedSearch->toJson(), ","); // Field NoUrut
		$filterList = Concat($filterList, $this->mts_jo_id->AdvancedSearch->toJson(), ","); // Field mts_jo_id
		$filterList = Concat($filterList, $this->mts_jenis_id->AdvancedSearch->toJson(), ","); // Field mts_jenis_id
		$filterList = Concat($filterList, $this->Masuk->AdvancedSearch->toJson(), ","); // Field Masuk
		$filterList = Concat($filterList, $this->Keluar->AdvancedSearch->toJson(), ","); // Field Keluar
		$filterList = Concat($filterList, $this->Comment->AdvancedSearch->toJson(), ","); // Field Comment
		$filterList = Concat($filterList, $this->jns_id->AdvancedSearch->toJson(), ","); // Field jns_id
		$filterList = Concat($filterList, $this->jns_nama->AdvancedSearch->toJson(), ","); // Field jns_nama
		$filterList = Concat($filterList, $this->NoKolom->AdvancedSearch->toJson(), ","); // Field NoKolom
		$filterList = Concat($filterList, $this->NoBL->AdvancedSearch->toJson(), ","); // Field NoBL

		// Return filter list in JSON
		if ($filterList != "")
			$filterList = "\"data\":{" . $filterList . "}";
		if ($savedFilterList != "")
			$filterList = Concat($filterList, "\"filters\":" . $savedFilterList, ",");
		return ($filterList != "") ? "{" . $filterList . "}" : "null";
	}

	// Process filter list
	protected function processFilterList()
	{
		global $UserProfile;
		if (Post("ajax") == "savefilters") { // Save filter request (Ajax)
			$filters = Post("filters");
			$UserProfile->setSearchFilters(CurrentUserName(), "fv203_costsheetlistsrch", $filters);
			WriteJson([["success" => TRUE]]); // Success
			return TRUE;
		} elseif (Post("cmd") == "resetfilter") {
			$this->restoreFilterList();
		}
		return FALSE;
	}

	// Restore list of filters
	protected function restoreFilterList()
	{

		// Return if not reset filter
		if (Post("cmd") !== "resetfilter")
			return FALSE;
		$filter = json_decode(Post("filter"), TRUE);
		$this->Command = "search";

		// Field jo_id
		$this->jo_id->AdvancedSearch->SearchValue = @$filter["x_jo_id"];
		$this->jo_id->AdvancedSearch->SearchOperator = @$filter["z_jo_id"];
		$this->jo_id->AdvancedSearch->SearchCondition = @$filter["v_jo_id"];
		$this->jo_id->AdvancedSearch->SearchValue2 = @$filter["y_jo_id"];
		$this->jo_id->AdvancedSearch->SearchOperator2 = @$filter["w_jo_id"];
		$this->jo_id->AdvancedSearch->save();

		// Field NoJO
		$this->NoJO->AdvancedSearch->SearchValue = @$filter["x_NoJO"];
		$this->NoJO->AdvancedSearch->SearchOperator = @$filter["z_NoJO"];
		$this->NoJO->AdvancedSearch->SearchCondition = @$filter["v_NoJO"];
		$this->NoJO->AdvancedSearch->SearchValue2 = @$filter["y_NoJO"];
		$this->NoJO->AdvancedSearch->SearchOperator2 = @$filter["w_NoJO"];
		$this->NoJO->AdvancedSearch->save();

		// Field Tagihan
		$this->Tagihan->AdvancedSearch->SearchValue = @$filter["x_Tagihan"];
		$this->Tagihan->AdvancedSearch->SearchOperator = @$filter["z_Tagihan"];
		$this->Tagihan->AdvancedSearch->SearchCondition = @$filter["v_Tagihan"];
		$this->Tagihan->AdvancedSearch->SearchValue2 = @$filter["y_Tagihan"];
		$this->Tagihan->AdvancedSearch->SearchOperator2 = @$filter["w_Tagihan"];
		$this->Tagihan->AdvancedSearch->save();

		// Field Shipper
		$this->Shipper->AdvancedSearch->SearchValue = @$filter["x_Shipper"];
		$this->Shipper->AdvancedSearch->SearchOperator = @$filter["z_Shipper"];
		$this->Shipper->AdvancedSearch->SearchCondition = @$filter["v_Shipper"];
		$this->Shipper->AdvancedSearch->SearchValue2 = @$filter["y_Shipper"];
		$this->Shipper->AdvancedSearch->SearchOperator2 = @$filter["w_Shipper"];
		$this->Shipper->AdvancedSearch->save();

		// Field Qty
		$this->Qty->AdvancedSearch->SearchValue = @$filter["x_Qty"];
		$this->Qty->AdvancedSearch->SearchOperator = @$filter["z_Qty"];
		$this->Qty->AdvancedSearch->SearchCondition = @$filter["v_Qty"];
		$this->Qty->AdvancedSearch->SearchValue2 = @$filter["y_Qty"];
		$this->Qty->AdvancedSearch->SearchOperator2 = @$filter["w_Qty"];
		$this->Qty->AdvancedSearch->save();

		// Field Cont
		$this->Cont->AdvancedSearch->SearchValue = @$filter["x_Cont"];
		$this->Cont->AdvancedSearch->SearchOperator = @$filter["z_Cont"];
		$this->Cont->AdvancedSearch->SearchCondition = @$filter["v_Cont"];
		$this->Cont->AdvancedSearch->SearchValue2 = @$filter["y_Cont"];
		$this->Cont->AdvancedSearch->SearchOperator2 = @$filter["w_Cont"];
		$this->Cont->AdvancedSearch->save();

		// Field Status
		$this->Status->AdvancedSearch->SearchValue = @$filter["x_Status"];
		$this->Status->AdvancedSearch->SearchOperator = @$filter["z_Status"];
		$this->Status->AdvancedSearch->SearchCondition = @$filter["v_Status"];
		$this->Status->AdvancedSearch->SearchValue2 = @$filter["y_Status"];
		$this->Status->AdvancedSearch->SearchOperator2 = @$filter["w_Status"];
		$this->Status->AdvancedSearch->save();

		// Field doc
		$this->doc->AdvancedSearch->SearchValue = @$filter["x_doc"];
		$this->doc->AdvancedSearch->SearchOperator = @$filter["z_doc"];
		$this->doc->AdvancedSearch->SearchCondition = @$filter["v_doc"];
		$this->doc->AdvancedSearch->SearchValue2 = @$filter["y_doc"];
		$this->doc->AdvancedSearch->SearchOperator2 = @$filter["w_doc"];
		$this->doc->AdvancedSearch->save();

		// Field Tujuan
		$this->Tujuan->AdvancedSearch->SearchValue = @$filter["x_Tujuan"];
		$this->Tujuan->AdvancedSearch->SearchOperator = @$filter["z_Tujuan"];
		$this->Tujuan->AdvancedSearch->SearchCondition = @$filter["v_Tujuan"];
		$this->Tujuan->AdvancedSearch->SearchValue2 = @$filter["y_Tujuan"];
		$this->Tujuan->AdvancedSearch->SearchOperator2 = @$filter["w_Tujuan"];
		$this->Tujuan->AdvancedSearch->save();

		// Field Kapal
		$this->Kapal->AdvancedSearch->SearchValue = @$filter["x_Kapal"];
		$this->Kapal->AdvancedSearch->SearchOperator = @$filter["z_Kapal"];
		$this->Kapal->AdvancedSearch->SearchCondition = @$filter["v_Kapal"];
		$this->Kapal->AdvancedSearch->SearchValue2 = @$filter["y_Kapal"];
		$this->Kapal->AdvancedSearch->SearchOperator2 = @$filter["w_Kapal"];
		$this->Kapal->AdvancedSearch->save();

		// Field BM
		$this->BM->AdvancedSearch->SearchValue = @$filter["x_BM"];
		$this->BM->AdvancedSearch->SearchOperator = @$filter["z_BM"];
		$this->BM->AdvancedSearch->SearchCondition = @$filter["v_BM"];
		$this->BM->AdvancedSearch->SearchValue2 = @$filter["y_BM"];
		$this->BM->AdvancedSearch->SearchOperator2 = @$filter["w_BM"];
		$this->BM->AdvancedSearch->save();

		// Field mts_id
		$this->mts_id->AdvancedSearch->SearchValue = @$filter["x_mts_id"];
		$this->mts_id->AdvancedSearch->SearchOperator = @$filter["z_mts_id"];
		$this->mts_id->AdvancedSearch->SearchCondition = @$filter["v_mts_id"];
		$this->mts_id->AdvancedSearch->SearchValue2 = @$filter["y_mts_id"];
		$this->mts_id->AdvancedSearch->SearchOperator2 = @$filter["w_mts_id"];
		$this->mts_id->AdvancedSearch->save();

		// Field Tanggal
		$this->Tanggal->AdvancedSearch->SearchValue = @$filter["x_Tanggal"];
		$this->Tanggal->AdvancedSearch->SearchOperator = @$filter["z_Tanggal"];
		$this->Tanggal->AdvancedSearch->SearchCondition = @$filter["v_Tanggal"];
		$this->Tanggal->AdvancedSearch->SearchValue2 = @$filter["y_Tanggal"];
		$this->Tanggal->AdvancedSearch->SearchOperator2 = @$filter["w_Tanggal"];
		$this->Tanggal->AdvancedSearch->save();

		// Field NoUrut
		$this->NoUrut->AdvancedSearch->SearchValue = @$filter["x_NoUrut"];
		$this->NoUrut->AdvancedSearch->SearchOperator = @$filter["z_NoUrut"];
		$this->NoUrut->AdvancedSearch->SearchCondition = @$filter["v_NoUrut"];
		$this->NoUrut->AdvancedSearch->SearchValue2 = @$filter["y_NoUrut"];
		$this->NoUrut->AdvancedSearch->SearchOperator2 = @$filter["w_NoUrut"];
		$this->NoUrut->AdvancedSearch->save();

		// Field mts_jo_id
		$this->mts_jo_id->AdvancedSearch->SearchValue = @$filter["x_mts_jo_id"];
		$this->mts_jo_id->AdvancedSearch->SearchOperator = @$filter["z_mts_jo_id"];
		$this->mts_jo_id->AdvancedSearch->SearchCondition = @$filter["v_mts_jo_id"];
		$this->mts_jo_id->AdvancedSearch->SearchValue2 = @$filter["y_mts_jo_id"];
		$this->mts_jo_id->AdvancedSearch->SearchOperator2 = @$filter["w_mts_jo_id"];
		$this->mts_jo_id->AdvancedSearch->save();

		// Field mts_jenis_id
		$this->mts_jenis_id->AdvancedSearch->SearchValue = @$filter["x_mts_jenis_id"];
		$this->mts_jenis_id->AdvancedSearch->SearchOperator = @$filter["z_mts_jenis_id"];
		$this->mts_jenis_id->AdvancedSearch->SearchCondition = @$filter["v_mts_jenis_id"];
		$this->mts_jenis_id->AdvancedSearch->SearchValue2 = @$filter["y_mts_jenis_id"];
		$this->mts_jenis_id->AdvancedSearch->SearchOperator2 = @$filter["w_mts_jenis_id"];
		$this->mts_jenis_id->AdvancedSearch->save();

		// Field Masuk
		$this->Masuk->AdvancedSearch->SearchValue = @$filter["x_Masuk"];
		$this->Masuk->AdvancedSearch->SearchOperator = @$filter["z_Masuk"];
		$this->Masuk->AdvancedSearch->SearchCondition = @$filter["v_Masuk"];
		$this->Masuk->AdvancedSearch->SearchValue2 = @$filter["y_Masuk"];
		$this->Masuk->AdvancedSearch->SearchOperator2 = @$filter["w_Masuk"];
		$this->Masuk->AdvancedSearch->save();

		// Field Keluar
		$this->Keluar->AdvancedSearch->SearchValue = @$filter["x_Keluar"];
		$this->Keluar->AdvancedSearch->SearchOperator = @$filter["z_Keluar"];
		$this->Keluar->AdvancedSearch->SearchCondition = @$filter["v_Keluar"];
		$this->Keluar->AdvancedSearch->SearchValue2 = @$filter["y_Keluar"];
		$this->Keluar->AdvancedSearch->SearchOperator2 = @$filter["w_Keluar"];
		$this->Keluar->AdvancedSearch->save();

		// Field Comment
		$this->Comment->AdvancedSearch->SearchValue = @$filter["x_Comment"];
		$this->Comment->AdvancedSearch->SearchOperator = @$filter["z_Comment"];
		$this->Comment->AdvancedSearch->SearchCondition = @$filter["v_Comment"];
		$this->Comment->AdvancedSearch->SearchValue2 = @$filter["y_Comment"];
		$this->Comment->AdvancedSearch->SearchOperator2 = @$filter["w_Comment"];
		$this->Comment->AdvancedSearch->save();

		// Field jns_id
		$this->jns_id->AdvancedSearch->SearchValue = @$filter["x_jns_id"];
		$this->jns_id->AdvancedSearch->SearchOperator = @$filter["z_jns_id"];
		$this->jns_id->AdvancedSearch->SearchCondition = @$filter["v_jns_id"];
		$this->jns_id->AdvancedSearch->SearchValue2 = @$filter["y_jns_id"];
		$this->jns_id->AdvancedSearch->SearchOperator2 = @$filter["w_jns_id"];
		$this->jns_id->AdvancedSearch->save();

		// Field jns_nama
		$this->jns_nama->AdvancedSearch->SearchValue = @$filter["x_jns_nama"];
		$this->jns_nama->AdvancedSearch->SearchOperator = @$filter["z_jns_nama"];
		$this->jns_nama->AdvancedSearch->SearchCondition = @$filter["v_jns_nama"];
		$this->jns_nama->AdvancedSearch->SearchValue2 = @$filter["y_jns_nama"];
		$this->jns_nama->AdvancedSearch->SearchOperator2 = @$filter["w_jns_nama"];
		$this->jns_nama->AdvancedSearch->save();

		// Field NoKolom
		$this->NoKolom->AdvancedSearch->SearchValue = @$filter["x_NoKolom"];
		$this->NoKolom->AdvancedSearch->SearchOperator = @$filter["z_NoKolom"];
		$this->NoKolom->AdvancedSearch->SearchCondition = @$filter["v_NoKolom"];
		$this->NoKolom->AdvancedSearch->SearchValue2 = @$filter["y_NoKolom"];
		$this->NoKolom->AdvancedSearch->SearchOperator2 = @$filter["w_NoKolom"];
		$this->NoKolom->AdvancedSearch->save();

		// Field NoBL
		$this->NoBL->AdvancedSearch->SearchValue = @$filter["x_NoBL"];
		$this->NoBL->AdvancedSearch->SearchOperator = @$filter["z_NoBL"];
		$this->NoBL->AdvancedSearch->SearchCondition = @$filter["v_NoBL"];
		$this->NoBL->AdvancedSearch->SearchValue2 = @$filter["y_NoBL"];
		$this->NoBL->AdvancedSearch->SearchOperator2 = @$filter["w_NoBL"];
		$this->NoBL->AdvancedSearch->save();
	}

	// Advanced search WHERE clause based on QueryString
	protected function advancedSearchWhere($default = FALSE)
	{
		global $Security;
		$where = "";
		if (!$Security->canSearch())
			return "";
		$this->buildSearchSql($where, $this->jo_id, $default, FALSE); // jo_id
		$this->buildSearchSql($where, $this->NoJO, $default, FALSE); // NoJO
		$this->buildSearchSql($where, $this->Tagihan, $default, FALSE); // Tagihan
		$this->buildSearchSql($where, $this->Shipper, $default, FALSE); // Shipper
		$this->buildSearchSql($where, $this->Qty, $default, FALSE); // Qty
		$this->buildSearchSql($where, $this->Cont, $default, FALSE); // Cont
		$this->buildSearchSql($where, $this->Status, $default, FALSE); // Status
		$this->buildSearchSql($where, $this->doc, $default, FALSE); // doc
		$this->buildSearchSql($where, $this->Tujuan, $default, FALSE); // Tujuan
		$this->buildSearchSql($where, $this->Kapal, $default, FALSE); // Kapal
		$this->buildSearchSql($where, $this->BM, $default, FALSE); // BM
		$this->buildSearchSql($where, $this->mts_id, $default, FALSE); // mts_id
		$this->buildSearchSql($where, $this->Tanggal, $default, FALSE); // Tanggal
		$this->buildSearchSql($where, $this->NoUrut, $default, FALSE); // NoUrut
		$this->buildSearchSql($where, $this->mts_jo_id, $default, FALSE); // mts_jo_id
		$this->buildSearchSql($where, $this->mts_jenis_id, $default, FALSE); // mts_jenis_id
		$this->buildSearchSql($where, $this->Masuk, $default, FALSE); // Masuk
		$this->buildSearchSql($where, $this->Keluar, $default, FALSE); // Keluar
		$this->buildSearchSql($where, $this->Comment, $default, FALSE); // Comment
		$this->buildSearchSql($where, $this->jns_id, $default, FALSE); // jns_id
		$this->buildSearchSql($where, $this->jns_nama, $default, FALSE); // jns_nama
		$this->buildSearchSql($where, $this->NoKolom, $default, FALSE); // NoKolom
		$this->buildSearchSql($where, $this->NoBL, $default, FALSE); // NoBL

		// Set up search parm
		if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->jo_id->AdvancedSearch->save(); // jo_id
			$this->NoJO->AdvancedSearch->save(); // NoJO
			$this->Tagihan->AdvancedSearch->save(); // Tagihan
			$this->Shipper->AdvancedSearch->save(); // Shipper
			$this->Qty->AdvancedSearch->save(); // Qty
			$this->Cont->AdvancedSearch->save(); // Cont
			$this->Status->AdvancedSearch->save(); // Status
			$this->doc->AdvancedSearch->save(); // doc
			$this->Tujuan->AdvancedSearch->save(); // Tujuan
			$this->Kapal->AdvancedSearch->save(); // Kapal
			$this->BM->AdvancedSearch->save(); // BM
			$this->mts_id->AdvancedSearch->save(); // mts_id
			$this->Tanggal->AdvancedSearch->save(); // Tanggal
			$this->NoUrut->AdvancedSearch->save(); // NoUrut
			$this->mts_jo_id->AdvancedSearch->save(); // mts_jo_id
			$this->mts_jenis_id->AdvancedSearch->save(); // mts_jenis_id
			$this->Masuk->AdvancedSearch->save(); // Masuk
			$this->Keluar->AdvancedSearch->save(); // Keluar
			$this->Comment->AdvancedSearch->save(); // Comment
			$this->jns_id->AdvancedSearch->save(); // jns_id
			$this->jns_nama->AdvancedSearch->save(); // jns_nama
			$this->NoKolom->AdvancedSearch->save(); // NoKolom
			$this->NoBL->AdvancedSearch->save(); // NoBL
		}
		return $where;
	}

	// Build search SQL
	protected function buildSearchSql(&$where, &$fld, $default, $multiValue)
	{
		$fldParm = $fld->Param;
		$fldVal = ($default) ? $fld->AdvancedSearch->SearchValueDefault : $fld->AdvancedSearch->SearchValue;
		$fldOpr = ($default) ? $fld->AdvancedSearch->SearchOperatorDefault : $fld->AdvancedSearch->SearchOperator;
		$fldCond = ($default) ? $fld->AdvancedSearch->SearchConditionDefault : $fld->AdvancedSearch->SearchCondition;
		$fldVal2 = ($default) ? $fld->AdvancedSearch->SearchValue2Default : $fld->AdvancedSearch->SearchValue2;
		$fldOpr2 = ($default) ? $fld->AdvancedSearch->SearchOperator2Default : $fld->AdvancedSearch->SearchOperator2;
		$wrk = "";
		if (is_array($fldVal))
			$fldVal = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal);
		if (is_array($fldVal2))
			$fldVal2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal2);
		$fldOpr = strtoupper(trim($fldOpr));
		if ($fldOpr == "")
			$fldOpr = "=";
		$fldOpr2 = strtoupper(trim($fldOpr2));
		if ($fldOpr2 == "")
			$fldOpr2 = "=";
		if (Config("SEARCH_MULTI_VALUE_OPTION") == 1 || !IsMultiSearchOperator($fldOpr))
			$multiValue = FALSE;
		if ($multiValue) {
			$wrk1 = ($fldVal != "") ? GetMultiSearchSql($fld, $fldOpr, $fldVal, $this->Dbid) : ""; // Field value 1
			$wrk2 = ($fldVal2 != "") ? GetMultiSearchSql($fld, $fldOpr2, $fldVal2, $this->Dbid) : ""; // Field value 2
			$wrk = $wrk1; // Build final SQL
			if ($wrk2 != "")
				$wrk = ($wrk != "") ? "($wrk) $fldCond ($wrk2)" : $wrk2;
		} else {
			$fldVal = $this->convertSearchValue($fld, $fldVal);
			$fldVal2 = $this->convertSearchValue($fld, $fldVal2);
			$wrk = GetSearchSql($fld, $fldVal, $fldOpr, $fldCond, $fldVal2, $fldOpr2, $this->Dbid);
		}
		AddFilter($where, $wrk);
	}

	// Convert search value
	protected function convertSearchValue(&$fld, $fldVal)
	{
		if ($fldVal == Config("NULL_VALUE") || $fldVal == Config("NOT_NULL_VALUE"))
			return $fldVal;
		$value = $fldVal;
		if ($fld->isBoolean()) {
			if ($fldVal != "")
				$value = (SameText($fldVal, "1") || SameText($fldVal, "y") || SameText($fldVal, "t")) ? $fld->TrueValue : $fld->FalseValue;
		} elseif ($fld->DataType == DATATYPE_DATE || $fld->DataType == DATATYPE_TIME) {
			if ($fldVal != "")
				$value = UnFormatDateTime($fldVal, $fld->DateTimeFormat);
		}
		return $value;
	}

	// Check if search parm exists
	protected function checkSearchParms()
	{
		if ($this->jo_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->NoJO->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Tagihan->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Shipper->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Qty->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Cont->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Status->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->doc->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Tujuan->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Kapal->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->mts_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Tanggal->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->NoUrut->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->mts_jo_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->mts_jenis_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Masuk->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Keluar->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Comment->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->jns_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->jns_nama->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->NoKolom->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->NoBL->AdvancedSearch->issetSession())
			return TRUE;
		return FALSE;
	}

	// Clear all search parameters
	protected function resetSearchParms()
	{

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$this->setSearchWhere($this->SearchWhere);

		// Clear advanced search parameters
		$this->resetAdvancedSearchParms();
	}

	// Load advanced search default values
	protected function loadAdvancedSearchDefault()
	{
		return FALSE;
	}

	// Clear all advanced search parameters
	protected function resetAdvancedSearchParms()
	{
		$this->jo_id->AdvancedSearch->unsetSession();
		$this->NoJO->AdvancedSearch->unsetSession();
		$this->Tagihan->AdvancedSearch->unsetSession();
		$this->Shipper->AdvancedSearch->unsetSession();
		$this->Qty->AdvancedSearch->unsetSession();
		$this->Cont->AdvancedSearch->unsetSession();
		$this->Status->AdvancedSearch->unsetSession();
		$this->doc->AdvancedSearch->unsetSession();
		$this->Tujuan->AdvancedSearch->unsetSession();
		$this->Kapal->AdvancedSearch->unsetSession();
		$this->BM->AdvancedSearch->unsetSession();
		$this->mts_id->AdvancedSearch->unsetSession();
		$this->Tanggal->AdvancedSearch->unsetSession();
		$this->NoUrut->AdvancedSearch->unsetSession();
		$this->mts_jo_id->AdvancedSearch->unsetSession();
		$this->mts_jenis_id->AdvancedSearch->unsetSession();
		$this->Masuk->AdvancedSearch->unsetSession();
		$this->Keluar->AdvancedSearch->unsetSession();
		$this->Comment->AdvancedSearch->unsetSession();
		$this->jns_id->AdvancedSearch->unsetSession();
		$this->jns_nama->AdvancedSearch->unsetSession();
		$this->NoKolom->AdvancedSearch->unsetSession();
		$this->NoBL->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore advanced search values
		$this->jo_id->AdvancedSearch->load();
		$this->NoJO->AdvancedSearch->load();
		$this->Tagihan->AdvancedSearch->load();
		$this->Shipper->AdvancedSearch->load();
		$this->Qty->AdvancedSearch->load();
		$this->Cont->AdvancedSearch->load();
		$this->Status->AdvancedSearch->load();
		$this->doc->AdvancedSearch->load();
		$this->Tujuan->AdvancedSearch->load();
		$this->Kapal->AdvancedSearch->load();
		$this->BM->AdvancedSearch->load();
		$this->mts_id->AdvancedSearch->load();
		$this->Tanggal->AdvancedSearch->load();
		$this->NoUrut->AdvancedSearch->load();
		$this->mts_jo_id->AdvancedSearch->load();
		$this->mts_jenis_id->AdvancedSearch->load();
		$this->Masuk->AdvancedSearch->load();
		$this->Keluar->AdvancedSearch->load();
		$this->Comment->AdvancedSearch->load();
		$this->jns_id->AdvancedSearch->load();
		$this->jns_nama->AdvancedSearch->load();
		$this->NoKolom->AdvancedSearch->load();
		$this->NoBL->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for Ctrl pressed
		$ctrl = Get("ctrl") !== NULL;

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->jo_id, $ctrl); // jo_id
			$this->updateSort($this->NoJO, $ctrl); // NoJO
			$this->updateSort($this->Tagihan, $ctrl); // Tagihan
			$this->updateSort($this->Shipper, $ctrl); // Shipper
			$this->updateSort($this->Qty, $ctrl); // Qty
			$this->updateSort($this->Cont, $ctrl); // Cont
			$this->updateSort($this->Status, $ctrl); // Status
			$this->updateSort($this->doc, $ctrl); // doc
			$this->updateSort($this->Tujuan, $ctrl); // Tujuan
			$this->updateSort($this->Kapal, $ctrl); // Kapal
			$this->updateSort($this->BM, $ctrl); // BM
			$this->updateSort($this->mts_id, $ctrl); // mts_id
			$this->updateSort($this->Tanggal, $ctrl); // Tanggal
			$this->updateSort($this->NoUrut, $ctrl); // NoUrut
			$this->updateSort($this->mts_jo_id, $ctrl); // mts_jo_id
			$this->updateSort($this->mts_jenis_id, $ctrl); // mts_jenis_id
			$this->updateSort($this->Masuk, $ctrl); // Masuk
			$this->updateSort($this->Keluar, $ctrl); // Keluar
			$this->updateSort($this->jns_id, $ctrl); // jns_id
			$this->updateSort($this->NoKolom, $ctrl); // NoKolom
			$this->updateSort($this->NoBL, $ctrl); // NoBL
			$this->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	protected function loadSortOrder()
	{
		$orderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
		if ($orderBy == "") {
			if ($this->getSqlOrderBy() != "") {
				$orderBy = $this->getSqlOrderBy();
				$this->setSessionOrderBy($orderBy);
			}
		}
	}

	// Reset command
	// - cmd=reset (Reset search parameters)
	// - cmd=resetall (Reset search and master/detail parameters)
	// - cmd=resetsort (Reset sort parameters)

	protected function resetCmd()
	{

		// Check if reset command
		if (StartsString("reset", $this->Command)) {

			// Reset search criteria
			if ($this->Command == "reset" || $this->Command == "resetall")
				$this->resetSearchParms();

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
				$this->jo_id->setSort("");
				$this->NoJO->setSort("");
				$this->Tagihan->setSort("");
				$this->Shipper->setSort("");
				$this->Qty->setSort("");
				$this->Cont->setSort("");
				$this->Status->setSort("");
				$this->doc->setSort("");
				$this->Tujuan->setSort("");
				$this->Kapal->setSort("");
				$this->BM->setSort("");
				$this->mts_id->setSort("");
				$this->Tanggal->setSort("");
				$this->NoUrut->setSort("");
				$this->mts_jo_id->setSort("");
				$this->mts_jenis_id->setSort("");
				$this->Masuk->setSort("");
				$this->Keluar->setSort("");
				$this->jns_id->setSort("");
				$this->NoKolom->setSort("");
				$this->NoBL->setSort("");
			}

			// Reset start position
			$this->StartRecord = 1;
			$this->setStartRecordNumber($this->StartRecord);
		}
	}

	// Set up list options
	protected function setupListOptions()
	{
		global $Security, $Language;

		// Add group option item
		$item = &$this->ListOptions->add($this->ListOptions->GroupOptionName);
		$item->Body = "";
		$item->OnLeft = TRUE;
		$item->Visible = FALSE;

		// List actions
		$item = &$this->ListOptions->add("listactions");
		$item->CssClass = "text-nowrap";
		$item->OnLeft = TRUE;
		$item->Visible = FALSE;
		$item->ShowInButtonGroup = FALSE;
		$item->ShowInDropDown = FALSE;

		// "checkbox"
		$item = &$this->ListOptions->add("checkbox");
		$item->Visible = FALSE;
		$item->OnLeft = TRUE;
		$item->Header = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" name=\"key\" id=\"key\" class=\"custom-control-input\" onclick=\"ew.selectAllKey(this);\"><label class=\"custom-control-label\" for=\"key\"></label></div>";
		$item->moveTo(0);
		$item->ShowInDropDown = FALSE;
		$item->ShowInButtonGroup = FALSE;

		// "sequence"
		$item = &$this->ListOptions->add("sequence");
		$item->CssClass = "text-nowrap";
		$item->Visible = TRUE;
		$item->OnLeft = TRUE; // Always on left
		$item->ShowInDropDown = FALSE;
		$item->ShowInButtonGroup = FALSE;

		// Drop down button for ListOptions
		$this->ListOptions->UseDropDownButton = FALSE;
		$this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
		$this->ListOptions->UseButtonGroup = FALSE;
		if ($this->ListOptions->UseButtonGroup && IsMobile())
			$this->ListOptions->UseDropDownButton = TRUE;

		//$this->ListOptions->ButtonClass = ""; // Class for button group
		// Call ListOptions_Load event

		$this->ListOptions_Load();
		$this->setupListOptionsExt();
		$item = $this->ListOptions[$this->ListOptions->GroupOptionName];
		$item->Visible = $this->ListOptions->groupOptionVisible();
	}

	// Render list options
	public function renderListOptions()
	{
		global $Security, $Language, $CurrentForm;
		$this->ListOptions->loadDefault();

		// Call ListOptions_Rendering event
		$this->ListOptions_Rendering();

		// "sequence"
		$opt = $this->ListOptions["sequence"];
		$opt->Body = FormatSequenceNumber($this->RecordCount);

		// Set up list action buttons
		$opt = $this->ListOptions["listactions"];
		if ($opt && !$this->isExport() && !$this->CurrentAction) {
			$body = "";
			$links = [];
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_SINGLE && $listaction->Allow) {
					$action = $listaction->Action;
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon != "") ? "<i class=\"" . HtmlEncode(str_replace(" ew-icon", "", $listaction->Icon)) . "\" data-caption=\"" . HtmlTitle($caption) . "\"></i> " : "";
					$links[] = "<li><a class=\"dropdown-item ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(TRUE) . "}," . $listaction->toJson(TRUE) . "));\">" . $icon . $listaction->Caption . "</a></li>";
					if (count($links) == 1) // Single button
						$body = "<a class=\"ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(TRUE) . "}," . $listaction->toJson(TRUE) . "));\">" . $icon . $listaction->Caption . "</a>";
				}
			}
			if (count($links) > 1) { // More than one buttons, use dropdown
				$body = "<button class=\"dropdown-toggle btn btn-default ew-actions\" title=\"" . HtmlTitle($Language->phrase("ListActionButton")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("ListActionButton") . "</button>";
				$content = "";
				foreach ($links as $link)
					$content .= "<li>" . $link . "</li>";
				$body .= "<ul class=\"dropdown-menu" . ($opt->OnLeft ? "" : " dropdown-menu-right") . "\">". $content . "</ul>";
				$body = "<div class=\"btn-group btn-group-sm\">" . $body . "</div>";
			}
			if (count($links) > 0) {
				$opt->Body = $body;
				$opt->Visible = TRUE;
			}
		}

		// "checkbox"
		$opt = $this->ListOptions["checkbox"];
		$opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->jo_id->CurrentValue . Config("COMPOSITE_KEY_SEPARATOR") . $this->mts_id->CurrentValue . Config("COMPOSITE_KEY_SEPARATOR") . $this->jns_id->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = $options["action"];

		// Set up options default
		foreach ($options as $option) {
			$option->UseDropDownButton = FALSE;
			$option->UseButtonGroup = TRUE;

			//$option->ButtonClass = ""; // Class for button group
			$item = &$option->add($option->GroupOptionName);
			$item->Body = "";
			$item->Visible = FALSE;
		}
		$options["addedit"]->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
		$options["detail"]->DropDownButtonPhrase = $Language->phrase("ButtonDetails");
		$options["action"]->DropDownButtonPhrase = $Language->phrase("ButtonActions");

		// Filter button
		$item = &$this->FilterOptions->add("savecurrentfilter");
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fv203_costsheetlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fv203_costsheetlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
		$item->Visible = TRUE;
		$this->FilterOptions->UseDropDownButton = TRUE;
		$this->FilterOptions->UseButtonGroup = !$this->FilterOptions->UseDropDownButton;
		$this->FilterOptions->DropDownButtonPhrase = $Language->phrase("Filters");

		// Add group option item
		$item = &$this->FilterOptions->add($this->FilterOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
	}

	// Render other options
	public function renderOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
			$option = $options["action"];

			// Set up list action buttons
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_MULTIPLE) {
					$item = &$option->add("custom_" . $listaction->Action);
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon != "") ? "<i class=\"" . HtmlEncode($listaction->Icon) . "\" data-caption=\"" . HtmlEncode($caption) . "\"></i> " . $caption : $caption;
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.fv203_costsheetlist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
					$item->Visible = $listaction->Allow;
				}
			}

			// Hide grid edit and other options
			if ($this->TotalRecords <= 0) {
				$option = $options["addedit"];
				$item = $option["gridedit"];
				if ($item)
					$item->Visible = FALSE;
				$option = $options["action"];
				$option->hideAllOptions();
			}
	}

	// Process list action
	protected function processListAction()
	{
		global $Language, $Security;
		$userlist = "";
		$user = "";
		$filter = $this->getFilterFromRecordKeys();
		$userAction = Post("useraction", "");
		if ($filter != "" && $userAction != "") {

			// Check permission first
			$actionCaption = $userAction;
			if (array_key_exists($userAction, $this->ListActions->Items)) {
				$actionCaption = $this->ListActions[$userAction]->Caption;
				if (!$this->ListActions[$userAction]->Allow) {
					$errmsg = str_replace('%s', $actionCaption, $Language->phrase("CustomActionNotAllowed"));
					if (Post("ajax") == $userAction) // Ajax
						echo "<p class=\"text-danger\">" . $errmsg . "</p>";
					else
						$this->setFailureMessage($errmsg);
					return FALSE;
				}
			}
			$this->CurrentFilter = $filter;
			$sql = $this->getCurrentSql();
			$conn = $this->getConnection();
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			$rs = $conn->execute($sql);
			$conn->raiseErrorFn = "";
			$this->CurrentAction = $userAction;

			// Call row action event
			if ($rs && !$rs->EOF) {
				$conn->beginTrans();
				$this->SelectedCount = $rs->RecordCount();
				$this->SelectedIndex = 0;
				while (!$rs->EOF) {
					$this->SelectedIndex++;
					$row = $rs->fields;
					$processed = $this->Row_CustomAction($userAction, $row);
					if (!$processed)
						break;
					$rs->moveNext();
				}
				if ($processed) {
					$conn->commitTrans(); // Commit the changes
					if ($this->getSuccessMessage() == "" && !ob_get_length()) // No output
						$this->setSuccessMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionCompleted"))); // Set up success message
				} else {
					$conn->rollbackTrans(); // Rollback changes

					// Set up error message
					if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

						// Use the message, do nothing
					} elseif ($this->CancelMessage != "") {
						$this->setFailureMessage($this->CancelMessage);
						$this->CancelMessage = "";
					} else {
						$this->setFailureMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionFailed")));
					}
				}
			}
			if ($rs)
				$rs->close();
			$this->CurrentAction = ""; // Clear action
			if (Post("ajax") == $userAction) { // Ajax
				if ($this->getSuccessMessage() != "") {
					echo "<p class=\"text-success\">" . $this->getSuccessMessage() . "</p>";
					$this->clearSuccessMessage(); // Clear message
				}
				if ($this->getFailureMessage() != "") {
					echo "<p class=\"text-danger\">" . $this->getFailureMessage() . "</p>";
					$this->clearFailureMessage(); // Clear message
				}
				return TRUE;
			}
		}
		return FALSE; // Not ajax request
	}

	// Set up list options (extended codes)
	protected function setupListOptionsExt()
	{
	}

	// Render list options (extended codes)
	protected function renderListOptionsExt()
	{
	}

	// Load search values for validation
	protected function loadSearchValues()
	{

		// Load search values
		$got = FALSE;

		// jo_id
		if (!$this->isAddOrEdit() && $this->jo_id->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->jo_id->AdvancedSearch->SearchValue != "" || $this->jo_id->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// NoJO
		if (!$this->isAddOrEdit() && $this->NoJO->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->NoJO->AdvancedSearch->SearchValue != "" || $this->NoJO->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Tagihan
		if (!$this->isAddOrEdit() && $this->Tagihan->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Tagihan->AdvancedSearch->SearchValue != "" || $this->Tagihan->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Shipper
		if (!$this->isAddOrEdit() && $this->Shipper->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Shipper->AdvancedSearch->SearchValue != "" || $this->Shipper->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Qty
		if (!$this->isAddOrEdit() && $this->Qty->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Qty->AdvancedSearch->SearchValue != "" || $this->Qty->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Cont
		if (!$this->isAddOrEdit() && $this->Cont->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Cont->AdvancedSearch->SearchValue != "" || $this->Cont->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Status
		if (!$this->isAddOrEdit() && $this->Status->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Status->AdvancedSearch->SearchValue != "" || $this->Status->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// doc
		if (!$this->isAddOrEdit() && $this->doc->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->doc->AdvancedSearch->SearchValue != "" || $this->doc->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Tujuan
		if (!$this->isAddOrEdit() && $this->Tujuan->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Tujuan->AdvancedSearch->SearchValue != "" || $this->Tujuan->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Kapal
		if (!$this->isAddOrEdit() && $this->Kapal->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Kapal->AdvancedSearch->SearchValue != "" || $this->Kapal->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// BM
		if (!$this->isAddOrEdit() && $this->BM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->BM->AdvancedSearch->SearchValue != "" || $this->BM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// mts_id
		if (!$this->isAddOrEdit() && $this->mts_id->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->mts_id->AdvancedSearch->SearchValue != "" || $this->mts_id->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Tanggal
		if (!$this->isAddOrEdit() && $this->Tanggal->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Tanggal->AdvancedSearch->SearchValue != "" || $this->Tanggal->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// NoUrut
		if (!$this->isAddOrEdit() && $this->NoUrut->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->NoUrut->AdvancedSearch->SearchValue != "" || $this->NoUrut->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// mts_jo_id
		if (!$this->isAddOrEdit() && $this->mts_jo_id->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->mts_jo_id->AdvancedSearch->SearchValue != "" || $this->mts_jo_id->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// mts_jenis_id
		if (!$this->isAddOrEdit() && $this->mts_jenis_id->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->mts_jenis_id->AdvancedSearch->SearchValue != "" || $this->mts_jenis_id->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Masuk
		if (!$this->isAddOrEdit() && $this->Masuk->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Masuk->AdvancedSearch->SearchValue != "" || $this->Masuk->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Keluar
		if (!$this->isAddOrEdit() && $this->Keluar->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Keluar->AdvancedSearch->SearchValue != "" || $this->Keluar->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Comment
		if (!$this->isAddOrEdit() && $this->Comment->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Comment->AdvancedSearch->SearchValue != "" || $this->Comment->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// jns_id
		if (!$this->isAddOrEdit() && $this->jns_id->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->jns_id->AdvancedSearch->SearchValue != "" || $this->jns_id->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// jns_nama
		if (!$this->isAddOrEdit() && $this->jns_nama->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->jns_nama->AdvancedSearch->SearchValue != "" || $this->jns_nama->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// NoKolom
		if (!$this->isAddOrEdit() && $this->NoKolom->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->NoKolom->AdvancedSearch->SearchValue != "" || $this->NoKolom->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// NoBL
		if (!$this->isAddOrEdit() && $this->NoBL->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->NoBL->AdvancedSearch->SearchValue != "" || $this->NoBL->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}
		return $got;
	}

	// Load recordset
	public function loadRecordset($offset = -1, $rowcnt = -1)
	{

		// Load List page SQL
		$sql = $this->getListSql();
		$conn = $this->getConnection();

		// Load recordset
		$dbtype = GetConnectionType($this->Dbid);
		if ($this->UseSelectLimit) {
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			if ($dbtype == "MSSQL") {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderBy())]);
			} else {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset);
			}
			$conn->raiseErrorFn = "";
		} else {
			$rs = LoadRecordset($sql, $conn);
		}

		// Call Recordset Selected event
		$this->Recordset_Selected($rs);
		return $rs;
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
		$this->jo_id->setDbValue($row['jo_id']);
		$this->NoJO->setDbValue($row['NoJO']);
		$this->Tagihan->setDbValue($row['Tagihan']);
		$this->Shipper->setDbValue($row['Shipper']);
		$this->Qty->setDbValue($row['Qty']);
		$this->Cont->setDbValue($row['Cont']);
		$this->Status->setDbValue($row['Status']);
		$this->doc->setDbValue($row['doc']);
		$this->Tujuan->setDbValue($row['Tujuan']);
		$this->Kapal->setDbValue($row['Kapal']);
		$this->BM->setDbValue($row['BM']);
		$this->mts_id->setDbValue($row['mts_id']);
		$this->Tanggal->setDbValue($row['Tanggal']);
		$this->NoUrut->setDbValue($row['NoUrut']);
		$this->mts_jo_id->setDbValue($row['mts_jo_id']);
		$this->mts_jenis_id->setDbValue($row['mts_jenis_id']);
		$this->Masuk->setDbValue($row['Masuk']);
		$this->Keluar->setDbValue($row['Keluar']);
		$this->Comment->setDbValue($row['Comment']);
		$this->jns_id->setDbValue($row['jns_id']);
		$this->jns_nama->setDbValue($row['jns_nama']);
		$this->NoKolom->setDbValue($row['NoKolom']);
		$this->NoBL->setDbValue($row['NoBL']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['jo_id'] = NULL;
		$row['NoJO'] = NULL;
		$row['Tagihan'] = NULL;
		$row['Shipper'] = NULL;
		$row['Qty'] = NULL;
		$row['Cont'] = NULL;
		$row['Status'] = NULL;
		$row['doc'] = NULL;
		$row['Tujuan'] = NULL;
		$row['Kapal'] = NULL;
		$row['BM'] = NULL;
		$row['mts_id'] = NULL;
		$row['Tanggal'] = NULL;
		$row['NoUrut'] = NULL;
		$row['mts_jo_id'] = NULL;
		$row['mts_jenis_id'] = NULL;
		$row['Masuk'] = NULL;
		$row['Keluar'] = NULL;
		$row['Comment'] = NULL;
		$row['jns_id'] = NULL;
		$row['jns_nama'] = NULL;
		$row['NoKolom'] = NULL;
		$row['NoBL'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("jo_id")) != "")
			$this->jo_id->OldValue = $this->getKey("jo_id"); // jo_id
		else
			$validKey = FALSE;
		if (strval($this->getKey("mts_id")) != "")
			$this->mts_id->OldValue = $this->getKey("mts_id"); // mts_id
		else
			$validKey = FALSE;
		if (strval($this->getKey("jns_id")) != "")
			$this->jns_id->OldValue = $this->getKey("jns_id"); // jns_id
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
		$this->ViewUrl = $this->getViewUrl();
		$this->EditUrl = $this->getEditUrl();
		$this->InlineEditUrl = $this->getInlineEditUrl();
		$this->CopyUrl = $this->getCopyUrl();
		$this->InlineCopyUrl = $this->getInlineCopyUrl();
		$this->DeleteUrl = $this->getDeleteUrl();

		// Convert decimal values if posted back
		if ($this->Tagihan->FormValue == $this->Tagihan->CurrentValue && is_numeric(ConvertToFloatString($this->Tagihan->CurrentValue)))
			$this->Tagihan->CurrentValue = ConvertToFloatString($this->Tagihan->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Masuk->FormValue == $this->Masuk->CurrentValue && is_numeric(ConvertToFloatString($this->Masuk->CurrentValue)))
			$this->Masuk->CurrentValue = ConvertToFloatString($this->Masuk->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Keluar->FormValue == $this->Keluar->CurrentValue && is_numeric(ConvertToFloatString($this->Keluar->CurrentValue)))
			$this->Keluar->CurrentValue = ConvertToFloatString($this->Keluar->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// jo_id
		// NoJO
		// Tagihan
		// Shipper
		// Qty
		// Cont
		// Status
		// doc
		// Tujuan
		// Kapal
		// BM
		// mts_id
		// Tanggal
		// NoUrut
		// mts_jo_id
		// mts_jenis_id
		// Masuk
		// Keluar
		// Comment
		// jns_id
		// jns_nama
		// NoKolom
		// NoBL

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// jo_id
			$this->jo_id->ViewValue = $this->jo_id->CurrentValue;
			$this->jo_id->ViewCustomAttributes = "";

			// NoJO
			$arwrk = [];
			$arwrk[1] = $this->NoJO->CurrentValue;
			$this->NoJO->ViewValue = $this->NoJO->displayValue($arwrk);
			$this->NoJO->ViewCustomAttributes = "";

			// Tagihan
			$this->Tagihan->ViewValue = $this->Tagihan->CurrentValue;
			$this->Tagihan->ViewValue = FormatNumber($this->Tagihan->ViewValue, 2, -2, -2, -2);
			$this->Tagihan->ViewCustomAttributes = "";

			// Shipper
			$this->Shipper->ViewValue = $this->Shipper->CurrentValue;
			$this->Shipper->ViewCustomAttributes = "";

			// Qty
			$this->Qty->ViewValue = $this->Qty->CurrentValue;
			$this->Qty->ViewCustomAttributes = "";

			// Cont
			$this->Cont->ViewValue = $this->Cont->CurrentValue;
			$this->Cont->ViewCustomAttributes = "";

			// Status
			$this->Status->ViewValue = $this->Status->CurrentValue;
			$this->Status->ViewValue = FormatNumber($this->Status->ViewValue, 0, -2, -2, -2);
			$this->Status->ViewCustomAttributes = "";

			// doc
			$this->doc->ViewValue = $this->doc->CurrentValue;
			$this->doc->ViewCustomAttributes = "";

			// Tujuan
			$this->Tujuan->ViewValue = $this->Tujuan->CurrentValue;
			$this->Tujuan->ViewCustomAttributes = "";

			// Kapal
			$this->Kapal->ViewValue = $this->Kapal->CurrentValue;
			$this->Kapal->ViewCustomAttributes = "";

			// BM
			if (strval($this->BM->CurrentValue) != "") {
				$this->BM->ViewValue = $this->BM->optionCaption($this->BM->CurrentValue);
			} else {
				$this->BM->ViewValue = NULL;
			}
			$this->BM->ViewCustomAttributes = "";

			// mts_id
			$this->mts_id->ViewValue = $this->mts_id->CurrentValue;
			$this->mts_id->ViewCustomAttributes = "";

			// Tanggal
			$this->Tanggal->ViewValue = $this->Tanggal->CurrentValue;
			$this->Tanggal->ViewValue = FormatDateTime($this->Tanggal->ViewValue, 0);
			$this->Tanggal->ViewCustomAttributes = "";

			// NoUrut
			$this->NoUrut->ViewValue = $this->NoUrut->CurrentValue;
			$this->NoUrut->ViewValue = FormatNumber($this->NoUrut->ViewValue, 0, -2, -2, -2);
			$this->NoUrut->ViewCustomAttributes = "";

			// mts_jo_id
			$this->mts_jo_id->ViewValue = $this->mts_jo_id->CurrentValue;
			$this->mts_jo_id->ViewValue = FormatNumber($this->mts_jo_id->ViewValue, 0, -2, -2, -2);
			$this->mts_jo_id->ViewCustomAttributes = "";

			// mts_jenis_id
			$this->mts_jenis_id->ViewValue = $this->mts_jenis_id->CurrentValue;
			$this->mts_jenis_id->ViewValue = FormatNumber($this->mts_jenis_id->ViewValue, 0, -2, -2, -2);
			$this->mts_jenis_id->ViewCustomAttributes = "";

			// Masuk
			$this->Masuk->ViewValue = $this->Masuk->CurrentValue;
			$this->Masuk->ViewValue = FormatNumber($this->Masuk->ViewValue, 2, -2, -2, -2);
			$this->Masuk->ViewCustomAttributes = "";

			// Keluar
			$this->Keluar->ViewValue = $this->Keluar->CurrentValue;
			$this->Keluar->ViewValue = FormatNumber($this->Keluar->ViewValue, 2, -2, -2, -2);
			$this->Keluar->ViewCustomAttributes = "";

			// jns_id
			$this->jns_id->ViewValue = $this->jns_id->CurrentValue;
			$this->jns_id->ViewCustomAttributes = "";

			// NoKolom
			$this->NoKolom->ViewValue = $this->NoKolom->CurrentValue;
			$this->NoKolom->ViewValue = FormatNumber($this->NoKolom->ViewValue, 0, -2, -2, -2);
			$this->NoKolom->ViewCustomAttributes = "";

			// NoBL
			$this->NoBL->ViewValue = $this->NoBL->CurrentValue;
			$this->NoBL->ViewCustomAttributes = "";

			// jo_id
			$this->jo_id->LinkCustomAttributes = "";
			$this->jo_id->HrefValue = "";
			$this->jo_id->TooltipValue = "";

			// NoJO
			$this->NoJO->LinkCustomAttributes = "";
			$this->NoJO->HrefValue = "";
			$this->NoJO->TooltipValue = "";

			// Tagihan
			$this->Tagihan->LinkCustomAttributes = "";
			$this->Tagihan->HrefValue = "";
			$this->Tagihan->TooltipValue = "";

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

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";
			$this->Status->TooltipValue = "";

			// doc
			$this->doc->LinkCustomAttributes = "";
			$this->doc->HrefValue = "";
			$this->doc->TooltipValue = "";

			// Tujuan
			$this->Tujuan->LinkCustomAttributes = "";
			$this->Tujuan->HrefValue = "";
			$this->Tujuan->TooltipValue = "";

			// Kapal
			$this->Kapal->LinkCustomAttributes = "";
			$this->Kapal->HrefValue = "";
			$this->Kapal->TooltipValue = "";

			// BM
			$this->BM->LinkCustomAttributes = "";
			$this->BM->HrefValue = "";
			$this->BM->TooltipValue = "";

			// mts_id
			$this->mts_id->LinkCustomAttributes = "";
			$this->mts_id->HrefValue = "";
			$this->mts_id->TooltipValue = "";

			// Tanggal
			$this->Tanggal->LinkCustomAttributes = "";
			$this->Tanggal->HrefValue = "";
			$this->Tanggal->TooltipValue = "";

			// NoUrut
			$this->NoUrut->LinkCustomAttributes = "";
			$this->NoUrut->HrefValue = "";
			$this->NoUrut->TooltipValue = "";

			// mts_jo_id
			$this->mts_jo_id->LinkCustomAttributes = "";
			$this->mts_jo_id->HrefValue = "";
			$this->mts_jo_id->TooltipValue = "";

			// mts_jenis_id
			$this->mts_jenis_id->LinkCustomAttributes = "";
			$this->mts_jenis_id->HrefValue = "";
			$this->mts_jenis_id->TooltipValue = "";

			// Masuk
			$this->Masuk->LinkCustomAttributes = "";
			$this->Masuk->HrefValue = "";
			$this->Masuk->TooltipValue = "";

			// Keluar
			$this->Keluar->LinkCustomAttributes = "";
			$this->Keluar->HrefValue = "";
			$this->Keluar->TooltipValue = "";

			// jns_id
			$this->jns_id->LinkCustomAttributes = "";
			$this->jns_id->HrefValue = "";
			$this->jns_id->TooltipValue = "";

			// NoKolom
			$this->NoKolom->LinkCustomAttributes = "";
			$this->NoKolom->HrefValue = "";
			$this->NoKolom->TooltipValue = "";

			// NoBL
			$this->NoBL->LinkCustomAttributes = "";
			$this->NoBL->HrefValue = "";
			$this->NoBL->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// jo_id
			$this->jo_id->EditAttrs["class"] = "form-control";
			$this->jo_id->EditCustomAttributes = "";
			$this->jo_id->EditValue = HtmlEncode($this->jo_id->AdvancedSearch->SearchValue);
			$this->jo_id->PlaceHolder = RemoveHtml($this->jo_id->caption());

			// NoJO
			$this->NoJO->EditCustomAttributes = "";
			$curVal = trim(strval($this->NoJO->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->NoJO->AdvancedSearch->ViewValue = $this->NoJO->lookupCacheOption($curVal);
			else
				$this->NoJO->AdvancedSearch->ViewValue = $this->NoJO->Lookup !== NULL && is_array($this->NoJO->Lookup->Options) ? $curVal : NULL;
			if ($this->NoJO->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->NoJO->EditValue = array_values($this->NoJO->Lookup->Options);
				if ($this->NoJO->AdvancedSearch->ViewValue == "")
					$this->NoJO->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NoJO`" . SearchString("=", $this->NoJO->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->NoJO->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->NoJO->AdvancedSearch->ViewValue = $this->NoJO->displayValue($arwrk);
				} else {
					$this->NoJO->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->NoJO->EditValue = $arwrk;
			}

			// Tagihan
			$this->Tagihan->EditAttrs["class"] = "form-control";
			$this->Tagihan->EditCustomAttributes = "";
			$this->Tagihan->EditValue = HtmlEncode($this->Tagihan->AdvancedSearch->SearchValue);
			$this->Tagihan->PlaceHolder = RemoveHtml($this->Tagihan->caption());

			// Shipper
			$this->Shipper->EditAttrs["class"] = "form-control";
			$this->Shipper->EditCustomAttributes = "";
			if (!$this->Shipper->Raw)
				$this->Shipper->AdvancedSearch->SearchValue = HtmlDecode($this->Shipper->AdvancedSearch->SearchValue);
			$this->Shipper->EditValue = HtmlEncode($this->Shipper->AdvancedSearch->SearchValue);
			$this->Shipper->PlaceHolder = RemoveHtml($this->Shipper->caption());

			// Qty
			$this->Qty->EditAttrs["class"] = "form-control";
			$this->Qty->EditCustomAttributes = "";
			if (!$this->Qty->Raw)
				$this->Qty->AdvancedSearch->SearchValue = HtmlDecode($this->Qty->AdvancedSearch->SearchValue);
			$this->Qty->EditValue = HtmlEncode($this->Qty->AdvancedSearch->SearchValue);
			$this->Qty->PlaceHolder = RemoveHtml($this->Qty->caption());

			// Cont
			$this->Cont->EditAttrs["class"] = "form-control";
			$this->Cont->EditCustomAttributes = "";
			if (!$this->Cont->Raw)
				$this->Cont->AdvancedSearch->SearchValue = HtmlDecode($this->Cont->AdvancedSearch->SearchValue);
			$this->Cont->EditValue = HtmlEncode($this->Cont->AdvancedSearch->SearchValue);
			$this->Cont->PlaceHolder = RemoveHtml($this->Cont->caption());

			// Status
			$this->Status->EditAttrs["class"] = "form-control";
			$this->Status->EditCustomAttributes = "";
			$this->Status->EditValue = HtmlEncode($this->Status->AdvancedSearch->SearchValue);
			$this->Status->PlaceHolder = RemoveHtml($this->Status->caption());

			// doc
			$this->doc->EditAttrs["class"] = "form-control";
			$this->doc->EditCustomAttributes = "";
			if (!$this->doc->Raw)
				$this->doc->AdvancedSearch->SearchValue = HtmlDecode($this->doc->AdvancedSearch->SearchValue);
			$this->doc->EditValue = HtmlEncode($this->doc->AdvancedSearch->SearchValue);
			$this->doc->PlaceHolder = RemoveHtml($this->doc->caption());

			// Tujuan
			$this->Tujuan->EditAttrs["class"] = "form-control";
			$this->Tujuan->EditCustomAttributes = "";
			if (!$this->Tujuan->Raw)
				$this->Tujuan->AdvancedSearch->SearchValue = HtmlDecode($this->Tujuan->AdvancedSearch->SearchValue);
			$this->Tujuan->EditValue = HtmlEncode($this->Tujuan->AdvancedSearch->SearchValue);
			$this->Tujuan->PlaceHolder = RemoveHtml($this->Tujuan->caption());

			// Kapal
			$this->Kapal->EditAttrs["class"] = "form-control";
			$this->Kapal->EditCustomAttributes = "";
			if (!$this->Kapal->Raw)
				$this->Kapal->AdvancedSearch->SearchValue = HtmlDecode($this->Kapal->AdvancedSearch->SearchValue);
			$this->Kapal->EditValue = HtmlEncode($this->Kapal->AdvancedSearch->SearchValue);
			$this->Kapal->PlaceHolder = RemoveHtml($this->Kapal->caption());

			// BM
			$this->BM->EditCustomAttributes = "";
			$this->BM->EditValue = $this->BM->options(FALSE);

			// mts_id
			$this->mts_id->EditAttrs["class"] = "form-control";
			$this->mts_id->EditCustomAttributes = "";
			$this->mts_id->EditValue = HtmlEncode($this->mts_id->AdvancedSearch->SearchValue);
			$this->mts_id->PlaceHolder = RemoveHtml($this->mts_id->caption());

			// Tanggal
			$this->Tanggal->EditAttrs["class"] = "form-control";
			$this->Tanggal->EditCustomAttributes = "";
			$this->Tanggal->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->Tanggal->AdvancedSearch->SearchValue, 0), 8));
			$this->Tanggal->PlaceHolder = RemoveHtml($this->Tanggal->caption());

			// NoUrut
			$this->NoUrut->EditAttrs["class"] = "form-control";
			$this->NoUrut->EditCustomAttributes = "";
			$this->NoUrut->EditValue = HtmlEncode($this->NoUrut->AdvancedSearch->SearchValue);
			$this->NoUrut->PlaceHolder = RemoveHtml($this->NoUrut->caption());

			// mts_jo_id
			$this->mts_jo_id->EditAttrs["class"] = "form-control";
			$this->mts_jo_id->EditCustomAttributes = "";
			$this->mts_jo_id->EditValue = HtmlEncode($this->mts_jo_id->AdvancedSearch->SearchValue);
			$this->mts_jo_id->PlaceHolder = RemoveHtml($this->mts_jo_id->caption());

			// mts_jenis_id
			$this->mts_jenis_id->EditAttrs["class"] = "form-control";
			$this->mts_jenis_id->EditCustomAttributes = "";
			$this->mts_jenis_id->EditValue = HtmlEncode($this->mts_jenis_id->AdvancedSearch->SearchValue);
			$this->mts_jenis_id->PlaceHolder = RemoveHtml($this->mts_jenis_id->caption());

			// Masuk
			$this->Masuk->EditAttrs["class"] = "form-control";
			$this->Masuk->EditCustomAttributes = "";
			$this->Masuk->EditValue = HtmlEncode($this->Masuk->AdvancedSearch->SearchValue);
			$this->Masuk->PlaceHolder = RemoveHtml($this->Masuk->caption());

			// Keluar
			$this->Keluar->EditAttrs["class"] = "form-control";
			$this->Keluar->EditCustomAttributes = "";
			$this->Keluar->EditValue = HtmlEncode($this->Keluar->AdvancedSearch->SearchValue);
			$this->Keluar->PlaceHolder = RemoveHtml($this->Keluar->caption());

			// jns_id
			$this->jns_id->EditAttrs["class"] = "form-control";
			$this->jns_id->EditCustomAttributes = "";
			$this->jns_id->EditValue = HtmlEncode($this->jns_id->AdvancedSearch->SearchValue);
			$this->jns_id->PlaceHolder = RemoveHtml($this->jns_id->caption());

			// NoKolom
			$this->NoKolom->EditAttrs["class"] = "form-control";
			$this->NoKolom->EditCustomAttributes = "";
			$this->NoKolom->EditValue = HtmlEncode($this->NoKolom->AdvancedSearch->SearchValue);
			$this->NoKolom->PlaceHolder = RemoveHtml($this->NoKolom->caption());

			// NoBL
			$this->NoBL->EditAttrs["class"] = "form-control";
			$this->NoBL->EditCustomAttributes = "";
			if (!$this->NoBL->Raw)
				$this->NoBL->AdvancedSearch->SearchValue = HtmlDecode($this->NoBL->AdvancedSearch->SearchValue);
			$this->NoBL->EditValue = HtmlEncode($this->NoBL->AdvancedSearch->SearchValue);
			$this->NoBL->PlaceHolder = RemoveHtml($this->NoBL->caption());
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate search
	protected function validateSearch()
	{
		global $SearchError;

		// Initialize
		$SearchError = "";

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return TRUE;

		// Return validate result
		$validateSearch = ($SearchError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateSearch = $validateSearch && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError != "") {
			AddMessage($SearchError, $formCustomError);
		}
		return $validateSearch;
	}

	// Load advanced search
	public function loadAdvancedSearch()
	{
		$this->jo_id->AdvancedSearch->load();
		$this->NoJO->AdvancedSearch->load();
		$this->Tagihan->AdvancedSearch->load();
		$this->Shipper->AdvancedSearch->load();
		$this->Qty->AdvancedSearch->load();
		$this->Cont->AdvancedSearch->load();
		$this->Status->AdvancedSearch->load();
		$this->doc->AdvancedSearch->load();
		$this->Tujuan->AdvancedSearch->load();
		$this->Kapal->AdvancedSearch->load();
		$this->BM->AdvancedSearch->load();
		$this->mts_id->AdvancedSearch->load();
		$this->Tanggal->AdvancedSearch->load();
		$this->NoUrut->AdvancedSearch->load();
		$this->mts_jo_id->AdvancedSearch->load();
		$this->mts_jenis_id->AdvancedSearch->load();
		$this->Masuk->AdvancedSearch->load();
		$this->Keluar->AdvancedSearch->load();
		$this->Comment->AdvancedSearch->load();
		$this->jns_id->AdvancedSearch->load();
		$this->jns_nama->AdvancedSearch->load();
		$this->NoKolom->AdvancedSearch->load();
		$this->NoBL->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fv203_costsheetlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fv203_costsheetlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fv203_costsheetlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
			else
				return "<a href=\"" . $this->ExportPdfUrl . "\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\">" . $Language->phrase("ExportToPDF") . "</a>";
		} elseif (SameText($type, "html")) {
			return "<a href=\"" . $this->ExportHtmlUrl . "\" class=\"ew-export-link ew-html\" title=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\">" . $Language->phrase("ExportToHtml") . "</a>";
		} elseif (SameText($type, "xml")) {
			return "<a href=\"" . $this->ExportXmlUrl . "\" class=\"ew-export-link ew-xml\" title=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\">" . $Language->phrase("ExportToXml") . "</a>";
		} elseif (SameText($type, "csv")) {
			return "<a href=\"" . $this->ExportCsvUrl . "\" class=\"ew-export-link ew-csv\" title=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\">" . $Language->phrase("ExportToCsv") . "</a>";
		} elseif (SameText($type, "email")) {
			$url = $custom ? ",url:'" . $this->pageUrl() . "export=email&amp;custom=1'" : "";
			return '<button id="emf_v203_costsheet" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_v203_costsheet\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fv203_costsheetlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
		} elseif (SameText($type, "print")) {
			return "<a href=\"" . $this->ExportPrintUrl . "\" class=\"ew-export-link ew-print\" title=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\">" . $Language->phrase("PrinterFriendly") . "</a>";
		}
	}

	// Set up export options
	protected function setupExportOptions()
	{
		global $Language;

		// Printer friendly
		$item = &$this->ExportOptions->add("print");
		$item->Body = $this->getExportTag("print");
		$item->Visible = FALSE;

		// Export to Excel
		$item = &$this->ExportOptions->add("excel");
		$item->Body = $this->getExportTag("excel");
		$item->Visible = TRUE;

		// Export to Word
		$item = &$this->ExportOptions->add("word");
		$item->Body = $this->getExportTag("word");
		$item->Visible = FALSE;

		// Export to Html
		$item = &$this->ExportOptions->add("html");
		$item->Body = $this->getExportTag("html");
		$item->Visible = FALSE;

		// Export to Xml
		$item = &$this->ExportOptions->add("xml");
		$item->Body = $this->getExportTag("xml");
		$item->Visible = FALSE;

		// Export to Csv
		$item = &$this->ExportOptions->add("csv");
		$item->Body = $this->getExportTag("csv");
		$item->Visible = FALSE;

		// Export to Pdf
		$item = &$this->ExportOptions->add("pdf");
		$item->Body = $this->getExportTag("pdf");
		$item->Visible = FALSE;

		// Export to Email
		$item = &$this->ExportOptions->add("email");
		$item->Body = $this->getExportTag("email");
		$item->Visible = FALSE;

		// Drop down button for export
		$this->ExportOptions->UseButtonGroup = TRUE;
		$this->ExportOptions->UseDropDownButton = FALSE;
		if ($this->ExportOptions->UseButtonGroup && IsMobile())
			$this->ExportOptions->UseDropDownButton = TRUE;
		$this->ExportOptions->DropDownButtonPhrase = $Language->phrase("ButtonExport");

		// Add group option item
		$item = &$this->ExportOptions->add($this->ExportOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
	}

	// Set up search options
	protected function setupSearchOptions()
	{
		global $Language;
		$this->SearchOptions = new ListOptions("div");
		$this->SearchOptions->TagClassName = "ew-search-option";

		// Search button
		$item = &$this->SearchOptions->add("searchtoggle");
		$searchToggleClass = ($this->SearchWhere != "") ? " active" : " active";
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fv203_costsheetlistsrch\">" . $Language->phrase("SearchLink") . "</a>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ResetSearch") . "\" data-caption=\"" . $Language->phrase("ResetSearch") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ResetSearchBtn") . "</a>";
		$item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

		// Button group for search
		$this->SearchOptions->UseDropDownButton = FALSE;
		$this->SearchOptions->UseButtonGroup = TRUE;
		$this->SearchOptions->DropDownButtonPhrase = $Language->phrase("ButtonSearch");

		// Add group option item
		$item = &$this->SearchOptions->add($this->SearchOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Hide search options
		if ($this->isExport() || $this->CurrentAction)
			$this->SearchOptions->hideAllOptions();
		global $Security;
		if (!$Security->canSearch()) {
			$this->SearchOptions->hideAllOptions();
			$this->FilterOptions->hideAllOptions();
		}
	}

	/**
	 * Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
	 *
	 * @param boolean $return Return the data rather than output it
	 * @return mixed 
	 */
	public function exportData($return = FALSE)
	{
		global $Language;
		$utf8 = SameText(Config("PROJECT_CHARSET"), "utf-8");
		$selectLimit = $this->UseSelectLimit;

		// Load recordset
		if ($selectLimit) {
			$this->TotalRecords = $this->listRecordCount();
		} else {
			if (!$this->Recordset)
				$this->Recordset = $this->loadRecordset();
			$rs = &$this->Recordset;
			if ($rs)
				$this->TotalRecords = $rs->RecordCount();
		}
		$this->StartRecord = 1;

		// Export all
		if ($this->ExportAll) {
			set_time_limit(Config("EXPORT_ALL_TIME_LIMIT"));
			$this->DisplayRecords = $this->TotalRecords;
			$this->StopRecord = $this->TotalRecords;
		} else { // Export one page only
			$this->setupStartRecord(); // Set up start record position

			// Set the last record to display
			if ($this->DisplayRecords <= 0) {
				$this->StopRecord = $this->TotalRecords;
			} else {
				$this->StopRecord = $this->StartRecord + $this->DisplayRecords - 1;
			}
		}
		if ($selectLimit)
			$rs = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords <= 0 ? $this->TotalRecords : $this->DisplayRecords);
		$this->ExportDoc = GetExportDocument($this, "h");
		$doc = &$this->ExportDoc;
		if (!$doc)
			$this->setFailureMessage($Language->phrase("ExportClassNotFound")); // Export class not found
		if (!$rs || !$doc) {
			RemoveHeader("Content-Type"); // Remove header
			RemoveHeader("Content-Disposition");
			$this->showMessage();
			return;
		}
		if ($selectLimit) {
			$this->StartRecord = 1;
			$this->StopRecord = $this->DisplayRecords <= 0 ? $this->TotalRecords : $this->DisplayRecords;
		}

		// Call Page Exporting server event
		$this->ExportDoc->ExportCustom = !$this->Page_Exporting();
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		$doc->Text .= $header;
		$this->exportDocument($doc, $rs, $this->StartRecord, $this->StopRecord, "");
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		$doc->Text .= $footer;

		// Close recordset
		$rs->close();

		// Call Page Exported server event
		$this->Page_Exported();

		// Export header and footer
		$doc->exportHeaderAndFooter();

		// Clean output buffer (without destroying output buffer)
		$buffer = ob_get_contents(); // Save the output buffer
		if (!Config("DEBUG") && $buffer)
			ob_clean();

		// Write debug message if enabled
		if (Config("DEBUG") && !$this->isExport("pdf"))
			echo GetDebugMessage();

		// Output data
		if ($this->isExport("email")) {

			// Export-to-email disabled
		} else {
			$doc->export();
			if ($return) {
				RemoveHeader("Content-Type"); // Remove header
				RemoveHeader("Content-Disposition");
				$content = ob_get_contents();
				if ($content)
					ob_clean();
				if ($buffer)
					echo $buffer; // Resume the output buffer
				return $content;
			}
		}
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$url = preg_replace('/\?cmd=reset(all){0,1}$/i', '', $url); // Remove cmd=reset / cmd=resetall
		$Breadcrumb->add("list", $this->TableVar, $url, "", $this->TableVar, TRUE);
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

	// ListOptions Load event
	function ListOptions_Load() {

		// Example:
		//$opt = &$this->ListOptions->Add("new");
		//$opt->Header = "xxx";
		//$opt->OnLeft = TRUE; // Link on left
		//$opt->MoveTo(0); // Move to first column

	}

	// ListOptions Rendering event
	function ListOptions_Rendering() {

		//$GLOBALS["xxx_grid"]->DetailAdd = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailEdit = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailView = (...condition...); // Set to TRUE or FALSE conditionally

	}

	// ListOptions Rendered event
	function ListOptions_Rendered() {

		// Example:
		//$this->ListOptions["new"]->Body = "xxx";

	}

	// Row Custom Action event
	function Row_CustomAction($action, $row) {

		// Return FALSE to abort
		return TRUE;
	}

	// Page Exporting event
	// $this->ExportDoc = export document object
	function Page_Exporting() {

		//$this->ExportDoc->Text = "my header"; // Export header
		//return FALSE; // Return FALSE to skip default export and use Row_Export event

		return TRUE; // Return TRUE to use default export and skip Row_Export event
	}

	// Row Export event
	// $this->ExportDoc = export document object
	function Row_Export($rs) {

		//$this->ExportDoc->Text .= "my content"; // Build HTML with field value: $rs["MyField"] or $this->MyField->ViewValue
	}

	// Page Exported event
	// $this->ExportDoc = export document object
	function Page_Exported() {

		//$this->ExportDoc->Text .= "my footer"; // Export footer
		//echo $this->ExportDoc->Text;

	}

	// Page Importing event
	function Page_Importing($reader, &$options) {

		//var_dump($reader); // Import data reader
		//var_dump($options); // Show all options for importing
		//return FALSE; // Return FALSE to skip import

		return TRUE;
	}

	// Row Import event
	function Row_Import(&$row, $cnt) {

		//echo $cnt; // Import record count
		//var_dump($row); // Import row
		//return FALSE; // Return FALSE to skip import

		return TRUE;
	}

	// Page Imported event
	function Page_Imported($reader, $results) {

		//var_dump($reader); // Import data reader
		//var_dump($results); // Import results

	}
} // End class
?>