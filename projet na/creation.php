<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=ece_links', 'root', '');

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $id =$_GET["id"];
    $insertmbr = $bdd->prepare("INSERT INTO cv(ID_proprio) VALUES(?)");
    $insertmbr->execute(array($id));
    header("Location: vous.php?id=".$_SESSION['id']);
}
?>
