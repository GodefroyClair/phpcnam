<?php
/**  
 * Petit exercice autour des fichiers ED2 exo1
 *
 * L'exercice consiste à authentifier un utilisateur 
 * par le biais d'un login et mot de passe conservé dans un fichier.
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
$nom_fichier="login.txt";

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
/* la variable $authentifie vérifie si la pers est authentifiée */ 
/* on peut améliorer l'algo en vérifiant cookies ou session */
/* si déjà authentifiée on met $authenfication à true */
$authentifie=false;

if (isset($_POST['password']) && isset($_POST['login'])) {
    /* traitement du mot de passe et login */
    $pass = $_POST['password'];
    $login = $_POST[ 'login' ];

    /* debug */
    if (isset($login)) {
        echo putInTag(
            "console.log( 'debug ; login entré: " .  $login .
            " ; mot de passe : " . $pass . "');",
            "script"
        );
    }

    $handler_fichier = fopen($nom_fichier, 'r') or die(
        printInTag(
            "console.log(
           'debug ; fichier " . $nom_fichier .
            " inexistant' );", "script"
        )
    );
    /* afficher les précédents identifiants et mot de passe */
    
    /* while (! feof($handler_fichier))  { */
    /*     $ligne = fgets($handler_fichier); */

    /* alternative, plus court et plus sûr: */
    while (($ligne = fgets($handler_fichier)) !== false) {
        //trim supprime espaces et saut de ligne !! att. aux surprises...
        $splitArray = explode(":", trim($ligne), 2); //3eme arg : "$limit"
        /* Si $limit est def et >0, le tableau retourné contient au max 
         * limit éléments 
         * et le dernier élém contiendra le reste de la chaîne. */
        print(
            putInTag(
                "console.log( 'debug ; login enregistré: " .  $splitArray[0] .
                " ; mot de passe : " . $splitArray[1] . "');", "script"
            )
        );

        //* on vérifie que tout s'est bien passé, */ 
        /* sinon on propose à nouveau le formulaire... */
        if ($splitArray[0] == $login) {
            if ($splitArray[1] == $pass) {
                printInPTag("Ok : vous êtes authentifié.");
                $authentifie = true; //authentifié !
            } else {
                $stringAtt = "erreur d'authentification";
                printInPTag($stringAtt);
            }
            break; // !! on sort de la boucle du while !!
        }
    }
    fclose($handler_fichier);
}  //fin verif authentification
?>

<?php if (!$authentifie) {  ?>
    <p>Veuillez entrer un identifiant et un mot de passe :</p>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <h2>Formulaire </h2>
        <div class="form-input">
            <label for="login">login : </label>
            <input type="text" id="login" name="login" size="45" >
        </div>
        <div class="form-input">
            <label for="password">mot de passe : </label>
            <input type="text" id="password" name="password" size="45" required="t">
        </div>
        <div class="form-submit">
            <input type="submit" name="submit" value="authentifiez-vous">
        </div>
    </form>
<?php } else {
    echo putInTag("Bienvenu " . $login, "h2");
    // REDIRECTION...
} ?>
</main>
</body>
</html> 
