<?php 
       include 'connexion_bd.php';
   
      if(empty($_POST["user"]) || empty($_POST["password"]) || empty($_POST["email"]) || empty($_POST["pays"]) ) {
       ?><script>
                    alert('Vous devez compléter tous les champs du formulaire !');
                    document.location.href = "inscrire.php";
        </script>
       <?php
      }else
       if(!empty($_POST)){        
            $user = $_POST['user'];
            $password= $_POST['password'];    
            $email = $_POST['email']; 
            $pays = $_POST['pays']; 
           

            $req = ("INSERT INTO joueur(id,user,password,email,pays,nbscore) VALUES ('','$user','$password','$email','$pays',0)");         
            $res=mysql_query($req);
    
            ?>
        
             <script>
                    alert('bien enregistre');
                    document.location.href = "index2.html";
            </script>
        <?php 
        
       }
  
        ?>