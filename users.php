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
	  
		//signup form
		case 'signup':
		
		if($_POST['submit']){
            /*
            TODO: Validation and Sanitize post
            */
			if(!isset($_POST['username']) || !isset($_POST['password'])){
				header('location:'.$config['base_url'].'/users.php?action=signup');
			}
			elseif(empty($_POST['username']) || empty($_POST['password'])){
				header('location:'.$config['base_url'].'/users.php?action=signup');
			}
			elseif($_POST['password'] != $_POST['password2']){
				header('location:'.$config['base_url'].'/users.php?action=signup');
			} else {
				$query = "INSERT INTO users (username,password) VALUES('$_POST[username]', '$_POST[password]')";
				mysql_query($query) or die(mysql_error());
				header('Location:'.$config['base_url']);
			}
        }
		
		require_once('tmpl/header.php');
		require_once('tmpl/users/signup.php');
        require_once('tmpl/footer.php');
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

        $result = mysql_query("select * from users u left join user_fields uf on u.id=uf.user_id");

        require_once('tmpl/header.php');
        require_once('tmpl/users/list.php');
        require_once('tmpl/footer.php');
      break;


  }

