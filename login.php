<?php session_start()?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Hotel Mariott de Constanine">
    <meta name="author" content="HACHANI Ala eddine">
    <meta name="keywords" content="Hotel, 5 stars, Algérie, Constantine, ville des ponts suspondus, capitale de la culture">

    <title>Hôtel Mariott de Constantine</title>

    <link href="css/style.css" rel="stylesheet">
     
    
</head>


<body  style="background-image:url('images/2.jpg'); background-size : cover;  ">
 
          <?php
				if(isset($_SESSION['id'])&&isset($_SESSION['pseudo'])){
					
					header('Location:./index.php');
				}
				else{
				
			?>
<div class="inscr">
						<div id="menu">
                            <ul>
                            <li><a href="index.php">🏠 Accueil</a></li>
                            <li><a href="HotelChambres.php">🏩 Chambres</a> </li>
                            <li><a href="Restaurants.php">🍴 Restaurants</a></li>
                            <li><a href="GymSpa.php">💆 Spa & Gym </a></li>
                            <li><a href="contact.php">☎ Contact</a></li>
                            <li><a href="ReservationChambre.php"> 📧 Réservation</a></li>
                            </ul>
                        </div>
    </div>

    <h1><center> Connectez-vous à votre compte </center></h1>
    <div class="messageErreur">
										<?php
											if(isset($_GET['erreur'])) if ($_GET['erreur']) echo '<p>* Pseudo ou Mot de Passe incorrect</p>';
										?>
									</div>
<form method="post" action="connexionUtilisateur.php" class="formulaire">
  
    <fieldset class="rubrique" >
        <legend> <h2>  Login : </h2></legend>
    <label>👦 Pseudonyme* : </label>                  
        <input type="text" name="pseudo" required="required" /><br/> <br/>  
    
    <label> 🔑 Mot de passe* : </label>
        <input type="password" name="mot_passe" required="required" maxlength="8" /><br/><br/><br/>
     
     <center><input type="submit" class="envoyer" value="Envoyer"/></center>
        
    
</fieldset> <br/>

        <p class="qst" >Vous n'avez pas de compte ?  <span> <a href="inscription.php" > Inscrivez-vous  </a> </span> </p>
    <br/><br/>
  

</form> 
    
    <?php
					}
    ?>
</body>
    

</html>