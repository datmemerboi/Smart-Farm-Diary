<?
require '../inc/sfdsession.inc.php';
require '../inc/sfdconnect.inc.php';

session_destroy();
$_SESSION = null;
mysqli_close($conn);
?>
<script type="text/javascript">
	alert("Logged Out.");
	window.location.href = "../html/userlogin.html";
</script>