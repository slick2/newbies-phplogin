<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Newbies PHPLogin</title>

  <link rel="stylesheet" href="css/blueprint/screen.css" type="text/css" media="screen, projection">
  <link rel="stylesheet" href="css/blueprint/print.css" type="text/css" media="print">
  <!--[if lt IE 8]>
  <link rel="stylesheet" href="css/blueprint/ie.css" type="text/css" media="screen, projection">
  <![endif]-->
  <link rel="stylesheet" href="css/style.css" type="text/css" media="screen, projection">
  </head>
  <body>
  <div class="container" id="wrap">
  <div class="span-24 last">
  <div id="header">
  		<h1>The header</h1>
  <ul><li><a href="<?php echo $config['base_url']?>">Home</a></li><li>
  <?php if(check_auth()):?>
  <a href="<?php echo $config['base_url'].'/users.php?action=logout'?>">Logout</a>
  <?php else: ?>
  <a href="<?php echo $config['base_url'].'/users.php?action=login'?>">Login</a>
  <?php endif;?>
  </li>
  <li><a href="<?php echo $config['base_url'].'/users.php?action=list'?>">Members</a></li></ul>
  </div>
  	</div>
    <div class="span-24">
    <div id="content">



