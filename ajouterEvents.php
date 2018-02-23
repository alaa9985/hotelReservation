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
     
            
<form method="post" action="ajouterEventManager.php" class="formulaire"  >
  
    <fieldset class="rubrique" >
        <legend> <h2> Informations sur l'événement : </h2></legend>
        
    <label> 💒 Type de l'événement * : </label>
   
    <select name="TypeEvent"> 
    <option value="Conference">Conférence</option>
    <option value="Seminaire">Séminaire</option>
    <option value="Mariage">Mariage</option>
    
    </select>
 <br/> <br/> 
        <label>📅 Date* : </label>
        <input type="date" name="date" required="required" /><br/> <br/>  
 
        <label>🕓 Heure de l'événement* : </label>
        <input type="text" name="heure" required="required" /><br/> <br/>  
   
        <label>📍 Lieu de l'événement* : </label>
        <input type="text" name="lieu" required="required" /><br/> <br/>  
  
        <label>✎ Description de l'événement* : </label>
        <textarea name="description" rows="7" required="true"></textarea>
</fieldset> <br/>  
    <br/><br/>
    <center><input style="height:50px;" type="submit" class="envoyer" value="➕ Ajouter"/></center>

</form>        
    
            </div> 
    
		
          
    
    
    
</body>
    

</html>