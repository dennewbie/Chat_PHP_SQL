<!DOCTYPE HTML>
<html>
        <head><title>Benvenuto</title> 
        <style>
                @import url(stile.css);
        </style>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
                <link href='//fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
                <link href="css/style.css" rel="stylesheet" type="text/css" media="div" />
</head>
<body bgcolor="#ccc7c5">
                <center><p> <h1>Esito Login</h1> </p><i><br><br>
<?php

$conn = mysqli_connect("localhost", "root", "root","chat");

if(!$conn)
{
	echo("errore di connessione");
	exit();
}
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      
      $myusername = mysqli_real_escape_string($conn, $_POST['username']);
      $mypassword = mysqli_real_escape_string($conn, $_POST['password']); 
      $_SESSION['user'] = $myusername;
      $password = md5($mypassword);
      
      $sql = "SELECT username FROM chat.utente WHERE username = '$myusername' and passcode = '$password'";
      $result = mysqli_query($conn,$sql);
      
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['username'];
     
      
      $count = mysqli_num_rows($result);
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         echo("<h2>Username e Password Corrette. A breve sarai reindirizzato alla pagina per la chat.</h2>");
         $agg = "UPDATE utente SET status = '1' WHERE username='$myusername'";
         $result = mysqli_query($conn,$agg);
         
         header( "refresh:1;url=chat.php" );
      }else {
          echo("<h2>Username e/o Password Errate. Riprova.</h2>");
         $error = "<h2>Username o Password errate. Riprova.</h2>";
         header( "refresh:1;url=Login.html" );
      }
   }
?>
</i><br><br><br>
<div class="ftr-bg">
                    <div class="wrap">
                        <div class="footer">
                        <div class="copy">
                            <p class="w3-link"><h2><center>© 2018 Caruso Denny. All Rights Reserved.</h2></p></center>
                        </div>
                        <div class="clear"></div>	
                    </div>
                    </div>
                </div>
</center>
</body>
</html>