<?php
#
##########################
#embedding PHP in webpages
##########################
#standard (xml) : <php? echo "<p>something</p>\n" ? >
#SGML style : <?  echo "<p>something</p>\n" ? >
#ASP style : <%  echo "<p>something</p>\n" %>
#script style : <script language="php"></script>
#echoing content directly : <?= \?\>
#
##############
#superglobals :
##############
#the info passed to the server are accessible through a bunch of "super-global variables"
#features of the superglobals:
#1) starts with _ 
#2) thery are arrays
#3) automatically created every time a page is loaded, they are accessible anywhere in the code (functions, blocks...)
#NB: print_r very useful with SG
# $_SERVER ; $_ENV ; $_SESSION ; $_COOKIE ; $_GET ; $_POST ; $_FILES

if(isset($_POST['nom'])){
    $nom=$_POST['nom'];
    print("<p>nom : $nom </p>\n");
}else{
    //nada
}

if(isset($_POST['mdp'])){
    $pass=$_POST['mdp'];
    //4 ways to print : echo (multi arg not a function) ; print (single arg function) ; printf ('like C') ; print_r & var_dump (<=> "to_string" debug)
    print("<p>mot de passe : $pass </p>\n");
}

if(isset($_POST['sexe'])){
    $sexe=$_POST['sexe'];
    print("<p>sexe : $sexe</p>\n");
}

if(isset($_POST['lesvilles'])){
    $ville=$_POST['lesvilles'];
    print("<p>ville : $ville</p>\n");
}

if(isset($_POST['passions'])){
    $passions=$_POST['passions'];
    print("<p>Vos passions :</p>\n<ul>");
    /* not useful here but if you need the key, you can also use : foreach($passions as $passionKey => $passionValue)*/
    foreach($passions as $passion){    
        print("<li>$passion</li>");
    }
    print("</ul>");
}

if(isset($_POST['animaux'])){
    $animaux=$_POST['animaux'];
    print("<p>Vos animaux domestiques :</p>\n<ul>");
    if($animaux){
        /* to understand foreach(), it could be useful to use another kind of loop over an array that does **the same thing** but in a deconstructed way : */    
        while(list($key,$animal) = each($animaux)){
        /* "each()" is a function that returns the "current" element of the array animaux as an indexed array with the key of the element as its first value and the value of the element as its second value.*/
        /* "list()" is a function that takes the array returned by each() and puts its two values into the variable key & animal */
        /* note that the variable key is not useful here */
            print("<li>$animal</li>");
        }
        print("</ul>");
    }else{
        print("<li>aucun</li></ul>");

    }
} 
?>
