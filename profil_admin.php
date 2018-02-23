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
                            <li><a href="index.php"</a></li>
                            <li><a href="HotelChambres.php">🏩 Chambres</a> </li>
                            <li><a href="Restaurants.php">🍴 Restaurants</a></li>
                            <li><a href="GymSpa.php">💆 Spa & Gym </a></li>
                            <li><a href="contact.php">☎ Contact</a></li>
                            <li><a href="ReservationChambre.php"> 📧 Réservation</a></li>
                            </ul>
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
       
       
		?>
		         
           
        <section> 
        <div id="BarreLatteraleDroite" >
           <nav>
            <ul class="nav-enumeration admin">
                 
                  <li class="TitreMenu">  <h1>Bonjour <?php echo  $_SESSION['pseudo'] ?> </h1> </li> 
                  <li class="TitreMenu">   </li> 
                 
               <center> <img src="images/administrator1.png" style="margin-top:10px; margin-left:15px; " /></center>
               <li class="TitreMenu">
                    <a href="listeChambres.php">
                        Gérer le site
                    </a>
                </li>
                <li class="TitreMenu">
                    <a href="deconnexion.php">
                        Déconnexion
                    </a>
                </li>
                   
               
            </ul>
        </nav>
            <br/> 
            
        </div> 
            
        </section>    
       
                
            <div class="infosPageAdmin"> 
     
            
    <form method="post" action="changestyle.php" class="formulaire">
  
    <fieldset class="rubrique" >
        <legend> <h2>  Modification des infos : </h2></legend>
     
    <label>👦 Nom : </label>                  
        <input type="text" name="nom" placeholder="<?php echo $nom ?>" /><br/> <br/>  
    
    <label>  👦 Prénom :</label>              
        <input type="text" id="prenom"  name="prenom" placeholder="<?php echo $prenom ?>" /><br/>  <br/>  
    
    <label>  📆 Date naissance : </label> 
        <input type="date" name="dateN" ><br/><br/>
        
    <label>  📍 Adresse : </label> 
        <input type="text" name="adresse" placeholder="<?php echo $adresse ?>"/><br/><br/>
        
    <label>  📧 Mail : </label>
        <input type="text" name="email" placeholder="<?php echo $email ?>" /><br/><br/>
    
     <label> 👦 Pseudonyme : </label>
        <input type="text" name="pseudo" placeholder="<?php echo $pseudo ?>" /><br/><br/>
    
    <label> 🔑 Nouveau mot de passe : </label>
        <input type="password" name="mot_passe1" /><br/><br/>
        
    
        
    
</fieldset> <br/>
    
    
<fieldset class="rubrique">
<legend> <h2> Préférences : </h2></legend>  
    
  <label>  ✎ Couleur : </label>
    <select name="couleurTheme">
				<option value="style">Par défaut</option>
				<option value="blue">Bleu</option>
				<option value="vert">Vert</option>
				<option value="mauve">Mauve</option>
				
    </select>
    

</fieldset>  <br/>
 <br/>
 <center><input type="submit" class="envoyer" value="Enregistrer"/></center>
 

</form>      
    
            </div> 
    <?php 
		}
		else{
		?>
			
		<?php
            header('Location: login.php');
		}
		?>
		
          
    
    
    
</body>
    

</html>