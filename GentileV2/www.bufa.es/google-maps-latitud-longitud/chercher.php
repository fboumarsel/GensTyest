<?php session_start(); 
$user = $_SESSION['login'];

if(isset($_POST['submit']) && $_POST['submit'] != NULL)
{
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password="root"; // Mysql password 
	$db_name="gentile"; // Database name 
	$tbl_name="gentilet"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
	
//On nettoie un peut la requ�te
$requete = htmlspecialchars(stripcslashes($_POST["gentile"]));
$requete1 = $_POST["pro"];
$lat=$_POST["lat"];
$lng=$_POST["lng"];

$query = mysql_query("SELECT * FROM gentilet WHERE gentile LIKE '%$requete%' AND lat LIKE '%$lat%' AND lng LIKE '%$lng%'") 
or die (mysql_error());
$query1 = mysql_query("SELECT * FROM gentilet WHERE gentile LIKE '%$requete1%' AND lat LIKE '%$lat%' AND lng LIKE '%$lng%'") 
or die (mysql_error()); 
 
//On utilise la fonction mysql_num_rows pour compter les r�sultats
$nb_resultats = mysql_num_rows($query);
$nb_resultats1 = mysql_num_rows($query1); 
//Si le nombre de r�sultats est diff�rent de 0, on continue
if($nb_resultats != 0 || $nb_resultats1 ==1 || $_POST["pro"] != "default") 
{
	$result1 = mysql_query(" UPDATE joueur SET  nbscore= nbscore+1 WHERE user LIKE '%$user%' ");
 
		//Si il y a une erreur, on crie ^^
		if (!$result1) {
			die('Requ�te invalide : ' . mysql_error());
		}
		else{
		while($do = mysql_fetch_array($result1)) {
				$_SESSION['nbscore'] = $do['nbscore'] ;
	
			}
		}
		
		?>
	<script>
		alert('Bonne reponse !!!');
		document.location.href = 'index.php';
	</script>
	<?php 
	
	
	
}
else {
	?>
	<script>
		alert('Mauvaise reponse !!!');
		document.location.href = 'index.php';
	</script>
	<?php 
}
}

//Si il n'y a rien

//On ferme if(isset($_POST['requete'])

//On ferme mysql
 
?>