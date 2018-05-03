<h2>List Members</h2>

<a href="<?php echo $config['base_url'].'/users.php?action=add';?>">Add</a>
<table>
<tr>

    <th>Username</th>
    <th>Action</th>
</tr>
<?php while($users=mysql_fetch_array($result)):?>
<tr>
    <td><?php echo $users['username']?></td>
    <td><a href="<?php echo $config['base_url'].'/users.php?action=edit&id='.$users['id'];?>">Edit</a> | <a href="<?php echo $config['base_url'].'/users.php?action=delete&id='.$users['id'];?>">Delete</a></td>
</tr>

<?php endwhile;?>

</table>
