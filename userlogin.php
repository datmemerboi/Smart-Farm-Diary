<?
require '../inc/sfdconnect.inc.php';
require '../inc/sfdsession.inc.php';

if(isset($_POST['UserName']) && $_POST['PassWord'])
{
	$username = $_POST['UserName'];
	$password = $_POST['PassWord'];

	$sql1 = "SELECT * FROM `profiles` WHERE `username`= '$username' ";
	$run_sql1 = mysqli_query($conn, $sql1);
	$result_sql1 = mysqli_fetch_assoc($run_sql1);

	if(mysqli_num_rows($run_sql1)==0)
	{
		?>
		<script type="text/javascript">
			alert("Wrong Credentials.");
			window.location.href = "../html/userlogin.html";
		</script>
		<?
	}
	if($result_sql1['password']!=$password)
	{
		?>
		<script type="text/javascript">
			alert("Wrong Password.");
			window.location.href="../html/userlogin.html";
		</script>
		<?
	}
	else
	{
		$_SESSION['username']=$result_sql1['username'];
		$_SESSION['Name']=$result_sql1['Name'];
		$_SESSION['Town']=$result_sql1['Town'];
		?>
		<script type="text/javascript">
			alert("Logged In.");
			window.location.href="../html/sfdindex.html";
		</script>
		<?
	}
}
else
{
	?>
	<script type="text/javascript">
		alert("Enter Credentials");
		window.location.href="../html/userlogin.html";
	</script>
	<?
}
?>	