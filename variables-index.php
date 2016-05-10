<?php

function correctionLiensAr($path, $edA){
    $retArray = array();
    foreach($edA as $ed => $exoAr){
        $fullpath = $path . "/" . $ed;
        
        foreach($exoAr as $nb){
            $retArray[$fullpath . '/' . 'Exo' . $nb . '.php'] = "exo " . $nb . " de l'" . $ed;
            $retArray['../phpUtils/php2txt.php?path=' . $fullpath . '&filename=Exo' . $nb . '.php' ] = "source de l'exo " . $nb . " de l'" . $ed;
        }
    }
    return $retArray;
}
$correcLiensSemain2 = correctionLiensAr("../cnam", array('ed1' => array(3,4)));
$correcLiensSemain2b = correctionLiensAr("../cnam", array('ed1-bis' => array(1)));
$correcLiensSemain3 = correctionLiensAr("../cnam", array('ed1-bis' => array(2,4)));
$correcLiensSemain4 = correctionLiensAr("../cnam", array(
    'ed1-bis' => array(3), 'ed2' => array(1)));
$correcLiensSemain5 = correctionLiensAr("../cnam", array(
    'ed2' => array(1), 'ed2' => array("1-admin","1-authentification","2-identification-b2d")));

$sem1Ques1 = <<<EOT
Question 1 : comment rendre obligatoire la
selection d'au moins un bouton-radio ou d'une case à
cocher?
EOT;
$sem1Rep1 = <<<EOT
            <p>Réponse : il suffit d'ajouter un attribut
            <i>required</i> à l'un des "inputs". Cependant,
            <a href="https://www.w3.org/TR/html/forms.html#the-required-attribute">
            il est conseillé de l'ajouter à chacun des inputs
            selectionnables.</a></p>
EOT;

$sem1Ques2 = <<<EOT
Question 2 : comment changer l'aspect d'un champ
obligatoire (changer sa couleur par exemple) et le
remettre à normal lorsqu'il est remplie ?
EOT;
$sem1Rep2 = <<<EOT
            <p>Réponse : on peut utiliser la pseudo-classe
            "invalid" . Par exemple, on peut insérer la ligne
            suivante à l'intérieur de la balise style de la page
            :</p>
            <pre>
            [required]:invalid { box-shadow: 0 0 3px 1px red } </pre>
            <p>Toute balise ayant un attribut de type "required" et
            ayant le statut d'"invalid" verra sa "boite" encadrée
            par une ombre rouge. Notez qu'il existe aussi une
            pseudo-classe "valid" que vous pouvez utiliser pour
            changer le style d'un input validé.</p>
            <p>Cette solution n'est pas parfaite : l'esthétique est
            parfois à revoir (cf les radio-buttons) et on ne peut
            contrôler ce que le navigateur considère comme
            valide/invalide. Mais à mon humble avis, toute
            meilleure solution nécessiterait l'utilisation de
            Javascript.</p>
EOT;
$sem2Ques1 = <<<EOT
Question 1 : comment utiliser les inputs avec les
nombres rationnels ?
EOT;
$sem2Rep1 = <<<EOT
            <p>On peut utiliser le type number vu en cours avec les
            attributs max et max mais en spécifiant grâce à
            l'attribut "step" l'intervalle entre deux nombres</p>
            <p>Remarque : attention l'attribut step délimite
            entier et décimaux par un point…</p>
            <p>Code :</p>
            <pre>
            &lt;form action="action_page.php" method="get"&gt;
                Points:
                &lt;input type="number" name="double" min="0" max="5" step="0.1"&gt;
                &lt;input type="submit"&gt;
            &lt;/form&gt;</pre>
            <p>Résultat</p>
            <div class="code">
              <form action="nada" method="get">
                Nombre entre 0 et 5 - précision au dizième :
                <input type="number" name="double" min="0" max="5"
                step="0.1">
              </form>
            </div>
            <p>Code :</p>
            <pre>
            &lt;form action="action_page.php" method="get"&gt;
                Points:
                &lt;input type="range" name="points" min="0" max="10"&gt;
                &lt;input type="submit"&gt;
            &lt;/form&gt;</pre>
            <p>Résultat</p>
            <div class="code">
              <form action="nada" method="get">
                Points: <input type="range" name="points" min="0"
                max="10">
              </form>
            </div>
EOT;

$sem2Ques2 = <<<EOT
Question 2 : comment récupérer le résultat d'une
query avec mysqli (anticipation sur le cours des
prochaines semaines) ?
EOT;
$sem2Rep2 = <<<EOT
            <p>Vous verrez dans les prochaines semaines plus en
            détail comment envoyer une requête vers une base de
            données sql grâce à l'interface orientée objet mysqli.
            Maisl la fonction - ou plus précisemment la "méthode" -
            query() que l'on appelle à partir d'un objet de la
            classe mysqli permet d'envoyer la requête mais retourne
            aussi la réponse de la base de données.</p>
            <pre>##Exemple :
$db = new mysqli(....); //Vous verrez prochainement les paramètres permettant de créer un objet pouvant se connecter à une base de données...
$sql= "UNE REQUETE SQL"; //On met la requête dans une chaîne de caractères...
$resultat = $db-&gt;query($sql); // on récupère la réponse en exécutant la requête...
                            </pre>
EOT;

$sem3Ques1 = <<<EOT
Comment transférer des données "Excel" dans 
une base de données de type sql ?";
EOT;
$sem3Rep1 = <<<EOT
<p>Un des problèmes est qu'il existe de nombreux formats d'export de données Excel. Difficile de savoir à partir de quel format de fichier travailler...</p>
<p>Une solution intéressante est de choisir le format csv qui est simple, assez universel et perenne. Pour les fichiers non csv, il suffit ensuite d'ajouter un programme qui convertisse le format du fichier reçu vers le csv.</p>
<p>Les fichiers csv sont des listes de données où chaque ligne représente une ligne de données et les données sont séparées par une virgule, un point-virgule ou une tabulation. On peut aussi ajouter une ligne d'entête et utiliser les points ou les virgules pour délimiter entier et décimaux.</p> 
<h5>Exemple :</h5>
<pre>Prénom,Nom,Année de naissance,Moyenne
Sylvaine,DUPONT,2002,12.6
Christophe,ELLIER,2003,8.6
Bernie,SANDERS,2002,18.2
</pre>
<p>to be continued...<p>
EOT;

$sem4Ques1 = "Comment gérer un site en plusieurs langues ?";
$sem4Rep1 = "à venir";

$sem5Ques1 = "Comment garder une personne authentifier pendant une session ?";
$sem5Ques2 = "Rectification sur l'utilisatoin de '!== false'";
$sem5Rep1 = "à venir";
$sem5Rep2 = "à venir";

$questions = array(
    array($sem1Ques1, $sem1Ques2, $sem1Ques3),
    array($sem2Ques1, $sem2Ques2),
    array($sem3Ques1),
    array($sem4Ques1, $sem4Ques2),
    array($sem5Ques1, $sem5Ques2)
);

$reponses = array(
    array($sem1Rep1, $sem1Rep2, $sem1Rep3),
    array($sem2Rep1, $sem2Rep2),
    array($sem3Rep1),
    array($sem4Rep1),
    array($sem5Rep1, $sem5Rep2)
);
/* print_r($questions); */ 

$semaine1 = array(
    $questionsSemaine1,
    $reponsesSemaine1,
    $correcLiensSemain1); 
$semaine2 = array(
    $questionsSemaine2,
    $reponsesSemaine2,
    $correcLiensSemain2); 
$semaine3 = array(
    $questionsSemaine3,
    $reponsesSemaine3,
    $correcLiensSemain3); 
$semaine4 = array(
    $questionsSemaine4,
    $reponsesSemaine4,
    $correcLiensSemain4); 
$semaine5 = array(
    $questionsSemaine5,
    $reponsesSemaine5,
    $correcLiensSemain5); 

$semaines = array(
    $semaine1,
    $semaine2,
    $semaine3,
    $semaine4,
    $semaine5);



?>
