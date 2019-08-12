<?
require '../inc/sfdconnect.inc.php';
require '../inc/sfdsession.inc.php';

$username = $_SESSION['username'];
$Date = date('Y-m-d');

if(isset($_POST['SeedAmount']) && isset($_POST['SeedBags']) && !empty($_POST['SeedBags']) && !empty($_POST['SeedAmount']) )
{
	$sql1 = "INSERT INTO `Seeds Expense` VALUES ('$username', '".$_POST['SeedAmount']."', '".$_POST['SeedBags']."', '".$_POST['SeedType']."', '$Date')";
	$runsql1 = mysqli_query($conn,$sql1);
	if($runsql1)
	{
		?>
		<script type="text/javascript">
			alert("Seeds Expense updated")
			window.location.href = "../frames/frame1.php";
		</script>
		<?
	}
	else{
		?>
		<script type="text/javascript">
			alert("Expense not updated");
			window.location.href = "../frames/frame1.php";
		</script>
		<?
	}
}

if(isset($_POST['LabourAmount']) && isset($_POST['WorkHours']) && isset($_POST['WorkersNumber']) && !empty($_POST['WorkersNumber']) && !empty($_POST['LabourAmount']) && !empty($_POST['WorkHours']) )
{
	$sql2 = "INSERT INTO `Labour Expense` VALUES ('$username', '".$_POST['LabourAmount']."', '".$_POST['WorkHours']."', '".$_POST['WorkersNumber']."', '".$_POST['WorkType']."', '$Date')";
	print_r($sql2);
	$runsql2 = mysqli_query($conn, $sql2);
	if($runsql2)
	{
		?>
		<script type="text/javascript">
			alert("Labour Expense updated")
			window.location.href = "../frames/frame1.php";
		</script>
		<?
	}
	else{
		?>
		<script type="text/javascript">
			alert("Expense not updated");
			window.location.href = "../frames/frame1.php";
		</script>
		<?
	}
}

if(isset($_POST['MachineryAmount']) && !empty($_POST['MachineryAmount']))
{
	$sql3 = "INSERT INTO `Machinery Expense` VALUES ('$username', '".$_POST['MachineryAmount']."', '".$_POST['']."', '$Date')";
	$runsql3 = mysqli_query($conn, $sql3);
	if($runsql3)
	{
		?>
		<script type="text/javascript">
			alert("Machinery Expense updated");
			window.location.href = "../frames/frame1.php";
		</script>
		<?
	}
	else{
		?>
		<script type="text/javascript">
			alert("Expense not updated");
			window.location.href = "../frames/frame1.php";
		</script>
		<?
	}
}
if(isset($_POST['BillAmount']) && !empty($_POST['BillAmount']))
{
	$sql4 = "INSERT INTO `Bills Expense` VALUES ('$username', '".$_POST['BillAmount']."', '".$_POST['BillType']."', '$Date')";
	$runsql4 = mysqli_query($conn, $sql4);
	if($runsql4)
	{
		?>
		<script type="text/javascript">
			alert("Bills Expense updated");
			window.location.href = "../frames/frame1.php";
		</script>
		<?
	}
	else{
		?>
		<script type="text/javascript">
			alert("Expense not updated");
			window.location.href = "../frames/frame1.php";
		</script>
		<?
	}
}
?>