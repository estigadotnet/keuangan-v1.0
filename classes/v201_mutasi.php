<?php namespace PHPMaker2020\p_keuangan_v1_0; ?>
<?php

/**
 * Table class for v201_mutasi
 */
class v201_mutasi extends DbTable
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

	// Export
	public $ExportDoc;

	// Fields
	public $jo_id;
	public $jenis_id;
	public $keluar;
	public $mutasi_id;
	public $tanggal;
	public $nourut;
	public $masuk;
	public $selisih;
	public $comment;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'v201_mutasi';
		$this->TableName = 'v201_mutasi';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`v201_mutasi`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 25;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// jo_id
		$this->jo_id = new DbField('v201_mutasi', 'v201_mutasi', 'x_jo_id', 'jo_id', '`jo_id`', '`jo_id`', 3, 11, -1, FALSE, '`jo_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->jo_id->Nullable = FALSE; // NOT NULL field
		$this->jo_id->Sortable = TRUE; // Allow sort
		$this->jo_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->jo_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->jo_id->Lookup = new Lookup('jo_id', 't001_jo', FALSE, 'id', ["NoJO","","",""], [], [], [], [], [], [], '', '');
		$this->jo_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['jo_id'] = &$this->jo_id;

		// jenis_id
		$this->jenis_id = new DbField('v201_mutasi', 'v201_mutasi', 'x_jenis_id', 'jenis_id', '`jenis_id`', '`jenis_id`', 3, 11, -1, FALSE, '`jenis_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->jenis_id->Nullable = FALSE; // NOT NULL field
		$this->jenis_id->Sortable = TRUE; // Allow sort
		$this->jenis_id->Lookup = new Lookup('jenis_id', 't002_jenis', FALSE, 'id', ["Nama","","",""], [], [], [], [], [], [], '', '');
		$this->jenis_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['jenis_id'] = &$this->jenis_id;

		// keluar
		$this->keluar = new DbField('v201_mutasi', 'v201_mutasi', 'x_keluar', 'keluar', '`keluar`', '`keluar`', 5, 14, -1, FALSE, '`keluar`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->keluar->Nullable = FALSE; // NOT NULL field
		$this->keluar->Sortable = TRUE; // Allow sort
		$this->keluar->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['keluar'] = &$this->keluar;

		// mutasi_id
		$this->mutasi_id = new DbField('v201_mutasi', 'v201_mutasi', 'x_mutasi_id', 'mutasi_id', '`mutasi_id`', '`mutasi_id`', 3, 11, -1, FALSE, '`mutasi_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mutasi_id->Nullable = FALSE; // NOT NULL field
		$this->mutasi_id->Sortable = TRUE; // Allow sort
		$this->mutasi_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['mutasi_id'] = &$this->mutasi_id;

		// tanggal
		$this->tanggal = new DbField('v201_mutasi', 'v201_mutasi', 'x_tanggal', 'tanggal', '`tanggal`', CastDateFieldForLike("`tanggal`", 0, "DB"), 133, 10, 0, FALSE, '`tanggal`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tanggal->Nullable = FALSE; // NOT NULL field
		$this->tanggal->Sortable = TRUE; // Allow sort
		$this->tanggal->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['tanggal'] = &$this->tanggal;

		// nourut
		$this->nourut = new DbField('v201_mutasi', 'v201_mutasi', 'x_nourut', 'nourut', '`nourut`', '`nourut`', 3, 4, -1, FALSE, '`nourut`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nourut->Nullable = FALSE; // NOT NULL field
		$this->nourut->Sortable = TRUE; // Allow sort
		$this->nourut->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['nourut'] = &$this->nourut;

		// masuk
		$this->masuk = new DbField('v201_mutasi', 'v201_mutasi', 'x_masuk', 'masuk', '`masuk`', '`masuk`', 5, 14, -1, FALSE, '`masuk`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->masuk->Nullable = FALSE; // NOT NULL field
		$this->masuk->Sortable = TRUE; // Allow sort
		$this->masuk->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['masuk'] = &$this->masuk;

		// selisih
		$this->selisih = new DbField('v201_mutasi', 'v201_mutasi', 'x_selisih', 'selisih', '`selisih`', '`selisih`', 5, 19, -1, FALSE, '`selisih`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->selisih->Nullable = FALSE; // NOT NULL field
		$this->selisih->Sortable = TRUE; // Allow sort
		$this->selisih->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['selisih'] = &$this->selisih;

		// comment
		$this->comment = new DbField('v201_mutasi', 'v201_mutasi', 'x_comment', 'comment', '`comment`', '`comment`', 201, 16777215, -1, FALSE, '`comment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->comment->Sortable = TRUE; // Allow sort
		$this->fields['comment'] = &$this->comment;
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
	function setLeftColumnClass($class)
	{
		if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
			$this->LeftColumnClass = $class . " col-form-label ew-label";
			$this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
			$this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
			$this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
		}
	}

	// Multiple column sort
	public function updateSort(&$fld, $ctrl)
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
			if ($ctrl) {
				$orderBy = $this->getSessionOrderBy();
				if (ContainsString($orderBy, $sortField . " " . $lastSort)) {
					$orderBy = str_replace($sortField . " " . $lastSort, $sortField . " " . $thisSort, $orderBy);
				} else {
					if ($orderBy != "")
						$orderBy .= ", ";
					$orderBy .= $sortField . " " . $thisSort;
				}
				$this->setSessionOrderBy($orderBy); // Save to Session
			} else {
				$this->setSessionOrderBy($sortField . " " . $thisSort); // Save to Session
			}
		} else {
			if (!$ctrl)
				$fld->setSort("");
		}
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`v201_mutasi`";
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
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
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
		$where = ($this->SqlWhere != "") ? $this->SqlWhere : "";
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
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "`jenis_id` ASC";
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

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table SQL
	public function getCurrentSql()
	{
		$filter = $this->CurrentFilter;
		$filter = $this->applyUserIDFilters($filter);
		$sort = $this->getSessionOrderBy();
		return $this->getSql($filter, $sort);
	}

	// Table SQL with List page filter
	public function getListSql()
	{
		$filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->getSqlSelect();
		$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Get record count based on filter (for detail record count in master table pages)
	public function loadRecordCount($filter)
	{
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $filter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
		$cnt = $this->getRecordCount($sql);
		$this->CurrentFilter = $origFilter;
		return $cnt;
	}

	// Get record count (for current List page)
	public function listRecordCount()
	{
		$filter = $this->getSessionWhere();
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		$cnt = $this->getRecordCount($sql);
		return $cnt;
	}

	// INSERT statement
	protected function insertSql(&$rs)
	{
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom)
				continue;
			$names .= $this->fields[$name]->Expression . ",";
			$values .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$names = preg_replace('/,+$/', "", $names);
		$values = preg_replace('/,+$/', "", $values);
		return "INSERT INTO " . $this->UpdateTable . " ($names) VALUES ($values)";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = $this->getConnection();
		$success = $conn->execute($this->insertSql($rs));
		if ($success) {
		}
		return $success;
	}

	// UPDATE statement
	protected function updateSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsAutoIncrement)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter != "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = $this->getConnection();
		$success = $conn->execute($this->updateSql($rs, $where, $curfilter));
		return $success;
	}

	// DELETE statement
	protected function deleteSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		if ($rs) {
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		AddFilter($filter, $where);
		if ($filter != "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = $this->getConnection();
		if ($success)
			$success = $conn->execute($this->deleteSql($rs, $where, $curfilter));
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->jo_id->DbValue = $row['jo_id'];
		$this->jenis_id->DbValue = $row['jenis_id'];
		$this->keluar->DbValue = $row['keluar'];
		$this->mutasi_id->DbValue = $row['mutasi_id'];
		$this->tanggal->DbValue = $row['tanggal'];
		$this->nourut->DbValue = $row['nourut'];
		$this->masuk->DbValue = $row['masuk'];
		$this->selisih->DbValue = $row['selisih'];
		$this->comment->DbValue = $row['comment'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
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
			return "v201_mutasilist.php";
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
		if ($pageName == "v201_mutasiview.php")
			return $Language->phrase("View");
		elseif ($pageName == "v201_mutasiedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "v201_mutasiadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "v201_mutasilist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("v201_mutasiview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("v201_mutasiview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "v201_mutasiadd.php?" . $this->getUrlParm($parm);
		else
			$url = "v201_mutasiadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("v201_mutasiedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("v201_mutasiadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("v201_mutasidelete.php", $this->getUrlParm());
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
		if ($this->CurrentAction || $this->isExport() ||
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

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->jo_id->setDbValue($rs->fields('jo_id'));
		$this->jenis_id->setDbValue($rs->fields('jenis_id'));
		$this->keluar->setDbValue($rs->fields('keluar'));
		$this->mutasi_id->setDbValue($rs->fields('mutasi_id'));
		$this->tanggal->setDbValue($rs->fields('tanggal'));
		$this->nourut->setDbValue($rs->fields('nourut'));
		$this->masuk->setDbValue($rs->fields('masuk'));
		$this->selisih->setDbValue($rs->fields('selisih'));
		$this->comment->setDbValue($rs->fields('comment'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// jo_id
		// jenis_id
		// keluar
		// mutasi_id
		// tanggal
		// nourut
		// masuk
		// selisih
		// comment
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
		$this->jenis_id->ViewValue = $this->jenis_id->CurrentValue;
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

		// keluar
		$this->keluar->ViewValue = $this->keluar->CurrentValue;
		$this->keluar->ViewValue = FormatNumber($this->keluar->ViewValue, 0, -2, -2, -2);
		$this->keluar->CellCssStyle .= "text-align: right;";
		$this->keluar->ViewCustomAttributes = "";

		// mutasi_id
		$this->mutasi_id->ViewValue = $this->mutasi_id->CurrentValue;
		$this->mutasi_id->ViewValue = FormatNumber($this->mutasi_id->ViewValue, 0, -2, -2, -2);
		$this->mutasi_id->ViewCustomAttributes = "";

		// tanggal
		$this->tanggal->ViewValue = $this->tanggal->CurrentValue;
		$this->tanggal->ViewValue = FormatDateTime($this->tanggal->ViewValue, 0);
		$this->tanggal->ViewCustomAttributes = "";

		// nourut
		$this->nourut->ViewValue = $this->nourut->CurrentValue;
		$this->nourut->ViewValue = FormatNumber($this->nourut->ViewValue, 0, -2, -2, -2);
		$this->nourut->ViewCustomAttributes = "";

		// masuk
		$this->masuk->ViewValue = $this->masuk->CurrentValue;
		$this->masuk->ViewValue = FormatNumber($this->masuk->ViewValue, 2, -2, -2, -2);
		$this->masuk->ViewCustomAttributes = "";

		// selisih
		$this->selisih->ViewValue = $this->selisih->CurrentValue;
		$this->selisih->ViewValue = FormatNumber($this->selisih->ViewValue, 2, -2, -2, -2);
		$this->selisih->ViewCustomAttributes = "";

		// comment
		$this->comment->ViewValue = $this->comment->CurrentValue;
		$this->comment->ViewCustomAttributes = "";

		// jo_id
		$this->jo_id->LinkCustomAttributes = "";
		$this->jo_id->HrefValue = "";
		$this->jo_id->TooltipValue = "";

		// jenis_id
		$this->jenis_id->LinkCustomAttributes = "";
		$this->jenis_id->HrefValue = "";
		$this->jenis_id->TooltipValue = "";

		// keluar
		$this->keluar->LinkCustomAttributes = "";
		$this->keluar->HrefValue = "";
		$this->keluar->TooltipValue = "";

		// mutasi_id
		$this->mutasi_id->LinkCustomAttributes = "";
		$this->mutasi_id->HrefValue = "";
		$this->mutasi_id->TooltipValue = "";

		// tanggal
		$this->tanggal->LinkCustomAttributes = "";
		$this->tanggal->HrefValue = "";
		$this->tanggal->TooltipValue = "";

		// nourut
		$this->nourut->LinkCustomAttributes = "";
		$this->nourut->HrefValue = "";
		$this->nourut->TooltipValue = "";

		// masuk
		$this->masuk->LinkCustomAttributes = "";
		$this->masuk->HrefValue = "";
		$this->masuk->TooltipValue = "";

		// selisih
		$this->selisih->LinkCustomAttributes = "";
		$this->selisih->HrefValue = "";
		$this->selisih->TooltipValue = "";

		// comment
		$this->comment->LinkCustomAttributes = "";
		$this->comment->HrefValue = "";
		$this->comment->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();

		// Save data for Custom Template
		$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Render edit row values
	public function renderEditRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// jo_id
		$this->jo_id->EditAttrs["class"] = "form-control";
		$this->jo_id->EditCustomAttributes = "";

		// jenis_id
		$this->jenis_id->EditAttrs["class"] = "form-control";
		$this->jenis_id->EditCustomAttributes = "";
		$this->jenis_id->EditValue = $this->jenis_id->CurrentValue;
		$this->jenis_id->PlaceHolder = RemoveHtml($this->jenis_id->caption());

		// keluar
		$this->keluar->EditAttrs["class"] = "form-control";
		$this->keluar->EditCustomAttributes = "";
		$this->keluar->EditValue = $this->keluar->CurrentValue;
		$this->keluar->PlaceHolder = RemoveHtml($this->keluar->caption());
		if (strval($this->keluar->EditValue) != "" && is_numeric($this->keluar->EditValue))
			$this->keluar->EditValue = FormatNumber($this->keluar->EditValue, -2, -2, -2, -2);
		

		// mutasi_id
		$this->mutasi_id->EditAttrs["class"] = "form-control";
		$this->mutasi_id->EditCustomAttributes = "";
		$this->mutasi_id->EditValue = $this->mutasi_id->CurrentValue;
		$this->mutasi_id->PlaceHolder = RemoveHtml($this->mutasi_id->caption());

		// tanggal
		$this->tanggal->EditAttrs["class"] = "form-control";
		$this->tanggal->EditCustomAttributes = "";
		$this->tanggal->EditValue = FormatDateTime($this->tanggal->CurrentValue, 8);
		$this->tanggal->PlaceHolder = RemoveHtml($this->tanggal->caption());

		// nourut
		$this->nourut->EditAttrs["class"] = "form-control";
		$this->nourut->EditCustomAttributes = "";
		$this->nourut->EditValue = $this->nourut->CurrentValue;
		$this->nourut->PlaceHolder = RemoveHtml($this->nourut->caption());

		// masuk
		$this->masuk->EditAttrs["class"] = "form-control";
		$this->masuk->EditCustomAttributes = "";
		$this->masuk->EditValue = $this->masuk->CurrentValue;
		$this->masuk->PlaceHolder = RemoveHtml($this->masuk->caption());
		if (strval($this->masuk->EditValue) != "" && is_numeric($this->masuk->EditValue))
			$this->masuk->EditValue = FormatNumber($this->masuk->EditValue, -2, -2, -2, -2);
		

		// selisih
		$this->selisih->EditAttrs["class"] = "form-control";
		$this->selisih->EditCustomAttributes = "";
		$this->selisih->EditValue = $this->selisih->CurrentValue;
		$this->selisih->PlaceHolder = RemoveHtml($this->selisih->caption());
		if (strval($this->selisih->EditValue) != "" && is_numeric($this->selisih->EditValue))
			$this->selisih->EditValue = FormatNumber($this->selisih->EditValue, -2, -2, -2, -2);
		

		// comment
		$this->comment->EditAttrs["class"] = "form-control";
		$this->comment->EditCustomAttributes = "";
		$this->comment->EditValue = $this->comment->CurrentValue;
		$this->comment->PlaceHolder = RemoveHtml($this->comment->caption());

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
			if (is_numeric($this->keluar->CurrentValue))
				$this->keluar->Total += $this->keluar->CurrentValue; // Accumulate total
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{
			$this->keluar->CurrentValue = $this->keluar->Total;
			$this->keluar->ViewValue = $this->keluar->CurrentValue;
			$this->keluar->ViewValue = FormatNumber($this->keluar->ViewValue, 0, -2, -2, -2);
			$this->keluar->CellCssStyle .= "text-align: right;";
			$this->keluar->ViewCustomAttributes = "";
			$this->keluar->HrefValue = ""; // Clear href value

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
	{
		if (!$recordset || !$doc)
			return;
		if (!$doc->ExportCustom) {

			// Write header
			$doc->exportTableHeader();
			if ($doc->Horizontal) { // Horizontal format, write header
				$doc->beginExportRow();
				if ($exportPageType == "view") {
					$doc->exportCaption($this->jo_id);
					$doc->exportCaption($this->jenis_id);
					$doc->exportCaption($this->keluar);
					$doc->exportCaption($this->mutasi_id);
					$doc->exportCaption($this->tanggal);
					$doc->exportCaption($this->nourut);
					$doc->exportCaption($this->masuk);
					$doc->exportCaption($this->selisih);
					$doc->exportCaption($this->comment);
				} else {
					$doc->exportCaption($this->jo_id);
					$doc->exportCaption($this->jenis_id);
					$doc->exportCaption($this->keluar);
					$doc->exportCaption($this->mutasi_id);
					$doc->exportCaption($this->tanggal);
					$doc->exportCaption($this->nourut);
					$doc->exportCaption($this->masuk);
					$doc->exportCaption($this->selisih);
				}
				$doc->endExportRow();
			}
		}

		// Move to first record
		$recCnt = $startRec - 1;
		if (!$recordset->EOF) {
			$recordset->moveFirst();
			if ($startRec > 1)
				$recordset->move($startRec - 1);
		}
		while (!$recordset->EOF && $recCnt < $stopRec) {
			$recCnt++;
			if ($recCnt >= $startRec) {
				$rowCnt = $recCnt - $startRec + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0)
						$doc->exportPageBreak();
				}
				$this->loadListRowValues($recordset);
				$this->aggregateListRowValues(); // Aggregate row values

				// Render row
				$this->RowType = ROWTYPE_VIEW; // Render view
				$this->resetAttributes();
				$this->renderListRow();
				if (!$doc->ExportCustom) {
					$doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
					if ($exportPageType == "view") {
						$doc->exportField($this->jo_id);
						$doc->exportField($this->jenis_id);
						$doc->exportField($this->keluar);
						$doc->exportField($this->mutasi_id);
						$doc->exportField($this->tanggal);
						$doc->exportField($this->nourut);
						$doc->exportField($this->masuk);
						$doc->exportField($this->selisih);
						$doc->exportField($this->comment);
					} else {
						$doc->exportField($this->jo_id);
						$doc->exportField($this->jenis_id);
						$doc->exportField($this->keluar);
						$doc->exportField($this->mutasi_id);
						$doc->exportField($this->tanggal);
						$doc->exportField($this->nourut);
						$doc->exportField($this->masuk);
						$doc->exportField($this->selisih);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}

		// Export aggregates (horizontal format only)
		if ($doc->Horizontal) {
			$this->RowType = ROWTYPE_AGGREGATE;
			$this->resetAttributes();
			$this->aggregateListRow();
			if (!$doc->ExportCustom) {
				$doc->beginExportRow(-1);
				$doc->exportAggregate($this->jo_id, '');
				$doc->exportAggregate($this->jenis_id, '');
				$doc->exportAggregate($this->keluar, 'TOTAL');
				$doc->exportAggregate($this->mutasi_id, '');
				$doc->exportAggregate($this->tanggal, '');
				$doc->exportAggregate($this->nourut, '');
				$doc->exportAggregate($this->masuk, '');
				$doc->exportAggregate($this->selisih, '');
				$doc->endExportRow();
			}
		}
		if (!$doc->ExportCustom) {
			$doc->exportTableFooter();
		}
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0)
	{

		// No binary fields
		return FALSE;
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Grid Inserting event
	function Grid_Inserting() {

		// Enter your code here
		// To reject grid insert, set return value to FALSE

		return TRUE;
	}

	// Grid Inserted event
	function Grid_Inserted($rsnew) {

		//echo "Grid Inserted";
	}

	// Grid Updating event
	function Grid_Updating($rsold) {

		// Enter your code here
		// To reject grid update, set return value to FALSE

		return TRUE;
	}

	// Grid Updated event
	function Grid_Updated($rsold, $rsnew) {

		//echo "Grid Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
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