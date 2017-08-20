

<?php
require 'core.inc.php';
require 'connect.inc.php';

if(isset($_GET['q']))
  $qcode=$_GET['q'];
else
  header('Location:practice.php');
?>
 <html>
 <head>
<link rel="shortcut icon" href="images/4.png" type="image/x-icon" />   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>CinePhilia</title>
    


</head>
<body>

  
 <?php
include 'navbar.php';
 ?>


  <style type="text/css">
 
  a.sub{color:blue;}

  table a{color:blue;}
  #tble{zoom:0.8;}
.mdl-grid{margin-left:100px;}
  .page{width:90%;margin:auto;}
img.pport{display:inline;}
h2.name,h5{display:inline;}
.demo-card-square.mdl-card {
  width: 100%;
  }
.demo-card-square > .mdl-card__title {
  color: #fff;
  background:url('../assets/demos/dog.png') bottom right 15% no-repeat #46B6AC;
}
.smallimg{width:200px;height:200px;}
  .mycard{background:white;margin-bottom:10px;padding:20px;color:#424242;text-align:center;}

  table{margin:20px;}

  </style>


<div class=page>
    <?php
require 'connect.inc.php';
$query="SELECT fname,srname,imgln,username,id from user_in where username='".$qcode."'";
$result=@mysql_query($query);
$numu=@mysql_num_rows($result);
if($numu==0) echo "<div class=mycard><h1>404</h1><h3>No such User in our database</h3></div>";
else
{
if($result) 
  {   
      $id=@mysql_result($result,0,'id');
      $fname=@mysql_result($result,0,'fname');
      $srname=@mysql_result($result,0,'srname');
      $img=@mysql_result($result,0,'imgln');
      
?>

      <?php
      
     echo "<div class=mdl-grid><div class=\"mdl-cell mdl-cell--8-col\">"; 
     echo "<div class=\"demo-card-square mdl-card mdl-shadow--2dp\">
            <div class=\"mdl-card__title mdl-card--expand\">
    <h2 class=\"mdl-card__title-text\">
    &nbsp;&nbsp;&nbsp;<h2 class=name>".$fname." ".$srname."</h2>
  </div>
  <div class=\"mdl-card__supporting-text\"><h6>Username</h6><h5> ".$qcode." </h5><br>";
  
    echo "</div>";

  if(getfield('username')==$qcode) echo "<div class=\"mdl-card__actions mdl-card--border\">
    <a class=\"mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect\" href=\"profile.php\">
      EDIT PROFILE
    </a>
  </div>";
 

echo "</div></div>";


   
  }
 
 $query="SELECT * FROM movies where userid=".$id." order by name ASC;";
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

            echo "<tr>";
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
 
            echo "</tr>";
            $scr1=$scr;
          }
        echo "</tbody>
          </table></center><br><br>";
        }
 
  }
  



?>


</div>

</body>
 </html>
