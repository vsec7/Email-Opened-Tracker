<!DOCTYPE html>
<html>
<head>
	<title>Email Opened Tracker</title>
</head>
<body>
	<center>
	<h1>Email Opened Tracker</h1>
	<?php
		$line = explode("\n", file_get_contents("log.db"));
		$count = count($line)-1;?> 
		Count Opener : <font color="red"><?=$count;?></font> | <a href="?del">[ DELETE DB ]</a>
		<br>
		<iframe src="log.db" width="300" height="500"></iframe>
		<br>
		Created With Love By Viloid :v
</body>
</html>

<?php
// @Viloid
if(isset($_GET['del'])){
	unlink("log.db");
	header("location: ".$_SERVER['PHP_SELF']);
}
?>
