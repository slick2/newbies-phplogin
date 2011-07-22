<?php
/**
 *
 * @author Carey R. Dayrit <webpagecoders.com>
 *
*/
error_reporting('all');
include_once('config.php');

/* pconnect for newbies */
mysql_pconnect($config['db_host'], $config['db_username'], $config['db_password'])
  or die(mysql_error());
mysql_select_db($config['db_name'])
  or die(mysql_error());

include_once('lib/auth.php');
