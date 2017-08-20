<?php
include 'core.inc.php';
include 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
$idimup=getfield('id');
$name_f=getfield('fname');
$name_sr=getfield('srname');
//$ln_img=getfield('imgln');

$usern=getfield('username');


if(isset($_POST['mname'])&&!empty($_POST['mname'])&&isset($_POST['optss'])&&!empty($_POST['optss']))
	{
	$nm=$_POST['mname'];
	$rt=$_POST['optss'];
	mysql_query("UPDATE movies set watched=$rt where name='".$nm."'");
	}
?>



 <html>
 <head>
       
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MoviePhilia</title>
<link rel="shortcut icon" href="images/4.png" type="image/x-icon" />   
  <style type="text/css">
    .mycard{background:white;margin-bottom:10px;padding:20px;color:#424242;}
    #contain{width:80%;margin:auto;}
    #files{display:none;}
    #tble{zoom:0.75;}
    #posimb{text-align:center;}
    .mycard{width:400px;}
  </style>
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
</head>
<body>

<?php
include 'navbar.php'
 ?>
  <div id="contain">
  <div class="mdl-grid">
<div class="mycard mdl-cell mdl-cell--6-col">
<h4>Preferences</h4>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="dir" required maxlength="40" onkeyup=myFunction()>
    <label class="mdl-textfield__label" for="dir">Director</label>
  </div>
 
 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <select class="mdl-textfield__input" onchange=myFunction1() id=dir1>
      <option>Action</option>
      <option>Animation</option>
      <option>Comedy</option>
      <option>Documentary</option>
      <option>Family</option>
      <option>Film-Noir</option>
      <option>Horror</option>
      <option>Musical</option>
      <option>Romance</option>
      <option>Sport</option>
      <option>War</option>
      <option>Adventure</option>
      <option>Biography</option>
      <option>Crime</option>
      <option>Drama</option>
      <option>Fantasy</option>
      <option>History</option>
      <option>Music</option>
      <option>Mystery</option>
      <option>Sci-Fi</option>
      <option>Thriller</option>
      <option>Western</option>

    </select>
    <label class="mdl-textfield__label" for="dir">Genre</label>
  </div>     

  </div>


 <div class="mycard mdl-cell mdl-cell--6-col">
         <form action=recommend.php method=POST>
         <h4>Rate Watched Movies</h4>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <select class="mdl-textfield__input" type="text" id=mname name="mname" required maxlength="40">
    
    <?php
      $query="SELECT * FROM movies where userid=".$_SESSION['user_id']." order by rating DESC;";
      $result=mysql_query($query);
      $num=mysql_num_rows($result);

      if($result&&$num) 
        {
          for($i=0;$i<$num;$i++)
          { $nm=mysql_result($result,$i,'name');
            echo "<option class=\"mdl-data-table__cell--non-numeric\">".$nm."</option>";}    
        }
?>
    
    </select>
    <label class="mdl-textfield__label" for="mname">Movie Name</label>
  </div>
 
 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <select class="mdl-textfield__input" name="optss" id=optss>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
      <option>10</option>
          </select>
    <label class="mdl-textfield__label" for="optss">Rating</label>
  </div>     
	<button type=submit>Submit</button>
	</form>
  </div>
 
  </div>
  <br><br>
<?php

$query="SELECT COUNT(*) as num FROM movies where Comedy=1 && watched!=0 && userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $com1=mysql_result($result,0,'num');
      $query="SELECT COUNT(*) as num FROM movies where Action=1 && watched!=0 && userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $act1=mysql_result($result,0,'num');
      $query="SELECT COUNT(*) as num FROM movies where Animation=1 && watched!=0 && userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $ani1=mysql_result($result,0,'num');
      $query="SELECT COUNT(*) as num FROM movies where Documentary=1 && watched!=0 && userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $doc1=mysql_result($result,0,'num');
      $query="SELECT COUNT(*) as num FROM movies where Family=1 && watched!=0 && userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $fam1=mysql_result($result,0,'num');
      $query="SELECT COUNT(*) as num FROM movies where `Film-Noir`=1 && watched!=0 && userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $fil1=mysql_result($result,0,'num');
      $query="SELECT COUNT(*) as num FROM movies where Horror=1 && watched!=0 && userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $hor1=mysql_result($result,0,'num');
      $query="SELECT COUNT(*) as num FROM movies where History=1 && watched!=0 && userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $his1=mysql_result($result,0,'num');
      $query="SELECT COUNT(*) as num FROM movies where Musical=1 && watched!=0 && userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $mus1=mysql_result($result,0,'num');
      $query="SELECT COUNT(*) as num FROM movies where Mystery=1 && watched!=0 && userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $mys1=mysql_result($result,0,'num');
      $query="SELECT COUNT(*) as num FROM movies where Romance=1 && watched!=0 && userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $rom1=mysql_result($result,0,'num');
      $query="SELECT COUNT(*) as num FROM movies where `Sci-Fi`=1 && watched!=0 && userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $sci1=mysql_result($result,0,'num');
      $query="SELECT COUNT(*) as num FROM movies where Sport=1 && watched!=0 && userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $spo1=mysql_result($result,0,'num');
      $query="SELECT COUNT(*) as num FROM movies where Thriller=1 && watched!=0 && userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $thr1=mysql_result($result,0,'num');
      $query="SELECT COUNT(*) as num FROM movies where War=1 && watched!=0 && userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $war1=mysql_result($result,0,'num');
      $query="SELECT COUNT(*) as num FROM movies where Western=1 && watched!=0 && userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $wes1=mysql_result($result,0,'num');
      $query="SELECT COUNT(*) as num FROM movies where Adventure=1 && watched!=0 && userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $adv1=mysql_result($result,0,'num');
      $query="SELECT COUNT(*) as num FROM movies where Biography=1 && watched!=0 && userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $bio1=mysql_result($result,0,'num');
      $query="SELECT COUNT(*) as num FROM movies where Crime=1 && watched!=0 && userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $cri1=mysql_result($result,0,'num');
      $query="SELECT COUNT(*) as num FROM movies where Drama=1 && watched!=0 && userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $dra1=mysql_result($result,0,'num');
      $query="SELECT COUNT(*) as num FROM movies where Fantasy=1 && watched!=0 && userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $fan1=mysql_result($result,0,'num');
      $query="SELECT COUNT(*) as num FROM movies where Music=1 && watched!=0 && userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $mu1=mysql_result($result,0,'num');
       $query="SELECT COUNT(*) as num FROM movies where userid=".$_SESSION['user_id'].";";
      $result=mysql_query($query);
      $tot=mysql_result($result,0,'num');

      $query="SELECT * FROM movies where userid=".$_SESSION['user_id']." order by rating DESC;";
      $result=mysql_query($query);
      $num=mysql_num_rows($result);
		
      if($result&&$num) 
        {
          for($i=0;$i<$num;$i++)
          { $nm=mysql_result($result,$i,'name');
            $irt=mysql_result($result,$i,'rating');
            $frt=mysql_result($result,$i,'frating');
            $yr=mysql_result($result,$i,'year');
            $dir=mysql_result($result,$i,'director');
            $scr=mysql_result($result,$i,'points');
            $wat=mysql_result($result,$i,'watched');
            
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

            $poi=0;
            $ct=0;
              if($act) {$poi+=$act1;$ct++;} 
              if($ani)  {$poi+=$ani1;$ct++;}
              if($com)  {$poi+=$com1;$ct++;}
              if($doc)  {$poi+=$doc1;$ct++;}
              if($fam)  {$poi+=$fam1;$ct++;}
              if($fil)  {$poi+=$fil1;$ct++;}
              if($hor)  {$poi+=$hor1;$ct++;}
              if($his)  {$poi+=$his1;$ct++;}
              if($mus)  {$poi+=$mus1;$ct++;}
              if($mys)  {$poi+=$mys1;$ct++;}
              if($rom)   {$poi+=$rom1;$ct++;}
              if($sci)  {$poi+=$sci1;$ct++;}
              if($spo)  {$poi+=$spo1;$ct++;}
              if($thr)  {$poi+=$thr1;$ct++;}
              if($war)  {$poi+=$war1;$ct++;}
              if($wes)  {$poi+=$wes1;$ct++;}
              if($adv)  {$poi+=$adv1;$ct++;}
              if($bio)  {$poi+=$bio1;$ct++;}
              if($cri)  {$poi+=$cri1;$ct++;}
              if($dra)  {$poi+=$dra1;$ct++;}
              if($fan)  {$poi+=$fan1;$ct++;}
              if($mu)   {$poi+=$mu1;$ct++;}
            $poi = ($poi*30)/($ct*$tot) + $irt*4 + $frt*2 + $yr/210;
            if($wat)
            {
            	$poi-=1000;
            }
      
      			mysql_query("UPDATE movies set points=$poi where name='$nm'");
          }
      
      
      
        }
?>



<?php

$query="SELECT * FROM movies where userid=".$_SESSION['user_id']." order by points DESC;";
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
                    <th class=\"mdl-data-table__cell--non-numeric\">Genre</th>
                    <th class=\"mdl-data-table__cell--non-numeric\">Director</th>
                    <th class=\"mdl-data-table__cell--non-numeric\">Your Ratings</th>
                    
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
            $wtc=mysql_result($result,$i,'watched');
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
            $poi=0;
            $ct=0;
            echo "<tr>";
            echo "<td class=\"mdl-data-table__cell--non-numeric\">".$nm."</td>";
            echo "<td class=\"mdl-data-table__cell--non-numeric\">".$yr."</td>";
            echo "<td class=\"mdl-data-table__cell--non-numeric\">".$irt."</td>";
            echo "<td class=\"mdl-data-table__cell--non-numeric\">".$frt."</td>";
            echo "<td class=\"mdl-data-table__cell--non-numeric\">";
              if($act) {echo" | <a>Action</a> ";} 
              if($ani)  {echo" | <a>Animation</a> ";}
              if($com)  {echo" | <a>Comedy</a> ";}
              if($doc)  {echo" | <a>Documentary</a> ";}
              if($fam)  {echo" | <a>Family</a>";}
              if($fil)  {echo" | <a>Film-Noir</a> ";}
              if($hor)  {echo" | <a>Horror</a> ";}
              if($his)  {echo" | <a>History</a> ";}
              if($mus)  {echo" | <a>Musical</a> ";}
              if($mys)  {echo" | <a>Mystery</a> ";}
              if($rom)   { echo" | <a>Romance</a> ";}
              if($sci)  {echo" | <a>Sci-Fi</a> ";}
              if($spo)  {echo" | <a>Sport</a> ";}
              if($thr)  {echo" | <a>Thriller</a>";}
              if($war)  {echo" | <a>War</a> ";}
              if($wes)  {echo" | <a>Western</a> ";}
              if($adv)  {echo" | <a>Adventure</a> ";}
              if($bio)  {echo" | <a>Biography</a> ";}
              if($cri)  {echo" | <a>Crime</a> ";}
              if($dra)  {echo" | <a>Drama</a> ";}
              if($fan)  {echo" | <a>Fantasy</a> ";}
              if($mu)   {echo" | <a>Music</a> ";}
            echo "</td>";
            echo "<td class=\"mdl-data-table__cell--non-numeric\">".$dir."</td>";
            if($wtc) echo "<td class=\"mdl-data-table__cell--non-numeric\">".$wtc."</td>";
            else echo "<td class=\"mdl-data-table__cell--non-numeric\">Not Yet Watched</td>";
            echo "</tr>";      

          }
        echo "</tbody>
          </table></center><br><br>";
          
      
      
      
        }

?>

  <script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("dir");
  filter = input.value.toUpperCase();
  table = document.getElementById("tble");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}

function myFunction1() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("dir1");
  filter = input.value.toUpperCase();
  table = document.getElementById("tble");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}

</script>

</div>
</div>
</main>
</div>
</body>
 </html>
