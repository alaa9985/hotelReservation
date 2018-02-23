<?php
include_once("reservation.class.php");
include_once("utilisateur.class.php");
class ReservationManager{
	public function ajouterReservation(){
		//Connection à la base de données
		$preferences="";  
        foreach($_POST['preference'] as $valeur)
        {
           
            $preferences = $preferences.'%'.$valeur; 
            
        }
        $preferences = $preferences.'%'; 
        echo $preferences;         
        
        $bdd = new PDO('mysql:host=localhost;dbname=hoteldb','hachani','H6bfqd7O');
		
        $verifPreferences=$bdd->prepare(' SELECT * from room where description like ? and roomtype=?');
        $verifPreferences->execute(array($preferences,$_POST['TypeChambre']));
        
        if($resultatRecherche = $verifPreferences->fetch())
        {
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
                                                -- room type
                                                    roomtype != ?
                                                OR (
                                                -- wished booking date is after or at the DOR date
                                                ? >= dor
                                                -- OR wished booking date is before the DCO date
                                                AND ? <  dco
                                                    )
                                                    )
                                        AND description like ? 
                                         ORDER BY
                                            RAND()
                                            LIMIT 0, 1
                                       '
                                     );
        $verifChambreDispo->execute(array($_POST['TypeChambre'], $_POST['dateArrivee'],$_POST['dateArrivee'],$preferences));
      /*  while ($resultatRecherche = $verifChambreDispo->fetch())
        {
             echo '<br/>'.$resultatRecherche['room_num'].'--'.$resultatRecherche['roomtype'].'--'.$resultatRecherche['description'];
        }*/
        
        }
       
        else 
        {
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
                                                -- room type
                                                    roomtype != ?
                                                OR (
                                                -- wished booking date is after or at the DOR date
                                                ? >= dor
                                                -- OR wished booking date is before the DCO date
                                                AND ? <  dco
                                                    )
                                                    )
                                              ORDER BY
                                            RAND()
                                            LIMIT 0, 1
                                       '
                                     );
        $verifChambreDispo->execute(array($_POST['TypeChambre'], $_POST['dateArrivee'],$_POST['dateArrivee']));
      
      /*  while ($resultatRecherche = $verifChambreDispo->fetch())
        {
             echo '<br/>'.$resultatRecherche['room_num'].'--'.$resultatRecherche['roomtype'].'--'.$resultatRecherche['description'];
        } */
        }
            
        if (!$resultat = $verifChambreDispo->fetch())
        {
             $dispo='false';
             header('Location:./ReservationChambre.php?dispo='.$dispo);
        }
        else 
        {
		
        
        $bdd = new PDO('mysql:host=localhost;dbname=hoteldb','hachani','H6bfqd7O');
		
		/**Vérification de l'adresse e-mail et du pseudo**/
		//Les requêtes de lecture
		$verifEmailReqP=$bdd->prepare('SELECT * FROM users WHERE  email=?');
		$verifEmailReqP->execute(array($_POST['email']));
		$verifPseudoReqP=$bdd->prepare('SELECT * FROM users WHERE pseudo=?');
		$verifPseudoReqP->execute(array($_POST['pseudo']));
		$verifEmailRes=$verifEmailReqP->fetch();
		$verifPseudoRes=$verifPseudoReqP->fetch();
		$emailExist=false;
		$pseudoExist=false;
		if($verifEmailRes['id']){
			$emailExist=true;
		}
		if($verifPseudoRes['id']){
			$pseudoExist=true;
		}

		$passeErone=false;
		if($_POST['mot_passe1']!=$_POST['mot_passe2']){
			$passeErone=true;
		}
		//Si le pseudo ou l'email existe dèja
		if($pseudoExist||$emailExist||$passeErone){
			//redirection vers la page d'inscription
			echo $resultat['room_num']; 
			$reserve= new reservation('',$resultat['room_num'], $_POST['dateArrivee'], $_POST['dateDepart'], $_POST['pseudo']);
       
			//La reqêtte d'ajout dans la table des users
			$ajoutReservation=$bdd->prepare('INSERT INTO room_booked (room_num, dor,dco,id_client) VALUES (?,?,?,?)');
			$ajoutReservation->execute(array($reserve->getNumChambre(),$reserve->getCheckIn(),$reserve->getCheckOut(),
                                             $reserve->getClient()));
			$ajoutReservation->closeCursor();
            header('Location:./message.php');
        }
		
		/**Ajout de l'utilisateur dans la base de données**/				
		//Si le pseudo et l'email n'existe pas  alors on ajoute l'utilisateur à la base de données
		
		else{
			//création d'un nouveau user 
			$user = new utilisateur($_POST['nom'],$_POST['prenom'],$_POST['dateN'],$_POST['sexe'],$_POST['adresse'],
                                           $_POST['pays'],$_POST['pseudo'],$_POST['mot_passe1'],$_POST['email'],$preferences);
			
			//La reqêtte d'ajout dans la table des users
			$ajoutUserP=$bdd->prepare('INSERT INTO users (nom, prenom, dateNaissance, sexe, adresse, pays, pseudo,email,password,preferences) VALUES (?,?,?,?,?,?,?,?,?,?)');
			$ajoutUserP->execute(array($user->getNom(),$user->getPrenom(),$user->getDateNaissance(),$user->getSexe(),
                                       $user->getAdresse(),$user->getPays(),$user->getPseudo(),$user->getEmail(),$user->getPasse(),
                                       $user->getPreferences()));
			$ajoutUserP->closeCursor();
            
            
			$reserve= new reservation('',$resultat['room_num'], $_POST['dateArrivee'], $_POST['dateDepart'], $_POST['pseudo']);
       
			//La reqêtte d'ajout dans la table des users
			$ajoutReservation=$bdd->prepare('INSERT INTO room_booked (room_num, dor,dco,id_client) VALUES (?,?,?,?)');
			$ajoutReservation->execute(array($reserve->getNumChambre(),$reserve->getCheckIn(),$reserve->getCheckOut(),
                                             $reserve->getClient()));
			$ajoutReservation->closeCursor();
            header('Location:./message.php');
        
           // header('Location:./ReservationChambre.php');
        
		//	header('Location:./index.php');
		
			//Redirection vers la page de Login
		}
                                    
                                    
        }
	
    }
    public function RechercheRapideReservation(){
    		$bdd = new PDO('mysql:host=localhost;dbname=hoteldb','hachani','H6bfqd7O');
		
		/**Vérification de l'adresse e-mail et du pseudo**/
		//Les requêtes de lecture
		$verifChambreDispo=$bdd->prepare(' SELECT
                                            room_num, roomtype
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
                                             
                                                    roomtype != ?
                                                OR (
                                                ? >= dor
                                               
                                                AND ? <  dco
                                                    )
                                                    
                                                    )
                                                    
                                        ORDER BY
                                            RAND()
                                            LIMIT 0, 1'
                                     );
        
		$verifChambreDispo->execute(array($_POST['TypeChambre'], $_POST['dateArrivee'],$_POST['dateArrivee']));

        if (!$resultat = $verifChambreDispo->fetch())
        {
             $dispo='false';
             header('Location:./index.php?dispo='.$dispo);
            
        }
        else 
        {
			$dispo='true';
            header('Location:./index.php?dispo='.$dispo);
        }
    }
    
}
	
