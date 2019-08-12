<?
require '../inc/sfdconnect.inc.php';
require '../inc/sfdsession.inc.php';
?>
<head>
	<link rel="stylesheet" type="text/css" href="../css/userexpenses.css">
</head>
<body>
	<div class="logo">
		<label class="logo" onclick=" window.location.href='../html/sfdindex.html'; ">Smart Farm Diary</label>
	</div>
<center><div class="container">
		<?
		if(isset($_SESSION['username']))
		{
			$sql1 = "SELECT * FROM `Seeds Expense` WHERE `username`='".$_SESSION['username']."'";
			$runsql1 = mysqli_query($conn, $sql1);
			if($runsql1)
			{
				if( mysqli_num_rows($runsql1)==0 )
				{
					print_r("No Expenses on Seeds<br>");
				}
				else
				{
					while($row = mysqli_fetch_assoc($runsql1))
					{
						echo "<br>";
						foreach ($row as $key => $value) {
							if ($key=='username') {
								continue;
							}
							if ($value==null) {
								$value = '<i>Not specified</i>';
							}
							print_r("<b>".$key."</b>: ".$value."<br>");
						}
						echo "<br>";
					}
				}
			}

			$sql2 = "SELECT * FROM `Machinery Expense` WHERE `username`='".$_SESSION['username']."'";
			$runsql2 = mysqli_query($conn, $sql2);
			if($runsql2)
			{
				if( mysqli_num_rows($runsql2)==0 )
				{
					print_r("No Expenses on Machinery<br>");
				}
				else
				{
					while($row = mysqli_fetch_assoc($runsql2))
					{
						echo "<br>";
						foreach ($row as $key => $value) {
							if ($key=='username') {
								continue;
							}
							if ($value==null) {
								$value = '<i>Not specified</i>';
							}
							print_r("<b>".$key."</b>: ".$value."<br>");
						}
						echo "<br>";
					}
				}
			}

			$sql3 = "SELECT * FROM `Labour Expense` WHERE `username`='".$_SESSION['username']."'";
			$runsql3 = mysqli_query($conn, $sql3);
			if($runsql3)
			{
				if( mysqli_num_rows($runsql3)==0 )
				{
					print_r("No Expenses on Labour<br>");
				}
				else
				{
					while($row = mysqli_fetch_assoc($runsql3))
					{
						echo "<br>";
						foreach ($row as $key => $value) {
							if ($key=='username') {
								continue;
							}
							if ($value==null) {
								$value = '<i>Not specified</i>';
							}
							print_r("<b>".$key."</b>: ".$value."<br>");
						}
						echo "<br>";
					}
				}
			}

			$sql4 = "SELECT * FROM `Bills Expense` WHERE `username`='".$_SESSION['username']."'";
			$runsql4 = mysqli_query($conn, $sql4);
			if($runsql4)
			{
				if( mysqli_num_rows($runsql4)==0 )
				{
					print_r("No Expenses on Bills<br>");
				}
				else
				{
					while($row = mysqli_fetch_assoc($runsql4))
					{
						echo "<br>";
						foreach ($row as $key => $value) {
							if ($key=='username') {
								continue;
							}
							if ($value==null) {
								$value = '<i>Not specified</i>';
							}
							print_r("<b>".$key."</b>: ".$value."<br>");
						}
						echo "<br>";
					}
				}
			}
		}
		?>
	</div>
</body>