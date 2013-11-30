<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="robots" content="all" />
		<meta name="generator" content="RapidWeaver" />
		<meta name="generatorversion" content="4.1.1" />
		
		<title>:::EmForma - Kontakt:::</title>
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/bravo/styles.css"  />
		<!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/bravo/ie6.css"  /><![endif]-->
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/bravo/colourtag-page2.css"  />
		<link rel="stylesheet" type="text/css" media="print" href="../rw_common/themes/bravo/print.css"  />
		<link rel="stylesheet" type="text/css" media="handheld" href="../rw_common/themes/bravo/handheld.css"  />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/bravo/css/width/650.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/bravo/css/sidebar/left.css" />
		
		
		<script type="text/javascript" src="../rw_common/themes/bravo/javascript.js"></script>
		
		<!--[if IE 6]> 
			<style type="text/css" media="screen">body {behavior: url(../rw_common/themes/bravo/csshover.htc);}</style>
			<script type="text/javascript" charset="utf-8">
				var blankSrc = "../rw_common/themes/bravo/png/blank.gif";
			</script>	
			<style type="text/css">

			img {
				behavior:	url("../rw_common/themes/bravo/png/pngbehavior.htc");
			}

			</style>
		<![endif]-->
		
		
	</head>
<body>




<div id="topbar">
	<img src="../rw_common/themes/bravo/images/top_bar_bg.png" alt="" style="width: 3000px; height: 16px;" />
</div>
<div id="topgrad">
	<img src="../rw_common/themes/bravo/images/top_grad.png" alt="" style="width: 3000px; height: 348px;" />
</div>
<div id="container"><!-- Start container -->
	<div id="sidebarContainer"><!-- Start Sidebar wrapper -->
		<div id="pageHeader"><!-- Start page header -->
			<img src="../rw_common/images/logo_beli.png" width="200" height="52" alt="Site logo"/>
			<h1></h1>
			<h2></h2>
			<div class="clearer"></div>
		</div><!-- End page header -->
		<div id="navcontainer"><!-- Start Navigation -->
			<ul><li><a href="../index.html" rel="self">O nama</a></li><li><a href="../galerija/galerija.html" rel="self">Galerija</a></li><li><a href="kontakt.php" rel="self" id="current">Kontakt</a></li><li><a href="../narudzbina/narudzbina.html" rel="self">Narudžbina robe</a></li></ul>
		</div><!-- End navigation -->
		<div id="sidebar"><!-- Start sidebar content -->
			<h1 class="sideHeader"></h1><!-- Sidebar header -->
			<!-- sidebar content you enter in the page inspector -->
			 <!-- sidebar content such as the blog archive links -->
		</div><!-- End sidebar content -->
	</div><!-- End sidebar wrapper -->
	<div id="contentContainer"><!-- Start main content wrapper -->
		<div id="content"><!-- Start content -->
			<?php
if(!array_key_exists('formMessage', $_SESSION))
$_SESSION['formMessage'] = "";
if(!array_key_exists('form_element0', $_SESSION))
$_SESSION['form_element0'] = "";
if(!array_key_exists('form_element1', $_SESSION))
$_SESSION['form_element1'] = "";
if(!array_key_exists('form_element2', $_SESSION))
$_SESSION['form_element2'] = "";
if(!array_key_exists('form_element3', $_SESSION))
$_SESSION['form_element3'] = "";
?><div class="message-text">
<?php
if (!$_SESSION['formMessage']) { 
echo 'Popunite formular ispod da bi ste nam poslali email.';
} else {
 echo $_SESSION['formMessage'];
 }
 ?>
</div><br />


<form action="mailer.php" method="post" enctype="multipart/form-data">
  <p>
    <label>Va&scaron;e ime:</label> 
    *<br /><input class="form-input-field2" type="text" value="<?php echo $_SESSION['form_element0']; ?>" name="form_element0" size="40"/><br /><br />
    <label>Email:</label> 
    *<br /><input class="form-input-field2" type="text" value="<?php echo $_SESSION['form_element1']; ?>" name="form_element1" size="40"/><br /><br />
    <label>Tema:</label> 
    *<br /><input class="form-input-field2" type="text" value="<?php echo $_SESSION['form_element2']; ?>" name="form_element2" size="40"/><br /><br />
    <label>Poruka:</label> 
    *<br />
    <textarea class="form-input-field" name="form_element3" rows="8" cols="38">
<?php echo $_SESSION['form_element3']; ?>
    </textarea>
  <br />
    </p>
  <h5>Napomena: Usled velikog broja automatski generisanih poruka (spam) prinuđeni smo da uvedemo dodatnu verifikaciju. Molimo vas da pre slanja vaše poruke unesete u polje karaktere koje vidite na sličici. </h5>
  <h5><br />
    <?php

require_once('recaptchalib.php');
$publickey = "6LeOxwQAAAAAALEcuLdaEVMa87yTC7ufwTYOV_GQ";
echo recaptcha_get_html($publickey);

?>
    
    <br /><br /><input class="form-input-button" type="reset" name="resetButton" value="Poni&scaron;ti" />
    <input class="form-input-button" type="submit" name="submitButton" value="Po&scaron;alji" 
/>
  </h5>
</form>

<?php session_destroy(); ?>

			<div class="clearer"></div>
		</div><!-- End content -->
		
		<div id="footer"><!-- Start Footer -->
			<p>&copy; 2009 Em Forma</p>
			<div id="breadcrumbcontainer"><!-- Start the breadcrumb wrapper -->
				
			</div><!-- End breadcrumb -->
		</div><!-- End Footer -->
	</div><!-- End main content wrapper -->
</div><!-- End container -->
</body>
</html>
