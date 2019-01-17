<?php
if(!defined('access')) {
          header('HTTP/2.0 404 Page Not Found');
          exit;
}
    $current_page = (isset($_GET['page'])) ? $_GET['page'] : 'home';

	$info      = is_admin();
	$json_data = json_decode($info[5]);
	
	if($json_data <> NULL){
	    foreach($json_data as $key => $value){
	         $active_pages[$key]    = $_SERVER['DOCUMENT_ROOT'].'/admin/pages/'.$key.'.php';
	    }
	}

    if(@$active_pages[$current_page] && file_exists($active_pages[$current_page]))
    {
    	include($active_pages[$current_page]);	
    }
    else
    {
    	 include("error.php"); 
    }