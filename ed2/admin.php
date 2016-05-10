<html>
<head>
<title>Authentification</title>
</head>
<body bgcolor="#FFFFFF" text="#000000">
  <main>

<?php 


$nom_fichier="login.txt";
/* la variable $verif va nous aider à contrôler que tout s est bien passé et à renvoyer le formulaire sinon */ 
$verif=false;
/* la fonction empty() est une alternative à isset() */
if (!empty($_POST['password']) && !empty($_POST['login'])) {
    /* traitement du mot de passe et login */
    $pass = $_POST['password'];
    $login = $_POST['login'];

    /* on peut ajouter des conditions sur le mot de passe... */
    if(strlen($pass) < 5){
        echo "<p>Mot de passe trop court (< 5 caractères)</p>";
    }else{

        /* debug */
        /* echo "<p>login : " . $login . "</p>"; */

        if (!file_exists($nom_fichier)) {
            touch($nom_fichier); //crée le document
            chmod($nom_fichier, 0775); // change ses droits. ignoré sous Windows
            //NB : le 0 permet une lecture octal (en base 8, ie de 0 à 7)
            // make the directory and then add the empty files
            /* mkdir($fichier, 0775, true); */
        }

        $handler_fichier = fopen($nom_fichier,'r+') or die("<p>fichier introuvable</p>");
        /* afficher les précédents identifiants et mot de passe */
        while(! feof($handler_fichier)){

            $ligne = fgets($handler_fichier);
            $logLu = explode("/", $ligne, 1); //3eme arg : "$limit"
            //Si limit est défini et positif, le tableau retourné contient, au maximum, limit éléments, et le dernier élément contiendra le reste de la chaîne.
            print("<p>login : " . $logLu[0] . "</p>");

            /* on vérifie que tout sest bien passé, sinon on propose à nouveau le formulaire... */
            if($logLu[0] === $login){
                if($logLu[1] === $pass){
                    echo "<p>Vous êtes authentifié</p>";
                    break;
                }else{
                    echo "<p>Le mot de passe ne correspond pas à l'identifiant.</p>";
                    $verif=true; 
                    break;
                }
            }
        }
        echo "<p>Votre compte est créé.</p>";
        fputs($handler_fichier, $login . ":" . $pass ."\n"); 
        fclose($handler_fichier);
        $verif=true; 

    } 
}

if(!$verif) {  ?>
     <h2>Formulaire </h2>
     <p>Veuilez entrer un identifiant et un mot de passe :</p>
     <form action="<?= $_SERVER['PHP_SELF'] ?>" method=POST>
     <div class="input-login">
         <label for="login">login : </label><input type="text" id="login" name="login" size="45" >
     </div>
     <div class="input-login">
         <label for="password">mot de passe : </label>
         <input type="text" id="password" name="password" size="45" required="t">
     </div>
     <input type="submit" name="submit" value="Submit">
     </form>

<?php } ?>
  </main>
</body>
</html> 
