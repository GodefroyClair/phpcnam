<?php
/**  
 * Petit exercice de création d'une base de données à partir d'un fichier de texte
 *
 * 1. Ecrire le code php qui cree une base Mysql de nom "identification", 
 *     contenant une table "personnes" destinee a recevoir 
 *     les donnees du fichier login.txt
 * 2. Ecrire le code php qui insere les donnees lues dans login.txt 
 *     dans la table personnes par le biais d'un 
 *     login et mot de passe conservé dans un fichier.
 *
 * PHP version 7
 *
 * @category Exercice
 * @package  NFA017/ED2
 * @author   G Clair <godefroy.clair@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License 
 * @link     http://mcluffity.ddns.net/cnam/ed2
 */

//variables d'environnement
$servername = "localhost";
$username = "nfa017";
$password = "bolide*!1";
$database = "identification";

// fonctions utiles
/** 
 * Echo un message pour l'utilisateur dans un paragraphe
 *
 * @param string $message message pour l'utilisateur
 *
 * @return void
 */
function printInPTag($message){
    echo putInPTag($message);
}
/** 
 *  Met la chaine de caractère entre balises p
 *
 * @param string $chaine chaine à insérer
 *
 * @return string        retourne la chaine entouré de balises p
 */
function putInPTag($chaine){
    return putInTag($chaine, "p");
}

/** 
 *  Met la chaine de caractère entre des balises html
 *
 * @param string $chaine  chaine à insérer
 * @param string $tagName balise enveloppant le texte
 *
 * @return string        retourne la chaine entouré de balises p
 */
function putInTag($chaine,$tagName){
    return "<" . $tagName .">" . $chaine . "</" . $tagName . ">\n";
}
?>
<html>
<head>
<title>Authentification</title>
<link rel="stylesheet" type="text/css" href="style/default_style.css">
</head>
<body bgcolor="#FFFFFF" text="#000000">
  <main>

<?php
//Connexion (trois méthodes sont possibles : mysqli oo, mysqli procédural ou PDO
// Nous présentons la 1ère :
$conn = new mysqli($servername, $username, $password);
// Vérif connexion
if ($conn->connect_error) {
    die("connexion impossible : " . $conn->connect_error);
} 
/* Alternative en procédurale : */
/*     //Create connection */
/*     $conn = mysqli_connect($servername, $username, $password) or */
/*       die("Connection failed: " . mysqli_connect_error()); */
/*     } */

 /* Création base de données */
$sql = "CREATE DATABASE " . $database;
if ($conn->query($sql) === true) {
    printInPTag("base de données créées.");
    $conn->select_db($database);
} else {
    printInPTag("Erreur à la création de la base: " . $conn->error);
}
/* Création table Personnes */
$sql = "CREATE TABLE Personnes(
    login varchar(20),
    passwd varchar(20)
)";
if ($conn->query($sql) === true) {
    printInPTag("table Personnes créée ");
} else {
    printInPTag("Erreur à la création de la table Personnes: " . $conn->error);
}

 /* Récupération des données dans le fichier et insertion dans b2d */
$handler=fopen("login.txt", "r");
//on lit le fichier ligne par ligne
while ($ligne=fgets($handler, 1024)) {
    printInPTag("insertion de $ligne");
    //trim sup espaces et saut de ligne
    $recupArray=explode(":", trim($ligne), 2);
    $login=$recupArray[0];
    $paswd=$recupArray[1];
    $sql="INSERT INTO Personnes (login,passwd) VALUES ('$login','$paswd')";
    if ($conn->query($sql) === true) {
            printInPTag("nouvel enregistrement inseré");
    } else {
            printInPTag("Erreur: " . $sql . "<br>" . $conn->error);
    }
} //fin while
fclose($des);
$conn->close();
$conn = null;

?>
</main>
</body>
</html> 
