<?php
require 'core.inc.php';
require 'connect.inc.php';
if(loggedin())
  {
    
    header('Location:fileup.php');

  }

else include 'login.inc.php';
?>
<html>
<head>
</head>
<body>
	
</body>
</html>
