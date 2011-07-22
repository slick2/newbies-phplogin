<?php
/**
 *
 * @author Carey R. Dayrit <webpagecoders.com>
 *
*/
   //check auth
   //config files, lib and logic here
  include_once('boot.php');
  switch($_REQUEST['action']){
      case 'login':
        if($_POST['submit']){
            /*
            TODO: Validation and Sanitize post
            */
            if(check_user($_POST['username'], $_POST['password'])){
                set_cookieIp();
                header('Location:'.$config['base_url']);
                exit();
            }
        }
        //login form
        require_once('tmpl/header.php');
        require_once('tmpl/users/login.php');
        require_once('tmpl/footer.php');
      break;

      case 'logout':
        destroy_auth();
        header('Location:'.$config['base_url'].'/users.php?action=login');
        exit();
      break;

      /*
      case 'add':

      break;

      case 'edit':


      break;

      case 'delete':

      break;

      */

      case 'list':
      default:
           if(!check_auth()){
            header('Location:'.$config['base_url'].'/users.php?action=login');
            exit();
            }
        //
        require_once('tmpl/header.php');
        require_once('tmpl/users/list.php');
        require_once('tmpl/footer.php');
      break;


  }

?>

