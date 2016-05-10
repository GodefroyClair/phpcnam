<?php
$nom_fichier="login.txt";

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
    return "<p>" . $chaine . "</p>";
}
?>
<html>
<head>
<title>Inscription</title>
<link rel="stylesheet" type="text/css" href="style/default_style.css">
</head>
<body bgcolor="#FFFFFF" text="#000000">
  <main>

<?php
/* la variable $verif va nous aider à contrôler */ 
/* que tout s est bien passé et à renvoyer le formulaire sinon */
$verif=false;

//* la fonction empty() est une alternative (moins recommendée) à isset() */
if (!empty($_POST['password']) && !empty($_POST['login'])) {
    /* récupération et traitement du mot de passe et login */
    $pass = $_POST['password'];
    $login = $_POST[ 'login' ];

    //vérification de la sécu du mdp
    $verifMdp = true;
    /* Exemples de conditions sur le mot de passe... */
    if (strlen($pass) < 5) {
        $verifMdp = false;
        printInPTag("Mot de passe trop court (< 5 caractères)");
    } else if (strtolower($pass) == $pass || strtoupper($pass) == $pass) {
        $verifMdp = false;
        printInPTag(
            "Le mot de passe doit contenir des majuscules et minuscules."
        );
    } 
    //fin vérification de la sécu du mdp
    
    // main
    if ($verifMdp) {

        /* debug */
        /* printInPTag("login : " . $login); */

        if (!file_exists($nom_fichier)) {
            touch($nom_fichier); //crée le document
            chmod($nom_fichier, 0775); // change ses droits. ignoré sous Windows
            /* NB : le 0 permet une lecture octal (en base 8, ie de 0 à 7) */
            /* make the directory and then add the empty files */
            /* mkdir($fichier, 0775, true); */
        }

        $handler_fichier = fopen($nom_fichier, 'r+') or die(
            "<p>fichier introuvable</p>"
        );
        /* afficher les précédents identifiants et mot de passe */
        while (! feof($handler_fichier)) {

            $ligne = fgets($handler_fichier);
            // chaque ligne est composée d'un login et d'un mdp
            // séparés par ":"
            $authArray = explode(":", $ligne, 2); //3eme arg : "$limit"
            /* Si $limit est def et >0, le tableau retourné contient au max 
             * limit *
             * éléments et le dernier élém contiendra le reste de la chaîne. */
            //printInPTag("login : " . $authArray[0]);

            //* on vérifie que tout s'est bien passé, */ 
            /* sinon on propose à nouveau le formulaire... */
            if ($authArray[0] === $login) {
                printInPTag("l'identifiant existe déjà");
            }
        }
        fputs($handler_fichier, $login . ":" . $pass ."\n"); 
        printInPTag("Votre compte est créé.");
        fclose($handler_fichier);

        $verif=true; /* tout s'est bien passé */

    } 
} ?>

<?php if (!$verif) {  ?>
     <p>Veuilez entrer un identifiant et un mot de passe pour créer un compte:</p>
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
            <input type="submit" name="submit" value="Valider le formulaire">
        </div>
     </form>

<?php } ?>
  </main>
</body>
</html> 
