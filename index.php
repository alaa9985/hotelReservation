  <?php
	session_start ();?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Hotel Mariott de Constanine">
    <meta name="author" content="HACHANI Ala eddine">
    <meta name="keywords" content="Hotel, 5 stars, Algérie, Constantine, ville des ponts suspondus, capitale de la culture">

    <title>Hôtel Mariott de Constantine</title>

    <link rel="stylesheet" type="text/css" href ="css/<?php echo (!isset($_COOKIE['style'])?'style':$_COOKIE['style']) ?>.css"/>
    <link rel="stylesheet" media="all and (max-device-width: 480px)" href="css/styleMobile.css"/>
   
    <script src="js/jquery-2.0.0.js"></script>
    <script src="js/jquery-2.1.4.js"></script>
    <script type="text/javascript">
       
         $(document).ready(
            function() {
                setInterval(function() {
                     $("#div1").load("temperature.html");
                }, 3000);
            }  
         
         );
        
    </script>
    

    
</head>

   <body> 
       
    <div class='slide1' ></div>
    <div class='slide2'></div>
    <div class='slide3'></div> 
    <div class='slide4'></div> 
    <div class='slide5'></div> 
    <div class='slide6'></div> 
       <div class='mot1'><h1> Bienvenue à l'hôtel Mariott de Constantine </h1></div> 
       <div class='mot2'><h1> Découvrez nos chambres : accueillantes & confortables  </h1></div> 
       <div class='mot3'><h1> Dégustez les saveurs de nos restaurants 😋 </h1></div> 
       <div class='mot4'><h1> Détentez-vous, faites un massage </h1></div> 
       <div class='mot5'><h1> Gardez votre fitness, faites du sport  </h1></div> 
       <div class='mot6'><h1> </h1></div> 
       
 <div id="PagePrincipale" >
    <section>
    <div id="BarreLatteraleGauche" >      
           
            <form action="rechercheRapideReservation.php" method="post">
            <br/>
            <br/>
            <label class="class1"> Vous voulez faire une réservation ? </label>
            <center>
                <div class="loupe"></div>  
            </center>
            
            <label> <span> 📅</span>  Date d'arrivée : </label>  <input type="date" name="dateArrivee" required="true" /> <br/>
            <label> <span> 📅</span>  Date de départ : </label>  <input type="date" name="dateDepart" required="true" /> <br/>
            <label> <span> 🏩</span>  Type de la chambre : </label>
            <select name="TypeChambre"> 
                <option value="Deluxe">Chambre Single</option>
                <option value="Double">Chambre Double</option>
                <option value="Triple">Chambre Triple</option>
                <option value="Quadruple">Chambre Quadruple</option>
                <option value="Suite">Suite </option>
    </select>
            <label></label><label></label>
            
        <input type="submit" class="envoyer"  value="Chercher" />
  
            </form>
        <div class="alerte" id="alerteRechercheChambre" style="display:none">     
        </div> 
         
        </div>
      
        
        
        <script type="text/javascript">
        
        
        $(function () {
          
          
             var dispo = $("#alerteRechercheChambre");
            <?php
							
								if($_GET['dispo']=="false") {
            ?>
                var paragraphe = $("<p> Nous sommes navrés, aucune chambre disponible ne correspond à votre recherche ☹ </p>");
                paragraphe.appendTo(dispo); 
                dispo.toggle(); 
                
            <?php
							
                    }
else {
            ?>
             var paragraphe = $("<p> Des chambres correspondant à votre recherche sont disponibles 😄 <br/>  <a href=\"ReservationChambre.php\"> Faites une réservation </a></p> ");
                paragraphe.appendTo(dispo); 
                dispo.toggle(); 
                
            <?php
							
                    }
            ?>
            
        });
                    
            
            
       

    </script>
    
     </section>
        
        
        
    <div class="BanniereHotel" > 
        <div class="divConnexion"> 
          <?php
	
        // On récupère nos variables de session
if(isset($_SESSION['id'])&&isset($_SESSION['pseudo'])){
        $bdd = new PDO('mysql:host=localhost;dbname=hoteldb','hachani','H6bfqd7O');
		//hachage du mot de passe
		
		$infosReq=$bdd->prepare('SELECT * FROM users WHERE pseudo = ? ');
		$infosReq->execute(array($_SESSION['pseudo']));
		
		//Tester l'existance du compte
		$resultat=$infosReq->fetch();
        $sexe=$resultat['sexe'];
		?>
			 <h3 > Bonjour <?php echo  $_SESSION['pseudo']. ' ,  ' ?> <a href="deconnexion.php"> Déconnexion ? </a></h3>
			<?php if ($_SESSION['pseudo']=="wess25") { ?> <a href="profil_admin.php" style="text-decoration:none;color:#000"><?php if ($sexe=="Femme") { echo "👩 Voir mon profil";} else echo "👲 Voir mon profil"; } else {?>   </a>
            <a href="profil_client.php" style="text-decoration:none;color:#000"><?php if ($sexe=="Femme") { echo "👩 Voir mon profil";} else echo "👲 Voir mon profil"; }?>   </a>
		<?php 
		}
		else{
		?>
			<h3> Vous avez déja un compte ?  <a href="login.php">Connectez-vous</a> </h3>
		<?php
		}
		?>
        </div>     
           
    <ul id="SlideImages">
       
      
    </ul>

           
    </div>
    
        <section> 
        <div id="BarreLatteraleDroite" >
           <nav>
            <ul class="nav-enumeration">
                 <li class="TitreMenu">
                    <a href="#">
                        Bienvenue 😄 
                    </a>
                </li>
                <li>
                    <a href="index.php"><i class="icon-home"></i>🏠 Accueil</a>
                </li>
                <li>
                    <a href="HotelChambres.php">🏩 Chambres</a>
                </li>
                <li>
                    <a href="Restaurants.php">🍴 Restaurants</a>
                </li>
                <li>
                    <a href="GymSpa.php">💆 Gym & Spa </a>
                </li>
                <li>
                    <a href="contact.php">☎ Contact</a>
                </li>
                <li>
                    <a href="ReservationChambre.php"> 📧 Réservation</a>
                </li>
            </ul>
        </nav>
            <br/> 
            
        </div> 
            
        </section>    
       
    </div>
        <div style="width:100%; background-color:#none; opacity:0.8; float:left; color:white; ">  <h1 style="text-align: center; "> Bienvenue à l'hotel Mariott de Constantine 😄</h1>
     <br/>   <br/> </div>
       <div class="ContenuPage noir" >
        <br/>
           <div id="Bienvenue" >        
                    
                    <div>
                         
             
           
                        <img src="images/4.jpg"  alt="" width="100%"/>
                        <h2>Chambres </h2>
                        <p>L´Hôtel Mariott comprend 414 chambres, il existe 5 types de chambres qui se caractérisent toutes par la qualité de leur finition, le design et le confort de leurs équipements. Très spacieuses avec une splendide vue sur les ponts suspondus de Constantine.    </p>
                    </div>
                       
                    <div >
                            
                        <img src="images/accueil5.jpg" alt="" width="100%"/>
                        <h2>Restaurants </h2>
                        <p>L´Hôtel Mariott comprend 3 restaurants, dans ces derniers, tout les conforts qui peuvent être fournis  d'un haut lieu de gastronomie sont réunis et une carte d'excellence proposant des menu exceptionnelement uniques et des saveurs impérissables. </p>
                    </div>
                            
                    <div>
                            
                        <img src="images/hotel-semiramis-marrakech-salle.jpg" alt="" width="100%"/>
                        <h2>Salle de conférences </h2>
                        <p>« Ahmed Bey » une salle de conférences où la sagesse a lieu. La notion de sagesse renvoie aux manifestations qui se dérouleront dans cette salle : sagesse des spécialistes qui se réunissent, sagesse des familles qui honorent un évènement.</p>
                    </div>
                       
                                
                </div>
                    
         
              
                    
                         
        
            </div>
            
      <div id="infosMeteo">
                  <h1 style="text-align: center; color:#fff; ">Jettez un oeil sur le temps à Constantine</h1>
               
                   <div id="div1"> <h4>Température du jour</h4> </div>
        </div>
       
         <div id="infosEvents">
                  <h1 style="text-align: center; color:#fff; ">Tenez-vous prêts et découvrez nos événement actuels</h1>
               
                <table border>
            <tr>
                              
								<th>Type </th>
								<th>Date</th>
								<th>Heure</th>
								<th>Lieu</th>
								<th>Description</th>
            </tr>
        <?php
 $bdd = new PDO('mysql:host=localhost;dbname=hoteldb','hachani','H6bfqd7O');
		//hachage du mot de passe
		
		$infosReq=$bdd->prepare('SELECT * FROM event');
		$infosReq->execute();
            while($resultat = $infosReq->fetch()) {
           
            $type_event=$resultat['type'];
            $date_event=$resultat['date'];
            $heure_event=$resultat['heure'];
            $lieu_event=$resultat['lieu'];
            $description_event=$resultat['description'];
							
							?>
							<tr>
                            
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
    
    <!--   <div id="google-map" class="gmap"></div> -->
                
            

            
      <footer>
       <div class="footer-section">
                                            
         <p>&copy; 2016 Mariott Hotel, Constantine. Tous droits réservés | Réalisé par :  HACHANI  ALA eddine                                    </p>             
                
       </div>
   </footer>
   
   
</body>
</html>
    