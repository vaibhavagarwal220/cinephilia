<?php                                                                                
include("imdb.php");
require("connect.inc.php");
require("core.inc.php");

$movieName = $_POST['movie'];
$act = $ani=$com=$doc=$fam=$fil=$hor=$mus=$rom=$spo=$war=$adv=$bio=$cri=$dra=$his=$fan=$mu=$mys=$sci=$thr=$wes=0;
$i = new Imdb();
$mArr = array_change_key_case($i->getMovieInfo($movieName), CASE_UPPER);
	foreach ($mArr as $k=>$v){
		if(is_array($v)){
			//echo $k;
			$c = 0;

			foreach($v as $a){
				$c++;
				if($k=="DIRECTORS") $dir=$a;
				//echo $a;
				if($k=="GENRES") 
				{
			  if($a=="Action") $act=1; 
              if($a=="Animation")  $ani=1;
              if($a=="Comedy") $com=1; 
              if($a=="Documentary")  $doc=1;
              if($a=="Family") $fam=1; 
              if($a=="Film-Noir")  $fil=1;
              if($a=="Horror") $hor=1; 
              if($a=="History")  $his=1;
              if($a=="Musical") $mus=1; 
              if($a=="Mystery")  $mys=1;
              if($a=="Romance") $rom=1; 
              if($a=="Sci-Fi")  $sci=1;
              if($a=="Sport") $spo=1; 
              if($a=="Thriller")  $thr=1;
              if($a=="War") $war=1; 
              if($a=="Western")  $wes=1;
              if($a=="Adventure") $adv=1; 
              if($a=="Biography")  $bio=1;
              if($a=="Crime")  $cri=1;
              if($a=="Drama") $dra=1; 
              if($a=="Fantasy")  $fan=1;
              if($a=="Music")  $mu=1;
				}
			}
		} else {
			if($k=="YEAR") $yr=$v;
			else if($k=="RATING") $rtng=$v;
		}
	}
	
//	echo $movieName."<br>";
//	echo $yr."<br>";
//	echo $dir."<br>";
//	echo $rtng."<br>";
	$vses=$_SESSION['user_id'];
	mysql_query("INSERT INTO `movies`(`id`, `name`, `rating`, `Action`, `Animation`, `Comedy`, `Documentary`, `Family`, `Film-Noir`, `Horror`, `Musical`, `Romance`, `Sport`, `War`, `Adventure`, `Biography`, `Crime`, `Drama`, `History`, `Fantasy`, `Music`, `Mystery`, `Sci-Fi`, `Thriller`, `Western`, `director`, `year`, `frating`, `points`,userid) VALUES (NULL,'$movieName',$rtng,$act,$ani,$com,$doc,$fam,$fil,$hor,$mus,$rom,$spo,$war,$adv,$bio,$cri,$dra,$his,$fan,$mu,$mys,$sci,$thr,$wes,'$dir','$yr',5,0,$vses)");
	?>
