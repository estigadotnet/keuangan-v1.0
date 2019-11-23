<?php namespace PHPMaker2020\p_keuangan_v1_0; ?>
<?php

/**
 * Table class for v202_jomutasihrn
 */
class v202_jomutasihrn extends DbTable
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
	public $Periode;
	public $NoJO;
	public $Nama;
	public $NoKolom;
	public $total_masuk;
	public $total_keluar;
	public $Tagihan;
	public $Comment;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'v202_jomutasihrn';
		$this->TableName = 'v202_jomutasihrn';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`v202_jomutasihrn`";
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

		// Periode
		$this->Periode = new DbField('v202_jomutasihrn', 'v202_jomutasihrn', 'x_Periode', 'Periode', '`Periode`', '`Periode`', 200, 14, -1, FALSE, '`Periode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Periode->Sortable = TRUE; // Allow sort
		$this->Periode->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Periode->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Periode->Lookup = new Lookup('Periode', 'v202_jomutasihrn', TRUE, 'Periode', ["Periode","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Periode'] = &$this->Periode;

		// NoJO
		$this->NoJO = new DbField('v202_jomutasihrn', 'v202_jomutasihrn', 'x_NoJO', 'NoJO', '`NoJO`', '`NoJO`', 200, 25, -1, FALSE, '`NoJO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->NoJO->Sortable = TRUE; // Allow sort
		$this->NoJO->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->NoJO->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->NoJO->Lookup = new Lookup('NoJO', 'v202_jomutasihrn', TRUE, 'NoJO', ["NoJO","","",""], [], [], [], [], [], [], '`NoJO` DESC', '');
		$this->fields['NoJO'] = &$this->NoJO;

		// Nama
		$this->Nama = new DbField('v202_jomutasihrn', 'v202_jomutasihrn', 'x_Nama', 'Nama', '`Nama`', '`Nama`', 201, 65535, -1, FALSE, '`Nama`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Nama->Sortable = TRUE; // Allow sort
		$this->fields['Nama'] = &$this->Nama;

		// NoKolom
		$this->NoKolom = new DbField('v202_jomutasihrn', 'v202_jomutasihrn', 'x_NoKolom', 'NoKolom', '`NoKolom`', '`NoKolom`', 16, 4, -1, FALSE, '`NoKolom`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NoKolom->Sortable = TRUE; // Allow sort
		$this->NoKolom->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['NoKolom'] = &$this->NoKolom;

		// total_masuk
		$this->total_masuk = new DbField('v202_jomutasihrn', 'v202_jomutasihrn', 'x_total_masuk', 'total_masuk', '`total_masuk`', '`total_masuk`', 5, 19, -1, FALSE, '`total_masuk`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->total_masuk->Sortable = TRUE; // Allow sort
		$this->total_masuk->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['total_masuk'] = &$this->total_masuk;

		// total_keluar
		$this->total_keluar = new DbField('v202_jomutasihrn', 'v202_jomutasihrn', 'x_total_keluar', 'total_keluar', '`total_keluar`', '`total_keluar`', 5, 19, -1, FALSE, '`total_keluar`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->total_keluar->Sortable = TRUE; // Allow sort
		$this->total_keluar->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['total_keluar'] = &$this->total_keluar;

		// Tagihan
		$this->Tagihan = new DbField('v202_jomutasihrn', 'v202_jomutasihrn', 'x_Tagihan', 'Tagihan', '`Tagihan`', '`Tagihan`', 5, 14, -1, FALSE, '`Tagihan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tagihan->Sortable = TRUE; // Allow sort
		$this->Tagihan->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Tagihan'] = &$this->Tagihan;

		// Comment
		$this->Comment = new DbField('v202_jomutasihrn', 'v202_jomutasihrn', 'x_Comment', 'Comment', '`Comment`', '`Comment`', 201, 16777215, -1, FALSE, '`Comment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Comment->Sortable = TRUE; // Allow sort
		$this->fields['Comment'] = &$this->Comment;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`v202_jomutasihrn`";
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
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "";
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
		$this->Periode->DbValue = $row['Periode'];
		$this->NoJO->DbValue = $row['NoJO'];
		$this->Nama->DbValue = $row['Nama'];
		$this->NoKolom->DbValue = $row['NoKolom'];
		$this->total_masuk->DbValue = $row['total_masuk'];
		$this->total_keluar->DbValue = $row['total_keluar'];
		$this->Tagihan->DbValue = $row['Tagihan'];
		$this->Comment->DbValue = $row['Comment'];
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
			return "v202_jomutasihrnlist.php";
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
		if ($pageName == "v202_jomutasihrnview.php")
			return $Language->phrase("View");
		elseif ($pageName == "v202_jomutasihrnedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "v202_jomutasihrnadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "v202_jomutasihrnlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("v202_jomutasihrnview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("v202_jomutasihrnview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "v202_jomutasihrnadd.php?" . $this->getUrlParm($parm);
		else
			$url = "v202_jomutasihrnadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("v202_jomutasihrnedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("v202_jomutasihrnadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("v202_jomutasihrndelete.php", $this->getUrlParm());
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
		$this->Periode->setDbValue($rs->fields('Periode'));
		$this->NoJO->setDbValue($rs->fields('NoJO'));
		$this->Nama->setDbValue($rs->fields('Nama'));
		$this->NoKolom->setDbValue($rs->fields('NoKolom'));
		$this->total_masuk->setDbValue($rs->fields('total_masuk'));
		$this->total_keluar->setDbValue($rs->fields('total_keluar'));
		$this->Tagihan->setDbValue($rs->fields('Tagihan'));
		$this->Comment->setDbValue($rs->fields('Comment'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// Periode
		// NoJO
		// Nama
		// NoKolom
		// total_masuk
		// total_keluar
		// Tagihan
		// Comment
		// Periode

		$arwrk = [];
		$arwrk[1] = $this->Periode->CurrentValue;
		$this->Periode->ViewValue = $this->Periode->displayValue($arwrk);
		$this->Periode->ViewCustomAttributes = "";

		// NoJO
		$arwrk = [];
		$arwrk[1] = $this->NoJO->CurrentValue;
		$this->NoJO->ViewValue = $this->NoJO->displayValue($arwrk);
		$this->NoJO->ViewCustomAttributes = "";

		// Nama
		$this->Nama->ViewValue = $this->Nama->CurrentValue;
		$this->Nama->ViewCustomAttributes = "";

		// NoKolom
		$this->NoKolom->ViewValue = $this->NoKolom->CurrentValue;
		$this->NoKolom->ViewValue = FormatNumber($this->NoKolom->ViewValue, 0, -2, -2, -2);
		$this->NoKolom->ViewCustomAttributes = "";

		// total_masuk
		$this->total_masuk->ViewValue = $this->total_masuk->CurrentValue;
		$this->total_masuk->ViewValue = FormatNumber($this->total_masuk->ViewValue, 2, -2, -2, -2);
		$this->total_masuk->ViewCustomAttributes = "";

		// total_keluar
		$this->total_keluar->ViewValue = $this->total_keluar->CurrentValue;
		$this->total_keluar->ViewValue = FormatNumber($this->total_keluar->ViewValue, 2, -2, -2, -2);
		$this->total_keluar->ViewCustomAttributes = "";

		// Tagihan
		$this->Tagihan->ViewValue = $this->Tagihan->CurrentValue;
		$this->Tagihan->ViewValue = FormatNumber($this->Tagihan->ViewValue, 2, -2, -2, -2);
		$this->Tagihan->ViewCustomAttributes = "";

		// Comment
		$this->Comment->ViewValue = $this->Comment->CurrentValue;
		$this->Comment->ViewCustomAttributes = "";

		// Periode
		$this->Periode->LinkCustomAttributes = "";
		$this->Periode->HrefValue = "";
		$this->Periode->TooltipValue = "";

		// NoJO
		$this->NoJO->LinkCustomAttributes = "";
		$this->NoJO->HrefValue = "";
		$this->NoJO->TooltipValue = "";

		// Nama
		$this->Nama->LinkCustomAttributes = "";
		$this->Nama->HrefValue = "";
		$this->Nama->TooltipValue = "";

		// NoKolom
		$this->NoKolom->LinkCustomAttributes = "";
		$this->NoKolom->HrefValue = "";
		$this->NoKolom->TooltipValue = "";

		// total_masuk
		$this->total_masuk->LinkCustomAttributes = "";
		$this->total_masuk->HrefValue = "";
		$this->total_masuk->TooltipValue = "";

		// total_keluar
		$this->total_keluar->LinkCustomAttributes = "";
		$this->total_keluar->HrefValue = "";
		$this->total_keluar->TooltipValue = "";

		// Tagihan
		$this->Tagihan->LinkCustomAttributes = "";
		$this->Tagihan->HrefValue = "";
		$this->Tagihan->TooltipValue = "";

		// Comment
		$this->Comment->LinkCustomAttributes = "";
		$this->Comment->HrefValue = "";
		$this->Comment->TooltipValue = "";

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

		// Periode
		$this->Periode->EditAttrs["class"] = "form-control";
		$this->Periode->EditCustomAttributes = "";

		// NoJO
		$this->NoJO->EditAttrs["class"] = "form-control";
		$this->NoJO->EditCustomAttributes = "";

		// Nama
		$this->Nama->EditAttrs["class"] = "form-control";
		$this->Nama->EditCustomAttributes = "";
		$this->Nama->EditValue = $this->Nama->CurrentValue;
		$this->Nama->PlaceHolder = RemoveHtml($this->Nama->caption());

		// NoKolom
		$this->NoKolom->EditAttrs["class"] = "form-control";
		$this->NoKolom->EditCustomAttributes = "";
		$this->NoKolom->EditValue = $this->NoKolom->CurrentValue;
		$this->NoKolom->PlaceHolder = RemoveHtml($this->NoKolom->caption());

		// total_masuk
		$this->total_masuk->EditAttrs["class"] = "form-control";
		$this->total_masuk->EditCustomAttributes = "";
		$this->total_masuk->EditValue = $this->total_masuk->CurrentValue;
		$this->total_masuk->PlaceHolder = RemoveHtml($this->total_masuk->caption());
		if (strval($this->total_masuk->EditValue) != "" && is_numeric($this->total_masuk->EditValue))
			$this->total_masuk->EditValue = FormatNumber($this->total_masuk->EditValue, -2, -2, -2, -2);
		

		// total_keluar
		$this->total_keluar->EditAttrs["class"] = "form-control";
		$this->total_keluar->EditCustomAttributes = "";
		$this->total_keluar->EditValue = $this->total_keluar->CurrentValue;
		$this->total_keluar->PlaceHolder = RemoveHtml($this->total_keluar->caption());
		if (strval($this->total_keluar->EditValue) != "" && is_numeric($this->total_keluar->EditValue))
			$this->total_keluar->EditValue = FormatNumber($this->total_keluar->EditValue, -2, -2, -2, -2);
		

		// Tagihan
		$this->Tagihan->EditAttrs["class"] = "form-control";
		$this->Tagihan->EditCustomAttributes = "";
		$this->Tagihan->EditValue = $this->Tagihan->CurrentValue;
		$this->Tagihan->PlaceHolder = RemoveHtml($this->Tagihan->caption());
		if (strval($this->Tagihan->EditValue) != "" && is_numeric($this->Tagihan->EditValue))
			$this->Tagihan->EditValue = FormatNumber($this->Tagihan->EditValue, -2, -2, -2, -2);
		

		// Comment
		$this->Comment->EditAttrs["class"] = "form-control";
		$this->Comment->EditCustomAttributes = "";
		$this->Comment->EditValue = $this->Comment->CurrentValue;
		$this->Comment->PlaceHolder = RemoveHtml($this->Comment->caption());

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{

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
					$doc->exportCaption($this->Periode);
					$doc->exportCaption($this->NoJO);
					$doc->exportCaption($this->Nama);
					$doc->exportCaption($this->NoKolom);
					$doc->exportCaption($this->total_masuk);
					$doc->exportCaption($this->total_keluar);
					$doc->exportCaption($this->Tagihan);
					$doc->exportCaption($this->Comment);
				} else {
					$doc->exportCaption($this->Periode);
					$doc->exportCaption($this->NoJO);
					$doc->exportCaption($this->NoKolom);
					$doc->exportCaption($this->total_masuk);
					$doc->exportCaption($this->total_keluar);
					$doc->exportCaption($this->Tagihan);
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

				// Render row
				$this->RowType = ROWTYPE_VIEW; // Render view
				$this->resetAttributes();
				$this->renderListRow();
				if (!$doc->ExportCustom) {
					$doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
					if ($exportPageType == "view") {
						$doc->exportField($this->Periode);
						$doc->exportField($this->NoJO);
						$doc->exportField($this->Nama);
						$doc->exportField($this->NoKolom);
						$doc->exportField($this->total_masuk);
						$doc->exportField($this->total_keluar);
						$doc->exportField($this->Tagihan);
						$doc->exportField($this->Comment);
					} else {
						$doc->exportField($this->Periode);
						$doc->exportField($this->NoJO);
						$doc->exportField($this->NoKolom);
						$doc->exportField($this->total_masuk);
						$doc->exportField($this->total_keluar);
						$doc->exportField($this->Tagihan);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
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
		// isi session

		$_SESSION['Periode'] = $this->Periode->AdvancedSearch->SearchValue;
		$_SESSION['NoJO'] = $this->NoJO->AdvancedSearch->SearchValue;
		if ($_SESSION['Periode'] != '' or $_SESSION['NoJO'] != '') {
			$this->terminate('r202_jomutasihrn.php');
		}
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