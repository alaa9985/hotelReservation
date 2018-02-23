  <?php
	session_start ();?>
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
	
// On récupère nos variables de session
   
       
        $bdd = new PDO('mysql:host=localhost;dbname=hoteldb','hachani','H6bfqd7O');
		//hachage du mot de passe
		
		$infosReq=$bdd->prepare('SELECT * FROM event');
		$infosReq->execute();
		
		//Tester l'existance du compte
		//$resultat=$infosReq->fetch();
        
       
       
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
     
        <br/>
         
        <?php

		$bdd = new PDO('mysql:host=localhost;dbname=hoteldb','hachani','H6bfqd7O');
	
		$calcNbrSingle=$bdd->prepare('SELECT COUNT(*) as nbr FROM event where type="Conference"');                               
		$calcNbrSingle->execute();
        $resultat1 = $calcNbrSingle->fetch();

        $calcNbrDouble=$bdd->prepare('SELECT COUNT(*) as nbr FROM event where type="Seminaire"');                               
		$calcNbrDouble->execute();
        $resultat2 = $calcNbrDouble->fetch();

        $calcNbrTriple=$bdd->prepare('SELECT COUNT(*) as nbr FROM event where type="Mariage"');                               
		$calcNbrTriple->execute();
        $resultat3 = $calcNbrTriple->fetch();

       
        
		
                      
?>        
        <div id="statsEvents" >        
                    
                    
                            
                    <div>
                            
                      
                        <h2>💉 Séminaires : <?php echo $resultat2['nbr']   ?> </h2>
                        
                    </div>
            <div>
                            
                        <h2>📣 Conférences : <?php echo $resultat1['nbr']   ?> </h2>
                        
                    </div>
                
                    <div>
                        
                        <h2>💍 Mariages : <?php echo $resultat3['nbr']   ?>  </h2>
                    </div>
                       
                    
               
                    
                                
                </div>
                    
         
              
                    
                         
        
         
                
            <table border>
            <tr>
                                <th>Evénement</th>
								<th>Type </th>
								<th>Date</th>
								<th>Heure</th>
								<th>Lieu</th>
								<th>Description</th>
            </tr>
        <?php	
            while($resultat = $infosReq->fetch()) {
            $id_event =$resultat['id'];
            $type_event=$resultat['type'];
            $date_event=$resultat['date'];
            $heure_event=$resultat['heure'];
            $lieu_event=$resultat['lieu'];
            $description_event=$resultat['description'];
							
							?>
							<tr>
                                <td><?php echo  $id_event;?></td>
                                <td><?php echo  $type_event;?></td>
                                <td><?php echo  $date_event;?></td>
                                <td><?php echo  $heure_event;?></td>
                                <td><?php echo  $lieu_event;?></td>
                                <td><?php echo nl2br($description_event);?></td>
								
                            </tr>
							
							<?php
							}
							
            ?>       
                
                
        </table>
    
                   
    
         </div>     
    
		
          
    
    
    
</body>
    

</html>