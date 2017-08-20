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
  <link rel="shortcut icon" href="images/4.png" type="image/x-icon" />
  <title>MoviePhilia</title>
   
  <style type="text/css">
    .mycard{background:white;margin-bottom:10px;padding:20px;color:#424242;}
    #contain{width:80%;margin:auto;}
    #files{display:none;}
    #posimb{text-align:center;}
    .mycard{width:400px;}
  </style>
</head>
<body>

<?php
include 'navbar.php'
 ?>
  <div id="contain">
         
         <center>       
                <div class="mycard">
         
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text"  value="<?php echo $name_f;?>" id="fnm" required maxlength="40">
    <label class="mdl-textfield__label" for="fnm">First Name</label>
  </div><br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" value="<?php echo $name_sr;?>" id="srnm" required maxlength="40">
    <label class="mdl-textfield__label" for="srnm">Last Name</label>
  </div><br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" value="<?php echo $usern;?>" id="un" required maxlength="40">
    <label class="mdl-textfield__label" for="un">Username</label>
  </div><br><br>
<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type=submit id="savbtn">
  Save Changes
</button>

      <br><br>
 
  </div>
   </center>     
</div>
<div id="demo-snackbar-example" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text"></div>
  <button class="mdl-snackbar__action" type="button"></button>
</div>

  


<br><br><br>



  <script type="text/javascript">
  document.getElementById("files").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};
</script>

 <script type="text/javascript">
  (function() {
  'use strict';
  var snackbarContainer = document.querySelector('#demo-snackbar-example');
  var showSnackbarButton = document.querySelector('#savbtn');
  var handler = function(event) {
    showSnackbarButton.style.backgroundColor = '';
  };
  showSnackbarButton.addEventListener('click', function() {
    'use strict';
    var nf=$('#fnm').val();
var nl=$('#srnm').val();
var unm=$('#un').val();
$.post('change.php',{nf:nf,nl:nl,unm:unm},function(dataout){
  //$("#slideNotice").html(dataout).slideDown().delay(500).slideUp();
    var data = {
      message: dataout,
      timeout: 2000,
    };
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
    });

  });
}());
  </script>
</body>
 </html>
