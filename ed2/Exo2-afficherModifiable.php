<?php
/**  
 * Petit exercice de création d'une base de données à partir d'un fichier de texte
 *
 * 4. Ecrire le code qui permet d’afficher la liste des personnes 
 * de maniere a ce que chaque donnee soit modifiable 
 * (par exemple afficher dans des champs de formulaire)
 *
 *
 * PHP version 7
 *
 * @category Exercices
 * @package  NFA017/ED2
 * @author   G Clair <godefroy.clair@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License 
 * @link     http://mcluffity.ddns.net/cnam/ed2
 */

// variables d'environnement{{{1
$servername = "localhost";
$username = "nfa017";
$password = "bolide*!1";
$database = "identification";

// fonctions utiles{{{1
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
<!-- html doc {{{1-->
<html>
<head>
<title>Authentification</title>
<link rel="stylesheet" type="text/css" href="style/default_style.css">
</head>
<!-- body {{{2-->
<body bgcolor="#FFFFFF" text="#000000">
  <main>
<?php
/* connection au serveur de BD */
$conn = new mysqli($servername, $username, $password, $database);
// Vérif connexion
if ($conn->connect_error) {
    die("connexion impossible : " . $conn->connect_error);
}


//si modif la faire
if (isset($_GET['modif']) && isset($_GET['oldlogin']) && isset($_GET['login'])) {
    $oldlogin = $_GET[oldlogin];
    $newlogin = $_GET[login];
    $newpasswd = isset($_GET['passwd'])?$_GET['passwd']:"";
    $sql = "UPDATE Personnes SET login = '$newlogin', passwd = '$newpasswd' 
        WHERE login = '$oldlogin'";
    //print($sql);
    $conn->query($sql) or die("mise a jour erronee $sql");
}

//interrogation
$sql = "SELECT * FROM Personnes";
if ($result = $conn->query($sql)) {

    print("<table>\n");
    while ($ligne = $result->fetch_assoc()) {
        print("<tr>\n");

        print("<form action='" . $_SERVER['PHP_SELF'] . "' methode='POST'>"); 
        //cachee le login avant modif
        print("<input type=hidden value=".$ligne['login']." name=oldlogin >");
        print(
            putInTag(
                "login <input type=text value=".$ligne['login']." name=login >", "td"
            )
        );
        print(
            putInTag(
                "passwd <input type=text value=" . $ligne['passwd'] .
                " name=passwd >", "td"
            )
        );
        print(
            putInTag(
                "<input type=submit value='valider' name='modif'", "td"
            )
        );
        print("</form>");

        print("</tr>");
    }
    print("\n</table>");
}

mysql_close($conn);
?>
</main>
</body>
</html>
