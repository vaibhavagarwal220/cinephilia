<?php
include 'core.inc.php';
include 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
$idimup=getfield('id');
$name_f=getfield('fname');
$name_sr=getfield('srname');
//$ln_img=getfield('imgln');
$usern=getfield('username');
?>



 <html>
 <head>
       
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MoviePhilia</title>
   
  <style type="text/css">
    .mycard{background:white;margin-bottom:10px;padding:20px;color:#424242;}
    #contain{width:80%;margin:auto;}
    #files{display:none;}
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
         
         <center>       
                <div class="mycard">
         
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
   </center>     

  
  <br><br>
<?php
      $query="SELECT * FROM movies where userid=".$_SESSION['user_id']." order by rating DESC;";
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
