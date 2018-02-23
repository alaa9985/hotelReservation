 <?php
							
include_once("event.class.php");

		//Connection à la base de données
		$bdd = new PDO('mysql:host=localhost;dbname=hoteldb','hachani','H6bfqd7O');
		
		    $event= new event($_POST['TypeEvent'], $_POST['date'],$_POST['heure'],$_POST['lieu'], $_POST['description']);
			
			$ajoutEvent=$bdd->prepare('INSERT INTO event (type, date,heure, lieu, description) VALUES (?,?,?,?,?)');
			$ajoutEvent->execute(array($event->getTypeEvent(),$event->getDateEvent(),$event->getHeureEvent(),
                                       $event->getLieuEvent(),$event->getDescription()));
			$ajoutEvent->closeCursor();
            header('Location:./listeEvenements.php');   
        
		
                      
?>