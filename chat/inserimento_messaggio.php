<!DOCTYPE HTML><!-- Made by Caruso Denny -->
<html lang="it"><body bgcolor="#ccc7c5"><meta charset="utf-8" />
        <body>
<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "root","chat");

if(!$conn)
{
	echo("Errore di connessione.");
	exit();
}

date_default_timezone_set('Europe/Rome');
$datainvio = date('Y-m-d H:i:s');
$messaggio=$_POST['messaggio'];
$username=$_SESSION['user'];
	mysqli_select_db($conn,"chat");
	$agg = "INSERT INTO chat.messaggio(codMessaggio, datainvio, messaggio, username) values (NULL, '$datainvio', '$messaggio','$username')";
	if($messaggio==""){
		echo("<br><br><h2><center>Messaggio vuoto. Riprovare.</h2><br><br>");
		header( "refresh:0.5;url=chat.php" );
		exit();
	}
	if(!mysqli_query($conn,$agg))
	{
		echo("<br><br><h2><center>Errore nella query di inserimento.</h2><br><br>");
		exit();
	}
		mysqli_close($conn);
		header( "refresh:0.1;url=chat.php" );
?>
            </body>
<HTML>
