<?php

$expiry = time()-60*60;
// $expiry = time() + 60*60*24;

setcookie('userdata[name]','Yusuf',$expiry, '','','',TRUE);
setcookie('userdata[age]',31,$expiry, '','','',TRUE);
setcookie('userdata[gender]','Male',$expiry, '','','',TRUE);

setcookie('product[name]','iphone',$expiry, '','','',TRUE);
setcookie('product[price]','$400',$expiry, '','','',TRUE);
setcookie('product[qty]',3,$expiry, '','','',TRUE);
?>

<html> 
	<head>Cookies demo</head>
	<body>
		<p>Name: <?php echo $_COOKIE['product']['name'];?></p>
		<p><?php print_r($_COOKIE)?></p>
	</body>
</html>