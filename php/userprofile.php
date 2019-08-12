<?
require '../inc/sfdsession.inc.php';
require '../inc/sfdconnect.inc.php';
if(isset($_SESSION['username']))
{
	$sql1 = "SELECT * FROM `profiles` WHERE `username`='".$_SESSION['username']."'";
	$runsql1 = mysqli_query($conn, $sql1);
	if($runsql1)
	{
		$_SESSION=mysqli_fetch_assoc($runsql1);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	<link rel="stylesheet" type="text/css" href="../css/userprofile.css">
</head>
<body>
	<div class="logo">
		<label class="logo" onclick=" window.location.href='../html/sfdindex.html'; ">Smart Farm Diary</label>
	</div>
	<div class="nav">
		<button class="nav_btn" onclick="closeAll(); document.getElementById('changePwd').style.display='block';" ondblclick="closeAll(); document.getElementById('contain_deets').style.display='block';">Change Password</button><br><br>
		<button class="nav_btn" onclick="closeAll(); document.getElementById('changeContact').style.display='block'; " ondblclick="closeAll(); document.getElementById('contain_deets').style.display='block';">Change Phone Number</button><br><br>
		<button class="nav_btn" onclick="closeAll(); document.getElementById('changeTown').style.display='block'; " ondblclick="closeAll(); document.getElementById('contain_deets').style.display='block';">Change Town</button>
	</div>
	<div class="deets">
		<div class="contain_deets" id="contain_deets">
			<?php if(isset($_SESSION['username']))
			{
				echo "Hello there <b>".$_SESSION['Name']."</b> !!";
				echo "<br>You're from <b>".$_SESSION['Town']."</b><br>";
				echo "<br><br>Your current username: <b>".$_SESSION['username']."</b><br>";
			} ?>
		</div>
		<form class="contain_deets" id="changePwd" method="POST" action="">
			<input type="text" name="ChangePwd" class="inputBox" placeholder="Enter New Password">
			<br><br><input type="submit" value="Change Password" class="btns">
		</form>
		<form class="contain_deets" id="changeContact" method="POST" action="">
			<input type="text" name="ChangeContact" class="inputBox" placeholder="Enter New Phone Number">
			<br><br><input type="submit" value="Change Number" class="btns">
		</form>
		<form class="contain_deets" id="changeTown" method="POST" action="">
			<input type="text" name="ChangeTown" class="inputBox" placeholder="Enter Town Name">
			<br><br><input type="submit" value="Change Town" class="btns">
		</form>
	</div>
</body>
<script type="text/javascript">
	function closeAll()
	{
		document.getElementById('contain_deets').style.display = 'none';
		document.getElementById('changePwd').style.display='none';
		document.getElementById('changeContact').style.display='none';
		document.getElementById('changeTown').style.display='none';
	}
</script>
</html>
<?php
if( isset($_POST['ChangePwd']) && !empty($_POST['ChangePwd']))
{
	$sql2 = "UPDATE `profiles` SET `password`='".$_POST['ChangePwd']."' WHERE `username`='".$_SESSION['username']."'";
	$runsql2 = mysqli_query($conn,$sql2);
	if($runsql2)
	{
		?>
		<script type="text/javascript">
			alert("Changed Password");
		</script>
		<?
	}
	else
	{
		?>
		<script type="text/javascript">
			alert("Password not changed");
		</script>
		<?
	}
}
if( isset($_POST['ChangeContact']) && !empty($_POST['ChangeContact']))
{
	$sql3 = "UPDATE `profiles` SET `Contact`='".$_POST['ChangeContact']."' WHERE `username`='".$_SESSION['username']."'";
	$runsql3 = mysqli_query($conn, $sql3);
	if($runsql3)
	{
		?>
		<script type="text/javascript">
			alert("Changed Phone Number");
		</script>
		<?
	}
	else
	{
		?>
		<script type="text/javascript">
			alert("Phone Number not changed");
		</script>
		<?
	}
}
if( isset($_POST['ChangeTown']) && !empty($_POST['ChangeTown']))
{
	$sql4 = "UPDATE `profiles` SET `Town`='".$_POST['ChangeTown']."' WHERE `username`='".$_SESSION['username']."'";
	$runsql4 = mysqli_query($conn, $sql4);
	if($runsql4)
	{
		?>
		<script type="text/javascript">
			alert("Changed Town");
		</script>
		<?
	}
	else
	{
		?>
		<script type="text/javascript">
			alert("Town not changed");
		</script>
		<?
	}
}
?>