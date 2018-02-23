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
  <br/>
  <br/>
    <h1 style="margin-top:5%; margin-left: 10%;"> Saisissez-votre chance, réservez la chambre de vos préférences</h1>
    
     <div class="profile"> 
    
                    <h1>Bonjour <?php echo  $_SESSION['pseudo'] ?> 😄 </h1>
                
                
       <h1> <a href ="profil_client.php" style="color:black; text-decoration:none; ">  👀 Voir profil </a> </h1>
               
      
         
   <h1> <a href ="deconnexion.php" style="color:black; text-decoration:none;"> ⤥ Déconnexion </a> </h1>
                </div> 
    
    
     <?php
	

// On récupère nos variables de session
   if(isset($_SESSION['id'])&&isset($_SESSION['pseudo'])){
       
        $bdd = new PDO('mysql:host=localhost;dbname=hoteldb','hachani','H6bfqd7O');
		//hachage du mot de passe
		
		$infosReq=$bdd->prepare('SELECT * FROM users WHERE pseudo = ? ');
		$infosReq->execute(array($_SESSION['pseudo']));
		
		//Tester l'existance du compte
		$resultat=$infosReq->fetch();
        
        $nom=$resultat['nom'];
        $prenom = $resultat['prenom'];
        $date = $resultat['dateNaissance'];
        $adresse = $resultat['adresse'];
        $email = $resultat['email'];
        $pseudo = $resultat['pseudo'];
        $password = $resultat['password'];
        $preferences = $resultat['preferences']; 
       
      
		
        $verifPreferences=$bdd->prepare(' SELECT * from room where description like ? ');
        $verifPreferences->execute(array($preferences));
        
      
           //  echo '<br/>'.$resultatRecherche['room_num'].'--'.$resultatRecherche['roomtype'].'--'.$resultatRecherche['description'];
            $verifChambreDispo=$bdd->prepare('
                                         SELECT
                                            room_num, roomtype, description 
                                        FROM
                                            room
                                        WHERE
                                        room_num NOT IN (
                                            SELECT
                                                room.room_num
                                            FROM
                                                room
                                            LEFT OUTER JOIN
                                                room_booked ON room_booked.room_num = room.room_num
                                            WHERE
                                                
                                                -- wished booking date is after or at the DOR date
                                                ? >= dor
                                                -- OR wished booking date is before the DCO date
                                                AND ? <  dco
                                                    
                                                    )
                                        AND description like ? 
                                       '
                                     );
        $verifChambreDispo->execute(array($_POST['dateArrivee'],$_POST['dateArrivee'],$preferences));
       ?>
    <div class="infosClient"> 
    
    
                   
                
               
       <table border>
            <tr>
                                <th>Numéro de la chambre</th>
								<th>Type de la chambre</th>
								<th>Description de la chambre</th>
            </tr>
        <?php	
            while($resultat = $verifChambreDispo->fetch()) {
            $num_chambre =$resultat['room_num'];
            $type_chambre=$resultat['roomtype'];
            $description_chambre=$resultat['description'];
							
							?>
							<tr>
                                <td><?php echo  $num_chambre;?></td>
								<td><?php echo  $type_chambre;?></td>
								<td><?php echo  $description_chambre;?></td>
                            </tr>
							
							<?php
							}
							
            ?>       
                
                
        </table>
       
         </div> 
     <?php  
      /* while ($resultatRecherche = $verifChambreDispo->fetch())
        {
             echo '<br/>'.$resultatRecherche['room_num'].'--'.$resultatRecherche['roomtype'].'--'.$resultatRecherche['description'];
        }*/
    }
		?>
		         
           
    
            
    
		
          
    
    
    
</body>
    

</html>