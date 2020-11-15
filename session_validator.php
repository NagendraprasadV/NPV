<?php
error_reporting(0); 

session_start();
if(!(isset($_SESSION['username'])) || ($_SESSION['username'] == ""))
{
	?>
		<script>
			alert('Your session has been expired');
			document.location='../index.php';
		</script>
	<?php
}
?>