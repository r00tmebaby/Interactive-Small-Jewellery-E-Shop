<?php
ob_start();
session_start();
define("access",true);

function credentials(){
	$select = mysqli_query(conn(),"Select * from users");
	$array = array();
	while($rows = mysqli_fetch_array($select)){
		$array[] = md5($rows['username'] . $rows['password']); 
	}
	return $array;
}
function logged(){
	if(!isset($_SESSION['username']) && !isset($_SESSION['username'])){
		return false;
	}
	else{
	   return true;
	}
}
function admin_level(){
	if(is_admin()){
		$type = is_admin();
		switch($type[3]){
			case 1:  return "Staff";break;
			case 2:  return "Moderator";break;
			case 3:  return "Administrator";break;
			default: return "User";break;
		}
	}
}
function errors($array){
		/* array [text=>text type], $type =1:succces, $type=2:error, $type=3:warning */
	    foreach($array as $text => $values){
			$keys = array_keys($values);
			$val  = array_values($values);
	    	switch($val[0]){
	    	case 1: echo '<div  class="alert alert-success" role="alert"><strong>'.$keys[0].'</strong></div>' ; break;
	    	case 2: echo '<div  class="alert alert-danger" role="danger"><strong>'.$keys[0].'</strong></div>' ; break;
	    	case 3: echo '<div  class="alert alert-warning" role="warning"><strong>'.$keys[0].'</strong></div>' ; break;
	    	default: echo '<div  class="alert alert-info" role="info"><strong>'.$keys[0].'</strong></div>'; break;
	    }
	}
}

function login(){
	$error = array();
    if(isset($_POST['username']) && isset($_POST['password'])){
	    if(in_array(md5($_POST['username'].$_POST['password']),credentials())){
	    	$_SESSION['username'] = $_POST['username'];
	    	$_SESSION['password'] = $_POST['password'];	
		    refresh();
	    }
	    else{
			return false;
	        $error[] = ["Wrong Credentials!" => 2];			
	    }
		errors($error);
	}
}

function logout(){
	if(isset($_POST['logout'])){
		session_destroy();
		refresh();
	}
}

function is_admin(){
    if(logged()){
	   $all = mysqli_fetch_array(mysqli_query(conn(),"Select * from users where username = '".$_SESSION['username']."'"));
	   if($all['rights'] > 0){
		               
		   return array(
		// Return Admin Information Array //
		/* 0 */   $all['id'],        
		/* 1 */   $all['username'],
		/* 2 */   $all['password'],
		/* 3 */   $all['rights'],
		/* 4 */   $all['last_login'],
		/* 5 */   $all['modules'],
		/* 6 */   $all['email'],
		/* 7 */   $all['address'],
		/* 8 */   $all['phone']);
		////////////////////////////////////
	   }
	}
	else{
		return false;
	}
}

function admin_menu(){
	$info      = is_admin();
	$icon      = "";
	$var       = "";
	$json_data = json_decode($info[5]);
	if($json_data <> NULL){
		// $key = module name, $value = Menu Text and icon
	    foreach($json_data as $key => $value){
	        print '
	    		<li>
                    <a href="?page='.$key.'">'.$value.'</a>
                </li>	
	    	';
	    }
	}
}

function menu_drop(){
	$all_categories = mysqli_query(conn(),"Select * from category");
	$catid = 0;
	$print= "";
		while($menu = mysqli_fetch_array($all_categories)){
			$catid++;
			$print .= '<a class="dropdown-item" href="?p=catalogues&cat='.$catid.'">'.$menu['category_name'].'</a>';	
		}
        if($catid == 0){
			$print = "<a class='dropdown-item'>Not Added Yet</a>";
		}
    echo $print;		
}
function error(){
	require("error.php");
}
function cat_name($integer){
	$all_categories = mysqli_query(conn(),"Select * from category");
	$count =0;
	while($menu = mysqli_fetch_array($all_categories)){
		$count++;
		if($integer == $count){
	        return $menu['category_name'];
		}
	}		
}
function pos_int($var){
	$cat = (int)$var;
    if($cat > 0){
		return true;
	}
	return false;
}
function reload(){
			echo "<script type='text/javascript'>

                 (function()
                 {
                   if( window.localStorage )
                   {
                     if( !localStorage.getItem('firstLoad') )
                     {
                       localStorage['firstLoad'] = true;
                       window.location.reload();
                     }  
                     else
                       localStorage.removeItem('firstLoad');
                   }
                 })();
                 
                 </script>";	
}
function add_item_modal($marking){
	foreach($marking as $key => $value){
		$pr_details  = mysqli_fetch_array(mysqli_query(conn(),"Select * from products where id='".$value."'"));
		
		if($pr_details['availability'] > 0){
		    $instock = '<i class="fas fa-check"></i> &nbsp;In Stock &nbsp; <i class="far fa-arrow-alt-circle-up"></i>&nbsp;'.$pr_details['availability'].'';
	    }
        else{
            $instock = '<i class="fas fa-times-circle"></i>&nbsp; Not In Stock';
        }
		echo'
			 <div class="modal  fade" id="modal'.$value.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                           <div class="modal-dialog modal-lg" role="document">
                             <div class=" modal-basket modal-content">
                               <div class="modal-header">
                                 <h6 class="modal-title" id="exampleModalLongTitle"><span class="product-title-big">'.$pr_details['name'].'</span></h6>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                 </button>
                               </div>
                               <div class="modal-body">
                                    <div class="row">										   
							    <div  class=" left-side-modal col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-sp-12">
								   <img id="#image-zoom" style="margin-left:20%;" width="60%" src="'.$pr_details['image'].'"/>
								   <div>
								       <div>
									       <h3 class="product-price item-desc-header"><i class="fas fa-info-circle"></i> &nbsp;Item Description</h3>
										   <p class="item-desc-text">&nbsp;'.($pr_details['description']).'</p>
									   </div>
								   </div>
								</div>
								<div class="right-side-modal col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-sp-12">
								   <div class="product-additional-info">   
                                                  <div class="social-sharing">
                                           
                                                    <ul>
                                                       <li><a href="" title="Share" target="_blank"><i class="fab fa-facebook fa-2x"></i></a></li>
                                                       <li><a href="" title="Tweet" target="_blank"><i class="fab fa-twitter-square fa-2x"></i></a></li>
                                                       <li><a href="" title="Google+" target="_blank"><i class="fab fa-google-plus-square fa-2x"></i></a></li>
                                                       <li><a href="" title="Pinterest" target="_blank"><i class="fab fa-pinterest-square fa-2x"></i></a></li>
                                                    </ul>
                                                </div>
									<div class="product-price">
                                                    <span> &#x23;  &nbsp;</span><span itemprop="price" >'.$pr_details['code'].'</span>
									</div>												
									<div class="product-price">
                                                    <span> <i class="fas fa-money-bill-alt"></i> &nbsp; </span><span itemprop="price" content="'.$pr_details['price'].'">&#163;'.$pr_details['price'].'</span>
									</div>
									
									<div  class="product-price">
                                                   '.$instock.'
									</div>
									<div style="display:inline-block;border:none" class="product-price">
									      
                                                        <form method="post" >
                                                        <div class="input-group">
                                                             <span class="input-group-btn">
                                                                 <button type="button" style="height:38px;margin-right:2px" class="btn btn-danger btn-number"  data-type="minus" data-field="quant">
                                                                   <i class="fas fa-minus"></i>
                                                                 </button>
                                                             </span>
												 <input type="hidden" name="id" value="'.$pr_details['id'].'" >
                                                             <input type="text"  name="quant" class="form-control input-number" style="width:70px;" value="0" min="0" max="10">
                                                             <span class="input-group-btn">
                                                                 <button type="button"  style="height:38px;margin-left:2px" class="btn btn-success btn-number" data-type="plus" data-field="quant">
                                                                     <i class="fas fa-plus"></i>
                                                                 </button>
                                                        </div>
											  <input class="btn btn-warning add-to-cart" name="add_cart" value="Add to cart" type="submit"/>
								            </form>
								        </div>
										
					                <div id="block-reassurance">
                                                
                                                    <div class="block-reassurance-item">
                                                      <img src="https://demo1.leotheme.com/leo_penguinwatch_demo/modules/blockreassurance/img/ic_verified_user_black_36dp_1x.png" alt="10 days return">
                                                      <span class="h6">10 days return</span>
                                                    </div>
                                                
                                                    <div class="block-reassurance-item">
                                                      <img src="https://demo1.leotheme.com/leo_penguinwatch_demo/modules/blockreassurance/img/ic_local_shipping_black_36dp_1x.png" alt="29% off for purchase via Paypal">
                                                      <span class="h6">29% off for purchase via Paypal</span>
                                                    </div>
                                                
                                                    <div class="block-reassurance-item">
                                                      <img src="https://demo1.leotheme.com/leo_penguinwatch_demo/modules/blockreassurance/img/ic_swap_horiz_black_36dp_1x.png" alt="Free UK delivery">
                                                      <span class="h6">Free UK delivery</span>
                                                    </div>                                  
                                                </div>	
					            </div>													
                                        </div>
				        </div>
                                </div>
                            </div>
		    </div>
		</div>';
	}				
}
function basket_session(){
	
	if(isset($_POST['add_cart']) && isset($_POST['quant']) && isset($_POST['id'])){
		$quant = (int)$_POST['quant'];
		$ids   = (int)$_POST['id'];		
		if($quant > 0 && $ids > 0){
			$_SESSION['product'][] = [$ids => $quant];
		}
	}				
}



function basket(){
$products    = "";
$grand_total = 0;
if(isset($_POST['clear_basket'])){
		unset($_SESSION['product']);
}
if(isset($_SESSION['product']) && !empty($_SESSION['product'])){

    $same_amount  = 0;
	$total_amount = 0;
	$count        = 0;
	
    foreach($_SESSION['product'] as $values){	
	    $count++;
        foreach($values as $product_id => $product_amount){
  
			$all_pr = mysqli_query(conn(),"Select * from products where id={$product_id}");
			while($rows = mysqli_fetch_array($all_pr)){
				$info_name  = $rows['name'];
				$info_code  = $rows['code'];
				$info_total_price =  $product_amount * $rows['price'];
				$info_price =$rows['price'];
			}
			$total_amount +=$product_amount;			
    	}
         $products .= "  <tbody><tr>
		                     <td>".$count."</td>
						     <td>".$info_code."</td>
		                     <td>".$info_name."</td>
							 <td>&#163;".$info_price."</td>
                             <td>x".$product_amount."</td>
                             <td>&#163;".$info_total_price."</td>							 		 
							 </tr> 
						</tbody>";
        $grand_total += $info_total_price;						
    }
	echo '
	<div data-toggle="modal" data-target="#exampleModals" class="shopping">  
<span >'.$total_amount.'</span>    
		<i  class="fas fa-cart-arrow-down"></i>
		
    </div>
	';
}

echo'
<div class="modal fade" id="exampleModals" style="display:none"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span class="product-title-big">Your Basket</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	    <table width="100%" class="table-stripped table" border="1">
		 <thead>
		 <tr class="">
		    <td>#</td>
		    <td>Part No</td>
			<td>Item Name</td>
			<td>Single Price</td>
			<td>Quantity</td>
			<td>Price Total</td>
		 </tr></thead>
		 
		 '. $products.'
		</table>
        <table width="100%" class="table" border="0">
		<thead style="padding:0;margin:0;">
		   <tr>
		       <td colspan="6" style="text-align:right"><i class="fas fa-calculator"></i> Grand Total</td>
		   </tr>
		</thead>
		   <tbody>
		   	<tr>
		       <td colspan="6" style="font-size:14pt;text-weight:900;text-align:right">&#163;'.$grand_total.'</td>
		    </tr>
		   </tbody>
		</table>
		</div>
		<div class="modal-footer">
		<form method="post">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		   <input type="submit" name="clear_basket" value="Clear Basket" class="btn btn-secondary"/>
           <input type="submit" name="buy_all" value="Check Out" class="btn btn-warning"/>
		</form>
      </div>
      </div>

    </div>
  </div>


';
}
function refresh($time=0){
	echo'<meta http-equiv="refresh" content="'.$time.'">';
}
function ip() {
    $ipaddress = '0.0.0.0';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return ip2long($ipaddress);
}

function protect($var=NULL) {
$newvar = @preg_replace('/[^a-zA-Z0-9\_\-\.]/', '', $var);
if (@preg_match('/[^a-zA-Z0-9\_\-\.]/', $var)) { }
return $newvar;
}
function rrmdir($dir) { 
   if (is_dir($dir)) { 
     $objects = scandir($dir); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object); 
       } 
     } 
     reset($objects); 
     rmdir($dir); 
   } 
}

function magic_quotes($var){
	return (! get_magic_quotes_gpc ()) ? addslashes ($var) : $var;
}

//from html_entity_decode() manual page
function unhtmlentities ($string) {
   $trans_tbl =get_html_translation_table (HTML_ENTITIES );
   $trans_tbl =array_flip ($trans_tbl );
   return strtr ($string ,$trans_tbl );
}

function conn(){
    /////////////////////////////////////////////////////////////////////
    // MYSQLi Configuration /////////////////////////////////////////////
    $option["t_host"]            = ""; // HostName :: IP Adress
    $option["t_user"]            = ""; // MySQL User
    $option["t_pass"]            = ""; // MySQL Pass
    $option["t_database"]        = ""; // MySQL Database
    $link = mysqli_connect($option["t_host"],$option["t_user"],$option["t_pass"],$option["t_database"]);
    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    else{
      return($link);
    }
  mysqli_close($link);
}
?>
