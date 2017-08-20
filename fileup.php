
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="images/4.png" type="image/x-icon" />
  <title>Movies List</title>
<style type="text/css">
	#tble{zoom:0.75;}
	#im1{width:100px;position:fixed;left:0px;top:130px;}
	#im2{width:100px;position:fixed;right:0px;top:130px;}
  video{width:800px;height:400px;margin-left:250px;}
</style>
  
    </head>
  <body>
<?php
require 'connect.inc.php';
require 'core.inc.php';
if(!loggedin())
  header("Location:index.php");

require 'navbar.php';?>

  <?php
function takeFiles($dir, $rex="") {
    $dir .= "/";
    $files = array();
    $dp = opendir($dir);
    while ($file = readdir($dp)) {
      if ($file == '.')  continue;
      if ($file == '..') continue;
      if (is_dir($file)) continue;
      if ($rex!="" && !preg_match($rex, $file)) continue;
      $files[] = $file;
    }
    closedir($dp);
    return $files;
  }
//echo $lnimg;
echo "<video controls id=linkv poster=images/31.png>
<source type=\"video/mp4\">
</video><br><br>";

$testPics = takeFiles("Movies/".$lnimg , "/^.*\.(mkv|mp4)$/i");

//echo $_SESSION['user_id'];
      $query="SELECT * FROM movies where userid=".$_SESSION['user_id']." order by name ASC;";
//      $query1="SELECT * FROM `questions` where cid='$cc';";
  //    $result1=mysql_query($query1);
    //  $num1=mysql_num_rows($result1);
      $result=mysql_query($query);
      $num=mysql_num_rows($result);

      if($result&&$num) 
        {
          echo "<center><table class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\" id=tble>
              <thead>
                <tr>
                    <th class=\"mdl-data-table__cell--non-numeric\">Name</th>
                    <th class=\"mdl-data-table__cell--non-numeric\">Year</th>
                    <th class=\"mdl-data-table__cell--non-numeric\">IMDb Rating</th>
                    <th class=\"mdl-data-table__cell--non-numeric\">Friends Rating</th>

                    <th class=\"mdl-data-table__cell--non-numeric\">Genre</th>";

                    echo"<th class=\"mdl-data-table__cell--non-numeric\">Director</th>
                    <th class=\"mdl-data-table__cell--non-numeric\">Link</th>
                    </tr>
                </thead>
                <tbody>";
            $scr1=0;$rank=0;
          for($i=0;$i<$num;$i++)
          { $nm=mysql_result($result,$i,'name');
            $irt=mysql_result($result,$i,'rating');
            $frt=mysql_result($result,$i,'frating');
            $yr=mysql_result($result,$i,'year');
            $dir=mysql_result($result,$i,'director');
            $scr=mysql_result($result,$i,'points');
            
            $act=mysql_result($result,$i,'Action');
            $ani=mysql_result($result,$i,'Animation');
            $com=mysql_result($result,$i,'Comedy');
            $doc=mysql_result($result,$i,'Documentary');
            $fam=mysql_result($result,$i,'Family');
            $fil=mysql_result($result,$i,'Film-Noir');
            $hor=mysql_result($result,$i,'Horror');
            $his=mysql_result($result,$i,'History');
            $mus=mysql_result($result,$i,'Musical');
            $mys=mysql_result($result,$i,'Mystery');
            $rom=mysql_result($result,$i,'Romance');
            $sci=mysql_result($result,$i,'Sci-Fi');
            $spo=mysql_result($result,$i,'Sport');
            $thr=mysql_result($result,$i,'Thriller');
            $war=mysql_result($result,$i,'War');
            $wes=mysql_result($result,$i,'Western');
            $adv=mysql_result($result,$i,'Adventure');
            $bio=mysql_result($result,$i,'Biography');
            $cri=mysql_result($result,$i,'Crime');
            $dra=mysql_result($result,$i,'Drama');
            $fan=mysql_result($result,$i,'Fantasy');
            $mu=mysql_result($result,$i,'Music');

//            $rank=($scr==$scr1)?$rank:$rank+1;
            
            echo "<tr>";
  //          echo "<td class=\"mdl-data-table__cell--non-numeric \">".$rank."</td>";
            echo "<td class=\"mdl-data-table__cell--non-numeric\">".$nm."</td>";
            echo "<td class=\"mdl-data-table__cell--non-numeric\">".$yr."</td>";
            echo "<td class=\"mdl-data-table__cell--non-numeric\">".$irt."</td>";
            echo "<td class=\"mdl-data-table__cell--non-numeric\">".$frt."</td>";
            echo "<td class=\"mdl-data-table__cell--non-numeric\">";
              if($act) echo" | <a>Action</a> "; 
              if($ani)  echo" | <a>Animation</a> ";
              if($com)  echo" | <a>Comedy</a> ";
              if($doc)  echo" | <a>Documentary</a> ";
              if($fam)  echo" | <a>Family</a>";
              if($fil)  echo" | <a>Film-Noir</a> ";
              if($hor)  echo" | <a>Horror</a> ";
              if($his)  echo" | <a>History</a> ";
              if($mus)  echo" | <a>Musical</a> ";
              if($mys)  echo" | <a>Mystery</a> ";
              if($rom)    echo" | <a>Romance</a> ";
              if($sci)  echo" | <a>Sci-Fi</a> ";
              if($spo)  echo" | <a>Sport</a> ";
              if($thr)  echo" | <a>Thriller</a> ";
              if($war)  echo" | <a>War</a> ";
              if($wes)  echo" | <a>Western</a> ";
              if($adv)  echo" | <a>Adventure</a> ";
              if($bio)  echo" | <a>Biography</a> ";
              if($cri)  echo" | <a>Crime</a> ";
              if($dra)  echo" | <a>Drama</a> ";
              if($fan)  echo" | <a>Fantasy</a> ";
              if($mu)   echo" | <a>Music</a> ";
            echo "</td>";
            echo "<td class=\"mdl-data-table__cell--non-numeric\">".$dir."</td>";
            echo "<td><button data=\"Movies/".$lnimg.$nm."\" target=_blank class=\"movies mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent\">Watch</button></td>";      
            echo "</tr>";
            $scr1=$scr;
          }
        echo "</tbody>
          </table></center><br><br>";
        }
?>

<?php
echo "<center><br>";
foreach($testPics as $movie)
{
  if(!movieexists($movie))
  { 
   // echo $movie;
    ?>
   <script type="text/javascript">
   
    $.post('scraper.php',{movie:"<?php echo $movie;?>"},function(result){
     $("#spani").text(result);
		alert("New Movie added to database");
    });
  </script>
  <?php 
}
} 
echo "</center>";

?>


</div>
</main>
</div>
<script type="text/javascript">
  $('.movies').click(function()
  {
    $('#linkv').attr('src',$(this).attr('data'));
  });
</script>



</body>
</html>

