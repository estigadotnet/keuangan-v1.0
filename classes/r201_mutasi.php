<?php namespace PHPMaker2020\p_keuangan_v1_0; ?>
<?php

/**
 * Table class for r201_mutasi
 */
class r201_mutasi extends ReportTable
{
	protected $SqlFrom = "";
	protected $SqlSelect = "";
	protected $SqlSelectList = "";
	protected $SqlWhere = "";
	protected $SqlGroupBy = "";
	protected $SqlHaving = "";
	protected $SqlOrderBy = "";
	public $UseSessionForListSql = TRUE;

	// Column CSS classes
	public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
	public $RightColumnClass = "col-sm-10";
	public $OffsetColumnClass = "col-sm-10 offset-sm-2";
	public $TableLeftColumnClass = "w-col-2";
	public $ShowGroupHeaderAsRow = FALSE;
	public $ShowCompactSummaryFooter = TRUE;

	// Export
	public $ExportDoc;

	// Fields
	public $mutasi_id;
	public $tanggal;
	public $nourut;
	public $jo_id;
	public $jenis_id;
	public $comment;
	public $masuk;
	public $keluar;
	public $selisih;
	public $mutasi;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'r201_mutasi';
		$this->TableName = 'r201_mutasi';
		$this->TableType = 'REPORT';

		// Update Table
		$this->UpdateTable = "v201_mutasi tx CROSS JOIN (SELECT @mutasi := 0) sx";
		$this->ReportSourceTable = 'c201_mutasi'; // Report source table
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (report only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->UserIDAllowSecurity = 0; // User ID Allow

		// mutasi_id
		$this->mutasi_id = new ReportField('r201_mutasi', 'r201_mutasi', 'x_mutasi_id', 'mutasi_id', 'tx.mutasi_id', 'tx.mutasi_id', 3, 11, -1, FALSE, 'tx.mutasi_id', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mutasi_id->Nullable = FALSE; // NOT NULL field
		$this->mutasi_id->Required = TRUE; // Required field
		$this->mutasi_id->Sortable = TRUE; // Allow sort
		$this->mutasi_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->mutasi_id->SourceTableVar = 'c201_mutasi';
		$this->fields['mutasi_id'] = &$this->mutasi_id;

		// tanggal
		$this->tanggal = new ReportField('r201_mutasi', 'r201_mutasi', 'x_tanggal', 'tanggal', 'tx.tanggal', CastDateFieldForLike("tx.tanggal", 7, "DB"), 133, 10, 7, FALSE, 'tx.tanggal', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tanggal->Nullable = FALSE; // NOT NULL field
		$this->tanggal->Required = TRUE; // Required field
		$this->tanggal->Sortable = TRUE; // Allow sort
		$this->tanggal->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->tanggal->SourceTableVar = 'c201_mutasi';
		$this->fields['tanggal'] = &$this->tanggal;

		// nourut
		$this->nourut = new ReportField('r201_mutasi', 'r201_mutasi', 'x_nourut', 'nourut', 'tx.nourut', 'tx.nourut', 3, 4, -1, FALSE, 'tx.nourut', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nourut->Nullable = FALSE; // NOT NULL field
		$this->nourut->Required = TRUE; // Required field
		$this->nourut->Sortable = TRUE; // Allow sort
		$this->nourut->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->nourut->SourceTableVar = 'c201_mutasi';
		$this->fields['nourut'] = &$this->nourut;

		// jo_id
		$this->jo_id = new ReportField('r201_mutasi', 'r201_mutasi', 'x_jo_id', 'jo_id', 'tx.jo_id', 'tx.jo_id', 3, 11, -1, FALSE, 'tx.jo_id', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->jo_id->Nullable = FALSE; // NOT NULL field
		$this->jo_id->Sortable = TRUE; // Allow sort
		$this->jo_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->jo_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->jo_id->Lookup = new Lookup('jo_id', 't001_jo', FALSE, 'id', ["NoJO","","",""], [], [], [], [], [], [], '`NoJO` DESC', '');
		$this->jo_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->jo_id->AdvancedSearch->SearchValueDefault = INIT_VALUE;
		$this->jo_id->SourceTableVar = 'c201_mutasi';
		$this->fields['jo_id'] = &$this->jo_id;

		// jenis_id
		$this->jenis_id = new ReportField('r201_mutasi', 'r201_mutasi', 'x_jenis_id', 'jenis_id', 'tx.jenis_id', 'tx.jenis_id', 3, 11, -1, FALSE, 'tx.jenis_id', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->jenis_id->Nullable = FALSE; // NOT NULL field
		$this->jenis_id->Sortable = TRUE; // Allow sort
		$this->jenis_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->jenis_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->jenis_id->Lookup = new Lookup('jenis_id', 't002_jenis', FALSE, 'id', ["Nama","","",""], [], [], [], [], [], [], '`NoKolom` ASC', '');
		$this->jenis_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->jenis_id->AdvancedSearch->SearchValueDefault = INIT_VALUE;
		$this->jenis_id->SourceTableVar = 'c201_mutasi';
		$this->fields['jenis_id'] = &$this->jenis_id;

		// comment
		$this->comment = new ReportField('r201_mutasi', 'r201_mutasi', 'x_comment', 'comment', 'tx.comment', 'tx.comment', 201, 16777215, -1, FALSE, 'tx.comment', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->comment->Sortable = TRUE; // Allow sort
		$this->comment->SourceTableVar = 'c201_mutasi';
		$this->fields['comment'] = &$this->comment;

		// masuk
		$this->masuk = new ReportField('r201_mutasi', 'r201_mutasi', 'x_masuk', 'masuk', 'tx.masuk', 'tx.masuk', 5, 14, -1, FALSE, 'tx.masuk', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->masuk->Nullable = FALSE; // NOT NULL field
		$this->masuk->Required = TRUE; // Required field
		$this->masuk->Sortable = TRUE; // Allow sort
		$this->masuk->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->masuk->SourceTableVar = 'c201_mutasi';
		$this->fields['masuk'] = &$this->masuk;

		// keluar
		$this->keluar = new ReportField('r201_mutasi', 'r201_mutasi', 'x_keluar', 'keluar', 'tx.keluar', 'tx.keluar', 5, 14, -1, FALSE, 'tx.keluar', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->keluar->Nullable = FALSE; // NOT NULL field
		$this->keluar->Required = TRUE; // Required field
		$this->keluar->Sortable = TRUE; // Allow sort
		$this->keluar->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->keluar->SourceTableVar = 'c201_mutasi';
		$this->fields['keluar'] = &$this->keluar;

		// selisih
		$this->selisih = new ReportField('r201_mutasi', 'r201_mutasi', 'x_selisih', 'selisih', 'tx.selisih', 'tx.selisih', 5, 19, -1, FALSE, 'tx.selisih', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->selisih->Nullable = FALSE; // NOT NULL field
		$this->selisih->Required = TRUE; // Required field
		$this->selisih->Sortable = TRUE; // Allow sort
		$this->selisih->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->selisih->SourceTableVar = 'c201_mutasi';
		$this->fields['selisih'] = &$this->selisih;

		// mutasi
		$this->mutasi = new ReportField('r201_mutasi', 'r201_mutasi', 'x_mutasi', 'mutasi', '@mutasi := @mutasi + tx.selisih', '@mutasi := @mutasi + tx.selisih', 5, 69, -1, FALSE, '@mutasi := @mutasi + tx.selisih', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mutasi->Sortable = TRUE; // Allow sort
		$this->mutasi->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->mutasi->SourceTableVar = 'c201_mutasi';
		$this->fields['mutasi'] = &$this->mutasi;
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Multiple column sort
	protected function updateSort(&$fld, $ctrl)
	{
		if ($this->CurrentOrder == $fld->Name) {
			$sortField = $fld->Expression;
			$lastSort = $fld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$thisSort = $this->CurrentOrderType;
			} else {
				$thisSort = ($lastSort == "ASC") ? "DESC" : "ASC";
			}
			$fld->setSort($thisSort);
			if ($fld->GroupingFieldId == 0) {
				if ($ctrl) {
					$orderBy = $this->getDetailOrderBy();
					if (strpos($orderBy, $sortField . " " . $lastSort) !== FALSE) {
						$orderBy = str_replace($sortField . " " . $lastSort, $sortField . " " . $thisSort, $orderBy);
					} else {
						if ($orderBy != "") $orderBy .= ", ";
						$orderBy .= $sortField . " " . $thisSort;
					}
					$this->setDetailOrderBy($orderBy); // Save to Session
				} else {
					$this->setDetailOrderBy($sortField . " " . $thisSort); // Save to Session
				}
			}
		} else {
			if ($fld->GroupingFieldId == 0 && !$ctrl) $fld->setSort("");
		}
	}

	// Get Sort SQL
	protected function sortSql()
	{
		$dtlSortSql = $this->getDetailOrderBy(); // Get ORDER BY for detail fields from session
		$argrps = [];
		foreach ($this->fields as $fld) {
			if ($fld->getSort() != "") {
				$fldsql = $fld->Expression;
				if ($fld->GroupingFieldId > 0) {
					if ($fld->GroupSql != "")
						$argrps[$fld->GroupingFieldId] = str_replace("%s", $fldsql, $fld->GroupSql) . " " . $fld->getSort();
					else
						$argrps[$fld->GroupingFieldId] = $fldsql . " " . $fld->getSort();
				}
			}
		}
		$sortSql = "";
		foreach ($argrps as $grp) {
			if ($sortSql != "") $sortSql .= ", ";
			$sortSql .= $grp;
		}
		if ($dtlSortSql != "") {
			if ($sortSql != "") $sortSql .= ", ";
			$sortSql .= $dtlSortSql;
		}
		return $sortSql;
	}

	// Summary properties
	private $_sqlSelectAggregate = "";
	private $_sqlAggregatePrefix = "";
	private $_sqlAggregateSuffix = "";
	private $_sqlSelectCount = "";

	// Select Aggregate
	public function getSqlSelectAggregate()
	{
		return ($this->_sqlSelectAggregate != "") ? $this->_sqlSelectAggregate : "SELECT SUM(tx.masuk) AS `sum_masuk`, SUM(tx.keluar) AS `sum_keluar`, SUM(tx.selisih) AS `sum_selisih` FROM " . $this->getSqlFrom();
	}
	public function setSqlSelectAggregate($v)
	{
		$this->_sqlSelectAggregate = $v;
	}

	// Aggregate Prefix
	public function getSqlAggregatePrefix()
	{
		return ($this->_sqlAggregatePrefix != "") ? $this->_sqlAggregatePrefix : "";
	}
	public function setSqlAggregatePrefix($v)
	{
		$this->_sqlAggregatePrefix = $v;
	}

	// Aggregate Suffix
	public function getSqlAggregateSuffix()
	{
		return ($this->_sqlAggregateSuffix != "") ? $this->_sqlAggregateSuffix : "";
	}
	public function setSqlAggregateSuffix($v)
	{
		$this->_sqlAggregateSuffix = $v;
	}

	// Select Count
	public function getSqlSelectCount()
	{
		return ($this->_sqlSelectCount != "") ? $this->_sqlSelectCount : "SELECT COUNT(*) FROM " . $this->getSqlFrom();
	}
	public function setSqlSelectCount($v)
	{
		$this->_sqlSelectCount = $v;
	}

	// Render for lookup
	public function renderLookup()
	{
		$this->tanggal->ViewValue = FormatDateTime($this->tanggal->CurrentValue, 7);
		$this->jo_id->ViewValue = GetDropDownDisplayValue($this->jo_id->CurrentValue, "", 0);
		$this->jenis_id->ViewValue = GetDropDownDisplayValue($this->jenis_id->CurrentValue, "", 0);
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "v201_mutasi tx CROSS JOIN (SELECT @mutasi := 0) sx";
	}
	public function sqlFrom() // For backward compatibility
	{
		return $this->getSqlFrom();
	}
	public function setSqlFrom($v)
	{
		$this->SqlFrom = $v;
	}
	public function getSqlSelect() // Select
	{
		if ($this->SqlSelect != "")
			return $this->SqlSelect;
		$select = "tx.mutasi_id, tx.tanggal, tx.nourut, tx.jo_id, tx.jenis_id, tx.masuk, tx.keluar, tx.selisih, @mutasi := @mutasi + tx.selisih AS mutasi, tx.comment";
		return "SELECT " . $select . " FROM " . $this->getSqlFrom();
	}
	public function sqlSelect() // For backward compatibility
	{
		return $this->getSqlSelect();
	}
	public function setSqlSelect($v)
	{
		$this->SqlSelect = $v;
	}
	public function getSqlWhere() // Where
	{
		$where = ($this->SqlWhere != "") ? $this->SqlWhere : "1 = 1";
		$this->TableFilter = "";
		AddFilter($where, $this->TableFilter);
		return $where;
	}
	public function sqlWhere() // For backward compatibility
	{
		return $this->getSqlWhere();
	}
	public function setSqlWhere($v)
	{
		$this->SqlWhere = $v;
	}
	public function getSqlGroupBy() // Group By
	{
		return ($this->SqlGroupBy != "") ? $this->SqlGroupBy : "";
	}
	public function sqlGroupBy() // For backward compatibility
	{
		return $this->getSqlGroupBy();
	}
	public function setSqlGroupBy($v)
	{
		$this->SqlGroupBy = $v;
	}
	public function getSqlHaving() // Having
	{
		return ($this->SqlHaving != "") ? $this->SqlHaving : "";
	}
	public function sqlHaving() // For backward compatibility
	{
		return $this->getSqlHaving();
	}
	public function setSqlHaving($v)
	{
		$this->SqlHaving = $v;
	}
	public function getSqlOrderBy() // Order By
	{
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "tx.tanggal ASC,tx.nourut ASC, tx.tanggal, tx.nourut";
	}
	public function sqlOrderBy() // For backward compatibility
	{
		return $this->getSqlOrderBy();
	}
	public function setSqlOrderBy($v)
	{
		$this->SqlOrderBy = $v;
	}

	// Apply User ID filters
	public function applyUserIDFilters($filter)
	{
		return $filter;
	}

	// Check if User ID security allows view all
	public function userIDAllow($id = "")
	{
		$allow = Config("USER_ID_ALLOW");
		switch ($id) {
			case "add":
			case "copy":
			case "gridadd":
			case "register":
			case "addopt":
				return (($allow & 1) == 1);
			case "edit":
			case "gridedit":
			case "update":
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get recordset
	public function getRecordset($sql, $rowcnt = -1, $offset = -1)
	{
		$conn = $this->getConnection();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->selectLimit($sql, $rowcnt, $offset);
		$conn->raiseErrorFn = "";
		return $rs;
	}

	// Get record count
	public function getRecordCount($sql, $c = NULL)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) &&
			!preg_match('/^\s*select\s+distinct\s+/i', $sql) && !preg_match('/\s+order\s+by\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = $c ?: $this->getConnection();
		if ($rs = $conn->execute($sqlwrk)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->close();
			}
			return (int)$cnt;
		}

		// Unable to get count, get record count directly
		if ($rs = $conn->execute($sql)) {
			$cnt = $rs->RecordCount();
			$rs->close();
			return (int)$cnt;
		}
		return $cnt;
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		return $keyFilter;
	}

	// Return page URL
	public function getReturnUrl()
	{
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] != "") {
			return $_SESSION[$name];
		} else {
			return "";
		}
	}
	public function setReturnUrl($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL")] = $v;
	}

	// Get modal caption
	public function getModalCaption($pageName)
	{
		global $Language;
		if ($pageName == "")
			return $Language->phrase("View");
		elseif ($pageName == "")
			return $Language->phrase("Edit");
		elseif ($pageName == "")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "?" . $this->getUrlParm($parm);
		else
			$url = "";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline edit URL
	public function getInlineEditUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
		return $this->addMasterUrl($url);
	}

	// Copy URL
	public function getCopyUrl($parm = "")
	{
		$url = $this->keyUrl("", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline copy URL
	public function getInlineCopyUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
		return $this->addMasterUrl($url);
	}

	// Delete URL
	public function getDeleteUrl()
	{
		return $this->keyUrl("", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json = "{" . $json . "}";
		if ($htmlEncode)
			$json = HtmlEncode($json);
		return $json;
	}

	// Add key value to URL
	public function keyUrl($url, $parm = "")
	{
		$url = $url . "?";
		if ($parm != "")
			$url .= $parm . "&";
		return $url;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		global $DashboardReport;
		if ($this->CurrentAction || $this->isExport() ||
			$this->DrillDown || $DashboardReport ||
			in_array($fld->Type, [128, 204, 205])) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->reverseSort());
			return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
		} else {
			return "";
		}
	}

	// Get record keys from Post/Get/Session
	public function getRecordKeys()
	{
		$arKeys = [];
		$arKey = [];
		if (Param("key_m") !== NULL) {
			$arKeys = Param("key_m");
			$cnt = count($arKeys);
		} else {

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = [];
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				$ar[] = $key;
			}
		}
		return $ar;
	}

	// Get filter from record keys
	public function getFilterFromRecordKeys($setCurrent = TRUE)
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter != "") $keyFilter .= " OR ";
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = $this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0)
	{

		// No binary fields
		return FALSE;
	}

	// Email Sending event
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
		// Enter your code here

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>