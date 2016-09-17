<?php
error_reporting(0);
session_start();
mysql_connect("localhost","root","");
mysql_select_db("stud");
if($_POST(Submit)!=""){
$Username=$_POST['Username'];
$Password=$_POST['Password'];
if($Username=="" && $Password=="")
	
{
	echo "Enter the Username and Password";
}
else
{
	$query=mysql_query("SELECT * FROM `details` WHERE `Username`='$Username' and `Password`='$Password'");
	$fetch=mysql_fetch_array($query);




if(($fetch['Username']==$Username) and ($fetch['Password']==$Password))
{
	
	
	$_SESSION['Id']=$fetch['Id'];
	$_SESSION['Username']=$fetch['Username'];
	echo "Login Success";
	if($_POST['remember']!=""){
		setcookie("Username",$Username,time()+60);
		setcookie("Password",$Password,time()+60);
	}	
	echo "<a href='display.php'><center><h2>Welcome</h3></center></<br>
	<h3> Click here to look up the table</h3></a>";
	echo "<a href='edit.php'><br>
	<h3> Click here to EDIT and DELETE the data</h3></a>";
	echo "<a href='insert_edit.php'><br>
	<h3> Click here to INSERT the data</h3></a>";
	echo "<a href='login.php'><br>
	<h3> Logout</h3></a>";
}
else
{
	echo "Wrong Password or Username";
}
}
}
?>
<html>
<body>
<center>
<br><br><h2>Login</h2>
<form action="" method="POST" >
<br><br>Username: <input type="text" name=Username value="<?php echo $_COOKIE['Username']?>"><br><br>
Password: <input type="password" name=Password value="<?php echo $_COOKIE['Password']?>"><br>
<br><input type="checkbox" name="remember" value="true">Remember Me<br>
<br><input type="submit" name="Submit" value="Login" onclick="mylog()"><br><br>
</center>
</form>
</body>
</html>


