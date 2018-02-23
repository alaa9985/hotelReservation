 <?php
		
								if(isset($_GET['num_chambre'])) {
                                $num_chambre = $_GET['num_chambre']; 
                                $bdd = new PDO('mysql:host=localhost;dbname=hoteldb','hachani','H6bfqd7O');	
		                        $suppChambre=$bdd->prepare  ('Delete from room where room_num=?'); 
                                $suppChambre->execute(array($num_chambre));
                                header('Location:./listeChambres.php');
                                }
                               
?>