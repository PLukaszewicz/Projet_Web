<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=ece_links', 'root', '');
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS',"");
$database = "ece_links";
$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
$db_found = mysqli_select_db($db_handle, $database);
$id =$_GET["id"];
if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    if(isset($_POST['forminscription']))
    {
    	if($db_found)
    	{
    		$nom = htmlspecialchars($_POST['nom']);
			$prenom = htmlspecialchars($_POST['prenom']);
			$emploi = htmlspecialchars($_POST['emploi']);
			$bio = htmlspecialchars($_POST['bio']);
			$passion = htmlspecialchars($_POST['passion']); 
	    	$sql=' UPDATE cv(ID_proprio,CVnom,CVprenom,Emploi,bio,passion) SET CVnom=$nom,CVprenom=$prenom ,Emploi=$emploi,bio=$bio ,passion=$pasion WHERE ID_proprio=$id';
	    	echo $sql;
	    	$req = $bdd->exec($sql);
	    	//mysqli_query($db_handle,$sql);
	    	/*$insertmbr = $bdd->prepare("UPDATE cv SET CVnom = ?,CVprenom = ?,Emploi = ?,bio = ?,passion = ? WHERE ID_proprio = ?) VALUES (?,?,?,?,?,?)");
	   		$insertmbr->execute(array($nom,$prenom,$emploi,$bio,$passion,$id));*/
	    header("Location: vous.php?id=".$_SESSION['id']);
	   		/*$requeteupdate = $connexionPDO->prepare('UPDATE utilisateurs SET pass = ? WHERE user = ?');
	    $requeteupdate->execute(array($_POST['user'], $_POST['pass']));
		
		$Sql='UPDATE contexte(pseudo,territoire, caract, demo, eco) SET territoire="'.$terri.'" WHERE pseudo="'.$_SESSION['pseudo'].'"'; 
		echo $Sql; 
		$req =$bdd->exec($Sql); 
	    */
    	}
    }
}
?>
<html lang="fr">
<head>
    <title>ECE Links</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel = "stylesheet" type="text/css" href="css/index.css">

    
</head>
   

   <body>
      <body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                <img src="img/ece_logo.png">
            </a>
        </div>
        <!--<ul class="nav navbar-nav">
            <li class="active"><a href="index.html">Accueil</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="jobs.html">Emploi</a></li>
            <li><a href="messenger.html">Messages</a></li>
            <li><a href="network.html">Reseau</a></li>
            <li><a href="notification.html">Notifications</a></li>
            <li><a href="vous.php">Vous</a></li>
        </ul>-->

        <ul class="nav navbar-nav navbar-right">
            <li><a href="inscription.php"><span class="glyphicon glyphicon-user"></span> Inscrivez-vous</a></li>
            <li><a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span> connexion</a></li>
        </ul>

    </div>
 </nav> 
       <div class="row">
         <div class="col-lg-2"></div>
         <div class="col-lg-8">
          <form class="well" method="POST" action="">
            <table>
               <tr>
                  <td align="right">
                     <label for="nom">Nom :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre nom" id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="prenom">Prénom :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre prenom" id="prenom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="emploi">Emploi :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre emploi" id="emploi" name="emploi" value="<?php if(isset($emploi)) { echo $emploi; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="bio">Bio :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="bio" id="bio" name="bio" value="<?php if(isset($bio)) { echo $bio; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="passion">Passion :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre Passion" id="passion" name="passion" value="<?php if(isset($passion)) { echo $passion; } ?>" />
                  </td>
               </tr>
               
               <!--<tr>
                <td align="right">
                <td></td>
                 Deja inscrit? Cliquez <a href ="connexion.php">ici</a> pour vous connectez sans plus attendre ! <br/> <br/>
                 </td>
                 </tr>   
               <tr>-->
                  <td></td>
                  <td align="center">
                     <br />
                     <input type="submit" name="forminscription" value="modifier" />
                   </br>
                   </br>
                  </td>
               </tr>
            </table>
         </div>
         </form>
         
      </div>
   </body>
</html>