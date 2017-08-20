
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="images/4.png" type="image/x-icon" />
  <title>Movies List</title>
<style type="text/css">
  video{width:1000px;height:600px;margin-left:180px;margin-right:180px;}
</style>
  
    </head>
  <body>
<?php
require 'connect.inc.php';
require 'core.inc.php';
if(!loggedin())
  header("Location:index.php");

require 'navbar.php';
 
 $query="SELECT * FROM user_in;";
 $result=mysql_query($query);
 $num=mysql_num_rows($result);
      if($result&&$num) 
        {
          echo "<center><table class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">
              <thead>
                <tr>
                    <th class=\"mdl-data-table__cell--non-numeric\">Name</th>
                    <th class=\"mdl-data-table__cell--non-numeric\">Profile</th>                    
                    </tr>
                </thead>
                <tbody>";

          for($i=0;$i<$num;$i++)
          { $nm=mysql_result($result,$i,'fname');
          	$nm1=mysql_result($result,$i,'srname');
            $unm=mysql_result($result,$i,'username');
            $eml=mysql_result($result,$i,'email');
            $phn=mysql_result($result,$i,'phone');
            echo "<td class=\"mdl-data-table__cell--non-numeric\">".$nm." ".$nm1."</td>";
            echo "<td class=\"mdl-data-table__cell--non-numeric\"><a href=userprof.php?q=$unm>Visit</a></td>";
            echo "</tr>";

          }
        echo "</tbody>
          </table></center><br><br>";
        }
?>

</body>
</html>

