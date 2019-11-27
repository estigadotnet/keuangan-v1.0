<?php
namespace PHPMaker2020\p_keuangan_v1_0;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start();
?>
<?php include_once "autoload.php"; ?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$r203_costsheet = new r203_costsheet();

// Run the page
$r203_costsheet->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<?php
// ambil data jenis mutasi
//$q = 'select * from t002_jenis where NoKolom < 25 order by NoKolom';
//$r_jenis = Conn()->Execute($q);

// ambil data mutasi
// check parameter
$where = '';
if ($_SESSION['NoJOCostSheet'] != '') {
	$where = ' where NoJO = \''.$_SESSION['NoJOCostSheet'].'\'';
}

$q = 'select * from
	v203_costsheet' . $where . ''; //echo $q; //exit;
$r_costsheet = Conn()->Execute($q);

include_once 'r203_costsheet.inc.php';

//$_SESSION['Periode'] = '';
//$_SESSION['NoJO'] = '';
?>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$r203_costsheet->terminate();
?>