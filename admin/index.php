<?php
include("../config.php");
if(!defined('access')) {
          header('HTTP/2.0 404 Page Not Found');
          exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="apple-touch-icon" sizes="76x76" href="favicon.png" />
    <link rel="icon" type="image/png" href="favicon.png" />   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Zdravko Georgiev @ r00tme">

    <title>Phoenix Jewellery Store </title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
	 <link href="css/style.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
<?php
$error = array();
if(!logged()){
login();

 ?>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
					
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">  
                        <form method="post" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="username" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="submit" value="Login" class="btn btn-lg btn-success btn-block"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 
<?php
}
else{
if(is_admin()){
	logout();
	
?>	
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="navbar-header" style="height:40px">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">    
				<div class="logo" style="position:absolute; bottom:5px" >
   	                     <img width="9%" src="../images/logoleft6.png">
   		                <img width="22%" src="../images/logoright6.png">
                </div></a>
				
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
			 <li class="dropdown-toggle"><h5 class="header-title" ><?php echo admin_level(); ?></h5></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Акаунт</strong>
                                    <span class="pull-right text-muted">
                                        <em>Вчера</em>
                                    </span>
                                </div>
                                <div>Тук ще има съобщения от други потребители..</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Ime Test</strong>
                                    <span class="pull-right text-muted">
                                        <em>V4era</em>
                                    </span>
                                </div>
                                <div>Tuk shte ima suon6teniq..</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Ime Test</strong>
                                    <span class="pull-right text-muted">
                                        <em>V4era</em>
                                    </span>
                                </div>
                                <div>Tuk shte ima suon6teniq..</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
  
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li><form method="post">
                        <li class="btn-clean"><i class="fa fa-sign-out fa-fw"></i><input  value= "Logout" type="submit" name="logout">
                        </li></form>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
             
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
						    <form method="post" id="user_names">
                            <div class="input-group custom-search-form">	  
                                <input type="text" class="form-control" name="user_search" placeholder="Search User">
                                <span class="input-group-btn">
                                    <button onclick="functions('user_names')" class="btn btn-default" type="button">
                                      <i  class="fa fa-search"></i>
                                    </button>								
                                </span>
							</form>

                            </div>
                            <div class="col-sm-12">
                                <div id="user_namesm"></div>
                            </div>	
                        </li>
                        <?php admin_menu(); ?>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
               <?php include("loader.php"); ?>      
        </div>
        <!-- /#page-wrapper -->

    </div>
<script>
function functions(func){
         var str = $('#'+func).serialize();
         $.ajax({
             url: 'jax.php?f='+func,
             type: "POST",
             data: ''+str+'',
             success: function(msgc)
             {
                 $('#'+func+'m').empty().append(""+msgc+"").hide().fadeIn("fast");
     	
             }
         });
     	
     }
	 
function open_url(link, target)
{
$('#'+target).fadeTo(0,0.0);
$('#'+target).empty().append('<img src="loader.gif">').fadeTo(0,1.0);

 $.ajax(
 {
  url: link,
  
  success: function(msgc)
  {
   $('#'+target).fadeTo(0,0.0);
   $('#'+target).empty().append(msgc).fadeTo(0,5.0);
  }
 });
 return false;
}

</script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <script src="dist/js/sb-admin-2.js"></script>
	<script src="js/jquery.mask.min.js"></script>
<script src="//cdn.ckeditor.com/4.11.1/full/ckeditor.js"></script>
</body>
<script src="tinymce/tinymce.min.js"></script>
 <script type="text/javascript">
tinymce.init({
        selector: "textarea",
        plugins: [
                "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
        ],
        
        toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
        toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
        toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
        menubar: false,
        toolbar_items_size: 'small',

});</script>

</html>

<?php

}
   else{
	  session_destroy();
	  refresh();
  }
}

?>

