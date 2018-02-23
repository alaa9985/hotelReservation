 <?php
							
include_once("chambre.class.php");

		//Connection à la base de données
		$bdd = new PDO('mysql:host=localhost;dbname=hoteldb','hachani','H6bfqd7O');
		
		/**Vérification de l'adresse e-mail et du pseudo**/
		//Les requêtes de lecture
		$verifChambreNum=$bdd->prepare('SELECT * FROM room where room_num=?'); 
                                           
		$verifChambreNum->execute(array($_POST['numeroChambre']));

        if ($resultat = $verifChambreNum->fetch())
        {
             $impossible='true';
             header('Location:./AjouterChambres.php?impossible='.$impossible);
        }
        else 
        {
		
			$chambre= new chambre($_POST['numeroChambre'], $_POST['TypeChambre'], $_POST['description']);
			$ajoutChambre=$bdd->prepare('INSERT INTO room (room_num, roomtype,description) VALUES (?,?,?)');
			$ajoutChambre->execute(array($chambre->getNumChambre(),$chambre->getTypeChambre(),$chambre->getDescription()));
			$ajoutChambre->closeCursor();
            header('Location:./listeChambres.php');   
        }
		
                      
?>