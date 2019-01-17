<div id='cover'></div>

<?php 
if(!defined('access')) {
          header('HTTP/2.0 404 Page Not Found');
          exit;
}
      $all_products = mysqli_query(conn(),"Select * from products where category='".cat_name($_GET['cat'])."'");

      $max = mysqli_num_rows($all_products);
	  $array = array();

	  $i=0;
	  $m=0;
	  $end = "";
      $marking = array();
	  while($row = mysqli_fetch_array($all_products)){
		  $i++;	   
		  $array[] = $row['id'];
			  
		}
		
$output = array_chunk($array, 16,true); 

$k=0;
foreach($output as $key => $value){
	$k++;
	
		echo
			"		
			<div class='feature pagefx softpage'>						
			  <div class='catalog-title'>
			     <span>".cat_name($_GET['cat'])."</span><br>
				 <span>Category ".$k."</span>
			  </div>
			  <img width='100%' src='images/header.jpg'/>
			  	<table class='product-table' >
				    <tr>
            ";
						  
		foreach($value as $values){
		$m++;	
		$all_prod = mysqli_fetch_array(mysqli_query(conn(),"Select * from products where id='".$values."'"));
		$marking[] = $all_prod['id'];
		
		    echo "
			            <td >
			               <table class='product-column'>
				              <tr>
				       	        <td align='center'><b><span class='product-title'>&#163;".($all_prod['price'])."</span></b></td>
				       		  </tr>
				       		  <tr>
				       	        <td align='center'><span class='item-nr'>".$m."</span><img class='cat-image' data-toggle='modal' data-target='#modal".$all_prod['id']."'   src='".$all_prod['image']."'/></td>
				       		  </tr>
				       	    </table>
				        </td>";	
			if($m % 4 == 0){
		    	echo "</tr><tr>";
		    }		
	    }
			echo "</tr></table></div>";
}

		echo
			"		
			<div class='feature pagefx softpage'>
			  <div class='catalog-title'>
			     <span>".cat_name($_GET['cat'])."</span><br>
				 <span>Category #</span>
			  </div>	
               <img width='100%' src='images/header.jpg'/>			   
			   <img style='display:table;padding-top:40px;margin:0 auto' width='50%' src='../images/soon.png'/>
			</div>
 
</div>
            ";

  add_item_modal($marking)
?>
