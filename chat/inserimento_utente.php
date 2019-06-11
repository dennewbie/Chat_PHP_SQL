<!DOCTYPE HTML>
<html lang="it"><body bgcolor="#ccc7c5"><meta charset="utf-8" />
        <style>
                @import url(stile.css);
	</style>
	<a href="index.html"><img src="images/banner2.png" height="20%" width="20%"></a><a href="index.html"><img src="images/banner2.png" align="right" height="20%" width="20%"></a>
		 <head><title>Inserimento nel Database...</title>
		 <center><h2>Inserimento dati all'interno del database...</h2></center>
        <body>
<?php 
$conn = mysqli_connect("localhost", "root", "root","chat");

if(!$conn)
{
	echo("Errore di connessione.");
	exit();
}
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$datanascita=$_POST['datanascita'];
$email=$_POST['email'];
$username=$_POST['username'];
$passcode=md5($_POST['passcode']);

	mysqli_select_db($conn,"chat");
	$agg = "INSERT INTO chat.utente(username, passcode, email, nome, cognome, datanascita) values ('$username', '$passcode', '$email','$nome','$cognome', '$datanascita')";
	if(!mysqli_query($conn,$agg))
	{
		echo("<br><br><h2><center>Username già utilizzato. Sei pregato di sceglierne un altro. <br>Se l'errore persiste vuol dire che un account è già associato a <br>questo indirizzo email. Clicca indietro, cambia l'username e invia nuovamente.</h2><br><br>");

		exit();
	}
		mysqli_close($conn);
		echo("<center><h2>Record inserito con successo. <br><br> <h2> Inizia a chattare. </h2><br><a href='login.html' class='myButton'>Chat</a><br><br><br><h2>Torna alla </h2><br><a href='index.html' class='myButton'>Homepage</a></h2><br><br>");
?>
<br><br>
<a href="FormUtente.html" class="myButton">Inserisci un altro utente</a>
<br><br>          <center><div class="ftr-bg">
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
