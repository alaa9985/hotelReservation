  <?php
	session_start ();?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Hotel Mariott de Constanine">
    <meta name="author" content="HACHANI Ala eddinenenenene">
    <meta name="keywords" content="Hotel, 5 stars, Algérie, Constantine, ville des ponts suspondus, capitale de la culture">

    <title>Hôtel Mariott de Constantine</title>

    <link href="css/style.css" rel="stylesheet">
     
    
</head>



<body  style="background-image:url('images/2.jpg'); background-size : cover;  ">
 
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
  
     <?php
	
       
        $bdd = new PDO('mysql:host=localhost;dbname=hoteldb','hachani','H6bfqd7O');
		
		$infosReq=$bdd->prepare('SELECT * FROM room');
		$infosReq->execute();
		
       
       
		?>
		         
           
        <section> 
        <div id="BarreLatteraleDroite" >
           <nav>
            <ul class="nav-enumeration admin">
               <li class="TitreMenu">
                    <a href="#">
                       🏩 Chambres
                    </a>
                </li>
                   
                <li><a href="listeChambres.php">🏩 Liste </a></li>
                <li><a href="AjouterChambres.php">🏠 Ajouter </a></li>
                <li><a href="supprimerChambres.php">🏩 Supprimer </a> </li>
                
               <li class="TitreMenu">
                    <a href="#">
                        💒 Evénements  
                    </a>
                </li>
               <li><a href="listeEvenements.php">📰 Liste </a></li>
                <li><a href="ajouterEvents.php">ᐩ Ajouter </a></li>
                <li><a href="supprimerEvents.php">- Supprimer </a> </li>
                
                <li class="TitreMenu">
                    <a href="#">
                        📝 Réservation  
                    </a>
                </li>
                <li><a href="supprimerChambres.php">- Annuler </a> </li>
                <li class="TitreMenu">
                    <a href="profil_admin.php">
                        👀 Voir profil
                    </a>
                </li>
                <li class="TitreMenu">
                    <a href="deconnexion.php">
                       ⤥ Déconnexion
                    </a>
                </li>
            </ul>
        </nav>
            <br/> 
            
        </div> 
            
        </section>     
       
                
            <div class="infosPageAdmin"> 
     
         <div class="messageErreur" >
							<?php
							
								if(isset($_GET['impossible'])) echo '<p> Impossible d\'ajouter cette chambe car une autre porte déjà le même numéro. </p>';
							?>
     </div>
            
<form method="post" action="ajouterChambreManager.php" class="formulaire"  >
  
    <fieldset class="rubrique" >
        <legend> <h2> Informations sur la chambre : </h2></legend>
        <label>⑳ Numéro de chambre* : </label>                  
        <input type="number" name="numeroChambre" required="required" /><br/> <br/>  
  
    <label>🏩 Type de chambre* : </label>
   
    <select name="TypeChambre"> 
    <option value="Deluxe">Chambre Single Deluxe</option>
    <option value="Double">Chambre Double</option>
    <option value="Triple">Chambre Triple</option>
    <option value="Quadruple">Chambre Quadruple</option>
    <option value="Suite">Suite </option>
    </select>
 
        <br/> <br/> 
        <label>✎ Description de chambre* : </label>
        <textarea name="description" rows="7" required="true"></textarea>
</fieldset> <br/>  
    <br/><br/>
    <center><input style="height:50px;" type="submit" class="envoyer" value="➕ Ajouter"/></center>

</form>        
    
            </div> 
    
		
          
    
    
    
</body>
    

</html>