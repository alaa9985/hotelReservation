  <?php
	session_start ();?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Hotel Mariott de Constanine">
    <meta name="author" content="HACHANI alaa eddine">
    <meta name="keywords" content="Hotel, 5 stars, Algérie, Constantine, ville des ponts suspondus, capitale de la culture">

    <title>Hôtel Mariott de Constantine</title>

    <link href="css/style.css" rel="stylesheet">
     
    
</head>



<body  style="background-image:url('images/2.jpg'); background-size : cover;  ">
 

  
     <?php
	
// On récupère nos variables de session
   
       
        $bdd = new PDO('mysql:host=localhost;dbname=hoteldb','hachani','H6bfqd7O');
		//hachage du mot de passe
		
		$infosReq=$bdd->prepare('SELECT * FROM room');
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
	
		$calcNbrSingle=$bdd->prepare('SELECT COUNT(*) as nbrSingle FROM room where roomtype="Deluxe"');                               
		$calcNbrSingle->execute();
        $resultat1 = $calcNbrSingle->fetch();

        $calcNbrDouble=$bdd->prepare('SELECT COUNT(*) as nbrSingle FROM room where roomtype="Double"');                               
		$calcNbrDouble->execute();
        $resultat2 = $calcNbrDouble->fetch();

        $calcNbrTriple=$bdd->prepare('SELECT COUNT(*) as nbrSingle FROM room where roomtype="Triple"');                               
		$calcNbrTriple->execute();
        $resultat3 = $calcNbrTriple->fetch();

        $calcNbrQuadruple=$bdd->prepare('SELECT COUNT(*) as nbrSingle FROM room where roomtype="Quadruple"');                          
		$calcNbrQuadruple->execute();
        $resultat4 = $calcNbrQuadruple->fetch();

        $calcNbrSuite=$bdd->prepare('SELECT COUNT(*) as nbrSingle FROM room where roomtype="Suite"');                          
		$calcNbrSuite->execute();
        $resultat5 = $calcNbrSuite->fetch();
       
        
		
                      
?>        
        <div id="statsChambres" >        
                    
                    <div>
                        
                        <h2>Single : <?php echo $resultat1['nbrSingle']   ?>  </h2>
                    </div>
                       
                    <div >
                            
                        <h2>Double : <?php echo $resultat2['nbrSingle']   ?> </h2>
                        
                    </div>
                            
                    <div>
                            
                      
                        <h2>Triple : <?php echo $resultat3['nbrSingle']   ?> </h2>
                        
                    </div>
               
                    <div >
                            
                        <h2>Quadruple : <?php echo $resultat4['nbrSingle']   ?> </h2>
                        
                    </div>
                <div >
                            
                        <h2>Suite : <?php echo $resultat5['nbrSingle']   ?> </h2>
                        
                    </div>
                       
                                
                </div>
                    
         
              
                    
                         
        
         
                
            <table border>
            <tr>
                                <th>Numéro de la chambre</th>
								<th>Type de la chambre</th>
								<th>Description de la chambre</th>
            </tr>
        <?php	
            while($resultat = $infosReq->fetch()) {
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
    
		
          
    
    
    
</body>
    

</html>