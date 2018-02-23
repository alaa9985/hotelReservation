<?php session_start();?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Hotel Mariott de Constanine">
    <meta name="author" content="HACHANI Ala eddinenenene">
    <meta name="keywords" content="Hotel, 5 stars, Algérie, Constantine, ville des ponts suspondus, capitale de la culture">

    <title>Hôtel Mariott de Constantine</title>

    <link href="css/style.css" rel="stylesheet">
     
    
</head>


<body  style="background-image:url('images/2.jpg'); background-size : cover;  ">
    
    <?php
				if(isset($_SESSION['id'])&&isset($_SESSION['pseudo'])){
					
					header('Location:./index.php');
				}
				else{
				
    ?>
    
<div class="inscr">
						<div id="menu">
                            <ul>
                            <li><a href="index.php">🏠 Accueil</a></li>
                            <li><a href="HotelChambres.php">🏩 Chambres</a> </li>
                            <li><a href="Restaurants.php">🍴 Restaurants</a></li>
                            <li><a href="GymSpa.php">💆 Spa & Gym </a></li>
                            <li><a href="contact.php">☎ Contact</a></li>
                            <li><a href="ReservationChambre.php"> 📧 Réservation</a></li>
                            </ul>
                        </div>
    </div>
<h1><center> Inscrivez-vous dès maintenant </center></h1>
    <div class="messageErreur" >
							<?php
							
								if(isset($_GET['password']))if($_GET['password']) echo '<p>* Le mot de passe est éroné</p>';
								if(isset($_GET['email']))if($_GET['email']) echo '<p>* L\'email existe déja</p>';
								if(isset($_GET['pseudo'])) if($_GET['pseudo'])echo '<p>* Le pseudo n\'est pas disponible</p>';
							?>
     </div>
    
<form method="post" action="ajoutUtilisateur.php" class="formulaire">
  
    <fieldset class="rubrique" >
        <legend> <h2>  Inscription : </h2></legend>
     
    <label>👦 Nom* : </label>                  
        <input type="text" name="nom" required="required" /><br/> <br/>  
    
    <label>  👦 Prénom* :</label>              
        <input type="text" id="prenom"  name="prenom" required="required" /><br/>  <br/>  
    
    <label>  📆 Date naissance* : </label> 
        <input type="date" name="dateN" required="required"/><br/><br/>
        
    <label>  👦 Sexe : </label> 
         <select name="sexe"> 
    <option value="Femme"> Femme </option>
    <option value="Homme"> Homme</option>    
    </select>
    <br/>    
    <br/>    
    <label>  📍 Adresse* : </label> 
        <input type="text" name="adresse" required="required" /><br/><br/>
    
    
			<select name="pays">
				<option value=""></option>
				<option value="AF">Afghanistan</option>
				<option value="AL">Albania</option>
				<option value="DZ">Algeria</option>
				<option value="AS">American Samoa</option>
				<option value="AD">Andorra</option>
				<option value="AO">Angola</option>
				<option value="AI">Anguilla</option>
				<option value="AR">Argentina</option>
				<option value="AM">Armenia</option>
				<option value="AW">Aruba</option>
				<option value="AU">Australia</option>
				<option value="AT">Austria</option>
				<option value="AZ">Azerbaijan</option>
				<option value="BS">Bahamas</option>
				<option value="BH">Bahrain</option>
				<option value="BD">Bangladesh</option>
				<option value="BB">Barbados</option>
				<option value="BY">Belarus</option>
				<option value="BE">Belgium</option>
				<option value="BZ">Belize</option>
				<option value="BJ">Benin</option>
				<option value="BM">Bermuda</option>
				<option value="BT">Bhutan</option>
				<option value="BO">Bolivia</option>
				<option value="BA">Bosnia and Herzegowina</option>
				<option value="BW">Botswana</option>
				<option value="BV">Bouvet Island</option>
				<option value="BR">Brazil</option>
				<option value="BN">Brunei Darussalam</option>
				<option value="BG">Bulgaria</option>
				<option value="BF">Burkina Faso</option>
				<option value="BI">Burundi</option>
				<option value="KH">Cambodia</option>
				<option value="CM">Cameroon</option>
				<option value="CA">Canada</option>
				<option value="CV">Cape Verde</option>
				<option value="KY">Cayman Islands</option>
				<option value="CF">Central African Republic</option>
				<option value="TD">Chad</option>
				<option value="CL">Chile</option>
				<option value="CN">China</option>
				<option value="CX">Christmas Island</option>
				<option value="CC">Cocos (Keeling) Islands</option>
				<option value="CO">Colombia</option>
				<option value="KM">Comoros</option>
				<option value="CG">Congo</option>
				<option value="CK">Cook Islands</option>
				<option value="CR">Costa Rica</option>
				<option value="CI">Cote d'Ivoire</option>
				<option value="HR">Croatia (Hrvatska)</option>
				<option value="CU">Cuba</option>
				<option value="CY">Cyprus</option>
				<option value="CZ">Czech Republic</option>
				<option value="DK">Denmark</option>
				<option value="DJ">Djibouti</option>
				<option value="DM">Dominica</option>
				<option value="DO">Dominican Republic</option>
				<option value="EC">Ecuador</option>
				<option value="EG">Egypt</option>
				<option value="SV">El Salvador</option>
				<option value="GQ">Equatorial Guinea</option>
				<option value="ER">Eritrea</option>
				<option value="EE">Estonia</option>
				<option value="ET">Ethiopia</option>
				<option value="FO">Faroe Islands</option>
				<option value="FJ">Fiji</option>
				<option value="FI">Finland</option>
				<option value="FR">France</option>
				<option value="GF">French Guiana</option>
				<option value="PF">French Polynesia</option>
				<option value="GA">Gabon</option>
				<option value="GM">Gambia</option>
				<option value="GE">Georgia</option>
				<option value="DE">Germany</option>
				<option value="GH">Ghana</option>
				<option value="GI">Gibraltar</option>
				<option value="GR">Greece</option>
				<option value="GL">Greenland</option>
				<option value="GD">Grenada</option>
				<option value="GP">Guadeloupe</option>
				<option value="GU">Guam</option>
				<option value="GT">Guatemala</option>
				<option value="GN">Guinea</option>
				<option value="GW">Guinea-Bissau</option>
				<option value="GY">Guyana</option>
				<option value="HT">Haiti</option>
				<option value="HN">Honduras</option>
				<option value="HK">Hong Kong</option>
				<option value="HU">Hungary</option>
				<option value="IS">Iceland</option>
				<option value="IN">India</option>
				<option value="ID">Indonesia</option>
				<option value="IR">Iran</option>
				<option value="IQ">Iraq</option>
				<option value="IE">Ireland</option>
				<option value="IL">Israel</option>
				<option value="IT">Italy</option>
				<option value="JM">Jamaica</option>
				<option value="JP">Japan</option>
				<option value="JO">Jordan</option>
				<option value="KZ">Kazakhstan</option>
				<option value="KE">Kenya</option>
				<option value="KI">Kiribati</option>
				<option value="KR">Korea, Republic of</option>
				<option value="KW">Kuwait</option>
				<option value="KG">Kyrgyzstan</option>
				<option value="LV">Latvia</option>
				<option value="LB">Lebanon</option>
				<option value="LS">Lesotho</option>
				<option value="LR">Liberia</option>
				<option value="LY">Libyan Arab Jamahiriya</option>
				<option value="LI">Liechtenstein</option>
				<option value="LT">Lithuania</option>
				<option value="LU">Luxembourg</option>
				<option value="MO">Macau</option>
				<option value="MK">Macedonia</option>
				<option value="MG">Madagascar</option>
				<option value="MW">Malawi</option>
				<option value="MY">Malaysia</option>
				<option value="MV">Maldives</option>
				<option value="ML">Mali</option>
				<option value="MT">Malta</option>
				<option value="MH">Marshall Islands</option>
				<option value="MQ">Martinique</option>
				<option value="MR">Mauritania</option>
				<option value="MU">Mauritius</option>
				<option value="YT">Mayotte</option>
				<option value="MX">Mexico</option>
				<option value="FM">Micronesia</option>
				<option value="MD">Moldova</option>
				<option value="MC">Monaco</option>
				<option value="MN">Mongolia</option>
				<option value="MS">Montserrat</option>
				<option value="MA">Morocco</option>
				<option value="MZ">Mozambique</option>
				<option value="MM">Myanmar</option>
				<option value="NA">Namibia</option>
				<option value="NR">Nauru</option>
				<option value="NP">Nepal</option>
				<option value="NL">Netherlands</option>
				<option value="AN">Netherlands Antilles</option>
				<option value="NC">New Caledonia</option>
				<option value="NZ">New Zealand</option>
				<option value="NI">Nicaragua</option>
				<option value="NE">Niger</option>
				<option value="NG">Nigeria</option>
				<option value="NU">Niue</option>
				<option value="NF">Norfolk Island</option>
				<option value="MP">Northern Mariana Islands</option>
				<option value="NO">Norway</option>
				<option value="OM">Oman</option>
				<option value="PK">Pakistan</option>
				<option value="PW">Palau</option>
				<option value="PA">Panama</option>
				<option value="PG">Papua New Guinea</option>
				<option value="PY">Paraguay</option>
				<option value="PE">Peru</option>
				<option value="PH">Philippines</option>
				<option value="PN">Pitcairn</option>
				<option value="PL">Poland</option>
				<option value="PT">Portugal</option>
				<option value="PR">Puerto Rico</option>
				<option value="QA">Qatar</option>
				<option value="RE">Reunion</option>
				<option value="RO">Romania</option>
				<option value="RU">Russian Federation</option>
				<option value="RW">Rwanda</option>
				<option value="KN">Saint Kitts and Nevis</option>
				<option value="LC">Saint LUCIA</option>
				<option value="WS">Samoa</option>
				<option value="SM">San Marino</option>
				<option value="ST">Sao Tome and Principe</option>
				<option value="SA">Saudi Arabia</option>
				<option value="SN">Senegal</option>
				<option value="SC">Seychelles</option>
				<option value="SL">Sierra Leone</option>
				<option value="SG">Singapore</option>
				<option value="SK">Slovakia (Slovak Republic)</option>
				<option value="SI">Slovenia</option>
				<option value="SB">Solomon Islands</option>
				<option value="SO">Somalia</option>
				<option value="ZA">South Africa</option>
				<option value="GS">South Georgia</option>
				<option value="ES">Spain</option>
				<option value="LK">Sri Lanka</option>
				<option value="SH">St. Helena</option>
				<option value="PM">St. Pierre and Miquelon</option>
				<option value="SD">Sudan</option>
				<option value="SR">Suriname</option>
				<option value="SZ">Swaziland</option>
				<option value="SE">Sweden</option>
				<option value="CH">Switzerland</option>
				<option value="SY">Syrian Arab Republic</option>
				<option value="TW">Taiwan</option>
				<option value="TJ">Tajikistan</option>
				<option value="TZ">Tanzania</option>
				<option value="TH">Thailand</option>
				<option value="TG">Togo</option>
				<option value="TK">Tokelau</option>
				<option value="TO">Tonga</option>
				<option value="TT">Trinidad and Tobago</option>
				<option value="TN">Tunisia</option>
				<option value="TR">Turkey</option>
				<option value="TM">Turkmenistan</option>
				<option value="TV">Tuvalu</option>
				<option value="UG">Uganda</option>
				<option value="UA">Ukraine</option>
				<option value="AE">United Arab Emirates</option>
				<option value="GB">United Kingdom</option>
				<option value="US">United States</option>
				<option value="UY">Uruguay</option>
				<option value="UZ">Uzbekistan</option>
				<option value="VU">Vanuatu</option>
				<option value="VE">Venezuela</option>
				<option value="VN">Viet Nam</option>
				<option value="EH">Western Sahara</option>
				<option value="YE">Yemen</option>
				<option value="ZM">Zambia</option>
				<option value="ZW">Zimbabwe</option>
			</select>

        <br/><br/>
        
    <label>  📧 Mail* : </label>
        <input type="text" name="email" required="required" placeholder="tourist@hotmail.com"/><br/><br/>
    
     <label>   👴 Pseudonyme* : </label>
        <input type="text" name="pseudo" required="required" /><br/><br/>
    
    <label> 🔑 Mot de passe* : </label>
        <input type="password" name="mot_passe1" required="required" /><br/><br/>
        
    <label> 🔑 Retaper le mot de passe* : </label>
        <input type="password" name="mot_passe2" required="required" /><br/><br/><br/>
     
   
        
    
</fieldset> <br/>
    
    
<fieldset class="rubrique">
<legend> <h2> Préférences : </h2></legend>  
    
    <input class="check" type="checkbox" name="preference" value="NF"/> Non-fumeur <br/>
    <input class="check" type="checkbox" name="preference" value="VSJ" /> Chambre avec vue sur le jardin  <br/>
    <input class="check" type="checkbox" name="preference" value="LS" /> Lit single  <br/>
    <input class="check" type="checkbox" name="preference" value="LD" /> Lit double <br/>
    <input class="check" type="checkbox" name="preference" value="CS" /> Chambre suite <br/>
    

</fieldset>  <br/>
 <br/><br/>
 <center><input type="submit" class="envoyer" value="S'inscrire"/></center>
   
  <center> <p class="qst" >Vous possédez déjà un compte ?  <span> <a href="login.php" > Connectez-vous  </a> </span> </p>
    <br/><br/></center>

</form> 
    
    <?php
					}
    ?>
</body>
    

</html>