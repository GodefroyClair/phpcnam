<?php
require_once("./variables-index.php");

$nombre_semaines = 5;
$active = $nombre_semaines;
$ED = array("ED1","fin ED1 & ED1-bis","ED1-bis","fin ED1-bis & ED2","ED2");

session_start();

if(file_exists('compteur_visites.txt')){
    $compteur_f = fopen('compteur_visites.txt', 'r+');
    $compte = fgets($compteur_f);
}else{
    $compteur_f = fopen('compteur_visites.txt', 'a+');
    $compte = 0;
}

if(!isset($_SESSION['compteur_de_visite'])){
    $_SESSION['compteur_de_visite'] = 'visite';
    $compte++;
    fseek($compteur_f, 0);
    fputs($compteur_f, $compte);
}

fclose($compteur_f);
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="generator" content=
  "HTML Tidy for HTML5 for Linux version 5.1.52">
  <meta charset="utf-8">
  <title></title>
  <meta http-equiv="Content-Language" content="fr">
  <meta name="author" content="Godefroy Clair">
  <meta name="generator" content="vim">
  <meta name="keywords" lang="fr" content="">
  <meta name="description" content="">
  <link rel="stylesheet" href=
  "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  <style>
            header {
                margin-bottom:10px;
            }
            header#main-header{
                text-align:center;
                background-color:#f1f1f1;
                padding: 10px 0px;
                margin:auto;
            }
            nav.main-nav{
                background-color:#f1f1f1;
                color:white;
                float:left;
                width:20%;
                height:600px;
                min-width: 70px;
                margin-right:20px;
                /* position: fixed; */
                /* height: 100%; */
            }
            nav.main-nav ul {
                list-style-type:none;
            }
            nav.main-nav li a {
                display: block;
                color: #000;
                padding: 8px 0 8px 10px;
                text-decoration: none;
            }
            nav.main-nav li.active a{
                background-color: #4CAF50 !important;
                color: white;
            }
            nav.main-nav li.active a:link{
                background-color: #4CAF50;
                color: white;
            }
            nav.main-nav li:not(.active) a:hover {
                background-color: white;
                color: black;
            }
            nav.main-nav a{
                background-color: white;
            }
            main{
                float: left;
                width: 77%;
                padding-left: 3%;
            }
            h1,h2,h3,h4{
                margin-left: -5px;
            }
            #code input[type=range] {
                display: block;
                width: 50%;
            }
            .questions, .correction {
                margin-bottom:5%;
                margin-top:5%;
            }
  </style>
</head>
<body>
  <header id="main-header">
    <h1>Compléments pour les EDs de l'unité d'enseignement
    NFA017</h1>
    <p>Site de Godefroy Clair</p>
  </header>
  <nav class="main-nav">
    <ul class="nav-pills nav-stacked" role="tab">
<?php 
for ($i = 1 ; $i < sizeof($ED) + 1; $i++){
    echo "                  <li class=\"". (($i===$active)?"active":"") . "\" >" ; 
    echo "<a href=\"#semaine$i\" role=\"tab\" data-toggle=\"tab\">Semaine $i (". $ED[$i-1] . ")</a>";
    echo "</li>\n";
}
?>
         <!-- <li><a href="#semaine3" role="tab" data-toggle="tab">Semaine 3 (à venir...)</a></li> -->
    </ul>
  </nav>
  <header>
    <h2>Réponses aux questions et corrections</h2>
    <p>Chaque semaine, les corrections des exercices vus en cours
    et des réponses aux questions posées par
    des auditeurs</p>
  </header>
  <main>
    <div class="tab-content semaine-container">
      <div id="semaine1" class="semaine tab-pane fade">
        <div class="questions">
          <h3>Questions de la semaine 1</h3>
          <div class="question1">
            <h4>Question 1 : comment rendre obligatoire la
            selection d'au moins un bouton-radio ou d'une case à
            cocher?</h4>
            <p>Réponse : il suffit d'ajouter un attribut
            <i>required</i> à l'un des "inputs". Cependant,
            <a href="https://www.w3.org/TR/html/forms.html#the-required-attribute">
            il est conseillé de l'ajouter à chacun des inputs
            selectionnables.</a></p>
          </div>
          <div class="question2">
            <h4>Question 2 : comment changer l'aspect d'un champ
            obligatoire (changer sa couleur par exemple) et le
            remettre à normal lorsqu'il est remplie ?</h4>
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
          </div>
        </div>
        <div class="correction">
          <header>
            <h3>Elements de correction semaine 1:</h3>
            <p>Fin de la première série d'exercices et début de la
            seconde</p>
          </header>
          <ul>
            <li>
              <a href="ed1/memo-php.txt">petit mémo (vite
              fait...)</a>
            </li>
            <li>
              <a href="ed1/Exo1.html">exo1 de l'ed1 : requête
              (html)</a>
            </li>
            <li>
              <a href="ed1/TraitementExo1.php.txt">exo1 de l'ed 1 :
              traitement (php)</a>
            </li>
            <li>
              <a href="ed1/Exo2.html">exo2 de l'ed1 : requête
              (html)</a>
            </li>
            <li>
              <a href="ed1/TraitementExo2.php.txt">exo2 de l'ed 1 :
              traitement (php)</a>
            </li>
          </ul>
          <p>Pour afficher le code d'une page html, vous
          cliquez-droit sur la page et vous selectionnez "afficher
          le code source de la page".</p>
        </div>
      </div>
<?php 
for ($i = 2 ; $i < $nombre_semaines + 1 ; $i++){
    $iLast = $i-1;
    echo "    <div id=\"semaine$i\" class=\"semaine tab-pane fade ". (($i==$active)?"active in":"") ."\">\n";
    echo "       <div class=\"questions\">\n";
    echo "         <h3>Questions de la semaine $i</h3>\n";

    for ($j = 1 ; $j < sizeof($questions[$iLast])+1 ; $j++){
        $jLast = $j-1;
        echo "         <div class=\"question\">\n";
        echo "         <h4>" . $questions[$iLast][$jLast] . "</h4>\n";
        echo $reponses[$iLast][$jLast];
        echo "         </div>  <!-- fin question -->\n";
    }
    echo "       </div>  <!-- fin questions -->\n";

        #debut corrections
?>      <div class="correction">
          <header>
            <h3>Elements de correction semaine <?= $i ?>:</h3>
          </header>
<?php
    /* print_r($semaines); */
    $correcLiens = $semaines[$iLast][2];
    /* print_r($correcLiens); */
    echo "          <ul>\n";
    if($i == 2){ ?>
            <li>
              <a href="ed1-bis/memo-php2.txt">petit mémo (toujours
              vite fait...)</a>
            </li>
            <li>
              <a href="ed1/Exo3.html">exo3 de l'ed1 : requête
              (html)</a>
            </li>
            <li>
              <a href="ed1/TraitementExo3.php.txt">exo3 de l'ed 1 :
              traitement (php)</a>
            </li>
            <li>
              <a href="ed1/Exo4.html">exo4 de l'ed1 : requête
              (html)</a>
            </li>
            <li>
              <a href="ed1/TraitementExo4.php.txt">exo4 de l'ed 1 :
              traitement (php)</a>
            </li>
            <li>
              <a href="ed1-bis/Exo1.php">exo1 de l'ed1-bis :
              requête et traitement (php)</a>
            </li>
            <li>
              <a href="ed1-bis/Exo1.php.txt">exo1 de l'ed1-bis :
              fichier au format php</a>
            </li>
<?php
    echo "          </ul>\n";
    echo "         </div>\n";
    echo "    </div> <!-- fin semaine -->\n";
continue; //to stop case week 2
}
    foreach( $correcLiens as $nom => $lien ){ ?>
            <li>
              <a href="<?= $nom?>"><?= $lien?></a>
            </li>
<?php    }
    echo "          </ul>\n";
    echo "         </div>\n";
    echo "    </div> <!-- fin semaine -->\n";
} //end of $i loop
?>
    </div> <!-- fin tab-content -->
  </main>
  <script src=
  "https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">
  </script> 
  <script src=
  "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
  </script>
</body>
</html>

