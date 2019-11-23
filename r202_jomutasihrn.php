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
$r202_jomutasihrn = new r202_jomutasihrn();

// Run the page
$r202_jomutasihrn->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<?php
// ambil data jenis mutasi
$q = 'select * from t002_jenis where NoKolom < 25 order by NoKolom';
$r_jenis = Conn()->Execute($q);

// ambil data mutasi
// check parameter
$where = '';
if ($_SESSION['Periode'] != '' and $_SESSION['NoJO'] != '') {
	$where = ' where Periode = \''.$_SESSION['Periode'].'\' and vw.NoJO = \''.$_SESSION['NoJO'].'\'';
}
else {
	if ($_SESSION['Periode'] != '') {
		$where = ' where Periode = \''.$_SESSION['Periode'].'\'';
	}

	if ($_SESSION['NoJO'] != '') {
		$where = ' where vw.NoJO = \''.$_SESSION['NoJO'].'\'';
	}
}
$q = 'select * from
	v202_jomutasihrn vw
	left join t001_jo jo on vw.NoJO = jo.NoJO ' . $where . ' order by jo.Status, vw.NoJO, vw.NoKolom'; //echo $q; //exit;
$r_mutasi = Conn()->Execute($q);

include_once 'r202_jomutasihrn.inc.php';

//$_SESSION['Periode'] = '';
//$_SESSION['NoJO'] = '';
?>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$r202_jomutasihrn->terminate();
?>