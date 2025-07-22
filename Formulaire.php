<!DOCTYPE HTML>
<HTML LANG="fr">
    <HEAD>
        <META CHARSET="UTF-8">
        <TITLE>Page de traitement</TITLE>
    </HEAD>
    <BODY>
        <P>Dans le formulaire précédent, vous avez fourni
        information suivante: </P>
        <?php
            $nom = $_POST["nom"];
            echo 'nom:'. $_POST["nom"].'<BR>';
            echo 'prenom:'. $_POST["prenom"].'<BR>';
            echo 'email:' . $_POST["email"]. '<BR>';
            echo 'Date de naissance:'. $_POST["date"].'<BR>';
            echo 'Sexe:'. $_POST["sexe"] .'<BR>';
            echo 'Sexe:'. $_POST["sex2"] .'<BR>';   
            echo 'Numéro de téléphone:'. $_POST["numero"].'<BR>';
            echo 'Motivation:' .$_POST["motivation"].'<BR>';
            echo 'pièce identité:' .$_POST["doc"].'<BR>';
        ?>          
    </BODY>
</HTML>
 */   
        