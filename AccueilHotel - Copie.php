<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Hotel Mariott de Constanine">
    <meta name="author" content="HACHANI Ala eddine">
    <meta name="keywords" content="Hotel, 5 stars, Algérie, Constantine, ville des ponts suspondus, capitale de la culture">

    <title>Hôtel Mariott de Constantine</title>

    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" media="all and (max-device-width: 480px)" href="css/styleTablette.css"/>
   
    <script src="js/jquery-2.0.0.js"></script>
    <script src="js/jquery.slides.js"></script>
    <script src="js/jquery-2.1.4.js"></script>
    <script type="text/javascript">
       
         $(document).ready(
            function() {
                setInterval(function() {
                     $("#div1").load("temperature.txt");
                }, 3000);
            });
        
    </script>
    <script type="text/javascript" src="js/simplefadeslideshow.jquery.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
    
	jQuery('#SlideImages').fadeSlideShow();
});
</script>
     
    
</head>

   <body> 
       
        
    <div id="PagePrincipale" >
<section>
<div id="BarreLatteraleGauche" >          
           
            <form action="Reservation" method="post" enctype="multipart/form-data">
<br/><br/>
                <label style=" color: #d5ab00;text-align:center; margin-top:-25%; font-size: 21px"> Vous voulez faire une réservation ? </label>
<center><img src="images/logo-big-searchoptimization.png" alt="photo1" width="30%"/>     </center>
            
    <label> <span> 📅</span>  Date d'arrivée : </label>  <input type="date" name="dateArrivee" required="true" /> <br/>
    <label> <span> 📅</span>  Date de départ : </label>  <input type="date" name="dateDepart" required="true" /> <br/>
    <label> <span> 🏩</span>  Type de la chambre : </label>
     <select name="TypeChambre"> 
    <option value="Suite">Suite </option>
    <option value="Chambre1lit">Chambre à un lit</option>
    <option value="Chambre2lits">Chambre à 2 lits</option>
    <option value="Chambre3lits">Chambre à 3 lits</option>
    <option value="Chambre4lits">Chambre à 4 lits</option>
    </select>
<label></label><label></label>

 <input type="submit" value="Chercher" class="envoyer"/> 
  
 </form>

    <div class="alerte">     
    <p> Nous sommes navrés, aucune chambre disponible ne correspond à votre recherche ☹</p> </div> 
    </div> 
</section>
        
        
        
        <div class="BanniereHotel" > 
           
           
    <ul id="SlideImages">
        <li><img src="images/rnf.PNG" border="0" alt="" /></li> 
        <li><img src="images/bar-reception.jpg"  border="0" alt="" /></li>
        <li><img src="images/rooms-deluxe-single%20-%20Copie.jpg"  border="0" alt="" /></li>
        <li><img src="images/hotel-restaurant-design.jpg" border="0" alt="" /></li> 
        
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
            </ul>
        </nav>
        </div>  
        </section>    
        
    </div>
        <div style="width:100%; background:#eee;float:left;  margin-bottom:3%">  <h1 style="text-align: center; color:#000;"> Bienvenue à l'hotel Mariott de Constantine 😄</h1>
     <br/>   <br/> </div>
       <div class="ContenuPage">
		<br/>
           <div id="Bienvenue">		
                    
                    <div >
						 
        	
				        <img src="images/4.jpg"  alt="" width="100%"/>
                        <h2>Chambres </h2>
                        <p>L´Hôtel Mariott comprend 414 chambres, il existe 5 types de chambres qui se caractérisent toutes par la qualité de leur finition, le design et le confort de leurs équipements. Très spacieuses avec une splendide vue sur les ponts suspondus de Constantine.  </p>
                    </div>
					   
                    <div >
							
				        <img src="images/accueil5.jpg" alt="" width="100%"/>
                        <h2>Restaurants </h2>
                        <p>L´Hôtel Mariott comprend 3 restaurants, dans ces derniers, tout les conforts qui peuvent un être fournis  d'un haut lieu de gastronomie sont réunis et une carte d'excellence proposant des menu exceptionnelement uniques et des saveurs impérissables. </p>
                    </div>
							
				    <div>
							
				        <img src="images/hotel-semiramis-marrakech-salle.jpg" alt="" width="100%"/>
                        <h2>Salle de conférences </h2>
                        <p>« Ahmed Bey » une salle de conférnces où la sagesse a lieu. La notion de sagesse renvoie aux manifestations qui se dérouleront dans cette salle : sagesse des spécialistes qui se réunissent, sagesse des familles qui honorent un évènement.</p>
                    </div>
					   
								
				</div>
					
         
              <div id="infosMeteo">
                  <h1 style="text-align: center; color:#000; ">Jettez un oeil sur le temps à Constantine</h1>
               
                   <div id="div1"> <h4>Température du jour</h4> </div>
              </div>
      
<div id="Bienvenue">
						
						<div >
								<h4>Adresse</h4>
								<h5>Mariott Hotel</h5>
								<p>Zouaghi</p>
								<p>Constantine</p>
								<p>Algérie</p>
							</div><div >
								<h4>Adresse</h4>
								<h5>Mariott Hotel</h5>
								<p>Zouaghi</p>
								<p>Constantine</p>
								<p>Algérie</p>
							</div><div >
								<h4>Adresse</h4>
								<h5>Mariott Hotel</h5>
								<p>Zouaghi</p>
								<p>Constantine</p>
								<p>Algérie</p>
							</div>
							
							
							<div ></div>
						</div>
					
						 
		
        	</div>
        	
      
       
      <footer>
       <div class="footer-section">
						
							
								<p>&copy; 2016 Mariott Hotel, Constantine. Tous droits réservés | Réalisé par :  HACHANI Ala eddine                                      </p>
							
						
				
       </div>
   </footer>
    
        
</body>
</html>
    
    