<?php
if(!defined('access')) {
          header('HTTP/1.0 403 Forbidden');
          exit;
}
    $current_page = (isset($_GET['p'])) ? $_GET['p'] : 'home';
	
    $active_pages['home'] = $_SERVER['DOCUMENT_ROOT'].'/pages/home.php';
	$active_pages['catalogues'] = $_SERVER['DOCUMENT_ROOT'].'/pages/catalogues.php';
    $active_pages['promotions']   = $_SERVER['DOCUMENT_ROOT'].'/pages/promotions.php';
    $active_pages['contacts']  = $_SERVER['DOCUMENT_ROOT'].'/pages/contacts.php';
    $active_pages['about'] = $_SERVER['DOCUMENT_ROOT'].'/pages/about.php';

    if(@$active_pages[$current_page] && file_exists($active_pages[$current_page]))
    {
    	include($active_pages[$current_page]);	
    }
    else
    {
    	require("error.php");
    	
    }