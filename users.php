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
      
      case 'add':
        if(!check_auth()){
            header('Location:'.$config['base_url'].'/users.php?action=login');
            exit();            
        }
        
         if($_POST['submit']){
            //update
            mysql_query("INSERT INTO users (username,password) VALUES('$_POST[username]', '$_POST[password]')");            
            header('Location:'.$config['base_url'].'/users.php?action=list');
        }
        
        		require_once('tmpl/header.php');
		require_once('tmpl/users/add.php');
        require_once('tmpl/footer.php');
		break;

      break;
      

      case 'edit':      
        if(!check_auth()){
            header('Location:'.$config['base_url'].'/users.php?action=login');
            exit();
        }
        
        if($_POST['submit']){
            //update
            mysql_query("UPDATE users SET username='".$_POST['username']."', password='".$_POST['password']."' WHERE id=".$_GET['id']);
            
            header('Location:'.$config['base_url'].'/users.php?action=list');
        }
        
        if(empty($_GET['id'])){                        
            header('Location:'.$config['base_url'].'/users.php?action=list');
        }
        
        $result = mysql_query("SELECT * FROM users where id=".$_GET['id']);        
        
        
        require_once('tmpl/header.php');
        require_once('tmpl/users/edit.php');
        require_once('tmpl/footer.php');
                
      break;


      case 'delete':
        if(!check_auth()){
            header('Location:'.$config['base_url'].'/users.php?action=login');
            exit();
        }
        
        if(empty($_GET['id'])){                        
            header('Location:'.$config['base_url'].'/users.php?action=list');
        }
        
        mysql_query("DELETE FROM users where id=".$_GET['id']);
        
        header('Location:'.$config['base_url'].'/users.php?action=list');
        
        
        
        
      break;

      case 'list':
      default:
           if(!check_auth()){
            header('Location:'.$config['base_url'].'/users.php?action=login');
            exit();
            }
        //

        $result = mysql_query("select * from users");

        require_once('tmpl/header.php');
        require_once('tmpl/users/list.php');
        require_once('tmpl/footer.php');
      break;


  }

