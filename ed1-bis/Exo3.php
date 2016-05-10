<?php 
$col = $_GET['couleur'];
/* Penser à mettre tout (base de données, navigateur, serveur...) en utf-8 (ou vérifier si on travaille avec des bases anciennes)*/
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

$database = new PDO('mysql:host=localhost; dbname=GARAGE', 'nfa017', 'bolide*!1', $options);

//alternative
/* $db = new mysqli('localhost','garagiste'); */ 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title></title>
        <meta http-equiv="Content-Language" content="fr" />
        <meta name="author" content="Godefroy Clair" />
        <meta name="generator" content="vim" />
        <meta name="keywords" lang="fr" content="" />
        <meta name="description" content="" />
    </head>
    <body>
        <form method="GET" action="<?= $_SERVER['PHP_SELF']?>" >
            <!-- short tag pour les echos courts de php ds du html 2/ la superglobal $_SERVER avec cette clé renvoie le chemin du fichier php -->
        <label for="color">Choisissez une couleur :</label>
           <select name="couleur" id="color">
               <option value="rouge">Rouge</option>
               <option value="bleu">Bleue</option>
        </select>
        <input type="submit">
    </form>
<?php
if(! isset($col))$sql = "SELECT * FROM voitures";
else $sql = "SELECT * FROM voitures WHERE couleur = '$col'";

$result = $database->query($sql);

echo "<h4>Liste des voitures :</h4>";

while ($row = $result->fetch()){
    echo "<p>Une voiture de marque " . $row['marque'] . " fabriquée en " . $row['année'] . " de couleur " . $row['couleur'] . "</p>\n";
}

$database = null
    /* $db->close(); */

?>
    </body>

</html>
