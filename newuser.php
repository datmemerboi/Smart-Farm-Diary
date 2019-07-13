<?
require '../inc/sfdconnect.inc.php';
if(isset($_POST['username']) && !empty($_POST['username'] && !empty($_POST['password']) && !empty($_POST['Name'])))
{
	$sql1 = "SELECT * FROM `profiles` WHERE `username`='".$_POST['username']."'";
	$num_run_sql1 = mysqli_num_rows( mysqli_query($conn,$sql1) );

	if($num_run_sql1>0)
	{
		?>
		<script type="text/javascript">
			alert("Username already exists. Choose another.");
			window.location.href = "../html/newuser.html";
		</script>
		<?
	}

	else
	{
		$sql2 = "INSERT INTO profiles(`Name`,`Town`,`Contact`,`username`,`password`) VALUES ('".$_POST['Name']."', '".$_POST['Town']."', '".$_POST['Contact']."', '".$_POST['username']."', '".$_POST['password']."')";
		$run_sql2 = mysqli_query($conn, $sql2);

		if($run_sql2)
		{
			?>
			<script type="text/javascript">
				alert("New Account has been created.");
				window.location.href = "../html/userlogin.html";
			</script>
			<?
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Account not created. Try again.");
				window.location.href = "../html/newuser.html";
			</script>
			<?
		}
	}
}	
?>