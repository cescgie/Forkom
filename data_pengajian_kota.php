<?php
/*
Plugin Name: Data Pengajian Kota
Plugin URI: http://www.forkom-jerman.org
Description: Tatacara Update Content Web FORKOM
Author: FORKOM Jerman
Version: 1.0
Author URI: http://www.forkom-jerman.org
*/
namespace DPK\Controller;
include_once(__DIR__ . '/controllers/Setup.php');

$dataPengajianKota = new DataPengajianKota();

register_activation_hook(__FILE__, [&$dataPengajianKota, '_install']);
register_deactivation_hook(__FILE__, [&$dataPengajianKota, '_uninstall']);
