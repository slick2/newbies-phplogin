<?php
/**
 *
 * @author Carey R. Dayrit <webpagecoders.com>
 *
*/
function check_user($username=null, $password=null){
    $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";
    $result = mysql_query($sql);
    if(mysql_num_rows($result)){
        return true;
    }
    return false;
}
/**
 * $rem is for remember
 */
function set_cookieIp($rem=0){
    $session_id = strtoupper(md5(time()));
    if($rem == 1){
        setcookie('SESSION', $session_id, time() + 186400);
    }else{
        setcookie('SESSION', $session_id);
    }
   $ip    = $_SERVER['SERVER_ADDR'];
   $query = mysql_query(" SELECT * FROM sessions WHERE ip_address = '".$ip."'");
   if(mysql_num_rows($query) == 0){
    mysql_query(" INSERT INTO sessions (id, ip_address) VALUES ('$session_id','$ip') ");
   }else{
    mysql_query(" UPDATE sessions SET id = '$session_id' WHERE ip_address = '$ip' ");
   }

}

function check_auth(){
  $session_id = $_COOKIE['SESSION'];

  $query = mysql_query(" SELECT * FROM sessions WHERE id = '".$session_id."' ") or die(mysql_error());
  if(mysql_num_rows($query) > 0){
    return true;
  }
  return false;
}

function destroy_auth()
{
  $session_id = $_COOKIE['SESSION'];
  mysql_query(" DELETE FROM sessions WHERE id = '$session_id' ") or die(mysql_error());
  setcookie('SESSION', '', 0);
}