<?php

$expiry = time() + 60*60*24;
setcookie('myname','Aliu Yusuf',$expiry, '','','',TRUE);
?>

<html> 
	<head>Cookies demo</head>
	<body>
		<p>Name: <?php echo $_COOKIE['myname'];?></p>
		<p><?php print_r($_COOKIE)?></p>
	</body>
</html>