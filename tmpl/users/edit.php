<h2>Edit Member</h2>
<?php
$user = mysql_fetch_array($result);

?>
<div id="edit_form">
<form method="post" >
<fieldset>
<label for="username">Username :</label>
<input type="text" name="username" value="<?php echo $user['username']?>"/>
<br />
<label for="password">Password :</label>
<input type="password" name="password" />
<br />
<label for="password2">Confirm Password :</label>
<input type="password" name="password2" />
<br />
<input type="submit" value="Edit" name="submit" />
</fieldset>
</form>
</div>

