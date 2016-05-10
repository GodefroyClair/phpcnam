<?php $tailleTable=4;
if (isset($_GET['taille'])) {
    $tailleTable = $_GET['taille']; 
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Table de multiplication : </title>
        <meta http-equiv="Content-Language" content="fr" />
        <meta name="author" content="Godefroy Clair" />
        <meta name="generator" content="vim" />
        <meta name="keywords" lang="fr" content="" />
        <meta name="description" content="ed1-bis nfa017" />
        <style>
table, th, td {
    border: 1px solid black;
}
#table-div{
    width:300px;
}
table {
    width:200px;
}
col{
  /* width:20px; */
  width:<?php echo 1/( $tailleTable + 1) * 100; ?>%;
}
.entete{
    background-color:yellow;
}
.corps1{
    background-color:grey;
}
.diagpos0{
    background-color:red;
}
        </style>
    </head>
    <body>
        <header>
            <h1>Les tables de multiplication</h1>
            <p>Tout zôli tou bô !</p>
        </header>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
            <label for="form">Les tables de multiplication de 1 à </label>
            <input name="taille" type="number" value="4" min="1" max="64"/>
            <input type="submit"/>
        </form>
        <div id="table-div">
        <table>
<?php
echo "<colgroup>\n";
for ($i=1; $i<=$tailleTable; $i++) {
    echo "<col span=\"1\">\n";
}
echo "</colgroup>\n";
echo "<tr>";
echo "<th class=\"entete\"></th>\n";
for ($i=1; $i<=$tailleTable; $i++) {
    echo "<th class=\"entete\">{$i}</th>\n";
}
echo "</tr>\n";
for ($j=1; $j<=$tailleTable; $j++) {
    echo "<tr>";
    echo "<th class=\"entete\">{$j}</th>\n";
    for ($i=1; $i<=$tailleTable; $i++) {
        echo "<td class=\"corps".( $j % 2).
            " diagpos"
            .($i - $j) ."\">".$i*$j."</td>\n";
    }
    echo "</tr>";
}
?>
        </table>
        </div>
    </body>

</html>

