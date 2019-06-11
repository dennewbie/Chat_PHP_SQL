<!DOCTYPE HTML>
<html lang="it"><meta charset="utf-8" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
                <link href='//fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
                <link href="css/style.css" rel="stylesheet" type="text/css" media="div" />
				<style>
                @import url(stile.css);

		   </style>
		  <title>Controlla la tua mail...</title>
                </head>
                <body bgcolor="#ccc7c5">
        <a href="index.html"><img src="images/banner2.png" height="20%" width="20%"></a><a href="index.html"><img src="images/banner2.png" align="right" height="20%" width="20%"></a>
            <?php
            $conn = mysqli_connect("localhost", "root", "root","chat");
            $email=$_POST['email'];
            if(!$conn)
            {
                    echo("Errore di connessione.");
                    exit();
            }
            $email=$_POST['email'];
                $query="SELECT * FROM utente WHERE email='" . $email . "'";
                if ($result=mysqli_query($conn,$query))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  if($rowcount>0){
          echo("<h2><center>Controlla la tua email. Abbiamo inviato tutte le <br>informazioni necessarie per reimpostare la password.</center></h2><br>");
  }else{
          echo("<h2><center>Questa email non è associata ad alcun account. <br>Sei pregato di riprovare con un'altra.</center></h2><br>");
  }
  mysqli_free_result($result);
  }
?>   
<br><br> <center>
<a href="FormUtente.html" class="myButton">Registrati</a><br><br><br>
<a href="index.html" class="myButton">Homepage</a><br><br>
<br><br>          <div class="ftr-bg">
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
<HTML>