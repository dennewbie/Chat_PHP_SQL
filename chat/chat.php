<!DOCTYPE HTML>
<html>
	<head><title>Benvenuto</title>
	<script>
		var textarea = document.getElementById('acci');
setInterval(function(){
    textarea.value += Math.random()+'\n';
    textarea.scrollTop = textarea.scrollHeight;
}, 1000);
		</script>
	<style>
                @import url(stile.css);
	</style>
</head>
<body bgcolor="#ccc7c5"><center>
		<?php 
		session_start();
$conn = mysqli_connect("localhost", "root", "root","chat");

if(!$conn)
{
	echo("errore di connessione");
	exit();
}
			$select = "select * from messaggio";
				$risultato = mysqli_query($conn,$select);
			if(!$risultato)
				{
					echo("errore nella query di selezione");
					exit();
				}/*if(mysqli_num_rows($risultato) == 0)
				{
					echo("Nessun elemento trovato");
					exit();
				}*/
	//$utente = $_POST['username'];
	?><table width="100%" align="left" height="70%" position="fixed"><tr><td cellpadding="10" cellspacing="10" width="50%">
	<h2>ChatWorld</h2></td><td width="30%"><h2 align="right">Utenti Online</h2></td></tr></table>
	<table  width="10%" height="70%" align="left" position="fixed"><tr width="100%"><td>
	<textarea id="acci" style="resize:none" readonly=true cols=110 rows=15><?php while($riga=mysqli_fetch_array($risultato)){
			 echo($riga["datainvio"]); ?>
			<?php echo($riga["username"]); ?>
			<?php echo($riga["messaggio"]); ?>
<?php echo("\n");} ?></textarea></td></tr></table>
<table border="3" width="20%" height="235px" align="right" position="fixed">
<tr><td width="100%">
	<?php 

	  			$myusername=$_SESSION['user'];
				$sql = "SELECT username FROM chat.utente WHERE username='" . $myusername . "' AND status = '1'";
				$result = mysqli_query($conn,$sql);
				$count = mysqli_num_rows($result);
				  
				if($_SESSION['user']!=NULL){

					if($count >= 1) {
						$sql = "SELECT username FROM chat.utente WHERE status = '1'";
					$result = mysqli_query($conn,$sql);
					$count = mysqli_num_rows($result);
					while($row=mysqli_fetch_array($result)){
						$myusername=$_SESSION['user'];
						echo("<h3 align='right'>\n");
							echo("▷ ".$row["username"]."</a>");
							echo("</h3>\n");
						}
					}else {
						header( "refresh:0;url=Login.html");
					}

					
		  ?></td></tr></table></td></tr></table>
		 <form action = "inserimento_messaggio.php" method = "post">
						<table width="65%" height="50px" align="left">
						
							<tr>
							<td colspan="2">
							<h2 align="left">Utente:  <?php  echo $_SESSION['user']; ?></h2>
							</td></tr><tr>
								<td align="left"><font color="red">
								   Messaggio:</font>
								</td>
								<td align="left">
						<input type="textarea" name="messaggio" style="width:98%">
								</td>
							</tr>
						<tr><td colspan="2"  align="left">
						<h4>Ricarica la pagina per ricevere i nuovi messaggi col pulsante qui sotto!</h4>
						<input type = "submit" class="myButton" value="Invia messaggio"> 
						<a href="logout.php" class="myButton">Logout</a>
						<a href="chat.php" class="myButton">Ricarica</a></td></tr></table>
			</form>
			
			
		
		</div>
	  </div>
	</div></center>
				<?php
				}else{
					header( "refresh:0;url=Login.html");
				}
				?>
				
<?php
mysqli_close($conn);
?>
</body>
</html>