<?php
	mysql_connect("localhost","root","");
	mysql_select_db("stud");
	$select=mysql_query("select * from `details`");
	$fetch=mysql_fetch_assoc($select);
?>

<html>
<body>
<center>
<table border="1">
<tr>
<th>Id</th>
<th>Username</th>
<th>Password</th>
<th>Gender</th>
<th>Language</th>
<th>State</th>
</tr>

<?php
while($fetch=mysql_fetch_array($select))
{
?>
<tr>
<td><?php echo $fetch['Id'];?></td>
<td><?php echo $fetch['Username'];?></td>
<td><?php echo $fetch['Password'];?></td>
<td><?php echo $fetch['Gender'];?></td>
<td><?php echo $fetch['Language'];?></td>
<td><?php echo $fetch['State'];?></td>
</tr>
<?php
}
?>
</center>
</body>
</html>
