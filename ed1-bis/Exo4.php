<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>ED1-bis exo4</title>
        <meta http-equiv="Content-Language" content="fr" />
        <meta name="author" content="Godefroy Clair" />
        <meta name="generator" content="vim" />
        <meta name="keywords" lang="fr" content="" />
        <meta name="description" content="" />
    </head>
    <body>
        <p>afficher son propre source :</p>
        <?php
            /* echo file_get_contents(__FILE__);*/
            /* echo "<pre>" . file_get_contents(__FILE__). "</pre>"; */
            echo "<pre>" . htmlspecialchars(file_get_contents(__FILE__))."</pre>";
            /* echo "<pre>" . htmlentities(file_get_contents(__FILE__)) . "</pre>"; */
        ?>
    </body>

</html>

