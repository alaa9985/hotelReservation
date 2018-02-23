<?php
session_start ();

$preferences="";  
        foreach($_POST['preference'] as $valeur)
        {
           
            $preferences = $preferences.'%'.$valeur; 
            
        }
        $preferences = $preferences.'%'; 

         if(isset($_SESSION['id'])&&isset($_SESSION['pseudo'])){
        $bdd = new PDO('mysql:host=localhost;dbname=hoteldb','hachani','H6bfqd7O');
		    
        $chercherUser=$bdd->prepare(' UPDATE users SET preferences=? WHERE pseudo=?');
        $chercherUser->execute(array($preferences,$_SESSION['pseudo']));
        
       
         }

$year = 31536000 + time();
setcookie('style', $_POST['couleurTheme'], $year);
header('Location: profil_client.php');
exit();