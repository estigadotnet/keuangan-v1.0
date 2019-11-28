<?php namespace PHPMaker2020\p_keuangan_v1_0; ?>
<?php

/**
 * Table class for v203_costsheet
 */
class v203_costsheet extends DbTable
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
	public $NoJO;
	public $Tagihan;
	public $Shipper;
	public $Qty;
	public $Cont;
	public $Status;
	public $doc;
	public $Tujuan;
	public $Kapal;
	public $BM;
	public $mts_id;
	public $Tanggal;
	public $NoUrut;
	public $mts_jo_id;
	public $mts_jenis_id;
	public $Masuk;
	public $Keluar;
	public $Comment;
	public $jns_id;
	public $jns_nama;
	public $NoKolom;
	public $NoBL;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'v203_costsheet';
		$this->TableName = 'v203_costsheet';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`v203_costsheet`";
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
		$this->jo_id = new DbField('v203_costsheet', 'v203_costsheet', 'x_jo_id', 'jo_id', '`jo_id`', '`jo_id`', 3, 11, -1, FALSE, '`jo_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->jo_id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->jo_id->IsPrimaryKey = TRUE; // Primary key field
		$this->jo_id->Sortable = TRUE; // Allow sort
		$this->jo_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['jo_id'] = &$this->jo_id;

		// NoJO
		$this->NoJO = new DbField('v203_costsheet', 'v203_costsheet', 'x_NoJO', 'NoJO', '`NoJO`', '`NoJO`', 200, 25, -1, FALSE, '`NoJO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->NoJO->Nullable = FALSE; // NOT NULL field
		$this->NoJO->Required = TRUE; // Required field
		$this->NoJO->Sortable = TRUE; // Allow sort
		$this->NoJO->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->NoJO->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->NoJO->Lookup = new Lookup('NoJO', 'v203_costsheet', TRUE, 'NoJO', ["NoJO","","",""], [], [], [], [], [], [], '', '');
		$this->fields['NoJO'] = &$this->NoJO;

		// Tagihan
		$this->Tagihan = new DbField('v203_costsheet', 'v203_costsheet', 'x_Tagihan', 'Tagihan', '`Tagihan`', '`Tagihan`', 5, 14, -1, FALSE, '`Tagihan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tagihan->Nullable = FALSE; // NOT NULL field
		$this->Tagihan->Sortable = TRUE; // Allow sort
		$this->Tagihan->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Tagihan'] = &$this->Tagihan;

		// Shipper
		$this->Shipper = new DbField('v203_costsheet', 'v203_costsheet', 'x_Shipper', 'Shipper', '`Shipper`', '`Shipper`', 200, 100, -1, FALSE, '`Shipper`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Shipper->Sortable = TRUE; // Allow sort
		$this->fields['Shipper'] = &$this->Shipper;

		// Qty
		$this->Qty = new DbField('v203_costsheet', 'v203_costsheet', 'x_Qty', 'Qty', '`Qty`', '`Qty`', 200, 5, -1, FALSE, '`Qty`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Qty->Sortable = TRUE; // Allow sort
		$this->fields['Qty'] = &$this->Qty;

		// Cont
		$this->Cont = new DbField('v203_costsheet', 'v203_costsheet', 'x_Cont', 'Cont', '`Cont`', '`Cont`', 200, 5, -1, FALSE, '`Cont`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Cont->Sortable = TRUE; // Allow sort
		$this->fields['Cont'] = &$this->Cont;

		// Status
		$this->Status = new DbField('v203_costsheet', 'v203_costsheet', 'x_Status', 'Status', '`Status`', '`Status`', 16, 5, -1, FALSE, '`Status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Status->Sortable = TRUE; // Allow sort
		$this->Status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Status'] = &$this->Status;

		// doc
		$this->doc = new DbField('v203_costsheet', 'v203_costsheet', 'x_doc', 'doc', '`doc`', '`doc`', 200, 255, -1, FALSE, '`doc`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->doc->Sortable = TRUE; // Allow sort
		$this->fields['doc'] = &$this->doc;

		// Tujuan
		$this->Tujuan = new DbField('v203_costsheet', 'v203_costsheet', 'x_Tujuan', 'Tujuan', '`Tujuan`', '`Tujuan`', 200, 100, -1, FALSE, '`Tujuan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tujuan->Sortable = TRUE; // Allow sort
		$this->fields['Tujuan'] = &$this->Tujuan;

		// Kapal
		$this->Kapal = new DbField('v203_costsheet', 'v203_costsheet', 'x_Kapal', 'Kapal', '`Kapal`', '`Kapal`', 200, 100, -1, FALSE, '`Kapal`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Kapal->Sortable = TRUE; // Allow sort
		$this->fields['Kapal'] = &$this->Kapal;

		// BM
		$this->BM = new DbField('v203_costsheet', 'v203_costsheet', 'x_BM', 'BM', '`BM`', '`BM`', 202, 5, -1, FALSE, '`BM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->BM->Nullable = FALSE; // NOT NULL field
		$this->BM->Sortable = TRUE; // Allow sort
		$this->BM->Lookup = new Lookup('BM', 'v203_costsheet', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->BM->OptionCount = 3;
		$this->fields['BM'] = &$this->BM;

		// mts_id
		$this->mts_id = new DbField('v203_costsheet', 'v203_costsheet', 'x_mts_id', 'mts_id', '`mts_id`', '`mts_id`', 3, 11, -1, FALSE, '`mts_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->mts_id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->mts_id->IsPrimaryKey = TRUE; // Primary key field
		$this->mts_id->Sortable = TRUE; // Allow sort
		$this->mts_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['mts_id'] = &$this->mts_id;

		// Tanggal
		$this->Tanggal = new DbField('v203_costsheet', 'v203_costsheet', 'x_Tanggal', 'Tanggal', '`Tanggal`', CastDateFieldForLike("`Tanggal`", 0, "DB"), 133, 10, 0, FALSE, '`Tanggal`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tanggal->Sortable = TRUE; // Allow sort
		$this->Tanggal->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['Tanggal'] = &$this->Tanggal;

		// NoUrut
		$this->NoUrut = new DbField('v203_costsheet', 'v203_costsheet', 'x_NoUrut', 'NoUrut', '`NoUrut`', '`NoUrut`', 16, 4, -1, FALSE, '`NoUrut`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NoUrut->Sortable = TRUE; // Allow sort
		$this->NoUrut->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['NoUrut'] = &$this->NoUrut;

		// mts_jo_id
		$this->mts_jo_id = new DbField('v203_costsheet', 'v203_costsheet', 'x_mts_jo_id', 'mts_jo_id', '`mts_jo_id`', '`mts_jo_id`', 3, 11, -1, FALSE, '`mts_jo_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mts_jo_id->Sortable = TRUE; // Allow sort
		$this->mts_jo_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['mts_jo_id'] = &$this->mts_jo_id;

		// mts_jenis_id
		$this->mts_jenis_id = new DbField('v203_costsheet', 'v203_costsheet', 'x_mts_jenis_id', 'mts_jenis_id', '`mts_jenis_id`', '`mts_jenis_id`', 3, 11, -1, FALSE, '`mts_jenis_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mts_jenis_id->Sortable = TRUE; // Allow sort
		$this->mts_jenis_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['mts_jenis_id'] = &$this->mts_jenis_id;

		// Masuk
		$this->Masuk = new DbField('v203_costsheet', 'v203_costsheet', 'x_Masuk', 'Masuk', '`Masuk`', '`Masuk`', 5, 14, -1, FALSE, '`Masuk`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Masuk->Sortable = TRUE; // Allow sort
		$this->Masuk->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Masuk'] = &$this->Masuk;

		// Keluar
		$this->Keluar = new DbField('v203_costsheet', 'v203_costsheet', 'x_Keluar', 'Keluar', '`Keluar`', '`Keluar`', 5, 14, -1, FALSE, '`Keluar`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Keluar->Sortable = TRUE; // Allow sort
		$this->Keluar->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Keluar'] = &$this->Keluar;

		// Comment
		$this->Comment = new DbField('v203_costsheet', 'v203_costsheet', 'x_Comment', 'Comment', '`Comment`', '`Comment`', 201, 65535, -1, FALSE, '`Comment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Comment->Sortable = TRUE; // Allow sort
		$this->fields['Comment'] = &$this->Comment;

		// jns_id
		$this->jns_id = new DbField('v203_costsheet', 'v203_costsheet', 'x_jns_id', 'jns_id', '`jns_id`', '`jns_id`', 3, 11, -1, FALSE, '`jns_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->jns_id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->jns_id->IsPrimaryKey = TRUE; // Primary key field
		$this->jns_id->Sortable = TRUE; // Allow sort
		$this->jns_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['jns_id'] = &$this->jns_id;

		// jns_nama
		$this->jns_nama = new DbField('v203_costsheet', 'v203_costsheet', 'x_jns_nama', 'jns_nama', '`jns_nama`', '`jns_nama`', 201, 65535, -1, FALSE, '`jns_nama`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->jns_nama->Sortable = TRUE; // Allow sort
		$this->fields['jns_nama'] = &$this->jns_nama;

		// NoKolom
		$this->NoKolom = new DbField('v203_costsheet', 'v203_costsheet', 'x_NoKolom', 'NoKolom', '`NoKolom`', '`NoKolom`', 16, 4, -1, FALSE, '`NoKolom`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NoKolom->Sortable = TRUE; // Allow sort
		$this->NoKolom->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['NoKolom'] = &$this->NoKolom;

		// NoBL
		$this->NoBL = new DbField('v203_costsheet', 'v203_costsheet', 'x_NoBL', 'NoBL', '`NoBL`', '`NoBL`', 200, 50, -1, FALSE, '`NoBL`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NoBL->Sortable = TRUE; // Allow sort
		$this->fields['NoBL'] = &$this->NoBL;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`v203_costsheet`";
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

			// Get insert id if necessary
			$this->jo_id->setDbValue($conn->insert_ID());
			$rs['jo_id'] = $this->jo_id->DbValue;

			// Get insert id if necessary
			$this->mts_id->setDbValue($conn->insert_ID());
			$rs['mts_id'] = $this->mts_id->DbValue;

			// Get insert id if necessary
			$this->jns_id->setDbValue($conn->insert_ID());
			$rs['jns_id'] = $this->jns_id->DbValue;
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
			if (array_key_exists('jo_id', $rs))
				AddFilter($where, QuotedName('jo_id', $this->Dbid) . '=' . QuotedValue($rs['jo_id'], $this->jo_id->DataType, $this->Dbid));
			if (array_key_exists('mts_id', $rs))
				AddFilter($where, QuotedName('mts_id', $this->Dbid) . '=' . QuotedValue($rs['mts_id'], $this->mts_id->DataType, $this->Dbid));
			if (array_key_exists('jns_id', $rs))
				AddFilter($where, QuotedName('jns_id', $this->Dbid) . '=' . QuotedValue($rs['jns_id'], $this->jns_id->DataType, $this->Dbid));
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
		$this->NoJO->DbValue = $row['NoJO'];
		$this->Tagihan->DbValue = $row['Tagihan'];
		$this->Shipper->DbValue = $row['Shipper'];
		$this->Qty->DbValue = $row['Qty'];
		$this->Cont->DbValue = $row['Cont'];
		$this->Status->DbValue = $row['Status'];
		$this->doc->DbValue = $row['doc'];
		$this->Tujuan->DbValue = $row['Tujuan'];
		$this->Kapal->DbValue = $row['Kapal'];
		$this->BM->DbValue = $row['BM'];
		$this->mts_id->DbValue = $row['mts_id'];
		$this->Tanggal->DbValue = $row['Tanggal'];
		$this->NoUrut->DbValue = $row['NoUrut'];
		$this->mts_jo_id->DbValue = $row['mts_jo_id'];
		$this->mts_jenis_id->DbValue = $row['mts_jenis_id'];
		$this->Masuk->DbValue = $row['Masuk'];
		$this->Keluar->DbValue = $row['Keluar'];
		$this->Comment->DbValue = $row['Comment'];
		$this->jns_id->DbValue = $row['jns_id'];
		$this->jns_nama->DbValue = $row['jns_nama'];
		$this->NoKolom->DbValue = $row['NoKolom'];
		$this->NoBL->DbValue = $row['NoBL'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`jo_id` = @jo_id@ AND `mts_id` = @mts_id@ AND `jns_id` = @jns_id@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('jo_id', $row) ? $row['jo_id'] : NULL;
		else
			$val = $this->jo_id->OldValue !== NULL ? $this->jo_id->OldValue : $this->jo_id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@jo_id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		if (is_array($row))
			$val = array_key_exists('mts_id', $row) ? $row['mts_id'] : NULL;
		else
			$val = $this->mts_id->OldValue !== NULL ? $this->mts_id->OldValue : $this->mts_id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@mts_id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		if (is_array($row))
			$val = array_key_exists('jns_id', $row) ? $row['jns_id'] : NULL;
		else
			$val = $this->jns_id->OldValue !== NULL ? $this->jns_id->OldValue : $this->jns_id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@jns_id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "v203_costsheetlist.php";
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
		if ($pageName == "v203_costsheetview.php")
			return $Language->phrase("View");
		elseif ($pageName == "v203_costsheetedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "v203_costsheetadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "v203_costsheetlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("v203_costsheetview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("v203_costsheetview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "v203_costsheetadd.php?" . $this->getUrlParm($parm);
		else
			$url = "v203_costsheetadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("v203_costsheetedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("v203_costsheetadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("v203_costsheetdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "jo_id:" . JsonEncode($this->jo_id->CurrentValue, "number");
		$json .= ",mts_id:" . JsonEncode($this->mts_id->CurrentValue, "number");
		$json .= ",jns_id:" . JsonEncode($this->jns_id->CurrentValue, "number");
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
		if ($this->jo_id->CurrentValue != NULL) {
			$url .= "jo_id=" . urlencode($this->jo_id->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		if ($this->mts_id->CurrentValue != NULL) {
			$url .= "&mts_id=" . urlencode($this->mts_id->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		if ($this->jns_id->CurrentValue != NULL) {
			$url .= "&jns_id=" . urlencode($this->jns_id->CurrentValue);
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
			for ($i = 0; $i < $cnt; $i++)
				$arKeys[$i] = explode(Config("COMPOSITE_KEY_SEPARATOR"), $arKeys[$i]);
		} else {
			if (Param("jo_id") !== NULL)
				$arKey[] = Param("jo_id");
			elseif (IsApi() && Key(0) !== NULL)
				$arKey[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKey[] = Route(2);
			else
				$arKeys = NULL; // Do not setup
			if (Param("mts_id") !== NULL)
				$arKey[] = Param("mts_id");
			elseif (IsApi() && Key(1) !== NULL)
				$arKey[] = Key(1);
			elseif (IsApi() && Route(3) !== NULL)
				$arKey[] = Route(3);
			else
				$arKeys = NULL; // Do not setup
			if (Param("jns_id") !== NULL)
				$arKey[] = Param("jns_id");
			elseif (IsApi() && Key(2) !== NULL)
				$arKey[] = Key(2);
			elseif (IsApi() && Route(4) !== NULL)
				$arKey[] = Route(4);
			else
				$arKeys = NULL; // Do not setup
			if (is_array($arKeys)) $arKeys[] = $arKey;

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = [];
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_array($key) || count($key) != 3)
					continue; // Just skip so other keys will still work
				if (!is_numeric($key[0])) // jo_id
					continue;
				if (!is_numeric($key[1])) // mts_id
					continue;
				if (!is_numeric($key[2])) // jns_id
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
				$this->jo_id->CurrentValue = $key[0];
			else
				$this->jo_id->OldValue = $key[0];
			if ($setCurrent)
				$this->mts_id->CurrentValue = $key[1];
			else
				$this->mts_id->OldValue = $key[1];
			if ($setCurrent)
				$this->jns_id->CurrentValue = $key[2];
			else
				$this->jns_id->OldValue = $key[2];
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
		$this->NoJO->setDbValue($rs->fields('NoJO'));
		$this->Tagihan->setDbValue($rs->fields('Tagihan'));
		$this->Shipper->setDbValue($rs->fields('Shipper'));
		$this->Qty->setDbValue($rs->fields('Qty'));
		$this->Cont->setDbValue($rs->fields('Cont'));
		$this->Status->setDbValue($rs->fields('Status'));
		$this->doc->setDbValue($rs->fields('doc'));
		$this->Tujuan->setDbValue($rs->fields('Tujuan'));
		$this->Kapal->setDbValue($rs->fields('Kapal'));
		$this->BM->setDbValue($rs->fields('BM'));
		$this->mts_id->setDbValue($rs->fields('mts_id'));
		$this->Tanggal->setDbValue($rs->fields('Tanggal'));
		$this->NoUrut->setDbValue($rs->fields('NoUrut'));
		$this->mts_jo_id->setDbValue($rs->fields('mts_jo_id'));
		$this->mts_jenis_id->setDbValue($rs->fields('mts_jenis_id'));
		$this->Masuk->setDbValue($rs->fields('Masuk'));
		$this->Keluar->setDbValue($rs->fields('Keluar'));
		$this->Comment->setDbValue($rs->fields('Comment'));
		$this->jns_id->setDbValue($rs->fields('jns_id'));
		$this->jns_nama->setDbValue($rs->fields('jns_nama'));
		$this->NoKolom->setDbValue($rs->fields('NoKolom'));
		$this->NoBL->setDbValue($rs->fields('NoBL'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
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

		// Comment
		$this->Comment->ViewValue = $this->Comment->CurrentValue;
		$this->Comment->ViewCustomAttributes = "";

		// jns_id
		$this->jns_id->ViewValue = $this->jns_id->CurrentValue;
		$this->jns_id->ViewCustomAttributes = "";

		// jns_nama
		$this->jns_nama->ViewValue = $this->jns_nama->CurrentValue;
		$this->jns_nama->ViewCustomAttributes = "";

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

		// Comment
		$this->Comment->LinkCustomAttributes = "";
		$this->Comment->HrefValue = "";
		$this->Comment->TooltipValue = "";

		// jns_id
		$this->jns_id->LinkCustomAttributes = "";
		$this->jns_id->HrefValue = "";
		$this->jns_id->TooltipValue = "";

		// jns_nama
		$this->jns_nama->LinkCustomAttributes = "";
		$this->jns_nama->HrefValue = "";
		$this->jns_nama->TooltipValue = "";

		// NoKolom
		$this->NoKolom->LinkCustomAttributes = "";
		$this->NoKolom->HrefValue = "";
		$this->NoKolom->TooltipValue = "";

		// NoBL
		$this->NoBL->LinkCustomAttributes = "";
		$this->NoBL->HrefValue = "";
		$this->NoBL->TooltipValue = "";

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
		$this->jo_id->EditValue = $this->jo_id->CurrentValue;
		$this->jo_id->ViewCustomAttributes = "";

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

		// doc
		$this->doc->EditAttrs["class"] = "form-control";
		$this->doc->EditCustomAttributes = "";
		if (!$this->doc->Raw)
			$this->doc->CurrentValue = HtmlDecode($this->doc->CurrentValue);
		$this->doc->EditValue = $this->doc->CurrentValue;
		$this->doc->PlaceHolder = RemoveHtml($this->doc->caption());

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

		// mts_id
		$this->mts_id->EditAttrs["class"] = "form-control";
		$this->mts_id->EditCustomAttributes = "";
		$this->mts_id->EditValue = $this->mts_id->CurrentValue;
		$this->mts_id->ViewCustomAttributes = "";

		// Tanggal
		$this->Tanggal->EditAttrs["class"] = "form-control";
		$this->Tanggal->EditCustomAttributes = "";
		$this->Tanggal->EditValue = FormatDateTime($this->Tanggal->CurrentValue, 8);
		$this->Tanggal->PlaceHolder = RemoveHtml($this->Tanggal->caption());

		// NoUrut
		$this->NoUrut->EditAttrs["class"] = "form-control";
		$this->NoUrut->EditCustomAttributes = "";
		$this->NoUrut->EditValue = $this->NoUrut->CurrentValue;
		$this->NoUrut->PlaceHolder = RemoveHtml($this->NoUrut->caption());

		// mts_jo_id
		$this->mts_jo_id->EditAttrs["class"] = "form-control";
		$this->mts_jo_id->EditCustomAttributes = "";
		$this->mts_jo_id->EditValue = $this->mts_jo_id->CurrentValue;
		$this->mts_jo_id->PlaceHolder = RemoveHtml($this->mts_jo_id->caption());

		// mts_jenis_id
		$this->mts_jenis_id->EditAttrs["class"] = "form-control";
		$this->mts_jenis_id->EditCustomAttributes = "";
		$this->mts_jenis_id->EditValue = $this->mts_jenis_id->CurrentValue;
		$this->mts_jenis_id->PlaceHolder = RemoveHtml($this->mts_jenis_id->caption());

		// Masuk
		$this->Masuk->EditAttrs["class"] = "form-control";
		$this->Masuk->EditCustomAttributes = "";
		$this->Masuk->EditValue = $this->Masuk->CurrentValue;
		$this->Masuk->PlaceHolder = RemoveHtml($this->Masuk->caption());
		if (strval($this->Masuk->EditValue) != "" && is_numeric($this->Masuk->EditValue))
			$this->Masuk->EditValue = FormatNumber($this->Masuk->EditValue, -2, -2, -2, -2);
		

		// Keluar
		$this->Keluar->EditAttrs["class"] = "form-control";
		$this->Keluar->EditCustomAttributes = "";
		$this->Keluar->EditValue = $this->Keluar->CurrentValue;
		$this->Keluar->PlaceHolder = RemoveHtml($this->Keluar->caption());
		if (strval($this->Keluar->EditValue) != "" && is_numeric($this->Keluar->EditValue))
			$this->Keluar->EditValue = FormatNumber($this->Keluar->EditValue, -2, -2, -2, -2);
		

		// Comment
		$this->Comment->EditAttrs["class"] = "form-control";
		$this->Comment->EditCustomAttributes = "";
		$this->Comment->EditValue = $this->Comment->CurrentValue;
		$this->Comment->PlaceHolder = RemoveHtml($this->Comment->caption());

		// jns_id
		$this->jns_id->EditAttrs["class"] = "form-control";
		$this->jns_id->EditCustomAttributes = "";
		$this->jns_id->EditValue = $this->jns_id->CurrentValue;
		$this->jns_id->ViewCustomAttributes = "";

		// jns_nama
		$this->jns_nama->EditAttrs["class"] = "form-control";
		$this->jns_nama->EditCustomAttributes = "";
		$this->jns_nama->EditValue = $this->jns_nama->CurrentValue;
		$this->jns_nama->PlaceHolder = RemoveHtml($this->jns_nama->caption());

		// NoKolom
		$this->NoKolom->EditAttrs["class"] = "form-control";
		$this->NoKolom->EditCustomAttributes = "";
		$this->NoKolom->EditValue = $this->NoKolom->CurrentValue;
		$this->NoKolom->PlaceHolder = RemoveHtml($this->NoKolom->caption());

		// NoBL
		$this->NoBL->EditAttrs["class"] = "form-control";
		$this->NoBL->EditCustomAttributes = "";
		if (!$this->NoBL->Raw)
			$this->NoBL->CurrentValue = HtmlDecode($this->NoBL->CurrentValue);
		$this->NoBL->EditValue = $this->NoBL->CurrentValue;
		$this->NoBL->PlaceHolder = RemoveHtml($this->NoBL->caption());

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
					$doc->exportCaption($this->jo_id);
					$doc->exportCaption($this->NoJO);
					$doc->exportCaption($this->Tagihan);
					$doc->exportCaption($this->Shipper);
					$doc->exportCaption($this->Qty);
					$doc->exportCaption($this->Cont);
					$doc->exportCaption($this->Status);
					$doc->exportCaption($this->doc);
					$doc->exportCaption($this->Tujuan);
					$doc->exportCaption($this->Kapal);
					$doc->exportCaption($this->BM);
					$doc->exportCaption($this->mts_id);
					$doc->exportCaption($this->Tanggal);
					$doc->exportCaption($this->NoUrut);
					$doc->exportCaption($this->mts_jo_id);
					$doc->exportCaption($this->mts_jenis_id);
					$doc->exportCaption($this->Masuk);
					$doc->exportCaption($this->Keluar);
					$doc->exportCaption($this->Comment);
					$doc->exportCaption($this->jns_id);
					$doc->exportCaption($this->jns_nama);
					$doc->exportCaption($this->NoKolom);
					$doc->exportCaption($this->NoBL);
				} else {
					$doc->exportCaption($this->jo_id);
					$doc->exportCaption($this->NoJO);
					$doc->exportCaption($this->Tagihan);
					$doc->exportCaption($this->Shipper);
					$doc->exportCaption($this->Qty);
					$doc->exportCaption($this->Cont);
					$doc->exportCaption($this->Status);
					$doc->exportCaption($this->doc);
					$doc->exportCaption($this->Tujuan);
					$doc->exportCaption($this->Kapal);
					$doc->exportCaption($this->BM);
					$doc->exportCaption($this->mts_id);
					$doc->exportCaption($this->Tanggal);
					$doc->exportCaption($this->NoUrut);
					$doc->exportCaption($this->mts_jo_id);
					$doc->exportCaption($this->mts_jenis_id);
					$doc->exportCaption($this->Masuk);
					$doc->exportCaption($this->Keluar);
					$doc->exportCaption($this->jns_id);
					$doc->exportCaption($this->NoKolom);
					$doc->exportCaption($this->NoBL);
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
						$doc->exportField($this->jo_id);
						$doc->exportField($this->NoJO);
						$doc->exportField($this->Tagihan);
						$doc->exportField($this->Shipper);
						$doc->exportField($this->Qty);
						$doc->exportField($this->Cont);
						$doc->exportField($this->Status);
						$doc->exportField($this->doc);
						$doc->exportField($this->Tujuan);
						$doc->exportField($this->Kapal);
						$doc->exportField($this->BM);
						$doc->exportField($this->mts_id);
						$doc->exportField($this->Tanggal);
						$doc->exportField($this->NoUrut);
						$doc->exportField($this->mts_jo_id);
						$doc->exportField($this->mts_jenis_id);
						$doc->exportField($this->Masuk);
						$doc->exportField($this->Keluar);
						$doc->exportField($this->Comment);
						$doc->exportField($this->jns_id);
						$doc->exportField($this->jns_nama);
						$doc->exportField($this->NoKolom);
						$doc->exportField($this->NoBL);
					} else {
						$doc->exportField($this->jo_id);
						$doc->exportField($this->NoJO);
						$doc->exportField($this->Tagihan);
						$doc->exportField($this->Shipper);
						$doc->exportField($this->Qty);
						$doc->exportField($this->Cont);
						$doc->exportField($this->Status);
						$doc->exportField($this->doc);
						$doc->exportField($this->Tujuan);
						$doc->exportField($this->Kapal);
						$doc->exportField($this->BM);
						$doc->exportField($this->mts_id);
						$doc->exportField($this->Tanggal);
						$doc->exportField($this->NoUrut);
						$doc->exportField($this->mts_jo_id);
						$doc->exportField($this->mts_jenis_id);
						$doc->exportField($this->Masuk);
						$doc->exportField($this->Keluar);
						$doc->exportField($this->jns_id);
						$doc->exportField($this->NoKolom);
						$doc->exportField($this->NoBL);
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

		$_SESSION['NoJOCostSheet'] = $this->NoJO->AdvancedSearch->SearchValue;
		if ($_SESSION['NoJOCostSheet'] != '') {
			$this->terminate('r203_costsheet.php');
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