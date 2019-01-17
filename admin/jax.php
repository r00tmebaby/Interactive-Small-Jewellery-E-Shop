<?php
require_once("../config.php");

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    if(!logged()){
	    exit();
    }
    else{
        $account = $_SESSION['username'];   
        switch(trim($_GET['f'])){
			
    	    case "products":
			    $return = "";
			    if(isset($_POST['itm_type']) && !empty($_POST['srch_item'])){
			        $srchitem = protect($_POST['srch_item']);
			        $type     = (int)$_POST['itm_type'];
			        $tr       = "";
			    	$count    = 0;
			    	switch($type){
			    		case 1:  $query = mysqli_query(conn(),"Select * from products where name  like '{$srchitem}%'");  break;
			    		case 2:  $query = mysqli_query(conn(),"Select * from products where code  like '{$srchitem}%'");  break;
			    		case 3:  $query = mysqli_query(conn(),"Select * from products where price like '{$srchitem}%'");  break;
			    		default: $query = mysqli_query(conn(),"Select * from products where name  like '{$srchitem}%'");   break;
			    	}	    
			    	while($row = mysqli_fetch_array($query)){
			    		$count++;
			                switch($type){
			    		         case 1:  $tr = "Matching Names";  $return .= " <tr><td><a href='?page=search&itemid=".$row['id']."'>".$row['name']."</a></td></tr>";  break;
			    		         case 2:  $tr = "Matching Codes";  $return .= " <tr><td><a href='?page=search&itemid=".$row['id']."'>".$row['code']."</a></td></tr>"; break;
			    		         case 3:  $tr = "Matching Prices";  $return .= " <tr><td><a href='?page=search&itemid=".$row['id']."'>".$row['price']."</a></td></tr>" ; break;
			    		         default: $tr = "Matching Names";  $return .= "<tr><td><a href='?page=search&itemid=".$row['id']."'>".$row['name']."</a></td></tr>"; break;
			    	        }
			    	}					
			    	
			    	if($count  === 0){					         
                        $return = "<tr><td align='center'>We did not find any results</tr></td>";                   
			    	}
			    	echo 
			    		"<div class='col-sm-12'>
			    		    <div class='show-names'>
			    			   <table class='table table-bordered table-hover dataTable no-footer dtr-inline'>
			    			       <thead style='background:#f5f5f5;'>
			    				       <tr>
			    					       <td>{$tr} <i class='fa fa-arrow-circle-down'></i></td>
			    					   </tr>
			    				   </thead>
			    				<tbody>							 
                                  ".$return."
			    			    </tbody>
			    		    </div>
			    		</div>"
			    		;
			    }
    		break; 
    	    case "user_names":
			    $return = "";
				$count  = 0;
				$tr = "";
			    if(!empty($_POST['user_search'])){
			        $srchitem = protect($_POST['user_search']);

			    	$query = mysqli_query(conn(),"Select * from users where username  like '{$srchitem}%'");
		    
			    	while($row = mysqli_fetch_array($query)){
			    		$count++;
			            $tr = "Matching Names";  
						$return .= " <tr><td><a href='?page=users&id=".$row['id']."'>".$row['username']."</a></td></tr>"; 
			    	}					
			    	
			    	if($count  === 0){					         
                        $return = "<tr><td align='center'>No Result!</tr></td>";                   
			    	}
			    	echo 
			    		"<div class='col-sm-12'>
			    		    <div class='show-names'>
			    			   <table class='table table-bordered table-hover dataTable no-footer dtr-inline'>
			    			       <thead style='background:#f5f5f5;'>
			    				       <tr>
			    					       <td>{$tr}</td>
			    					   </tr>
			    				   </thead>
			    				<tbody>							 
                                  ".$return."
			    			    </tbody>
			    		    </div>
			    		</div>"
			    		;
			    }
    		break; 
            case "add_product_infom":
			        switch($_POST['categories1']){
						case "Pendants": echo"
						                            <ul style='font-size:10pt;'>
						                               <li><b>Height:</b> Large Heart: 21.2mm | Mid Heart: 16.15mm | Small Heart: 13.8mm</li>
                                                       <li><b>Width:</b>Large Heart: 22.4mm | Mid Heart: 17.7mm | Small Heart: 14.1mm</li>
                                                       <li><b>Thickness:</b> 0.8mm</li>
													</ul>
													<ul style='font-size:10pt;'>
                                                       <li><b>Bail opening:</b> 6.4mm</li>
													   <li><b>Stone material:</b> blue lab created opal</li>
                                                       <li><b>Stone shape:</b> oval</li>
                                                       <li><b>Total number of CZ stones:</b> 1</li>
                                                       <li><b>Stone setting:</b> prong setting</li>
													</ul>
													<ul style='font-size:10pt;'>
                                                       <li><b>Metal:</b> 925 sterling silver</li>
                                                       <li><b>Finish:</b> high polish & oxidized</li>													   
						                            </ul>";
						break;
						
			        	case "Earrings": echo"
						                            <ul style='font-size:10pt;'>
						                               <li><b>Height:</b> 13.8mm</li>
                                                       <li><b>Width:</b>14.1mm</li>
                                                       <li><b>Thickness:</b> 0.8mm</li>
													</ul>
													<ul style='font-size:10pt;'>
													   <li><b>Stone material:</b> blue lab created opal</li>
													   <li><b>Center Stone Size:</b> 7</li>
                                                       <li><b>Stone shape:</b> round</li>
													   <li><b>Center Stone Carat weight:</b> 1.28ct</li>
                                                       <li><b>Total number of CZ stones:</b> 2</li>
                                                       <li><b>Stone setting:</b> prong setting</li>
													</ul>
													<ul style='font-size:10pt;'>
                                                       <li><b>Metal:</b> 925 sterling silver</li>
													   <li><b>Plating:</b> Rodium Plated</li>
                                                       <li><b>Finish:</b>high polish</li>													   
						                            </ul>";
						break;
			        	case "Rings":     
                                    echo"
						                            <ul style='font-size:10pt;'>
						                               <li><b>Top of ring height:</b> 13mm</li>
                                                       <li><b>Top of ring width:</b>18mm</li>
                                                       <li><b>Band width:</b> 2mm</li>
													   <li><b>Shank width:</b> 2.5mm</li>
													</ul>
													<ul style='font-size:10pt;'>
													   <li><b>Stone material:</b> blue lab created opal</li>
													   <li><b>Center Stone Size:</b> 7</li>
                                                       <li><b>Stone shape:</b> round</li>
													   <li><b>Center Stone Carat weight:</b> 1.28ct</li>
                                                       <li><b>Total number of CZ stones:</b> 2</li>
                                                       <li><b>Stone setting:</b> prong setting</li>
													</ul>
													<ul style='font-size:10pt;'>
                                                       <li><b>Metal:</b> 925 sterling silver</li>
													   <li><b>Plating:</b> Rodium Plated</li>
                                                       <li><b>Finish:</b>high polish</li>													   
						                            </ul>";
						break;
						
			        	case "Chains":     
                                    echo"
													<ul style='font-size:10pt;'>
													   <li><b>Length:</b> 18 inches</li>
													   <li><b>Gauge:</b> 010</li>
                                                       <li><b>Width:</b> 0.77mm</li>
													   <li><b>Clasp:</b> spring clasp</li>
                                                       <li><b>Total number of CZ stones:</b> 2</li>
                                                       <li><b>Stone setting:</b> prong setting</li>
													</ul>
													<ul style='font-size:10pt;'>
                                                       <li><b>Metal:</b> 925 sterling silver</li>
                                                       <li><b>Finish:</b>high polish</li>													   
						                            </ul>
													<p style='font-size:12pt'>Made in Italy</p>
													";								
						
						break;
			        	case "Necklaces":  
                                    echo"
                                                    <p style='font-size:10pt'>This stylish Sterling Silver Lab Opal Bracelet is exceptionally high quality. The luminous Sterling Silver has been crafted to create a very elegant look! 
													Embellish your beautiful wrist with this fine piece!</p>
													<ul style='font-size:10pt;'>
                                                       <li><b>Lenght:</b> 7in. with .5 in. Extension</li>
													   <li><b>Metal:</b> Rodium Plated</li>
                                                       <li><b>Finish:</b>high polish</li>													   
						                            </ul>";
																	
						
						break;
			        	case "Bracelets":  break;
			        	default: return;          break;
			        }

            break;			
        }
    }
}

?>


