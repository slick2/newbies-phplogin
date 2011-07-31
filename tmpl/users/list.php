<h2>List Members</h2>

<table>
<tr>
<th><input type="checkbox" /></th>
    <th>Username</th>
    <th>Action</th>
</tr>
<?php while($users=mysql_fetch_array($result)):?>
<tr>
<td><input type="checkbox" /></td>
    <td><?php echo $users['username']?></td>
    <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
</tr>

<?php endwhile;?>

</table>