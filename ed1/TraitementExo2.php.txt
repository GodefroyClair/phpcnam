<?php
/* tableau associatif de couple login - mdp */
$authVerif= array('Bart' => "No problemo",
    'Omer' =>   "Donut",
    'Lisa' => "Abraham Lincoln",
    'Boule2Neige' => "Miaou"
);

/* recuperation du mdp */
if(isset($_POST['nom'])){$nom=$_POST['nom'];}
if(isset($_POST['motdepasse'])){$motdepasse=$_POST['motdepasse'];}

/* recuperation origine requête */
if(isset($_POST['nom']))$origine=$_SERVER['HTTP_REFERER'];

/* verification existence login & valeur mdp */ 
 /* echo "<p>mot de passe : $motdepasse </p>"; //DEBUG */
if (isset($authVerif[$nom]) && $authVerif[$nom]==$motdepasse){
    echo "<p>Bonjour $nom , vous êtes bien authentifié.</p>";
}else{
    echo "<p>Authentfication non reconnue</p>";
    echo "<a href=\"$origine\">Réessayer</a>";
}
    

?>  
