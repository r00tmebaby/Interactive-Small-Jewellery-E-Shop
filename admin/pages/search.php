<?php
if(!defined('access')) {
          header('HTTP/2.0 404 Page Not Found');
          exit;
}
$link = "";
 if(isset($_GET['itemid'])){
	 $link = '<span style="margin-left:2%;position:absolute;"><a href="?page=search"><span class="glyphicon glyphicon-hand-left  " aria-hidden="true"></span>  </a></span>';
 }
?>
<div class="row">
    <div class="col-lg-12">
       <h1 class="page-header">Search Items <?php echo $link;?></h1>
    </div>
    <!-- /.col-lg-12 -->

	<div class="col-sm-5 ">
        <div class="panel panel-default">
                <div class="panel-heading ">
				   <i class="fa fa-search"></i> Search Product  
				</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-12">						
	                            <form class="form-inline" id="products" method="post">
									<div class="form-group select-group">
								
                                        <select class="form-control mr-sm-2" name="itm_type">									
	                            		   <option value="1" >By Name</option>
	                            		   <option value="2" >By ItemCode</option>
	                            		   <option value="3" >By Price</option>
	                            		</select>
	                            	</div>
	                            	<div class="input-group custom-search-form">
                                        <input autocomplete="off" onkeyup="functions('products')" spellcheck="false" autocorrect="off" type="text" name="srch_item" placeholder="Search.." class="form-control">
                                    </div>
                                </form>
							</div>
							<div class="col-sm-12">
                                <div id="productsm"></div>
                            </div>							
                        </div>
				    </div>
				</div>
		</div>
	</div>

<?php
$all_category = mysqli_query(conn(),"Select * from category");
$all_products = mysqli_query(conn(),"Select * from products");
 $select   = "";
 $button   = "";
 $select1  = "";
 $content  = "";
 $rowsPerPage = 22;
 
if(isset($_GET['itemid'])){
	$id = (int)$_GET['itemid'];
	if($id > 0){
		
	if(isset($_POST['edit_product']) && isset($_POST['id'])){
		    $ids = (int)$_POST['id'];
			$upadetsa = false;
			if($ids > 0){
				$contentd = magic_quotes($_POST['product_description']);
				$cont = unhtmlentities (addslashes (trim ($contentd)));
			    $upadetsa= 
			    mysqli_query(conn(),"Update `products` set 
			      `name` = '".$_POST['product_name']."',
			      `category` = '".$_POST['product_category']."',
			      `description` = '".$cont."',
			      `code` = '".$_POST['product_code']."',
			      `price` = '".$_POST['product_price']."',
			      `availability` = '".$_POST['product_quantity']."',
			      `image` = '".$_POST['product_image']."'
			      where `id`='".$_POST['id']."'
			    ");
			}
	        if($upadetsa){
	        	print("<div  class='alert alert-success'>Your product has been successfully updated</div>");
				$all_products = mysqli_query(conn(),"Select * from products where id = {$id}");
	       
	        }
	        else{
	        	print("<div class='alert alert-danger'>Your product has not been updated</div>");
	        }
	}
	elseif(isset($_POST['delete_product']) && isset($_POST['id'])){
			$ids = (int)$_POST['id'];
			$upadetsa = false;
			if($ids > 0){
		         $upadetsa = mysqli_query(conn(),"Delete from products where id = {$ids}");
			     if($upadetsa){
	            	print("<div  class='alert alert-success'>Your product has been successfully deleted</div>");
			     	$all_products = mysqli_query(conn(),"Select * from products where id = {$id}");
	            
	            }
	            else{
	            	print("<div class='alert alert-danger'>Your product has not been deleted</div>");
	            }
			}
	}
	else{
		 $all_products = mysqli_query(conn(),"Select * from products where id = {$id}");
	}
	 
	while($rowsa = mysqli_fetch_array($all_products)){
    ?>
		
	<div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
			  <?php echo $rowsa['name'] ?>
			</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">  	 
		                    <div class="col-sm-6" >
		                      <img class="image-articul" src=" <?php echo $rowsa['image'] ?>">
		                    </div>
        	                <div class="col-sm-6">
                                <form class="form"  method="post">       	
			                        <div class="form-group">
                                        <label for="exampleInputPassword1">Product Name</label>
                                        <input class="form-control" type="text" value=" <?php echo $rowsa['name']; ?>"name="product_name"/>
			                	    </div>
			                        <div class="form-group">
                                        <label for="exampleInputPassword1">Product Code</label>				  
        	                	        <input class="form-control" type="text" value=" <?php echo $rowsa['code']; ?>"name="product_code"/>
			                        </div>
			                		<div class="form-group">
                                        <label for="exampleInputPassword1">Product Price</label>        		  
			                			<input class="form-control" type="text" value=" <?php echo $rowsa['price']; ?>" name="product_price"/>
			                		</div>
			                        <div class="form-group">
                                        <label for="exampleInputPassword1">Product Category</label>  					
			                	        <input class="form-control" type="text" value=" <?php echo $rowsa['category']; ?>" name="product_category"/>
			                        </div>
			                		<div class="form-group">
                                        <label for="exampleInputPassword1">Product Image</label>        		  
			                		    <input class="form-control" type="text" value=" <?php echo $rowsa['image']; ?>" name="product_image"/>
			                	    </div>
			                        <div class="form-group">
                                        <label for="exampleInputPassword1">Product Quantity</label>          		       
			                			<input class="form-control" type="text" value=" <?php echo $rowsa['availability']; ?>" name="product_quantity"/>
			                        </div>  
			                		<div class="form-group">
                                        <label for="exampleInputPassword1">Product Description</label>       		  
			                		    <textarea class="form-control text-area" name="product_description"> <?php echo stripslashes (htmlspecialchars ($rowsa['description'])); ?></textarea>
        	                	    </div>
        	                        <div class="form-group">
			                	        <input class="form-control" type="hidden" value=" <?php echo $rowsa['id']; ?>" name="id"/>
                                        <input class="btn btn-primary" type="submit" value="Edit Product" name="edit_product"/> 
                                       <input class="btn btn-primary" type="submit" value="Delete Product" name="delete_product"/> 				  
                                    </div>
			                	</form>	
			                </div>
						</div>
					</div>
				</div>
			</div>
	</div>
<?php 
    } 
	
	}	
}
else{
$query = mysqli_query(conn(),"Select * from products");
$counts = mysqli_num_rows($query);
	
$i  =0 ;
$image= "";
while ($row  = mysqli_fetch_array($query))
	{
		$i += 1;    
        if($counts > $i){$end = ",";}else{$end = "";}
		$image  ="\'<img width=250 height=200 src=".$row['image']." >\'";
        $content .= 
		"[
    		' <a href=/admin/?page=search&itemid=".$row['id']."><span onMouseOut=\"return nd();\" onMouseOver=\"overlib(".$image.")\">" . $row['name'] ."</span></a>',
			' " . $row['category'] .           " ',
			' " . $row['code'] .  " ',
			' " . $row['price'] .     " ',
			' " . $row['availability'] .     " '
		]" .$end;
    }
?>

<script type="text/javascript">google.charts.load('current',{'packages':['table']});
google.charts.setOnLoadCallback(drawTable);
function drawTable(){
	var cssClassNames={'headerRow':'cssHeaderRow','pagingTextStyle':'legend','tableRow':'cssTableRow','oddTableRow':'cssOddTableRow','selectedTableRow':'cssSelectedTableRow','hoverTableRow':'cssHoverTableRow','headerCell':'cssHeaderCell','tableCell':'cssTableCell','rowNumberCell':'cssRowNumberCell'};
	var data=new google.visualization.DataTable();
data.addColumn('string','Name');
data.addColumn('string','Category');
data.addColumn('string','Item Code');
data.addColumn('string','Price');
data.addColumn('string','Availability');
data.addRows([<?php echo $content;?>]);
var table=new google.visualization.Table(document.getElementById('table_divs'));

table.draw(data,{
	allowHtml:!0,
    showRowNumber:!0,
    width:'100%',
'cssClassNames':cssClassNames,
showRowNumber:!0,
page:'enable',
pageSize:
<?php echo $rowsPerPage?>,
pagingSymbols:{prev:'<img width=\'30px\' src=\'../images/prev.png\'/>',next:'<img width=\'30px\' src=\'../images/next.png\'/>',page:'color:red'},pagingButtonsConfiguration:'auto'})}</script>
</br>

<?php
    if(mysqli_num_rows($all_products) > 0){ 
      echo '
		<div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
				   Products	List	
				</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">  		
		                    <div id="table_divs"></div>
		                </div>
		            </div>
	            </div>
            </div>
        </div>';	
    }
 } 
 
?>
</div>
<script>
$("#user_names").submit(function(e){
    return false;
});
</script>