<?php
$bdd = new PDO('mysql:host=localhost;dbname=ece_links', 'root', '');

// Ecriture dans la table notification de la base de données

if(isset($_POST['Envoyer'])) {
   $titre = htmlspecialchars($_POST['Ptitre']);
   $contenue = htmlspecialchars($_POST['Pcontenue']);

   if(!empty($_POST['Ptitre']) AND !empty($_POST['Pcontenue'])) {

      $contenuelength = strlen($contenue);
      $titrelength = strlen($titre);
      if($contenuelength <= 255) {

                  if($titrelength <= 255) {
                     $insertmbr = $bdd->prepare("INSERT INTO publication(Pcontenue,Ptitre) VALUES(?, ?)");
                     $insertmbr->execute(array( $contenue,$titre));
                     $erreur = "Votre notification a bien été créé ! <a href=\"ajoutnotif.php\">Retourner au fil d'actualites</a>";

                  } else {
                     $erreur = "Votre titre est absent ou trop long !";
                  }
      } 
      else {
        $erreur = "La Notification est trop longues !";
   }
  }
 }

?>

<html>
		<head>
		 <title> Notification </title>
 		 	<meta charset="utf-8">
	   	 	<link href="ajoutnotif.css" rel="stylesheet" type="text/css" />
		</head>

<body>
  <div align ="center">
	<h1> Creation de notification </h1>
 	<p> Merci de renseigner tous les champs suivants </p>
          <form method="POST" action="">
<table>
  
   <tr>
       <td>Type</td>
       <td> <input type="radio" name="souhait" value="Evenement" id="Evenement" /> <label for="Evenement"> Evenement </label> </td>
       <td> <input type="radio" name="souhait" value="Poste" id="Poste" /> <label for="Poste"> Poste </label> </td>
       <td> <input type="radio" name="souhait" value="Photo" id="Photo" /> <label for="Photo"> Photo </label> </td>
       <td> <input type="radio" name="souhait" value="Video" id="Video" /> <label for="Video"> Video </label> </td>
    </tr>
    <tr>
    	<td> <input type="checkbox" name="condition" id="condition" /> <label for="condition"> Je valide la notification presente</label></td>
   	</tr>
  
    <tr>
     <td align="right">
     <label for="Ptitre">Titre :</label>
      </td>
      <td>
      <input type="text" placeholder="Votre titre" id="Ptitre" name="Ptitre" value="<?php if(isset($Ptitre)) { echo $Ptitre; } ?>" />
    </td>
    </tr>
    <tr>
    <td align="right">
    <label for="Pcontenue">Votre Poste :</label>
    </td>
     <td>
       <input type="text" placeholder="Redigez votre notification" id="Pcontenue" name="Pcontenue" value="<?php if(isset($Pcontenue)) { echo $Pcontenue; } ?>" />
    </td>
   </tr>
</p>
</table>
</br>
</br>
	  <input type="submit" name="Envoyer" value="Envoyer" >


</form>

         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
  </div>
</body>

</html> 