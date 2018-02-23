 <?php
		
								if(isset($_GET['id_event'])) {
                                $id_event = $_GET['id_event']; 
                                $bdd = new PDO('mysql:host=localhost;dbname=hoteldb','hachani','H6bfqd7O');	
		                        $suppChambre=$bdd->prepare  ('Delete from event where id=?'); 
                                $suppChambre->execute(array($id_event));
                                header('Location:./listeEvenements.php');
                                }
                               
?>