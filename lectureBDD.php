<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=ece_links', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// On récupère tout le contenu de la table publcation
$reponse = $bdd->query('SELECT * FROM publication');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <p>
    <strong></strong> : <?php echo $donnees['Pnom']; ?><br />
    Poste mis en ligne le: <?php echo $donnees['Pdate']; ?><br /><br />
    Poste:  <?php echo $donnees['Pcontenue']; ?><br />
   </p>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>