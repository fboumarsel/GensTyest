<?php session_start(); 
$user = $_SESSION['login'];


	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password="root"; // Mysql password 
	$db_name="gentile"; // Database name 
	$tbl_name="joueur"; // Table name 


mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");


if(isset($_POST["Modifier"]))
{
	$user = $_POST["user"];
	$password = htmlspecialchars(stripcslashes($_POST["password"]));
	$passwordconf= htmlspecialchars(stripcslashes($_POST["passwordconf"]));
	$pays = $_POST["pays"];
	
	
		 
		// on enregistre les donnŽes
		$result = mysql_query(" UPDATE joueur SET  user='".mysql_real_escape_string($user)."',  password='".mysql_real_escape_string($passwordconf)."', pays='".mysql_real_escape_string($pays)."' WHERE user = '$user'");
 
		//Si il y a une erreur, on crie ^^
		if (!$result) {
			die('Requte invalide : ' . mysql_error());
		}
		else{
			//Si tout est ok, on informe le webmaster
			$message_ok = '<div class="erreur"><a name="ok"></a><b>profil modifi&eacute; avec succ&egrave;s!</b></div>';
			?>
				<script>
					alert('les modifications seront prises en compte pour votre prochaine connexion');
					window.location.href="index.php";
				
				</script>
			<?php 
		}
	
	//On ferme if(isset($_POST["Valider"]))
}

$query1 = mysql_query("SELECT * FROM joueur WHERE user LIKE '%$user%'") 
or die (mysql_error()); 

while($affiche = mysql_fetch_array($query1))
{
	$user1=$affiche['user'];
	$password1=$affiche['password'];
	$pays1= $affiche["pays"];
	
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>S'inscrire Ã  Gentile</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="styleInscrire.css" />
        <script src="js/modernizr.custom.63321.js"></script>
        <!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>
			body {
				background: #e1c192 url(images/3.jpg);
			}
		</style>
    </head>
    <body>
        <div class="container">
		
			
			
			<section class="main">
				<form class="form-2" action="#ok" method="post">
				
				
					<h1> <span class="sign-up">Modification</span></h1>
					
					<p class="float">
						<label>Login</label>
						<input type="text" name="user" value="<?php echo $user1;?>" disabled="disabled">
					</p>
				
				
				
					<p class="float">
						<label>mot de passe</label>
						<input type="password" name="password" value="<?php echo $password1;?>" >
					</p>
					
					<p class="float">
						<label>Confirmation mdp</label>
						<input type="password" name="passwordconf" >
					</p>
					
				
				    <p class="float">
						<label>pays</label>
						<input type="text" name="pays" value="<?php echo $pays1;?>">
					</p>
			     	


					<p class="clearfix">     
						<input type="submit" name="Modifier" value="Modifier">
						<a href="index.php" class="log-twitter">Annuler</a>
					</p>
					
				</form>â€‹â€‹
			</section>
			
        </div>
		<!-- jQuery if needed -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
			$(function(){
			    $(".showpassword").each(function(index,input) {
			        var $input = $(input);
			        $("<p class='opt'/>").append(
			            $("<input type='checkbox' class='showpasswordcheckbox' id='showPassword' />").click(function() {
			                var change = $(this).is(":checked") ? "text" : "password";
			                var rep = $("<input placeholder='Password' type='" + change + "' />")
			                    .attr("id", $input.attr("id"))
			                    .attr("name", $input.attr("name"))
			                    .attr('class', $input.attr('class'))
			                    .val($input.val())
			                    .insertBefore($input);
			                $input.remove();
			                $input = rep;
			             })
			        ).append($("<label for='showPassword'/>").text("Voir mot de passe")).insertAfter($input.parent());
			    });

			    $('#showPassword').click(function(){
					if($("#showPassword").is(":checked")) {
						$('.icon-lock').addClass('icon-unlock');
						$('.icon-unlock').removeClass('icon-lock');    
					} else {
						$('.icon-unlock').addClass('icon-lock');
						$('.icon-lock').removeClass('icon-unlock');
					}
			    });
			});
		</script>
	

	
		
		
		
		
		
    </body>
</html>