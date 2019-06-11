<!DOCTYPE HTML><html><!-- Made by Caruso Denny --><body><?php

session_start();
$conn = mysqli_connect("localhost", "root", "root","chat");

if(!$conn)
{
	echo("errore di connessione");
	exit();
}

$myusername=$_SESSION['user'];
$agg = "UPDATE utente SET status = '0' WHERE username='$myusername'";
$result = mysqli_query($conn,$agg);
session_destroy();
header('Location: login.html');
exit;


?></body><html>