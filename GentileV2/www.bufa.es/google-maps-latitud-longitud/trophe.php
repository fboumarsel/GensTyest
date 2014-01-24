<div> 
<?php session_start(); 
$user = $_SESSION['login'];


	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password="root"; // Mysql password 
	$db_name="gentile"; // Database name 
	$tbl_name="joueur"; // Table name 


mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

$query1 = mysql_query("SELECT nbscore FROM joueur WHERE user LIKE '%$user%' AND nbscore >= 20 AND nbscore <= 40 ") 
or die (mysql_error()); 

$query2 = mysql_query("SELECT nbscore FROM joueur WHERE user LIKE '%$user%' AND nbscore >= 41 AND nbscore <= 60 ") 
or die (mysql_error()); 

$query3 = mysql_query("SELECT nbscore FROM joueur WHERE user LIKE '%$user%' AND nbscore >= 61 ") 
or die (mysql_error()); 


$nb_resultats1 = mysql_num_rows($query1);
$nb_resultats2 = mysql_num_rows($query2);
$nb_resultats3 = mysql_num_rows($query3); 
//Si le nombre de résultats est différent de 0, on continue
if($nb_resultats1 != 0 ) 
{
		echo'<img alt="Bronze" src="images/bonhommeBr.png" height="100" width="100" style="float: right;" />';
		echo'<h4>BRAVO '.$_SESSION['login'].' de BRONZE</h4>';
}
if($nb_resultats2 != 0 ) 
{
		echo'<img alt="Argent" src="images/bonhommeAr.png" height="100" width="100" style="float: right;" />';
		echo'<h4>BRAVO '.$_SESSION['login'].' d ARGENT</h4>';
}
if($nb_resultats3 != 0 ) 
{
		echo'<img alt="Or" src="images/bonhommeOr.png" height="100" width="100" style="float: right;" />';
		echo'<h4>BRAVO '.$_SESSION['login'].' d OR</h4>';
}

?>

</div>