<?php
include_once("utilisateur.class.php");
class InscriptionManager{
	public function s_inscrire(){
		//Connection à la base de données
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

		//Vérification du mot de passe
		$passeErone=false;
		if($_POST['mot_passe1']!=$_POST['mot_passe2']){
			$passeErone=true;
		}
		//Si le pseudo ou l'email existe dèja
		if($pseudoExist||$emailExist||$passeErone){
			//redirection vers la page d'inscription
			header('Location:./inscription.php?email='.$emailExist.'&'.'pseudo='.$pseudoExist.'&'.'password='.$passeErone);
		}
		
		/**Ajout de l'utilisateur dans la base de données**/				
		//Si le pseudo et l'email n'existe pas  alors on ajoute l'utilisateur à la base de données
		
		else{
			//création d'un nouveau user 
			$user = new utilisateur($_POST['nom'],$_POST['prenom'],$_POST['dateN'],$_POST['sexe'],$_POST['adresse'],
                                           $_POST['pays'],$_POST['pseudo'],$_POST['mot_passe1'],$_POST['email']);
			
			//La reqêtte d'ajout dans la table des users
			$ajoutUserP=$bdd->prepare('INSERT INTO users (nom, prenom, dateNaissance, sexe, adresse, pays, pseudo,email,password) VALUES (?,?,?,?,?,?,?,?,?)');
			$ajoutUserP->execute(array($user->getNom(),$user->getPrenom(),$user->getDateNaissance(),$user->getSexe(),
                                       $user->getAdresse(),$user->getPays(),$user->getPseudo(),$user->getEmail(),$user->getPasse()));
			$ajoutUserP->closeCursor();
			
			header('Location:./login.php');
		
			//Redirection vers la page de Login
		}
	}
	
	public function s_authentifier(){
		$bdd = new PDO('mysql:host=localhost;dbname=hoteldb','hachani','H6bfqd7O');
		//hachage du mot de passe
		$pass_hash=sha1($_POST['mot_passe']);
		//Connection à la base de données
		$connexionReq=$bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND password=? ');
		$connexionReq->execute(array($_POST['pseudo'],$pass_hash));
		
		//Tester l'existance du compte
		$resultat=$connexionReq->fetch();
		if(!isset($resultat['id'])){
			header('Location:login.php?erreur=1');
		}
		else{
			session_start();
			$_SESSION['id']=$resultat['id'];
			$_SESSION['pseudo']=$resultat['pseudo'];
			if ($_SESSION['pseudo']=="alaa9985") header('Location:profil_admin.php');
            else header('Location:index.php');
		}
	}
}