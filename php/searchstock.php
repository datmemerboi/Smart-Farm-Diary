<?
require '../inc/sfdconnect.inc.php';
?>
<head>
	<link rel="stylesheet" type="text/css" href="../css/searchstock.css">
</head>
<body>
	<div class="logo">
		<label class="logo" onclick=" window.location.href='../html/sfdindex.html'; ">Smart Farm Diary</label>
	</div>
<center><div class="container">
<?
	if(empty($_POST['searchBar']))
	{
		?>
		<script type="text/javascript">
			alert("Use Seach Bar");
			window.location.href = "../html/sfdindex.html";
		</script>
		<?
	}
	if( isset($_POST['searchBar']) && !empty($_POST['searchBar']) )
	{
		$searchBar = $_POST['searchBar'];
		$sql1 = "SELECT * FROM `stocks` WHERE `Product` LIKE '%$searchBar%' ";
		$runsql1 = mysqli_query($conn, $sql1);
		$numrows1 = mysqli_num_rows($runsql1);
		if($numrows1 > 0)
		{
			while($row = mysqli_fetch_assoc($runsql1))
			{
				$sql2 = "SELECT `Store Name` FROM `storekeeper` WHERE `Store ID`= '".$row['Store ID']."'";
				print_r("<label class='storeName'>".mysqli_fetch_assoc( mysqli_query($conn, $sql2) )['Store Name']."</label>");
				foreach ($row as $key=>$value) {
					if($key=='Store ID')
						continue;
					else
						print_r("<br><b><i>".$key.":</i></b> ".$value);
				}
				echo "<br><br>";
			}
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("No such products named <? echo $searchBar; ?>");
				window.location.href='../html/sfdindex.html';
			</script>
			<?
		}
	}
?>
<button class="btn" onclick=" window.location.href='../html/sfdindex.html'">Go Back</button>
</div></center>
</body>