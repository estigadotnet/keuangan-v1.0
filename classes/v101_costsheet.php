<?php namespace PHPMaker2020\p_keuangan_v1_0; ?>
<?php

/**
 * Table class for v101_costsheet
 */
class v101_costsheet extends DbTable
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
	public $id;
	public $NoJO;
	public $Tagihan;
	public $Shipper;
	public $Qty;
	public $Cont;
	public $Status;
	public $Doc;
	public $Tujuan;
	public $Kapal;
	public $BM;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'v101_costsheet';
		$this->TableName = 'v101_costsheet';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`v101_costsheet`";
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

		// id
		$this->id = new DbField('v101_costsheet', 'v101_costsheet', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->IsForeignKey = TRUE; // Foreign key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// NoJO
		$this->NoJO = new DbField('v101_costsheet', 'v101_costsheet', 'x_NoJO', 'NoJO', '`NoJO`', '`NoJO`', 200, 25, -1, FALSE, '`NoJO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->NoJO->Nullable = FALSE; // NOT NULL field
		$this->NoJO->Required = TRUE; // Required field
		$this->NoJO->Sortable = TRUE; // Allow sort
		$this->NoJO->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->NoJO->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->NoJO->Lookup = new Lookup('NoJO', 'v101_costsheet', FALSE, 'NoJO', ["NoJO","","",""], [], [], [], [], [], [], '', '');
		$this->fields['NoJO'] = &$this->NoJO;

		// Tagihan
		$this->Tagihan = new DbField('v101_costsheet', 'v101_costsheet', 'x_Tagihan', 'Tagihan', '`Tagihan`', '`Tagihan`', 5, 14, -1, FALSE, '`Tagihan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tagihan->Nullable = FALSE; // NOT NULL field
		$this->Tagihan->Sortable = TRUE; // Allow sort
		$this->Tagihan->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Tagihan'] = &$this->Tagihan;

		// Shipper
		$this->Shipper = new DbField('v101_costsheet', 'v101_costsheet', 'x_Shipper', 'Shipper', '`Shipper`', '`Shipper`', 200, 100, -1, FALSE, '`Shipper`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Shipper->Sortable = TRUE; // Allow sort
		$this->fields['Shipper'] = &$this->Shipper;

		// Qty
		$this->Qty = new DbField('v101_costsheet', 'v101_costsheet', 'x_Qty', 'Qty', '`Qty`', '`Qty`', 200, 5, -1, FALSE, '`Qty`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Qty->Sortable = TRUE; // Allow sort
		$this->fields['Qty'] = &$this->Qty;

		// Cont
		$this->Cont = new DbField('v101_costsheet', 'v101_costsheet', 'x_Cont', 'Cont', '`Cont`', '`Cont`', 200, 5, -1, FALSE, '`Cont`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Cont->Sortable = TRUE; // Allow sort
		$this->fields['Cont'] = &$this->Cont;

		// Status
		$this->Status = new DbField('v101_costsheet', 'v101_costsheet', 'x_Status', 'Status', '`Status`', '`Status`', 16, 5, -1, FALSE, '`Status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Status->Sortable = TRUE; // Allow sort
		$this->Status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Status'] = &$this->Status;

		// Doc
		$this->Doc = new DbField('v101_costsheet', 'v101_costsheet', 'x_Doc', 'Doc', '`Doc`', '`Doc`', 200, 255, -1, FALSE, '`Doc`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Doc->Sortable = TRUE; // Allow sort
		$this->fields['Doc'] = &$this->Doc;

		// Tujuan
		$this->Tujuan = new DbField('v101_costsheet', 'v101_costsheet', 'x_Tujuan', 'Tujuan', '`Tujuan`', '`Tujuan`', 200, 100, -1, FALSE, '`Tujuan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tujuan->Sortable = TRUE; // Allow sort
		$this->fields['Tujuan'] = &$this->Tujuan;

		// Kapal
		$this->Kapal = new DbField('v101_costsheet', 'v101_costsheet', 'x_Kapal', 'Kapal', '`Kapal`', '`Kapal`', 200, 100, -1, FALSE, '`Kapal`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Kapal->Sortable = TRUE; // Allow sort
		$this->fields['Kapal'] = &$this->Kapal;

		// BM
		$this->BM = new DbField('v101_costsheet', 'v101_costsheet', 'x_BM', 'BM', '`BM`', '`BM`', 202, 5, -1, FALSE, '`BM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->BM->Nullable = FALSE; // NOT NULL field
		$this->BM->Sortable = TRUE; // Allow sort
		$this->BM->Lookup = new Lookup('BM', 'v101_costsheet', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->BM->OptionCount = 3;
		$this->fields['BM'] = &$this->BM;
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

	// Current detail table name
	public function getCurrentDetailTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE")];
	}
	public function setCurrentDetailTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE")] = $v;
	}

	// Get detail url
	public function getDetailUrl()
	{

		// Detail url
		$detailUrl = "";
		if ($this->getCurrentDetailTable() == "t102_mutasi") {
			$detailUrl = $GLOBALS["t102_mutasi"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "v101_costsheetlist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`v101_costsheet`";
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
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "`Status` ASC,`NoJO` DESC";
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

			// Get insert id if necessary
			$this->id->setDbValue($conn->insert_ID());
			$rs['id'] = $this->id->DbValue;
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

		// Cascade Update detail table 't102_mutasi'
		$cascadeUpdate = FALSE;
		$rscascade = [];
		if ($rsold && (isset($rs['id']) && $rsold['id'] != $rs['id'])) { // Update detail field 'jo_id'
			$cascadeUpdate = TRUE;
			$rscascade['jo_id'] = $rs['id']; 
		}
		if ($cascadeUpdate) {
			if (!isset($GLOBALS["t102_mutasi"]))
				$GLOBALS["t102_mutasi"] = new t102_mutasi();
			$rswrk = $GLOBALS["t102_mutasi"]->loadRs("`jo_id` = " . QuotedValue($rsold['id'], DATATYPE_NUMBER, 'DB')); 
			while ($rswrk && !$rswrk->EOF) {
				$rskey = [];
				$fldname = 'id';
				$rskey[$fldname] = $rswrk->fields[$fldname];
				$rsdtlold = &$rswrk->fields;
				$rsdtlnew = array_merge($rsdtlold, $rscascade);

				// Call Row_Updating event
				$success = $GLOBALS["t102_mutasi"]->Row_Updating($rsdtlold, $rsdtlnew);
				if ($success)
					$success = $GLOBALS["t102_mutasi"]->update($rscascade, $rskey, $rswrk->fields);
				if (!$success)
					return FALSE;

				// Call Row_Updated event
				$GLOBALS["t102_mutasi"]->Row_Updated($rsdtlold, $rsdtlnew);
				$rswrk->moveNext();
			}
		}
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
			if (array_key_exists('id', $rs))
				AddFilter($where, QuotedName('id', $this->Dbid) . '=' . QuotedValue($rs['id'], $this->id->DataType, $this->Dbid));
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

		// Cascade delete detail table 't102_mutasi'
		if (!isset($GLOBALS["t102_mutasi"]))
			$GLOBALS["t102_mutasi"] = new t102_mutasi();
		$rscascade = $GLOBALS["t102_mutasi"]->loadRs("`jo_id` = " . QuotedValue($rs['id'], DATATYPE_NUMBER, "DB")); 
		$dtlrows = ($rscascade) ? $rscascade->getRows() : [];

		// Call Row Deleting event
		foreach ($dtlrows as $dtlrow) {
			$success = $GLOBALS["t102_mutasi"]->Row_Deleting($dtlrow);
			if (!$success)
				break;
		}
		if ($success) {
			foreach ($dtlrows as $dtlrow) {
				$success = $GLOBALS["t102_mutasi"]->delete($dtlrow); // Delete
				if (!$success)
					break;
			}
		}

		// Call Row Deleted event
		if ($success) {
			foreach ($dtlrows as $dtlrow)
				$GLOBALS["t102_mutasi"]->Row_Deleted($dtlrow);
		}
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
		$this->id->DbValue = $row['id'];
		$this->NoJO->DbValue = $row['NoJO'];
		$this->Tagihan->DbValue = $row['Tagihan'];
		$this->Shipper->DbValue = $row['Shipper'];
		$this->Qty->DbValue = $row['Qty'];
		$this->Cont->DbValue = $row['Cont'];
		$this->Status->DbValue = $row['Status'];
		$this->Doc->DbValue = $row['Doc'];
		$this->Tujuan->DbValue = $row['Tujuan'];
		$this->Kapal->DbValue = $row['Kapal'];
		$this->BM->DbValue = $row['BM'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`id` = @id@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('id', $row) ? $row['id'] : NULL;
		else
			$val = $this->id->OldValue !== NULL ? $this->id->OldValue : $this->id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "v101_costsheetlist.php";
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
		if ($pageName == "v101_costsheetview.php")
			return $Language->phrase("View");
		elseif ($pageName == "v101_costsheetedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "v101_costsheetadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "v101_costsheetlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("v101_costsheetview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("v101_costsheetview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "v101_costsheetadd.php?" . $this->getUrlParm($parm);
		else
			$url = "v101_costsheetadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("v101_costsheetedit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("v101_costsheetedit.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
		if ($parm != "")
			$url = $this->keyUrl("v101_costsheetadd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("v101_costsheetadd.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
		return $this->keyUrl("v101_costsheetdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id:" . JsonEncode($this->id->CurrentValue, "number");
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
		if ($this->id->CurrentValue != NULL) {
			$url .= "id=" . urlencode($this->id->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
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
			if (Param("id") !== NULL)
				$arKeys[] = Param("id");
			elseif (IsApi() && Key(0) !== NULL)
				$arKeys[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKeys[] = Route(2);
			else
				$arKeys = NULL; // Do not setup

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = [];
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_numeric($key))
					continue;
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
			if ($setCurrent)
				$this->id->CurrentValue = $key;
			else
				$this->id->OldValue = $key;
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
		$this->id->setDbValue($rs->fields('id'));
		$this->NoJO->setDbValue($rs->fields('NoJO'));
		$this->Tagihan->setDbValue($rs->fields('Tagihan'));
		$this->Shipper->setDbValue($rs->fields('Shipper'));
		$this->Qty->setDbValue($rs->fields('Qty'));
		$this->Cont->setDbValue($rs->fields('Cont'));
		$this->Status->setDbValue($rs->fields('Status'));
		$this->Doc->setDbValue($rs->fields('Doc'));
		$this->Tujuan->setDbValue($rs->fields('Tujuan'));
		$this->Kapal->setDbValue($rs->fields('Kapal'));
		$this->BM->setDbValue($rs->fields('BM'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// NoJO
		// Tagihan
		// Shipper
		// Qty
		// Cont
		// Status
		// Doc
		// Tujuan
		// Kapal
		// BM
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

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

		// Doc
		$this->Doc->ViewValue = $this->Doc->CurrentValue;
		$this->Doc->ViewCustomAttributes = "";

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

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

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

		// Doc
		$this->Doc->LinkCustomAttributes = "";
		$this->Doc->HrefValue = "";
		$this->Doc->TooltipValue = "";

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

		// id
		$this->id->EditAttrs["class"] = "form-control";
		$this->id->EditCustomAttributes = "";
		$this->id->EditValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// NoJO
		$this->NoJO->EditAttrs["class"] = "form-control";
		$this->NoJO->EditCustomAttributes = "";

		// Tagihan
		$this->Tagihan->EditAttrs["class"] = "form-control";
		$this->Tagihan->EditCustomAttributes = "";
		$this->Tagihan->EditValue = $this->Tagihan->CurrentValue;
		$this->Tagihan->PlaceHolder = RemoveHtml($this->Tagihan->caption());
		if (strval($this->Tagihan->EditValue) != "" && is_numeric($this->Tagihan->EditValue))
			$this->Tagihan->EditValue = FormatNumber($this->Tagihan->EditValue, -2, -2, -2, -2);
		

		// Shipper
		$this->Shipper->EditAttrs["class"] = "form-control";
		$this->Shipper->EditCustomAttributes = "";
		if (!$this->Shipper->Raw)
			$this->Shipper->CurrentValue = HtmlDecode($this->Shipper->CurrentValue);
		$this->Shipper->EditValue = $this->Shipper->CurrentValue;
		$this->Shipper->PlaceHolder = RemoveHtml($this->Shipper->caption());

		// Qty
		$this->Qty->EditAttrs["class"] = "form-control";
		$this->Qty->EditCustomAttributes = "";
		if (!$this->Qty->Raw)
			$this->Qty->CurrentValue = HtmlDecode($this->Qty->CurrentValue);
		$this->Qty->EditValue = $this->Qty->CurrentValue;
		$this->Qty->PlaceHolder = RemoveHtml($this->Qty->caption());

		// Cont
		$this->Cont->EditAttrs["class"] = "form-control";
		$this->Cont->EditCustomAttributes = "";
		if (!$this->Cont->Raw)
			$this->Cont->CurrentValue = HtmlDecode($this->Cont->CurrentValue);
		$this->Cont->EditValue = $this->Cont->CurrentValue;
		$this->Cont->PlaceHolder = RemoveHtml($this->Cont->caption());

		// Status
		$this->Status->EditAttrs["class"] = "form-control";
		$this->Status->EditCustomAttributes = "";
		$this->Status->EditValue = $this->Status->CurrentValue;
		$this->Status->PlaceHolder = RemoveHtml($this->Status->caption());

		// Doc
		$this->Doc->EditAttrs["class"] = "form-control";
		$this->Doc->EditCustomAttributes = "";
		if (!$this->Doc->Raw)
			$this->Doc->CurrentValue = HtmlDecode($this->Doc->CurrentValue);
		$this->Doc->EditValue = $this->Doc->CurrentValue;
		$this->Doc->PlaceHolder = RemoveHtml($this->Doc->caption());

		// Tujuan
		$this->Tujuan->EditAttrs["class"] = "form-control";
		$this->Tujuan->EditCustomAttributes = "";
		if (!$this->Tujuan->Raw)
			$this->Tujuan->CurrentValue = HtmlDecode($this->Tujuan->CurrentValue);
		$this->Tujuan->EditValue = $this->Tujuan->CurrentValue;
		$this->Tujuan->PlaceHolder = RemoveHtml($this->Tujuan->caption());

		// Kapal
		$this->Kapal->EditAttrs["class"] = "form-control";
		$this->Kapal->EditCustomAttributes = "";
		if (!$this->Kapal->Raw)
			$this->Kapal->CurrentValue = HtmlDecode($this->Kapal->CurrentValue);
		$this->Kapal->EditValue = $this->Kapal->CurrentValue;
		$this->Kapal->PlaceHolder = RemoveHtml($this->Kapal->caption());

		// BM
		$this->BM->EditCustomAttributes = "";
		$this->BM->EditValue = $this->BM->options(FALSE);

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
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->NoJO);
					$doc->exportCaption($this->Tagihan);
					$doc->exportCaption($this->Shipper);
					$doc->exportCaption($this->Qty);
					$doc->exportCaption($this->Cont);
					$doc->exportCaption($this->Status);
					$doc->exportCaption($this->Doc);
					$doc->exportCaption($this->Tujuan);
					$doc->exportCaption($this->Kapal);
					$doc->exportCaption($this->BM);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->NoJO);
					$doc->exportCaption($this->Tagihan);
					$doc->exportCaption($this->Shipper);
					$doc->exportCaption($this->Qty);
					$doc->exportCaption($this->Cont);
					$doc->exportCaption($this->Status);
					$doc->exportCaption($this->Doc);
					$doc->exportCaption($this->Tujuan);
					$doc->exportCaption($this->Kapal);
					$doc->exportCaption($this->BM);
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
						$doc->exportField($this->id);
						$doc->exportField($this->NoJO);
						$doc->exportField($this->Tagihan);
						$doc->exportField($this->Shipper);
						$doc->exportField($this->Qty);
						$doc->exportField($this->Cont);
						$doc->exportField($this->Status);
						$doc->exportField($this->Doc);
						$doc->exportField($this->Tujuan);
						$doc->exportField($this->Kapal);
						$doc->exportField($this->BM);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->NoJO);
						$doc->exportField($this->Tagihan);
						$doc->exportField($this->Shipper);
						$doc->exportField($this->Qty);
						$doc->exportField($this->Cont);
						$doc->exportField($this->Status);
						$doc->exportField($this->Doc);
						$doc->exportField($this->Tujuan);
						$doc->exportField($this->Kapal);
						$doc->exportField($this->BM);
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