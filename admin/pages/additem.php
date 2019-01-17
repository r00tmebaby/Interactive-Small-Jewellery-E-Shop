<?php
if(!defined('access')) {
          header('HTTP/2.0 404 Page Not Found');
          exit;
}
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Products</h1>
    </div>
    <!-- /.col-lg-12 -->

             
<?php
$all_category = mysqli_query(conn(),"Select * from category");
$all_products = mysqli_query(conn(),"Select * from products");
$select       = "";
$button       = "";
$select1      = "";
$content      = "";
$rowsPerPage  = 22;
$start        = "";
$end          = "";
if(mysqli_num_rows($all_category) > 0){
	while($cat_names = mysqli_fetch_array($all_category)){
	    $select  .= "<option value='".$cat_names['id']."'>".$cat_names['category_name']."</option>";
	    $select1 .= "<option value='".$cat_names['category_name']."'>".$cat_names['category_name']."</option>";
   }
   $button .= '<input class="btn btn-primary" type="submit" value="Delete" name="delete_cat"/> ';
}
else{
	$start = "<!--"; $end = "-->";
}


?>                      
        <div class="col-xs-3">
            <div class="panel panel-default">
                <div class="panel-heading">
				   New Category			
				</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">                 
                            <form  method="post" role="form">
		                    <div class="form-group">                      
                                <input class="form-control" type="text" placeholder="Category Name" name="category_name"/>
		                    </div>
							<?php echo $start; ?>
							<div class="form-group">
                                <select required class='form-control' name='categories'>							
								<option selected disabled>Select Category</option>
								<?php echo $select; ?>
								</select>
		                    </div>
							<?php echo $end; ?>
							<div class="form-group"> 
                                <input class="btn btn-primary" type="submit" value="Add New" name="add_cat"/>                                 
								<?php echo $button; ?>
		                    </div>					
                            </form>
                        </div>
			        </div>
	    	    </div>
	        </div>
	    </div>
 
<?php

 if(isset($_POST['category_name']) && !empty($_POST['category_name']) && isset($_POST['add_cat'])){
	if (!is_dir('../images/products/'.$_POST['category_name'])) {     
        mkdir(('../images/products/'.$_POST['category_name']), 0777, true);
	}
	if(is_dir('../images/products/'.$_POST['category_name'])){
	        $update =  mysqli_query(conn(),"Insert into category (category_name) values ('".$_POST['category_name']."')");
	        if($update){
	        	echo("<div  class='alert alert-success'>You have added new category</div>");
	        	 reload();
	        }
	        else{
	        	echo("<div class='alert alert-danger'>New category has not been added</div>");
	        }
		}
		else{
			echo("We can not create directory ".$_POST['category_name']." automatically. Please create it manually to be able to add a products");
	}
    
 }
 if(isset($_POST['categories']) && isset($_POST['delete_cat'])){	 
	$int = (int)$_POST['categories'];
	if(is_dir('../images/products/'.$_POST['category_name'])){
		rrmdir('../images/products/'.$_POST['category_name']);
	}
    $update =  mysqli_query(conn(),"Delete from category where id={$int}");
    reload();
 }

    if(
       !empty($_POST['product_name']) && 
	   !empty($_POST['categories1']) &&
       !empty($_POST['product_code']) &&	   
	   !empty($_POST['product_price']) && 
	   !empty($_POST['product_quantity']) && 
	   !empty($_FILES["product_image"]["tmp_name"]) &&
	   isset($_POST['add_product'])
	   )	 
    {
	$check = getimagesize($_FILES["product_image"]["tmp_name"]);	
	$dir   = "../images/products/".$_POST['categories1']."/";
    $file  = $dir . basename($_FILES["product_image"]['name']);
    $type  = pathinfo($file,PATHINFO_EXTENSION);
	if($check == false) {
      echo("<div class='alert alert-danger'>This file is not an image</div>");
    }
	elseif(!is_dir($dir)) {
      echo("<div class='alert alert-danger'>Directory ".$_POST['categories1']." does not exist in images/products/. Please create it manually</div>");
    }
	elseif (file_exists($file)) {
      echo("<div class='alert alert-danger'>Sorry, file already exists.</div>");
    }
    elseif ($_FILES["product_image"]["size"] > 900000) {
      echo("<div class='alert alert-danger'>Sorry, your file is too large.</div>"); 
    }
    elseif($type != "jpg" && $type != "png" && $type != "jpeg"&& $type != "gif" ) {
      echo("<div class='alert alert-danger'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>");
    } 
	else{
		
		if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $file)){
	            $update1 =  mysqli_query(conn(),"Insert into products (name,category,description,code,price,availability,image) values 
	                 (
	                    '".trim($_POST['product_name'])."',
	                    '".trim($_POST['categories1'])."',
	                    '".trim($_POST['product_description'])."',
	                    '".trim($_POST['product_code'])."',
	                    '".trim($_POST['product_price'])."',
	                    '".trim($_POST['product_quantity'])."',
	                    '".trim($file)."'
	                 )"
	            );
		    if($update1){
	           	echo("<div  class='alert alert-success'>You have added a new product</div>");
	           	
	        }
	        else{
	           	echo("<div class='alert alert-danger'>New product has not been added</div>");
	            
		    }		
	    }
    }
}

if(mysqli_num_rows($all_category) > 0){
?>	
                    
<div class="col-sm-3">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
			   New Products		
			</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <form  id="add_product_infom" method="post" enctype="multipart/form-data">
	                    	<div class="form-group">
	                    	    <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Procuct Name"  required name="product_name"/>
	                    		</div>
	                    	    <div class="form-group">
	                    	  	  <input class="form-control" type="text" placeholder="Product Code" required name="product_code"/>
	                    		</div>
	                    	    <div class="form-group">
	                    	  	  <input class="form-control" type="text" placeholder="Product Price" required  name="product_price"/>
	                    		</div>
                                <div class="form-group">
                                    <input required id="image" type="file" name="product_image" >
                                </div>
	                    	    <div class="form-group">
	                    	  	  <input class="form-control" type="number" value="100" placeholder="Product Quantity" required name="product_quantity"/>
	                    		</div>
	                    		<div class="form-group">
	                    		<?php echo $start; ?>
	                    		<select required onchange="functions('add_product_infom')" class='form-control' name='categories1'>
                                 <option selected disabled>Select Category</option>
	                    		 <?php echo $select1; ?>
	                    		</select>
	                    		<?php echo $end; ?>
	                    		</div>
						<div class="form-group">
		    <div class="col-sm-6 ">
		      <input class="form-control btn btn-primary" type="reset" value="Reset"/> 
			</div>
			<div class="col-sm-6 ">
              <input class="form-control btn btn-primary" onclick="myFunction()" type="submit" value="Add" name="add_product"/> 
            </div>
		</div>
                            </div>	
	                    </div>
					</div>
				</div>
			</div>
		</div>
    </div> 
	
							<div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
				                   Additional Information For :category Category	
				                </div>
                                <div class="panel-body">
                                    <div class="row">	
	                                   <div class="col-sm-12">
									   <div id="add_product_infomm"></div>
				                           <div class="form-group"><div class="form-group">
			                                <textarea id="editor" class="form-control" name="product_description"></textarea>
			                             </div>
								    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
	</form>
 
	 
<?php
}
?>
  </div>   