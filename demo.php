<?php

session_start();
session_destroy();
if(isset($_SESSION['views'])){
	$_SESSION['views'] = $_SESSION['views']+1;
}else{
	$_SESSION['views'] = 1;
}

?>

<html>
	<head>
		<title>Session Demo</title>
	</head>
	<body>
		<p>Page view(s): <?php echo $_SESSION['views'];?></p>
	</body>
</html>