<?php
namespace PHPMaker2020\p_keuangan_v1_0;

// Menu Language
if ($Language && function_exists(PROJECT_NAMESPACE . "Config") && $Language->LanguageFolder == Config("LANGUAGE_FOLDER")) {
	$MenuRelativePath = "";
	$MenuLanguage = &$Language;
} else { // Compat reports
	$LANGUAGE_FOLDER = "../lang/";
	$MenuRelativePath = "../";
	$MenuLanguage = new Language();
}

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
$topMenu->addMenuItem(8, "mi_c401_home", $MenuLanguage->MenuPhrase("8", "MenuText"), $MenuRelativePath . "c401_home.php", -1, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}c401_home.php'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(9, "mci_Setup", $MenuLanguage->MenuPhrase("9", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(2, "mi_t002_jenis", $MenuLanguage->MenuPhrase("2", "MenuText"), $MenuRelativePath . "t002_jenislist.php", 9, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}t002_jenis'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(12, "mi_t101_saldoawal", $MenuLanguage->MenuPhrase("12", "MenuText"), $MenuRelativePath . "t101_saldoawallist.php", 9, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}t101_saldoawal'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(10, "mci_Transaksi", $MenuLanguage->MenuPhrase("10", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(1, "mi_t001_jo", $MenuLanguage->MenuPhrase("1", "MenuText"), $MenuRelativePath . "t001_jolist.php", 10, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}t001_jo'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(3, "mi_t102_mutasi", $MenuLanguage->MenuPhrase("3", "MenuText"), $MenuRelativePath . "t102_mutasilist.php?cmd=resetall", 10, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}t102_mutasi'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(23, "mci_Laporan", $MenuLanguage->MenuPhrase("23", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(27, "mi_v202_jomutasihrn", $MenuLanguage->MenuPhrase("27", "MenuText"), $MenuRelativePath . "v202_jomutasihrnlist.php", 23, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}v202_jomutasihrn'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(28, "mi_v203_costsheet", $MenuLanguage->MenuPhrase("28", "MenuText"), $MenuRelativePath . "v203_costsheetlist.php", 23, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}v203_costsheet'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(15, "mi_r201_mutasi", $MenuLanguage->MenuPhrase("15", "MenuText"), $MenuRelativePath . "r201_mutasismry.php", 23, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}r201_mutasi'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(11, "mci_General", $MenuLanguage->MenuPhrase("11", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(4, "mi_t301_employees", $MenuLanguage->MenuPhrase("4", "MenuText"), $MenuRelativePath . "t301_employeeslist.php", 11, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}t301_employees'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(5, "mi_t302_userlevels", $MenuLanguage->MenuPhrase("5", "MenuText"), $MenuRelativePath . "t302_userlevelslist.php", 11, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}t302_userlevels'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(6, "mi_t303_userlevelpermissions", $MenuLanguage->MenuPhrase("6", "MenuText"), $MenuRelativePath . "t303_userlevelpermissionslist.php", 11, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}t303_userlevelpermissions'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(7, "mi_t304_audittrail", $MenuLanguage->MenuPhrase("7", "MenuText"), $MenuRelativePath . "t304_audittraillist.php", 11, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}t304_audittrail'), FALSE, FALSE, "", "", TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(8, "mi_c401_home", $MenuLanguage->MenuPhrase("8", "MenuText"), $MenuRelativePath . "c401_home.php", -1, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}c401_home.php'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(9, "mci_Setup", $MenuLanguage->MenuPhrase("9", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(2, "mi_t002_jenis", $MenuLanguage->MenuPhrase("2", "MenuText"), $MenuRelativePath . "t002_jenislist.php", 9, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}t002_jenis'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(12, "mi_t101_saldoawal", $MenuLanguage->MenuPhrase("12", "MenuText"), $MenuRelativePath . "t101_saldoawallist.php", 9, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}t101_saldoawal'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(10, "mci_Transaksi", $MenuLanguage->MenuPhrase("10", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(1, "mi_t001_jo", $MenuLanguage->MenuPhrase("1", "MenuText"), $MenuRelativePath . "t001_jolist.php", 10, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}t001_jo'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(3, "mi_t102_mutasi", $MenuLanguage->MenuPhrase("3", "MenuText"), $MenuRelativePath . "t102_mutasilist.php?cmd=resetall", 10, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}t102_mutasi'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(23, "mci_Laporan", $MenuLanguage->MenuPhrase("23", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(27, "mi_v202_jomutasihrn", $MenuLanguage->MenuPhrase("27", "MenuText"), $MenuRelativePath . "v202_jomutasihrnlist.php", 23, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}v202_jomutasihrn'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(28, "mi_v203_costsheet", $MenuLanguage->MenuPhrase("28", "MenuText"), $MenuRelativePath . "v203_costsheetlist.php", 23, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}v203_costsheet'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(15, "mi_r201_mutasi", $MenuLanguage->MenuPhrase("15", "MenuText"), $MenuRelativePath . "r201_mutasismry.php", 23, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}r201_mutasi'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(11, "mci_General", $MenuLanguage->MenuPhrase("11", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(4, "mi_t301_employees", $MenuLanguage->MenuPhrase("4", "MenuText"), $MenuRelativePath . "t301_employeeslist.php", 11, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}t301_employees'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(5, "mi_t302_userlevels", $MenuLanguage->MenuPhrase("5", "MenuText"), $MenuRelativePath . "t302_userlevelslist.php", 11, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}t302_userlevels'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(6, "mi_t303_userlevelpermissions", $MenuLanguage->MenuPhrase("6", "MenuText"), $MenuRelativePath . "t303_userlevelpermissionslist.php", 11, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}t303_userlevelpermissions'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(7, "mi_t304_audittrail", $MenuLanguage->MenuPhrase("7", "MenuText"), $MenuRelativePath . "t304_audittraillist.php", 11, "", AllowListMenu('{FBB5EF95-13BB-496B-B131-E8C649D0628A}t304_audittrail'), FALSE, FALSE, "", "", TRUE);
echo $sideMenu->toScript();
?>