<link rel="shortcut icon" href="" type="image/x-icon" />
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 <link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.indigo-blue.min.css">
<link rel="stylesheet" type="text/css" href="css/fonts.css">
<link rel="stylesheet" type="text/css" href="css/deslog3.css">
<link rel="stylesheet" href="https://code.getmdl.io/1.1.1/material.indigo-blue.min.css">
<script defer src="https://code.getmdl.io/1.1.1/material.min.js"></script>
  <script defer src="https://code.getmdl.io/1.2.0/material.min.js"></script>

  <style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Roboto');

*{font-family: 'Roboto';font-size:16px;}
  thead{background-color:#263238;}
  th.mdl-data-table__cell--non-numeric{color:white;}
.mycard{background:white;margin-bottom:10px;padding:20px;color:#424242;}
.succard{background:#B0BEC5;padding:20px;color:#424242;text-align:center;}
.succard table{margin:auto;}
a:hover{text-decoration:none;}
.green{color: green;}
.title-mcard{margin-left:30px;}
#bticn{width:70px;position:absolute;left:10px;top:10px;}
.red{color:red;}
ul{z-index:20;}
a{text-decoration:none;}

.mcard{color:white;width:97.3%;background:#263238;padding:20px;max-height:100px;height:90px;margin-bottom:30px;position:relative;}
.title-mcard{font-size:30px;padding:20px;}

.page-content{width:70% !important;}

	#im1{width:100px;position:fixed;left:0px;top:130px;z-index:10;}
	#im2{width:100px;position:fixed;right:0px;top:130px;z-index:10;}


a.wbtn,.usr { color:white;font-size:20px;}
body{background-color:#EFF3F6;}
.icnew{
  width:20px;
  height:20px;
  border-radius:10px;
}
.lnko{text-decoration:none;color:black;}
.left{float:left;}
.right{float:right;padding-right:120px;display:inline;z-index:5;}
#sample-input{position:absolute;top:15px;right:15px;width:300px;}
#result{position:absolute;border:1px solid #424242;top:50px;right:15px;background-color:white;color:black;display:inline;width:280px;display:none;padding:10px;line-height:20px;z-index:10;text-align: center;}
#result a{color:purple;}
.mdl-grid{line-height:20px;padding:10px;}
.mdl-cell{margin:5px;}
.searche{color:gray;text-align:center;}
#out1{margin:10px 0px 10px 0px;font-size:25px;}
#out2{margin:10px 0px 10px 0px;font-size:25px;}
#res1{margin:20px 0px 20px 0px;}
#res2{margin:20px 0px 20px 0px;}

#navmen{position:fixed;z-index:500;}

</style>

<?php
if(loggedin())
{
$name_f=getfield('fname');
$name_sr=getfield('srname');
$ln_img=getfield('imgln');
$usern=getfield('username');
$viewprof=getfield('username');
$id=getfield('id');
$lnimg=getfield('imgln');
}
?>
<div class="mcard" id=navmen><img id=bticn src="images/4.png"><div class="title-mcard mdl-shadow--12dp">CinePhilia</div>
        <div class=left><a class="mdl-button mdl-js-button mdl-js-ripple-effect wbtn" href="fileup.php"><i class="material-icons lnz">home</i>&nbsp;&nbsp;Home</a>
        
        <a class="mdl-button mdl-js-button mdl-js-ripple-effect wbtn" href="recommend.php"><i class="material-icons lnz">assessment</i>&nbsp;&nbsp;Recommended</a>
        <a class="mdl-button mdl-js-button mdl-js-ripple-effect wbtn" href="friends.php"><i class="material-icons lnz">assignment</i>&nbsp;&nbsp;Friends</a>
        </div>
  <div class=right>        
            <a class="usr mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"  href="userprof.php?q=<?php echo $viewprof;?>">
              &nbsp;<?php echo $name_f;?>
            </a>
          

<button id="demo-menu-lower-right"
        class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">more_vert</i>
</button>

<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
    for="demo-menu-lower-right">
  <li class="mdl-menu__item" id="ep"><a href=profile.php>Edit Profile</a></li>
  <li class="mdl-menu__item" id="cp"><a href=changep.php>Change Password</a></li>
  <li class="mdl-menu__item"><a href=logout.php>Log Out</a></li>
</ul>
</div>
</div>
<br><br><br><br><br><br><br><br><br>
<img src=images/1.png id=im1>
<img src=images/2.png id=im2>
