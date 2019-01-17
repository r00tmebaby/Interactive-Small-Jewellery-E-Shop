<?php
require("config.php");
	
basket_session();
if(!defined('access')) {
          header('HTTP/1.0 403 Forbidden');
          exit;
}
?>

<!doctype html>  
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>

<head>
	<script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
	<meta charset="utf-8">

	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
	   Remove this if you use the .htaccess -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title></title>
	<meta name="description" content="Phoenix Jewellery Shop">
	<meta name="author" content="@r00tme">

	<!--  Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- CSS : implied media="all" -->
	<link rel="stylesheet" href="css/style5e1f.css?v=2">
	<link rel="stylesheet" href="wow_book/wow_book.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/preview.css">
	<script src="js/mylibs/less-1.0.41.min.js" type="text/javascript"></script>

	<!-- Uncomment if you are specifically targeting less enabled mobile browsers
	<link rel="stylesheet" media="handheld" href="css/handheld.css?v=2">  -->

	<link href='http://fonts.googleapis.com/css?family=News+Cycle' rel='stylesheet' type='text/css'> 
	<!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
	<style>
	.js #features {
	margin-left: -12000px; width: 100%;
}
</style>
<link rel="icon" type="image/png" href="favicon.png" />  
<link rel="apple-touch-icon" sizes="76x76" href="favicon.png" />
</head>	 
<body>  
    <div class="logo" style="position:absolute;" >
   	    <img width="50px" height="50px" src="images/logoleft.png">
   		<img width="120px" src="images/logoright.png">
    </div>
	<div class="top-nav">	
	
	        <ul>
	        	<li><a  href='/' title='goto first page'   >Home</a></li>
	        	<li><a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  >Catalogues</a>
                     <section class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php menu_drop(); ?>
                     </section>
				</li>
				<li><a  href='?p=promotions' >Promotions</a></li>
	        	<li><a  href='?p=contacts' >Contacts</a></li>
	        	<li><a  href='?p=about' >About Us</a></li>
	        </ul>
			
    </div>

	<nav class="nav">	
		    <ul>
			   
			    <li style="float:left;"><i><?php  basket();?></i></li>
				<li><i class="fas fa-user"></i></li>
		    	<li id='first'     ><i class="fas fa-fast-backward"></i></li>
		    	<li id='back'      ><i class="fas fa-hand-point-left"></i></li>
		    	<li id='next'      ><i class="fas fa-hand-point-right"></i></li>
		    	<li id='last'      ><i class="fas fa-fast-forward"></i></li>
<!--		    <li id='zoomin'    ><i class="fas fa-search-plus"></i></li>
		    	<li id='zoomout'   ><i class="fas fa-search-minus"></i></li>-->
		    	<li id='slideshow' ><i class="fas fa-play-circle"></i></li>
		    </ul>			
	</nav>	
	
    <!-- Component -->	
	<div id="container">
&nbsp;		
	<div id="main">
		
  		<div id='features'>		
            <?php	include("loader.php");  ?>
		</div> <!-- features -->
    
	</div>
</div>



	<script type="text/javascript" src="js/libs/jquery-1.7.1.min.js"></script>
	<script src="../../../ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></sscript>
	<script>// !window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.7.1.min.js"%3E%3C/script%3E'))</script>
	<script type="text/javascript" src="wow_book/wow_book.min.js"></script>
	<style>
	</style>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#features').wowBook({
				 height : 700
				,width  : 1000
				,centeredWhenClosed : true
				,hardcovers : false
				,turnPageDuration : 1000
				,numberedPages : [1,-2]
				,transparentPages : true
				,controls : {
						next      : '#next',
						back      : '#back',
						first     : '#first',
						last      : '#last',
						slideShow : '#slideshow'
					}
			}).css({'display':'none', 'margin':'auto'}).fadeIn(1000);

			$("#cover").click(function(){
				$.wowBook("#features").advance();
			});
		});
	</script>

	<!-- scripts concatenated and minified via ant build script-->
	<script src="js/plugins.js"></script>
<script src="node_modules/trumbowyg/dist/trumbowyg.min.js"></script>

<script src="node_modules/trumbowyg/dist/plugins/upload/trumbowyg.cleanpaste.min.js"></script>
<script src="node_modules/trumbowyg/dist/plugins/upload/trumbowyg.pasteimage.min.js"></script>
<script>
    // Doing this in a loaded JS file is better, I put this here for simplicity
    $('#editor').trumbowyg();
</script>
	<script src="js/script.js"></script>

	<!-- end concatenated and minified scripts-->

	<!--[if lt IE 7 ]>
	<script src="js/libs/dd_belatedpng.js"></script>
	<script> DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg background-images </script>
	<![endif]-->

	</body>

</html>

<script>
//plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>

<script>
(function(w, d){
    var b = d.getElementsByTagName('body')[0];
    var s = d.createElement("script"); 
    var v = !("IntersectionObserver" in w) ? "8.17.0" : "10.19.0";
    s.async = true; // This includes the script as async. See the "recipes" section for more information about async loading of LazyLoad.
    s.src = "https://cdn.jsdelivr.net/npm/vanilla-lazyload@" + v + "/dist/lazyload.min.js";
    w.lazyLoadOptions = {/* Your options here */};
    b.appendChild(s);
}(window, document));
</script>

